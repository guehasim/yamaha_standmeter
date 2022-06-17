<?php 


class m_user extends CI_Model
{
	public function lihat_akun()
	{
		$query = $this->db->query("SELECT * FROM m_user ORDER BY ID_user DESC");
		return $query;
	}

	public function getakun($id)
	{
		$query = $this->db->query("SELECT * FROM m_user WHERE ID_user = $id");
		return $query;
	}
	
	public function tambah_akun(){
		
		$data = array(
			'ID_user'		=> null,
			'nama'			=> $this->input->post('nama'),
			'username'		=> $this->input->post('user'),
			'password'		=> base64_encode($this->input->post('password')),
			'status_user'	=> $this->input->post('status')
			);

		$this->db->insert('m_user',$data);
	}

	public function update($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function hapus_akun($id)
    {
        $this->db->where('ID_user',$id);
        $this->db->delete('m_user');
    }
}
 ?>