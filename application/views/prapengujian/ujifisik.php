<!DOCTYPE html>

<html lang="en">

<head>
	<?= $inc; ?>
	<style>
		table { font-size:10px; }
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
						<h2>Uji Fisik Kendaraan</h2>
					</header>

					<section class="container_6 clearfix" style="margin-top:-30px;">
						<div class="grid_6 leading">
						<form class="form has-validation" action="<?=base_url()?>index.php/prapengujian/simpanUjifisik" method="post">
							<?php $tData=count($this->prapengujianmodel->getHasilUjiFisik($no_BAP,'111','hasil')); ?>
							<input type="hidden" name="tData" value="<?=$tData?>">			
							<input type="hidden" name="no_bap" value="<?=$no_BAP?>">

							<fieldset style="margin:10px 0 5px 0;">
							<legend>1. Identitas Kendaraan</legend>
							<div class="clearfix">
								<table width="100%">
									<tr>
										<td width="3%">a.</td><td width="25%">Nomor Uji / Nomor Pendaftaran</td>
										<td width="30%" rowspan="2" valign="middle" align="center"><small><b><i>Sesuai Buku Uji</i></b></small></td>
										<td width="25%" align="center">
										<?php
											$h1=$this->prapengujianmodel->getHasilUjiFisik($no_BAP,'111','hasil');
											if($h1=="TL"){ $v12="checked"; }else{ $v11="checked"; }
										?>
										<input type="radio" title="Lulus" name="111" value="L" <?=$v11?> >L &nbsp;
										<input type="radio" title="Tidak Lulus" name="111" value="TL" <?=$v12?> >TL
										</td>
										<td rowspan="2" align="center" width="17%">
										<?php
											$penguji1=$this->prapengujianmodel->getHasilUjiFisik($no_BAP,'112','penguji');
										?>
										<select name="penguji_1" required="required">
											<option value="">Pilih Penguji</option>
											<?php foreach($penguji as $p): ?>
											<?php if (!empty($p->nama_penguji)){ ?> 
												<option value="<?=$p->nip_penguji?>" <?=trim($penguji1) == trim($p->nip_penguji) ? 'selected' : ''?> ><?=$p->nama_penguji?></option>
											<?php } endforeach; ?>
										</select>
										</td>
									</tr>
									<tr>
										<td>b.</td><td>Nomor Rangka / Nomor Mesin</td>
										<td align="center">
										<?php
											$h2=$this->prapengujianmodel->getHasilUjiFisik($no_BAP,'112','hasil');
											if($h2=="TL"){ $v22="checked"; }else{ $v21="checked"; }
										?>
										<input type="radio" title="Lulus" name="112" value="L" <?=$v21?> >L &nbsp;
										<input type="radio" title="Tidak Lulus" name="112" value="TL" <?=$v22?> >TL
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
											$h3=$this->prapengujianmodel->getHasilUjiFisik($no_BAP,'211','hasil');
											if($h3=="TL"){ $v32="checked"; }else{ $v31="checked"; }
										?>
										<input type="radio" title="Lulus" name="211" value="L" <?=$v31?> >L &nbsp;
										<input type="radio" title="Tidak Lulus" name="211" value="TL" <?=$v32?> >TL
										</td>
										<td rowspan="4" align="center" width="17%">
										<?php
											$penguji2=$this->prapengujianmodel->getHasilUjiFisik($no_BAP,'211','penguji');
										?>
										<select name="penguji_2" required="required">
											<option value="">Pilih Penguji</option>
											<?php foreach($penguji as $p): ?>
											<?php if (!empty($p->nama_penguji)){ ?> 
												<option value="<?=$p->nip_penguji?>" <?=trim($penguji2) == trim($p->nip_penguji) ? 'selected' : ''?> ><?=$p->nama_penguji?></option>
											<?php } endforeach; ?>
										</select>
										</td>
									</tr>
									<tr>
										<td>b.</td><td>Lampu Rem</td>
										<td align="center">
										<?php
											$h4=$this->prapengujianmodel->getHasilUjiFisik($no_BAP,'212','hasil');
											if($h4=="TL"){ $v42="checked"; }else{ $v41="checked"; }
										?>
										<input type="radio" title="Lulus" name="212" value="L" <?=$v41?> >L &nbsp;
										<input type="radio" title="Tidak Lulus" name="212" value="TL" <?=$v42?> >TL
										</td>
									</tr>
									<tr>
										<td>c.</td><td>Lampu Mundur</td>
										<td align="center">
										<?php
											$h5=$this->prapengujianmodel->getHasilUjiFisik($no_BAP,'213','hasil');
											if($h5=="TL"){ $v52="checked"; }else{ $v51="checked"; }
										?>
										<input type="radio" title="Lulus" name="213" value="L" <?=$v51?> >L &nbsp;
										<input type="radio" title="Tidak Lulus" name="213" value="TL" <?=$v52?> >TL
										</td>
									</tr>
									<tr>
										<td>d.</td><td>Lampu Posisi</td>
										<td align="center">
										<?php
											$h6=$this->prapengujianmodel->getHasilUjiFisik($no_BAP,'214','hasil');
											if($h6=="TL"){ $v62="checked"; }else{ $v61="checked"; }
										?>
										<input type="radio" title="Lulus" name="214" value="L" <?=$v61?> >L &nbsp;
										<input type="radio" title="Tidak Lulus" name="214" value="TL" <?=$v62?> >TL
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
										<td width="30%" align="center" valign="middle"><small><b><i>Baik, Tidak Keropos</i></b></small></td>
										<td width="25%" align="center">
										<?php
											$h7=$this->prapengujianmodel->getHasilUjiFisik($no_BAP,'311','hasil');
											if($h7=="TL"){ $v72="checked"; }else{ $v71="checked"; }
										?>
										<input type="radio" title="Lulus" name="311" value="L" <?=$v71?> >L &nbsp;
										<input type="radio" title="Tidak Lulus" name="311" value="TL" <?=$v72?> >TL
										</td>
										<td rowspan="3" align="center" width="17%"> 
										<?php
											$penguji3=$this->prapengujianmodel->getHasilUjiFisik($no_BAP,'311','penguji');
										?>
										<select name="penguji_3" required="required">
											<option value="">Pilih Penguji</option>
											<?php foreach($penguji as $p): ?>
											<?php if (!empty($p->nama_penguji)){ ?> 
												<option value="<?=$p->nip_penguji?>" <?=trim($penguji3) == trim($p->nip_penguji) ? 'selected' : ''?> ><?=$p->nama_penguji?></option>
											<?php } endforeach; ?>
										</select>
										</td>
									</tr>
									<tr>
										<td>b.</td><td>Perisai Kolong</td>
										<td align="center"><small><b><i>Ada</i></b></small></td>
										<td align="center">
										<?php
											$h8=$this->prapengujianmodel->getHasilUjiFisik($no_BAP,'312','hasil');
											if($h8=="TL"){ $v82="checked"; }else{ $v81="checked"; }
										?>
										<input type="radio" title="Lulus" name="312" value="L" <?=$v81?> >L &nbsp;
										<input type="radio" title="Tidak Lulus" name="312" value="TL" <?=$v82?> >TL
										</td>
									</tr>
									<tr>
										<td>c.</td><td>Sambungan Tempelan / Gandengan</td>
										<td align="center"><small><b><i>Tidak Aus</i></b></small></td>
										<td align="center">
										<?php
											$h9=$this->prapengujianmodel->getHasilUjiFisik($no_BAP,'313','hasil');
											if($h9=="TL"){ $v92="checked"; }else{ $v91="checked"; }
										?>
										<input type="radio" title="Lulus" name="313" value="L" <?=$v91?> >L &nbsp;
										<input type="radio" title="Tidak Lulus" name="313" value="TL" <?=$v92?> >TL
										</td>
									</tr>
								</table>
							</div>
							</fieldset>
					
							<fieldset style="margin:10px 0 5px 0;">
							<legend>4. Roda-roda</legend>
							<div class="clearfix">
								<table width="100%">
									<tr>
										<td width="3%">a.</td><td width="25%">Ukuran Ban Sumbu I</td>
										<td width="30%" align="center" rowspan="4" valign="middle"><small><b><i>Sesuai Buku Uji / Spesifikasi Pabrik</i></b></small></td>
										<td width="25%" align="center">
										<?php
											$h10=$this->prapengujianmodel->getHasilUjiFisik($no_BAP,'411','hasil');
											if($h10=="TL"){ $v102="checked"; }else{ $v101="checked"; }
										?>
										<input type="radio" title="Lulus" name="411" value="L" <?=$v101?> >L &nbsp;
										<input type="radio" title="Tidak Lulus" name="411" value="TL" <?=$v102?> >TL
										</td>
										<td rowspan="6" align="center" width="17%">
										<?php
											$penguji4=$this->prapengujianmodel->getHasilUjiFisik($no_BAP,'411','penguji');
										?>  
										<select name="penguji_4" required="required">
											<option value="">Pilih Penguji</option>
											<?php foreach($penguji as $p): ?>
											<?php if (!empty($p->nama_penguji)){ ?> 
												<option value="<?=$p->nip_penguji?>" <?=trim($penguji4) == trim($p->nip_penguji) ? 'selected' : ''?> ><?=$p->nama_penguji?></option>
											<?php } endforeach; ?>
										</select>
										</td>
									</tr>
									<tr>
										<td>b.</td><td>Ukuran Ban Sumbu II</td>
										<td align="center">
										<?php
											$h11=$this->prapengujianmodel->getHasilUjiFisik($no_BAP,'412','hasil');
											if($h11=="TL"){ $v112="checked"; }else{ $v111="checked"; }
										?>
										<input type="radio" title="Lulus" name="412" value="L" <?=$v111?> >L &nbsp;
										<input type="radio" title="Tidak Lulus" name="412" value="TL" <?=$v112?> >TL
										</td>
									</tr>
									<tr>
										<td>c.</td><td>Ukuran Ban Sumbu III</td>
										<td align="center">
										<?php
											$h12=$this->prapengujianmodel->getHasilUjiFisik($no_BAP,'413','hasil');
											if($h12=="TL"){ $v122="checked"; }else{ $v121="checked"; }
										?>
										<input type="radio" title="Lulus" name="413" value="L" <?=$v121?> >L &nbsp;
										<input type="radio" title="Tidak Lulus" name="413" value="TL" <?=$v122?> >TL
										</td>
									</tr>
									<tr>
										<td>d.</td><td>Ukuran Ban Sumbu IV</td>
										<td align="center">
										<?php
											$h13=$this->prapengujianmodel->getHasilUjiFisik($no_BAP,'414','hasil');
											if($h13=="TL"){ $v132="checked"; }else{ $v131="checked"; }
										?>
										<input type="radio" title="Lulus" name="414" value="L" <?=$v131?> >L &nbsp;
										<input type="radio" title="Tidak Lulus" name="414" value="TL" <?=$v132?> >TL
										</td>
									</tr>
									<tr>
										<td>e.</td><td>Kedalaman Alur Ban Luar</td>
										<td align="center"><small><b><i>1 mm (Minimal)</i></b></small></td>
										<td align="center">
										<?php
											$h14=$this->prapengujianmodel->getHasilUjiFisik($no_BAP,'415','hasil');
											if($h14=="TL"){ $v142="checked"; }else{ $v141="checked"; }
										?>
										<input type="radio" title="Lulus" name="415" value="L" <?=$v141?> >L &nbsp;
										<input type="radio" title="Tidak Lulus" name="415" value="TL" <?=$v142?> >TL
										</td>
									</tr>
									<tr>
										<td>f.</td><td>Penguatan Roda</td>
										<td align="center"><small><b><i>Tidak kendor</i></b></small></td>
										<td align="center">
										<?php
											$h15=$this->prapengujianmodel->getHasilUjiFisik($no_BAP,'416','hasil');
											if($h15=="TL"){ $v152="checked"; }else{ $v151="checked"; }
										?>
										<input type="radio" title="Lulus" name="416" value="L" <?=$v151?> >L &nbsp;
										<input type="radio" title="Tidak Lulus" name="416" value="TL" <?=$v152?> >TL
										</td>
									</tr>
								</table>
							</div>
							</fieldset>

							<fieldset style="margin:10px 0 0 5px;">
							<legend>5. Dimensi Kendaraan</legend>
							<div class="clearfix">
								<table width="100%">
									<tr><td>a.</td><td colspan="3"><b>Ukuran Utama</b></td></tr>
									<tr>
										<td width="3%" align="right"> -&nbsp;</td><td width="25%">Panjang</td>
										<td width="30%" rowspan="5" valign="middle"></td>
										<td width="25%" align="center">
										<?php
											$h16=$this->prapengujianmodel->getHasilUjiFisik($no_BAP,'511','hasil');
											if($h16=="TL"){ $v162="checked"; }else{ $v161="checked"; }
										?>
										<input type="radio" title="Lulus" name="511" value="L" <?=$v161?> >L &nbsp;
										<input type="radio" title="Tidak Lulus" name="511" value="TL" <?=$v162?> >TL
										</td>
										<td rowspan="21" align="center" width="17%"> 
										<?php
											$penguji5=$this->prapengujianmodel->getHasilUjiFisik($no_BAP,'511','penguji');
										?>
										<select name="penguji_5" required="required">
											<option value="">Pilih Penguji</option>
											<?php foreach($penguji as $p): ?>
											<?php if (!empty($p->nama_penguji)){ ?> 
												<option value="<?=$p->nip_penguji?>" <?=trim($penguji5) == trim($p->nip_penguji) ? 'selected' : ''?> ><?=$p->nama_penguji?></option>
											<?php } endforeach; ?>
										</select>
										</td>
									</tr>
									<tr>
										<td align="right"> -&nbsp;</td><td>Lebar</td>
										<td align="center">
										<?php
											$h17=$this->prapengujianmodel->getHasilUjiFisik($no_BAP,'512','hasil');
											if($h17=="TL"){ $v172="checked"; }else{ $v171="checked"; }
										?>
										<input type="radio" title="Lulus" name="512" value="L" <?=$v171?> >L &nbsp;
										<input type="radio" title="Tidak Lulus" name="512" value="TL" <?=$v172?> >TL
										</td>
									</tr>
									<tr>
										<td align="right"> -&nbsp;</td><td>Tinggi</td>
										<td align="center">
										<?php
											$h18=$this->prapengujianmodel->getHasilUjiFisik($no_BAP,'513','hasil');
											if($h18=="TL"){ $v182="checked"; }else{ $v181="checked"; }
										?>
										<input type="radio" title="Lulus" name="513" value="L" <?=$v181?> >L &nbsp;
										<input type="radio" title="Tidak Lulus" name="513" value="TL" <?=$v182?> >TL
										</td>
									</tr>
									<tr>
										<td align="right"> -&nbsp;</td><td>Julur Depan (FOH)</td>
										<td align="center">
										<?php
											$h19=$this->prapengujianmodel->getHasilUjiFisik($no_BAP,'514','hasil');
											if($h19=="TL"){ $v192="checked"; }else{ $v191="checked"; }
										?>
										<input type="radio" title="Lulus" name="514" value="L" <?=$v191?> >L &nbsp;
										<input type="radio" title="Tidak Lulus" name="514" value="TL" <?=$v192?> >TL
										</td>
									</tr>
									<tr>
										<td align="right"> -&nbsp;</td><td>Julur Belakang (ROH)</td>
										<td align="center">
										<?php
											$h20=$this->prapengujianmodel->getHasilUjiFisik($no_BAP,'515','hasil');
											if($h20=="TL"){ $v202="checked"; }else{ $v201="checked"; }
										?>
										<input type="radio" title="Lulus" name="515" value="L" <?=$v201?> >L &nbsp;
										<input type="radio" title="Tidak Lulus" name="515" value="TL" <?=$v202?> >TL
										</td>
									</tr>
									<tr><td>b.</td><td colspan="3"><b>Jarak Sumbu</b></td></tr>
									<tr>
										<td align="right"> -&nbsp;</td><td>Sumbu I-II</td>
										<td rowspan="3" valign="middle" align="center"><small><b><i>Sesuai Buku Uji / Ketentuan</i></b></small></td>
										<td align="center">
										<?php
											$h21=$this->prapengujianmodel->getHasilUjiFisik($no_BAP,'521','hasil');
											if($h21=="TL"){ $v212="checked"; }else{ $v211="checked"; }
										?>
										<input type="radio" title="Lulus" name="521" value="L" <?=$v211?> >L &nbsp;
										<input type="radio" title="Tidak Lulus" name="521" value="TL" <?=$v212?> >TL
										</td>
									</tr>
									<tr>
										<td align="right"> -&nbsp;</td><td>Sumbu II-III</td>
										<td align="center">
										<?php
											$h22=$this->prapengujianmodel->getHasilUjiFisik($no_BAP,'522','hasil');
											if($h22=="TL"){ $v222="checked"; }else{ $v221="checked"; }
										?>
										<input type="radio" title="Lulus" name="522" value="L" <?=$v221?> >L &nbsp;
										<input type="radio" title="Tidak Lulus" name="522" value="TL" <?=$v222?> >TL
										</td>
									</tr>
									<tr>
										<td align="right"> -&nbsp;</td><td>Sumbu III-IV</td>
										<td align="center">
										<?php
											$h23=$this->prapengujianmodel->getHasilUjiFisik($no_BAP,'523','hasil');
											if($h23=="TL"){ $v232="checked"; }else{ $v231="checked"; }
										?>
										<input type="radio" title="Lulus" name="523" value="L" <?=$v231?> >L &nbsp;
										<input type="radio" title="Tidak Lulus" name="523" value="TL" <?=$v232?> >TL
										</td>
									</tr>
									<tr><td>c.</td><td colspan="3"><b>Dimensi Bak Muatan</b></td></tr>
									<tr>
										<td align="right"> -&nbsp;</td><td>Panjang</td>
										<td rowspan="3" valign="middle" align="center"><small><b><i>Sesuai Spesifikasi</i></b></small></td>
										<td align="center">
										<?php
											$h24=$this->prapengujianmodel->getHasilUjiFisik($no_BAP,'531','hasil');
											if($h24=="TL"){ $v242="checked"; }else{ $v241="checked"; }
										?>
										<input type="radio" title="Lulus" name="531" value="L" <?=$v241?> >L &nbsp;
										<input type="radio" title="Tidak Lulus" name="531" value="TL" <?=$v242?> >TL
										</td>
									</tr>
									<tr>
										<td align="right"> -&nbsp;</td><td>Lebar</td>
										<td align="center">
										<?php
											$h25=$this->prapengujianmodel->getHasilUjiFisik($no_BAP,'532','hasil');
											if($h25=="TL"){ $v252="checked"; }else{ $v251="checked"; }
										?>
										<input type="radio" title="Lulus" name="532" value="L" <?=$v251?> >L &nbsp;
										<input type="radio" title="Tidak Lulus" name="532" value="TL" <?=$v252?> >TL
										</td>
									</tr>
									<tr>
										<td align="right"> -&nbsp;</td><td>Tinggi</td>
										<td align="center">
										<?php
											$h26=$this->prapengujianmodel->getHasilUjiFisik($no_BAP,'533','hasil');
											if($h26=="TL"){ $v262="checked"; }else{ $v261="checked"; }
										?>
										<input type="radio" title="Lulus" name="533" value="L" <?=$v261?> >L &nbsp;
										<input type="radio" title="Tidak Lulus" name="533" value="TL" <?=$v262?> >TL
										</td>
									</tr>
									<tr><td>d.</td><td colspan="3"><b>Dimensi Tangki</b></td></tr>
									<tr>
										<td align="right"> -&nbsp;</td><td>Panjang</td>
										<td rowspan="6" valign="middle" align="center"><small><b><i>Sesuai Tera / Kapasitas</i></b></small></td>
										<td align="center">
										<?php
											$h27=$this->prapengujianmodel->getHasilUjiFisik($no_BAP,'541','hasil');
											if($h27=="TL"){ $v272="checked"; }else{ $v271="checked"; }
										?>
										<input type="radio" title="Lulus" name="541" value="L" <?=$v271?> >L &nbsp;
										<input type="radio" title="Tidak Lulus" name="541" value="TL" <?=$v272?> >TL
										</td>
									</tr>
									<tr>
										<td align="right"> -&nbsp;</td><td>Lebar</td>
										<td align="center">
										<?php
											$h28=$this->prapengujianmodel->getHasilUjiFisik($no_BAP,'542','hasil');
											if($h28=="TL"){ $v282="checked"; }else{ $v281="checked"; }
										?>
										<input type="radio" title="Lulus" name="542" value="L" <?=$v281?> >L &nbsp;
										<input type="radio" title="Tidak Lulus" name="542" value="TL" <?=$v282?> >TL
										</td>
									</tr>
									<tr>
										<td align="right"> -&nbsp;</td><td>Tinggi</td>
										<td align="center">
										<?php
											$h29=$this->prapengujianmodel->getHasilUjiFisik($no_BAP,'543','hasil');
											if($h29=="TL"){ $v292="checked"; }else{ $v291="checked"; }
										?>
										<input type="radio" title="Lulus" name="543" value="L" <?=$v291?> >L &nbsp;
										<input type="radio" title="Tidak Lulus" name="543" value="TL" <?=$v292?> >TL
										</td>
									</tr>
									<tr>
										<td align="right"> -&nbsp;</td><td>Volume</td>
										<td align="center">
										<?php
											$h30=$this->prapengujianmodel->getHasilUjiFisik($no_BAP,'544','hasil');
											if($h30=="TL"){ $v302="checked"; }else{ $v301="checked"; }
										?>
										<input type="radio" title="Lulus" name="544" value="L" <?=$v301?> >L &nbsp;
										<input type="radio" title="Tidak Lulus" name="544" value="TL" <?=$v302?> >TL
										</td>
									</tr>
									<tr>
										<td align="right"> -&nbsp;</td><td>Jenis Muatan</td>
										<td align="center">
										<?php
											$h31=$this->prapengujianmodel->getHasilUjiFisik($no_BAP,'545','hasil');
											if($h31=="TL"){ $v312="checked"; }else{ $v311="checked"; }
										?>
										<input type="radio" title="Lulus" name="545" value="L" <?=$v311?> >L &nbsp;
										<input type="radio" title="Tidak Lulus" name="545" value="TL" <?=$v312?> >TL
										</td>
									</tr>
									<tr>
										<td align="right"> -&nbsp;</td><td>Berat Jenis Muatan</td>
										<td align="center">
										<?php
											$h32=$this->prapengujianmodel->getHasilUjiFisik($no_BAP,'546','hasil');
											if($h32=="TL"){ $v322="checked"; }else{ $v321="checked"; }
										?>
										<input type="radio" title="Lulus" name="546" value="L" <?=$v321?> >L &nbsp;
										<input type="radio" title="Tidak Lulus" name="546" value="TL" <?=$v322?> >TL
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
										<td width="3%">a.</td><td width="25%">Penghapus Kaca Depan</td>
										<td valign="middle" align="center" width="30%"><small><b><i>Ada & Berfungsi</i></b></small></td>
										<td width="25%" align="center">
										<?php
											$h33=$this->prapengujianmodel->getHasilUjiFisik($no_BAP,'611','hasil');
											if($h33=="TL"){ $v332="checked"; }else{ $v331="checked"; }
										?>
										<input type="radio" title="Lulus" name="611" value="L" <?=$v331?> >L &nbsp;
										<input type="radio" title="Tidak Lulus" name="611" value="TL" <?=$v332?> >TL
										</td>
										<td rowspan="8" align="center" width="17%">
										<?php
											$penguji6=$this->prapengujianmodel->getHasilUjiFisik($no_BAP,'611','penguji');
										?>
										<select name="penguji_6" required="required">
											<option value="">Pilih Penguji</option>
											<?php foreach($penguji as $p): ?>
											<?php if (!empty($p->nama_penguji)){ ?> 
												<option value="<?=$p->nip_penguji?>" <?=trim($penguji6) == trim($p->nip_penguji) ? 'selected' : ''?> ><?=$p->nama_penguji?></option>
											<?php } endforeach; ?>
										</select>
										</td>
									</tr>
									<tr>
										<td>b.</td><td>Kaca Spion</td>
										<td align="center"><small><b><i>Ada & Lengkap</i></b></small></td>
										<td align="center">
										<?php
											$h34=$this->prapengujianmodel->getHasilUjiFisik($no_BAP,'612','hasil');
											if($h34=="TL"){ $v342="checked"; }else{ $v341="checked"; }
										?>
										<input type="radio" title="Lulus" name="612" value="L" <?=$v341?> >L &nbsp;
										<input type="radio" title="Tidak Lulus" name="612" value="TL" <?=$v342?> >TL
										</td>
									</tr>
									<tr>
										<td>c.</td><td>Dongkrak</td>
										<td align="center"><small><b><i>Ada & Berfungsi</i></b></small></td>
										<td align="center">
										<?php
											$h35=$this->prapengujianmodel->getHasilUjiFisik($no_BAP,'613','hasil');
											if($h35=="TL"){ $v352="checked"; }else{ $v351="checked"; }
										?>
										<input type="radio" title="Lulus" name="613" value="L" <?=$v351?> >L &nbsp;
										<input type="radio" title="Tidak Lulus" name="613" value="TL" <?=$v352?> >TL
										</td>
									</tr>
									<tr>
										<td>d.</td><td>Alat-alat / Kunci</td>
										<td align="center"><small><b><i>Ada & Lengkap</i></b></small></td>
										<td align="center">
										<?php
											$h36=$this->prapengujianmodel->getHasilUjiFisik($no_BAP,'614','hasil');
											if($h36=="TL"){ $v362="checked"; }else{ $v361="checked"; }
										?>
										<input type="radio" title="Lulus" name="614" value="L" <?=$v361?> >L &nbsp;
										<input type="radio" title="Tidak Lulus" name="614" value="TL" <?=$v362?> >TL
										</td>
									</tr>
									<tr>
										<td>e.</td><td>Ban Pengganti / Cadangan</td>
										<td align="center"><small><b><i>Ada</i></b></small></td>
										<td align="center">
										<?php
											$h37=$this->prapengujianmodel->getHasilUjiFisik($no_BAP,'615','hasil');
											if($h37=="TL"){ $v372="checked"; }else{ $v371="checked"; }
										?>
										<input type="radio" title="Lulus" name="615" value="L" <?=$v371?> >L &nbsp;
										<input type="radio" title="Tidak Lulus" name="615" value="TL" <?=$v372?> >TL
										</td>
									</tr>
									<tr>
										<td>f.</td><td>Tanda Segitiga Pengaman</td>
										<td align="center"><small><b><i>Ada & Lengkap</i></b></small></td>
										<td align="center">
										<?php
											$h38=$this->prapengujianmodel->getHasilUjiFisik($no_BAP,'616','hasil');
											if($h38=="TL"){ $v382="checked"; }else{ $v381="checked"; }
										?>
										<input type="radio" title="Lulus" name="616" value="L" <?=$v381?> >L &nbsp;
										<input type="radio" title="Tidak Lulus" name="616" value="TL" <?=$v382?> >TL
										</td>
									</tr>
									<tr>
										<td>g.</td><td>Sabuk Keselamatan / Kotak Obat</td>
										<td align="center"><small><b><i>Ada & Berfungsi</i></b></small></td>
										<td align="center">
										<?php
											$h39=$this->prapengujianmodel->getHasilUjiFisik($no_BAP,'617','hasil');
											if($h39=="TL"){ $v392="checked"; }else{ $v391="checked"; }
										?>
										<input type="radio" title="Lulus" name="617" value="L" <?=$v391?> >L &nbsp;
										<input type="radio" title="Tidak Lulus" name="617" value="TL" <?=$v392?> >TL
										</td>
									</tr>
									<tr>
										<td>h.</td><td>Engine Break / Rem Gas Buang</td>
										<td align="center"><small><b><i>ada & berfungsi</i></b></small></td>
										<td align="center">
										<?php
											$h40=$this->prapengujianmodel->getHasilUjiFisik($no_BAP,'618','hasil');
											if($h40=="TL"){ $v402="checked"; }else{ $v401="checked"; }
										?>
										<input type="radio" title="Lulus" name="618" value="L" <?=$v401?> >L &nbsp;
										<input type="radio" title="Tidak Lulus" name="618" value="TL" <?=$v402?> >TL
										</td>
									</tr>
								</table>
							</div>
							</fieldset>
						
							<div class="form-action clearfix" align="right" style="margin:10px 0 0 0;">
								<button class="button" style="width:90px; height:30px" type="submit" data-icon-primary="ui-icon-circle-check">Simpan</button>
								<button type="button" onClick="location.href='<?=base_url()?>index.php/prapengujian';" class="button" style="width:90px; height:30px" data-icon-primary="ui-icon-circle-close">Batal</button>
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
