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
							<form class="form has-validation" action="<?=base_url()?>index.php/prapengujian/saveUjimekanis" method="post">
							<?php $tData=count($this->prapengujianmodel->getHasilUjiFisik($no_BAP,'711')); ?>
							<input type="hidden" name="tData" value="<?=$tData?>">			
							<input type="hidden" name="no_bap" value="<?=$no_BAP?>">
							<input type="hidden" name="no_daftar" value="<?=$no_daftar?>">

							<fieldset style="margin:10px 0 0 5px;">
							<legend>Kebisingan Suara</legend>
							<div class="clearfix">
								<table width="100%">
									<tr>
										<td width="35%">Klakson</td>
										<td align="center" width="23%"><small><b><i>90 - 118 dBA</i></b></small></td>
										<td align="right" width="25%"><input type="text" name="711"  style="width:50px" value="<?=$this->prapengujianmodel->getHasilUjiFisik($no_BAP,'711')?>" required="required"> dBA &nbsp;</td>
										<td width="17%" align="center"> 
										<?php
											$penguji1=$this->prapengujianmodel->getHasilUjiFisik($no_BAP,'711','penguji');
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
											$h1=$this->prapengujianmodel->getHasilUjiFisik($no_BAP,'911','hasil');
											if($h1=="TL"){ $v12="checked"; }else{ $v11="checked"; }
										?>
										<input type="radio" title="Lulus" name="911" value="L" <?=$v11?> >L &nbsp;
										<input type="radio" title="Tidak Lulus" name="911" value="TL" <?=$v12?> >TL
										</td>
										<td rowspan="7" width="17%" align="center">
										<?php
											$penguji3=$this->prapengujianmodel->getHasilUjiFisik($no_BAP,'911','penguji');
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
											$h2=$this->prapengujianmodel->getHasilUjiFisik($no_BAP,'912','hasil');
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
											$h3=$this->prapengujianmodel->getHasilUjiFisik($no_BAP,'913','hasil');
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
											$h4=$this->prapengujianmodel->getHasilUjiFisik($no_BAP,'914','hasil');
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
											$h5=$this->prapengujianmodel->getHasilUjiFisik($no_BAP,'915','hasil');
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
											$h6=$this->prapengujianmodel->getHasilUjiFisik($no_BAP,'916','hasil');
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
											$h7=$this->prapengujianmodel->getHasilUjiFisik($no_BAP,'917','hasil');
											if($h7=="TL"){ $v72="checked"; }else{ $v71="checked"; }
						?>
										<input type="radio" title="Lulus" name="917" value="L" <?=$v71?> >L &nbsp;
										<input type="radio" title="Tidak Lulus" name="917" value="TL" <?=$v72?> >TL
										</td>
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
										<td align="right" width="25%"><input type="text" required="required" name="1111" style="width:50px" value="<?=$this->prapengujianmodel->getHasilUjiFisik($no_BAP,'1111')?>"> mm / meter &nbsp;</td>
										<td width="17%" align="center">
										<?php
											$penguji5=$this->prapengujianmodel->getHasilUjiFisik($no_BAP,'1111','penguji');
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
										<td align="right" width="25%"><input required="required" type="text" name="1211" style="width:50px" value="<?=$this->prapengujianmodel->getHasilUjiFisik($no_BAP,'1211')?>"> KG &nbsp;</td>
										<td width="17%" align="center">
										<?php
											$penguji6=$this->prapengujianmodel->getHasilUjiFisik($no_BAP,'1211','penguji');
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
							</fieldset>
			
							<fieldset style="margin:10px 0 0 5px;">
							<legend>Speedometer</legend>
							<div class="clearfix">
								<table width="100%">
									<tr>
										<td width="35%">Speedometer [+/-]</td>
										<td width="23%" align="center"><small><b><i>36 - 45 km/j</i></b></small></td>
										<td width="25%" align="right"><input required="required" type="text" name="1411" style="width:100px" value="<?=$this->prapengujianmodel->getHasilUjiFisik($no_BAP,'1411')?>"> km/j</td>
										<td width="17%" align="center">
										<?php
											$penguji8=$this->prapengujianmodel->getHasilUjiFisik($no_BAP,'1411','penguji');
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
							</fieldset>
						
							<div class="form-action clearfix" align="right" style="margin:10px 0 0 0;">
								<button class="button" style="width:90px; height:30px" type="submit" data-icon-primary="ui-icon-circle-check">Simpan</button>
								<button type="button" onClick="location.href='<?=base_url()?>index.php/prapengujian';" class="button" style="width:90px; height:30px" data-icon-primary="ui-icon-circle-close">Batal</button>
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
