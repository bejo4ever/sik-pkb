<?php if ( ! defined('BASEPATH')) exit('Silahkan menghubungi Administrator');
 
class laporan extends CI_Controller {
 
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('temp_model','',TRUE);
		$this->load->model('master_model','',TRUE);
		$this->load->model('pendaftaranmodel','',TRUE);
		$this->load->model('pemilikmodel','',TRUE);
		$this->load->model('kendaraanmodel','',TRUE);
		$this->load->model('penguji_model','',TRUE);
		$this->load->model('uraianmodel','',TRUE);
		$this->load->model('daftaruji_model','',TRUE);
		$this->load->model('pengujianmodel','',TRUE);
		$this->load->model('unitpkb_model','',TRUE);
		$this->load->model('peralatanuji_model','',TRUE);
		$this->cekLogin();
	}

	function cekLogin()
	{
		if($this->session->userdata('id_level')=="")
		{
			redirect('home');
		}
	}

	function pantau_uji()
	{
		$data['data']		= $this->pendaftaranmodel->getAllDataSekarang();
		$data['inc']		= $this->temp_model->includeFile();
		$data['header']		= $this->temp_model->headerInc('3');
		$data['footer']		= $this->temp_model->footerInc();
		$data['submenu']	= $this->temp_model->submenudaftar('2');
		
		$this->load->view('laporan/pantau_uji',$data);
	}

	function lapor_uji()
	{
		$tglAwal	= $this->converter_model->tgl_In_Eng($this->input->post('tgl_awal'));
		$tglAkhir	= $this->converter_model->tgl_In_Eng($this->input->post('tgl_akhir'));
		
		$data['tgl_awal']	= $this->input->post('tgl_awal');
		$data['tgl_akhir']	= $this->input->post('tgl_akhir');
		$data['datauji']	= $this->pendaftaranmodel->getPeriodePendaftaran($tglAwal,$tglAkhir);
		$data['inc']		= $this->temp_model->includeFile();
		$data['header']		= $this->temp_model->headerInc('3');
		$data['footer']		= $this->temp_model->footerInc();
		$data['submenu']	= $this->temp_model->submenudaftar('1');

		$this->load->view('laporan/lapor_uji',$data);
	}

	function cetak_lapor_uji($tgl_awal,$tgl_akhir)
	{
		$tglAwal	= $this->converter_model->tgl_In_Eng($tgl_awal);
		$tglAkhir	= $this->converter_model->tgl_In_Eng($tgl_akhir);
		
		$data['tgl_awal']	= $tgl_awal;
		$data['tgl_akhir']	= $tgl_akhir;
		$data['datauji']	= $this->pendaftaranmodel->getPeriodePendaftaran($tglAwal,$tglAkhir);
		
		$content 	= $this->load->view('laporan/cetak/lapor_uji',$data, true);
		$file_name  = "Lapor Uji"; 
		$this->load->library('html2pdf/html2pdf');
		$html2pdf = new Html2Pdf('P','A4','en',array(5,5,5,5));  
		$this->html2pdf->WriteHTML($content);  
		$this->html2pdf->Output($file_name.'.pdf');
	}

	function wajib_uji()
	{
		$tglAwal	= $this->converter_model->tgl_In_Eng($this->input->post('tgl_awal'));
		$tglAkhir	= $this->converter_model->tgl_In_Eng($this->input->post('tgl_akhir'));
		
		$data['tgl_awal']	= $this->input->post('tgl_awal');
		$data['tgl_akhir']	= $this->input->post('tgl_akhir');
		$data['kendaraan']	= $this->kendaraanmodel->getAllWajibUji($tglAwal,$tglAkhir);
		$data['inc']		= $this->temp_model->includeFile();
		$data['header']		= $this->temp_model->headerInc('3');
		$data['footer']		= $this->temp_model->footerInc();
		$data['submenu']	= $this->temp_model->submenudaftar('1');

		$this->load->view('laporan/wajib_uji',$data);
	}

	function cetak_wajib_uji($tgl_awal,$tgl_akhir)
	{
		$tglAwal	= $this->converter_model->tgl_In_Eng($tgl_awal);
		$tglAkhir	= $this->converter_model->tgl_In_Eng($tgl_akhir);
		
		$data['tgl_awal']	= $tgl_awal;
		$data['tgl_akhir']	= $tgl_akhir;
		$data['kendaraan']	= $this->kendaraanmodel->getAllWajibUji($tglAwal,$tglAkhir);
		
		$content 	= $this->load->view('laporan/cetak/wajib_uji',$data, true);
		$file_name         = "Wajib Uji"; 
		$this->load->library('html2pdf/html2pdf');
		$html2pdf = new Html2Pdf('P','A4','en',array(5,5,5,5));  
		$this->html2pdf->WriteHTML($content);  
		$this->html2pdf->Output($file_name.'.pdf');
	}
	
	function tidak_lulus()
	{
		$data['data']		= $this->pengujianmodel->getTidakLulus();
		$data['inc']		= $this->temp_model->includeFile();
		$data['header']		= $this->temp_model->headerInc('3');
		$data['footer']		= $this->temp_model->footerInc();
		$data['submenu']	= $this->temp_model->submenudaftar('2');
		
		$this->load->view('laporan/tidak_lulus',$data);
	}

	function RJKWU()
	{
		$data['statKendaraan']	= $this->master_model->getAllTipeKendaraan();
		$data['jnsKendaraan']	= $this->master_model->getAllJenisKendaraan();
		$data['kelKendaraan']	= $this->master_model->getAllKelompokKendaraan();
		
		$data['inc']			= $this->temp_model->includeFile();
		$data['header']			= $this->temp_model->headerInc('3');
		$data['footer']			= $this->temp_model->footerInc();
		$data['submenu']		= $this->temp_model->submenudaftar('2');
		$this->load->view('laporan/RJKWU',$data);
	}

	function RJKWU2($id)
	{
		$data['id']				= $id;
		$data['statKendaraan']	= $this->master_model->getAllTipeKendaraan();
		$data['jnsKendaraan']	= $this->master_model->getbyidKelKendaraan($id)->result();
		$data['kelompok']		= $this->master_model->namaKelompok($id);
		$data['inc']			= $this->temp_model->includeFile();
		$data['header']			= $this->temp_model->headerInc('3');
		$data['footer']			= $this->temp_model->footerInc();
		$data['submenu']		= $this->temp_model->submenudaftar('2');

		$this->load->view('laporan/RJKWU2',$data);
	}

	function RJKWU_pdf()
	{
		$data['statKendaraan']	= $this->master_model->getAllTipeKendaraan();
		$data['jnsKendaraan']	= $this->master_model->getAllJenisKendaraan();
		$data['kelKendaraan']	= $this->master_model->getAllKelompokKendaraan();
		
		$content 	= $this->load->view('laporan/cetak/RJKWU',$data, true);
		$file_name  = "RJKWU"; 
		$this->load->library('html2pdf/html2pdf');
		$html2pdf = new Html2Pdf('P','A4','en',array(5,5,5,5));  
		$this->html2pdf->WriteHTML($content);  
		$this->html2pdf->Output($file_name.'.pdf');
	}

	function RJKWU2_pdf($id)
	{
		$data['statKendaraan']	= $this->master_model->getAllTipeKendaraan();
		$data['jnsKendaraan']	= $this->master_model->getbyidKelKendaraan($id)->result();
		$data['kelompok']		= $this->master_model->namaKelompok($id);
		
		$content 	= $this->load->view('laporan/cetak/RJKWU2',$data, true);
		$file_name  = "RJKWU"; 
		$this->load->library('html2pdf/html2pdf');
		$html2pdf = new Html2Pdf('P','A4','en',array(5,5,5,5));  
		$this->html2pdf->WriteHTML($content);  
		$this->html2pdf->Output($file_name.'.pdf');
	}

	function RJKU($tahun,$bulan)
	{
		if($tahun==""){ $tahun=date('Y'); }
		if($bulan==""){ $bulan=date('m'); }
		
		$data['jnsKendaraan']	= $this->master_model->getAllJenisKendaraan();
		$data['kelKendaraan']	= $this->master_model->getAllKelompokKendaraan();
		$data['tahun']			= $tahun;
		$data['bulan']			= $bulan;
		$data['inc']			= $this->temp_model->includeFile();
		$data['header']			= $this->temp_model->headerInc('3');
		$data['footer']			= $this->temp_model->footerInc();
		$data['submenu']		= $this->temp_model->submenudaftar('2');

		$this->load->view('laporan/RJKU',$data);
	}

	function RJKU_pdf()
	{
		if($tahun==""){ $tahun=date('Y'); }
		if($bulan==""){ $bulan=date('m'); }
		
		$data['jnsKendaraan']	= $this->master_model->getAllJenisKendaraan();
		$data['kelKendaraan']	= $this->master_model->getAllKelompokKendaraan();
		$data['tahun']			= $tahun;
		$data['bulan']			= $bulan;
		
		$content 	= $this->load->view('laporan/cetak/RJKU',$data, true);
		$file_name  = "RJKU"; 
		$this->load->library('html2pdf/html2pdf');
		$html2pdf = new Html2Pdf('P','A4','en',array(5,5,5,5));  
		$this->html2pdf->WriteHTML($content);  
		$this->html2pdf->Output($file_name.'.pdf');
		
	}

	function RJKU2($tahun,$bulan,$id)
	{
		if($tahun==""){ $tahun=date('Y'); }
		if($bulan==""){ $bulan=date('m'); }
		
		$data['jnsKendaraan']	= $this->master_model->getbyidKelKendaraan($id)->result();
		$data['kelompok']		= $this->master_model->namaKelompok($id);
		$data['tahun']			= $tahun;
		$data['bulan']			= $bulan;
		$data['id']				= $id;
		$data['inc']			= $this->temp_model->includeFile();
		$data['header']			= $this->temp_model->headerInc('3');
		$data['footer']			= $this->temp_model->footerInc();
		$data['submenu']		= $this->temp_model->submenudaftar('2');

		$this->load->view('laporan/RJKU2',$data);
	}

	function RJKU2_pdf($id)
	{
		if($tahun==""){ $tahun=date('Y'); }
		if($bulan==""){ $bulan=date('m'); }
		
		$data['jnsKendaraan']	= $this->master_model->getbyidKelKendaraan($id)->result();
		$data['kelompok']		= $this->master_model->namaKelompok($id);
		$data['tahun']			= $tahun;
		$data['bulan']			= $bulan;
		
		$content 	= $this->load->view('laporan/cetak/RJKU2',$data, true);
		$file_name  = "RJKU"; 
		$this->load->library('html2pdf/html2pdf');
		$html2pdf = new Html2Pdf('P','A4','en',array(5,5,5,5));  
		$this->html2pdf->WriteHTML($content);  
		$this->html2pdf->Output($file_name.'.pdf');
	}

	function RJKUP($tahun,$bulan)
	{
		if($tahun==""){ $tahun=date('Y'); }
		if($bulan==""){ $bulan=date('m'); }
		
		$data['jnsKendaraan']	= $this->master_model->getAllJenisKendaraan();
		$data['kelKendaraan']	= $this->master_model->getAllKelompokKendaraan();
		$data['tahun']			= $tahun;
		$data['bulan']			= $bulan;
		$data['inc']			= $this->temp_model->includeFile();
		$data['header']			= $this->temp_model->headerInc('3');
		$data['footer']			= $this->temp_model->footerInc();
		$data['submenu']		= $this->temp_model->submenudaftar('2');

		$this->load->view('laporan/RJKUP',$data);
	}

	function RJKUP_pdf($tahun,$bulan)
	{
		if($tahun==""){ $tahun=date('Y'); }
		if($bulan==""){ $bulan=date('m'); }
		
		$data['jnsKendaraan']	= $this->master_model->getAllJenisKendaraan();
		$data['kelKendaraan']	= $this->master_model->getAllKelompokKendaraan();
		$data['tahun']			= $tahun;
		$data['bulan']			= $bulan;
		
		$content 	= $this->load->view('laporan/cetak/RJKUP',$data, true);
		$file_name  = "RJKUP"; 
		$this->load->library('html2pdf/html2pdf');
		$html2pdf = new Html2Pdf('P','A4','en',array(5,5,5,5));  
		$this->html2pdf->WriteHTML($content);  
		$this->html2pdf->Output($file_name.'.pdf');
	}

	function RJKUP2($id)
	{
		if($tahun==""){ $tahun=date('Y'); }
		if($bulan==""){ $bulan=date('m'); }
		
		$data['jnsKendaraan']	= $this->master_model->getbyidKelKendaraan($id)->result();
		$data['kelompok']		= $this->master_model->namaKelompok($id);
		$data['tahun']			= $tahun;
		$data['bulan']			= $bulan;
		$data['id']				= $id;
		$data['inc']			= $this->temp_model->includeFile();
		$data['header']			= $this->temp_model->headerInc('3');
		$data['footer']			= $this->temp_model->footerInc();
		$data['submenu']		= $this->temp_model->submenudaftar('2');

		$this->load->view('laporan/RJKUP2',$data);
	}

	function RJKUP2_pdf($id)
	{
		if($tahun==""){ $tahun=date('Y'); }
		if($bulan==""){ $bulan=date('m'); }
		
		$data['jnsKendaraan']	= $this->master_model->getbyidKelKendaraan($id)->result();
		$data['kelompok']		= $this->master_model->namaKelompok($id);
		$data['tahun']			= $tahun;
		$data['bulan']			= $bulan;
		
		$content 	= $this->load->view('laporan/cetak/RJKUP2',$data, true);
		$file_name  = "RJKUP"; 
		$this->load->library('html2pdf/html2pdf');
		$html2pdf = new Html2Pdf('P','A4','en',array(5,5,5,5));  
		$this->html2pdf->WriteHTML($content);  
		$this->html2pdf->Output($file_name.'.pdf');
	}

	function profile_pkb()
	{
		$data['unit_pkb']	= $this->unitpkb_model->getUnitPKB();
		$data['fasilitas']	= $this->unitpkb_model->getFasilitas();
		$data['penguji']	= $this->penguji_model->getPenguji();
		$data['peralatan']	= $this->peralatanuji_model->getAlat();
		$data['inc']		= $this->temp_model->includeFile();
		$data['header']		= $this->temp_model->headerInc('3');
		$data['footer']		= $this->temp_model->footerInc();
		$data['submenu']	= $this->temp_model->submenudaftar('1');

		$this->load->view('laporan/profile',$data);
	}

	function profile_pkb_pdf()
	{
		$data['unit_pkb']	= $this->unitpkb_model->getUnitPKB();
		$data['fasilitas']	= $this->unitpkb_model->getFasilitas();
		$data['penguji']	= $this->penguji_model->getPenguji();
		$data['peralatan']	= $this->peralatanuji_model->getAlat();
		
		$content 	= $this->load->view('laporan/cetak/profile',$data,TRUE);
		$file_name  = "profile unit pkb"; 
		$this->load->library('html2pdf/html2pdf');
		$html2pdf = new Html2Pdf('P','A4','en',array(5,5,5,5));  
		$this->html2pdf->WriteHTML($content);  
		$this->html2pdf->Output($file_name.'.pdf');
	}
}