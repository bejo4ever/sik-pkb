<?php

class kendaraanmodel extends CI_Model
{
	private $tbl= 'kendaraan';
	
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

	function getNoUji($nosrut)
	{
		$query = $this->db->query("SELECT * FROM kendaraan WHERE no_srut = '$nosrut' ");
		foreach ($query->result() as $row) {
		   return $row->no_uji;
		}
	}

	function getNoKendaraan($nosrut)
	{
		$query = $this->db->query("SELECT * FROM kendaraan WHERE no_srut = '$nosrut' ");
		foreach ($query->result() as $row) {
		   return $row->no_kendaraan;
		}
	}

	function getMerek($nosrut)
	{
		$query = $this->db->query("SELECT * FROM kendaraan WHERE no_srut = '$nosrut' ");
		foreach ($query->result() as $row) {
		   return $row->merek;
		}
	}

	function getTipe($nosrut)
	{
		$query = $this->db->query("SELECT * FROM kendaraan WHERE no_srut = '$nosrut' ");
		foreach ($query->result() as $row) {
		   return $row->tipe;
		}
	}

	function getKendaraan($nosrut)
	{
		$query = $this->db->query("SELECT * FROM kendaraan WHERE no_srut = '$nosrut' ");
		return $query->result();
  	}

	function getAllKendaraan() 
  	{
  		$query = $this->db->query("SELECT * FROM kendaraan a, pemilik_kendaraan b, jenis_kendaraan c WHERE a.no_srut = b.no_srut AND a.id_jeniskendaraan = c.id_jeniskendaraan ORDER BY a.no_kendaraan ASC");
		return $query->result();
  	}
	
	function getAllWajibUji($tglAwal,$tglAkhir) 
  	{
  		$query = $this->db->query("SELECT * FROM kendaraan a, pemilik_kendaraan b, jenis_kendaraan c WHERE a.no_srut = b.no_srut AND a.id_jeniskendaraan = c.id_jeniskendaraan AND a.tgl_ujiberikut >= '$tglAwal' AND a.tgl_ujiberikut <= '$tglAkhir' ORDER BY a.tgl_ujiberikut ASC");
		return $query->result();
  	}
	
	function getDetailKendaraan($id)
	{
		$query = $this->db->query("select * from kendaraan a LEFT JOIN pemilik_kendaraan b on a.no_srut = b.no_srut LEFT JOIN  uraian_kendaraan c on a.no_srut = c.no_srut WHERE a.no_srut = '$id' ");
		return $query->result();
	}
	
	function getJumlahUji($jenis,$status)
	{
		$query = $this->db->query("select count(*) as jumlah from kendaraan WHERE id_jeniskendaraan ='$jenis' AND id_statuskendaraan ='$status' ");
		foreach ($query->result() as $row)
		{
		   return $row->jumlah;
		}
	}
	
	function getJumlahUjiKel($kel,$status)
	{
		$query = $this->db->query("SELECT d.nama_kelompok, count(a.no_uji) as jumlah FROM kendaraan a, status_kendaraan b, jenis_kendaraan c, kelompok_kendaraan d WHERE a.id_statuskendaraan = '$status' AND d.id_kelompokkendaraan = '$kel' AND a.id_statuskendaraan = b.id_statuskendaraan AND a.id_jeniskendaraan = c.id_jeniskendaraan AND c.id_kelompokkendaraan = d.id_kelompokkendaraan group BY d.nama_kelompok");
		foreach ($query->result() as $row)
		{
		   $jumlah=$row->jumlah;
		}
		
		if($jumlah==""){ return "0"; }else{ return $jumlah; }
	}
	
	function listPengujian($id)
	{
		$query = $this->db->query("select * from pendaftaran WHERE no_srut = '$id' ");
		return $query->result();
	}
	
	function save($varData){
		$this->db->insert($this->tbl, $varData);
		return $this->db->insert_id();
	}
	
	function update($id, $data){
		$this->db->where('no_kendaraan', $id);
		$this->db->update($this->tbl, $data);
	}
	
	function updateByNoSrut($id, $data){
		$this->db->where('no_srut', $id);
		$this->db->update($this->tbl, $data);
	}
	
	function updateByNoUji($id, $data){
		$this->db->where('no_uji', $id);
		$this->db->update($this->tbl, $data);
	}
	
	function delete($id){
		$this->db->where('no_kendaraan', $id);
		$this->db->delete($this->tbl);
	}
	
	function getJmlKendaraan ($nosrut) {
		$query = $this->db->query("SELECT count(*) as jumlah FROM ".$this->tbl." WHERE no_srut='".$nosrut."' ");
		foreach ($query->result() as $row) {
		   return $row->jumlah;
		}
	}
}