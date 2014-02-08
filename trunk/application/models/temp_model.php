<?php if ( ! defined('BASEPATH')) exit('Silahkan menghubungi Administrator Website');

class temp_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function includeFile()
	{
		$data='<meta http-equiv="X-UA-Compatible" content="IE=Edge">';
		$data.='<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >';
		$data.='<link href="'.base_url().'dishub.png" rel="shortcut icon" type="image/x-icon" />';
		$data.='<title>Pengujian Kendaraan Bermotor</title>';
		$data.='<link href="'.base_url().'css/reset.css" media="screen" rel="stylesheet" type="text/css" >';
		$data.='<link href="'.base_url().'css/grid.css" media="screen" rel="stylesheet" type="text/css" >';
		$data.='<link href="'.base_url().'css/style.css" media="screen" rel="stylesheet" type="text/css" >';
		$data.='<link href="'.base_url().'css/ui/aristo/ui.css" media="screen" rel="stylesheet" type="text/css" >';
		$data.='<link href="'.base_url().'css/ui/aristo/portlet.css" media="screen" rel="stylesheet" type="text/css" >';
		$data.='<link href="'.base_url().'css/ui/aristo/jquery.ui.uniform.css" media="screen" rel="stylesheet" type="text/css" >';
		$data.='<link href="'.base_url().'css/ui/aristo/colors/jquery.ui.colors.gray.css" media="screen" rel="stylesheet" type="text/css" class="uicolor" >';
		$data.='<link href="'.base_url().'css/forms.css" media="screen" rel="stylesheet" type="text/css" >';
		$data.='<link href="'.base_url().'css/elfinder.css" media="screen" rel="stylesheet" type="text/css" >';
		$data.='<link href="'.base_url().'css/jquery.ui.datatables.css" media="screen" rel="stylesheet" type="text/css" >';
		$data.='<link href="'.base_url().'css/jquery.slidernav.css" media="screen" rel="stylesheet" type="text/css" >';
		$data.='<link href="'.base_url().'css/jquery.fullcalendar.css" media="screen" rel="stylesheet" type="text/css" >';
		$data.='<link href="'.base_url().'css/forms.css" media="screen" rel="stylesheet" type="text/css" >';
		$data.='<link href="'.base_url().'css/prettify.css" media="screen" rel="stylesheet" type="text/css" >
';
		$data.='<script type="text/javascript" src="'.base_url().'js/jquery.min.js"></script>';
		$data.='<script type="text/javascript" src="'.base_url().'js/jquery.selectors.js"></script>';
		$data.='<script type="text/javascript" src="'.base_url().'js/jquery.easing.js"></script>';
		$data.='<script type="text/javascript" src="'.base_url().'js/hoverIntent.js"></script>';
		$data.='<script type="text/javascript" src="'.base_url().'js/jquery.tools.min.js"></script>';
		$data.='<script type="text/javascript" src="'.base_url().'js/overlay.apple.js"></script>';
		$data.='<script type="text/javascript" src="'.base_url().'js/jquery.dataTables.min.js"></script>';
		$data.='<script type="text/javascript" src="'.base_url().'js/jquery.slidernav.js"></script>';
		$data.='<script type="text/javascript" src="'.base_url().'js/jquery.fullcalendar.min.js"></script>';
		$data.='<script type="text/javascript" src="'.base_url().'js/jquery.isotope.min.js"></script>';
		$data.='<script type="text/javascript" src="'.base_url().'js/superfish.js"></script>';
		$data.='<script type="text/javascript" src="'.base_url().'js/supersubs.js"></script>';
		$data.='<script type="text/javascript" src="'.base_url().'js/elfinder.full.js"></script>';
		$data.='<script type="text/javascript" src="'.base_url().'js/prettify/prettify.js"></script>';
		$data.='<script type="text/javascript" src="'.base_url().'js/jquery.cookie.js"></script>';
		$data.='<script type="text/javascript" src="'.base_url().'js/jquery.tools.min.js"></script>';
		$data.='<script type="text/javascript" src="'.base_url().'js/jquery.ui.min.js"></script>';
		$data.='<script type="text/javascript" src="'.base_url().'js/jquery.uniform.min.js"></script>';
		$data.='<script type="text/javascript" src="'.base_url().'js/global.js"></script>';
		$data.='<script type="text/javascript" src="'.base_url().'js/ajax.js"></script>';
		
		/*<!-- loading script -->*/
		$data.="<script>
			$(window).load(function(){
    			$('#loading').fadeOut(function(){
        		$(this).remove();
       			$('body').removeAttr('style');
    			});
			});
		</script>";
				
		$data.='<style type = "text/css">
   			#container {position: absolute; top:50%; left:50%;}
    		#content {width:800px; text-align:center; margin-left: -400px; height:50px; margin-top:-25px; line-height: 50px;}
    		#content {font-family: "Helvetica", "Arial", sans-serif; font-size: 18px; color: black; text-shadow: 0px 1px 0px white; }
    		#loadinggraphic {margin-right: 0.2em; margin-bottom:-2px;}
    		#loading {background-color: #eeeeee; overflow:hidden; width:100%; height:100%; position: absolute; top: 0; left: 0; z-index: 9999;}
		</style> ';
			
		return $data;
	}
	
	function headerInc($id)
	{
		$userLevel=$this->session->userdata('id_level');
		switch($id)
		{
			case"1"; $st1='class="active"'; break;
			case"2"; $st2='class="active"'; break;
			case"3"; $st3='class="active"'; break;
			case"4"; $st4='class="active"'; break;
			case"5"; $st5='class="active"';	break;
			case"6"; $st6='active';	 		break;
		}
			
		$data='<header class="container_8 clearfix">';
			$data.='<div class="grid_8">';
               $data.='<h1><a href="'.base_url().'index.php/home/main"> SIK PKB</a></h1>';
               $data.='<nav>';
                    $data.='<ul class="sf-menu clearfix">';

                    	$data.='<li '.$st1.' ><a href="#">Data Master</a>';
                            $data.='<ul>';
								$data.='<li><a href="'.base_url().'index.php/dishub">Dishub</a></li>';
								$data.='<li><a href="'.base_url().'index.php/unit_pkb">Unit PKB / Bengkel</a></li>';
                                $data.='<li><a href="'.base_url().'index.php/penguji">Penguji</a></li>';
                                $data.='<li><a href="'.base_url().'index.php/peralatan_uji">Peralatan Uji</a></li>';
								$data.='<li><a href="'.base_url().'index.php/kendaraan">Kendaraan</a></li>';
                            $data.='</ul>';
                        $data.='</li>';

                        $data.='<li '.$st2.' ><a href="#">Transaksi</a>';
                            $data.='<ul>';
								if($userLevel=="1"||$userLevel=="2")
								{
                                	$data.='<li><a href="'.base_url().'index.php/pendaftaran">Pendaftaran</a></li>';
								}
								if($userLevel=="1"||$userLevel=="3")
								{
 									$data.='<li><a href="'.base_url().'index.php/pembayaran">Pembayaran</a></li>';
								}
								if($userLevel=="1"||$userLevel=="4")
								{
                                        $data.='<li><a href="'.base_url().'index.php/prapengujian">Pra Pengujian</a></li>';
								}
								if($userLevel=="1"||$userLevel=="4")
								{
                                	$data.='<li><a href="'.base_url().'index.php/pengujian">Pengujian</a></li>';
								}
								if($userLevel=="1"||$userLevel=="5")
								{
									$data.='<li><a href="'.base_url().'index.php/hasiluji">Pengesahan Hasil Uji</a></li>';
								}
								if($userLevel=="1"||$userLevel=="5")
								{
									$data.='<li><a href="'.base_url().'index.php/pencetakan">Pencetakan Hasil Uji</a></li>';
								}
								if($userLevel=="1"||$userLevel=="5")
								{
									$data.='<li><a href="'.base_url().'index.php/keberatan">Pengajuan Keberataan</a></li>';
								}
                            $data.='</ul>';
                        $data.='</li>';

                        $data.='<li '.$st3.' ><a href="#">Laporan</a>';
                            $data.='<ul>';
								$data.='<li><a href="'.base_url().'index.php/laporan/pantau_uji">Monitoring Pelaksanaan Pengujian</a></li>';
								$data.='<li><a href="'.base_url().'index.php/laporan/lapor_uji">Laporan Pelaksanaan Pengujian</a></li>';
								$data.='<li><a href="'.base_url().'index.php/laporan/wajib_uji">Daftar Kendaraan Wajib Uji</a></li>';
								$data.='<li><a href="'.base_url().'index.php/laporan/tidak_lulus">Daftar Kendaraan Tidak Lulus Uji</a></li>';
								$data.='<li><a href="'.base_url().'index.php/laporan/RJKWU">Rekap Jumlah Kendaraan Wajib Uji</a></li>';
								$data.='<li><a href="'.base_url().'index.php/laporan/RJKU">Rekap Jumlah Kendaraan Yang Diuji</a></li>';
								$data.='<li><a href="'.base_url().'index.php/laporan/RJKUP">Rekap Jumlah Kendaraan Uji Pertama</a></li>';
								$data.='<li><a href="'.base_url().'index.php/laporan/profile_pkb">Profil Unit PKB / Bengkel</a></li>';
                            $data.='</ul>';

                        $data.='</li>';
						
						$data.='<li '.$st4.' ><a href="#">Data Rujukan</a>';
							 $data.='<ul>';
                                $data.='<li><a href="'.base_url().'index.php/provinsi">Provinsi</a></li>';
                                $data.='<li><a href="'.base_url().'index.php/kabkota">Kabupaten / Kota</a></li>';
                                $data.='<li><a href="'.base_url().'index.php/jenis_kendaraan">Jenis Kendaraan</a></li>';
								$data.='<li><a href="'.base_url().'index.php/status_kendaraan">Status Penggunaan</a></li>';
								$data.='<li><a href="'.base_url().'index.php/retribusi">Retribusi</a></li>';
								$data.='<li><a href="'.base_url().'index.php/klasifikasi_uji">Klasifikasi Uji</a></li>';
								$data.='<li><a href="'.base_url().'index.php/kelompok_uji">Kelompok Uji</a></li>';
								$data.='<li><a href="'.base_url().'index.php/daftar_uji">Daftar Uji</a></li>';
                            $data.='</ul>';
						$data.='</li>';
						
						$data.='<li '.$st5.' ><a href="#">Utility</a>';
							 $data.='<ul>';
							    $data.='<li><a href="'.base_url().'index.php/exportdata">Ekspor Data</a></li>';
                            $data.='</ul>';
						$data.='</li>';
						
						
						if($userLevel=="1"){
							$userName="Administrator Menu";
						}else{
							$userName="User Menu";
						}

						$data.='<li class="fr '.$st6.' "><a href="#" class="arrow-down">'.$userName.'</a>';
                            $data.='<ul>';
                                $data.='<li><a href="'.base_url().'index.php/user/editAccount">Account</a></li>';
								if($userLevel=="1")
								{
                                	$data.='<li><a href="'.base_url().'index.php/user">Users</a></li>';
								}
                                $data.='<li><a href="'.base_url().'index.php/home/logout">Sign out</a></li>';
                            $data.='</ul>';
                        $data.='</li>';

                    $data.='</ul>';

                $data.='</nav>';

            $data.='</div>';

        $data.='</header>';
	
		return $data;
	}
	
	function footerInc()
	{
		$data ='<footer>';
        $data.='<div id="footer-inner" class="container_8 clearfix">';
            $data.='<div class="grid_8">';
                $data.='<span class="fr">SIK LLAJ Pengujian Kendaraan Bermotor | &copy;2011 Ditjen Perhubungan Darat.</span>';
            $data.='</div>';
        $data.='</div>';
    $data.='</footer>';
	
	return $data;
	}
	
	//============== sub menu pendaftaran ======================
	
	function submenudaftar($id)
	{
		switch($id)
		{
			case"1"; $sm1='class="current"'; break;
			case"2"; $sm2='class="current"'; break;
			case"3"; $sm3='class="current"'; break;
			case"4"; $sm4='class="current"'; break;
			case"5"; $sm5='class="current"'; break;
		}
	
		$data='<nav class="collapsed">';
			$data.='<a class="chevron" href="#">&raquo;</a>';
			$data.='<ul>';
				$data.='<li '.$sm1.' ><a href="'.base_url().'index.php/pendaftaran/newForm" class="navicon-table">Daftar Baru</a></li>';
				$data.='<li '.$sm2.' ><a href="'.base_url().'index.php/pendaftaran/addData" class="navicon-table">Uji Berkala</a></li>';
				$data.='<li '.$sm3.' ><a href="'.base_url().'index.php/pendaftaran" class="navicon-newspaper">Data Pendaftaran</a></li>';
			$data.='</ul>';
		$data.='</nav>';
	
		return $data;
	}
	
	function submenuUji($id,$idData)
	{
		switch($id)
		{
			case"1"; $sm1='class="current"'; break;
			case"2"; $sm2='class="current"'; break;
			case"3"; $sm3='class="current"'; break;
			case"4"; $sm4='class="current"'; break;
		}
		
		$data='<nav class="collapsed">';
			$data.='<a class="chevron" href="#">&raquo;</a>';
			$data.='<ul>';
				$data.='<li '.$sm1.' ><a href="'.base_url().'index.php/pengujian/detail/'.$idData.'" class="navicon-table">Detail Kendaraan</a></li>';
				$data.='<li '.$sm2.' ><a href="'.base_url().'index.php/pengujian/uraian/'.$idData.'" class="navicon-table">Uraian Kendaraan</a></li>';
				$data.='<li '.$sm3.' ><a href="'.base_url().'index.php/pengujian/ujifisik/'.$idData.'" class="navicon-table">Uji Fisik</a></li>';
				$data.='<li '.$sm4.' ><a href="'.base_url().'index.php/pengujian/ujimekanis/'.$idData.'" class="navicon-table">Uji Mekanis</a></li>';
			$data.='</ul>';
		$data.='</nav>';
		
		return $data;
	}
	
	function submenuHasilUji($id,$idData)
	{
		switch($id)
		{
			case"1"; $sm1='class="current"'; break;
			case"2"; $sm2='class="current"'; break;
			case"3"; $sm3='class="current"'; break;
			case"4"; $sm4='class="current"'; break;
			case"5"; $sm5='class="current"'; break;
		}
		
		$data='<nav class="collapsed">';
			$data.='<a class="chevron" href="#">&raquo;</a>';
			$data.='<ul>';
				$data.='<li '.$sm1.' ><a href="'.base_url().'index.php/hasiluji/detail/'.$idData.'" class="navicon-table">Detail Kendaraan</a></li>';
				$data.='<li '.$sm2.' ><a href="'.base_url().'index.php/hasiluji/uraian/'.$idData.'" class="navicon-table">Uraian Kendaraan</a></li>';
				$data.='<li '.$sm3.' ><a href="'.base_url().'index.php/hasiluji/ujifisik/'.$idData.'" class="navicon-table">Uji Fisik</a></li>';
				$data.='<li '.$sm4.' ><a href="'.base_url().'index.php/hasiluji/ujimekanis/'.$idData.'" class="navicon-table">Uji Mekanis</a></li>';
				$data.='<li '.$sm5.' ><a href="'.base_url().'index.php/hasiluji/setStatus/'.$idData.'" class="navicon-table">Set Status</a></li>';
			$data.='</ul>';
		$data.='</nav>';
		
		return $data;
	}
	
}