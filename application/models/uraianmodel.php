<?php

class uraianmodel extends CI_Model
{
	private $tbl	= 'uraian_kendaraan';
	
	function __construct()
	{
		parent::__construct();
	}

	function getAllData() 
  	{
  		$query = $this->db->query("SELECT * FROM kendaraan");
		return $query->result();
  	}

	function getById($noP)
	{
		$this->db->where('no_srut', $noP);
		return $this->db->get($this->tbl);
	}

	function getNoSRUT($noBap)
	{
		$query = $this->db->query("SELECT * FROM uraian_kendaraan WHERE no_bap = '$noBap' ");
		foreach ($query->result() as $row)
		{
		   return $row->no_srut;
		}
	}

	function getNoBAP($noSrut)
	{
		$query = $this->db->query("SELECT * FROM uraian_kendaraan WHERE no_srut = '$noSrut' ");
		foreach ($query->result() as $row)
		{
		   return $row->no_bap;
		}
	}
	
	function save($varData){
		$this->db->insert($this->tbl, $varData);
		return $this->db->insert_id();
	}

	function update($id, $data){
		$this->db->where('no_srut', $id);
		$this->db->update($this->tbl, $data);
	}

	function delete($id){
		$this->db->where('no_srut', $id);
		$this->db->delete($this->tbl);
	}
}

