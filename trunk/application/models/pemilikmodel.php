<?php

class pemilikmodel extends CI_Model
{
	private $tbl= 'pemilik_kendaraan';
	
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
	
	function save($varData){
		$this->db->insert($this->tbl, $varData);
		return $this->db->insert_id();
	}
	
	function update($id, $data){
		$this->db->where('no_kendaraan', $id);
		$this->db->update($this->tbl, $data);
	}
	
	function delete($id){
		$this->db->where('no_kendaraan', $id);
		$this->db->delete($this->tbl);
	}
	
	function getPemilik ($nosrut) {
		$query = $this->db->query("SELECT * FROM pemilik_kendaraan WHERE no_srut = '$nosrut' ");
		return $query->result();
	}
	
	function getNamaPemilik ($nosrut) {
		$query = $this->db->query("SELECT * FROM pemilik_kendaraan WHERE no_srut = '$nosrut' ");
		foreach ($query->result() as $row) {
		   return $row->nama;
		}
	}
	
	function getAlamat ($nosrut) {
		$query = $this->db->query("SELECT * FROM pemilik_kendaraan WHERE no_srut = '$nosrut' ");
		foreach ($query->result() as $row) {
		   return $row->alamat;
		}
	}
	
	function getJmlPemilik ($nosrut) {
		$query = $this->db->query("SELECT count(*) as jumlah FROM ".$this->tbl." WHERE no_srut='".$nosrut."' ");
		foreach ($query->result() as $row) {
		   return $row->jumlah;
		}
	}
}

