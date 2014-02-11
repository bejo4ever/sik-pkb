<!DOCTYPE html>
<html lang="en">

<head>

	<script type="text/javascript" src="<?= base_url(); ?>js/global.js"></script>

</head>

<body style="overflow: hidden;">

          <form class="form has-validation" id="editForm" action="<?=base_url()?>index.php/penguji/sertifikat_editsave" method="post">
		  
		  <?php foreach ($fields as $m): ?>
			
			<div class="form-input">
			<input type="hidden" style="width:190px" id="sertifikat_sblmnya" name="sertifikat_sblmnya" required="required" value="<?= $m->no_sertifikat; ?>"/>
			</div>
			<label for="no_sertifikat" class="form-label">No. Sertifikat <em>*</em></label>
			<div class="form-input">
			<input type="text" style="width:190px" id="no_sertifikat" name="no_sertifikat" required="required" value="<?= $m->no_sertifikat; ?>"/>
			</div>
			<label for="tgl_terbit" class="form-label">Tgl. Terbit <em>*</em></label>
			<div class="form-input">
			<input type="date" style="width:190px" id="tgl_terbit" name="tgl_terbit" required="required" value="<?= $m->tgl_terbit; ?>"/>
			</div>
			<label for="lembaga_penerbit" class="form-label">Lembaga Penerbit <em>*</em></label>
			<div class="form-input">
			<input type="text" style="width:190px" id="lembaga_penerbit" name="lembaga_penerbit" required="required" value="<?= $m->lembaga_penerbit; ?>"/>
			</div>
			
			<label for="jenis_sertifikat" class="form-label">Jenis Sertifikasi <em>*</em></label>
			<div class="form-input">
			<input type="text" style="width:190px" id="jenis_sertifikat" name="jenis_sertifikat" required="required" value="<?= $m->jenis_sertifikat; ?>"/>
			</div>
			<div class="form-action clearfix" align="right" style="padding-right:20px">
				<button class="button" type="submit" data-icon-primary="ui-icon-circle-check">Update</button>
                <button class="button" type="button" onClick="$('#editSertifikat' ).dialog('close');">Batalkan</button>
				</div>
				
			<?php endforeach; ?>
		</form>

</body>

</html>