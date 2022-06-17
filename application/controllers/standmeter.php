<?php 

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx; 

class standmeter extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_meteran');
		$this->load->library('pdf');
		$this->load->library('session');
	}	

	public function index()
	{
		$user = $this->session->userdata('ses_admin');
		if ($user == "") {
			redirect('index/tampil_login');
		}else{
			$status = $this->session->userdata('ses_status');
			if ($status == 0) {				
				$lis['meter'] = $this->m_meteran->lihat_meter();
				$this->load->view("template/temp_1");
				$this->load->view("standmeter/v_standmeter",$lis);
				$this->load->view("template/temp_2");
			} else {
				$lis['meter'] = $this->m_meteran->lihat_meter();
				$this->load->view("template/opt_temp_1");
				$this->load->view("standmeter/v_standmeter",$lis);
				$this->load->view("template/temp_2");
			}
		}		
	}

	//controller meteran

	public function gonewmeter()
	{
		$status = $this->session->userdata('ses_status');
			if ($status == 0) {
				$this->load->view("template/temp_1");
				$this->load->view("standmeter/v_newstandmeter");
				$this->load->view("template/temp_2");
			} else {
				$this->load->view("template/opt_temp_1");
				$this->load->view("standmeter/v_newstandmeter");
				$this->load->view("template/temp_2");
			}
	}

	public function tambah_meter()
	{
		$tanggal = $this->input->post('tanggal');

		$this->db->where('date_stan_meter', $tanggal);
		$query = $this->db->get('tbl_stand_meter');

		if ($query->num_rows() > 0) {
			$this->session->set_flashdata('msg',
				'<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Gagal Dalam Penyimpanan Karena Tanggal Ini Sudah Ada
				</div>');
			
			redirect('standmeter');
		}else{
			if (isset($_POST)) {
			$this->m_meteran->tambah_meter();

			$this->session->set_flashdata('msg',
				'<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Berhasil Menyimpan Stand Meter
				</div>');
			
			redirect('standmeter');
			} 
			else{
				$this->session->set_flashdata('msg',
					'<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                                Gagal Dalam Penyimpanan Stand Meter
					</div>');
				
				redirect('standmeter');
			}
		}
		
	}


	public function getmeter()
		{
			$status = $this->session->userdata('ses_status');
			if ($status == 0) {
				if (isset($_GET['us']) ) {
		            $id = $_GET['us'];
		            $lis['meter'] = $this->m_meteran->getmeter($id);         
		            $this->load->view("template/temp_1");
					$this->load->view("standmeter/v_updatestandmeter",$lis);
					$this->load->view("template/temp_2");
		        }else{
		        	echo "no";
		        }
			} else {
				if (isset($_GET['us']) ) {
		            $id = $_GET['us'];
		            $lis['meter'] = $this->m_meteran->getmeter($id);         
		            $this->load->view("template/opt_temp_1");
					$this->load->view("standmeter/v_updatestandmeter",$lis);
					$this->load->view("template/temp_2");
		        }else{
		        	echo "no";
		        }
			}
			
		}
	
	public function update_meter()
		{
			
				$lis = array(
					'ID_user'				=> $this->input->post('id_user'),
					'date_stan_meter'		=> $this->input->post('tanggal'),
					'bp'					=> $this->input->post('bp'),
					'lbp'					=> $this->input->post('lbp'),
					'kvarh'					=> $this->input->post('kvarh'),
					'outgoing_i'			=> $this->input->post('outgoing_i'),
					'outgoing_ii'			=> $this->input->post('outgoing_ii'),
					'outgoing_iii'			=> $this->input->post('outgoing_iii'),
					'outgoing_iv'			=> $this->input->post('outgoing_iv')
					);

				$where = array(
					'ID_stand_meter' 		=> $this->input->post('id')
					);

				$this->m_meteran->update($where,$lis,'tbl_stand_meter');

				$this->session->set_flashdata('msg',
						'<div class="alert alert-info alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                                Berhasil Mengubah Stand Meter
						</div>');
				redirect('standmeter');
						
		}	

	public function hapus_meter()
	{
		$id = $this->input->post('id');
        $this->m_meteran->hapus_meter($id);

        $this->session->set_flashdata('msg',
				'<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Berhasil Menghapus Stand Meter
				</div>');
        redirect('standmeter');
	}
	//end controller meteran

	public function cetak_meteran()
	{
		$id 		= $this->input->post('btn');
		$tgl_awal 	= $this->input->post('tgl_awal');
		$tgl_akhir 	= $this->input->post('tgl_akhir');

		if ($id == 'Print') {

			$lis['meter'] = $this->m_meteran->tampil_cetak_meter($tgl_awal,$tgl_akhir);
			$this->load->library('pdf');
		    $this->pdf->setPaper('F4', 'landscape');
		    $this->pdf->filename = "Laporan-Listrik.pdf";
		    $this->pdf->load_view('standmeter/cetak_listrik', $lis);
		}else{
			$listrik = $this->m_meteran->tampil_excel_meter($tgl_awal,$tgl_akhir);

          $spreadsheet = new Spreadsheet;

          $spreadsheet->setActiveSheetIndex(0)
                      ->setCellValue('A1', 'No')
                      ->setCellValue('B1', 'Penginput')
                      ->setCellValue('C1', 'Tanggal')
                      ->setCellValue('D1', 'BP')
                      ->setCellValue('E1', 'LBP')
                      ->setCellValue('F1', 'KVARH')
                      ->setCellValue('G1', 'OUTGOING I')
                      ->setCellValue('H1', 'OUTGOING II')
                      ->setCellValue('I1', 'OUTGOING III')
                      ->setCellValue('J1', 'OUTGOING IV');                      

          $kolom = 2;
          $nomor = 1;
          foreach($listrik as $lis) {

               $spreadsheet->setActiveSheetIndex(0)
                           ->setCellValue('A' . $kolom, $nomor)
                           ->setCellValue('B' . $kolom, $lis->nama)
                           ->setCellValue('C' . $kolom, date('d M y', strtotime($lis->date_stan_meter)))
                           ->setCellValue('D' . $kolom, number_format($lis->bp,2))
                           ->setCellValue('E' . $kolom, number_format($lis->lbp,2))
                           ->setCellValue('F' . $kolom, number_format($lis->kvarh,2))
                           ->setCellValue('G' . $kolom, number_format($lis->outgoing_i,2))
                           ->setCellValue('H' . $kolom, number_format($lis->outgoing_ii,2))
                           ->setCellValue('I' . $kolom, number_format($lis->outgoing_iii,2))
                           ->setCellValue('J' . $kolom, number_format($lis->outgoing_iv,2));

               $kolom++;
               $nomor++;

          }

          $writer = new Xlsx($spreadsheet);

          header('Content-Type: application/vnd.ms-excel');
	  header('Content-Disposition: attachment;filename="Laporan Listrik.xlsx"');
	  header('Cache-Control: max-age=0');

	  $writer->save('php://output');
		}	
		
	}

}

 ?>