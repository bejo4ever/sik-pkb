<!DOCTYPE html>
<html lang="en">

<head>
	<?= $inc; ?>
	<style>
		table { font-size:11px; }
		table tr { height:30px; }
		small { font-size:9px; color:#999999; }
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
		<section>
			<div class="container_8 clearfix">                

				<!-- Main Section -->
				<section class="main-section grid_8">
					<?= $submenu; ?>
					<div class="main-content" style="min-height:255px">

						<header>
							<h2>Uji Mekanis Kendaraan</h2>
						</header>

						<section class="container_6 clearfix" style="margin-top:-30px;">
						<div class="grid_6  clearfix">
							<form class="form has-validation" action="<?=base_url()?>index.php/pengujian/saveUjimekanis" method="post">
							<?php $tData=count($this->pengujianmodel->getHasilUjiFisik($no_BAP,'711')); ?>
							<input type="hidden" name="tData" value="<?=$tData?>">			
							<input type="hidden" name="no_bap" value="<?=$no_BAP?>">
							<input type="hidden" name="no_daftar" value="<?=$no_daftar?>">

							<!-- fieldset style="margin:10px 0 0 5px;">
							<legend>Kebisingan Suara</legend>
							<div class="clearfix">
								<table width="100%">
									<tr>
										<td width="35%">Klakson</td>
										<td align="center" width="23%"><small><b><i>90 - 118 dBA</i></b></small></td>
										<td align="right" width="25%"><input type="text" name="711"  style="width:50px" value="<?=$this->pengujianmodel->getHasilUjiFisik($no_BAP,'711')?>" required="required"> dBA &nbsp;</td>
										<td width="17%" align="center"> 
										<?php
											$penguji1=$this->pengujianmodel->getHasilUjiFisik($no_BAP,'711','penguji');
										?> 
										<select name="penguji_7" required="required">
											<option value="">Pilih Penguji</option>
											<?php foreach($penguji as $p): ?> 
											<?php if (!empty($p->nama_penguji)){ ?> 
												<option value="<?=$p->NRP?>" <?=trim($penguji1) == trim($p->NRP) ? 'selected' : ''?> ><?=$p->nama_penguji?></option>
											<?php } endforeach; ?>
										</select>
										</td>
									</tr>
								</table>
							</div>
							</fieldset -->

							<fieldset style="margin:10px 0 0 5px;">
							<legend>Emisi Gas Buang</legend>
							<div class="clearfix">
								<table width="100%">
									<tr>
										<td width="3%">a.</td>
										<td width="32%">Mesin Diesel</td>
										<td align="center" width="23%"><small><b><i>< <?=date('Y')-1?> 70% (max), &nbsp;&nbsp;> <?=date('Y')-1?> 50% (max)</i></b></small></td>
										<td align="right" width="25%"><input required="required" type="text" name="811" style="width:50px" value="<?=$this->pengujianmodel->getHasilUjiFisik($no_BAP,'811')?>"> %&nbsp;&nbsp;&nbsp;</td>
										<td rowspan="2" width="17%" align="center">
										<?php
											$penguji2=$this->pengujianmodel->getHasilUjiFisik($no_BAP,'811','penguji');
										?> 
										<select name="penguji_8" required="required">
											<option value="">Pilih Penguji</option>
											<?php foreach($penguji as $p): ?> 
											<?php if (!empty($p->nama_penguji)){ ?> 
												<option value="<?=$p->NRP?>" <?=trim($penguji2) == trim($p->NRP) ? 'selected' : ''?> ><?=$p->nama_penguji?></option>
											<?php } endforeach; ?>
										</select>
										</td>
									</tr>
									<tr>
										<td>b.</td>
										<td>Mesin Bensin</td>
										<td align="center"><small><b><i>< <?=date('Y')-4?> C0 = 4,5%, &nbsp;HCL = 1200 ppm<br> > <?=date('Y')-4?> C0 = 1,5%, &nbsp;HCL = 200 ppm</i></b></small></td>
										<td align="right">
											CO = <input required="required" type="text" name="821" style="width:50px" value="<?=$this->pengujianmodel->getHasilUjiFisik($no_BAP,'821')?>"> %&nbsp;&nbsp; <br>
											HCL = <input type="text" required="required" name="822" style="width:50px" value="<?=$this->pengujianmodel->getHasilUjiFisik($no_BAP,'822')?>"> ppm</td>
									</tr>
								</table>
							</div>
							</fieldset>

							<!-- fieldset style="margin:10px 0 0 5px;">
							<legend>Bawah Kendaraan</legend>
							<div class="clearfix">
								<table width="100%">
									<tr height="30px">
										<td width="3%">a.</td>
										<td width="32%">Sistem Kemudi</td>
										<td width="23%" align="center"><small><b><i>Tingkat Keausan</i></b></small></td>
										<td width="25%" align="right">
										<?php
											$h1=$this->pengujianmodel->getHasilUjiFisik($no_BAP,'911','hasil');
											if($h1=="TL"){ $v12="checked"; }else{ $v11="checked"; }
										?>
										<input type="radio" title="Lulus" name="911" value="L" <?=$v11?> >L &nbsp;
										<input type="radio" title="Tidak Lulus" name="911" value="TL" <?=$v12?> >TL
										</td>
										<td rowspan="7" width="17%" align="center">
										<?php
											$penguji3=$this->pengujianmodel->getHasilUjiFisik($no_BAP,'911','penguji');
										?> 
										<select name="penguji_9" required="required">
											<option value="">Pilih Penguji</option>
											<?php foreach($penguji as $p): ?> 
											<?php if (!empty($p->nama_penguji)){ ?> 
											<option value="<?=$p->NRP?>" <?=trim($penguji3) == trim($p->NRP) ? 'selected' : ''?> ><?=$p->nama_penguji?></option>
											<?php } endforeach; ?>
										</select>
										</td>
									</tr>
									<tr height="30px">
										<td>b.</td>
										<td>Sistem Suspensi</td>
										<td align="center"><small><b><i>Berfungsi</i></b></small></td>
										<td align="right">
										<?php
											$h2=$this->pengujianmodel->getHasilUjiFisik($no_BAP,'912','hasil');
											if($h2=="TL"){ $v22="checked"; }else{ $v21="checked"; }
										?>
										<input type="radio" title="Lulus" name="912" value="L" <?=$v21?> >L &nbsp;
										<input type="radio" title="Tidak Lulus" name="912" value="TL" <?=$v22?> >TL
										</td>
									</tr>
									<tr height="30px">
										<td>c.</td>
										<td>Saluran Sistem Rem</td>
										<td align="center"><small><b><i>Tidak Bocor</i></b></small></td>
										<td align="right">
										<?php
											$h3=$this->pengujianmodel->getHasilUjiFisik($no_BAP,'913','hasil');
											if($h3=="TL"){ $v32="checked"; }else{ $v31="checked"; }
										?>
										<input type="radio" title="Lulus" name="913" value="L" <?=$v31?> >L &nbsp;
										<input type="radio" title="Tidak Lulus" name="913" value="TL" <?=$v32?> >TL
										</td>
									</tr>
									<tr height="30px">
										<td>d.</td>
										<td>Sistem Penerus Daya</td>
										<td align="center"><small><b><i>Tingkat Keausan</i></b></small></td>
										<td align="right">
										<?php
											$h4=$this->pengujianmodel->getHasilUjiFisik($no_BAP,'914','hasil');
											if($h4=="TL"){ $v42="checked"; }else{ $v41="checked"; }
										?>
										<input type="radio" title="Lulus" name="914" value="L" <?=$v41?> >L &nbsp;
										<input type="radio" title="Tidak Lulus" name="914" value="TL" <?=$v42?> >TL
										</td>
									</tr>
									<tr height="30px">
										<td>e.</td>
										<td>Mesin dan Transmisi</td>
										<td align="center"><small><b><i>Tidak Bocor</i></b></small></td>
										<td align="right">
										<?php
											$h5=$this->pengujianmodel->getHasilUjiFisik($no_BAP,'915','hasil');
											if($h5=="TL"){ $v52="checked"; }else{ $v51="checked"; }
										?>
										<input type="radio" title="Lulus" name="915" value="L" <?=$v51?> >L &nbsp;
										<input type="radio" title="Tidak Lulus" name="915" value="TL" <?=$v52?> >TL
										</td>
									</tr>
									<tr height="30px">
										<td>f.</td>
										<td>Tangki dan Sistem Bahan Bakar</td>
										<td align="center"><small><b><i>Tidak Bocor</i></b></small></td>
										<td align="right">
										<?php
											$h6=$this->pengujianmodel->getHasilUjiFisik($no_BAP,'916','hasil');
											if($h6=="TL"){ $v62="checked"; }else{ $v61="checked"; }
										?>
										<input type="radio" title="Lulus" name="916" value="L" <?=$v61?> >L &nbsp;
										<input type="radio" title="Tidak Lulus" name="916" value="TL" <?=$v62?> >TL
										</td>
									</tr>
									<tr height="30px">
										<td>g.</td>
										<td>Saluran pada Gas Buang</td>
										<td align="center"><small><b><i>Tidak Bocor dan Arah Sesuai</i></b></small></td>
										<td align="right">
										<?php
											$h7=$this->pengujianmodel->getHasilUjiFisik($no_BAP,'917','hasil');
											if($h7=="TL"){ $v72="checked"; }else{ $v71="checked"; }
						?>
										<input type="radio" title="Lulus" name="917" value="L" <?=$v71?> >L &nbsp;
										<input type="radio" title="Tidak Lulus" name="917" value="TL" <?=$v72?> >TL
										</td>
									</tr>
								</table>
							</div>
							</fieldset -->
			
							<fieldset style="margin:10px 0 0 5px;">
							<legend>Lampu Utama</legend>
							<div class="clearfix">
								<table width="100%">
									<tr>
										<td width="3%">a.</td>
										<td width="32%">Kuat Pancar Lampu <br>Utama (Jauh)</td>
										<td width="23%"><small><b><i>> 12.000 cd</i></b></small></td>
										<td width="25%" align="right"> 
										Kiri <input type="text" required="required" name="1011" style="width:50px" value="<?=$this->pengujianmodel->getHasilUjiFisik($no_BAP,'1011')?>"> cd <br>
										Kanan <input type="text" required="required" name="1012" style="width:50px" value="<?=$this->pengujianmodel->getHasilUjiFisik($no_BAP,'1012')?>"> cd&nbsp;</td>
										<td width="17%" rowspan="3" align="center">
										<?php
											$penguji4=$this->pengujianmodel->getHasilUjiFisik($no_BAP,'1011','penguji');
										?>
										<select name="penguji_10" required="required">
											<option value="">Pilih Penguji</option>
											<?php foreach($penguji as $p): ?> 
											<?php if (!empty($p->nama_penguji)){ ?> 
												<option value="<?=$p->NRP?>" <?=trim($penguji4) == trim($p->NRP) ? 'selected' : ''?> ><?=$p->nama_penguji?></option>
											<?php } endforeach; ?>						
										</select>
										</td>
									</tr>
									<tr>
										<td>b.</td>
										<td>Sudut Deviasi Kanan</td>
										<td align="center"><small><b><i> 0&deg; 34&acute; (max),&nbsp;  1&deg; 09&acute; (min)</i></b></small></td>
										<td align="right"> <input required="required" type="text" name="1021" style="width:50px" value="<?=$this->pengujianmodel->getHasilUjiFisik($no_BAP,'1021')?>"> &deg; &nbsp;&nbsp;
					 					<input type="text" required="required" name="1022" style="width:50px" value="<?=$this->pengujianmodel->getHasilUjiFisik($no_BAP,'1022')?>"> &acute;</td>
									</tr>
									<tr>
										<td>c.</td>
										<td>Sudut Deviasi Kiri</td>
										<td align="center"><small><b><i> 0&deg; 34&acute; (max),&nbsp;  1&deg; 09&acute; (min)</i></b></small></td>
										<td align="right"> <input required="required" type="text" name="1031" style="width:50px" value="<?=$this->pengujianmodel->getHasilUjiFisik($no_BAP,'1031')?>"> &deg; &nbsp;&nbsp;&nbsp;
					 					<input type="text" required="required" name="1032" style="width:50px" value="<?=$this->pengujianmodel->getHasilUjiFisik($no_BAP,'1032')?>"> &acute;</td>
									</tr>
								</table>
							</div>
							</fieldset>
			
							<!-- fieldset style="margin:10px 0 0 5px;">
							<legend>Kincup Roda</legend>
							<div class="clearfix">
								<table width="100%">
									<tr>
										<td width="35%">Kincup Roda (max)</td>
										<td width="23%" align="center"><small><b><i> [+/-] 5 mm / meter</i></b></small></td>
										<td align="right" width="25%"><input type="text" required="required" name="1111" style="width:50px" value="<?=$this->pengujianmodel->getHasilUjiFisik($no_BAP,'1111')?>"> mm / meter &nbsp;</td>
										<td width="17%" align="center">
										<?php
											$penguji5=$this->pengujianmodel->getHasilUjiFisik($no_BAP,'1111','penguji');
										?>
										<select name="penguji_11" required="required">
											<option value="">Pilih Penguji</option>
											<?php foreach($penguji as $p): ?> 
											<?php if (!empty($p->nama_penguji)){ ?> 
												<option value="<?=$p->NRP?>" <?=trim($penguji5) == trim($p->NRP) ? 'selected' : ''?> ><?=$p->nama_penguji?></option>
											<?php } endforeach; ?>
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
										<td align="right" width="25%"><input required="required" type="text" name="1211" style="width:50px" value="<?=$this->pengujianmodel->getHasilUjiFisik($no_BAP,'1211')?>"> KG &nbsp;</td>
										<td width="17%" align="center">
										<?php
											$penguji6=$this->pengujianmodel->getHasilUjiFisik($no_BAP,'1211','penguji');
										?>
										<select name="penguji_12" required="required">
											<option value="">Pilih Penguji</option>
											<?php foreach($penguji as $p): ?> 
											<?php if (!empty($p->nama_penguji)){ ?> 
												<option value="<?=$p->NRP?>" <?=trim($penguji6) == trim($p->NRP) ? 'selected' : ''?> ><?=$p->nama_penguji?></option>
											<?php } endforeach; ?>
										</select>
										</td>
									</tr>
								</table>
							</div>
							</fieldset -->
			
							<fieldset style="margin:10px 0 0 5px;">
							<legend>Sistem Rem</legend>
							<div class="clearfix">
								<table width="100%">
									<tr>
										<td rowspan="4" width="3%">a.</td>
										<td rowspan="4" width="32%">Rem Utama (KG)</td>
										<td rowspan="4" align="center" width="23%"><small><b><i>Gaya Rem <br> >= 50%  berat sumbu (kg)</i></b></small></td>
										<td width="25%" align="right">S1 = <input required="required" type="text" name="1311" style="width:50px" value="<?=$this->pengujianmodel->getHasilUjiFisik($no_BAP,'1311')?>"> %</td>
										<td rowspan="9" width="17%" align="center">
										<?php
											$penguji7=$this->pengujianmodel->getHasilUjiFisik($no_BAP,'1311','penguji');
										?>
										<select name="penguji_13" required="required">
											<option value="">Pilih Penguji</option>
											<?php foreach($penguji as $p): ?> 
											<?php if (!empty($p->nama_penguji)){ ?> 
												<option value="<?=$p->NRP?>" <?=trim($penguji7) == trim($p->NRP) ? 'selected' : ''?> ><?=$p->nama_penguji?></option>
											<?php } endforeach; ?>
										</select>
										</td>
									</tr>
									<tr align="right">
										<td>S2 = <input type="text" name="1312" style="width:50px" value="<?=$this->pengujianmodel->getHasilUjiFisik($no_BAP,'1312')?>"> %</td>
									</tr>
									<tr align="right">
										<td>S3 = <input type="text" required="required" name="1313" style="width:50px" value="<?=$this->pengujianmodel->getHasilUjiFisik($no_BAP,'1313')?>"> %</td>
									</tr>
									<tr align="right">
										<td>S4 = <input required="required" type="text" name="1314" style="width:50px" value="<?=$this->pengujianmodel->getHasilUjiFisik($no_BAP,'1314')?>"> %</td>
									</tr>
									<tr>
										<td rowspan="4">b.</td>
										<td rowspan="4">Selisih gaya rem roda <br> kiri dan kanan dalam <br> satu sumbu (%)</td>
										<td rowspan="4" align="center"><small><b><i>8% (maksimal)</i></b></small></td>
										<td align="right">S1 = <input required="required" type="text" name="1321" style="width:50px" value="<?=$this->pengujianmodel->getHasilUjiFisik($no_BAP,'1321')?>"> %</td>
									</tr>
									<tr align="right">
										<td>S2 = <input required="required" type="text" name="1322" style="width:50px" value="<?=$this->pengujianmodel->getHasilUjiFisik($no_BAP,'1322')?>"> %</td>
									</tr>
									<tr align="right">
										<td>S3 = <input required="required" type="text" name="1323" style="width:50px" value="<?=$this->pengujianmodel->getHasilUjiFisik($no_BAP,'1323')?>"> %</td>
									</tr>
									<tr align="right">
										<td>S4 = <input required="required" type="text" name="1324" style="width:50px" value="<?=$this->pengujianmodel->getHasilUjiFisik($no_BAP,'1324')?>"> %</td>
									</tr>
									<tr>
										<td>c.</td>
										<td>Efisiensi rem parkir (Hpb)</td>
										<td align="center"><small><b><i>Mobil Penumpang <br> Min 12%, <br> &nbsp;Mobil Barang Min16 %</i></b></small></td>
										<td align="right"><input required="required" type="text" name="1331" style="width:50px" value="<?=$this->pengujianmodel->getHasilUjiFisik($no_BAP,'1331')?>"> %</td>
									</tr>
								</table>
							</div>
							</fieldset>
			
							<!-- fieldset style="margin:10px 0 0 5px;">
							<legend>Speedometer</legend>
							<div class="clearfix">
								<table width="100%">
									<tr>
										<td width="35%">Speedometer [+/-]</td>
										<td width="23%" align="center"><small><b><i>36 - 45 km/j</i></b></small></td>
										<td width="25%" align="right"><input required="required" type="text" name="1411" style="width:100px" value="<?=$this->pengujianmodel->getHasilUjiFisik($no_BAP,'1411')?>"> km/j</td>
										<td width="17%" align="center">
										<?php
											$penguji8=$this->pengujianmodel->getHasilUjiFisik($no_BAP,'1411','penguji');
										?>
										<select name="penguji_14" required="required">
											<option value="">Pilih Penguji</option>
											<?php foreach($penguji as $p): ?> 
											<?php if (!empty($p->nama_penguji)){ ?> 
												<option value="<?=$p->NRP?>" <?=trim($penguji8) == trim($p->NRP) ? 'selected' : ''?> ><?=$p->nama_penguji?></option>
											<?php } endforeach; ?>
										</select>
										</td>
									</tr>
								</table>
							</div>
							</fieldset -->
						
							<div class="form-action clearfix" align="right" style="margin:10px 0 0 0;">
								<button class="button" style="width:90px; height:30px" type="submit" data-icon-primary="ui-icon-circle-check">Simpan</button>
								<button type="button" onClick="location.href='<?=base_url()?>index.php/pengujian';" class="button" style="width:90px; height:30px" data-icon-primary="ui-icon-circle-close">Batal</button>
								<!-- <button type="button" onClick="location.href='<?=base_url()?>index.php/pengujian/selesai/<?=$no_daftar?>';" class="button" style="width:90px; height:30px"  data-icon-primary="ui-icon-circle-close">Selesai</button> -->
							</div>
							</form>
						</div>
					</section>
				</div>
			</section>
			<!-- Main Section End -->

		</div>
	</section>
	</div>
	<?= $footer; ?>

</body>

</html>
