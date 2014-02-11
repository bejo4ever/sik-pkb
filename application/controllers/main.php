<?php if ( ! defined('BASEPATH')) exit('Silahkan menghubungi Administrator');

class main extends CI_Controller {
 
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
		$data['inc']	= $this->temp_model->includeFile();
		$this->load->view('login',$data);
	}
}