<?php

//session_start();

class kabkota extends CI_Controller {

private $limit = 10000;

	function __construct()
	{
		parent :: __construct();
		
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->model('temp_model','',TRUE);
		$this->load->model('Kabkotamodel','',TRUE);
		$this->load->model('propinsiModel','',TRUE);
		$this->cekLogin();
	}
	function cekLogin()
	{
		if($this->session->userdata('id_level')=="")
		{
			redirect('home');
		}
	}
	
// == List data ==
	function index($offset = 0)
	{
	
		$data['inc']		= $this->temp_model->includeFile();
		$data['header']		= $this->temp_model->headerInc('4');
		$data['footer']		= $this->temp_model->footerInc();
	
		
			$uri_segment = 3;
			$offset = $this->uri->segment($uri_segment);
			$this->load->library('pagination');
			$config['base_url'] = site_url('kabkota/index/');
			$config['total_rows'] = $this->Kabkotamodel->count_kabkota();
			$config['per_page'] = $this->limit;
			$this->pagination->initialize($config);
			$data['pagination'] = $this->pagination->create_links();
			
			$data['offset']=$offset;
			
			$data['fields'] = $this->Kabkotamodel->get_list_kabkota($this->limit,$offset);
			
			$data['jumlah']=$this->Kabkotamodel->count_kabkota();
			
		
		$this->load->view('data_rujukan/kabkota/kabkota_data',$data);
	}
	

// === Add data ===

	function newData()
	{
		//$data['inc']		= $this->temp_model->includeFile();
		$data['header']		= $this->temp_model->headerInc('4');
		$data['footer']		= $this->temp_model->footerInc();
		
		$data['prov']=$this->propinsiModel->getAll();
				
		$this->load->view('data_rujukan/kabkota/kabkota_add', $data);
	}
	
// == save data ==
	function saveData()
		{
			$kode_kabkota				= $this->input->post('kode_kabkota');
			$nama_kabkota				= $this->input->post('nama_kabkota');
			$kode_provinsi				= $this->input->post('kode_provinsi');
								
			$this->form_validation->set_rules('kode_kabkota', 'kode kabkota', 'required');
			$this->form_validation->set_rules('nama_kabkota', 'nama_kabkota', 'required');
			$this->form_validation->set_rules('kode_provinsi', 'kode provinsi', 'required');
			
			$this->form_validation->set_message('required', ' %s tidak boleh kosong !!');
			if ($this->form_validation->run() == FALSE)
			{
				$this->newData();
			}else{
				$data = array(
					'nama_kabkota'		=> $nama_kabkota,
					'kode_kabkota'		=> $kode_kabkota,
					'kode_provinsi'		=> $kode_provinsi			
					);
				$this->Kabkotamodel->save($data);
				redirect('kabkota/index/','refresh');
			}
		}
		
		function saveDat()
		{
				
			$kode_provinsi	= $this->input->post('kode_provinsi');
			$kode_kabkota	= $this->input->post('kode_kabkota');
			$nama_kabkota	= $this->input->post('nama_kabkota');
			
			$kode=$this->Kabkotamodel->checkByKode($kode_kabkota)->result();
			$nama=$this->Kabkotamodel->checkByKabkota($nama_kabkota)->result();
			
			if (count($kode) != 0 || count($nama) != 0)
				{
					$data['inc']		= $this->temp_model->includeFile();
					$data['header']		= $this->temp_model->headerInc('4');
					$data['footer']		= $this->temp_model->footerInc();
					$data['f'] = 1;
					
					$uri_segment = 3;
					$offset = $this->uri->segment($uri_segment);
					$this->load->library('pagination');
					$config['base_url'] = site_url('kabkota/index/');
					$config['total_rows'] = $this->Kabkotamodel->count_kabkota();
					$config['per_page'] = $this->limit;
					$this->pagination->initialize($config);
					$data['pagination'] = $this->pagination->create_links();
					
					$data['offset']=$offset;
					
					$data['fields'] = $this->Kabkotamodel->get_list_kabkota($this->limit,$offset);
					
					$data['jumlah']=$this->Kabkotamodel->count_kabkota();
					
				
				$this->load->view('data_rujukan/kabkota/kabkota_data',$data);
					
							
				} 
				else 
				{
					
					$this->saveData();
				}
				

		}
		
		

// === edit data ==	
	function editData($id)
	{
			//$data['inc']		= $this->temp_model->includeFile();
			$data['header']		= $this->temp_model->headerInc('4');
			$data['footer']		= $this->temp_model->footerInc();

			$data['fields'] = $this->Kabkotamodel->get_by_id($id);
			$data['prov']=$this->propinsiModel->getAll();
			$this->load->view('data_rujukan/kabkota/kabkota_edit', $data);
											
	}
	
	function simpanedit()
	{
								
			$nama_kabkota	= $this->input->post('nama_kabkota');
			$id				= $this->input->post('kode_sblmnya');
			$kode			= $this->input->post('kode');
			$kode_provinsi	= $this->input->post('kode_provinsi');
			
			$data = array(
					'nama_kabkota' => $nama_kabkota,
					'kode_kabkota' => $kode,
					'kode_provinsi' => $kode_provinsi
					);
			
			$this->Kabkotamodel->update($id,$data);
			redirect('kabkota/index', 'refresh');
		
	}
	
	
	function konfirmUpdateData()
		{
				
			$kode_provinsi	= $this->input->post('kode_provinsi');
			$kode_kabkota	= $this->input->post('kode');
			$nama_kabkota	= $this->input->post('nama_kabkota');
			$id_check		= $this->input->post('kode_sblmnya');
			
			$kode=$this->Kabkotamodel->checkByKode($kode_kabkota)->result();
			$nama=$this->Kabkotamodel->checkByKabkota($nama_kabkota)->result();
			$dyas = $this->Kabkotamodel->get_by_id($kode_kabkota);
			foreach($dyas as $d)
			{
				$wew = $d->kode_kabkota;
			}
			
			$x=count($kode);
			$y=count($dyas);
			if ($x != 0)
				{
					$data['inc']		= $this->temp_model->includeFile();
					$data['header']		= $this->temp_model->headerInc('4');
					$data['footer']		= $this->temp_model->footerInc();
					$data['f'] = 1;
					
					$uri_segment = 3;
					$offset = $this->uri->segment($uri_segment);
					$this->load->library('pagination');
					$config['base_url'] = site_url('kabkota/index/');
					$config['total_rows'] = $this->Kabkotamodel->count_kabkota();
					$config['per_page'] = $this->limit;
					$this->pagination->initialize($config);
					$data['pagination'] = $this->pagination->create_links();
					
					$data['offset']=$offset;
					
					$data['fields'] = $this->Kabkotamodel->get_list_kabkota($this->limit,$offset);
					
					$data['jumlah']=$this->Kabkotamodel->count_kabkota();
					
				
				$this->load->view('data_rujukan/kabkota/kabkota_data',$data);
					
							
				} 
				else 
				{
					
					$this->simpanedit();
				}
				

		}

// == delete ==
		function deleteData($id)
			{
				$this->Kabkotamodel->delete($id);
				redirect('kabkota/index/');
			}
	
		
		
}
