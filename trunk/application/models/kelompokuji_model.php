<?php

class kelompokuji_model extends CI_Model
{
	private $tbl= 'kelompok_uji';
	
	function __construct()
	{
		parent::__construct();
	}
	function count_data() 
	{   
		return $this->db->count_all($this->tbl);
	}
	function getAll() 
  	{
  		$query = $this->db->query("SELECT * FROM kelompok_uji a, klasifikasi_uji b WHERE a.kd_klasifikasi = b.kd_klasifikasi ORDER BY kd_kelompok ASC");
		return $query->result();
  	}
	function getbyid($id){
		$this->db->where('kd_kelompok',$id);
		return $this->db->get($this->tbl);
	}
	function save($varData){
		$this->db->insert($this->tbl, $varData);
		return $this->db->insert_id();
	}
	function update($id, $data){
		$this->db->where('kd_kelompok', $id);
		$this->update($this->tbl, $data);
	}
	function delete($id){
		$this->db->where('kd_kelompok', $id);
		$this->db->delete($this->tbl);
	}
	function getNoBaru()
	{
		$query = $this->db->query("SELECT * FROM kelompok_uji ORDER BY kd_kelompok DESC LIMIT 1");
		foreach ($query->result() as $row)
		{
		   $no_daftar		= $row->kd_kelompok;
		   $no_daftar_baru	= $no_daftar+1;
		}
		
		if($no_daftar_baru=="")
		{
			$no_daftar_baru	= $this->session->userdata('kdUnit')."1";
		}
		
		return $no_daftar_baru;
	}
}

