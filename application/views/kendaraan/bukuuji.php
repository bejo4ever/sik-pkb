<!DOCTYPE html>
<html lang="en">
<head>
<script type="text/javascript" src="<?= base_url(); ?>js/global.js"></script>
<style>
		table { font-size:11px; }
		table tr { height:20px; }
		.itlc { margin:-5px 0 0 0; font-style:italic; }
		.isi { color:#666666; line-height:15px; }
	</style>
</head>
<body>
	
	<div class="grid_8 clearfix" style="width:100%; margin:-15px 0 5px -8px;">
		
		<div class="grid_6 leading" style="width:98%;">
			<div class="tabs">
				<ul>
					<li><a href="#pane-1">Hal 2</a></li>
					<li><a href="#pane-2">Hal 3</a></li>
					<li><a href="#pane-3">Hal 4</a></li>
					<li><a href="#pane-4">Hal 5</a></li>
					<li><a href="#pane-5">Hasil Pengujian</a></li>
					<li><a href="#pane-6">Catatan</a></li>
				</ul>
				<section id="pane-1">
					
					<div align="center" style="margin-top:-10px;">
						<h3><u>IDENTIFIKASI KENDARAAN DAN PEMILIK</u>
						<br><p class="itlc">IDENTIFICATION OF VEHICLE AND OWNER</p></h3>
					</div>
					<?php
						foreach($dKendaraan as $d1)
						{
							$noUji			= $d1->no_uji;
							$noKendaraan	= $d1->no_kendaraan;
							$pemilik		= $d1->nama;
							$alamat			= $d1->alamat;
							$idCard			= $d1->id_card;
						}
					?>
					<div class="clearfix">
					<table width="100%">
						<tr>
							<td colspan="3"><label><b><u>PEMILIK</u><br><p class="itlc">(OWNER)</p></b></label></td>
						</tr>
						<tr>
							<td width="30%"><b><u>Nomor Uji Berkala</u></b><br>
							<p class="itlc">(Periodical Inspection Number)</p></td>
							<td width="2%">:</td><td><span class="isi"><?=$noUji?></span></td>
						</tr>
						<tr>
							<td><b><u>Nomor Kendaraan</u></b><br>
							<p class="itlc">(Vehicle Registration Number)</p></td>
							<td>:</td><td><span class="isi"><?=$noKendaraan?></span></td>
						</tr>
						<tr>
							<td><b><u>Nama Pemilik Kendaraan</u></b><br><p class="itlc">(Name of Owner)</p></td>
							<td>:</td><td><span class="isi"><?=$pemilik?></span></td>
						</tr>
						<tr>
							<td><b><u>Alamat Pemilik Kendaraan</u></b><br>
							<p class="itlc">(Address of Owner)</p></td>
							<td>:</td><td><span class="isi"><?=$alamat?></span></td>
						</tr>
						<tr>
							<td><b><u>Kartu Identitas Diri</u></b><br>
							<p class="itlc">(ID Card)</p></td>
							<td>:</td><td><span class="isi"><?=$idCard?></span></td>
						</tr>
					</table>
					</div>
					
				</section>
				
				<section id="pane-2">
					
					<div align="center" style="margin-top:-10px;">
					<h3><u>URAIAN DATA KENDARAAN</u><br><p class="itlc">DESCRIPTION OF VEHICLE</p></h3>                    
					</div>
					<?php
						foreach($dKendaraan as $d2)
						{
							$merek		= $d2->merek;
							$tipe		= $d2->tipe;
							$jenis		= $this->master_model->namaJenis($d2->id_jeniskendaraan);
							$silinder	= $d2->isi_silinder;
							$daya		= $d2->daya_motor;
							$sDaya		= $d2->satuan_daya;
							$bahanBakar	= $d2->bahan_bakar;
							$pembuatan	= $d2->tahun_buat;
							$penggunaan	= $this->master_model->namaTipe($d2->id_statuskendaraan);
							$chasis		= $d2->no_chassis;
							$noMesin	= $d2->no_mesin;
							$nosrut		= $d2->no_ujitipe." ".$d2->tgl_ujitipe."<br>".$d2->no_srut." ".$d2->tgl_srut;
						}
					?>
					<div class="clearfix">
					<table width="100%">
						<tr>
							<td colspan="3"><b>IDENTITAS KENDARAAN <i>(IDENTITY OF VEHICLE)</i></b></td>
						</tr>
						<tr>
							<td width="60%"><b>Merek</b> <span class="itlc">(Brand)</span></td>
							<td width="2%">:</td><td><span class="isi"><?=$merek?></span></td>
						</tr>
						<tr>
							<td><b>Tipe</b> <span class="itlc">(Type)</span></td>
							<td>:</td><td><span class="isi"><?=$tipe?></span></td>
						</tr>
						<tr>
							<td><b>Jenis</b> <span class="itlc">(Category)</span></td>
							<td>:</td><td><span class="isi"><?=$jenis?></span></td>
						</tr>
						<tr>
							<td><b>Isi Silinder</b> <span class="itlc">(Cylinder Volume)</span></td>
							<td>:</td><td><span class="isi"><?=$silinder?></span> cc</td>
						</tr>
						<tr>
							<td><b>Daya Motor</b> <span class="itlc">(Power)</span></td>
							<td>:</td><td><span class="isi"><?=$daya?></span> <?=$sDaya?></td>
						</tr>
						<tr>
							<td><b>Bahan Bakar</b> <span class="itlc">(Fuel)</span></td>
							<td>:</td><td><span class="isi"><?=$bahanBakar?></span></td>
						</tr>
						<tr>
							<td><b>Tahun Pembuatan</b> <span class="itlc">(Year of Manufactured)</span></td>
							<td>:</td><td><span class="isi"><?=$pembuatan?></span></td>
						</tr>
						<tr>
							<td><b>Status Penggunaan</b> <span class="itlc">(Usage Status)</span></td>
							<td>:</td><td><span class="isi"><?=$penggunaan?></span></td>
						</tr>
						<tr>
							<td><b>Nomor Rangka Landasan</b> <span class="itlc">(Chassis Number)</span></td>
							<td>:</td><td><span class="isi"><?=$chasis?></span></td>
						</tr>
						<tr>
							<td><b>Nomor Mesin</b> <span class="itlc">(Engine Number)</span></td>
							<td>:</td><td><span class="isi"><?=$noMesin?></span></td>
						</tr>
						<tr>
							<td>
							<b><u>Nomor dan Tanggal Sertifikasi Uji Tipe dan Sertifikat Registrasi Uji Tipe</u></b><br>
							<p class="itlc">(Number and Date of Type Approval Certificate and Type Approval Certificate Registration)</p></td>
							<td>:</td><td><?=$nosrut?></td>
						</tr>
					</table>
					<!-- end isi hal 3 -->
					</div>
					
				</section>
				
				<section id="pane-3">
					
					 <div align="center">
						<b>UKURAN KENDARAAN<i>(VEHICLE DIMENSIONS)</i></b>
					</div>
					
					<table width="100%" class="tbl2">
					<tr>
						<td colspan="3"><b>a. Ukuran Utama<i> (Main Dimension)</i></b></td>
					</tr>
					<tr>
						<td colspan="3">
							<?php
							foreach($dKendaraan as $d3)
							{
								$panjang	= $d3->panjang;
								$lebar		= $d3->lebar;
								$tinggi		= $d3->tinggi;
								$roh		= $d3->julur_belakang;
								$foh		= $d3->julur_depan;
							}
							?>
							<table width="100%" style="font-size:9px; margin-left:15px;">
							<tr>
								<td width="60%"><b>Panjang</b> <span class="itlc">(Length)</span></td>
								<td width="3%">:</td><td><span class="isi"><?=$panjang?></span> mm</td>
							</tr>
							<tr>
								<td><b>Lebar</b> <span class="itlc">(Width)</span></td>
								<td>:</td><td><span class="isi"><?=$lebar?></span> mm</td>
							</tr>
							<tr>
								<td><b>Tinggi</b> <span class="itlc">(Height)</span></td>
								<td>:</td><td><span class="isi"><?=$tinggi?></span> mm</td>
							</tr>
							<tr>
								<td><b>Julur Belakang</b> <span class="itlc">(Rear Over Hang)/ROH</span></td>
								<td>:</td><td><span class="isi"><?=$roh?></span> mm</td>
							</tr>
							<tr>
								<td><b>Julur Depan</b> <span class="itlc">(Front Over Hang)/FOH</span></td>
								<td>:</td><td><span class="isi"><?=$foh?></span> mm</td>
							</tr>
							</table>
							
						</td>
					</tr>
					<tr>
						<td colspan="3"><b>b. Jarak Sumbu<i> (Wheel Base)</i></b></td>
					</tr>
					<tr>
						<td colspan="3">
							<?php
							foreach($dKendaraan as $d4)
							{
								$sumbu12	= $d4->sumbu_12;
								$sumbu23	= $d4->sumbu_23;
								$sumbu34	= $d4->sumbu_34;
								$q			= $d4->q;
							}
							?>
							<table width="100%" style="font-size:9px; margin-left:15px;">
							<tr>
								<td width="60%"><b>Sumbu I-II</b> <span class="itlc">(Axie I-II)</span></td>
								<td width="3%">:</td><td><span class="isi"><?=$sumbu12?></span> mm</td>
							</tr>
							<tr>
								<td><b>Sumbu II-III</b> <span class="itlc">(Axie II-III)</span></td>
								<td>:</td><td><span class="isi"><?=$sumbu23?></span> mm</td>
							</tr>
							<tr>
								<td><b>Sumbu III-IV</b> <span class="itlc">(Axie III-IV)</span></td>
								<td>:</td><td><span class="isi"><?=$sumbu34?></span> mm</td>
							</tr>
							<tr>
								<td><b>Q</b> <span class="itlc">(Jarak Titik Berat)</span></td>
								<td>:</td><td><span class="isi"><?=$q?></span> mm</td>
							</tr>
							</table>
							
						</td>
					</tr>
					<tr>
						<td colspan="3"><b>c. Dimensi Bak Muatan<i> (Mobil Barang Bak Terbuka/Bak Tertutup/Box)</i></b></td>
					</tr>
					<tr>
						<td colspan="3">
							<?php
							foreach($dKendaraan as $d5)
							{
								$p_bak	= $d5->panjang_bak;
								$l_bak	= $d5->lebar_bak;
								$t_bak	= $d5->tinggi_bak;
								$b_bak	= $d5->bahan_bak;
							}
							?>
							<table width="100%" style="font-size:9px; margin-left:15px;">
							<tr>
								<td width="60%"><b>Panjang</b></td>
								<td width="3%">:</td><td><span class="isi"><?=$p_bak?></span> mm</td>
							</tr>
							<tr>
								<td><b>Lebar</b></td>
								<td>:</td><td><span class="isi"><?=$l_bak?></span> mm</td>
							</tr>
							<tr>
								<td><b>Tinggi</b></td>
								<td>:</td><td><span class="isi"><?=$t_bak?></span> mm</td>
							</tr>
							<tr>
								<td><b>Bahan Bak</b></td>
								<td>:</td><td><span class="isi"><?=$b_bak?></span> mm</td>
							</tr>
							</table>
							
						</td>
					</tr>
					<tr>
						<td colspan="3"><b>c1. Dimensi Tangki</b></td>
					</tr>
					<tr>
						<td colspan="3">
							<?php
							foreach($dKendaraan as $d6)
							{
								$p_tangki	= $d6->panjang_tangki;
								$l_tangki	= $d6->lebar_tangki;
								$t_tangki	= $d6->tinggi_tangki;
								$v_tangki	= $d6->volume_tangki;
								$j_muatan	= $d6->jenis_muatan;
								$b_muatan	= $d6->berat_jenis_muatan;
								$b_tangki	= $d6->bahan_tangki;
							}
							?>
							<table width="100%" style="font-size:9px; margin-left:15px;">
							<tr>
								<td width="60%"><b>Panjang</b></td>
								<td width="3%">:</td><td><span class="isi"><?=$p_tangki?></span> mm</td>
							</tr>
							<tr>
								<td><b>Lebar</b></td>
								<td>:</td><td><span class="isi"><?=$l_tangki?></span> mm</td>
							</tr>
							<tr>
								<td><b>Tinggi</b></td>
								<td>:</td><td><span class="isi"><?=$t_tangki?></span> mm</td>
							</tr>
							<tr>
								<td><b>Volume</b></td>
								<td>:</td><td><span class="isi"><?=$v_tangki?></span> ltr</td>
							</tr>
							<tr>
								<td><b>Jenis Muatan</b></td>
								<td>:</td><td><span class="isi"><?=$j_muatan?></span></td>
							</tr>
							<tr>
								<td><b>Berat Jenis Muatan</b></td>
								<td>:</td><td><span class="isi"><?=$b_muatan?></span> kg/dm<sup>3</sup></td>
							</tr>
							<tr>
								<td><b>Bahan Tamgki</b></td>
								<td>:</td><td><span class="isi"><?=$b_tangki?></span></td>
							</tr>
							</table>
							
						</td>
					</tr>
					<tr>
						<td colspan="3"><b><u>PEMAKAIAN BAN YANG DIIJINKAN</u></b><p class="itlc">(PERMISSIBLE TIRE USED)</p></td>
					</tr>
					<tr>
						<td colspan="3">
							<?php
							foreach($dKendaraan as $d7)
							{
								$sumbu1	= $d7->sumbu_1;
								$sumbu2	= $d7->sumbu_2;
								$sumbu3	= $d7->sumbu_3;
								$sumbu4	= $d7->sumbu_4;
								$jbb	= $d7->jbb;
								$jbkb	= $d7->jbkb;
							}
							?>
							<table width="100%" style="font-size:9px; margin-left:15px;">
							<tr>
								<td width="60%"><b>a. Sumbu Ke-1</b> <span class="itlc">(First Axie)</span></td>
								<td width="3%">:</td><td><span class="isi"><?=$sumbu1?></span></td>
							</tr>
							<tr>
								<td><b>b. Sumbu Ke-2</b> <span class="itlc">(Second Axie)</span></td>
								<td>:</td><td><span class="isi"><?=$sumbu2?></span> </td>
							</tr>
							<tr>
								<td><b>c. Sumbu Ke-3</b> <span class="itlc">(Third Axie)</span></td>
								<td>:</td><td><span class="isi"><?=$sumbu3?></span> </td>
							</tr>
							<tr>
								<td><b>d. Sumbu Ke-4</b> <span class="itlc">(Fourth Axie)</span></td>
								<td>:</td><td><span class="isi"><?=$sumbu4?></span> </td>
							</tr>
							</table>
							
						</td>
					</tr>
					<tr>
						<td><b><u>KONFIGURASI SUMBU</u></b><p class="itlc">(AXLE CONFIGURATION)</p></td>
					 </tr>
					 <tr>
						<td width="63%"><b><u>Jumlah Berat Yang Diperbolehkan (JBB)</u></b><p class="itlc">Gross Vehicle Weight(GVW)</p></td><td  width="3%">:</td><td><span class="isi"><?=$jbb?></span> kg</td>
					</tr>
					<tr>
						<td><b><u>Jumlah Berat Kombinasi Yang Diperbolehkan (JBKB)</u></b><p class="itlc">Gross Combination Weight (GCW)</p></td><td  width="3%">:</td><td><span class="isi"><?=$jbkb?></span> kg</td>
					</tr>
					</table>
					
				</section>
				
				<section id="pane-4">
						
					<?php
						foreach($dKendaraan as $d8)
						{
							$bk_s1	= $d8->bk_sumbu_1;
							$bk_s2	= $d8->bk_sumbu_2;
							$bk_s3	= $d8->bk_sumbu_3;
							$bk_s4	= $d8->bk_sumbu_4;
							$tot_bk	= $bk_s1+$bk_s2+$bk_s3+$bk_s4;
						}
					?>               
					  <table width="100%">
					   <tr>
						<td colspan="2"><b>BERAT KOSONG</b><i>&nbsp;(KERB WEIGHT)</i></td>
					  </tr>
					  <tr>
						<td width="70%">&nbsp;&nbsp;&nbsp; <b>Sumbu Ke-1</b> <span class="itlc">(First Axie)</span></td>
						<td width="3%">:</td><td><span class="isi"><?=$bk_s1?></span> kg</td>
					 </tr>
					  <tr>
						<td>&nbsp;&nbsp;&nbsp; <b>Sumbu Ke-2</b> <span class="itlc">(Second Axie)</span></td>
						<td>:</td><td><span class="isi"><?=$bk_s2?></span> kg</td>
					 </tr>
					  <tr>
						<td>&nbsp;&nbsp;&nbsp; <b>Sumbu Ke-3</b> <span class="itlc">(Third Axie)</span></td>
						<td>:</td><td><span class="isi"><?=$bk_s3?></span> kg</td>
					 </tr> 
					 <tr>
						<td>&nbsp;&nbsp;&nbsp; <b>Sumbu Ke-4</b> <span class="itlc">(Fourth Axie)</span></td>
						<td>:</td><td><span class="isi"><?=$bk_s4?></span> kg</td>
					 </tr>      
					<tr style="height:30px;">
						<td>&nbsp;&nbsp;&nbsp; <b>Jumlah (Total)</b></td>
						<td>:</td><td><span class="isi"><?=$tot_bk?></span> kg</td>
					 </tr> 
					 <tr>
						<td colspan="2"><b>DAYA ANGKUT</b><i>&nbsp;(PAY LOAD)</i></td>
					</tr>
					<?php
						foreach($dKendaraan as $d9)
						{
							$orang	= $d8->orang;
							$barang	= $d8->barang;
							$jbi	= $d8->JBI;
							$jbki	= $d8->JBKI;
							$mst	= $d8->MST;
							$kjt	= $d8->KJT;
						}
					?>
					</tr>
					 <tr>
						<td>&nbsp;&nbsp;&nbsp; <b>Orang</b> <span class="itlc">(Persons)</span></td>
						<td>:</td><td><span class="isi"><?=$orang?></span> Penumpang/Passenger</td>
					 </tr> 
					<tr style="height:30px;">
						<td>&nbsp;&nbsp;&nbsp; <b>Barang</b> <span class="itlc">(Goods)</span></td>
						<td>:</td><td><span class="isi"><?=$barang?></span> kg</td>
					 </tr>
					 <tr>
						<td><b>Jumlah Berat Yang diijinkan (JBI)</b> <span class="itlc">Gross Permissible Vehicle Weight(GPVW)</span></td>
						<td>:</td><td><span class="isi"><?=$jbi?></span> kg</td>
					 </tr>
					 <tr>
						<td><b>Jumlah Berat Kombinasi Yang Diijinkan (JBKI)</b> <span class="itlc">Gross Permissible Combination Weight (GPCW)</span></td>
						<td>:</td><td><span class="isi"><?=$jbki?></span> kg</td>
					 </tr>
					 <tr>
						<td><b>Muatan Sumbu Terberat (MST)</b> <span class="itlc">(Permissible Axie Load)</span></td>
						<td>:</td><td><span class="isi"><?=$mst?></span> kg</td>
					 </tr>
					 <tr>
						<td><b>Kelas Jalan Yang Boleh Dilalui</b> <span class="itlc">(The Lowes Road Category)</span></td>
						<td>:</td><td><span class="isi"><?=$kjt?></span></td>
					 </tr>
					</table>
					
				</section>
				
				<section id="pane-5">
					
					<div align="right" style="margin:0 0 5px 0;">
						<select name="tgl_uji">
						<?php foreach($pengujian as $h): ?>
							<?php $noDaftar[]	= $h->no_pendaftaran; ?>
							<option value="">No Pendaftaran <?=$h->no_pendaftaran?></option>
						<?php endforeach; ?>
						</select>
					</div>
					
					<?php
						$hasilUji=$this->pengujianmodel->getStatus($noDaftar[0]);
						foreach($hasilUji as $s)
						{
							$verifikasi	= $s->verifikasi;
							$keterangan	= $s->keterangan;
							$penguji	= $s->nama_penguji;
						}
					?>
					
					<table width="100%" border="1" cellpadding="0" cellspacing="0" style="border:1px #000000 solid">
					<tr align="center">
						<td><b><u>ITEM UJI</u><br><span style="margin-top:-5px;">TESTING</span></b></td>
						<td><b><u>AMBANG BATAS</u><br>THRESSHOLD</b></td>
						<td><b><u>HASIL UJI</u><br>TEST RESULT</b></td>
						<td><b><u>KETERANGAN</u><br>REMARK</b></td>
					</tr>
					<tr style="height:5px;"><td colspan="4"><hr color="#000000"></td></tr>
					<tr>
						<td width="20%"rowspan="5" align="center"><b>REM UTAMA <br> (BRAKE)</b></td>
						<td >Total Gaya Pengereman &ge; 50% x Total berat sumbu (kg)</td>
						<td align="right" width="15%"><?=$this->pengujianmodel->getHasilUjiFisik($noDaftar[0],'1211','')?> kg</td>
						<td rowspan="5" width="20%" align="center"><?=$verifikasi?></td>
					</tr>
					<tr>
						<td rowspan="4">Selisih Gaya Pengereman roda kiri dan roda kanan dalam satu sumbu 8%</td>
						<td align="right">I &nbsp;&nbsp;&nbsp;&nbsp; <?=$this->pengujianmodel->getHasilUjiFisik($noDaftar[0],'1311','')?> %</td>
					</tr>
					<tr>
						<td align="right">II &nbsp;&nbsp;&nbsp;&nbsp; <?=$this->pengujianmodel->getHasilUjiFisik($noDaftar[0],'1312','')?> %</td>
					</tr>
					<tr>
						<td align="right">III &nbsp;&nbsp;&nbsp;&nbsp; <?=$this->pengujianmodel->getHasilUjiFisik($noDaftar[0],'1313','')?> %</td>
					</tr>
					<tr>
						<td align="right">IV &nbsp;&nbsp;&nbsp;&nbsp; <?=$this->pengujianmodel->getHasilUjiFisik($noDaftar[0],'1314','')?> %</td>
					</tr>
					<tr style="height:5px;"><td colspan="4"><hr color="#000000"></td></tr>
					<tr>
						<td align="center" rowspan="4"><b>LAMPU UTAMA <br> (HEAD LAMP)</b></td>
						<td>Kekuatan Pancar Lampu Kanan  12.000 cd (lampu jauh)</td>
						<td align="right"><?=$this->pengujianmodel->getHasilUjiFisik($noDaftar[0],'1011','')?> cd</td>
						<td align="center" rowspan="4">Berlaku sampai Dengan</td>
					</tr>
					<tr>
						<td>Kekuatan Pancar Lampu Kiri  12.000 cd (lampu jauh)</td>
						<td align="right"><?=$this->pengujianmodel->getHasilUjiFisik($noDaftar[0],'1012','')?> cd</td>
					</tr>
					<tr>
						<td>Penyimpangan Ke Kanan 1&deg; 34&acute; (lampu jauh)</td>
						<td align="right"><?=$this->pengujianmodel->getHasilUjiFisik($noDaftar[0],'1021','')?> &deg; <?=$this->pengujianmodel->getHasilUjiFisik($noDaftar[0],'1022','')?>&acute; </td>
					</tr>
					<tr>
						<td>Penyimpangan Ke Kiri 0&deg; 09&acute; (lampu jauh)</td>
						<td align="right"><?=$this->pengujianmodel->getHasilUjiFisik($noDaftar[0],'1031','')?> &deg; <?=$this->pengujianmodel->getHasilUjiFisik($noDaftar[0],'1032','')?> &acute; </td>
					</tr>
					<tr style="height:5px;"><td colspan="4"><hr color="#000000"></td></tr>
					<tr>
						<td align="center" rowspan="8"><b>EMISI <br> (EMISSION)</b></td>
						<td>Asap (bahan bakar solar) 70%</td>
						<td align="right"><?=$this->pengujianmodel->getHasilUjiFisik($noDaftar[0],'811','')?> %</td>
						<td align="center" rowspan="8"><?=$penguji?></td>
					</tr>
					<tr>
						<td>Bahan Bakar Bensin</td><td></td>
					</tr>
					<tr>
						<td>Tahun Pembuatan < <?=date('Y')-4?></td><td></td>
					</tr>
					<tr>
						<td> - CO : 4,5 %</td>
						<td align="right"> <?=$this->pengujianmodel->getHasilUjiFisik($noDaftar[0],'821','')?> %</td>
					</tr>
					<tr>
						<td> - HCL : 1.200 ppm</td>
						<td align="right"> <?=$this->pengujianmodel->getHasilUjiFisik($noDaftar[0],'822','')?> ppm</td>
					</tr>
					<tr>
						<td>Tahun Pembuatan &ge; <?=date('Y')-4?></td><td></td>
					</tr>
					<tr>
						<td> - CO : 1,5 %</td>
						<td align="right"> <?=$this->pengujianmodel->getHasilUjiFisik($noDaftar[0],'821','')?> %</td>
					</tr>
					<tr>
						<td> - HCL : 200 ppm</td>
						<td align="right"> <?=$this->pengujianmodel->getHasilUjiFisik($noDaftar[0],'822','')?> ppm</td>
					</tr>
					</table>
					
				</section>
				
				<section id="pane-6">
					
					<div align="right" style="margin:0 0 5px 0;">
						<select name="tgl_uji">
							<?php foreach($pengujian as $h): ?>
							<?php $noDaftar[]	= $h->no_pendaftaran; ?>
							<option value="">No Pendaftaran <?=$h->no_pendaftaran?></option>
						<?php endforeach; ?>
						</select>
					</div>
					
					<div align="center">
						<b>Catatan<i>(Notes)</i></b>
					</div>
					
					<table width="100%" style="border:1px #000000 solid; min-height:200px;">
					<tr>
						<td style="padding:5px 5px 5px 5px;"><?=$keterangan?></td>
					</tr>
					</table>
					
				</section>
				
			</div>
		</div>
	
	</div>
	
</body>
</html>