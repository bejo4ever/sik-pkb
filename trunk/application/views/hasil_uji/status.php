<!DOCTYPE html>
<html lang="en">
<head>
	<?= $inc; ?>
	<style>
		table { font-size:10px; }
		table tr { height:35px; }
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
						<h2>Ubah Status Pengujian</h2>
					</header>
					<section class="container_6 clearfix" style="margin-top:-30px;">
						<div class="grid_6 leading">
						<form class="form has-validation" action="<?=base_url()?>index.php/hasiluji/simpanstatus" method="post">		
							<input type="hidden" name="no_uji" value="<?=$no_uji?>">
							<input type="hidden" name="no_daftar" value="<?=$no_daftar?>">
							<input type="hidden" name="no_bap" value="<?=$no_bap?>">
							<?php $tData=count($hasildata); ?>
							<input type="hidden" name="tData" value="<?=$tData?>">
							<?php foreach($hasildata as $dat)
							{
								$tgl		= $dat->tgl_pengujian;
								$dpenguji	= $dat->NRP;
								$verifikasi	= $dat->hasil_pengujian;
								$ket		= $dat->keterangan;
							}
							?>
						
							<fieldset style="margin:10px 0 5px 0;">
							<legend>Pengujian</legend>
							<table width="100%">
								<tr>
									<td width="20%">No. Pendaftaran</td>
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
									<td><input type="date" style="width:95px" name="tgl_periksa" value="<?=$tgl?>"/></td>
								</tr>
								<tr>
									<td>Penguji</td>
									<td>:</td>
									<td>
										<select name="penguji">
											<option value="">Pilih Penguji</option>
											<?php foreach($penguji as $p): ?>
											<?php if($dpenguji==$p->NRP){ $p1="selected"; }else{ $p1=""; } ?> 
											<option value="<?=$p->NRP?>" <?=$p1?> ><?=$p->nama_penguji?></option>
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
									<select name="hasil">
										<option value="">Pilih Hasil</option>
										<option value="lulus" <?=$s1?> >Lulus</option>
										<option value="tidak lulus" <?=$s2?>>Tidak Lulus</option>
									</select>
									</td>
								</tr>
								<tr>
									<td colspan="3">
									<p><b>Keterangan</b></p>
									<textarea name="ket" style="width:100%" rows="10"><?=$ket?></textarea>
									</td>
								</tr>
							</table>
							
							<div class="form-action clearfix" align="right" style="margin:10px 0 0 0;">
								<button class="button" style="width:90px; height:30px" type="submit" data-icon-primary="ui-icon-circle-check">Simpan</button>
								<button type="button" onClick="location.href='<?=base_url()?>index.php/hasiluji';" class="button" style="width:90px; height:30px"  data-icon-primary="ui-icon-circle-close">Batal</button>
							</div>
							</fieldset>
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