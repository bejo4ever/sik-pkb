<?php if ( ! defined('BASEPATH')) exit('Silahkan menghubungi Administrator');
 
class pengujian extends CI_Controller {
 
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
		$this->load->model('pengujianmodel','',TRUE);
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
		$data['data']		= $this->pendaftaranmodel->getAllSudahPraUji();
		$data['inc']		= $this->temp_model->includeFile();
		$data['header']		= $this->temp_model->headerInc('2');
		$data['footer']		= $this->temp_model->footerInc();

		$this->load->view('pengujian/data_uji',$data);
	}
	
	function tambahHasil($id)
	{
		$data['no_daftar']	= $id;
		$data['no_srut']	= $this->pendaftaranmodel->getNoUjiBydaftar($id);
		$data['penguji']	= $this->penguji_model->getPenguji();
		$data['dataHasil']	= $this->uraianmodel->getById($this->pendaftaranmodel->getNoUjiBydaftar($id))->result();
		$data['inc']		= $this->temp_model->includeFile();
		$data['header']		= $this->temp_model->headerInc('2');
		$data['footer']		= $this->temp_model->footerInc();
		$data['submenu']	= $this->temp_model->submenuUji('2',$id);

		$this->load->view('pengujian/uraian_kendaraan',$data);
	}

	function simpanUraian()
	{
		$tData		= $this->input->post('tData');
		$no_daftar	= $this->input->post('no_daftar');
		$no_srut	= $this->input->post('no_srut');
		$no_BAP		= $this->input->post('no_bap');
		$uu1		= $this->input->post('uu1');
		$uu2		= $this->input->post('uu2');
		$uu3		= $this->input->post('uu3');
		$uu4		= $this->input->post('uu4');
		$uu5		= $this->input->post('uu5');
		$js1		= $this->input->post('js1');
		$js2		= $this->input->post('js2');
		$js3		= $this->input->post('js3');
		$js4		= $this->input->post('js4');
		$dbm1		= $this->input->post('dbm1');
		$dbm2		= $this->input->post('dbm2');
		$dbm3		= $this->input->post('dbm3');
		$dbm4		= $this->input->post('dbm4');
		$dt0		= $this->input->post('dt0');
		$dt1		= $this->input->post('dt1');
		$dt2		= $this->input->post('dt2');
		$dt3		= $this->input->post('dt3');
		$dt4		= $this->input->post('dt4');
		$dt5		= $this->input->post('dt5');
		$dt6		= $this->input->post('dt6');
		$dt7		= $this->input->post('dt7');
		$pb1		= $this->input->post('pb1');
		$pb2		= $this->input->post('pb2');
		$pb3		= $this->input->post('pb3');
		$pb4		= $this->input->post('pb4');
		$pb5		= $this->input->post('pb5');
		$pb6		= $this->input->post('pb6');
		$bk1		= $this->input->post('bk1');
		$bk2		= $this->input->post('bk2');
		$bk3		= $this->input->post('bk3');
		$bk4		= $this->input->post('bk4');
		$da1		= $this->input->post('da1');
		$da2		= $this->input->post('da2');
		$da3		= $this->input->post('da3');
		$da4		= $this->input->post('da4');
		$da5		= $this->input->post('da5');
		$da6		= $this->input->post('da6');

		$varData=array('no_bap'=>$no_BAP,'no_srut'=>$no_srut,'panjang'=>$uu1,'lebar'=>$uu2,'tinggi'=>$uu3,'julur_belakang'=>$uu4,'julur_depan'=>$uu5,'sumbu_12'=>$js1,'sumbu_23'=>$js2,'sumbu_34'=>$js3,'q'=>$js4,'panjang_bak'=>$dbm1,'lebar_bak'=>$dbm2,'tinggi_bak'=>$dbm3,'bahan_bak'=>$dbm4,'model_tangki'=>$dt0,'panjang_tangki'=>$dt1,'lebar_tangki'=>$dt2,'tinggi_tangki'=>$dt3,'volume_tangki'=>$dt4,'jenis_muatan'=>$dt5,'berat_jenis_muatan'=>$dt6,'bahan_tangki'=>$dt7,'sumbu_1'=>$pb1,'sumbu_2'=>$pb2,'sumbu_3'=>$pb3,'sumbu_4'=>$pb4,'jbb'=>$pb5,'jbkb'=>$pb6,'bk_sumbu_1'=>$bk1,'bk_sumbu_2'=>$bk2,'bk_sumbu_3'=>$bk3,'bk_sumbu_4'=>$bk4,'orang'=>$da1,'barang'=>$da2,'JBI'=>$da3,'JBKI'=>$da4,'MST'=>$da5,'KJT'=>$da6  );
		
		// Cek apakah data uraian kendaraan pernah ada sebelumnya
		if($tData==0)
		{
			// Simpan data uraian kendaraan yang baru
			$this->uraianmodel->save($varData);
		}
		else
		{
			// Update data uraian kendaraan
			$this->uraianmodel->update($no_srut, $varData);
		}
		
		redirect("pengujian/ujimekanis/$no_daftar","refresh");
	}

	function ujifisik($id)
	{
		$data['no_BAP']		= $id;
		$data['penguji']	= $this->penguji_model->getPenguji();
		$data['inc']		= $this->temp_model->includeFile();
		$data['header']		= $this->temp_model->headerInc('2');
		$data['footer']		= $this->temp_model->footerInc();
		$data['submenu']	= $this->temp_model->submenuUji('3',$id);

		$this->load->view('pengujian/ujifisik',$data);
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
				$this->pengujianmodel->saveUjiFisik($varData);
			}
			else
			{
				// Update data uji fisik
				$varData=array('status_hasil'=>$status,'NRP'=>$penguji);
				$this->pengujianmodel->updateUjiFisik($no_BAP, $kd, $varData);
			}
		}

		redirect("pengujian/ujimekanis/$no_BAP","refresh");
	}

	function ujimekanis($id)
	{
		$data['no_BAP']		= $id;
		$data['penguji']	= $this->penguji_model->getPenguji();
		$data['inc']		= $this->temp_model->includeFile();
		$data['header']		= $this->temp_model->headerInc('2');
		$data['footer']		= $this->temp_model->footerInc();
		$data['submenu']	= $this->temp_model->submenuUji('4',$id);

		$this->load->view('pengujian/ujimekanis',$data);
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
				$this->pengujianmodel->saveUjiFisik($varData);
			}
			else
			{
				// Update data uji mekanis
				$varData=array('hasil_uji'=>$hasilUji,'status_hasil'=>$status,'NRP'=>$penguji);
				$this->pengujianmodel->updateUjiFisik($no_BAP, $kd, $varData);
			}	
		}

		$this->updateStatusDaftar($no_BAP);
	}

	function updateStatusDaftar($id)
	{
		$varData=array('status'=>'uji');
		$this->pendaftaranmodel->update($id, $varData);
		
		redirect('pengujian','refresh');
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
		$data['submenu']	= $this->temp_model->submenuUji('1',$id);

		$this->load->view('pengujian/detail_kendaraan',$data);
	}
	
	function uraian($id)
	{
		$data['no_daftar']	= $id;
		$data['no_uji']		= $this->pendaftaranmodel->getNoUjiBydaftar($id);
		$data['no_srut']	= $this->pendaftaranmodel->getNoUjiBydaftar($id);
		$data['dataHasil']	= $this->uraianmodel->getById($this->pendaftaranmodel->getNoUjiBydaftar($id))->result();
		$data['penguji']	= $this->penguji_model->getPenguji();
		$data['data']		= $this->pendaftaranmodel->getByPendaftar($id);
		$data['inc']		= $this->temp_model->includeFile();
		$data['header']		= $this->temp_model->headerInc('2');
		$data['footer']		= $this->temp_model->footerInc();
		$data['submenu']	= $this->temp_model->submenuUji('2',$id);

		$this->load->view('pengujian/uraian_kendaraan',$data);
	}

	function selesai($id)
	{
		$varData=array('status'=>'selesai');
		$this->pendaftaranmodel->update($id, $varData);
		
		redirect('pengujian','refresh');
	}
}
