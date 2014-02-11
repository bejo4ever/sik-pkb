<!DOCTYPE html>

<html lang="en">

<head>
	<?= $inc; ?>
	<style>
		table { font-size:11px; }
	</style>

	<script>
	// increase the default animation speed to exaggerate the effect
	var ajax_load = '<br /><br /><center><img src="<?=base_url()?>images/loading.gif"></center>';

	function retribusi()
	{
		$.fx.speeds._default = 1000;
		$(function() {
			$( "#addForm" ).dialog({
			autoOpen: false,
			width: 300,
			show: "fade",
			hide: "fade",
			modal: true,
			buttons:{ "Selesai": function() { $( this ).dialog( "close" ); }}})
			$( "#addForm" ).dialog( "open" );
		});
	}

	function hitung(nilai,tipe)
	{
		var jumlah	= document.getElementById('jumlah_bayar').value;
		if(tipe=="tambah")
		{
			var total	= parseInt(jumlah)+parseInt(nilai);
		}
		else if(tipe=="kurangi")
		{
			var total	= parseInt(jumlah)-parseInt(nilai);
		}
		document.getElementById('jumlah_bayar').value	= total;	
	}
	</script>
</head>

<body style="overflow: hidden;">

	<?php $userId=$this->session->userdata('userid'); ?>

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
			<?= $submenu2; ?>
			<div class="main-content">

				<header>
					<h2>Pendaftaran Uji Berkala</h2>
				</header>

				<section style="margin-top:-20px;"  class="container_6 clearfix">
				<div class="grid_6 leading">
				<form class="form has-validation" action="<?=base_url()?>index.php/pendaftaran/getDataKendaraan" method="post">
					<div align="right" style="margin:-25px 5px 5px 0;">
						Nomor SRUT :&nbsp; <input type="text" style="width:120px" name="no_srut" value="<?=$no_srut?>" title="Tekan Enter Setelah Mengisi Nomor SRUT" />
					</div>
				</form>
								
				<form class="form has-validation" action="<?=base_url()?>index.php/pendaftaran/simpanPendaftaranBerkala" method="post">			
					<input type="hidden" name="no_srut" value="<?=$no_srut?>">
					<fieldset style="width:47%; float:left; position:relative; margin:0 15px 5px 0;">
					<legend align="left">Identitas Kendaraan</legend>
					<div class="clearfix">
						<table width="100%">
							<tr height="30px">
								<td>Nomor Uji Berkala <em>*</em></td>
								<td><input type="text" style="width:150px" name="no_uji" required="required" value="<?=$noUji?>" /></td>
							</tr>
							<tr height="30px">
								<td>Masa Uji Berkala</td>
								<td><input type="date" style="width:100px" name="tgl_uji" value="<?=$tgl_uji?>" /></td>
							</tr>
							<tr height="30px">
								<td>Nomor Kendaraan <em>*</em></td>
								<td><input type="text" style="width:150px" name="no_kend" required="required" value="<?=$no_kend?>" /></td>
							</tr>
							<tr height="30px">
								<td>Merek <em>*</em></td>
								<td><input type="text" style="width:150px" name="merek" required="required" value="<?=$merek?>" /></td>
							</tr>
							<tr height="30px">
								<td>Tipe <em>*</em></td>
								<td><input type="text" style="width:150px" name="tipe" required="required" value="<?=$tipe?>" /></td>
							</tr>
							<tr height="30px"><td>Subjenis Kendaraan</td>
								<td>
								<select name="jenisK">
									<?php foreach($jenisKend as $dat): ?>
									<?php if($dat->id_jeniskendaraan==$JK){ $rowsA="selected"; }else{ $rowsA=""; } ?>
										<option value="<?=$dat->id_jeniskendaraan?>" <?=$rowsA?> > <?=$dat->detail?> </option>
									<?php endforeach; ?>
								</select>
								</td>
							</tr>
							<tr height="30px">
								<td>Isi Silinder <em>*</em></td>
								<td><input type="text" style="width:100px" name="silinder" required="required" value="<?=$silinder?>" /> cc</td>
							</tr>
							<tr height="30px">
								<td>Daya Motor <em>*</em></td>
								<td><input type="text" style="width:100px" name="daya" required="required" value="<?=$daya_motor?>" /> <?=$satuan_daya?></td>
							</tr>
							<tr height="30px">
								<td>Bahan Bakar</td>
								<td>
								<select name="bahan_bakar">
									<option value="Bensin">Bensin</option>
									<option value="Solar">Solar</option>
									<option value="Gas">Gas</option>
								</select>
								</td>
							</tr>
							<tr height="30px">
								<td>Tahun Pembuatan <em>*</em></td>
								<td><input type="text" style="width:100px" name="tahun_buat" required="required" value="<?=$thnBuat?>" /></td>
							</tr>
							<tr height="30px">
								<td>Status Penggunaan</td>
								<td>
								<select name="penggunaan">
									<?php foreach($tipeKend as $dat2): ?>
									<?php if($dat2->id_tipekendaraan==$SP){ $rowsB="selected"; }else{ $rowsB=""; } ?>
										<option value="<?=$dat2->id_tipekendaraan?>" <?=$rowsB?> > <?=$dat2->detail?> </option>
									<?php endforeach; ?>
								</select>
								</td>
							</tr>
							<tr height="30px">
								<td>Nomor Rangka Landasan <em>*</em></td>
								<td><input type="text" style="width:150px" name="chasis" required="required" value="<?=$chassis?>" /></td>
							</tr>
							<tr height="30px">
								<td>Nomor Mesin <em>*</em></td>
								<td><input type="text" style="width:150px" name="no_mesin" required="required" value="<?=$noMesin?>" /></td>
							</tr>
							<tr height="30px">
								<td>Nomor Uji Tipe <em>*</em></td>
								<td><input type="text" style="width:150px" name="no_ujitipe" required="required" value="<?=$no_ujitipe?>" /></td>
							</tr>
							<tr height="30px">
								<td>Tanggal Uji Tipe</td>
								<td><input type="date" style="width:100px" name="tgl_ujitipe" value="<?=$tgl_ujitipe?>" /></td>
							</tr>
						</table>
					</div>
					</fieldset>
								
					<center>
					<fieldset style="margin:0px 0 0px 10px; width:43%;">
					<legend align="left">Pemilik Kendaraan</legend>
					<div class="clearfix">
						<table width="100%">
							<tr height="30px"><td>Nama Pemilik <em>*</em></td>
								<td><input type="text" style="width:200px" name="pemilik" required="required" value="<?=$pemilik?>" /></td>
							</tr>
							<tr height="30px"><td>Kartu Identitas Diri <em>*</em></td>
								<td><input type="text" style="width:150px" name="id_card" required="required" value="<?=$idCard?>" /></td>
							</tr>
							<tr height="30px"><td>Alamat <em>*</em></td>
								<td><input type="text" style="width:250px" name="alamat" required="required" value="<?=$alamat?>"></td>
							</tr>
							<tr height="30px"><td>Kabupaten / Kota</td>
								<td>
								<select name="kota">
									<?php foreach($kota as $dkota): ?>
									<?php if($dkota->kode_kabkota==$KK){ $rowsC="selected"; }else{ $rowsC=""; } ?>
										<option value="<?=$dkota->kode_kabkota?>" <?=$rowsC?>> <?=$dkota->nama_kabkota?> </option>
									<?php endforeach; ?>
								</select>
								</td>
							</tr>
							<tr height="30px"><td>Nomor Telepon</td>
								<td><input type="text" name="telp" style="width:150px" value="<?=$no_telp?>"></td>
							</tr>
							<tr height="30px"><td>Nomor HP</td>
								<td><input type="text" name="hp" style="width:150px" value="<?=$no_hp?>"></td>
							</tr>
							<tr height="30px"><td>Alamat Email</td>
								<td><input type="text" name="email" style="width:150px" value="<?=$email?>"></td>
							</tr>										
						</table>
					</div>
					</fieldset>
							
					<fieldset style="margin:10px 0 0px 20px; width:43%;">
					<legend align="left">Biaya Retribusi</legend>
					<div class="clearfix" align="center">
						<table style="font-size:12px" width="100%">
							<tr>
							<?php foreach($dRetribusi as $dat2): ?>
							<?php $i=$i+1; ?>
								<td width="50%"><input type="checkbox" name="retribusi[]" onClick="if(this.checked){ hitung('<?=$dat2->nilai?>','tambah');}else{ hitung('<?=$dat2->nilai?>','kurangi'); }" value="<?=$dat2->kd_retribusi?>"  > <?=$dat2->deskripsi?> </td>
							<?php if($i%2==0){ echo "</tr><tr>"; } ?>
							<?php endforeach; ?>
							</tr>
							<tr>
								<td colspan="2" align="right">
								<label style="margin-right:25px; font-size:11px;">Jumlah Dibayar <em>*</em></label>
									<input type="text" name="jumlah_bayar" id="jumlah_bayar" readonly="true" value="0" required="required" style="width:100px">
								</td>
							</tr>
						</table>
					</div>
					</fieldset>
					</center>
					<br>

					<div class="form-action clearfix" align="right" style="padding-right:10px">
						<button class="button" type="submit" data-icon-primary="ui-icon-circle-check">Daftar</button>
						<button class="button" type="button" data-icon-primary="ui-icon-circle-close" onClick="location.href='<?= base_url() ?>index.php/pendaftaran';">Batal</button>
					</div>

				</form>
				</div>
				</section >  

			</div> 
			</section> 
			<!-- Main Section End -->

		</div> 
		</section> 

	</div> 
    <?= $footer; ?>

</body>

</html>
