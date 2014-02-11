<?php
class Kabkotamodel extends CI_Model 
{
	private $tbl= 'kabkota';
	
	function __construct()
	{
		parent::__construct();
	}
	
	function count_kabkota() 
	{   
	  	return $this->db->count_all($this->tbl);
  	}
	
	function getNama($id)
	{
		$query = $this->db->query("SELECT * FROM kabupaten WHERE kode_kabkota ='$id' ");
		foreach ($query->result() as $row)
		{
		   return $row->nama_kabkota;
		}
	}
	
	function search($tipe,$key)
	{
		if($tipe=="nama_provinsi"){ $qAdd="b.nama_provinsi"; }else{ $qAdd="a.nama_kabkota"; }
		$query=$this->db->query("select * from kabupaten a,provinsi b WHERE $qAdd LIKE '%$key%' AND a.kode_provinsi=b.kode_provinsi");
		return $query->result();
	}
	
	function get_list_kabkota($limit = 10, $offset = 0) 
  	{
		if($offset==""){ $offset=0; }
  		$query =$this->db->query("select * from kabkota a,provinsi b where a.kode_provinsi=b.kode_provinsi  ORDER BY a.kode_provinsi ASC LIMIT $offset,$limit");
		return $query->result();
  	}
 	
	function getKabkota()
	{
		$query =$this->db->query("select * from kabkota");
		return $query->result();
	}
 	
	function getKabkotaByKode($kode)
	{
		$query =$this->db->query("SELECT * FROM kabkota WHERE kode_kabkota = '$kode' ");
		return $query->result();
	}
	
	function get_prov_by_kab($kab) 
  	{
		if($offset==""){ $offset=0; }
  		$query =$this->db->query("select * from kabkota a,provinsi b where a.kode_kabkota = '$kab' AND a.kode_provinsi=b.kode_provinsi");
		return $query->result();
  	}
	
	function get_by_prop($id){
		$this->db->where('kode_provinsi', $id);
		$this->db->order_by('nama_kabkota','ASC');
		return $this->db->get($this->tbl);
	}
	
	function get_by_id($id){
		$this->db->where('kode_kabkota',$id);
		$this->db->join('provinsi','provinsi.kode_provinsi = kabkota.kode_provinsi');
		return $this->db->get($this->tbl)->result();
	}
	
	function save($varData){
		$this->db->insert($this->tbl, $varData);
		return $this->db->insert_id();
	}
	
	function update($id, $data){
		$this->db->where('kode_kabkota', $id);
		$this->db->update($this->tbl, $data);
	}
	
	function delete($id){
		$this->db->where('kode_kabkota', $id);
		$this->db->delete($this->tbl);
	}
	
	function checkByKode($kode_kabkota)
		{
			$this->db->where('kode_kabkota', $kode_kabkota);
			//$this->db->where('id_level', $id);
			return $this->db->get($this->tbl);
		}
		
	function checkByKabkota($nama_kabkota)
		{
			$this->db->where('nama_kabkota', $nama_kabkota);
			//$this->db->where('id_level', $id);
			return $this->db->get($this->tbl);
		}
	
}
?>
