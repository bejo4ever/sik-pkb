<?php
class propinsiModel extends CI_Model 
{
	private $tbl= 'provinsi';
	
	function __construct()
	{
		parent::__construct();
	}
	function count_propinsi() 
	{   
	  	return $this->db->count_all($this->tbl);
  	}
	function search($key)
	{
		$this->db->like('nama_provinsi',$key);
		return $this->db->get($this->tbl);
	}
	function getNama($id)
	{
		$query = $this->db->query("SELECT * FROM provinsi WHERE kode_provinsi ='$id' ");
		foreach ($query->result() as $row)
		{
		   return $row->nama_provinsi;
		}
	}
	function get_list_propinsi($limit = 10, $offset = 0) 
  	{
  		$this->db->order_by('nama_provinsi','asc');
		return $this->db->get($this->tbl,$limit,$offset);
  	} 
	function getAll() 
  	{
  		$query = $this->db->query("SELECT * FROM provinsi ORDER BY kode_provinsi ASC");
		return $query->result();
  	}
	
	function get_by_id($id){
		$this->db->where('kode_provinsi', $id);
		return $this->db->get($this->tbl)->result();
		
	//	return $this->db->get_where($this->tbl, array('kode_provinsi'=>$id))->row();
		
	}
	
	function save($varData){
		$this->db->insert($this->tbl, $varData);
		return $this->db->insert_id();
	}
	function update($id)
	{
		$this->db->where('kode_provinsi', $id)->update($this->tbl, $_POST);
	}
	function delete($id){
		$query = array('provinsi', 'kabkota');
		$this->db->where('kode_provinsi', $id);
		$this->db->delete($query);
	}
	
	function checkByKode($kode_provinsi)
	{
		$this->db->where('kode_provinsi', $kode_provinsi);
		//$this->db->where('id_level', $id);
		return $this->db->get($this->tbl);
	}
	
	function checkByProv($nama_provinsi)
	{
		$this->db->like('nama_provinsi', $nama_provinsi);
		//$this->db->where('id_level', $id);
		return $this->db->get($this->tbl);
	}
	
}
?>
