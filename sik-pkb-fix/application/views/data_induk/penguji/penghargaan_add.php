<!DOCTYPE html>
<html lang="en">

<head>

	<script type="text/javascript" src="<?= base_url(); ?>js/global.js"></script>

</head>

<body style="overflow: hidden;">

          <form class="form has-validation" id="formAdd" action="<?=base_url()?>index.php/penguji/penghargaan_save" method="post">
			
            <label for="niptxt" class="form-label">N I P <em>*</em></label>
			<div class="form-input">
			<input type="text" style="width:190px" id="niptxt" name="niptxt" required="required" disabled="disabled" value="<?= $nip_penguji; ?>"/>
			</div>
            <label for="niptxt" class="form-label">N R P <em>*</em></label>
			<div class="form-input">
			<input type="text" style="width:190px" id="nrptxt" name="nrptxt" required="required" disabled="disabled" value="<?= $nrp; ?>"/>
			</div>
			<label for="txt_sertifikat" class="form-label">Nama Pegawai <em>*</em></label>
			<div class="form-input">
			<input type="text" style="width:190px" id="txt_sertifikat" name="txt_sertifikat" disabled="disabled" required="required" value="<?= $nama_penguji; ?>"/>
			</div>
            
			<input type="hidden" style="width:190px" id="nrp" name="nrp" required="required" value="<?= $nrp; ?>"/>
			
			<label for="no_sertifikat" class="form-label">Tahun <em>*</em></label>
			<div class="form-input">
			<input type="text" style="width:190px" id="tahun" name="tahun" required="required" />
			</div>
			<label for="tgl_terbit" class="form-label">Penghargaan <em>*</em></label>
			<div class="form-input">
			<textarea name="keterangan" rows="3"></textarea>
			</div>
            
			<div class="form-action clearfix" align="right" style="padding-right:10px">
					<button class="button" type="submit" data-icon-primary="ui-icon-circle-check">Simpan</button>
					<button class="button" type="button" onClick="$('#addPenghargaan' ).dialog('close');">Batalkan</button>
				</div>
		</form>

</body>

</html>