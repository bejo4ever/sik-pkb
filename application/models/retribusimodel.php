<?php

class retribusimodel extends CI_Model
{
	private $tbl= 'retribusi';
	
	function __construct()
	{
		parent::__construct();
	}

	function count_data() 
	{
		return $this->db->count_all($this->tbl);
	}

	function getAllData() 
  	{
  		$query = $this->db->query("SELECT * FROM retribusi ORDER BY kd_retribusi ASC");
		return $query->result();
  	}

	function getbyid($id){
		$this->db->where('kd_retribusi',$id);
		return $this->db->get($this->tbl);
	}

	function getNoBaru()
	{
		$query = $this->db->query("SELECT * FROM retribusi ORDER BY kd_retribusi DESC LIMIT 1");
		foreach ($query->result() as $row)
		{
		   $no_daftar		= $row->kd_retribusi;
		   $no_daftar_baru	= $no_daftar+1;
		}
		
		if($no_daftar_baru=="")
		{
			$no_daftar_baru	= $this->session->userdata('kdUnit')."1";
		}
		
		return $no_daftar_baru;
	}

	function save($varData){
		$this->db->insert($this->tbl, $varData);
		return $this->db->insert_id();
	}

	function update($id, $data){
		$this->db->where('kd_retribusi', $id);
		$this->db->update($this->tbl, $data);
	}

	function delete($id){
		$this->db->where('kd_retribusi', $id);
		$this->db->delete($this->tbl);
	}
}

