<?php if ( ! defined('BASEPATH')) exit('Silahkan menghubungi Administrator');

class exportdata extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->helper(array('form', 'url', 'html','file'));
		$this->load->library('PHPExcel');
		$this->load->library('PHPExcel/IOFactory');
		$this->load->library('form_validation');
		$this->load->model('temp_model','',TRUE);
		$this->load->model('dishub_model','',TRUE);
		$this->load->model('unitpkb_model','',TRUE);
		$this->load->model('penguji_model','',TRUE);
		$this->load->model('peralatanuji_model','',TRUE);
		$this->load->model('kendaraanmodel','',TRUE);
		$this->load->model('exportsmodel','',TRUE);
		$this->cekLogin();
	}
	
	function cekLogin() {
		if($this->session->userdata('id_level')=="") {
			redirect('home');
		}
	}
	
	function index() {
		$data['inc']		= $this->temp_model->includeFile();
		$data['header']		= $this->temp_model->headerInc('5');
		$data['footer']		= $this->temp_model->footerInc();
		$data['submenu']	= $this->temp_model->submenudaftar('1');
		
		$this->load->view('/utility/exportform', $data);
	}
	
	function ProsesUnduhFile() {
		// inisialisasi proses ekspor data
		$this->load->library('PHPExcel');
        $this->load->library('PHPExcel/IOFactory');
 
		$pPeriodecari= $this->input->post('periode');
		
		$objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()->setTitle("export")->setDescription("none");
		$objPHPExcel->getDefaultStyle()->getFont()->setName('Arial');
		$objPHPExcel->getDefaultStyle()->getFont()->setSize(11);
		
		// Proses ekspor data dari tabel-tabel database
		// Worksheet #0 - dishub
		$dtDishub	= $this->dishub_model->getDishub();

		$objPHPExcel->createSheet(0);
		$objPHPExcel->setActiveSheetIndex(0);
		$objPHPExcel->getActiveSheet()->setTitle('dishub');
		$objPHPExcel->getActiveSheet()->setCellValue('A1', 'kode_dishub');
		$objPHPExcel->getActiveSheet()->setCellValue('B1', 'nama_dishub');
		$objPHPExcel->getActiveSheet()->setCellValue('C1', 'alamat_dishub');
		$objPHPExcel->getActiveSheet()->setCellValue('D1', 'kode_provinsi');
		$objPHPExcel->getActiveSheet()->setCellValue('E1', 'kode_kabkota');
		$objPHPExcel->getActiveSheet()->setCellValue('F1', 'telp_dishub');
		$objPHPExcel->getActiveSheet()->setCellValue('G1', 'email_dishub');
		$objPHPExcel->getActiveSheet()->setCellValue('H1', 'nama_kadis');
		$objPHPExcel->getActiveSheet()->setCellValue('I1', 'nip_kadis');
		
		foreach (range('A', 'I') as $letter) { 
			$objPHPExcel->getActiveSheet()->getColumnDimension($letter)->setAutoSize(true);
		} 

		$i=2;
		foreach($dtDishub as $dt){
			$objPHPExcel->getActiveSheet()->setCellValue('A'.$i, (!empty($dt->kode_dishub)   ? $dt->kode_dishub : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('B'.$i, (!empty($dt->nama_dishub)   ? $dt->nama_dishub : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('C'.$i, (!empty($dt->alamat_dishub) ? $dt->alamat_dishub : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('D'.$i, (!empty($dt->kode_provinsi) ? $dt->kode_provinsi : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('E'.$i, (!empty($dt->kode_kabkota)  ? $dt->kode_kabkota : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('F'.$i, (!empty($dt->telp_dishub)   ? $dt->telp_dishub : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('G'.$i, (!empty($dt->email_dishub)  ? $dt->email_dishub : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('H'.$i, (!empty($dt->nama_kadis)    ? $dt->nama_kadis : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('I'.$i, (!empty($dt->nip_kadis)     ? $dt->nip_kadis : '-'));
			$i++;
		}
		
		// Worksheet #1 - unit_pkb
		$dtUnitPkb		= $this->unitpkb_model->getUnitPKB();

		$objPHPExcel->createSheet(1);
		$objPHPExcel->setActiveSheetIndex(1);
		$objPHPExcel->getActiveSheet()->setTitle('unit_pkb');
		$objPHPExcel->getActiveSheet()->setCellValue('A1', 'kode_unit');
		$objPHPExcel->getActiveSheet()->setCellValue('B1', 'jenis_unit');
		$objPHPExcel->getActiveSheet()->setCellValue('C1', 'nama_unit');
		$objPHPExcel->getActiveSheet()->setCellValue('D1', 'luas');
		$objPHPExcel->getActiveSheet()->setCellValue('E1', 'kapasitas');
		$objPHPExcel->getActiveSheet()->setCellValue('F1', 'alamat_unit');
		$objPHPExcel->getActiveSheet()->setCellValue('G1', 'telp_unit');
		$objPHPExcel->getActiveSheet()->setCellValue('H1', 'email_unit');
		$objPHPExcel->getActiveSheet()->setCellValue('I1', 'nama_kanit');	
		$objPHPExcel->getActiveSheet()->setCellValue('J1', 'nip_kanit');	
		$objPHPExcel->getActiveSheet()->setCellValue('K1', 'kode_dishub');	
		$objPHPExcel->getActiveSheet()->setCellValue('L1', 'foto');	
		
		foreach (range('A', 'L') as $letter) { 
			$objPHPExcel->getActiveSheet()->getColumnDimension($letter)->setAutoSize(true);
		} 
		
		$i=2;
		foreach($dtUnitPkb as $dt){
			$objPHPExcel->getActiveSheet()->setCellValue('A'.$i, (!empty($dt->kode_unit)   ? $dt->kode_unit : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('B'.$i, (!empty($dt->jenis_unit)  ? $dt->jenis_unit : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('C'.$i, (!empty($dt->nama_unit)   ? $dt->nama_unit : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('D'.$i, (!empty($dt->luas)        ? $dt->luas : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('E'.$i, (!empty($dt->kapasitas)   ? $dt->kapasitas : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('F'.$i, (!empty($dt->alamat_unit) ? $dt->alamat_unit : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('G'.$i, (!empty($dt->telp_unit)   ? $dt->telp_unit : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('H'.$i, (!empty($dt->email_unit)  ? $dt->email_unit : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('I'.$i, (!empty($dt->nama_kanit)  ? $dt->nama_kanit : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('J'.$i, (!empty($dt->nip_kanit)   ? $dt->nip_kanit : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('K'.$i, (!empty($dt->kode_dishub) ? $dt->kode_dishub : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('L'.$i, (!empty($dt->foto)        ? $dt->foto : '-'));
			$i++;
		}

		// Worksheet #2 - fasilitas
		$dtFasilitas	= $this->unitpkb_model->getFasilitas();

		$objPHPExcel->createSheet(2);
		$objPHPExcel->setActiveSheetIndex(2);
		$objPHPExcel->getActiveSheet()->setTitle('fasilitas');
		$objPHPExcel->getActiveSheet()->setCellValue('A1', 'kd_fasilitas');
		$objPHPExcel->getActiveSheet()->setCellValue('B1', 'fasilitas');
		$objPHPExcel->getActiveSheet()->setCellValue('C1', 'jumlah');
		$objPHPExcel->getActiveSheet()->setCellValue('D1', 'satuan');
		$objPHPExcel->getActiveSheet()->setCellValue('E1', 'kode_unit');
		
		foreach (range('A', 'E') as $letter) { 
			$objPHPExcel->getActiveSheet()->getColumnDimension($letter)->setAutoSize(true);
		} 
		
		$i=2;
		foreach($dtFasilitas as $dt){
			$objPHPExcel->getActiveSheet()->setCellValue('A'.$i, (!empty($dt->kd_fasilitas) ? $dt->kd_fasilitas : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('B'.$i, (!empty($dt->fasilitas)    ? $dt->fasilitas : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('C'.$i, (!empty($dt->jumlah)       ? $dt->jumlah : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('D'.$i, (!empty($dt->satuan)       ? $dt->satuan : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('E'.$i, (!empty($dt->kode_unit)    ? $dt->kode_unit : '-'));
			$i++;
		}
		
		// Worksheet #3 - penguji
		$dtPenguji		= $this->penguji_model->getPenguji();

		$objPHPExcel->createSheet(3);
		$objPHPExcel->setActiveSheetIndex(3);
		$objPHPExcel->getActiveSheet()->setTitle('penguji');
		$objPHPExcel->getActiveSheet()->setCellValue('A1', 'nip_penguji');
		$objPHPExcel->getActiveSheet()->setCellValue('B1', 'NRP');
		$objPHPExcel->getActiveSheet()->setCellValue('C1', 'nama_penguji');
		$objPHPExcel->getActiveSheet()->setCellValue('D1', 'gol_pangkat');
		$objPHPExcel->getActiveSheet()->setCellValue('E1', 'jabatan_fungsional');
		$objPHPExcel->getActiveSheet()->setCellValue('F1', 'kode_unit');
		$objPHPExcel->getActiveSheet()->setCellValue('G1', 'tipe_penguji');
		$objPHPExcel->getActiveSheet()->setCellValue('H1', 'foto');
		
		foreach (range('A', 'H') as $letter) { 
			$objPHPExcel->getActiveSheet()->getColumnDimension($letter)->setAutoSize(true);
		} 
		
		$i=2;
		foreach($dtPenguji as $dt){
			$objPHPExcel->getActiveSheet()->setCellValue('A'.$i, (!empty($dt->nip_penguji) ? $dt->nip_penguji : '-') );
			$objPHPExcel->getActiveSheet()->setCellValue('B'.$i, (!empty($dt->NRP) ? $dt->NRP : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('C'.$i, (!empty($dt->nama_penguji) ? $dt->nama_penguji : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('D'.$i, $dt->gol_pangkat);
			$objPHPExcel->getActiveSheet()->setCellValue('E'.$i, (!empty($dt->jabatan_fungsional) ? $dt->jabatan_fungsional : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('F'.$i, (!empty($dt->kode_unit) ? $dt->kode_unit : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('G'.$i, (!empty($dt->tipe_penguji) ? $dt->tipe_penguji : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('H'.$i, (!empty($dt->foto) ? $dt->foto : '-'));
			$i++;
		}
		
		// Worksheet #4 - sertifikat_penguji
		$dtSertifikat	= $this->penguji_model->getAllSertifikat();

		$objPHPExcel->createSheet(4);
		$objPHPExcel->setActiveSheetIndex(4);
		$objPHPExcel->getActiveSheet()->setTitle('sertifikat_penguji');
		$objPHPExcel->getActiveSheet()->setCellValue('A1', 'NRP');
		$objPHPExcel->getActiveSheet()->setCellValue('B1', 'no_sertifikat');
		$objPHPExcel->getActiveSheet()->setCellValue('C1', 'tgl_terbit');
		$objPHPExcel->getActiveSheet()->setCellValue('D1', 'lembaga_penerbit');
		$objPHPExcel->getActiveSheet()->setCellValue('E1', 'jenis_sertifikat');
		
		foreach (range('A', 'E') as $letter) { 
			$objPHPExcel->getActiveSheet()->getColumnDimension($letter)->setAutoSize(true);
		} 
		
		$i=2;
		foreach($dtSertifikat as $dt){
			$objPHPExcel->getActiveSheet()->setCellValue('A'.$i, (!empty($dt->NRP) ? $dt->NRP : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('B'.$i, (!empty($dt->no_sertifikat) ? $dt->no_sertifikat : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('C'.$i, (!empty($dt->tgl_terbit) ? $dt->tgl_terbit : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('D'.$i, (!empty($dt->lembaga_penerbit) ? $dt->lembaga_penerbit : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('E'.$i, (!empty($dt->jenis_sertifikat) ? $dt->jenis_sertifikat : '-'));
			$i++;
		}

		// Worksheet #5 - riwayat_pendidikan
		$dtRiwayat		= $this->penguji_model->getAllRiwayat();

		$objPHPExcel->createSheet(5);
		$objPHPExcel->setActiveSheetIndex(5);
		$objPHPExcel->getActiveSheet()->setTitle('riwayat_pendidikan');
		$objPHPExcel->getActiveSheet()->setCellValue('A1', 'NRP');
		$objPHPExcel->getActiveSheet()->setCellValue('B1', 'kd_riwayat');
		$objPHPExcel->getActiveSheet()->setCellValue('C1', 'periode');
		$objPHPExcel->getActiveSheet()->setCellValue('D1', 'keterangan');
		
		foreach (range('A', 'D') as $letter) { 
			$objPHPExcel->getActiveSheet()->getColumnDimension($letter)->setAutoSize(true);
		} 
		
		$i=2;
		foreach($dtRiwayat as $dt){
			$objPHPExcel->getActiveSheet()->setCellValue('A'.$i, (!empty($dt->NRP) ? $dt->NRP : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('B'.$i, (!empty($dt->kd_riwayat) ? $dt->kd_riwayat : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('C'.$i, (!empty($dt->periode) ? $dt->periode : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('D'.$i, (!empty($dt->keterangan) ? $dt->keterangan : '-'));
			$i++;
		}

		// Worksheet #6 - penghargaan_penguji
		$dtPenghargaan	= $this->penguji_model->getAllPenghargaan();

		$objPHPExcel->createSheet(6);
		$objPHPExcel->setActiveSheetIndex(6);
		$objPHPExcel->getActiveSheet()->setTitle('penghargaan_penguji');
		$objPHPExcel->getActiveSheet()->setCellValue('A1', 'NRP');
		$objPHPExcel->getActiveSheet()->setCellValue('B1', 'kd_penghargaan');
		$objPHPExcel->getActiveSheet()->setCellValue('C1', 'tahun');
		$objPHPExcel->getActiveSheet()->setCellValue('D1', 'penghargaan');
		
		foreach (range('A', 'D') as $letter) { 
			$objPHPExcel->getActiveSheet()->getColumnDimension($letter)->setAutoSize(true);
		} 
		
		$i=2;
		foreach($dtPenghargaan as $dt){
			$objPHPExcel->getActiveSheet()->setCellValue('A'.$i, (!empty($dt->NRP) ? $dt->NRP : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('B'.$i, (!empty($dt->kd_penghargaan) ? $dt->kd_penghargaan : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('C'.$i, (!empty($dt->tahun) ? $dt->tahun : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('D'.$i, (!empty($dt->penghargaan) ? $dt->penghargaan : '-'));
			$i++;
		}

		// Worksheet #7 - sanksi_penguji
		$dtSanksi	= $this->penguji_model->getAllSanksi();
		
		$objPHPExcel->createSheet(7);
		$objPHPExcel->setActiveSheetIndex(7);
		$objPHPExcel->getActiveSheet()->setTitle('sanksi_penguji');
		$objPHPExcel->getActiveSheet()->setCellValue('A1', 'NRP');
		$objPHPExcel->getActiveSheet()->setCellValue('B1', 'kd_sanksi');
		$objPHPExcel->getActiveSheet()->setCellValue('C1', 'tahun');
		$objPHPExcel->getActiveSheet()->setCellValue('D1', 'sanksi');
		
		foreach (range('A', 'D') as $letter) { 
			$objPHPExcel->getActiveSheet()->getColumnDimension($letter)->setAutoSize(true);
		} 
		
		$i=2;
		foreach($dtSanksi as $dt){
			$objPHPExcel->getActiveSheet()->setCellValue('A'.$i, (!empty($dt->NRP) ? $dt->NRP : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('B'.$i, (!empty($dt->kd_sanksi) ? $dt->kd_sanksi : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('C'.$i, (!empty($dt->tahun) ? $dt->tahun : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('D'.$i, (!empty($dt->sanksi) ? $dt->sanksi : '-'));
			$i++;
		}

		// Worksheet #8 - peralatan_uji
		$dtperalatanuji	= $this->peralatanuji_model->getAlat();

		$objPHPExcel->createSheet(8);
		$objPHPExcel->setActiveSheetIndex(8);
		$objPHPExcel->getActiveSheet()->setTitle('peralatan_uji');
		$objPHPExcel->getActiveSheet()->setCellValue('A1', 'kode_alat');
		$objPHPExcel->getActiveSheet()->setCellValue('B1', 'nama_alat');
		$objPHPExcel->getActiveSheet()->setCellValue('C1', 'merk');
		$objPHPExcel->getActiveSheet()->setCellValue('D1', 'kode_kelompok');
		$objPHPExcel->getActiveSheet()->setCellValue('E1', 'jumlah_alat');
		$objPHPExcel->getActiveSheet()->setCellValue('F1', 'status_alat');
		$objPHPExcel->getActiveSheet()->setCellValue('G1', 'tahun_produksi');
		$objPHPExcel->getActiveSheet()->setCellValue('H1', 'tahun_penggunaan');
		$objPHPExcel->getActiveSheet()->setCellValue('I1', 'tahun_kalibrasi');
		$objPHPExcel->getActiveSheet()->setCellValue('J1', 'kode_unit');
		
		foreach (range('A', 'J') as $letter) { 
			$objPHPExcel->getActiveSheet()->getColumnDimension($letter)->setAutoSize(true);
		} 
		
		$i=2;
		foreach($dtperalatanuji as $dt){
			$objPHPExcel->getActiveSheet()->setCellValue('A'.$i, (!empty($dt->kode_alat) ? $dt->kode_alat : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('B'.$i, (!empty($dt->nama_alat) ? $dt->nama_alat : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('C'.$i, (!empty($dt->merk) 	? $dt->merk : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('D'.$i, (!empty($dt->kd_kelompok) ? $dt->kd_kelompok : '0'));
			$objPHPExcel->getActiveSheet()->setCellValue('E'.$i, (!empty($dt->jumlah_alat) ? $dt->jumlah_alat : '0'));
			$objPHPExcel->getActiveSheet()->setCellValue('F'.$i, (!empty($dt->status_alat) ? $dt->status_alat : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('G'.$i, (!empty($dt->tahun_produksi) ? $dt->tahun_produksi : '0000'));
			$objPHPExcel->getActiveSheet()->setCellValue('H'.$i, (!empty($dt->tahun_penggunaan) ? $dt->tahun_penggunaan : '0000'));
			$objPHPExcel->getActiveSheet()->setCellValue('I'.$i, (!empty($dt->tahun_kalibrasi) ? $dt->tahun_kalibrasi : '0000'));
			$objPHPExcel->getActiveSheet()->setCellValue('J'.$i, (!empty($dt->kode_unit) ? $dt->kode_unit : '-'));
			$i++;
		}

		// Worksheet #9 - kendaraan
		$dtKendaraan	= $this->kendaraanmodel->getAllKendaraan();

		$objPHPExcel->createSheet(9);
		$objPHPExcel->setActiveSheetIndex(9);
		$objPHPExcel->getActiveSheet()->setTitle('kendaraan');
		$objPHPExcel->getActiveSheet()->setCellValue('A1', 'no_uji');
		$objPHPExcel->getActiveSheet()->setCellValue('B1', 'no_srut');
		$objPHPExcel->getActiveSheet()->setCellValue('C1', 'no_kendaraan');
		$objPHPExcel->getActiveSheet()->setCellValue('D1', 'merek');
		$objPHPExcel->getActiveSheet()->setCellValue('E1', 'tipe');
		$objPHPExcel->getActiveSheet()->setCellValue('F1', 'id_jeniskendaraan');
		$objPHPExcel->getActiveSheet()->setCellValue('G1', 'isi_silinder');
		$objPHPExcel->getActiveSheet()->setCellValue('H1', 'daya_motor');
		$objPHPExcel->getActiveSheet()->setCellValue('I1', 'satuan_daya');
		$objPHPExcel->getActiveSheet()->setCellValue('J1', 'bahan_bakar');
		$objPHPExcel->getActiveSheet()->setCellValue('K1', 'tahun_buat');
		$objPHPExcel->getActiveSheet()->setCellValue('L1', 'id_statuskendaraan'); 
		$objPHPExcel->getActiveSheet()->setCellValue('M1', 'no_chassis'); 
		$objPHPExcel->getActiveSheet()->setCellValue('N1', 'no_mesin'); 
		$objPHPExcel->getActiveSheet()->setCellValue('O1', 'no_ujitipe'); 
		$objPHPExcel->getActiveSheet()->setCellValue('P1', 'tgl_ujitipe'); 
		$objPHPExcel->getActiveSheet()->setCellValue('Q1', 'tgl_srut'); 
		$objPHPExcel->getActiveSheet()->setCellValue('R1', 'tgl_ujipertama'); 
		$objPHPExcel->getActiveSheet()->setCellValue('S1', 'tgl_ujiberikut'); 
		$objPHPExcel->getActiveSheet()->setCellValue('T1', 'kode_unit'); 
		$objPHPExcel->getActiveSheet()->setCellValue('U1', 'foto_depan'); 
		$objPHPExcel->getActiveSheet()->setCellValue('V1', 'foto_belakang'); 
		$objPHPExcel->getActiveSheet()->setCellValue('W1', 'foto_kiri'); 
		$objPHPExcel->getActiveSheet()->setCellValue('X1', 'foto_kanan'); 
		
		foreach (range('A', 'X') as $letter) { 
			$objPHPExcel->getActiveSheet()->getColumnDimension($letter)->setAutoSize(true);
		} 
		
		$i=2;
		foreach($dtKendaraan as $dt){
			$objPHPExcel->getActiveSheet()->setCellValue('A'.$i, (!empty($dt->no_uji) ? $dt->no_uji : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('B'.$i, (!empty($dt->no_srut) ? $dt->no_srut : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('C'.$i, (!empty($dt->no_kendaraan) ? $dt->no_kendaraan : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('D'.$i, (!empty($dt->merek) ? $dt->merek : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('E'.$i, (!empty($dt->tipe) ? $dt->tipe : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('F'.$i, (!empty($dt->id_jeniskendaraan) ? $dt->id_jeniskendaraan : '0'));
			$objPHPExcel->getActiveSheet()->setCellValue('G'.$i, (!empty($dt->isi_silinder) ? $dt->isi_silinder : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('H'.$i, (!empty($dt->daya_motor) ? $dt->daya_motor : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('I'.$i, (!empty($dt->satuan_daya) ? $dt->satuan_daya : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('J'.$i, (!empty($dt->bahan_bakar) ? $dt->bahan_bakar : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('K'.$i, (!empty($dt->tahun_buat) ? $dt->tahun_buat : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('L'.$i, (!empty($dt->id_statuskendaraan) ? $dt->id_statuskendaraan : '0'));
			$objPHPExcel->getActiveSheet()->setCellValue('M'.$i, (!empty($dt->no_chassis) ? $dt->no_chassis : '-')); 
			$objPHPExcel->getActiveSheet()->setCellValue('N'.$i, (!empty($dt->no_mesin) ? $dt->no_mesin : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('O'.$i, (!empty($dt->no_ujitipe) ? $dt->no_ujitipe : '-')); 
			$objPHPExcel->getActiveSheet()->setCellValue('P'.$i, (!empty($dt->tgl_ujitipe) ? $dt->tgl_ujitipe : '0000-00-00')); 
			$objPHPExcel->getActiveSheet()->setCellValue('Q'.$i, (!empty($dt->tgl_srut) ? $dt->tgl_srut : '0000-00-00')); 
			$objPHPExcel->getActiveSheet()->setCellValue('R'.$i, (!empty($dt->tgl_ujipertama) ? $dt->tgl_ujipertama : '0000-00-00')); 
			$objPHPExcel->getActiveSheet()->setCellValue('S'.$i, (!empty($dt->tgl_ujiberikut) ? $dt->tgl_ujiberikut : '0000-00-00')); 
			$objPHPExcel->getActiveSheet()->setCellValue('T'.$i, (!empty($dt->kode_unit) ? $dt->kode_unit : '-')); 
			$objPHPExcel->getActiveSheet()->setCellValue('U'.$i, (!empty($dt->foto_depan) ? $dt->foto_depan : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('V'.$i, (!empty($dt->foto_belakang) ? $dt->foto_belakang : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('W'.$i, (!empty($dt->foto_kiri) ? $dt->foto_kiri : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('X'.$i, (!empty($dt->foto_kanan) ? $dt->foto_kanan : '-'));
			$i++;
		}

		// Worksheet #10 - uraian_kendaraan
		$dtUraianKend	= $this->exportsmodel->getAllDataUraianKendaraan($pPeriodecari);
		
		$objPHPExcel->createSheet(10);
		$objPHPExcel->setActiveSheetIndex(10);
		$objPHPExcel->getActiveSheet()->setTitle('uraian_kendaraan');
		$objPHPExcel->getActiveSheet()->setCellValue('A1', 'no_srut');
		$objPHPExcel->getActiveSheet()->setCellValue('B1', 'no_bap');
		$objPHPExcel->getActiveSheet()->setCellValue('C1', 'panjang');
		$objPHPExcel->getActiveSheet()->setCellValue('D1', 'lebar');
		$objPHPExcel->getActiveSheet()->setCellValue('E1', 'tinggi');
		$objPHPExcel->getActiveSheet()->setCellValue('F1', 'julur_belakang');
		$objPHPExcel->getActiveSheet()->setCellValue('G1', 'julur_depan');
		$objPHPExcel->getActiveSheet()->setCellValue('H1', 'sumbu_12');
		$objPHPExcel->getActiveSheet()->setCellValue('I1', 'sumbu_23');
		$objPHPExcel->getActiveSheet()->setCellValue('J1', 'sumbu_34');
		$objPHPExcel->getActiveSheet()->setCellValue('K1', 'q');
		$objPHPExcel->getActiveSheet()->setCellValue('L1', 'panjang_bak');
		$objPHPExcel->getActiveSheet()->setCellValue('M1', 'lebar_bak');
		$objPHPExcel->getActiveSheet()->setCellValue('N1', 'tinggi_bak');
		$objPHPExcel->getActiveSheet()->setCellValue('O1', 'bahan_bak');
		$objPHPExcel->getActiveSheet()->setCellValue('P1', 'model_tangki');
		$objPHPExcel->getActiveSheet()->setCellValue('Q1', 'panjang_tangki');
		$objPHPExcel->getActiveSheet()->setCellValue('R1', 'lebar_tangki');
		$objPHPExcel->getActiveSheet()->setCellValue('S1', 'tinggi_tangki');
		$objPHPExcel->getActiveSheet()->setCellValue('T1', 'volume_tangki');
		$objPHPExcel->getActiveSheet()->setCellValue('U1', 'jenis_muatan');
		$objPHPExcel->getActiveSheet()->setCellValue('V1', 'berat_jenis_muatan');
		$objPHPExcel->getActiveSheet()->setCellValue('W1', 'bahan_tangki');
		$objPHPExcel->getActiveSheet()->setCellValue('X1', 'sumbu_1');
		$objPHPExcel->getActiveSheet()->setCellValue('Y1', 'sumbu_2');
		$objPHPExcel->getActiveSheet()->setCellValue('Z1', 'sumbu_3');
		$objPHPExcel->getActiveSheet()->setCellValue('AA1', 'sumbu_4');
		$objPHPExcel->getActiveSheet()->setCellValue('AB1', 'jbb');
		$objPHPExcel->getActiveSheet()->setCellValue('AC1', 'jbkb');
		$objPHPExcel->getActiveSheet()->setCellValue('AD1', 'bk_sumbu_1');
		$objPHPExcel->getActiveSheet()->setCellValue('AE1', 'bk_sumbu_2');
		$objPHPExcel->getActiveSheet()->setCellValue('AF1', 'bk_sumbu_3');
		$objPHPExcel->getActiveSheet()->setCellValue('AG1', 'bk_sumbu_4');
		$objPHPExcel->getActiveSheet()->setCellValue('AH1', 'orang');
		$objPHPExcel->getActiveSheet()->setCellValue('AI1', 'barang');
		$objPHPExcel->getActiveSheet()->setCellValue('AJ1', 'JBI');
		$objPHPExcel->getActiveSheet()->setCellValue('AK1', 'JBKI');
		$objPHPExcel->getActiveSheet()->setCellValue('AL1', 'MST');
		$objPHPExcel->getActiveSheet()->setCellValue('AM1', 'KJT');
		
		foreach (range('A', 'Z') as $letter) { 
			$objPHPExcel->getActiveSheet()->getColumnDimension($letter)->setAutoSize(true);
		} 
		$objPHPExcel->getActiveSheet()->getColumnDimension('AA')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('AB')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('AC')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('AD')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('AE')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('AF')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('AG')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('AH')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('AI')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('AJ')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('AK')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('AL')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('AM')->setAutoSize(true);
		
		$i=2;
		foreach($dtUraianKend as $dt){
			$objPHPExcel->getActiveSheet()->setCellValue('A'.$i, (!empty($dt->no_srut) ? $dt->no_srut : '0'));
			$objPHPExcel->getActiveSheet()->setCellValue('B'.$i, (!empty($dt->no_bap) ? $dt->no_bap : '0'));
			$objPHPExcel->getActiveSheet()->setCellValue('C'.$i, (!empty($dt->panjang) ? $dt->panjang : '0'));
			$objPHPExcel->getActiveSheet()->setCellValue('D'.$i, (!empty($dt->lebar) ? $dt->lebar : '0'));
			$objPHPExcel->getActiveSheet()->setCellValue('E'.$i, (!empty($dt->tinggi) ? $dt->tinggi : '0'));
			$objPHPExcel->getActiveSheet()->setCellValue('F'.$i, (!empty($dt->julur_belakang) ? $dt->julur_belakang : '0'));
			$objPHPExcel->getActiveSheet()->setCellValue('G'.$i, (!empty($dt->julur_depan) ? $dt->julur_depan : '0'));
			$objPHPExcel->getActiveSheet()->setCellValue('H'.$i, (!empty($dt->sumbu_12) ? $dt->sumbu_12 : '0'));
			$objPHPExcel->getActiveSheet()->setCellValue('I'.$i, (!empty($dt->sumbu_23) ? $dt->sumbu_23 : '0'));
			$objPHPExcel->getActiveSheet()->setCellValue('J'.$i, (!empty($dt->sumbu_34) ? $dt->sumbu_34 : '0'));
			$objPHPExcel->getActiveSheet()->setCellValue('K'.$i, (!empty($dt->q) ? $dt->q : '0'));
			$objPHPExcel->getActiveSheet()->setCellValue('L'.$i, (!empty($dt->panjang_bak) ? $dt->panjang_bak : '0'));
			$objPHPExcel->getActiveSheet()->setCellValue('M'.$i, (!empty($dt->lebar_bak) ? $dt->lebar_bak : '0'));
			$objPHPExcel->getActiveSheet()->setCellValue('N'.$i, (!empty($dt->tinggi_bak) ? $dt->tinggi_bak : '0'));
			$objPHPExcel->getActiveSheet()->setCellValue('O'.$i, (!empty($dt->bahan_bak) ? $dt->bahan_bak : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('P'.$i, (!empty($dt->model_tangki) ? $dt->model_tangki : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('Q'.$i, (!empty($dt->panjang_tangki) ? $dt->panjang_tangki : '0'));
			$objPHPExcel->getActiveSheet()->setCellValue('R'.$i, (!empty($dt->lebar_tangki) ? $dt->lebar_tangki : '0'));
			$objPHPExcel->getActiveSheet()->setCellValue('S'.$i, (!empty($dt->tinggi_tangki) ? $dt->tinggi_tangki : '0'));
			$objPHPExcel->getActiveSheet()->setCellValue('T'.$i, (!empty($dt->volume_tangki) ? $dt->volume_tangki : '0'));
			$objPHPExcel->getActiveSheet()->setCellValue('U'.$i, (!empty($dt->jenis_muatan) ? $dt->jenis_muatan : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('V'.$i, (!empty($dt->berat_jenis_muatan) ? $dt->berat_jenis_muatan : '0'));
			$objPHPExcel->getActiveSheet()->setCellValue('W'.$i, (!empty($dt->bahan_tangki) ? $dt->bahan_tangki : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('X'.$i, (!empty($dt->sumbu_1) ? $dt->sumbu_1 : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('Y'.$i, (!empty($dt->sumbu_2) ? $dt->sumbu_2 : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('Z'.$i, (!empty($dt->sumbu_3) ? $dt->sumbu_3 : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('AA'.$i, (!empty($dt->sumbu_4) ? $dt->sumbu_4 : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('AB'.$i, (!empty($dt->jbb) ? $dt->jbb : '0'));
			$objPHPExcel->getActiveSheet()->setCellValue('AC'.$i, (!empty($dt->jbkb) ? $dt->jbkb : '0'));
			$objPHPExcel->getActiveSheet()->setCellValue('AD'.$i, (!empty($dt->bk_sumbu_1) ? $dt->bk_sumbu_1 : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('AE'.$i, (!empty($dt->bk_sumbu_2) ? $dt->bk_sumbu_2 : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('AF'.$i, (!empty($dt->bk_sumbu_3) ? $dt->bk_sumbu_3 : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('AG'.$i, (!empty($dt->bk_sumbu_4) ? $dt->bk_sumbu_4 : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('AH'.$i, (!empty($dt->orang) ? $dt->orang : '0'));
			$objPHPExcel->getActiveSheet()->setCellValue('AI'.$i, (!empty($dt->barang) ? $dt->barang : '0'));
			$objPHPExcel->getActiveSheet()->setCellValue('AJ'.$i, (!empty($dt->JBI) ? $dt->JBI : '0'));
			$objPHPExcel->getActiveSheet()->setCellValue('AK'.$i, (!empty($dt->JBKI) ? $dt->JBKI : '0'));
			$objPHPExcel->getActiveSheet()->setCellValue('AL'.$i, (!empty($dt->MST) ? $dt->MST : '0'));
			$objPHPExcel->getActiveSheet()->setCellValue('AM'.$i, (!empty($dt->KJT) ? $dt->KJT : '0'));
			$i++;
		}

		// Worksheet #11 - pendaftaran
		$dtPendaftaran		= $this->exportsmodel->getAllDataPendaftaran($pPeriodecari);

		$objPHPExcel->createSheet(11);
		$objPHPExcel->setActiveSheetIndex(11);
		$objPHPExcel->getActiveSheet()->setTitle('pendaftaran');
		$objPHPExcel->getActiveSheet()->setCellValue('A1', 'no_pendaftaran');
		$objPHPExcel->getActiveSheet()->setCellValue('B1', 'tgl_pendaftaran');
		$objPHPExcel->getActiveSheet()->setCellValue('C1', 'nama_pendaftar');
		$objPHPExcel->getActiveSheet()->setCellValue('D1', 'no_srut');
		$objPHPExcel->getActiveSheet()->setCellValue('E1', 'tipe_pendaftaran');
		$objPHPExcel->getActiveSheet()->setCellValue('F1', 'status');
		$objPHPExcel->getActiveSheet()->setCellValue('G1', 'jumlah_bayar');
		$objPHPExcel->getActiveSheet()->setCellValue('H1', 'retribusi');
		
		foreach (range('A', 'H') as $letter) { 
			$objPHPExcel->getActiveSheet()->getColumnDimension($letter)->setAutoSize(true);
		}
		
		$i=2;
		foreach($dtPendaftaran as $dt){
			$objPHPExcel->getActiveSheet()->setCellValue('A'.$i, (!empty($dt->no_pendaftaran) ? $dt->no_pendaftaran : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('B'.$i, (!empty($dt->tgl_pendaftaran) ? $dt->tgl_pendaftaran : '0000-00-00'));
			$objPHPExcel->getActiveSheet()->setCellValue('C'.$i, (!empty($dt->nama_pendaftar) ? $dt->nama_pendaftar : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('D'.$i, (!empty($dt->no_srut) ? $dt->no_srut : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('E'.$i, (!empty($dt->tipe_pendaftaran) ? $dt->tipe_pendaftaran : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('F'.$i, (!empty($dt->status) ? $dt->status : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('G'.$i, (!empty($dt->jumlah_bayar) ? $dt->jumlah_bayar : '0'));
			$objPHPExcel->getActiveSheet()->setCellValue('H'.$i, (!empty($dt->retribusi) ? $dt->retribusi : '-'));
			$i++;
		}
		
		// Worksheet #12 - detail_hasil_pengujian
		$dtDetailHasilUji	= $this->exportsmodel->getAllDataDetailHasilUji($pPeriodecari);
		
		$objPHPExcel->createSheet(12);
		$objPHPExcel->setActiveSheetIndex(12);
		$objPHPExcel->getActiveSheet()->setTitle('detail_hasil_pengujian');
		$objPHPExcel->getActiveSheet()->setCellValue('A1', 'no bap');
		$objPHPExcel->getActiveSheet()->setCellValue('B1', 'kd_itempengujian');
		$objPHPExcel->getActiveSheet()->setCellValue('C1', 'hasil_uji');
		$objPHPExcel->getActiveSheet()->setCellValue('D1', 'status_hasil');
		$objPHPExcel->getActiveSheet()->setCellValue('E1', 'NRP');
		$objPHPExcel->getActiveSheet()->setCellValue('F1', 'kode_unit');
		
		foreach (range('A', 'F') as $letter) { 
			$objPHPExcel->getActiveSheet()->getColumnDimension($letter)->setAutoSize(true);
		} 
		
		$i=2;
		foreach($dtDetailHasilUji as $dt){
			$objPHPExcel->getActiveSheet()->setCellValue('A'.$i, (!empty($dt->no_bap) ? $dt->no_bap : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('B'.$i, (!empty($dt->kd_itempengujian) ? $dt->kd_itempengujian : '0'));
			$objPHPExcel->getActiveSheet()->setCellValue('C'.$i, (!empty($dt->hasil_uji) ? $dt->hasil_uji : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('D'.$i, (!empty($dt->status_hasil) ? $dt->status_hasil : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('E'.$i, (!empty($dt->NRP) ? $dt->NRP : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('F'.$i, (!empty($dt->kode_unit) ? $dt->kode_unit : '-'));
			$i++;
		}
		
		// Worksheet #13 - hasil_pengujian
		$dtHasilUji	= $this->exportsmodel->getAllDataHasilUji($pPeriodecari);
		
		$objPHPExcel->createSheet(13);
		$objPHPExcel->setActiveSheetIndex(13);
		$objPHPExcel->getActiveSheet()->setTitle('hasil_pengujian');
		$objPHPExcel->getActiveSheet()->setCellValue('A1', 'no_bap');
		$objPHPExcel->getActiveSheet()->setCellValue('B1', 'no_pendaftaran');
		$objPHPExcel->getActiveSheet()->setCellValue('C1', 'no_srut');
		$objPHPExcel->getActiveSheet()->setCellValue('D1', 'tgl_pengujian');
		$objPHPExcel->getActiveSheet()->setCellValue('E1', 'hasil_pengujian');
		$objPHPExcel->getActiveSheet()->setCellValue('F1', 'keterangan');
		$objPHPExcel->getActiveSheet()->setCellValue('G1', 'NRP');
		$objPHPExcel->getActiveSheet()->setCellValue('H1', 'kode_unit');
		
		foreach (range('A', 'H') as $letter) { 
			$objPHPExcel->getActiveSheet()->getColumnDimension($letter)->setAutoSize(true);
		} 
		
		$i=2;
		foreach($dtHasilUji as $dt){
			$objPHPExcel->getActiveSheet()->setCellValue('A'.$i, (!empty($dt->no_bap) ? $dt->no_bap : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('B'.$i, (!empty($dt->no_pendaftaran) ? $dt->no_pendaftaran : '0'));
			$objPHPExcel->getActiveSheet()->setCellValue('C'.$i, (!empty($dt->no_srut) ? $dt->no_srut : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('D'.$i, (!empty($dt->tgl_pengujian) ? $dt->tgl_pengujian : '0000-00-00'));
			$objPHPExcel->getActiveSheet()->setCellValue('E'.$i, (!empty($dt->hasil_pengujian) ? $dt->hasil_pengujian : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('F'.$i, (!empty($dt->keterangan) ? $dt->keterangan : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('G'.$i, (!empty($dt->NRP) ? $dt->NRP : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('H'.$i, (!empty($dt->kode_unit) ? $dt->kode_unit : '-'));
			$i++;
		}
		
		// Worksheet #14 - keberatan
		$dtKeberatan	= $this->exportsmodel->getAllKeberatan($pPeriodecari);
		
		$objPHPExcel->createSheet(14);
		$objPHPExcel->setActiveSheetIndex(14);
		$objPHPExcel->getActiveSheet()->setTitle('keberatan');
		$objPHPExcel->getActiveSheet()->setCellValue('A1', 'no_keberatan');
		$objPHPExcel->getActiveSheet()->setCellValue('B1', 'tgl_keberatan');
		$objPHPExcel->getActiveSheet()->setCellValue('C1', 'nama_pemohon');
		$objPHPExcel->getActiveSheet()->setCellValue('D1', 'id_pemohon');
		$objPHPExcel->getActiveSheet()->setCellValue('E1', 'alamat_pemohon');
		$objPHPExcel->getActiveSheet()->setCellValue('F1', 'keterangan');
		$objPHPExcel->getActiveSheet()->setCellValue('G1', 'status');
		$objPHPExcel->getActiveSheet()->setCellValue('H1', 'no_bap');
		$objPHPExcel->getActiveSheet()->setCellValue('I1', 'kode_unit');
		
		foreach (range('A', 'I') as $letter) { 
			$objPHPExcel->getActiveSheet()->getColumnDimension($letter)->setAutoSize(true);
		} 
		
		$i=2;
		foreach($dtKeberatan as $dt){
			$objPHPExcel->getActiveSheet()->setCellValue('A'.$i, (!empty($dt->no_keberatan) ? $dt->no_keberatan : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('B'.$i, (!empty($dt->tgl_keberatan) ? $dt->tgl_keberatan : '0000-00-00'));
			$objPHPExcel->getActiveSheet()->setCellValue('C'.$i, (!empty($dt->nama_pemohon) ? $dt->nama_pemohon : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('D'.$i, (!empty($dt->id_pemohon) ? $dt->id_pemohon : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('E'.$i, (!empty($dt->alamat_pemohon) ? $dt->alamat_pemohon : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('F'.$i, (!empty($dt->keterangan) ? $dt->keterangan : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('G'.$i, (!empty($dt->status) ? $dt->status : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('H'.$i, (!empty($dt->no_bap) ? $dt->no_bap : '-'));
			$objPHPExcel->getActiveSheet()->setCellValue('I'.$i, (!empty($dt->kode_unit) ? $dt->kode_unit : '-'));
			$i++;
		}

		// Create nama file hasil export
		$kodeUnit = $this->unitpkb_model->getKodeUnit();
		$namaFile = $kodeUnit . '_' . $pPeriodecari;

		// Inisiasi create writter
		$objWriter = IOFactory::createWriter($objPHPExcel, 'Excel5');
 
        // Sending headers to force the user to download the file
        header('Content-Type: application/vnd.ms-excel');
        //header('Content-Disposition: attachment;filename="data_'.$pPeriodecari.'.xls"');
        header('Content-Disposition: attachment;filename="data_'.$namaFile.'.xls"');
        header('Cache-Control: max-age=0');
 
        $objWriter->save('php://output');
	}
}