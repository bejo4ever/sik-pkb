<?php
class exportsmodel extends CI_Model
{
	private $tbl1	= 'pendaftaran';
	private $tbl2	= 'uraian_kendaraan';
	private $tbl3	= 'detail_hasil_pengujian';
	private $tbl4	= 'hasil_pengujian';
	
	function __construct()
	{
		parent::__construct();
	}
  	
  	function getAllDataUraianKendaraan($periode) {
  		$query = $this->db->query("SELECT * FROM ".$this->tbl2." tb2, ".$this->tbl1." tb1 WHERE tb2.no_srut = tb1.no_srut AND DATE_FORMAT(tgl_pendaftaran, '%c-%Y') = '".$periode."' ");
		return $query->result();
  	}

	function getAllDataPendaftaran($periode) {
  		$query = $this->db->query("SELECT * FROM ".$this->tbl1." WHERE DATE_FORMAT(tgl_pendaftaran, '%c-%Y') = '".$periode."' ");
		return $query->result();
  	}
  	
  	function getAllDataDetailHasilUji($periode) {
  		$query = $this->db->query("SELECT * FROM ".$this->tbl3." tb2, ".$this->tbl1." tb1 WHERE tb2.no_bap = tb2.no_bap AND DATE_FORMAT(tgl_pendaftaran, '%c-%Y') = '".$periode."' ");
		return $query->result();
  	}

	function getAllDataHasilUji($periode) {
  		$query = $this->db->query("SELECT * FROM ".$this->tbl4." tb2, ".$this->tbl1." tb1 WHERE tb2.no_pendaftaran = tb1.no_pendaftaran AND DATE_FORMAT( tgl_pendaftaran, '%c-%Y') = '".$periode."' ");
		return $query->result();
  	}
  	
  	function getAllKeberatan($periode) {
  		$query = $this->db->query("SELECT * FROM keberatan WHERE DATE_FORMAT(tgl_keberatan, '%c-%Y') = '$periode' ");
		return $query->result();
  	}
}