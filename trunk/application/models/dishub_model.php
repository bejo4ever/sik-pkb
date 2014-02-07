<?php

class dishub_model extends CI_Model
{
	private $tbl	= 'dishub';
	
	function __construct()
	{
		parent::__construct();
	}

	function getDishub()
	{
		$query = $this->db->query("SELECT * FROM dishub a, kabkota b, provinsi c WHERE a.kode_kabkota = b.kode_kabkota AND b.kode_provinsi = c.kode_provinsi");
		return $query->result();
	}

	function save($varData){
		$this->db->insert($this->tbl, $varData);
		return $this->db->insert_id();
	}

	function update($id, $data){
		$this->db->where('kode_dishub', $id);
		$this->db->update($this->tbl, $data);
	}

	function delete($id){
		$this->db->where('kode_dishub', $id);
		$this->db->delete($this->tbl);
	}
}