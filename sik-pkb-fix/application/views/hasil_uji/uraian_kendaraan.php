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
						<h2>Data Uraian Kendaraan</h2>
					</header>
					<section class="container_6 clearfix" style="margin-top:-30px;">
						<div class="grid_6 leading">

						<form class="form has-validation" action="#" method="post">
						<?php $tData=count($dataHasil); ?>
						<input type="hidden" name="tData" value="<?=$tData?>">	
						<input type="hidden" name="no_uji" value="<?=$no_uji?>">
						<input type="hidden" name="no_daftar" value="<?=$no_daftar?>">
						<table width="100%">
						<tr>
							<td>
								<fieldset style="margin:5px 5px 5px 5px;">
								<legend>Ukuran Utama</legend>
								<?php
									foreach($dataHasil as $a)
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
								<?php
									foreach($dataHasil as $b)
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
								<?php
									foreach($dataHasil as $c)
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
								<?php
									foreach($dataHasil as $d)
									{
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
								<?php
									foreach($dataHasil as $e)
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
									<td><label>Jumlah Berat Yang diperbolehkan (JBB)</label></td>
									<td><input type="text" style="width:50px" name="pb5"  value="<?=$pb5?>" readonly="true"  /> kg</td>
								</tr>
								<tr>
									<td><label>Jumlah Berat Kombinasi Yang diperbolehkan (JBKB)</label></td>
									<td><input type="text" style="width:50px" name="pb6"  value="<?=$pb6?>" readonly="true"  /> kg</td>
								</tr>
								</table>
							</fieldset>	
							</td>
							<td>
							<fieldset style="margin:5px 5px 5px 5px;">
								<legend>Berat Kosong</legend>
								<?php
									foreach($dataHasil as $f)
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
								<?php
									foreach($dataHasil as $g)
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
													<td>Jumlah Berat Yang diijinkan (JBI)</td>
													<td><input type="text" style="width:100px" name="da3" value="<?=$da3?>" readonly="true"  /> kg</td>
												</tr>
												<tr>
													<td>Jumlah Berat Kombinasi Yang diijinkan (JBKI)</td>
													<td><input type="text" style="width:100px" name="da4" value="<?=$da4?>" readonly="true"  /> kg</td>
												</tr>
												<tr>
													<td>Muatan Sumbu Terberat (MST)</td>
													<td><input type="text" style="width:100px" name="da5" value="<?=$da5?>" readonly="true"  /> kg</td>
												</tr>
												<tr>
													<td>Kelas Jalan Terendah yang Boleg dilalui</td>
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