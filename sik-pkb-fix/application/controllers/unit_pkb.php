<?php if ( ! defined('BASEPATH')) exit('Silahkan menghubungi Administrator');
 
class unit_pkb extends CI_Controller {
 
	function __construct() 
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('dishub_model','',TRUE);
		$this->load->model('unitpkb_model','',TRUE);
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
		$data['dishub']		= $this->dishub_model->getDishub();
		$data['unit_pkb']	= $this->unitpkb_model->getUnitPKB();
		$data['fasilitas']	= $this->unitpkb_model->getFasilitas();
		$data['inc']		= $this->temp_model->includeFile();
		$data['header']		= $this->temp_model->headerInc('1');
		$data['footer']		= $this->temp_model->footerInc();
		$data['submenu']	= $this->temp_model->submenudaftar('1');
		
		$this->load->view('data_rujukan/unit_pkb/unit_pkb_data',$data);
	}
	
	function update()
	{
		$id			= $this->input->post('id');
		$nama		= $this->input->post('nama');
		$dishub		= $this->input->post('dishub');
		$email		= $this->input->post('email');
		$alamat		= $this->input->post('alamat');
		$kepala		= $this->input->post('kepala');
		$telp		= $this->input->post('telp');
		$nip		= $this->input->post('nip');
		$luas		= $this->input->post('luas');
		$kapasitas	= $this->input->post('kapasitas');
		//$foto		= $this->input->post('gambar');
		
		if($id!="")
		{
			$upload=$this->do_upload();
			
			$varData=array('nama_unit'=>$nama,'alamat_unit'=>$alamat,'telp_unit'=>$telp,'email_unit'=>$email,'nama_kanit'=>$kepala,'nip_kanit'=>$nip,'luas'=>$luas,'kapasitas'=>$kapasitas,'kode_dishub'=>$dishub,'foto'=>$upload);
			$this->unitpkb_model->update($id,$varData);
		}
		else
		{
			$upload=$this->do_upload();
			
			$varData=array('kode_unit'=>$dishub."1",'nama_unit'=>$nama,'alamat_unit'=>$alamat,'telp_unit'=>$telp,'email_unit'=>$email,'nama_kanit'=>$kepala,'nip_kanit'=>$nip,'luas'=>$luas,'kapasitas'=>$kapasitas,'kode_dishub'=>$dishub,'foto'=>$upload);
			$this->unitpkb_model->save($varData);
		}
		redirect('unit_pkb','refresh');
	}
	
	
	function saveFasilitas()
	{
		$kdUnit		= $this->session->userdata('kdUnit');
		$idBaru		= $this->unitpkb_model->getFasilitasBaru($kdUnit);
		$deskripsi	= $this->input->post('fasilitas');
		$jumlah		= $this->input->post('jumlah');
		$satuan		= $this->input->post('satuan');
		
		$varData=array('kd_fasilitas'=>$idBaru,'kode_unit'=>$kdUnit,'fasilitas'=>$deskripsi,'jumlah'=>$jumlah, 'satuan'=>$satuan);
		$this->unitpkb_model->saveFasilitas($varData);
		
		redirect('unit_pkb','refresh');
	}

	function editFasilitas($id)
	{
		$data['data']		= $this->unitpkb_model->getFasilitasById($id);
		$this->load->view('data_rujukan/unit_pkb/fasilitas_edit',$data);
	}

	function saveEditFasilitas()
	{
		$kdFasilitas	= $this->input->post('kd_fasilitas');
		$deskripsi		= $this->input->post('fasilitas');
		$jumlah			= $this->input->post('jumlah');
		$satuan			= $this->input->post('satuan');
		
		$varData=array('fasilitas'=>$deskripsi, 'jumlah'=>$jumlah, 'satuan'=>$satuan );
		$this->unitpkb_model->updateFasilitas($kdFasilitas,$varData);
		
		redirect('unit_pkb','refresh');
	}

	function hapusFasilitas($id)
	{
		$this->unitpkb_model->deleteFasilitas($id);
		redirect('unit_pkb','refresh');
	}
	
	public function detFoto($id)
	{
		$data['unit_pkb']	= $this->unitpkb_model->getDetUnitPKB($id);
		$this->load->view('data_rujukan/unit_pkb/unit_foto',$data);
	}

	//======================== upload image =================
	
	public function do_upload() {
		//konfigurasi limit file gambar yang diupload
        $config['upload_path']	= "./uploads/unit";
        $config['allowed_types']= 'gif|jpg|png|jpeg';
		//$config['encrypt_name'] = FALSE;
		$config['max_size']     = '3000';
        $config['max_width']  	= '5000';
        $config['max_height']  	= '5000';
 		$config['file_name']	= date('YmdHis');
		
        $this->load->library('upload', $config);
 		
        if ($this->upload->do_upload("gambar")) {
            $data	 	= $this->upload->data();
 
            /* PATH */
            $source             = "./uploads/unit/".$data['file_name'] ; // upload gambar asli
			$destination_thumb	= "./uploads/unit/thumbnail/" ;
			
            /* Resizing Processing */
			// Configuration Of Image Manipulation :: Static
			$this->load->library('image_lib') ;
			$img['image_library'] = 'GD2';
			$img['create_thumb']  = TRUE;
			$img['maintain_ratio']= TRUE;
 
            /// Limit Width Resize
            $limit_medium   = 160 ;
            $limit_thumb    = 160 ;
 
            // Size Image Limit was using (LIMIT TOP)
            $limit_use  = $data['image_width'] > $data['image_height'] ? $data['image_width'] : $data['image_height'] ;
 
            // Percentase Resize
            if ($limit_use > $limit_medium || $limit_use > $limit_thumb) {
                $percent_medium = $limit_medium/$limit_use ;
                $percent_thumb  = $limit_thumb/$limit_use ;
            }
 
            //// Making THUMBNAIL ///////
	   		$img['width']  = $limit_use > $limit_thumb ?  $data['image_width'] * $percent_thumb : $data['image_width'] ;
            $img['height'] = $limit_use > $limit_thumb ?  $data['image_height'] * $percent_thumb : $data['image_height'] ;
 
            // Configuration Of Image Manipulation :: Dynamic
            //$img['thumb_marker'] = '_thumb-'.floor($img['width']).'x'.floor($img['height']) ;
			$img['thumb_marker'] = '' ;
            $img['quality']      = '100%' ;
            $img['source_image'] = $source ;
            $img['new_image']    = $destination_thumb ;
 
 			
            // Do Resizing
            $this->image_lib->initialize($img);
            $this->image_lib->resize();
            $this->image_lib->clear() ;
			//unlink(realpath("./uploads/unit/".$data['file_name'])); // hapus gambar asli setelah di resize terlebih dahulu
			return $data['file_name'];
        }
        else {
            $status="0_1.jpg" ;
			return $status;
        }
    }
	
// ==============================================================

}