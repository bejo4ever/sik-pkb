<!DOCTYPE html>
<html lang="en">

<head>

	<script type="text/javascript" src="<?= base_url(); ?>js/global.js"></script>

</head>

<body style="overflow: hidden;">

          <form class="form has-validation" id="formAdd" action="<?=base_url()?>index.php/penguji/sertifikat_save" method="post">
			
            <label for="niptxt" class="form-label">N I P <em>*</em></label>
			<div class="form-input">
			<input type="text" style="width:190px" id="niptxt" name="niptxt" required="required" disabled="disabled" value="<?= $nip_penguji; ?>"/>
			</div>
            <label for="nrptxt" class="form-label">N R P <em>*</em></label>
			<div class="form-input">
			<input type="text" style="width:190px" id="nrptxt" name="nrptxt" required="required" disabled="disabled" value="<?= $nrp; ?>"/>
			</div>
			<label for="txt_sertifikat" class="form-label">Nama Pegawai <em>*</em></label>
			<div class="form-input">
			<input type="text" style="width:190px" id="txt_sertifikat" name="txt_sertifikat" disabled="disabled" required="required" value="<?= $nama_penguji; ?>"/>
			</div>
            <input type="hidden" style="width:190px" id="nrp" name="nrp" required="required" value="<?= $nrp; ?>"/>
			
			<label for="no_sertifikat" class="form-label">No. Sertifikat <em>*</em></label>
			<div class="form-input">
			<input type="text" style="width:190px" id="no_sertifikat" name="no_sertifikat" required="required" />
			</div>
			<label for="tgl_terbit" class="form-label">Tgl. Terbit <em>*</em></label>
			<div class="form-input">
			<input type="date" style="width:190px" id="tgl_terbit" name="tgl_terbit" required="required" />
			</div>
			<label for="lembaga_penerbit" class="form-label">Lembaga Penerbit <em>*</em></label>
			<div class="form-input">
			<input type="text" style="width:190px" id="lembaga_penerbit" name="lembaga_penerbit" required="required" />
			</div>
			
			<label for="jenis_sertifikat" class="form-label">Jenis Sertifikasi <em>*</em></label>
			<div class="form-input">
			<input type="text" style="width:190px" id="jenis_sertifikat" name="jenis_sertifikat" required="required" />
			</div>
            <br/>
			<div class="form-action clearfix" align="right" style="padding-right:20px">
					<button class="button" type="submit" data-icon-primary="ui-icon-circle-check">Simpan</button>
					<button class="button" type="button" onClick="$('#addSertifikat' ).dialog('close');">Batalkan</button>
				</div>
		</form>

</body>

</html>