<?php

class peralatanuji_model extends CI_Model
{
	private $tbl	= 'peralatan_uji';
	
	function __construct()
	{
		parent::__construct();
	}

	function getAlat()
	{
		$query = $this->db->query("SELECT * FROM peralatan_uji a, kelompok_uji b WHERE a.kd_kelompok = b.kd_kelompok ORDER BY a.nama_alat ASC");
		return $query->result();
	}

	function getById($id)
	{
		$query = $this->db->query("SELECT * FROM peralatan_uji WHERE kode_alat ='$id' ");
		return $query->result();
	}

	function getKodeAlat()
	{
		$query = $this->db->query("SELECT * FROM peralatan_uji ORDER BY kode_alat DESC LIMIT 1");
		foreach ($query->result() as $row)
		{
		   $no_alat			= $row->kode_alat;
		   $no_alat_baru	= $no_alat+1;
		}
		
		if($no_alat_baru=="")
		{
			$no_alat_baru	= $this->session->userdata('kdUnit')."1";
		}
		
		return $no_alat_baru;
	}

	function getItemUji()
	{
		$query = $this->db->query("SELECT * FROM kelompok_uji ORDER BY kd_kelompok ASC");
		return $query->result();
	}

	function save($varData){
		$this->db->insert($this->tbl, $varData);
		return $this->db->insert_id();
	}

	function update($id, $data){
		$this->db->where('kode_alat', $id);
		$this->db->update($this->tbl, $data);
	}

	function delete($id){
		$this->db->where('kode_alat', $id);
		$this->db->delete($this->tbl);
	}
}
