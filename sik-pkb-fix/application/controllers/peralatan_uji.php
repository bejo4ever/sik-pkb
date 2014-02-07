<?php if ( ! defined('BASEPATH')) exit('Silahkan menghubungi Administrator');
 
class peralatan_uji extends CI_Controller {
 
	function __construct() 
	{
		
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('temp_model','',TRUE);
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
	public function index()
	{
		$data['data']		= $this->peralatanuji_model->getAlat();
		$data['itemUji']	= $this->peralatanuji_model->getItemUji();
		$data['inc']		= $this->temp_model->includeFile();
		$data['header']		= $this->temp_model->headerInc('1');
		$data['footer']		= $this->temp_model->footerInc();
		$data['submenu']	= $this->temp_model->submenudaftar('2');
		
		$this->load->view('data_induk/peralatan/peralatan_data',$data);
	}
	
	function saveData()
	{
		$kodeAlat	= $this->peralatanuji_model->getKodeAlat();
		$nama		= $this->input->post('nama');
		$merek		= $this->input->post('merek');
		$kelompok	= $this->input->post('kelompok');
		$jumlah		= $this->input->post('jumlah');
		$produksi	= $this->input->post('produksi');
		$pemakaian	= $this->input->post('pemakaian');
		$kalibrasi	= $this->input->post('kalibrasi');
		$status		= $this->input->post('status');
		
		$varData	= array('kode_alat'=>$kodeAlat,'nama_alat'=>$nama,'merk'=>$merek,'kd_kelompok'=>$kelompok,'jumlah_alat'=>$jumlah,'status_alat'=>$status,'tahun_produksi'=>$produksi,'tahun_penggunaan'=>$pemakaian,'tahun_kalibrasi'=>$kalibrasi,'kode_unit'=>$this->session->userdata('kdUnit'));
		$this->peralatanuji_model->save($varData);
		
		redirect('peralatan_uji','refresh');
		
	}
	
	function edit($id)
	{
		$data['data']		= $this->peralatanuji_model->getById($id);
		$data['itemUji']	= $this->peralatanuji_model->getItemUji();
		$this->load->view('data_induk/peralatan/edit_peralatan',$data);
	}
	
	function update()
	{
		$kodeAlat	= $this->input->post('kode');
		$nama		= $this->input->post('nama');
		$merek		= $this->input->post('merek');
		$kelompok	= $this->input->post('kelompok');
		$jumlah		= $this->input->post('jumlah');
		$produksi	= $this->input->post('produksi');
		$pemakaian	= $this->input->post('pemakaian');
		$kalibrasi	= $this->input->post('kalibrasi');
		$status		= $this->input->post('status');
		
		$varData	= array('nama_alat'=>$nama,'merk'=>$merek,'kd_kelompok'=>$kelompok,'jumlah_alat'=>$jumlah,'status_alat'=>$status,'tahun_produksi'=>$produksi,'tahun_penggunaan'=>$pemakaian,'tahun_kalibrasi'=>$kalibrasi);
		$this->peralatanuji_model->update($kodeAlat, $varData);
		
		redirect('peralatan_uji','refresh');
	}
	
	function hapus($id)
	{
		$this->peralatanuji_model->delete($id);
		redirect('peralatan_uji','refresh');
	}
}