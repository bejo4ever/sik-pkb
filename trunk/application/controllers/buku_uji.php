<?php if ( ! defined('BASEPATH')) exit('Silahkan menghubungi Administrator');
 
class buku_uji extends CI_Controller {
 
	function __construct()
	{
		
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('temp_model','',TRUE);
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
		
		$data['inc']		= $this->temp_model->includeFile();
		$data['header']		= $this->temp_model->headerInc('2');
		$data['footer']		= $this->temp_model->footerInc();
		$data['submenu']	= $this->temp_model->submenudaftar('3');
		
		$this->load->view('buku_uji/buku_data',$data);
	}
	
	function viewData()
	{
	
		$data['inc']		= $this->temp_model->includeFile();
		$data['header']		= $this->temp_model->headerInc('2');
		$data['footer']		= $this->temp_model->footerInc();
		$data['submenu']	= $this->temp_model->submenudaftar('3');
		
		$this->load->view('buku_uji/buku_detail',$data);
	
	}
		
}