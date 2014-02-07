<!DOCTYPE html>
<html lang="en">

<head>
	<?= $inc; ?>
	<style>
		table { font-size:11px; }
		table tr { height:20px; }
		.itlc { margin:-5px 0 0 0; font-style:italic; }
		.isi { color:#666666; line-height:15px; }
	</style>
</head>

<body style="overflow: hidden;">

	<div id="loading"> 
 		<script type = "text/javascript"> 
			document.write("<div id='container'><p id='content'>" + "<img id='loadinggraphic' width='16' height='16' src='<?= base_url() ?>images/ajax-loader-eeeeee.gif' /> " + "Loading...</p></div>");
		</script> 
	</div>

	<div id="wrapper" class="clearfix">	
    	<?= $header; ?>
		<div class="grid_8 clearfix" style="width:100%; margin:-25px -10px 5px 1px;">
		<div class="grid_6 leading" style="width:98%;">
			<div class="tabs">
				<ul>
					<li><a href="#pane-1">Detail Kendaraan</a></li>
					<li><a href="#pane-2">Uraian Kendaraan</a></li>
					<li><a href="#pane-3">Uji Fisik</a></li>
					<li><a href="#pane-4">Uji Mekanis</a></li>
					<li><a href="#pane-5">Set Status</a></li>
				</ul>

                <!--------------------- Section Satu ------------------------>
				<section id="pane-1">
					<div align="center" style="margin-top:-10px;">
						<h3><u>DETAIL KENDARAAN</u>
						<br><p class="itlc"></p></h3>
					</div>
					<div class="clearfix">
                    	<div style="min-height:255px;">
							<?php foreach($detail as $dat): ?>
							<table width="100%">
								<tr>
									<td width="50%">
										<fieldset style="margin:0 10px 0 0;">
										<legend>Identitas Pemilik</legend>
										<div class="clearfix">
											<table width="100%">
												<tr height="30px">
													<td align="center" width="2%">a.</td>
													<td width="30%">&nbsp; Nama Pemilik</td>
													<td align="center" width="3%">:</td>
													<td><?=$dat->nama?></td>
												</tr>	
												<tr height="30px">
													<td align="center">b.</td>
													<td>&nbsp; Alamat</td>
													<td align="center" width="3%">:</td>
													<td><?=$dat->alamat?></td>
												</tr>
												<tr height="30px">
													<td align="center">c.</td>
													<td>&nbsp; Kartu Identitas</td>
													<td align="center" width="3%">:</td>
													<td><?=$dat->id_card?></td>
												</tr>
												<tr height="30px">
													<td align="center">d.</td>
													<td>&nbsp; Nomor Telepon</td>
													<td align="center" width="3%">:</td>
													<td><?=$dat->no_telp?></td>
												</tr>
												<tr height="30px">
													<td align="center">e.</td>
													<td>&nbsp; Nomor HP</td>
													<td align="center" width="3%">:</td>
													<td><?=$dat->no_hp?></td>
												</tr>
												<tr height="30px">
													<td align="center">f.</td>
													<td>&nbsp; Email</td>
													<td align="center" width="3%">:</td>
													<td><?=$dat->email?></td>
												</tr>
											</table>
										</div>
										</fieldset>
									</td>
									<td>
										<fieldset style="margin:0 0 0 5px;">
										<legend>Identitas Kendaraan</legend>
										<div class="clearfix">
											<table width="100%">
												<tr height="30px">
													<td align="center" width="2%">a.</td>
													<td width="30%">&nbsp; Nomor Uji</td>
													<td align="center" width="3%">:</td>
													<td><?=$dat->no_uji?></td>
												</tr>
												<tr height="30px">
													<td align="center">b.</td>
													<td>&nbsp; Nomor Kendaraan</td>
													<td align="center" width="3%">:</td>
													<td width="30%"><?=$dat->no_kendaraan?></td>
												</tr>
												<tr height="30px">
													<td align="center">c.</td>
													<td>&nbsp; Merek</td>
													<td align="center" width="3%">:</td>
													<td><?=$dat->merek?></td>
												</tr>
												<tr height="30px">
													<td align="center">d.</td>
													<td>&nbsp; Tipe</td>
													<td align="center" width="3%">:</td>
													<td><?=$dat->tipe?></td>
												</tr>
												<tr height="30px">
													<td align="center">e.</td>
													<td>&nbsp; Jenis Kendaraan</td>
													<td align="center" width="3%">:</td>
													<td><?=$this->master_model->namaJenis($dat->id_jeniskendaraan)?></td>
												</tr>
												<tr height="30px">
													<td align="center">f.</td>
													<td>&nbsp; Isi Silinder</td>
													<td align="center" width="3%">:</td>
													<td><?=$dat->merek?></td>
												</tr>
												<tr height="30px">
													<td align="center">g.</td>
													<td>&nbsp; Daya Motor</td>
													<td align="center" width="3%">:</td>
													<td><?=$dat->tipe?></td>
												</tr>
												<tr height="30px">
													<td align="center">h.</td>
													<td>&nbsp; Bahan Bakar</td>
													<td align="center" width="3%">:</td>
													<td><?=$dat->bahan_bakar?></td>
												</tr>
												<tr height="30px">
													<td align="center">i.</td>
													<td>&nbsp; Tahun Pembuatan</td>
													<td align="center" width="3%">:</td>
													<td><?=$dat->tahun_buat?></td>
												</tr>
												<tr height="30px">
													<td align="center">j.</td>
													<td>&nbsp; Status Penggunaan</td>
													<td align="center" width="3%">:</td>
													<td><?=$this->master_model->namaTipe($dat->id_statuskendaraan)?></td>
												</tr>
												<tr height="30px">
													<td align="center">k.</td>
													<td>&nbsp; Nomor Rangka Landasan</td>
													<td align="center" width="3%">:</td>
													<td><?=$dat->no_chassis?></td>
												</tr>
												<tr height="30px">
													<td align="center">l.</td>
													<td>&nbsp; Nomor Mesin</td>
													<td align="center" width="3%">:</td>
													<td><?=$dat->no_mesin?></td>
												</tr>
												<tr height="30px">
													<td align="center">m.</td>
													<td>&nbsp; Nomor Uji Tipe</td>
													<td align="center" width="3%">:</td>
													<td><?=$dat->no_ujitipe?></td>
												</tr>
												<tr height="30px">
													<td align="center">n.</td>
													<td>&nbsp; Tanggal Uji Tipe</td>
													<td align="center" width="3%">:</td>
													<td><?=$dat->tgl_ujitipe?></td>
												</tr>
												<tr height="30px">
													<td align="center">o.</td>
													<td>&nbsp; Nomor SRUT</td>
													<td align="center" width="3%">:</td>
													<td><?=$dat->no_srut?></td>
												</tr>
												<tr height="30px">
													<td align="center">p.</td>
													<td>&nbsp; Tanggal SRUT</td>
													<td align="center" width="3%">:</td>
													<td><?=$dat->tgl_srut?></td>
												</tr>
											</table>
										</div>
										</fieldset>
									</td>
								</tr>
							</table>
							<?php endforeach; ?>
						</div>
					</div>
				</section>
				
                <!--------------------- Section Dua ------------------------>
				<section id="pane-2">
					<div align="center" style="margin-top:-10px;">
						<h3><u>URAIAN KENDARAAN</u><br>
                    	<p class="itlc"></p></h3>                    
					</div>
					<div class="clearfix">
						<div style="min-height:255px">
							<div class="grid_6 leading">
							<?php $tData=count($dataHasil); ?>
							<input type="hidden" name="tData" value="<?=$tData?>">	
							<input type="hidden" name="no_uji" value="<?=$no_uji?>">
							<input type="hidden" name="no_daftar" value="<?=$no_daftar?>">
							<table width="100%">
								<tr>
									<td>
										<fieldset style="margin:5px 5px 5px 5px;">
										<legend>Ukuran Utama</legend>
										<?php foreach($dataHasil as $a)
										{
											$uu1 = $a->panjang;
											$uu2 = $a->lebar;
											$uu3 = $a->tinggi;
											$uu4 = $a->julur_belakang;
											$uu5 = $a->julur_depan;
										}
										?>
										<table width="100%">
											<tr>
												<td>Panjang</td>
												<td><input type="text" style="width:50px" name="uu1" value="<?=$uu1?>" readonly="true" /> mm</td>
											</tr>
											<tr>
												<td>Lebar</td>
												<td><input type="text" style="width:50px" name="uu2" value="<?=$uu2?>" readonly="true"  /> mm</td>
											</tr>
											<tr>
												<td>Tinggi</td>
												<td><input type="text" style="width:50px" name="uu3" value="<?=$uu3?>" readonly="true"  /> mm</td>
											</tr>
											<tr>
												<td>Julur Belakang</td>
												<td><input type="text" style="width:50px" name="uu4"  value="<?=$uu4?>" readonly="true"  /> mm</td>
											</tr>
											<tr>
												<td>Julur Depan</td>
												<td><input type="text" style="width:50px" name="uu5"  value="<?=$uu5?>" readonly="true"  /> mm</td>
											</tr>
										</table>
										</fieldset>
									</td>
									<td>
										<fieldset style="margin:5px 5px 5px 5px;">
										<legend>Jarak Sumbu</legend>
										<?php foreach($dataHasil as $b)
										{
											$js1 = $b->sumbu_12;
											$js2 = $b->sumbu_23;
											$js3 = $b->sumbu_34;
											$js4 = $b->q;
										}
										?>
										<table width="100%">
											<tr>
												<td>Sumbu I-II</td>
												<td><input type="text" style="width:50px" name="js1" value="<?=$js1?>" readonly="true"  /> mm</td>
											</tr>
											<tr>
												<td>Sumbu II-III</td>
												<td><input type="text" style="width:50px" name="js2" value="<?=$js2?>" readonly="true"  /> mm</td>
											</tr>
											<tr>
												<td>Sumbu III-IV</td>
												<td><input type="text" style="width:50px" name="js3" value="<?=$js3?>" readonly="true"  /> mm</td>
											</tr>
											<tr>
												<td>Q (Jarak Titik Berat)</td>
												<td><input type="text" style="width:50px" name="js4"  value="<?=$js4?>" readonly="true"  /> mm</td>
											</tr>
										</table>
										</fieldset>
									</td>
									<td>
										<fieldset style="margin:5px 5px 5px 5px;">
										<legend>Dimensi Bak Muatan</legend>
										<?php foreach($dataHasil as $c)
										{
											$dbm1 = $c->panjang_bak;
											$dbm2 = $c->lebar_bak;
											$dbm3 = $c->tinggi_bak;
											$dbm4 = $c->bahan_bak;
										}
										?>
										<table width="100%">
											<tr>
												<td>Panjang</td>
												<td><input type="text" style="width:50px" name="dbm1" value="<?=$dbm1?>" readonly="true"  /> mm</td>
											</tr>
											<tr>
												<td>Lebar</td>
												<td><input type="text" style="width:50px" name="dbm2" value="<?=$dbm2?>" readonly="true"  /> mm</td>
											</tr>
											<tr>
												<td>Tinggi</td>
												<td><input type="text" style="width:50px" name="dbm3"  value="<?=$dbm3?>" readonly="true"  /> mm</td>
											</tr>
											<tr>
												<td>Bahan Bak</td>
												<td><input type="text" style="width:50px" name="dbm4"  value="<?=$dbm4?>" readonly="true"  /> mm</td>
											</tr>
										</table>
										</fieldset>
									</td>
								</tr>
								<tr>
									<td>
										<fieldset style="margin:5px 5px 5px 5px;">
										<legend>Dimensi Tangki</legend>
										<?php foreach($dataHasil as $d)
										{
											$dt0 = $d->model_tangki;
											$dt1 = $d->panjang_tangki;
											$dt2 = $d->lebar_tangki;
											$dt3 = $d->tinggi_tangki;
											$dt4 = $d->volume_tangki;
											$dt5 = $d->jenis_muatan;
											$dt6 = $d->berat_jenis_muatan;
											$dt7 = $d->bahan_tangki;
										}
										?>
										<table width="100%">
											<tr>
												<td>Model Tangki</td>
												<td><input type="text" style="width:50px" name="dt0" value="<?=$dt0?>" readonly="true"  /> mm</td>
											</tr>
											<tr>
												<td>Panjang</td>
												<td><input type="text" style="width:50px" name="dt1" value="<?=$dt1?>" readonly="true"  /> mm</td>
											</tr>
											<tr>
												<td>Lebar</td>
												<td><input type="text" style="width:50px" name="dt2" value="<?=$dt2?>" readonly="true"  /> mm</td>
											</tr>
											<tr>
												<td>Tinggi</td>
												<td><input type="text" style="width:50px" name="dt3" value="<?=$dt3?>" readonly="true"  /> mm</td>
											</tr>
											<tr>
												<td>Volume</td>
												<td><input type="text" style="width:50px" name="dt4" value="<?=$dt4?>" readonly="true"  /> ltr</td>
											</tr>
											<tr>
												<td>Jenis Muatan</td>
												<td><input type="text" style="width:100px" name="dt5" value="<?=$dt5?>" readonly="true"  /></td>
											</tr>
											<tr>
												<td>Berat Jenis Muatan</td>
												<td><input type="text" style="width:50px" name="dt6"  value="<?=$dt6?>" readonly="true"  /> kg/dm3</td>
											</tr>
											<tr>
												<td>Bahan Tangki</td>
												<td><input type="text" style="width:100px" name="dt7"  value="<?=$dt7?>" readonly="true"  /></td>
											</tr>
										</table>
										</fieldset>
									</td>
									<td width="40%">
										<fieldset style="margin:5px 5px 5px 5px;">
										<legend>Pemakaian Ban yang diijinkan</legend>
										<?php foreach($dataHasil as $e)
										{
											$pb1 = $e->sumbu_1;
											$pb2 = $e->sumbu_2;
											$pb3 = $e->sumbu_3;
											$pb4 = $e->sumbu_4;
											$pb5 = $e->jbb;
											$pb6 = $e->jbkb;
										}
										?>
										<table width="100%">
											<tr>
												<td>Sumbu I</td>
												<td><input type="text" style="width:100px" name="pb1" value="<?=$pb1?>" readonly="true"  /></td>
											</tr>
											<tr>
												<td>Sumbu II</td>
												<td><input type="text" style="width:100px" name="pb2" value="<?=$pb2?>" readonly="true"  /></td>
											</tr>
											<tr>
												<td>Sumbu III</td>
												<td><input type="text" style="width:100px" name="pb3"  value="<?=$pb3?>" readonly="true"  /></td>
											</tr>
											<tr>
												<td>Sumbu IV</td>
												<td><input type="text" style="width:100px" name="pb4"  value="<?=$pb4?>" readonly="true"  /></td>
											</tr>
										</table>
										<table width="100%">
											<tr>
												<td width="75%"><label>Konfigurasi Sumbu</label></td>
												<td></td>
											</tr>
											<tr>
												<td><label>Jumlah Berat Diperbolehkan (JBB)</label></td>
												<td><input type="text" style="width:50px" name="pb5"  value="<?=$pb5?>" readonly="true"  /> kg</td>
											</tr>
											<tr>
												<td><label>Jumlah Berat Kombinasi Diperbolehkan (JBKB)</label></td>
												<td><input type="text" style="width:50px" name="pb6"  value="<?=$pb6?>" readonly="true"  /> kg</td>
											</tr>
										</table>
										</fieldset>	
									</td>
									<td>
										<fieldset style="margin:5px 5px 5px 5px;">
										<legend>Berat Kosong</legend>
										<?php foreach($dataHasil as $f)
										{
											$bk1 = $f->bk_sumbu_1;
											$bk2 = $f->bk_sumbu_2;
											$bk3 = $f->bk_sumbu_3;
											$bk4 = $f->bk_sumbu_4;
										}
										?>
										<table width="100%">
											<tr>
												<td>Sumbu I</td>
												<td><input type="text" style="width:100px" name="bk1" value="<?=$bk1?>" readonly="true"  /> kg</td>
											</tr>
											<tr>
												<td>Sumbu II</td>
												<td><input type="text" style="width:100px" name="bk2" value="<?=$bk2?>" readonly="true"  /> kg</td>
											</tr>
											<tr>
												<td>Sumbu III</td>
												<td><input type="text" style="width:100px" name="bk3" value="<?=$bk3?>" readonly="true"  /> kg</td>
											</tr>
											<tr>
												<td>Sumbu IV</td>
												<td><input type="text" style="width:100px" name="bk4" value="<?=$bk4?>" readonly="true"  /> kg</td>
											</tr>
										</table>
										</fieldset>
									</td>
								</tr>
								<tr>
									<td colspan="3">
										<fieldset style="margin:5px 5px 5px 5px;">
										<legend>Daya Angkut</legend>
										<?php foreach($dataHasil as $g)
										{
											$da1 = $g->orang;
											$da2 = $g->barang;
											$da3 = $g->JBI;
											$da4 = $g->JBKI;
											$da5 = $g->MST;
											$da6 = $g->KJT;
										}
										?>
										<table width="100%">
											<tr>
												<td width="40%">
													<table width="100%">
														<tr>
															<td>Orang</td>
															<td><input type="text" style="width:100px" name="da1" value="<?=$da1?>" readonly="true"  /> Penumpang</td>
														</tr>
														<tr>
															<td>Barang</td>
															<td><input type="text" style="width:100px" name="da2" value="<?=$da2?>" readonly="true"  /> kg</td>
														</tr>
													</table> 
												</td>
												<td>
													<table width="100%">
														<tr>
															<td>Jumlah Berat Diijinkan (JBI)</td>
															<td><input type="text" style="width:100px" name="da3" value="<?=$da3?>" readonly="true"  /> kg</td>
														</tr>
														<tr>
															<td>Jumlah Berat Kombinasi Diijinkan (JBKI)</td>
															<td><input type="text" style="width:100px" name="da4" value="<?=$da4?>" readonly="true"  /> kg</td>
														</tr>
														<tr>
															<td>Muatan Sumbu Terberat (MST)</td>
															<td><input type="text" style="width:100px" name="da5" value="<?=$da5?>" readonly="true"  /> kg</td>
														</tr>
														<tr>
															<td>Kelas Jalan Terendah yang Boleh Dilalui</td>
															<td><input type="text" style="width:100px" name="da6" value="<?=$da6?>" readonly="true"  /></td>
														</tr>
													</table>
												</td>
											</tr>
										</table>
										</fieldset>
									</td>
								</tr>
							</table>
							</div>
						</div>
					</div>
				</section>
				
                
                <!--------------------- Section Tiga ----------------------->
				<section id="pane-3">
					<div align="center" style="margin-top:-10px;">
						<h3><u>HASIL UJI FISIK</u><br>
                    	<p class="itlc"></p></h3>                    
					</div>
					<div class="clearfix">
						<div  style="min-height:255px">
							<div>
								<form class="form has-validation" action="#" method="post">
								<?php $tData=count($this->pengujianmodel->getHasilUjiFisik($no_daftar,'111','hasil')); ?>
								<input type="hidden" name="tData" value="<?=$tData?>">			
								<input type="hidden" name="no_uji" value="<?=$no_uji?>">
								<input type="hidden" name="no_daftar" value="<?=$no_daftar?>">
								<fieldset style="margin:10px 0 5px 0;">
								<legend>1. Identitas Kendaraan</legend>
								<div class="clearfix">
								<table width="100%">
									<tr>
										<td width="3%">a.</td><td width="25%">Nomor Uji/Nomor Pendaftaran</td>
										<td width="30%" rowspan="2" valign="middle" align="center"><small><b><i>Sesuai Buku Uji</i></b></small></td>
										<td width="25%" align="center">
											<?php
												$h1=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'111','hasil');
												if($h1=="L"){ $v11="checked"; }else{ $v12="checked"; }
											?>
											<input disabled type="radio" title="Lulus" name="111" value="L" <?=$v11?> >L &nbsp;
											<input disabled type="radio" title="Tidak Lulus" name="111" value="TL" <?=$v12?> >TL
										</td>
										<td rowspan="2" align="center" width="17%">
											<?php
												$penguji1=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'112','penguji');
											?> 
											<select disabled  name="penguji_1" disabled>
											<option value="">Pilih Penguji</option>
											<?php foreach($penguji as $p): ?>
											<?php if($penguji1==$p->nip_penguji){ $p1="selected"; }else{ $p1=""; } ?> 
												<option value="<?=$p->nip_penguji?>" <?=$p1?> ><?=$p->nama_penguji?></option>
											<?php endforeach; ?>
											</select>
										</td>
									</tr>
									<tr>
										<td>b.</td><td>Nomor Rangka / Nomor Mesin</td>
										<td align="center">
											<?php
												$h2=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'112','hasil');
												if($h2=="L"){ $v21="checked"; }else{ $v22="checked"; }
											?>
											<input disabled type="radio" title="Lulus" name="112" value="L" <?=$v21?> >L &nbsp;
											<input disabled type="radio" title="Tidak Lulus" name="112" value="TL" <?=$v22?> >TL
										</td>
									</tr>
								</table>
								</div>
								</fieldset>
					
								<fieldset style="margin:10px 0 5px 0;">
								<legend>2. Sistem Penerangan</legend>
								<div class="clearfix">
								<table width="100%">
									<tr>
										<td width="3%">a.</td><td width="25%">Lampu Penunjuk Arah</td>
										<td width="30%" rowspan="4" valign="middle" align="center"><small><b><i>Menyala</i></b></small></td>
										<td width="25%" align="center">
											<?php
												$h3=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'211','hasil');
												if($h3=="L"){ $v31="checked"; }else{ $v32="checked"; }
											?>
											<input disabled type="radio" title="Lulus" name="211" value="L" <?=$v31?> >L &nbsp;
											<input disabled type="radio" title="Tidak Lulus" name="211" value="TL" <?=$v32?> >TL
										</td>
										<td rowspan="4" align="center" width="17%">
											<?php
												$penguji2=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'211','penguji');
											?>  
											<select disabled  name="penguji_2">
											<option value="">Pilih Penguji</option>
											<?php foreach($penguji as $p): ?>
											<?php if($penguji2==$p->nip_penguji){ $p2="selected"; }else{ $p2=""; } ?> 
												<option value="<?=$p->nip_penguji?>" <?=$p2?> ><?=$p->nama_penguji?></option>
											<?php endforeach; ?>
											</select>
										</td>
									</tr>
									<tr>
										<td>b.</td><td>Lampu Rem</td>
										<td align="center">
											<?php
												$h4=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'212','hasil');
												if($h4=="L"){ $v41="checked"; }else{ $v42="checked"; }
											?>
											<input disabled type="radio" title="Lulus" name="212" value="L" <?=$v41?> >L &nbsp;
											<input disabled type="radio" title="Tidak Lulus" name="212" value="TL" <?=$v42?> >TL
										</td>
									</tr>
									<tr>
										<td>c.</td><td>Lampu Mundur</td>
										<td align="center">
											<?php
												$h5=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'213','hasil');
												if($h5=="L"){ $v51="checked"; }else{ $v52="checked"; }
											?>
											<input disabled type="radio" title="Lulus" name="213" value="L" <?=$v51?> >L &nbsp;
											<input disabled type="radio" title="Tidak Lulus" name="213" value="TL" <?=$v52?> >TL
										</td>
									</tr>
									<tr>
										<td>d.</td><td>Lampu Posisi</td>
										<td align="center">
											<?php
												$h6=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'214','hasil');
												if($h6=="L"){ $v61="checked"; }else{ $v62="checked"; }
											?>
											<input disabled type="radio" title="Lulus" name="214" value="L" <?=$v61?> >L &nbsp;
											<input disabled type="radio" title="Tidak Lulus" name="214" value="TL" <?=$v62?> >TL
										</td>
									</tr>
								</table>
								</div>
								</fieldset>
					
								<fieldset style="margin:10px 0 5px 0;">
								<legend>3. Rumah dan Body</legend>
								<div class="clearfix">
								<table width="100%">
									<tr>
										<td width="3%">a.</td><td width="25%">Kondisi Rumah / Body</td>
										<td width="30%" align="center" valign="middle"><small><b><i>Baik, tidak keropos</i></b></small></td>
										<td width="25%" align="center">
											<?php
												$h7=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'311','hasil');
												if($h7=="L"){ $v71="checked"; }else{ $v72="checked"; }
											?>
											<input disabled type="radio" title="Lulus" name="311" value="L" <?=$v71?> >L &nbsp;
											<input disabled type="radio" title="Tidak Lulus" name="311" value="TL" <?=$v72?> >TL
										</td>
										<td rowspan="3" align="center" width="17%"> 
											<?php
												$penguji3=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'311','penguji');
											?> 
											<select disabled  name="penguji_3">
											<option value="">Pilih Penguji</option>
											<?php foreach($penguji as $p): ?>
											<?php if($penguji3==$p->nip_penguji){ $p3="selected"; }else{ $p3=""; } ?> 
												<option value="<?=$p->nip_penguji?>" <?=$p3?> ><?=$p->nama_penguji?></option>
											<?php endforeach; ?>
											</select>
										</td>
									</tr>
									<tr>
										<td>b.</td><td>Perisai Kolong</td>
										<td align="center"><small><b><i>ada</i></b></small></td>
										<td align="center">
											<?php
												$h8=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'312','hasil');
												if($h8=="L"){ $v81="checked"; }else{ $v82="checked"; }
											?>
											<input disabled type="radio" title="Lulus" name="312" value="L" <?=$v81?> >L &nbsp;
											<input disabled type="radio" title="Tidak Lulus" name="312" value="TL" <?=$v82?> >TL
										</td>
									</tr>
									<tr>
										<td>c.</td><td>Sambungan Tempelan/Gandengan</td>
										<td align="center"><small><b><i>Tidak aus</i></b></small></td>
										<td align="center">
											<?php
												$h9=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'313','hasil');
												if($h9=="L"){ $v91="checked"; }else{ $v92="checked"; }
											?>
											<input disabled type="radio" title="Lulus" name="313" value="L" <?=$v91?> >L &nbsp;
											<input disabled type="radio" title="Tidak Lulus" name="313" value="TL" <?=$v92?> >TL
										</td>
									</tr>
								</table>
								</div>
								</fieldset>
					
								<fieldset style="margin:10px 0 5px 0;">
								<legend>4. Roda-Roda</legend>
								<div class="clearfix">
								<table width="100%">
									<tr>
										<td width="3%">a.</td><td width="25%">Ukuran Ban Sumbu I</td>
										<td width="30%" align="center" rowspan="4" valign="middle"><small><b><i>Sesuai Buku Uji/Spesifikasi Pabrik</i></b></small></td>
										<td width="25%" align="center">
											<?php
												$h10=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'411','hasil');
												if($h10=="L"){ $v101="checked"; }else{ $v102="checked"; }
											?>
											<input disabled type="radio" title="Lulus" name="411" value="L" <?=$v101?> >L &nbsp;
											<input disabled type="radio" title="Tidak Lulus" name="411" value="TL" <?=$v102?> >TL
										</td>
										<td rowspan="6" align="center" width="17%">
											<?php
												$penguji4=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'411','penguji');
											?>  
											<select disabled  name="penguji_4">
											<option value="">Pilih Penguji</option>
											<?php foreach($penguji as $p): ?>
											<?php if($penguji4==$p->nip_penguji){ $p4="selected"; }else{ $p4=""; } ?> 
												<option value="<?=$p->nip_penguji?>" <?=$p4?> ><?=$p->nama_penguji?></option>
											<?php endforeach; ?>
											</select>
										</td>
									</tr>
									<tr>
										<td>b.</td><td>Ukuran Ban Sumbu II</td>
										<td align="center">
											<?php
												$h11=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'412','hasil');
												if($h11=="L"){ $v111="checked"; }else{ $v112="checked"; }
											?>
											<input disabled type="radio" title="Lulus" name="412" value="L" <?=$v111?> >L &nbsp;
											<input disabled type="radio" title="Tidak Lulus" name="412" value="TL" <?=$v112?> >TL
										</td>
									</tr>
									<tr>
										<td>c.</td><td>Ukuran Ban Sumbu III</td>
										<td align="center">
											<?php
												$h12=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'413','hasil');
												if($h12=="L"){ $v121="checked"; }else{ $v122="checked"; }
											?>
											<input disabled type="radio" title="Lulus" name="413" value="L" <?=$v121?> >L &nbsp;
											<input disabled type="radio" title="Tidak Lulus" name="413" value="TL" <?=$v122?> >TL
										</td>
									</tr>
									<tr>
										<td>d.</td><td>Ukuran Ban Sumbu IV</td>
										<td align="center">
											<?php
												$h13=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'414','hasil');
												if($h13=="L"){ $v131="checked"; }else{ $v132="checked"; }
											?>
											<input disabled type="radio" title="Lulus" name="414" value="L" <?=$v131?> >L &nbsp;
											<input disabled type="radio" title="Tidak Lulus" name="414" value="TL" <?=$v132?> >TL
										</td>
									</tr>
									<tr>
										<td>e.</td><td>Kedalaman alur ban luar</td>
										<td align="center"><small><b><i>1 mm (min)</i></b></small></td>
										<td align="center">
											<?php
												$h14=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'415','hasil');
												if($h14=="L"){ $v141="checked"; }else{ $v142="checked"; }
											?>
											<input disabled type="radio" title="Lulus" name="415" value="L" <?=$v141?> >L &nbsp;
											<input disabled type="radio" title="Tidak Lulus" name="415" value="TL" <?=$v142?> >TL
										</td>
									</tr>
									<tr>
										<td>f.</td><td>Penguatan roda</td>
										<td align="center"><small><b><i>Tidak kendor</i></b></small></td>
										<td align="center">
											<?php
												$h15=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'416','hasil');
												if($h15=="L"){ $v151="checked"; }else{ $v152="checked"; }
											?>
											<input disabled type="radio" title="Lulus" name="416" value="L" <?=$v151?> >L &nbsp;
											<input disabled type="radio" title="Tidak Lulus" name="416" value="TL" <?=$v152?> >TL
										</td>
									</tr>
								</table>
								</div>
								</fieldset>

								<fieldset style="margin:10px 0 0 5px;">
								<legend>5. Dimensi Kendaraan</legend>
								<div class="clearfix">
								<table width="100%">
									<tr>
										<td>a.</td><td colspan="3"><b>Ukuran Utama</b></td>
									</tr>
									<tr>
										<td width="3%" align="right"> -&nbsp;</td><td width="25%">Panjang</td>
										<td width="30%" rowspan="5" valign="middle"></td>
										<td width="25%" align="center">
											<?php
												$h16=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'511','hasil');
												if($h16=="L"){ $v161="checked"; }else{ $v162="checked"; }
											?>
											<input disabled type="radio" title="Lulus" name="511" value="L" <?=$v161?> >L &nbsp;
											<input disabled type="radio" title="Tidak Lulus" name="511" value="TL" <?=$v162?> >TL
										</td>
										<td rowspan="21" align="center" width="17%"> 
											<?php
												$penguji5=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'511','penguji');
											?>
											<select disabled  name="penguji_5">
											<option value="">Pilih Penguji</option>
											<?php foreach($penguji as $p): ?>
											<?php if($penguji5==$p->nip_penguji){ $p5="selected"; }else{ $p5=""; } ?>
												<option value="<?=$p->nip_penguji?>" <?=$p5?> ><?=$p->nama_penguji?></option>
											<?php endforeach; ?>
											</select>
										</td>
									</tr>
									<tr>
										<td align="right"> -&nbsp;</td><td>Lebar</td>
										<td align="center">
											<?php
												$h17=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'512','hasil');
												if($h17=="L"){ $v171="checked"; }else{ $v172="checked"; }
											?>
											<input disabled type="radio" title="Lulus" name="512" value="L" <?=$v171?> >L &nbsp;
											<input disabled type="radio" title="Tidak Lulus" name="512" value="TL" <?=$v172?> >TL
										</td>
									</tr>
									<tr>
										<td align="right"> -&nbsp;</td><td>Tinggi</td>
										<td align="center">
											<?php
												$h18=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'513','hasil');
												if($h18=="L"){ $v181="checked"; }else{ $v182="checked"; }
											?>
											<input disabled type="radio" title="Lulus" name="513" value="L" <?=$v181?> >L &nbsp;
											<input disabled type="radio" title="Tidak Lulus" name="513" value="TL" <?=$v182?> >TL
										</td>
									</tr>
									<tr>
										<td align="right"> -&nbsp;</td><td>Julur Depan (FOH)</td>
										<td align="center">
											<?php
												$h19=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'514','hasil');
												if($h19=="L"){ $v191="checked"; }else{ $v192="checked"; }
											?>
											<input disabled type="radio" title="Lulus" name="514" value="L" <?=$v191?> >L &nbsp;
											<input disabled type="radio" title="Tidak Lulus" name="514" value="TL" <?=$v192?> >TL
										</td>
									</tr>
									<tr>
										<td align="right"> -&nbsp;</td><td>Julur Belakang (ROH)</td>
										<td align="center">
											<?php
												$h20=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'515','hasil');
												if($h20=="L"){ $v201="checked"; }else{ $v202="checked"; }
											?>
											<input disabled type="radio" title="Lulus" name="515" value="L" <?=$v201?> >L &nbsp;
											<input disabled type="radio" title="Tidak Lulus" name="515" value="TL" <?=$v202?> >TL
										</td>
									</tr>
									<tr>
										<td>b.</td><td colspan="3"><b>Jarak Sumbu</b></td>
									</tr>
									<tr>
										<td align="right"> -&nbsp;</td><td>Sumbu I-II</td>
										<td rowspan="3" valign="middle"><small><b><i>Sesuai Buku Uji / Ketentuan</i></b></small></td>
										<td align="center">
											<?php
												$h21=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'521','hasil');
												if($h21=="L"){ $v211="checked"; }else{ $v212="checked"; }
											?>
											<input disabled type="radio" title="Lulus" name="521" value="L" <?=$v211?> >L &nbsp;
											<input disabled type="radio" title="Tidak Lulus" name="521" value="TL" <?=$v212?> >TL
										</td>
									</tr>
									<tr>
										<td align="right"> -&nbsp;</td><td>Sumbu II-III</td>
										<td align="center">
											<?php
												$h22=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'522','hasil');
												if($h22=="L"){ $v221="checked"; }else{ $v222="checked"; }
											?>
											<input disabled type="radio" title="Lulus" name="522" value="L" <?=$v221?> >L &nbsp;
											<input disabled type="radio" title="Tidak Lulus" name="522" value="TL" <?=$v222?> >TL
										</td>
									</tr>
									<tr>
										<td align="right"> -&nbsp;</td><td>Sumbu III-IV</td>
										<td align="center">
											<?php
												$h23=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'523','hasil');
												if($h23=="L"){ $v231="checked"; }else{ $v232="checked"; }
											?>
											<input disabled type="radio" title="Lulus" name="523" value="L" <?=$v231?> >L &nbsp;
											<input disabled type="radio" title="Tidak Lulus" name="523" value="TL" <?=$v232?> >TL
										</td>
									</tr>
									<tr>
										<td>c.</td><td colspan="3"><b>Dimensi Bak Muatan</b></td>
									</tr>
									<tr>
										<td align="right"> -&nbsp;</td><td>Panjang</td>
										<td rowspan="3" valign="middle"><small><b><i>Spesifikasi</i></b></small></td>
										<td align="center">
											<?php
												$h24=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'531','hasil');
												if($h24=="L"){ $v241="checked"; }else{ $v242="checked"; }
											?>
											<input disabled type="radio" title="Lulus" name="531" value="L" <?=$v241?> >L &nbsp;
											<input disabled type="radio" title="Tidak Lulus" name="531" value="TL" <?=$v242?> >TL
										</td>
									</tr>
									<tr>
										<td align="right"> -&nbsp;</td><td>Lebar</td>
										<td align="center">
											<?php
												$h25=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'532','hasil');
												if($h25=="L"){ $v251="checked"; }else{ $v252="checked"; }
											?>
											<input disabled type="radio" title="Lulus" name="532" value="L" <?=$v251?> >L &nbsp;
											<input disabled type="radio" title="Tidak Lulus" name="532" value="TL" <?=$v252?> >TL
										</td>
									</tr>
									<tr>
										<td align="right"> -&nbsp;</td><td>Tinggi</td>
										<td align="center">
											<?php
												$h26=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'533','hasil');
												if($h26=="L"){ $v261="checked"; }else{ $v262="checked"; }
											?>
											<input disabled type="radio" title="Lulus" name="533" value="L" <?=$v261?> >L &nbsp;
											<input disabled type="radio" title="Tidak Lulus" name="533" value="TL" <?=$v262?> >TL
										</td>
									</tr>
									<tr>
										<td>d.</td><td colspan="3"><b>Dimensi Tangki</b></td>
									</tr>
									<tr>
										<td align="right"> -&nbsp;</td><td>Panjang</td>
										<td rowspan="6" valign="middle"><small><b><i>Sesuai tera / Kapasitas</i></b></small></td>
										<td align="center">
											<?php
												$h27=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'541','hasil');
												if($h27=="L"){ $v271="checked"; }else{ $v272="checked"; }
											?>
											<input disabled type="radio" title="Lulus" name="541" value="L" <?=$v271?> >L &nbsp;
											<input disabled type="radio" title="Tidak Lulus" name="541" value="TL" <?=$v272?> >TL
										</td>
									</tr>
									<tr>
										<td align="right"> -&nbsp;</td><td>Lebar</td>
										<td align="center">
										<?php
											$h28=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'542','hasil');
											if($h28=="L"){ $v281="checked"; }else{ $v282="checked"; }
										?>
										<input disabled type="radio" title="Lulus" name="542" value="L" <?=$v281?> >L &nbsp;
										<input disabled type="radio" title="Tidak Lulus" name="542" value="TL" <?=$v282?> >TL
										</td>
									</tr>
									<tr>
										<td align="right"> -&nbsp;</td><td>Tinggi</td>
										<td align="center">
											<?php
												$h29=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'543','hasil');
												if($h29=="L"){ $v291="checked"; }else{ $v292="checked"; }
											?>
											<input disabled type="radio" title="Lulus" name="543" value="L" <?=$v291?> >L &nbsp;
											<input disabled type="radio" title="Tidak Lulus" name="543" value="TL" <?=$v292?> >TL
										</td>
									</tr>
									<tr>
										<td align="right"> -&nbsp;</td><td>Volume</td>
										<td align="center">
											<?php
												$h30=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'544','hasil');
												if($h30=="L"){ $v301="checked"; }else{ $v302="checked"; }
											?>
											<input disabled type="radio" title="Lulus" name="544" value="L" <?=$v301?> >L &nbsp;
											<input disabled type="radio" title="Tidak Lulus" name="544" value="TL" <?=$v302?> >TL
										</td>
									</tr>
									<tr>
										<td align="right"> -&nbsp;</td><td>Jenis Muatan</td>
										<td align="center">
											<?php
												$h31=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'545','hasil');
												if($h31=="L"){ $v311="checked"; }else{ $v312="checked"; }
											?>
											<input disabled type="radio" title="Lulus" name="545" value="L" <?=$v311?> >L &nbsp;
											<input disabled type="radio" title="Tidak Lulus" name="545" value="TL" <?=$v312?> >TL
										</td>
									</tr>
									<tr>
										<td align="right"> -&nbsp;</td><td>Berat Jenis Muatan</td>
										<td align="center">
											<?php
												$h32=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'546','hasil');
												if($h32=="L"){ $v321="checked"; }else{ $v322="checked"; }
											?>
											<input disabled type="radio" title="Lulus" name="546" value="L" <?=$v321?> >L &nbsp;
											<input disabled type="radio" title="Tidak Lulus" name="546" value="TL" <?=$v322?> >TL
										</td>
									</tr>
								</table>
								</div>
								</fieldset>
					
								<fieldset style="margin:10px 0 0 5px;">
								<legend>6. Peralatan dan Perlengkapan</legend>
								<div class="clearfix">
								<table width="100%">
									<tr>
										<td width="3%">a.</td><td width="25%">Penghapus kaca depan</td>
										<td valign="middle" align="center"><small><b><i>ada & berfungsi</i></b></small></td>
										<td width="25%" align="center">
											<?php
												$h33=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'611','hasil');
												if($h33=="L"){ $v331="checked"; }else{ $v332="checked"; }
											?>
											<input disabled type="radio" title="Lulus" name="611" value="L" <?=$v331?> >L &nbsp;
											<input disabled type="radio" title="Tidak Lulus" name="611" value="TL" <?=$v332?> >TL
										</td>
										<td rowspan="8" align="center" width="17%">
											<?php
												$penguji6=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'611','penguji');
											?> 
											<select disabled  name="penguji_6">
											<option value="">Pilih Penguji</option>
											<?php foreach($penguji as $p): ?>
											<?php if($penguji6==$p->nip_penguji){ $p6="selected"; }else{ $p6=""; } ?>
												<option value="<?=$p->nip_penguji?>" <?=$p6?> ><?=$p->nama_penguji?></option>
											<?php endforeach; ?>
											</select>
										</td>
									</tr>
									<tr>
										<td>b.</td><td>Kaca Spion</td>
										<td align="center"><small><b><i>ada & lengkap</i></b></small></td>
										<td align="center">
											<?php
												$h34=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'612','hasil');
												if($h34=="L"){ $v341="checked"; }else{ $v342="checked"; }
											?>
											<input disabled type="radio" title="Lulus" name="612" value="L" <?=$v341?> >L &nbsp;
											<input disabled type="radio" title="Tidak Lulus" name="612" value="TL" <?=$v342?> >TL
										</td>
									</tr>
									<tr>
										<td>c.</td><td>Dongkrak</td>
										<td align="center"><small><b><i>ada & berfungsi</i></b></small></td>
										<td align="center">
											<?php
												$h35=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'613','hasil');
												if($h35=="L"){ $v351="checked"; }else{ $v352="checked"; }
											?>
											<input disabled type="radio" title="Lulus" name="613" value="L" <?=$v351?> >L &nbsp;
											<input disabled type="radio" title="Tidak Lulus" name="613" value="TL" <?=$v352?> >TL
										</td>
									</tr>
									<tr>
										<td>d.</td><td>Alat-alat / Kunci</td>
										<td align="center"><small><b><i>ada & lengkap</i></b></small></td>
										<td align="center">
											<?php
												$h36=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'614','hasil');
												if($h36=="L"){ $v361="checked"; }else{ $v362="checked"; }
											?>
											<input disabled type="radio" title="Lulus" name="614" value="L" <?=$v361?> >L &nbsp;
											<input disabled type="radio" title="Tidak Lulus" name="614" value="TL" <?=$v362?> >TL
										</td>
									</tr>
									<tr>
										<td>e.</td><td>Ban Pengganti / Cadangan</td>
										<td align="center"><small><b><i>ada</i></b></small></td>
										<td align="center">
											<?php
												$h37=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'615','hasil');
												if($h37=="L"){ $v371="checked"; }else{ $v372="checked"; }
											?>
											<input disabled type="radio" title="Lulus" name="615" value="L" <?=$v371?> >L &nbsp;
											<input disabled type="radio" title="Tidak Lulus" name="615" value="TL" <?=$v372?> >TL
										</td>
									</tr>
									<tr>
										<td>f.</td><td>Tanda Segitiga Pengaman</td>
										<td align="center"><small><b><i>Ada & Lengkap</i></b></small></td>
										<td align="center">
											<?php
												$h38=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'616','hasil');
												if($h38=="L"){ $v381="checked"; }else{ $v382="checked"; }
											?>
											<input disabled type="radio" title="Lulus" name="616" value="L" <?=$v381?> >L &nbsp;
											<input disabled type="radio" title="Tidak Lulus" name="616" value="TL" <?=$v382?> >TL
										</td>
									</tr>
									<tr>
										<td>g.</td><td>Sabuk Keselamatan / Kotak Obat</td>
										<td align="center"><small><b><i>ada & berfungsi</i></b></small></td>
										<td align="center">
											<?php
												$h39=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'617','hasil');
												if($h39=="L"){ $v391="checked"; }else{ $v392="checked"; }
											?>
											<input disabled type="radio" title="Lulus" name="617" value="L" <?=$v391?> >L &nbsp;
											<input disabled type="radio" title="Tidak Lulus" name="617" value="TL" <?=$v392?> >TL
										</td>
									</tr>
									<tr>
										<td>h.</td><td>Engine Break / Rem Gas Buang</td>
										<td align="center"><small><b><i>ada & berfungsi</i></b></small></td>
										<td align="center">
											<?php
												$h40=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'618','hasil');
												if($h40=="L"){ $v401="checked"; }else{ $v402="checked"; }
											?>
											<input disabled type="radio" title="Lulus" name="618" value="L" <?=$v401?> >L &nbsp;
											<input disabled type="radio" title="Tidak Lulus" name="618" value="TL" <?=$v402?> >TL
										</td>
									</tr>
								</table>
								</div>
								</fieldset>
								</form>
							</div>
						</div>
					</div>
				</section>
                
                <!--------------------- Section Empat ---------------------->
				<section id="pane-4">
					<div align="center" style="margin-top:-10px;">
						<h3><u>HASIL UJI MEKANIS</u><br>
                    	<p class="itlc"></p></h3>                    
					</div>
					
					<div class="clearfix">
                    	<div style="min-height:255px">
							<div class="grid_6  clearfix">
								<form class="form has-validation" action="#" method="post">
								<?php $tData=count($this->pengujianmodel->getHasilUjiFisik($no_daftar,'711')); ?>
								<input type="hidden" name="tData" value="<?=$tData?>">			
								<input type="hidden" name="no_uji" value="<?=$no_uji?>">
								<input type="hidden" name="no_daftar" value="<?=$no_daftar?>">
								<fieldset style="margin:10px 0 0 5px;">
								<legend>Kebisingan Suara</legend>
								<div class="clearfix">
								<table width="100%">
									<tr>
										<td width="35%">Klakson</td>
										<td align="center" width="23%"><small><b><i>90 dBA - 118 dBA</i></b></small></td>
										<td align="right" width="25%"><input type="text" name="711"  style="width:50px" value="<?=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'711')?>" readonly="true" > dBA &nbsp;</td>
										<td width="17%" align="center"> 
											<?php
												$penguji1=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'711','penguji');
											?> 
											<select name="penguji_7" disabled>
											<option value="">Pilih Penguji</option>
											<?php foreach($penguji as $p): ?> 
											<?php if($penguji1==$p->nip_penguji){ $p1="selected"; }else{ $p1=""; } ?>
												<option value="<?=$p->nip_penguji?>" <?=$p1?> ><?=$p->nama_penguji?></option>
											<?php endforeach; ?>
											</select>
										</td>
									</tr>
								</table>
								</div>
								</fieldset>
			
								<fieldset style="margin:10px 0 0 5px;">
								<legend>Emisi Gas Buang</legend>
								<div class="clearfix">
								<table width="100%">
									<tr>
										<td width="3%">a.</td>
										<td width="32%">Mesin Diesel</td>
										<td align="center" width="23%"><small><b><i>< <?=date('Y')-1?> 70 %, > <?=date('Y')-1?> 50 %</i></b></small></td>
										<td align="right" width="25%"><input type="text" name="811" style="width:50px" value="<?=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'811')?>" readonly="true" > %&nbsp;&nbsp;&nbsp;</td>
										<td rowspan="2" width="17%" align="center">
											<?php
												$penguji2=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'811','penguji');
											?> 
											<select name="penguji_8" disabled>
											<option value="">Pilih Penguji</option>
											<?php foreach($penguji as $p): ?> 
											<?php if($penguji2==$p->nip_penguji){ $p2="selected"; }else{ $p2=""; } ?>
												<option value="<?=$p->nip_penguji?>" <?=$p2?> ><?=$p->nama_penguji?></option>
												<?php endforeach; ?>
											</select>
										</td>
									</tr>
									<tr>
										<td>b.</td>
										<td>Mesin Bensin</td>
										<td align="center"><small><b><i>< <?=date('Y')-4?> C0 = 4,5% , HCL = 1200 Ppm <br> > <?=date('Y')-4?> C0 = 1,5% , HCL = 200 Ppm</i></b></small></td>
										<td align="right">
											CO = <input type="text" name="821" style="width:50px" value="<?=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'821')?>" readonly="true" > %&nbsp;&nbsp; <br>
											HCL = <input type="text" name="822" style="width:50px" value="<?=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'822')?>" readonly="true" > Ppm
										</td>
									</tr>
								</table>
								</div>
								</fieldset>
			
								<fieldset style="margin:10px 0 0 5px;">
								<legend>Bawah Kendaraan</legend>
								<div class="clearfix">
								<table width="100%">
									<tr height="30px">
										<td width="3%">a.</td>
										<td width="32%">Sistem Kemudi</td>
										<td width="23%" align="center"><small><b><i>Tingkat Keausan</i></b></small></td>
										<td width="25%" align="right">
											<?php
												$h1=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'911','hasil');
												if($h1=="L"){ $v11="checked"; }else{ $v12="checked"; }
											?>
											<input disabled type="radio" title="Lulus" name="911" value="L" <?=$v11?> >L &nbsp;
											<input disabled type="radio" title="Tidak Lulus" name="911" value="TL" <?=$v12?> >TL
										</td>
										<td rowspan="7" width="17%" align="center">
											<?php
												$penguji3=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'911','penguji');
											?> 
											<select name="penguji_9" disabled>
											<option value="">Pilih Penguji</option>
												<?php foreach($penguji as $p): ?> 
												<?php if($penguji3==$p->nip_penguji){ $p3="selected"; }else{ $p3=""; } ?>
												<option value="<?=$p->nip_penguji?>" <?=$p3?> ><?=$p->nama_penguji?></option>
												<?php endforeach; ?>
											</select>
										</td>
									</tr>
									<tr height="30px">
										<td>b.</td>
										<td>Sistem Suspensi</td>
										<td align="center"><small><b><i>Berfungsi</i></b></small></td>
										<td align="right">
											<?php
												$h2=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'912','hasil');
												if($h2=="L"){ $v21="checked"; }else{ $v22="checked"; }
											?>
											<input disabled type="radio" title="Lulus" name="912" value="L" <?=$v21?> >L &nbsp;
											<input disabled type="radio" title="Tidak Lulus" name="912" value="TL" <?=$v22?> >TL
										</td>
									</tr>
									<tr height="30px">
										<td>c.</td>
										<td>Saluran Sistem Rem</td>
										<td align="center"><small><b><i>Tidak Bocor</i></b></small></td>
										<td align="right">
											<?php
												$h3=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'913','hasil');
												if($h3=="L"){ $v31="checked"; }else{ $v32="checked"; }
											?>
											<input disabled type="radio" title="Lulus" name="913" value="L" <?=$v31?> >L &nbsp;
											<input disabled type="radio" title="Tidak Lulus" name="913" value="TL" <?=$v32?> >TL
										</td>
									</tr>
									<tr height="30px">
										<td>d.</td>
										<td>Sistem Penerus Daya</td>
										<td align="center"><small><b><i>Tingkat Keausan</i></b></small></td>
										<td align="right">
											<?php
												$h4=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'914','hasil');
												if($h4=="L"){ $v41="checked"; }else{ $v42="checked"; }
											?>
											<input disabled type="radio" title="Lulus" name="914" value="L" <?=$v41?> >L &nbsp;
											<input disabled type="radio" title="Tidak Lulus" name="914" value="TL" <?=$v42?> >TL
										</td>
									</tr>
									<tr height="30px">
										<td>e.</td>
										<td>Mesin dan Transmisi</td>
										<td align="center"><small><b><i>Tidak Bocor</i></b></small></td>
										<td align="right">
											<?php
												$h5=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'915','hasil');
												if($h5=="L"){ $v51="checked"; }else{ $v52="checked"; }
											?>
											<input disabled type="radio" title="Lulus" name="915" value="L" <?=$v51?> >L &nbsp;
											<input disabled type="radio" title="Tidak Lulus" name="915" value="TL" <?=$v52?> >TL
										</td>
									</tr>
									<tr height="30px">
										<td>f.</td>
										<td>Tangki dan Sistem Bahan Bakar</td>
										<td align="center"><small><b><i>Tidak Bocor</i></b></small></td>
										<td align="right">
											<?php
												$h6=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'916','hasil');
												if($h6=="L"){ $v61="checked"; }else{ $v62="checked"; }
											?>
											<input disabled type="radio" title="Lulus" name="916" value="L" <?=$v61?> >L &nbsp;
											<input disabled type="radio" title="Tidak Lulus" name="916" value="TL" <?=$v62?> >TL
										</td>
									</tr>
									<tr height="30px">
										<td>g.</td>
										<td>Saluran pada Gas Buang</td>
										<td align="center"><small><b><i>Tidak Bocor dan Arah Sesuai</i></b></small></td>
										<td align="right">
											<?php
												$h7=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'917','hasil');
												if($h7=="L"){ $v71="checked"; }else{ $v72="checked"; }
											?>
											<input disabled type="radio" title="Lulus" name="917" value="L" <?=$v71?> >L &nbsp;
											<input disabled type="radio" title="Tidak Lulus" name="917" value="TL" <?=$v72?> >TL
										</td>
									</tr>
								</table>
								</div>
								</fieldset>
			
								<fieldset style="margin:10px 0 0 5px;">
								<legend>Lampu Utama</legend>
								<div class="clearfix">
								<table width="100%">
									<tr>
										<td width="3%">a.</td>
										<td width="32%">Kuat Pancar Lampu <br>Utama (Jauh)</td>
										<td width="23%" align="center"><small><b><i>> 12.000 cd</i></b></small></td>
										<td width="25%" align="right"> 
											Kiri <input type="text" name="1011" style="width:50px" value="<?=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'1011')?>" readonly="true" > cd <br>
											Kanan <input type="text" name="1012" style="width:50px" value="<?=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'1012')?>" readonly="true" > cd&nbsp;
										</td>
										<td width="17%" rowspan="3" align="center">
											<?php
												$penguji4=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'1011','penguji');
											?>
											<select name="penguji_10" disabled>
											<option value="">Pilih Penguji</option>
											<?php foreach($penguji as $p): ?> 
											<?php if($penguji4==$p->nip_penguji){ $p4="selected"; }else{ $p4=""; } ?>
												<option value="<?=$p->nip_penguji?>" <?=$p4?> ><?=$p->nama_penguji?></option>
											<?php endforeach; ?>
											</select>
										</td>
									</tr>
									<tr>
										<td>b.</td>
										<td>Sudut Deviasi Kanan</td>
										<td align="center"><small><b><i> 0&deg; 34&acute; (max)  1&deg; 09&acute; (min)</i></b></small></td>
										<td align="right"> <input type="text" name="1021" style="width:50px" value="<?=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'1021')?>" readonly="true" > &deg; &nbsp;&nbsp; 
					 <input type="text" name="1022" style="width:50px" value="<?=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'1022')?>" readonly="true" > &acute; </td>
									</tr>
									<tr>
										<td>c.</td>
										<td>Sudut Deviasi Kiri</td>
										<td align="center"><small><b><i> 0&deg; 34&acute; (max)  1&deg; 09&acute; (min)</i></b></small></td>
										<td align="right"> <input type="text" name="1031" style="width:50px" value="<?=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'1031')?>" readonly="true" > &deg; &nbsp;&nbsp;&nbsp;
					 <input type="text" name="1032" style="width:50px" value="<?=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'1032')?>" readonly="true" > &acute; </td>
									</tr>
								</table>
								</div>
								</fieldset>

								<fieldset style="margin:10px 0 0 5px;">
								<legend>Kincup Roda</legend>
								<div class="clearfix">
								<table width="100%">
									<tr>
										<td width="35%">Kincup Roda (max)</td>
										<td width="23%" align="center"><small><b><i> [+/-] 5 mm / meter</i></b></small></td>
										<td align="right" width="25%"><input type="text" name="1111" style="width:50px" value="<?=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'1111')?>" readonly="true" > mm / meter &nbsp;</td>
										<td width="17%" align="center">
											<?php
												$penguji5=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'1111','penguji');
											?>
											<select name="penguji_11" disabled>
											<option value="">Pilih Penguji</option>
											<?php foreach($penguji as $p): ?> 
											<?php if($penguji5==$p->nip_penguji){ $p5="selected"; }else{ $p5=""; } ?>
												<option value="<?=$p->nip_penguji?>" <?=$p5?> ><?=$p->nama_penguji?></option>
											<?php endforeach; ?>
											</select>
										</td>
									</tr>
								</table>
								</div>
								</fieldset>
			
								<fieldset style="margin:10px 0 0 5px;">
								<legend>Berat Sumbu</legend>
								<div class="clearfix">
								<table width="100%">
									<tr>
										<td width="35%">Berat Sumbu (KG)</td>
										<td width="23%" align="center"><small><b><i> Sesuai Buku Uji / Hasil penimbangan</i></b></small></td>
										<td align="right" width="25%"><input type="text" name="1211" style="width:50px" value="<?=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'1211')?>" readonly="true" > KG &nbsp;</td>
										<td width="17%" align="center">
											<?php
												$penguji6=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'1211','penguji');
											?>
											<select name="penguji_12" disabled>
											<option value="">Pilih Penguji</option>
											<?php foreach($penguji as $p): ?> 
											<?php if($penguji6==$p->nip_penguji){ $p6="selected"; }else{ $p6=""; } ?>
												<option value="<?=$p->nip_penguji?>" <?=$p6?> ><?=$p->nama_penguji?></option>
											<?php endforeach; ?>
											</select>
										</td>
									</tr>
								</table>
								</div>
								</fieldset>
			
								<fieldset style="margin:10px 0 0 5px;">
								<legend>Sistem REM</legend>
								<div class="clearfix">
								<table width="100%">
									<tr>
										<td rowspan="4" width="3%">a.</td>
										<td rowspan="4" width="32%">Rem Utama (KG)</td>
										<td rowspan="4" width="23%" align="center"><small><b><i>Gaya rem <br> >= 50%  berat sumbu (kg)</i></b></small></td>
										<td width="25%" align="right">S1 = <input type="text" name="1311" style="width:50px" value="<?=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'1311')?>" readonly="true" > %</td>
										<td rowspan="9" width="17%" align="center">
											<?php
												$penguji7=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'1311','penguji');
											?>
											<select name="penguji_13" disabled>
											<option value="">Pilih Penguji</option>
											<?php foreach($penguji as $p): ?> 
											<?php if($penguji7==$p->nip_penguji){ $p7="selected"; }else{ $p7=""; } ?>
												<option value="<?=$p->nip_penguji?>" <?=$p7?> ><?=$p->nama_penguji?></option>
											<?php endforeach; ?>
											</select>
										</td>
									</tr>
									<tr align="right">
										<td>S2 = <input type="text" name="1312" style="width:50px" value="<?=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'1312')?>" readonly="true" > %</td>
									</tr>
									<tr align="right">
										<td>S3 = <input type="text" name="1313" style="width:50px" value="<?=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'1313')?>" readonly="true" > %</td>
									</tr>
									<tr align="right">
										<td>S4 = <input type="text" name="1314" style="width:50px" value="<?=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'1314')?>" readonly="true" > %</td>
									</tr>
									<tr>
										<td rowspan="4">b.</td>
										<td rowspan="4">Selisih gaya rem roda <br> kiri dan kanan dalam <br> satu sumbu (%)</td>
										<td rowspan="4" align="center"><small><b><i>8% (maksimal)</i></b></small></td>
										<td align="right">S1 = <input type="text" name="1321" style="width:50px" value="<?=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'1321')?>" readonly="true" > %</td>
									</tr>
									<tr align="right">
										<td>S2 = <input type="text" name="1322" style="width:50px" value="<?=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'1322')?>" readonly="true" > %</td>
									</tr>
									<tr align="right">
										<td>S3 = <input type="text" name="1323" style="width:50px" value="<?=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'1323')?>" readonly="true" > %</td>
									</tr>
									<tr align="right">
										<td>S4 = <input type="text" name="1324" style="width:50px" value="<?=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'1324')?>" readonly="true" > %</td>
									</tr>
									<tr>
										<td>c.</td>
										<td>Efisiensi Rem Parkir (Hpb)</td>
										<td align="center"><small><b><i>Mbl. Penumpang Min 12 %, <br> Mbl. Barang Min 16 %</i></b></small></td>
										<td align="right"><input type="text" name="1331" style="width:50px" value="<?=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'1331')?>" readonly="true" > %</td>
									</tr>
								</table>
								</div>
								</fieldset>
			
								<fieldset style="margin:10px 0 0 5px;">
								<legend>Speedometer</legend>
								<div class="clearfix">
								<table width="100%">
									<tr>
										<td width="35%">Speedometer [+/-]</td>
										<td width="23%" align="center"><small><b><i>36 km/j s/d 45 km/j</i></b></small></td>
										<td width="25%" align="right"><input type="text" name="1411" style="width:100px" value="<?=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'1411')?>" readonly="true" > km/j</td>
										<td width="17%" align="center">
											<?php
												$penguji8=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'1411','penguji');
											?>
											<select name="penguji_14" disabled>
											<option value="">Pilih Penguji</option>
											<?php foreach($penguji as $p): ?> 
											<?php if($penguji8==$p->nip_penguji){ $p8="selected"; }else{ $p8=""; } ?>
												<option value="<?=$p->nip_penguji?>" <?=$p8?> ><?=$p->nama_penguji?></option>
											<?php endforeach; ?>
											</select>
										</td>
									</tr>
								</table>
								</div>
								</fieldset>
								</form>
							</div>
						</div>
					</div>
				</section>
				
                <!--------------------- Section Lima ----------------------->
				<section id="pane-5">
					<div align="center" style="margin-top:-10px;">
						<h3><u>STATUS PENGUJIAN</u><br>
                    	<p class="itlc"></p></h3>                    
					</div>
					
					<div class="clearfix">
                 		<div style="min-height:255px">
							<div >
								<form class="form has-validation" action="<?=base_url()?>index.php/hasiluji/simpanstatus" method="post">		
								<input type="hidden" name="no_uji" value="<?=$no_uji?>">
								<input type="hidden" name="no_daftar" value="<?=$no_daftar?>">
								<input type="hidden" name="no_bap" value="<?=$no_bap?>">
								<?php $tData=count($hasildata); ?>
								<input type="hidden" name="tData" value="<?=$tData?>">
								<?php foreach($hasildata as $dat)
								{
									$tgl		= $dat->tgl_pengujian;
									$dpenguji	= $dat->nip_penguji;
									$verifikasi	= $dat->verifikasi;
									$ket		= $dat->keterangan;
								}
								?>
						
								<fieldset style="margin:10px 0 5px 0;">
								<legend>Pengujian</legend>
								<table width="100%">
									<tr>
										<td width="20%">Nomor Pendaftaran</td>
										<td width="3%">:</td>
										<td><?=$no_daftar?></td>
									</tr>
									<tr>
										<td>Nomor SRUT</td>
										<td>:</td>
										<td><?=$no_uji?></td>
									</tr>
									<tr>
										<td>Tanggal Pengujian</td>
										<td>:</td>
										<td><input disabled type="date" style="width:95px" name="tgl_periksa" value="<?=$tgl?>"/></td>
									</tr>
									<tr>
										<td>Penguji</td>
										<td>:</td>
										<td>
											<select name="penguji" disabled>
											<option value="">Pilih Penguji</option>
											<?php foreach($penguji as $p): ?>
											<?php if($dpenguji==$p->nip_penguji){ $p1="selected"; }else{ $p1=""; } ?> 
												<option value="<?=$p->nip_penguji?>" <?=$p1?> ><?=$p->nama_penguji?></option>
											<?php endforeach; ?>
											</select>
										</td>
									</tr>
									<tr>
										<td>Hasil Pengujian</td>
										<td>:</td>
										<td>
											<?php 
												if($verifikasi=="lulus"){ $s1="selected"; }elseif($verifikasi=="tidak lulus"){ $s2=="selected"; }
											?>
											<select name="hasil" disabled>
											<option value="">Pilih Hasil</option>
											<option value="lulus" <?=$s1?> >Lulus</option>
											<option value="tidak lulus" <?=$s2?>>Tidak Lulus</option>
											</select>
										</td>
									</tr>
									<tr>
										<td colspan="3">
											<p><b>Keterangan</b></p>
											<textarea name="ket" style="width:100%" rows="10" readonly><?=$ket?></textarea>
										</td>
									</tr>
								</table>
									
								<div class="form-action clearfix" align="right" style="margin:10px 0 0 0;">
									<button type="button" onClick="location.href='<?=base_url()?>index.php/pencetakan';" class="button" style="width:90px; height:30px"  data-icon-primary="ui-icon-circle-close">Kembali</button>
								</div>
								</fieldset>
								</form>
							</div>
						<div>
					</div>
				</section>
			</div>
			</div>
		</div>
	</div>
	
</body>

</html>