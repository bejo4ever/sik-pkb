<?php
 
class penguji_model extends CI_Model
{
	private $tbl	= 'penguji';
	
	function __construct()
	{
		parent::__construct();
	}

	// Fungsi untuk manipulasi data penguji
	function getPenguji()
	{
		$query = $this->db->query("SELECT * FROM penguji ORDER BY nama_penguji ASC");
		return $query->result();
	}

	function getById($id)
	{
		$query = $this->db->query("SELECT * FROM penguji WHERE NRP ='$id' ");
		return $query->result();
	}

	function getNamaPenguji($nrp)
	{
		$query = $this->db->query("SELECT * FROM penguji WHERE NRP = '$nrp' ");
		foreach ($query->result() as $row) {
		   return $row->nama_penguji;
		}
	}

	function save($varData){
		$this->db->insert($this->tbl, $varData);
		return $this->db->insert_id();
	}

	function update($id, $data){
		$this->db->where('NRP', $id);
		$this->db->update($this->tbl, $data);
	}

	function delete($id){
		$query = array('penguji','penghargaan_penguji', 'sanksi_penguji','sertifikat_penguji','riwayat_pendidikan');
		$this->db->where('NRP', $id);
		$this->db->delete($query);
	}
	
	// Fungsi untuk manipulasi data sertifikat penguji
	function getAllSertifikat()
	{
		$query = $this->db->query("SELECT * FROM sertifikat_penguji");
		return $query->result();
	}
	
	function getSertifikat($id)
	{
		$query = $this->db->query("SELECT a.*, b.nama_penguji FROM sertifikat_penguji a, penguji b WHERE a.NRP = '$id' AND a.NRP = b.NRP ORDER BY no_sertifikat ASC");
		return $query->result();
	}
	
	function getdetailSertifikat($id)
	{
		$query = $this->db->query("SELECT * FROM sertifikat_penguji WHERE no_sertifikat = '$id' ORDER BY tgl_terbit ASC");
		return $query->result();
	}
	
	function saveSertifikat($varData)
	{
		$this->db->insert('sertifikat_penguji', $varData);
		return $this->db->insert_id();
	}
	
	function updatedetailSertifikat($id, $data){
		$this->db->where('no_sertifikat', $id);
		$this->db->update('sertifikat_penguji', $data);
	}
	
	function deleteSertifikat($id){
		$this->db->where('no_sertifikat', $id);
		$this->db->delete('sertifikat_penguji');
	}
	
	// Fungsi untuk manipulasi data riwayat pendidikan penguji
	function getAllRiwayat()
	{
		$query = $this->db->query("SELECT * FROM riwayat_pendidikan");
		return $query->result();
	}

	function getRiwayat($id)
	{
		$query = $this->db->query("SELECT a.*, b.nama_penguji FROM riwayat_pendidikan a, penguji b WHERE a.NRP = '$id' AND a.NRP = b.NRP");
		return $query->result();
	}

	function getRiwayatKd($id)
	{
		$query = $this->db->query("SELECT * FROM riwayat_pendidikan WHERE kd_riwayat='$id' ");
		return $query->result();
	}

	function getidRiwayatBaru($id)
	{
		$query = $this->db->query("SELECT * FROM riwayat_pendidikan WHERE NRP = '$id' ORDER BY kd_riwayat DESC LIMIT 1");
		foreach ($query->result() as $row)
		{
		   $no_daftar		= $row->kd_riwayat;
		   $no_daftar_baru	= $no_daftar+1;
		}
		
		if($no_daftar_baru=="")
		{
			$no_daftar_baru	= $id."1";
		}
		
		return $no_daftar_baru;
	}

	function saveRiwayat($varData)
	{
		$this->db->insert('riwayat_pendidikan', $varData);
		return $this->db->insert_id();
	}

	function updateRiwayat($id, $data){
		$this->db->where('kd_riwayat', $id);
		$this->db->update('riwayat_pendidikan', $data);
	}

	function deleteRiwayat($id){
		$this->db->where('kd_riwayat', $id);
		$this->db->delete('riwayat_pendidikan');
	}
	
	// Fungsi untuk manipulasi data penghargaan penguji
	function getAllPenghargaan()
	{
		$query = $this->db->query("SELECT * FROM penghargaan_penguji");
		return $query->result();
	}

	function getPenghargaan($id)
	{
		$query = $this->db->query("SELECT a.*, b.nama_penguji FROM penghargaan_penguji a, penguji b WHERE a.NRP = '$id' AND a.NRP = b.NRP");
		return $query->result();
	}

	function getPenghargaanKd($id)
	{
		$query = $this->db->query("SELECT * FROM penghargaan_penguji WHERE kd_penghargaan='$id' ");
		return $query->result();
	}

	function getidPenghargaanBaru($id)
	{
		$query = $this->db->query("SELECT * FROM penghargaan_penguji WHERE NRP = '$id' ORDER BY kd_penghargaan DESC LIMIT 1");
		foreach ($query->result() as $row)
		{
		   $no_daftar		= $row->kd_penghargaan;
		   $no_daftar_baru	= $no_daftar+1;
		}
		
		if($no_daftar_baru=="")
		{
			$no_daftar_baru	= $id."1";
		}
		
		return $no_daftar_baru;
	}

	function savePenghargaan($varData)
	{
		$this->db->insert('penghargaan_penguji', $varData);
		return $this->db->insert_id();
	}

	function updatePenghargaan($id, $data){
		$this->db->where('kd_penghargaan', $id);
		$this->db->update('penghargaan_penguji', $data);
	}

	function deletePenghargaan($id){
		$this->db->where('kd_penghargaan', $id);
		$this->db->delete('penghargaan_penguji');
	}
	
	// Fungsi untuk manipulasi data sanksi penguji
	function getAllSanksi()
	{
		$query = $this->db->query("SELECT * FROM sanksi_penguji");
		return $query->result();
	}

	function getSanksi($id)
	{
		$query = $this->db->query("SELECT a.*, b.nama_penguji  FROM sanksi_penguji a, penguji b WHERE a.NRP = '$id' AND a.NRP = b.NRP");
		return $query->result();
	}

	function getSanksiKd($id)
	{
		$query = $this->db->query("SELECT * FROM sanksi_penguji WHERE kd_sanksi='$id' ");
		return $query->result();
	}

	function getidSanksiBaru($id)
	{
		$query = $this->db->query("SELECT * FROM sanksi_penguji WHERE NRP = '$id' ORDER BY kd_sanksi DESC LIMIT 1");
		foreach ($query->result() as $row)
		{
		   $no_daftar		= $row->kd_sanksi;
		   $no_daftar_baru	= $no_daftar+1;
		}
		
		if($no_daftar_baru=="")
		{
			$no_daftar_baru	= $id."1";
		}
		
		return $no_daftar_baru;
	}

	function saveSanksi($varData)
	{
		$this->db->insert('sanksi_penguji', $varData);
		return $this->db->insert_id();
	}

	function updateSanksi($id, $data){
		$this->db->where('kd_sanksi', $id);
		$this->db->update('sanksi_penguji', $data);
	}

	function deleteSanksi($id){
		$this->db->where('kd_sanksi', $id);
		$this->db->delete('sanksi_penguji');
	}
}