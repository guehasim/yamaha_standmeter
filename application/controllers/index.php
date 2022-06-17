<?php 

class index extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
		$this->load->model('m_pdam');
		$this->load->model('m_meteran');
		$this->load->library('session');
	}	

	public function index()
	{
		$user = $this->session->userdata('ses_admin');
		if ($user == "") {
			redirect('index/tampil_login');
		}else{
			redirect('index/dasboard');
		}		
	}

	public function dasboard()
	{
		$status = $this->session->userdata('ses_status');

		if ($status == 0) {
			$data["listrik"]		= $this->m_meteran->lihat_grafik();
			$data["min_listrik"]	= $this->m_meteran->lihat_min();
			$data["max_listrik"]	= $this->m_meteran->lihat_max();
			$data["avg_listrik"]	= $this->m_meteran->lihat_avg();

			$data["pdam"] 			= $this->m_pdam->lihat_grafik();
			$data["min_pdam"]		= $this->m_pdam->lihat_min();
			$data["max_pdam"]		= $this->m_pdam->lihat_max();
			$data["avg_pdam"]		= $this->m_pdam->lihat_avg();

			$this->load->view('template/temp_1');
			// $this->load->view('template/v_awal',$data);		
			$this->load->view('template/v_dasboard',$data);
			$this->load->view('template/temp2das');
		}else{
			$data["listrik"]		= $this->m_meteran->lihat_grafik();
			$data["min_listrik"]	= $this->m_meteran->lihat_min();
			$data["max_listrik"]	= $this->m_meteran->lihat_max();
			$data["avg_listrik"]	= $this->m_meteran->lihat_avg();

			$data["pdam"] 			= $this->m_pdam->lihat_grafik();
			$data["min_pdam"]		= $this->m_pdam->lihat_min();
			$data["max_pdam"]		= $this->m_pdam->lihat_max();
			$data["avg_pdam"]		= $this->m_pdam->lihat_avg();

			$this->load->view('template/opt_temp_1');
			// $this->load->view('template/v_awal',$data);		
			$this->load->view('template/v_dasboard',$data);
			$this->load->view('template/temp2das');
		}
		
	}

	public function tampil_login()
	{
		$this->load->view('v_login');
	}

	public function aksi_login()
	{
		$user = $this->input->post('user');
		$pass = base64_encode($this->input->post('pass'));

		$this->db->where('username', $user);
		$this->db->where('password', $pass);
		$query = $this->db->get('m_user');

		if ($query->num_rows() > 0) {
			$row = $query->row();
			$data = array(
				'ses_admin' 	=> $row->nama,
				'ses_id'		=> $row->ID_user,
				'ses_status'	=> $row->status_user
				);
			$this->session->set_userdata($data);			

			redirect('index');
		}else{
			
			$this->session->set_flashdata('msg','Ada kesalahan dalam Login, Periksa Username atau Password');
			redirect('index');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('ses_admin');
		$this->session->unset_userdata('ses_id');		
		$this->session->unset_userdata('ses_status');
		session_destroy();

		redirect('index');
	}

	//controller akun

	public function akun()
		{
			
			$data['akun'] = $this->m_user->lihat_akun();
			$this->load->view('template/temp_1');
			$this->load->view('akun/v_akun', $data);
			$this->load->view('template/temp_2');
		}

	public function gonewakun()
		{
			$this->load->view('template/temp_1');
			$this->load->view('akun/v_newakun');
			$this->load->view('template/temp_2');
		}	

	public function tambah_akun()
	{
		$user = $this->input->post('user');
		$this->db->where('username', $user);
		$query = $this->db->get('m_user');

		if ($query->num_rows() > 0) {
			$this->session->set_flashdata('msg',
				'<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Gagal Dalam Penyimpanan Akun Karena Username sudah ada
				</div>');
			
			redirect('index/akun');
		}else{

			if (isset($_POST)) {
				$this->m_user->tambah_akun();

				$this->session->set_flashdata('msg',
					'<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                                Berhasil Menyimpan Akun
					</div>');
				
				redirect('index/akun');
			}
			else{
				$this->session->set_flashdata('msg',
					'<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                                Gagal Dalam Penyimpanan Akun
					</div>');
				
				redirect('index/akun');
			}
		}
	}
	//end controller akun

	public function getakun()
		{
			$status = $this->session->userdata('ses_status');
			if (isset($_GET['us']) ) {
	            $id = $_GET['us'];
	            $data['akun'] = $this->m_user->getakun($id);         
	            $this->load->view('template/temp_1');
	            $this->load->view('akun/v_updateakun',$data);
	            $this->load->view('template/temp_2');
	        }else{
	        	echo "no";
	        }
		}
	
	public function update_akun()
		{
			$id 	= $this->input->post('id');
			$nama 	= $this->input->post('nama');
			$user 	= $this->input->post('user');
			$pass 	= base64_encode($this->input->post('password'));

			$data = array(
				'nama'			=> $nama,
				'username'		=> $user,
				'password'		=> $pass
				);

			$where = array(
				'ID_user' 		=> $id
				);

			$this->m_user->update($where,$data,'m_user');

			$this->session->set_flashdata('msg',
					'<div class="alert alert-info alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                                Berhasil Mengubah Akun
					</div>');
			redirect('index/akun');
		}	

	public function hapus_akun()
	{
		$id = $this->input->post('id');
        $this->m_user->hapus_akun($id);

        $this->session->set_flashdata('msg',
				'<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Berhasil Menghapus Akun
				</div>');
        redirect('index/akun');
	}
}

 ?>