<?php 


class m_pdam extends CI_Model
{
	public function lihat_pdam()
	{
		$query = $this->db->query("SELECT * 
									FROM tbl_stand_pdam i
									LEFT JOIN m_user ii ON i.ID_user = ii.ID_user
									ORDER BY i.tgl_pdam DESC");
		return $query;
	}

	public function getpdam($id)
	{
		$query = $this->db->query("SELECT * FROM tbl_stand_pdam WHERE ID_pdam = $id");
		return $query;
	}
	
	public function tambah_pdam(){
		
		$data = array(
			'ID_pdam'		=> null,
			'ID_user'		=> $this->input->post('id_user'),
			'tgl_pdam'		=> $this->input->post('tanggal'),
			'penggunaan'	=> $this->input->post('penggunaan')
			);

		$this->db->insert('tbl_stand_pdam',$data);
	}

	public function lihat_grafik()
	{
		$tahun = date('Y');
		$bulan = date('m');
		$query = $this->db->query("SELECT SUM(penggunaan) as 'total', tgl_pdam FROM tbl_stand_pdam WHERE MONTH(tgl_pdam) = $bulan AND YEAR(tgl_pdam) = $tahun GROUP BY DAY(tgl_pdam)");
		return $query->result();
	}

	public function lihat_min()
	{
		$tanggal = date('Y-m-d');
		$query = $this->db->query("SELECT MIN(penggunaan) as 'total' FROM tbl_stand_pdam WHERE tgl_pdam = '$tanggal' ");
		return $query->result();
	}

	public function lihat_max()
	{
		$tanggal = date('Y-m-d');
		$query = $this->db->query("SELECT MAX(penggunaan) as 'total' FROM tbl_stand_pdam WHERE tgl_pdam = '$tanggal' ");
		return $query->result();
	}

	public function lihat_avg()
	{
		$tanggal = date('Y-m-d');
		$query = $this->db->query("SELECT AVG(penggunaan) as 'total' FROM tbl_stand_pdam WHERE tgl_pdam = '$tanggal' ");
		return $query->result();
	}

	public function update($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function hapus_pdam($id)
    {
        $this->db->where('ID_pdam',$id);
        $this->db->delete('tbl_stand_pdam');
    }

    public function tampil_cetak_pdam($tgl_awal,$tgl_akhir)
    {
    	$query = $this->db->query("SELECT *
									FROM tbl_stand_pdam i
									LEFT JOIN m_user ii ON i.ID_user = ii.ID_user
									WHERE i.tgl_pdam BETWEEN '$tgl_awal' AND '$tgl_akhir'");
		return $query->result();
    }

    public function tampil_excel_pdam($tgl_awal,$tgl_akhir)
    {
    	$this->db->select('*');
		$this->db->from('tbl_stand_pdam as i');
		$this->db->join('m_user as ii','i.ID_user = ii.ID_user');
		$this->db->where('i.tgl_pdam BETWEEN "'. date('Y-m-d', strtotime($tgl_awal)). '" and "'. date('Y-m-d', strtotime($tgl_akhir)).'" ');
		$query = $this->db->get();
		return $query->result();
    }
}
 ?>