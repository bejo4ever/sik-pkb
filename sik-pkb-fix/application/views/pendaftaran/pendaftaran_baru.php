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

	<?php $userId=$this->session->userdata('userid');?>

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
					<h2>Pendaftaran Uji Baru </h2>
				</header>

				<section style="margin-top:-30px;"  class="container_6 clearfix">
				<div class="grid_6 leading">
				<form class="form has-validation" action="<?=base_url()?>index.php/pendaftaran/simpanPendaftaranBaru" method="post" enctype="multipart/form-data">			

					<fieldset style="width:47%; float:left; position:relative; margin:0 15px 5px 0;">
					<legend align="left">Identitas Kendaraan</legend>
					<div class="clearfix">
						<table width="100%">
							<tr height="30px">
								<td>Nomor Uji <em>*</em></td>
								<td><input type="text" style="width:150px" name="no_uji" required="required" /></td>
							</tr>
							<tr height="30px">
								<td>Nomor Kendaraan <em>*</em></td>
								<td><input type="text" style="width:150px" name="no_kend" required="required" /></td>
							</tr>
							<tr height="30px">
								<td>Merek <em>*</em></td>
								<td><input type="text" style="width:200px" name="merek" required="required" /></td>
							</tr>
							<tr height="30px">
								<td>Tipe <em>*</em></td>
								<td><input type="text" style="width:150px" name="tipe" required="required" /></td>
							</tr>
							<tr height="30px"><td>Jenis Kendaraan</td>
								<td>
								<select name="jenisK">
									<?php foreach($jenisKend as $dat): ?>
										<option value="<?=$dat->id_jeniskendaraan?>"> <?=$dat->detail?> </option>
									<?php endforeach; ?>
								</select>
								</td>
							</tr>
							<tr height="30px">
								<td>Isi Silinder <em>*</em></td>
								<td><input type="text" style="width:100px" name="silinder" required="required" /> cc</td>
							</tr>
							<tr height="30px">
								<td>Daya Motor <em>*</em></td>
								<td><input type="text" style="width:100px" name="daya" required="required" />
								<select name="satuan_daya">
									<option>kW</option>
									<option>PS</option>
									<option>HP</option>
								</select>
								</td>
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
								<td><input type="text" style="width:100px" name="tahun_buat" required="required" /></td>
							</tr>
							<tr height="30px">
								<td>Status Penggunaan</td>
								<td>
								<select name="penggunaan">
									<?php foreach($tipeKend as $dat2): ?>
										<option value="<?=$dat2->id_statuskendaraan?>"> <?=$dat2->detail?> </option>
									<?php endforeach; ?>
								</select>
								</td>
							</tr>
							<tr height="30px">
								<td>Nomor Rangka Landasan <em>*</em></td>
								<td><input type="text" style="width:150px" name="chasis" required="required" /></td>
							</tr>
							<tr height="30px">
								<td>Nomor Mesin <em>*</em></td>
								<td><input type="text" style="width:150px" name="no_mesin" required="required" /></td>
							</tr>
							<tr height="30px">
								<td>Nomor Uji Tipe <em>*</em></td>
								<td><input type="text" style="width:150px" name="no_ujitipe" required="required" /></td>
							</tr>
							<tr height="30px">
								<td>Tanggal Uji Tipe</td>
								<td><input type="date" style="width:100px" name="tgl_ujitipe" /></td>
							</tr>
							<tr height="30px">
								<td>Nomor SRUT <em>*</em></td>
								<td><input type="text" style="width:150px" name="no_srut" required="required" /></td>
							</tr>
							<tr height="30px">
								<td>Tanggal SRUT</td>
								<td><input type="date" style="width:100px" name="tgl_srut" /></td>
							</tr>
						</table>
					</div>
					</fieldset>

					<fieldset style="width:47%; float:left; position:relative; margin:0 15px 5px 0;">
					<legend align="left">Foto Kendaraan</legend>
					<div class="clearfix">
						<table width="100%">
							<tr height="30px">
								<td>Tampak Depan</td><td><input type="file" name="image1"></td>
							</tr>
							<tr height="30px">
								<td>Tampak Belakang</td><td><input type="file" name="image2"></td>
							</tr>
							<tr height="30px">
								<td>Tampak Kanan</td><td><input type="file" name="image3"></td>
							</tr>
							<tr height="30px">
								<td>Tampak Kiri</td><td><input type="file" name="image4"></td>
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
								<td><input type="text" style="width:200px" name="pemilik" required="required" /></td>
							</tr>
							<tr height="30px"><td>Kartu Identitas Diri <em>*</em></td>
								<td><input type="text" style="width:150px" name="id_card" required="required" /></td>
							</tr>
							<tr height="30px"><td>Alamat <em>*</em></td>
								<td><input type="text" style="width:250px" name="alamat" required="required"></td>
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
								<td><input type="text" name="telp" style="width:150px"></td>
							</tr>
							<tr height="30px"><td>Nomor HP</td>
								<td><input type="text" name="hp" style="width:150px"></td>
							</tr>
							<tr height="30px"><td>Email</td>
								<td><input type="text" name="email" style="width:150px"></td>
							</tr>										
						</table>
					</div>
					</fieldset>
							
					<fieldset style="margin:10px 0 0px 30px; width:43%;">
					<legend align="left">Biaya Retribusi</legend>
					<div class="clearfix" align="center">
						<table style="font-size:11px" width="100%">
							<tr>
							<?php foreach($dRetribusi as $dat2): ?>
							<?php $i=$i+1; ?>
								<td width="50%"><input type="checkbox" name="retribusi[]" onClick="if(this.checked){ hitung('<?=$dat2->nilai?>','tambah');}else{ hitung('<?=$dat2->nilai?>','kurangi'); }" value="<?=$dat2->kd_retribusi?>"  > <?=$dat2->deskripsi?> </td>
							<?php if($i%2==0){ echo "</tr><tr>"; } ?>
							<?php endforeach; ?>
							</tr>
							<tr>
								<td colspan="2" align="right">
								<label style="margin-right:30px; font-size:11px;">Jumlah Dibayar <em>*</em></label>
								<input type="text" name="jumlah_bayar" id="jumlah_bayar" readonly="true" value="0" required="required" style="width:100px; text-align:right"></td>
							</tr>
						</table>
					</div>
					</fieldset>
					</center>

					<br>
					<div class="form-action clearfix" align="right" style="margin-right:10px;">
						<button class="button" style="width:70px; height:30px" type="submit" data-icon-primary="ui-icon-circle-check">Daftar</button>
						<button class="button" style="width:70px; height:30px" type="button" data-icon-primary="ui-icon-circle-close" onClick="location.href='<?= base_url() ?>index.php/pendaftaran';">Batal</button>
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
