<?php

class master_model extends CI_Model
{
	private $tbl	= 'jenis_kendaraan';
	private $tbl2	= 'status_kendaraan';
	private $tbl3	= 'dishub';
	
	function __construct()
	{
		parent::__construct();
	}
	function count_data($id) 
	{
		switch($id)
		{
			case"1"; $tbl=$this->tbl; break;
		}   
		return $this->db->count_all($tbl);
	}
	function getDinas()
	{
		$query = $this->db->query("SELECT * FROM dishub a,kabkota b WHERE a.kode_kabkota = b.id_kabkota");
		return $query->result();
	}
	function getidJenisKendaraanBaru()
	{
		$query = $this->db->query("SELECT * FROM jenis_kendaraan ORDER BY id_jeniskendaraan DESC LIMIT 1");
		foreach ($query->result() as $row)
		{
		   $no_daftar		= $row->id_jeniskendaraan;
		   $no_daftar_baru	= $no_daftar+1;
		}
		
		if($no_daftar_baru=="")
		{
			$no_daftar_baru	= "1";
		}
		
		return $no_daftar_baru;
	}
	function getAllKelompokKendaraan()
	{
		$query	= $this->db->query("SELECT * FROM kelompok_kendaraan ORDER BY id_kelompokkendaraan");
		return $query->result(); 
	}
	function getAllJenisKendaraan() 
  	{
  		$query = $this->db->query("SELECT * FROM jenis_kendaraan a, kelompok_kendaraan b WHERE a.id_kelompokkendaraan = b.id_kelompokkendaraan ORDER BY id_jeniskendaraan ASC");
		return $query->result();
  	}
	function namaJenis($id)
	{
		$query = $this->db->query("SELECT * FROM jenis_kendaraan WHERE id_jeniskendaraan = '$id'");
		foreach($query->result() as $row)
		{	
			return $row->detail;
		}
	}
	function namaKelompok($id)
	{
		$query = $this->db->query("SELECT * FROM kelompok_kendaraan WHERE id_kelompokkendaraan = '$id'");
		foreach($query->result() as $row)
		{	
			return $row->nama_kelompok;
		}
	}
	function getbyidJenisKendaraan($id){
		$this->db->where('id_jeniskendaraan',$id);
		return $this->db->get($this->tbl);
	}
	function getbyidKelKendaraan($id){
		$this->db->where('id_kelompokkendaraan',$id);
		return $this->db->get($this->tbl);
	}
	function saveJenisKendaraan($varData){
		$this->db->insert($this->tbl, $varData);
		return $this->db->insert_id();
	}
	function updateJenisKendaraan($id, $data){
		$this->db->where('id_jeniskendaraan', $id);
		$this->db->update($this->tbl, $data);
	}
	function deleteJenisKendaraan($id){
		$this->db->where('id_jeniskendaraan', $id);
		$this->db->delete($this->tbl);
	}
	function getAllTipeKendaraan() 
  	{
  		$query = $this->db->query("SELECT * FROM status_kendaraan ORDER BY id_statuskendaraan ASC");
		return $query->result();
  	}
	function namaTipe($id)
	{
		$query = $this->db->query("SELECT * FROM status_kendaraan WHERE id_statuskendaraan = '$id'");
		foreach($query->result() as $row)
		{	
			return $row->detail;
		}
	}
	function getbyidTipeKendaraan($id){
		$this->db->where('id_statuskendaraan',$id);
		return $this->db->get($this->tbl2);
	}
	function saveTipeKendaraan($varData){
		$this->db->insert($this->tbl2, $varData);
		return $this->db->insert_id();
	}
	function updateTipeKendaraan($id, $data){
		$this->db->where('id_statuskendaraan', $id);
		$this->db->update($this->tbl2, $data);
	}
	function deleteTipeKendaraan($id){
		$this->db->where('id_statuskendaraan', $id);
		$this->db->delete($this->tbl2);
	}
}

