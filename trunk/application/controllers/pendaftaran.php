<?php if (!defined('BASEPATH')) exit('Silahkan menghubungi Administrator');
 
class pendaftaran extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('temp_model','',TRUE);
		$this->load->model('master_model','',TRUE);
		$this->load->model('kabkotamodel','',TRUE);
		$this->load->model('retribusimodel','',TRUE);
		$this->load->model('kendaraanmodel','',TRUE);
		$this->load->model('pemilikmodel','',TRUE);
		$this->load->model('uraianmodel','',TRUE);
		$this->load->model('pendaftaranmodel','',TRUE);
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
		$data['data']		= $this->pendaftaranmodel->getAllPendaftaran();
		$data['inc']		= $this->temp_model->includeFile();
		$data['header']		= $this->temp_model->headerInc('2');
		$data['footer']		= $this->temp_model->footerInc();
		$data['submenu']	= $this->temp_model->submenudaftar('3');
		
		$this->load->view('pendaftaran/pendaftaran_data',$data);
	}
	
	// Fungsi-fungsi untuk mengolah data pengujian berkala
	function ujiBerkala()
	{
		$data['jenisKend']	= $this->master_model->getAllJenisKendaraan();
		$data['tipeKend']	= $this->master_model->getAllTipeKendaraan();
		$data['kota'] 		= $this->kabkotamodel->get_by_prop($this->session->userdata('kdProv'))->result();
		$data['dRetribusi']	= $this->retribusimodel->getAllData();
		$data['inc']		= $this->temp_model->includeFile();
		$data['header']		= $this->temp_model->headerInc('2');
		$data['footer']		= $this->temp_model->footerInc();
		$data['submenu']	= $this->temp_model->submenudaftar('2');
		
		$this->load->view('pendaftaran/pendaftaran_berkala',$data);
	}

	function getDataKendaraan()
	{
		if($no_srut=="")
		{
			$no_srut = $this->input->post('no_srut');
		}
		
		$dataKend = $this->pendaftaranmodel->getById($no_srut);
		foreach($dataKend as $dat)
		{
			$data['no_srut']	= $dat->no_srut;
			$data['noUji']		= $dat->no_uji;
			$data['tgl_uji']	= $this->converter_model->tgl_Eng_In($dat->tgl_ujiberikut);
			$data['no_kend']	= $dat->no_kendaraan;
			$data['merek']		= $dat->merek;
			$data['tipe']		= $dat->tipe;
			$data['JK']			= $dat->id_jeniskendaraan;
			$data['silinder']	= $dat->isi_silinder;
			$data['daya_motor']	= $dat->daya_motor;
			$data['satuan_daya']= $dat->satuan_daya;
			$data['BhnBakar']	= $dat->bahan_bakar;
			$data['thnBuat']	= $dat->tahun_buat;
			$data['SP']			= $dat->id_statuskendaraan;
			$data['chassis']	= $dat->no_chassis;
			$data['noMesin']	= $dat->no_mesin;
			$data['no_ujitipe']	= $dat->no_ujitipe;
			$data['tgl_ujitipe']= $this->converter_model->tgl_Eng_In($dat->tgl_ujitipe);
			$data['pemilik']	= $dat->nama;
			$data['idCard']		= $dat->id_card;
			$data['alamat']		= $dat->alamat;
			$data['KK']			= $dat->kode_kabkota;
			$data['no_telp']	= $dat->no_telp;
			$data['no_hp']		= $dat->no_hp;
			$data['email']		= $dat->email;
		}
		
		$data['jenisKend']	= $this->master_model->getAllJenisKendaraan();
		$data['tipeKend']	= $this->master_model->getAllTipeKendaraan();
		$data['kota'] 		= $this->kabkotamodel->getKabkotaByKode($dat->kode_kabkota);
		$data['dRetribusi']	= $this->retribusimodel->getAllData();
		$data['inc']		= $this->temp_model->includeFile();
		$data['header']		= $this->temp_model->headerInc('2');
		$data['footer']		= $this->temp_model->footerInc();
		$data['submenu']	= $this->temp_model->submenudaftar('2');
		
		$this->load->view('pendaftaran/pendaftaran_berkala',$data);
	}

	function simpanPendaftaranBerkala()
	{
		$noPendaftaran	= $this->pendaftaranmodel->getNoPendaftaran();
		$pemilik		= $this->input->post('pemilik');
		$noSRUT			= $this->input->post('no_srut');
		//$noUji			= $this->input->post('no_uji');
		$biaya			= $this->input->post('jumlah_bayar');

		$retribusi		= $this->input->post('retribusi');
		for($i=0;$i<count($retribusi);$i++)
		{
			$totRet.=$retribusi[$i]."|";
		}
		
		// Simpan data pendaftaran
		$varDaftar		= array('no_pendaftaran'=>$noPendaftaran,'tgl_pendaftaran'=>date('Y-m-d H:i:s'),'nama_pendaftar'=>$pemilik,'no_srut'=>$noSRUT,'tipe_pendaftaran'=>'berkala','status'=>'daftar','jumlah_bayar'=>$biaya,'retribusi'=>$totRet);
		$this->pendaftaranmodel->save($varDaftar);
		
		// Hitung tanggal uji berkala berikutnya
		$blnSkrg	= date('m')+6;
		$thnSkrg	= date('Y');
		if ($blnSkrg > 12)
		{
			$blnSkrg = $blnSkrg - 12;
			$thnSkrg = $thnSkrg + 1;
		}
		$tglUjiBerikut	= $thnSkrg."-".$blnSkrg."-".date('d');
		
		// Update data kendaraan
		$varKendaraan	=array('tgl_ujiberikut'=>$tglUjiBerikut);
		$this->kendaraanmodel->updateByNoSrut($noSRUT, $varKendaraan);
			
		redirect('pendaftaran','refresh');
	}
	
	// Fungsi-fungsi untuk mengolah data pengujian baru
	function ujiBaru()
	{
		$data['jenisKend']	= $this->master_model->getAllJenisKendaraan();
		$data['tipeKend']	= $this->master_model->getAllTipeKendaraan();
		$data['kota'] 		= $this->kabkotamodel->get_by_prop($this->session->userdata('kdProv'))->result();
		$data['dRetribusi']	= $this->retribusimodel->getAllData();
		$data['inc']		= $this->temp_model->includeFile();
		$data['header']		= $this->temp_model->headerInc('2');
		$data['footer']		= $this->temp_model->footerInc();
		$data['submenu']	= $this->temp_model->submenudaftar('1');
		
		$this->load->view('pendaftaran/pendaftaran_baru',$data);
	}
	
	function simpanPendaftaranBaru()
	{
		$noPendaftaran	= $this->pendaftaranmodel->getNoPendaftaran();
		$kdUnit			= $this->session->userdata('kdUnit');

		$retribusi	= $this->input->post('retribusi');
		for($i=0;$i<count($retribusi);$i++)
		{
			$totRet.=$retribusi[$i]."|";
		}

		// Post data identitas kendaraan
		$noUji			= $this->input->post('no_uji');
		$noKend			= $this->input->post('no_kend');
		$merek			= $this->input->post('merek');
		$tipe			= $this->input->post('tipe');
		$jenisKend		= $this->input->post('jenisK');
		$silinder		= $this->input->post('silinder');
		$daya			= $this->input->post('daya');
		$satuanDaya		= $this->input->post('satuan_daya');
		$bahanBakar		= $this->input->post('bahan_bakar');
		$tahunBuat		= $this->input->post('tahun_buat');
		$penggunaan		= $this->input->post('penggunaan');
		$chasis			= $this->input->post('chasis');
		$noMesin		= $this->input->post('no_mesin');
		$noUjitipe		= $this->input->post('no_ujitipe');
		$tglUjitipe		= $this->converter_model->tgl_In_Eng($this->input->post('tgl_ujitipe'));
		$noSRUT			= $this->input->post('no_srut');
		$tglSRUT		= $this->converter_model->tgl_In_Eng($this->input->post('tgl_srut'));
		$tglAwal		= date('Y-m-d');
		
		// Hitung tanggal uji berkala berikutnya
		$blnSkrg	= date('m')+6;
		$thnSkrg	= date('Y');
		if ($blnSkrg > 12)
		{
			$blnSkrg = $blnSkrg - 12;
			$thnSkrg = $thnSkrg + 1;
		}
		$tglUjiBerikut	= $thnSkrg."-".$blnSkrg."-".date('d');
			
		// Post data pemilik kendaraan
		$pemilik		= $this->input->post('pemilik');
		$idCard			= $this->input->post('id_card');
		$alamat			= $this->input->post('alamat');
		$kota			= $this->input->post('kota');
		$telp			= $this->input->post('telp');
		$hp				= $this->input->post('hp');
		$email			= $this->input->post('email');
		
		// Post data biaya
		$biaya			= $this->input->post('jumlah_bayar');
		
		// Upload foto kendaraan
		$img1 = $this->img1_upload($noKend);
		$img2 = $this->img2_upload($noKend);
		$img3 = $this->img3_upload($noKend);
		$img4 = $this->img4_upload($noKend);
		
		if($img1=="error"){ $img1="0_1.jpg"; }
		if($img2=="error"){ $img2="0_2.jpg"; }
		if($img3=="error"){ $img3="0_3.jpg"; }
		if($img4=="error"){ $img4="0_4.jpg"; }
		
		// Simpan data pendaftaran
		$varDaftar = array('no_pendaftaran'=>$noPendaftaran,'tgl_pendaftaran'=>date('Y-m-d H:i:s'),'nama_pendaftar'=>$pemilik,'no_srut'=>$noSRUT,'tipe_pendaftaran'=>'baru','status'=>'daftar','jumlah_bayar'=>$biaya,'retribusi'=>$totRet);
		$this->pendaftaranmodel->save($varDaftar);
		
		// Simpan data pemilik kendaraan
		// Cek jika sudah ada dengan nomor SRUT yang sama
		$jml = $this->pemilikmodel->getJmlPemilik($noSRUT);
		if ($jml == 0){
			$varPemilik	=array('no_srut'=>$noSRUT,'nama'=>$pemilik,'id_card'=>$idCard,'alamat'=>$alamat,'kode_kabkota'=>$kota,'no_telp'=>$telp,'no_hp'=>$hp,'email'=>$email);
			$this->pemilikmodel->save($varPemilik);
		}		
						
		// Simpan data kendaraan
		$jmlkendaraan = $this->kendaraanmodel->getJmlKendaraan($noSRUT);
		if ($jmlkendaraan == 0){
			$varKendaraan	=array('no_uji'=>$noUji,'no_kendaraan'=>$noKend,'merek'=>$merek,'tipe'=>$tipe,'id_jeniskendaraan'=>$jenisKend,'isi_silinder'=>$silinder,'daya_motor'=>$daya,'satuan_daya'=>$satuanDaya,'bahan_bakar'=>$bahanBakar,'tahun_buat'=>$tahunBuat,'id_statuskendaraan'=>$penggunaan,'no_chassis'=>$chasis,'no_mesin'=>$noMesin,'no_ujitipe'=>$noUjitipe,'tgl_ujitipe'=>$tglUjitipe,'no_srut'=>$noSRUT,'tgl_srut'=>$tglSRUT,'kode_unit'=>$kdUnit,'tgl_ujipertama'=>$tglAwal,'tgl_ujiberikut'=>$tglUjiBerikut,'foto_depan'=>$img1,'foto_belakang'=>$img2,'foto_kiri'=>$img3,'foto_kanan'=>$img4);
			$this->kendaraanmodel->save($varKendaraan);
		}
		
		redirect('pendaftaran','refresh');	
	}

	// Fungsi-fungsi lainnya
	function upload()
	{
	  $config['upload_path'] 	= './uploads/';
      $config['allowed_types'] 	= 'gif|jpg|png|bmp|jpeg';
      $config['max_size']  		= '1000000';
      $config['max_width']  	= '3600';
      $config['max_height'] 	= '1700';
      
      $this->load->library('upload', $config);
      $configThumb = array();
      $configThumb['image_library'] = 'gd2';
      $configThumb['source_image'] = '';
      $configThumb['create_thumb'] = TRUE;
      $configThumb['maintain_ratio'] = TRUE;
      
      $configThumb['width']		= 512;
      $configThumb['height']	= 384;
      
      $this->load->library('image_lib');

      for($i = 1; $i < 5; $i++) 
	  {
        $upload = $this->upload->do_upload('image'.$i);
        if($upload === FALSE) continue;
        $data = $this->upload->data();

        $uploadedFiles[$i] = $data;
        if($data['is_image'] == 1) 
		{
          $configThumb['source_image'] = $data['full_path'];
          $this->image_lib->initialize($configThumb);
          $this->image_lib->resize();
        }
      }
  	}
	

	//========== IMAGE 1 =============
	
	public function img1_upload($noKend) {
		//konfigurasi limit file gambar yang diupload
        $config['upload_path']	= "./uploads/dpn";
        $config['allowed_types']= 'gif|jpg|png|jpeg';
		//$config['encrypt_name'] = FALSE;
		$config['max_size']     = '3000';
        $config['max_width']  	= '5000';
        $config['max_height']  	= '5000';
 		//$config['file_name']	= date('YmdHis');
		$config['file_name']	= $noKend."_1";
		
        $this->load->library('upload1', $config);
 		
        if ($this->upload1->do_upload("image1")) {
            $data	 	= $this->upload1->data();
 
            /* PATH */
            $source             = "./uploads/dpn/".$data['file_name'] ; // upload gambar asli
			$destination_thumb	= "./uploads/dpn/thumbnail/" ;
			
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
			//unlink(realpath("./uploads/galeri/".$data['file_name'])); // hapus gambar asli setelah di resize terlebih dahulu
			return $data['file_name'];
        }
        else {
            $status="error" ;
			return $status;
        }
    }
	
	//==== image 2 =====
	
	public function img2_upload($noKend) {
		//konfigurasi limit file gambar yang diupload
        $config['upload_path']	= "./uploads/blkng";
        $config['allowed_types']= 'gif|jpg|png|jpeg';
		//$config['encrypt_name'] = FALSE;
		$config['max_size']     = '3000';
        $config['max_width']  	= '5000';
        $config['max_height']  	= '5000';
 		$config['file_name']	= $noKend."_2";
		
        $this->load->library('upload2', $config);
 		
        if ($this->upload2->do_upload("image2")) {
            $data	 	= $this->upload2->data();
 
            /* PATH */
            $source             = "./uploads/blkng/".$data['file_name'] ; // upload gambar asli
			$destination_thumb	= "./uploads/blkng/thumbnail/" ;
			
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
			//unlink(realpath("./uploads/galeri/".$data['file_name'])); // hapus gambar asli setelah di resize terlebih dahulu
			return $data['file_name'];
        }
        else {
            $status="error" ;
			return $status;
        }
    }
	
	//==== image 3 =====
	
	public function img3_upload($noKend) {
		//konfigurasi limit file gambar yang diupload
        $config['upload_path']	= "./uploads/kiri";
        $config['allowed_types']= 'gif|jpg|png|jpeg';
		//$config['encrypt_name'] = FALSE;
		$config['max_size']     = '3000';
        $config['max_width']  	= '5000';
        $config['max_height']  	= '5000';
 		$config['file_name']	= $noKend."_3";
		
        $this->load->library('upload3', $config);
 		
        if ($this->upload3->do_upload("image3")) {
            $data	 	= $this->upload3->data();
 
            /* PATH */
            $source             = "./uploads/kiri/".$data['file_name'] ; // upload gambar asli
			$destination_thumb	= "./uploads/kiri/thumbnail/" ;
			
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
			//unlink(realpath("./uploads/galeri/".$data['file_name'])); // hapus gambar asli setelah di resize terlebih dahulu
			return $data['file_name'];
        }
        else {
            $status="error" ;
			return $status;
        }
    }
	
	//==== image 4 =====
	
	public function img4_upload($noKend) {
		//konfigurasi limit file gambar yang diupload
        $config['upload_path']	= "./uploads/kanan";
        $config['allowed_types']= 'gif|jpg|png|jpeg';
		//$config['encrypt_name'] = FALSE;
		$config['max_size']     = '3000';
        $config['max_width']  	= '5000';
        $config['max_height']  	= '5000';
 		$config['file_name']	= $noKend."_4";
		
        $this->load->library('upload4', $config);
 		
        if ($this->upload4->do_upload("image4")) {
            $data	 	= $this->upload4->data();
 
            /* PATH */
            $source             = "./uploads/kanan/".$data['file_name'] ; // upload gambar asli
			$destination_thumb	= "./uploads/kanan/thumbnail/" ;
			
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
			//unlink(realpath("./uploads/galeri/".$data['file_name'])); // hapus gambar asli setelah di resize terlebih dahulu
			return $data['file_name'];
        }
        else {
            $status="error" ;
			return $status;
        }
    }
	
	//=======================================================================
	
	function lhp()
	{
	
		$data['inc']		= $this->temp_model->includeFile();
		$data['header']		= $this->temp_model->headerInc('2');
		$data['footer']		= $this->temp_model->footerInc();
		$data['submenu']	= $this->temp_model->submenudaftar('0');
		
		$this->load->view('pendaftaran/lhp',$data);
	
	}
		
}
