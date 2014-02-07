<?php

class unitpkb_model extends CI_Model
{
	private $tbl1	= 'unit_pkb';
	private $tbl2	= 'fasilitas';
	
	function __construct()
	{
		parent::__construct();
	}

	function getUnitPKB()
	{
		$query = $this->db->query("SELECT * FROM unit_pkb");
		return $query->result();
	}

	function getUnitPKB0()
	{
		$query = $this->db->query("SELECT unit_pkb.*,kabkota.kode_provinsi FROM unit_pkb, kabkota WHERE unit_pkb.kode_dishub = kabkota.kode_kabkota");
		return $query->result();
	}

	function getDetUnitPKB($id)
	//function getUnitById($id)
	{
		$query = $this->db->query("SELECT * FROM unit_pkb where kode_unit ='$id'");
		return $query->result();
	}

	function getKodeUnit()
	{
		$query = $this->db->query("SELECT * FROM unit_pkb");
		foreach ($query->result() as $row)
		{
		   $kodeUnit = $row->kode_unit;
		}
		return $kodeUnit;
	}

	function save($varData){
		$this->db->insert($this->tbl1, $varData);
		return $this->db->insert_id();
	}

	function update($id, $data){
		$this->db->where('kode_unit', $id);
		$this->db->update($this->tbl1, $data);
	}

	function delete($id){
		$this->db->where('kode_unit', $id);
		$this->db->delete($this->tbl1);
	}
	
	function getFasilitas()
	{
		$query = $this->db->query("SELECT * FROM fasilitas");
		return $query->result();
	}

	function getFasilitasById($id)
	{
		$query = $this->db->query("SELECT * FROM fasilitas WHERE kd_fasilitas = '$id' ");
		return $query->result();
	}

	function getFasilitasBaru($id)
	{
		$query = $this->db->query("SELECT * FROM fasilitas WHERE kode_unit = '$id' ORDER BY kd_fasilitas DESC LIMIT 1");
		foreach ($query->result() as $row)
		{
		   $no_daftar		= $row->kd_fasilitas;
		   $no_daftar_baru	= $no_daftar+1;
		}
		
		if($no_daftar_baru=="")
		{
			$no_daftar_baru	= $id."1";
		}
		
		return $no_daftar_baru;
	}

	function saveFasilitas($varData){
		$this->db->insert($this->tbl2, $varData);
		return $this->db->insert_id();
	}

	function updateFasilitas($id, $data){
		$this->db->where('kd_fasilitas', $id);
		$this->db->update($this->tbl2, $data);
	}

	function deleteFasilitas($id){
		$this->db->where('kd_fasilitas', $id);
		$this->db->delete($this->tbl2);
	}
}