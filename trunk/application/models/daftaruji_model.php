<?php

class daftaruji_model extends CI_Model
{
	private $tbl	= 'daftar_uji';
	
	function __construct()
	{
		parent::__construct();
	}
	function getKelompokUji($tipe)
	{
		$query = $this->db->query("SELECT * FROM kelompok_uji a, jenis_uji b, daftar_uji c WHERE a.kd_klasifikasi ='$tipe' AND a.kd_kelompok = b.kd_kelompok AND b.kd_jenisuji = c.kd_jenisuji ");
		return $query->result();
	}
	function getAllData() 
  	{
  		$query = $this->db->query("SELECT * FROM kelompok_uji a, jenis_uji b, daftar_uji c WHERE a.kd_kelompok = b.kd_kelompok AND b.kd_jenisuji = c.kd_jenisuji");
		return $query->result();
  	}
	function save($varData){
		$this->db->insert($this->tbl, $varData);
		return $this->db->insert_id();
	}
	function update($id, $data){
		$this->db->where('kd_itempengujian', $id);
		$this->db->update($this->tbl, $data);
	}
	function delete($id){
		$this->db->where('kd_itempengujian', $id);
		$this->db->delete($this->tbl);
	}
}

