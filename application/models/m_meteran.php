<?php 


class m_meteran extends CI_Model
{
	public function lihat_meter()
	{
		$query = $this->db->query("SELECT * 
									FROM tbl_stand_meter i
									LEFT JOIN m_user ii ON i.ID_user = ii.ID_user
									ORDER BY i.date_stan_meter DESC");
		return $query;
	}

	public function getmeter($id)
	{
		$query = $this->db->query("SELECT * FROM tbl_stand_meter WHERE ID_stand_meter = $id");
		return $query;
	}

	public function lihat_grafik()
	{		
		$tahun = date('Y');
		$bulan = date('m');
		$query = $this->db->query("SELECT SUM(kvarh) as 'total', date_stan_meter FROM tbl_stand_meter WHERE YEAR(date_stan_meter) = $tahun AND MONTH(date_stan_meter) = $bulan GROUP BY DAY(date_stan_meter)");
		return $query->result();
	}

	public function lihat_min()
	{
		$tanggal = date('Y-m-d');
		$query = $this->db->query("SELECT MIN(kvarh) as 'total' FROM tbl_stand_meter WHERE date_stan_meter = '$tanggal' ");
		return $query->result();
	}

	public function lihat_max()
	{
		$tanggal = date('Y-m-d');
		$query = $this->db->query("SELECT MAX(kvarh) as 'total' FROM tbl_stand_meter WHERE date_stan_meter = '$tanggal' ");
		return $query->result();
	}

	public function lihat_avg()
	{
		$tanggal = date('Y-m-d');
		$query = $this->db->query("SELECT AVG(kvarh) as 'total' FROM tbl_stand_meter WHERE date_stan_meter = '$tanggal' ");
		return $query->result();
	}
	
	public function tambah_meter(){
		
		$data = array(
			'ID_stand_meter'		=> null,
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

		$this->db->insert('tbl_stand_meter',$data);
	}

	public function update($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function hapus_meter($id)
    {
        $this->db->where('ID_stand_meter',$id);
        $this->db->delete('tbl_stand_meter');
    }

    public function tampil_cetak_meter($tgl_awal,$tgl_akhir)
    {
    	$query = $this->db->query("SELECT *
									FROM tbl_stand_meter i
									LEFT JOIN m_user ii ON i.ID_user = ii.ID_user
									WHERE i.date_stan_meter BETWEEN '$tgl_awal' AND '$tgl_akhir'");
		return $query->result();
    }

    public function tampil_excel_meter($tgl_awal,$tgl_akhir)
    {
    	$this->db->select('*');
		$this->db->from('tbl_stand_meter as i');
		$this->db->join('m_user as ii','i.ID_user = ii.ID_user');
		$this->db->where('i.date_stan_meter BETWEEN "'. date('Y-m-d', strtotime($tgl_awal)). '" and "'. date('Y-m-d', strtotime($tgl_akhir)).'" ');
		$query = $this->db->get();
		return $query->result();
    }
}
 ?>