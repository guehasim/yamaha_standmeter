<?php 

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx; 

class pdam extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_pdam');
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
				$data['pdam'] = $this->m_pdam->lihat_pdam();
				$this->load->view("template/temp_1");
				$this->load->view("pdam/v_pdam",$data);
				$this->load->view("template/temp_2");
			} else {
				$data['pdam'] = $this->m_pdam->lihat_pdam();
				$this->load->view("template/opt_temp_1");
				$this->load->view("pdam/v_pdam",$data);
				$this->load->view("template/temp_2");
			}
			
		}		
	}

	//controller meteran

	public function gonewpdam()
	{
		$status = $this->session->userdata('ses_status');
			if ($status == 0) {
				$this->load->view("template/temp_1");
				$this->load->view("pdam/v_newpdam");
				$this->load->view("template/temp_2");
			} else {
				$this->load->view("template/opt_temp_1");
				$this->load->view("pdam/v_newpdam");
				$this->load->view("template/temp_2");
			}
		
	}

	public function tambah_pdam()
	{
		$tanggal = $this->input->post('tanggal');

		$this->db->where('tgl_pdam', $tanggal);
		$query = $this->db->get('tbl_stand_pdam');

		if ($query->num_rows() > 0) {
			$this->session->set_flashdata('msg',
				'<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Gagal Dalam Penyimpanan Karena Tanggal Ini Sudah Ada
				</div>');
			
			redirect('pdam');
		}else{
			if (isset($_POST)) {
			$this->m_pdam->tambah_pdam();

			$this->session->set_flashdata('msg',
				'<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Berhasil Menyimpan Stand Meter
				</div>');
			
			redirect('pdam');
			}
			else{
				$this->session->set_flashdata('msg',
					'<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                                Gagal Dalam Penyimpanan Stand Meter
					</div>');
				
				redirect('pdam');
			}
		}
		
	}


	public function getpdam()
		{
			$status = $this->session->userdata('ses_status');
			if ($status == 0) {
				if (isset($_GET['us']) ) {
		            $id = $_GET['us'];
		            $data['pdam'] = $this->m_pdam->getpdam($id);         
		            $this->load->view("template/temp_1");
					$this->load->view("pdam/v_updatepdam",$data);
					$this->load->view("template/temp_2");
		        }else{
		        	echo "no";
		        }
			} else {
				if (isset($_GET['us']) ) {
		            $id = $_GET['us'];
		            $data['pdam'] = $this->m_pdam->getpdam($id);         
		            $this->load->view("template/opt_temp_1");
					$this->load->view("pdam/v_updatepdam",$data);
					$this->load->view("template/temp_2");
		        }else{
		        	echo "no";
		        }
			}			
		}
	
	public function update_pdam()
		{
			$tanggal = $this->input->post('tanggal');

			$data = array(				
				'ID_user'		=> $this->input->post('id_user'),
				'tgl_pdam'		=> $this->input->post('tanggal'),
				'penggunaan'	=> $this->input->post('penggunaan')
				);

			$where = array(
				'ID_pdam' 		=> $this->input->post('id')
				);

			$this->m_pdam->update($where,$data,'tbl_stand_pdam');

			$this->session->set_flashdata('msg',
					'<div class="alert alert-info alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                                Berhasil Mengubah Stand Meter PDAM
					</div>');
			redirect('pdam');			
		}	

	public function hapus_pdam()
	{
		$id = $this->input->post('id');
        $this->m_pdam->hapus_pdam($id);

        $this->session->set_flashdata('msg',
				'<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Berhasil Menghapus Stand Meter PDAM
				</div>');
        redirect('pdam');
	}
	//end controller meteran

	public function cetak_pdam()
	{
		$id 		= $this->input->post('btn');
		$tgl_awal 	= $this->input->post('tgl_awal');
		$tgl_akhir 	= $this->input->post('tgl_akhir');

		if ($id == 'Print') {

			$lis['pdam'] = $this->m_pdam->tampil_cetak_pdam($tgl_awal,$tgl_akhir);
			$this->load->library('pdf');
		    $this->pdf->setPaper('F4', 'portrait');
		    $this->pdf->filename = "Laporan-PDAM.pdf";
		    $this->pdf->load_view('pdam/cetak_pdam', $lis);
		}else{
			$pdam = $this->m_pdam->tampil_excel_pdam($tgl_awal,$tgl_akhir);

          $spreadsheet = new Spreadsheet;

          $spreadsheet->setActiveSheetIndex(0)
                      ->setCellValue('A1', 'No')
                      ->setCellValue('B1', 'Penginput')
                      ->setCellValue('C1', 'Tanggal')
                      ->setCellValue('D1', 'USAGE (M3)');

          $kolom = 2;
          $nomor = 1;
          foreach($pdam as $lis) {

               $spreadsheet->setActiveSheetIndex(0)
                           ->setCellValue('A' . $kolom, $nomor)
                           ->setCellValue('B' . $kolom, $lis->nama)
                           ->setCellValue('C' . $kolom, date('d M y', strtotime($lis->tgl_pdam)))
                           ->setCellValue('D' . $kolom, number_format($lis->penggunaan,2));

               $kolom++;
               $nomor++;

          }

          $writer = new Xlsx($spreadsheet);

          header('Content-Type: application/vnd.ms-excel');
	  header('Content-Disposition: attachment;filename="Laporan PDAM.xlsx"');
	  header('Cache-Control: max-age=0');

	  $writer->save('php://output');
		}	
		
	}	

}

 ?>