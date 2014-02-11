<?php

class klasifikasiuji_model extends CI_Model
{
	private $tbl= 'klasifikasi_uji';
	
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
  		$query = $this->db->query("SELECT * FROM klasifikasi_uji ORDER BY kd_klasifikasi ASC");
		return $query->result();
  	}
	function getbyid($id){
		$this->db->where('kd_klasifikasi',$id);
		return $this->db->get($this->tbl);
	}
	function save($varData){
		$this->db->insert($this->tbl, $varData);
		return $this->db->insert_id();
	}
	function update($id, $data){
		$this->db->where('kd_klasifikasi', $id);
		$this->update($this->tbl, $data);
	}
	function delete($id){
		$this->db->where('kd_klasifikasi', $id);
		$this->db->delete($this->tbl);
	}
	function getNoBaru()
	{
		$query = $this->db->query("SELECT * FROM klasifikasi_uji ORDER BY kd_klasifikasi DESC LIMIT 1");
		foreach ($query->result() as $row)
		{
		   $no_daftar		= $row->kd_klasifikasi;
		   $no_daftar_baru	= $no_daftar+1;
		}
		
		if($no_daftar_baru=="")
		{
			$no_daftar_baru	= $this->session->userdata('kdUnit')."1";
		}
		
		return $no_daftar_baru;
	}
}

