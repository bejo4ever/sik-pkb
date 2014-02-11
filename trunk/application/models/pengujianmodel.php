<?php

class pengujianmodel extends CI_Model
{
	private $tbl	= 'detail_hasil_pengujian';
	private $tbl2	= 'hasil_pengujian';
	
	function __construct()
	{
		parent::__construct();
	}
	
	function getHasilUjiFisik($noBap, $kdItem, $tipe)
	{
		$query = $this->db->query("SELECT * FROM detail_hasil_pengujian WHERE no_bap = '$noBap' AND kd_itempengujian = '$kdItem' ");
		foreach ($query->result() as $row)
		{
			if($tipe=="hasil")
			{
		   		return $row->status_hasil;
			}
			elseif($tipe=="penguji")
			{
				return $row->NRP;
			}
			else
			{
				return $row->hasil_uji;
			}
		}
	}

	function getVerifikasi($id,$tipe)
	{
		$query = $this->db->query("SELECT * FROM hasil_pengujian WHERE no_pendaftaran ='$id' AND hasil_pengujian='Lulus' ");
		foreach ($query->result() as $row)
		{
			if($tipe=="status")
			{
				return $row->hasil_pengujian;
			}
			elseif($tipe=="tgl")
			{
				return $row->tgl_pengujian;
			}
			elseif($tipe=="ket")
			{
				return $row->keterangan;
			}
		}
	}

	function getStatus($id)
	{
		$query = $this->db->query("SELECT * FROM hasil_pengujian a, penguji b WHERE a.NRP = b.NRP AND a.no_pendaftaran ='$id' ");
		return $query->result();
	}

	function getTidakLulus()
	{
		$query = $this->db->query("SELECT * FROM hasil_pengujian a, pendaftaran b WHERE a.hasil_pengujian = 'Tidak Lulus' AND a.no_pendaftaran = b.no_pendaftaran ORDER BY a.tgl_pengujian DESC");
		return $query->result();
	}

	function getTidakLulusLama()
	{
		$query = $this->db->query("SELECT * FROM hasil_pengujian WHERE hasil_pengujian = 'Tidak Lulus' ORDER BY tgl_pengujian DESC");
		return $query->result();
	}

	function saveUjiFisik($varData){
		$this->db->insert($this->tbl, $varData);
		return $this->db->insert_id();
	}

	function updateUjiFisik($id1,$id2,$varData){
		$where = "no_bap = $id1 AND kd_itempengujian = $id2"; 
		$this->db->update($this->tbl, $varData, $where);
	}
	
	function simpanStatus($varData){
		$this->db->insert($this->tbl2, $varData);
		return $this->db->insert_id();
	}

	function updateStatus($id, $data){
		$this->db->where('no_pendaftaran', $id);
		$this->db->update($this->tbl2, $data);
	}

	function setRp($nilai) 
	{   
		$panjang=strlen($nilai);
		if($panjang>3&&$panjang<=6)
		{	
			$awal=substr($nilai,0,-3);
			$akhir=substr($nilai,-3);
			$uang="$awal.$akhir";
			return $uang;
		}
		elseif($panjang>6&&$panjang<=9)
		{
			$awal=substr($nilai,0,-6);
			$tengah1=substr($nilai,-6,3);
			$akhir=substr($nilai,-3);
			$uang="$awal.$tengah1.$akhir";
			return $uang;	
		}
		elseif($panjang>9&&$panjang<=12)
		{
			$awal=substr($nilai,0,-9);
			$tengah1=substr($nilai,-9,3);
			$tengah2=substr($nilai,-6,3);
			$akhir=substr($nilai,-3);
			$uang="$awal.$tengah1.$tengah2.$akhir";
			return $uang;
		}
		elseif($panjang>=12&&$panjang<=15)
		{
			$awal=substr($nilai,0,-12);
			$tengah1=substr($nilai,-9,3);
			$tengah2=substr($nilai,-6,3);
			$tengah3=substr($nilai,-3,3);
			$akhir=substr($nilai,-3);
			$uang="$awal.$tengah1.$tengah2.$tengah3.$akhir";
			return $uang;
		}
		else {
			return $nilai;
		}
  	}
}