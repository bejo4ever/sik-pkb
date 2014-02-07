
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
		document.write("<div id='container'><p id='content'>" +
					   "<img id='loadinggraphic' width='16' height='16' src='<?= base_url() ?>images/ajax-loader-eeeeee.gif' /> " +
					   "Loading...</p></div>");
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
						<h2>Data Hasil Uji Fisik</h2>
					</header>
					<section class="container_6 clearfix" style="margin-top:-30px;">
						<div class="grid_6 leading">

						<form class="form has-validation" action="#" method="post">
						<?php $tData=count($this->pengujianmodel->getHasilUjiFisik($no_daftar,'111','hasil')); ?>
						<input type="hidden" name="tData" value="<?=$tData?>">			
						<input type="hidden" name="no_uji" value="<?=$no_uji?>">
						<input type="hidden" name="no_daftar" value="<?=$no_daftar?>">
						<!--<table width="100%">
            <tr>
				<td width="50%">-->
					
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
									<input type="radio" title="Lulus" name="111" value="L" <?=$v11?> >L &nbsp;
									<input type="radio" title="Tidak Lulus" name="111" value="TL" <?=$v12?> >TL
								</td>
								<td rowspan="2" align="center" width="17%">
								<?php
									$penguji1=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'112','penguji');
								?> 
									<select name="penguji_1">
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
									$h3=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'211','hasil');
									if($h3=="L"){ $v31="checked"; }else{ $v32="checked"; }
								?>
									<input type="radio" title="Lulus" name="211" value="L" <?=$v31?> >L &nbsp;
									<input type="radio" title="Tidak Lulus" name="211" value="TL" <?=$v32?> >TL
								</td>
								<td rowspan="4" align="center" width="17%">
								<?php
									$penguji2=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'211','penguji');
								?>  
									<select name="penguji_2">
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
									<input type="radio" title="Lulus" name="212" value="L" <?=$v41?> >L &nbsp;
									<input type="radio" title="Tidak Lulus" name="212" value="TL" <?=$v42?> >TL
								</td>
							</tr>
							<tr>
								<td>c.</td><td>Lampu Mundur</td>
								<td align="center">
								<?php
									$h5=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'213','hasil');
									if($h5=="L"){ $v51="checked"; }else{ $v52="checked"; }
								?>
									<input type="radio" title="Lulus" name="213" value="L" <?=$v51?> >L &nbsp;
									<input type="radio" title="Tidak Lulus" name="213" value="TL" <?=$v52?> >TL
								</td>
							</tr>
							<tr>
								<td>d.</td><td>Lampu Posisi</td>
								<td align="center">
								<?php
									$h6=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'214','hasil');
									if($h6=="L"){ $v61="checked"; }else{ $v62="checked"; }
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
								<td width="3%">a.</td><td width="25%">Kondisi rumah / body</td>
								<td width="30%" align="center" valign="middle"><small><b><i>Baik, tidak keropos</i></b></small></td>
								<td width="25%" align="center">
								<?php
									$h7=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'311','hasil');
									if($h7=="L"){ $v71="checked"; }else{ $v72="checked"; }
								?>
									<input type="radio" title="Lulus" name="311" value="L" <?=$v71?> >L &nbsp;
									<input type="radio" title="Tidak Lulus" name="311" value="TL" <?=$v72?> >TL
								</td>
								<td rowspan="3" align="center" width="17%"> 
								<?php
									$penguji3=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'311','penguji');
								?> 
									<select name="penguji_3">
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
									<input type="radio" title="Lulus" name="312" value="L" <?=$v81?> >L &nbsp;
									<input type="radio" title="Tidak Lulus" name="312" value="TL" <?=$v82?> >TL
								</td>
							</tr>
							<tr>
								<td>c.</td><td>Samb. tempelan/gandengan</td>
								<td align="center"><small><b><i>Tidak aus</i></b><b><i></small></td>
								<td align="center">
								<?php
									$h9=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'313','hasil');
									if($h9=="L"){ $v91="checked"; }else{ $v92="checked"; }
								?>
									<input type="radio" title="Lulus" name="313" value="L" <?=$v91?> >L &nbsp;
									<input type="radio" title="Tidak Lulus" name="313" value="TL" <?=$v92?> >TL
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
									<input type="radio" title="Lulus" name="411" value="L" <?=$v101?> >L &nbsp;
									<input type="radio" title="Tidak Lulus" name="411" value="TL" <?=$v102?> >TL
								</td>
								<td rowspan="6" align="center" width="17%">
								<?php
									$penguji4=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'411','penguji');
								?>  
									<select name="penguji_4">
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
									<input type="radio" title="Lulus" name="412" value="L" <?=$v111?> >L &nbsp;
									<input type="radio" title="Tidak Lulus" name="412" value="TL" <?=$v112?> >TL
								</td>
							</tr>
							<tr>
								<td>c.</td><td>Ukuran Ban Sumbu III</td>
								<td align="center">
								<?php
									$h12=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'413','hasil');
									if($h12=="L"){ $v121="checked"; }else{ $v122="checked"; }
								?>
									<input type="radio" title="Lulus" name="413" value="L" <?=$v121?> >L &nbsp;
									<input type="radio" title="Tidak Lulus" name="413" value="TL" <?=$v122?> >TL
								</td>
							</tr>
							<tr>
								<td>d.</td><td>Ukuran Ban Sumbu IV</td>
								<td align="center">
								<?php
									$h13=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'414','hasil');
									if($h13=="L"){ $v131="checked"; }else{ $v132="checked"; }
								?>
									<input type="radio" title="Lulus" name="414" value="L" <?=$v131?> >L &nbsp;
									<input type="radio" title="Tidak Lulus" name="414" value="TL" <?=$v132?> >TL
								</td>
							</tr>
							<tr>
								<td>e.</td><td>Kedalaman alur ban luar</td>
								<td align="center"><small><b><i>1 mm (min)</i></b><b><i></small></td>
								<td align="center">
								<?php
									$h14=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'415','hasil');
									if($h14=="L"){ $v141="checked"; }else{ $v142="checked"; }
								?>
									<input type="radio" title="Lulus" name="415" value="L" <?=$v141?> >L &nbsp;
									<input type="radio" title="Tidak Lulus" name="415" value="TL" <?=$v142?> >TL
								</td>
							</tr>
							<tr>
								<td>f.</td><td>Penguatan roda</td>
								<td align="center"><small><b><i>Tidak kendor</i></b><b><i></small></td>
								<td align="center">
								<?php
									$h15=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'416','hasil');
									if($h15=="L"){ $v151="checked"; }else{ $v152="checked"; }
								?>
									<input type="radio" title="Lulus" name="416" value="L" <?=$v151?> >L &nbsp;
									<input type="radio" title="Tidak Lulus" name="416" value="TL" <?=$v152?> >TL
								</td>
							</tr>
							</table>
						</div>
					</fieldset>
					
				<!--</td>
				<td>-->
				
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
									$h16=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'511','hasil');
									if($h16=="L"){ $v161="checked"; }else{ $v162="checked"; }
								?>
									<input type="radio" title="Lulus" name="511" value="L" <?=$v161?> >L &nbsp;
									<input type="radio" title="Tidak Lulus" name="511" value="TL" <?=$v162?> >TL
								</td>
								<td rowspan="21" align="center" width="17%"> 
								<?php
									$penguji5=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'511','penguji');
								?>
									<select name="penguji_5">
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
									<input type="radio" title="Lulus" name="512" value="L" <?=$v171?> >L &nbsp;
									<input type="radio" title="Tidak Lulus" name="512" value="TL" <?=$v172?> >TL
								</td>
							</tr>
							<tr>
								<td align="right"> -&nbsp;</td><td>Tinggi</td>
								<td align="center">
								<?php
									$h18=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'513','hasil');
									if($h18=="L"){ $v181="checked"; }else{ $v182="checked"; }
								?>
									<input type="radio" title="Lulus" name="513" value="L" <?=$v181?> >L &nbsp;
									<input type="radio" title="Tidak Lulus" name="513" value="TL" <?=$v182?> >TL
								</td>
							</tr>
							<tr>
								<td align="right"> -&nbsp;</td><td>Julur Depan (FOH)</td>
								<td align="center">
								<?php
									$h19=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'514','hasil');
									if($h19=="L"){ $v191="checked"; }else{ $v192="checked"; }
								?>
									<input type="radio" title="Lulus" name="514" value="L" <?=$v191?> >L &nbsp;
									<input type="radio" title="Tidak Lulus" name="514" value="TL" <?=$v192?> >TL
								</td>
							</tr>
							<tr>
								<td align="right"> -&nbsp;</td><td>Julur Belakang (ROH)</td>
								<td align="center">
								<?php
									$h20=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'515','hasil');
									if($h20=="L"){ $v201="checked"; }else{ $v202="checked"; }
								?>
									<input type="radio" title="Lulus" name="515" value="L" <?=$v201?> >L &nbsp;
									<input type="radio" title="Tidak Lulus" name="515" value="TL" <?=$v202?> >TL
								</td>
							</tr>
							<tr><td>b.</td><td colspan="3"><b>Jarak Sumbu</b></td></tr>
							<tr>
								<td align="right"> -&nbsp;</td><td>Sumbu I-II</td>
								<td rowspan="3" valign="middle"><small><b><i>Sesuai Buku Uji / Ketentuan</i></b><b><i></small></td>
								<td align="center">
								<?php
									$h21=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'521','hasil');
									if($h21=="L"){ $v211="checked"; }else{ $v212="checked"; }
								?>
									<input type="radio" title="Lulus" name="521" value="L" <?=$v211?> >L &nbsp;
									<input type="radio" title="Tidak Lulus" name="521" value="TL" <?=$v212?> >TL
								</td>
							</tr>
							<tr>
								<td align="right"> -&nbsp;</td><td>Sumbu II-III</td>
								<td align="center">
								<?php
									$h22=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'522','hasil');
									if($h22=="L"){ $v221="checked"; }else{ $v222="checked"; }
								?>
									<input type="radio" title="Lulus" name="522" value="L" <?=$v221?> >L &nbsp;
									<input type="radio" title="Tidak Lulus" name="522" value="TL" <?=$v222?> >TL
								</td>
							</tr>
							<tr>
								<td align="right"> -&nbsp;</td><td>Sumbu III-IV</td>
								<td align="center">
								<?php
									$h23=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'523','hasil');
									if($h23=="L"){ $v231="checked"; }else{ $v232="checked"; }
								?>
									<input type="radio" title="Lulus" name="523" value="L" <?=$v231?> >L &nbsp;
									<input type="radio" title="Tidak Lulus" name="523" value="TL" <?=$v232?> >TL
								</td>
							</tr>
							<tr><td>c.</td><td colspan="3"><b>Dimensi Bak Muatan</b></td></tr>
							<tr>
								<td align="right"> -&nbsp;</td><td>Panjang</td>
								<td rowspan="3" valign="middle"><small><b><i>Spesifikasi</i></b><b><i></small></td>
								<td align="center">
								<?php
									$h24=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'531','hasil');
									if($h24=="L"){ $v241="checked"; }else{ $v242="checked"; }
								?>
									<input type="radio" title="Lulus" name="531" value="L" <?=$v241?> >L &nbsp;
									<input type="radio" title="Tidak Lulus" name="531" value="TL" <?=$v242?> >TL
								</td>
							</tr>
							<tr>
								<td align="right"> -&nbsp;</td><td>Lebar</td>
								<td align="center">
								<?php
									$h25=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'532','hasil');
									if($h25=="L"){ $v251="checked"; }else{ $v252="checked"; }
								?>
									<input type="radio" title="Lulus" name="532" value="L" <?=$v251?> >L &nbsp;
									<input type="radio" title="Tidak Lulus" name="532" value="TL" <?=$v252?> >TL
								</td>
							</tr>
							<tr>
								<td align="right"> -&nbsp;</td><td>Tinggi</td>
								<td align="center">
								<?php
									$h26=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'533','hasil');
									if($h26=="L"){ $v261="checked"; }else{ $v262="checked"; }
								?>
									<input type="radio" title="Lulus" name="533" value="L" <?=$v261?> >L &nbsp;
									<input type="radio" title="Tidak Lulus" name="533" value="TL" <?=$v262?> >TL
								</td>
							</tr>
							<tr><td>d.</td><td colspan="3"><b>Dimensi Tangki</b></td></tr>
							<tr>
								<td align="right"> -&nbsp;</td><td>Panjang</td>
								<td rowspan="6" valign="middle"><small><b><i>Sesuai tera / Kapasitas</i></b><b><i></small></td>
								<td align="center">
								<?php
									$h27=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'541','hasil');
									if($h27=="L"){ $v271="checked"; }else{ $v272="checked"; }
								?>
									<input type="radio" title="Lulus" name="541" value="L" <?=$v271?> >L &nbsp;
									<input type="radio" title="Tidak Lulus" name="541" value="TL" <?=$v272?> >TL
								</td>
							</tr>
							<tr>
								<td align="right"> -&nbsp;</td><td>Lebar</td>
								<td align="center">
								<?php
									$h28=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'542','hasil');
									if($h28=="L"){ $v281="checked"; }else{ $v282="checked"; }
								?>
									<input type="radio" title="Lulus" name="542" value="L" <?=$v281?> >L &nbsp;
									<input type="radio" title="Tidak Lulus" name="542" value="TL" <?=$v282?> >TL
								</td>
							</tr>
							<tr>
								<td align="right"> -&nbsp;</td><td>Tinggi</td>
								<td align="center">
								<?php
									$h29=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'543','hasil');
									if($h29=="L"){ $v291="checked"; }else{ $v292="checked"; }
								?>
									<input type="radio" title="Lulus" name="543" value="L" <?=$v291?> >L &nbsp;
									<input type="radio" title="Tidak Lulus" name="543" value="TL" <?=$v292?> >TL
								</td>
							</tr>
							<tr>
								<td align="right"> -&nbsp;</td><td>Volume</td>
								<td align="center">
								<?php
									$h30=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'544','hasil');
									if($h30=="L"){ $v301="checked"; }else{ $v302="checked"; }
								?>
									<input type="radio" title="Lulus" name="544" value="L" <?=$v301?> >L &nbsp;
									<input type="radio" title="Tidak Lulus" name="544" value="TL" <?=$v302?> >TL
								</td>
							</tr>
							<tr>
								<td align="right"> -&nbsp;</td><td>Jenis Muatan</td>
								<td align="center">
								<?php
									$h31=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'545','hasil');
									if($h31=="L"){ $v311="checked"; }else{ $v312="checked"; }
								?>
									<input type="radio" title="Lulus" name="545" value="L" <?=$v311?> >L &nbsp;
									<input type="radio" title="Tidak Lulus" name="545" value="TL" <?=$v312?> >TL
								</td>
							</tr>
							<tr>
								<td align="right"> -&nbsp;</td><td>Berat Jenis Muatan</td>
								<td align="center">
								<?php
									$h32=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'546','hasil');
									if($h32=="L"){ $v321="checked"; }else{ $v322="checked"; }
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
								<td width="3%">a.</td><td width="25%">Penghapus kaca depan</td>
								<td valign="middle" align="center"><small><b><i>ada & berfungsi</i></b></small></td>
								<td width="25%" align="center">
								<?php
									$h33=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'611','hasil');
									if($h33=="L"){ $v331="checked"; }else{ $v332="checked"; }
								?>
									<input type="radio" title="Lulus" name="611" value="L" <?=$v331?> >L &nbsp;
									<input type="radio" title="Tidak Lulus" name="611" value="TL" <?=$v332?> >TL
								</td>
								<td rowspan="8" align="center" width="17%">
								<?php
									$penguji6=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'611','penguji');
								?> 
									<select name="penguji_6">
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
									<input type="radio" title="Lulus" name="612" value="L" <?=$v341?> >L &nbsp;
									<input type="radio" title="Tidak Lulus" name="612" value="TL" <?=$v342?> >TL
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
									<input type="radio" title="Lulus" name="613" value="L" <?=$v351?> >L &nbsp;
									<input type="radio" title="Tidak Lulus" name="613" value="TL" <?=$v352?> >TL
								</td>
							</tr>
							<tr>
								<td>d.</td><td>Alat - alat / kunci</td>
								<td align="center"><small><b><i>ada & lengkap</i></b></small></td>
								<td align="center">
								<?php
									$h36=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'614','hasil');
									if($h36=="L"){ $v361="checked"; }else{ $v362="checked"; }
								?>
									<input type="radio" title="Lulus" name="614" value="L" <?=$v361?> >L &nbsp;
									<input type="radio" title="Tidak Lulus" name="614" value="TL" <?=$v362?> >TL
								</td>
							</tr>
							<tr>
								<td>e.</td><td>Ban pengganti / cadangan</td>
								<td align="center"><small><b><i>ada</i></b></small></td>
								<td align="center">
								<?php
									$h37=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'615','hasil');
									if($h37=="L"){ $v371="checked"; }else{ $v372="checked"; }
								?>
									<input type="radio" title="Lulus" name="615" value="L" <?=$v371?> >L &nbsp;
									<input type="radio" title="Tidak Lulus" name="615" value="TL" <?=$v372?> >TL
								</td>
							</tr>
							<tr>
								<td>f.</td><td>Tanda segitiga pengaman</td>
								<td align="center"><small><b><i>ada & lengkap</i></b></small></td>
								<td align="center">
								<?php
									$h38=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'616','hasil');
									if($h38=="L"){ $v381="checked"; }else{ $v382="checked"; }
								?>
									<input type="radio" title="Lulus" name="616" value="L" <?=$v381?> >L &nbsp;
									<input type="radio" title="Tidak Lulus" name="616" value="TL" <?=$v382?> >TL
								</td>
							</tr>
							<tr>
								<td>g.</td><td>Sabuk keselamatan / kotak obat</td>
								<td align="center"><small><b><i>ada & berfungsi</i></b></small></td>
								<td align="center">
								<?php
									$h39=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'617','hasil');
									if($h39=="L"){ $v391="checked"; }else{ $v392="checked"; }
								?>
									<input type="radio" title="Lulus" name="617" value="L" <?=$v391?> >L &nbsp;
									<input type="radio" title="Tidak Lulus" name="617" value="TL" <?=$v392?> >TL
								</td>
							</tr>
							<tr>
								<td>h.</td><td>Engine break / rem gas buang</td>
								<td align="center"><small><b><i>ada & berfungsi</i></b></small></td>
								<td align="center">
								<?php
									$h40=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'618','hasil');
									if($h40=="L"){ $v401="checked"; }else{ $v402="checked"; }
								?>
									<input type="radio" title="Lulus" name="618" value="L" <?=$v401?> >L &nbsp;
									<input type="radio" title="Tidak Lulus" name="618" value="TL" <?=$v402?> >TL
								</td>
							</tr>
							</table>
						</div>
					</fieldset>
				<!--</td>
			</tr>
			</table>-->
						
				
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