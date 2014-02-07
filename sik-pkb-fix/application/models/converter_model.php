<?php

class converter_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function tgl_In_Eng($date)
	{
		$tgl=explode("-",$date);
		$tglBaru	= $tgl[2]."-".$tgl[1]."-".$tgl[0];
		
		return $tglBaru;
	}

	function tgl_Eng_In($date)
	{
		$tgl=explode("-",$date);
		$tglBaru	= $tgl[2]."-".$tgl[1]."-".$tgl[0];
		
		return $tglBaru;
	}

	function tgl_time_Eng_In($date)
	{
		$tglTime	= explode(" ",$date);
		$tgl		= explode("-",$tglTime[0]);
		$tglBaru	= $tgl[2]."-".$tgl[1]."-".$tgl[0]." ".$tglTime[1];
		
		return $tglBaru;
	}

	function getNamaBulan($id)
	{
		switch($id)
		{
			case"01"; $bulan="Januari"; break;
			case"02"; $bulan="Februari"; break;
			case"03"; $bulan="Maret"; break;
			case"04"; $bulan="April"; break;
			case"05"; $bulan="Mei"; break;
			case"06"; $bulan="Juni"; break;
			case"07"; $bulan="Juli"; break;
			case"08"; $bulan="Agustus"; break;
			case"09"; $bulan="September"; break;
			case"10"; $bulan="Oktober"; break;
			case"11"; $bulan="November"; break;
			case"12"; $bulan="Desember"; break;
		}
		return $bulan;
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
		else{
			return $nilai;
		}
  	}
}