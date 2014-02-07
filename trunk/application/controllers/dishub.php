<?php if (!defined('BASEPATH')) exit('Silahkan menghubungi Administrator');
 
class dishub extends CI_Controller {
 
	function __construct() 
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('temp_model','',TRUE);
		$this->load->model('propinsiModel','',TRUE);
		$this->load->model('kabkotamodel','',TRUE);
		$this->load->model('dishub_model','',TRUE);
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
		$data['prov']		= $this->propinsiModel->getAll();
		$data['kabkota'] 	= $this->kabkotamodel->getKabkota();
		$data['dishub']		= $this->dishub_model->getDishub();
		$data['inc']		= $this->temp_model->includeFile();
		$data['header']		= $this->temp_model->headerInc('1');
		$data['footer']		= $this->temp_model->footerInc();
		$data['submenu']	= $this->temp_model->submenudaftar('1');
		
		$this->load->view('data_rujukan/dishub/dishub_data',$data);
	}

	function update()
	{
		$kd		= $this->input->post('kd');
		$nama	= $this->input->post('nama');
		$alamat	= $this->input->post('alamat');
		$prov	= $this->input->post('kode_provinsi');
		$kabkota= $this->input->post('kabkota');
		$telp	= $this->input->post('telp');
		$email	= $this->input->post('email');
		$kepala	= $this->input->post('kepala');
		$nip	= $this->input->post('nip');
		
		// Cek apakah data Dishub sudah ada
		if( $kd != "" )
		{
			// Update jika data Dishub sudah ada
			$varData = array('kode_dishub'=>$kabkota,'nama_dishub'=>$nama,'alamat_dishub'=>$alamat,'kode_provinsi'=>$prov,'kode_kabkota'=>$kabkota,'telp_dishub'=>$telp,'email_dishub'=>$email,'nama_kadis'=>$kepala,'nip_kadis'=>$nip);
			$this->dishub_model->update($kd, $varData);
		}
		else
		{
			// Save (insert) jika data Dishub belum ada
			$varData = array('kode_dishub'=>$kabkota,'nama_dishub'=>$nama,'alamat_dishub'=>$alamat,'kode_provinsi'=>$prov,'kode_kabkota'=>$kabkota,'telp_dishub'=>$telp,'email_dishub'=>$email,'nama_kadis'=>$kepala,'nip_kadis'=>$nip);
			$this->dishub_model->save($varData);
		}

		redirect('dishub','refresh');
	}
}