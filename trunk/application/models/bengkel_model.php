<?php

class bengkel_model extends CI_Model
{
	private $tbl	= 'bengkel';
	
	function __construct()
	{
		parent::__construct();
	}
	function getBengkel()
	{
		$query = $this->db->query("SELECT * FROM bengkel");
		return $query->result();
	}
	function save($varData){
		$this->db->insert($this->tbl, $varData);
		return $this->db->insert_id();
	}
	function update($id, $data){
		$this->db->where('kode_bengkel', $id);
		$this->db->update($this->tbl, $data);
	}
	function delete($id){
		$this->db->where('kode_bengkel', $id);
		$this->db->delete($this->tbl);
	}
}

