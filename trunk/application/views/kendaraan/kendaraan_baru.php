<!DOCTYPE html>

<html lang="en">

<head>
	<script type="text/javascript" src="<?=base_url()?>js/global.js"></script>
	<style>
		table { font-size:11px; }
	</style>
</head>

<body style="overflow: hidden;">    

	<form class="form has-validation" action="<?=base_url()?>index.php/kendaraan/simpanKendaraanBaru" method="post" enctype="multipart/form-data">			

		<table width="100%">
			<tr align="center">
			<td width="50%">				 
				<fieldset style="width:90%">
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
							<td><input type="text" style="width:150px" name="merek" required="required" /></td>
						</tr>
						<tr height="30px">
							<td>Tipe <em>*</em></td>
							<td><input type="text" style="width:150px" name="tipe" required="required" /></td>
						</tr>
						<tr height="30px"><td>Sub-jenis Kendaraan</td>
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
						<tr height="30px">
							<td>Tanggal Uji Pertama <em>*</em></td>
							<td><input type="date" style="width:100px" name="tgl_ujipertama" required="required" /></td>
						</tr>
						<tr height="30px">
							<td>Tanggal Uji Berikut <em>*</em></td>
							<td><input type="date" style="width:100px" name="tgl_ujiberikut" required="required" /></td>
						</tr>
					</table>
				</div>
				</fieldset>
			</td>
			<td>	
				<fieldset style="width:90%">
				<legend align="left">Pemilik Kendaraan</legend>
				<div class="clearfix">
					<table width="100%">
						<tr height="30px"><td>Nama Pemilik <em>*</em></td>
							<td><input type="text" style="width:200px" name="pemilik" required="required" /></td>
						</tr>
						<tr height="30px"><td>No. Identitas Diri <em>*</em></td>
							<td><input type="text" style="width:150px" name="id_card" required="required" /></td>
						</tr>
						<tr height="30px"><td>Alamat <em>*</em></td>
							<td><input type="text" style="width:250px" name="alamat" required="required"></td>
						</tr>
						<tr height="30px"><td>Kabupaten / Kota</td>
							<td>
							<select name="kota">
								<option>-- Pilih Kota --</option>
								<?php foreach($kota as $dKota)
								{
									echo "<option value='$dKota->kode_kabkota'>$dKota->nama_kabkota</option>";
								}
								?>
							</select>
							</td>
						</tr>
						<tr height="30px"><td>Nomor Telepon</td>
							<td><input type="text" name="telp" style="width:150px"></td>
						</tr>
						<tr height="30px"><td>Nomor HP</td>
							<td><input type="text" name="hp" style="width:150px"></td>
						</tr>
						<tr height="30px"><td>Alamat Email</td>
							<td><input type="text" name="email" style="width:150px"></td>
						</tr>								
					</table>
				</div>
				</fieldset>
		
				<br>
				<fieldset style="width:90%">
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
			</td>
			</tr>
		</table>
		
		<div class="form-action clearfix" align="right" style="margin-right:10px;">
			<button class="button" style="width:80px; height:30px" type="submit" data-icon-primary="ui-icon-circle-check">Simpan</button>
			<button class="button" style="width:80px; height:30px" type="button" data-icon-primary="ui-icon-circle-close" onClick="$('#addForm' ).dialog('close');">Batal</button>
		</div>
			
	</form>

</body>

</html>
