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
						<h2>Data Hasil Uji Mekanis</h2>
					</header>
					<section class="container_6 clearfix" style="margin-top:-30px;">
						<div class="grid_6  clearfix">

						<form class="form has-validation" action="#" method="post">
						<?php $tData=count($this->pengujianmodel->getHasilUjiFisik($no_daftar,'711')); ?>
						<input type="hidden" name="tData" value="<?=$tData?>">			
						<input type="hidden" name="no_uji" value="<?=$no_uji?>">
						<input type="hidden" name="no_daftar" value="<?=$no_daftar?>">
						<!--<table width="100%">
			<tr>
			<td width="50%">-->
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
						<select name="penguji_7">
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
					<!--<td rowspan="2"><small><b><i>(Ketebalan Asap)</i></b></small></td>-->
					<td align="center" width="23%"><small><b><i>< <?=date('Y')-1?> 70 %, > <?=date('Y')-1?> 50 %</i></b></small></td>
					<td align="right" width="25%"><input type="text" name="811" style="width:50px" value="<?=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'811')?>" readonly="true" > %&nbsp;&nbsp;&nbsp;</td>
					<td rowspan="2" width="17%" align="center">
						<?php
							$penguji2=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'811','penguji');
						?> 
						<select name="penguji_8">
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
						HCL = <input type="text" name="822" style="width:50px" value="<?=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'822')?>" readonly="true" > Ppm</td>
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
						<input type="radio" title="Lulus" name="911" value="L" <?=$v11?> >L &nbsp;
						<input type="radio" title="Tidak Lulus" name="911" value="TL" <?=$v12?> >TL
					</td>
					<td rowspan="7" width="17%" align="center">
						<?php
							$penguji3=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'911','penguji');
						?> 
						<select name="penguji_9">
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
							$h3=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'913','hasil');
							if($h3=="L"){ $v31="checked"; }else{ $v32="checked"; }
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
							$h4=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'914','hasil');
							if($h4=="L"){ $v41="checked"; }else{ $v42="checked"; }
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
							$h5=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'915','hasil');
							if($h5=="L"){ $v51="checked"; }else{ $v52="checked"; }
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
							$h6=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'916','hasil');
							if($h6=="L"){ $v61="checked"; }else{ $v62="checked"; }
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
							$h7=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'917','hasil');
							if($h7=="L"){ $v71="checked"; }else{ $v72="checked"; }
						?>
						<input type="radio" title="Lulus" name="917" value="L" <?=$v71?> >L &nbsp;
						<input type="radio" title="Tidak Lulus" name="917" value="TL" <?=$v72?> >TL
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
					Kanan <input type="text" name="1012" style="width:50px" value="<?=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'1012')?>" readonly="true" > cd&nbsp;</td>
					<td width="17%" rowspan="3" align="center">
						<?php
							$penguji4=$this->pengujianmodel->getHasilUjiFisik($no_daftar,'1011','penguji');
						?>
						<select name="penguji_10">
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
			
			<!--</td><td>-->
			
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
						<select name="penguji_11">
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
						<select name="penguji_12">
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
						<select name="penguji_13">
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
					<td>Efisiensi rem parkir (Hpb)</td>
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
						<select name="penguji_14">
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