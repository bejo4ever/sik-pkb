<?php if ( ! defined('BASEPATH')) exit('Silahkan menghubungi Administrator');
 
class home extends CI_Controller {
 
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('temp_model','',TRUE);
		$this->load->model('user_model','',TRUE);
		$this->load->model('pendaftaranmodel','',TRUE);
		$this->load->model('pemilikmodel','',TRUE);
		$this->load->model('kendaraanmodel','',TRUE);
		$this->load->model('master_model','',TRUE);
		$this->load->model('unitpkb_model','',TRUE);
		$this->load->library('form_validation');
	}
	
	function cekLogin()
	{
		if($this->session->userdata('id_level')=="")
		{
			redirect('home');
		}
	}
	
	public function index($id)
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('username', 'Username', 'callback_usercheck');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		$this->form_validation->set_message('required', '<p class="error">%s Tidak boleh kosong !!</p>');
		
		$username	= $this->input->post('username');
		$password	= $this->input->post('password');
		$idLevel	= $this->input->post('id');
		
		$dataUser=$this->user_model->getUserByNip($username,$idLevel)->result();
		
		if ($this->form_validation->run() == TRUE && count($dataUser)!="0")
		{
			$datDinas=$this->unitpkb_model->getUnitPKB0();
			foreach($datDinas as $datD)
			{
				$kdUnit=$datD->kode_unit;
				$nmUnit=$datD->nama_unit;
				$kdProv=$datD->kode_provinsi;
			}
			
			foreach($dataUser as $row):
			$newdata = array(
				'userid'	=> $row->id_user,
				'nama'		=> $row->nama_asli,
				'nip'		=> $row->NIP,
				'nrp'		=> $row->NRP,
				'id_level'	=> $row->id_level,
				'kdUnit'	=> $kdUnit,
				'nmUnit'	=> $nmUnit,
				'kdProv'	=> $kdProv
			);
			endforeach;
			$this->session->set_userdata($newdata);
			$this->main();
		}
		else
		{
			if($id!=""){ $idL="$id"; }else{ $idL="$idLevel"; }
			$data['id']		= $idL;
			$data['inc']	= $this->temp_model->includeFile();
			$this->load->view('login',$data);
		}	
	}
	
	function main()
	{
		$this->cekLogin();
		
		$data['pendaftaran']= $this->pendaftaranmodel->getAllPendaftaran();
		$data['inc']		= $this->temp_model->includeFile();
		$data['header']		= $this->temp_model->headerInc('0');
		$data['footer']		= $this->temp_model->footerInc();

		$this->load->view('mainapp',$data);
	}
	
	function main2()
	{
		$this->cekLogin();
		
		$data['inc']		= $this->temp_model->includeFile();
		$data['header']		= $this->temp_model->headerInc('0');
		$data['footer']		= $this->temp_model->footerInc();
		
		$this->load->view('mainapp2',$data);
	}
	
	function usercheck($str)
	{
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		$idLevel	= $this->input->post('id');
		
		$query = $this->user_model->getUserByNip($username,$idLevel)->result();
		foreach ($query as $row)
		{
			$pass=$row->password;
		} 
		
		if(count($query) == 0)
		{
			$this->form_validation->set_message('usercheck', '<p class="error"> %s Salah !! </p>');
			return FALSE;
		}
		else
		{
			if($password!=$pass)
			{
				$this->form_validation->set_message('usercheck', '<p class="error"> Password Salah, Silahkan Ulangi !! </p>');
				return FALSE;
			}else{
				return TRUE;
			}
		}
	}
	
	function logout()
	{
		$this->session->sess_destroy();
		redirect('home','refresh');
	}
}