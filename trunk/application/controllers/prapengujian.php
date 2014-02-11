<?php if ( ! defined('BASEPATH')) exit('Silahkan menghubungi Administrator');
 
class prapengujian extends CI_Controller {
 
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('temp_model','',TRUE);
		$this->load->model('master_model','',TRUE);
		$this->load->model('kendaraanmodel','',TRUE);
		$this->load->model('pemilikmodel','',TRUE);
		$this->load->model('uraianmodel','',TRUE);
		$this->load->model('penguji_model','',TRUE);
		$this->load->model('daftaruji_model','',TRUE);
		$this->load->model('pendaftaranmodel','',TRUE);
		$this->load->model('prapengujianmodel','',TRUE);
		$this->cekLogin();
	}

	function cekLogin()
	{
		if($this->session->userdata('id_level')=="")
		{
			redirect('home');
		}
	}

	public function index()
	{
		$data['data']		= $this->pendaftaranmodel->getAllSudahBayar();
		$data['inc']		= $this->temp_model->includeFile();
		$data['header']		= $this->temp_model->headerInc('2');
		$data['footer']		= $this->temp_model->footerInc();

		$this->load->view('prapengujian/data_uji',$data);
	}

	function ujifisik($id)
	{
		$data['no_BAP']		= $id;
		$data['penguji']	= $this->penguji_model->getPenguji();
		$data['inc']		= $this->temp_model->includeFile();
		$data['header']		= $this->temp_model->headerInc('2');
		$data['footer']		= $this->temp_model->footerInc();
		$data['submenu']	= $this->temp_model->submenuPraUji('3',$id);

		$this->load->view('prapengujian/ujifisik',$data);
	}

	function simpanUjifisik()
	{	
		$tData		= $this->input->post('tData');
		$no_BAP		= $this->input->post('no_bap');
		$kdUnit		= $this->session->userdata('kdUnit');
		
		$daftaruji	= $this->daftaruji_model->getKelompokUji('1');
		foreach($daftaruji as $dat)
		{
			$kd			= $dat->kd_itempengujian;
			$valPenguji	= "penguji_".$dat->kd_kelompok;
			
			$status	= $this->input->post("$kd");
			$penguji= $this->input->post("$valPenguji");	
			
			// Cek apakah data uji fisik sudah pernah ada sebelumnya
			if($tData==0)
			{
				// Simpan data uji fisik baru
				$varData=array('no_bap'=>$no_BAP,'kd_itempengujian'=>$kd,'status_hasil'=>$status,'NRP'=>$penguji, 'kode_unit'=>$kdUnit);
				$this->prapengujianmodel->saveUjiFisik($varData);
			}
			else
			{
				// Update data uji fisik
				$varData=array('status_hasil'=>$status,'NRP'=>$penguji);
				$this->prapengujianmodel->updateUjiFisik($no_BAP, $kd, $varData);
			}
		}

		redirect("prapengujian/ujimekanis/$no_BAP","refresh");
	}

	function ujimekanis($id)
	{
		$data['no_BAP']		= $id;
		$data['penguji']	= $this->penguji_model->getPenguji();
		$data['inc']		= $this->temp_model->includeFile();
		$data['header']		= $this->temp_model->headerInc('2');
		$data['footer']		= $this->temp_model->footerInc();
		$data['submenu']	= $this->temp_model->submenuPraUji('4',$id);

		$this->load->view('prapengujian/ujimekanis',$data);
	}

	function saveUjimekanis()
	{
		$tData		= $this->input->post('tData');
		$no_BAP		= $this->input->post('no_bap');
		$kdUnit		= $this->session->userdata('kdUnit');
		$no_daftar	= $this->pendaftaranmodel->getNoDaftar($this->uraianmodel->getNoSRUT($no_BAP));
		
		$daftaruji	= $this->daftaruji_model->getKelompokUji('2');
		foreach($daftaruji as $dat)
		{
			$kd			= $dat->kd_itempengujian;
			$valPenguji	= "penguji_".$dat->kd_kelompok;
			$tipe_input	= $dat->tipe_input;
			
			// Note: tambahkan pengecekan untuk nilai hasil_uji yang kosong -> tidak direkam

			if($tipe_input=="opsi")
			{
				$status		= $this->input->post("$kd");
				// Hasil uji diisi otomatis berdasarkan nilai dari $status
				$hasilUji	= "";
			}
			else
			{
				// Status diisi otomatis berdasarkan nilai dari hasil uji
				$status		= "";
				$hasilUji	= $this->input->post("$kd");
			}
			
			$penguji= $this->input->post("$valPenguji");
			
			// Cek apakah data uji mekanis sudah pernah ada sebelumnya
			if($tData==0)
			{
				// Simpan data uji mekanis baru
				$varData=array('no_bap'=>$no_BAP,'kd_itempengujian'=>$kd,'hasil_uji'=>$hasilUji,'status_hasil'=>$status,'NRP'=>$penguji);
				$this->prapengujianmodel->saveUjiFisik($varData);
			}
			else
			{
				// Update data uji mekanis
				$varData=array('hasil_uji'=>$hasilUji,'status_hasil'=>$status,'NRP'=>$penguji);
				$this->prapengujianmodel->updateUjiFisik($no_BAP, $kd, $varData);
			}	
		}

		$this->updateStatusDaftar($no_BAP);
	}

	function updateStatusDaftar($id)
	{
		$varData=array('status'=>'pra-uji');
		$this->pendaftaranmodel->update($id, $varData);
		
		redirect('prapengujian');
	}
	
	function detail($id)
	{
		$data['no_daftar']	= $id;
		$data['no_uji']		= $this->pendaftaranmodel->getNoUjiBydaftar($id);
		$data['penguji']	= $this->penguji_model->getPenguji();
		$data['data']		= $this->pendaftaranmodel->getByPendaftar($id);
		$data['inc']		= $this->temp_model->includeFile();
		$data['header']		= $this->temp_model->headerInc('2');
		$data['footer']		= $this->temp_model->footerInc();
		$data['submenu']	= $this->temp_model->submenuPraUji('1',$id);

		$this->load->view('prapengujian/detail_kendaraan',$data);
	}
}
