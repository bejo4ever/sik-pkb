<!DOCTYPE html>
<html lang="en">

<head>

	<script type="text/javascript" src="<?= base_url(); ?>js/global.js"></script>

</head>

<body style="overflow: hidden;">

          <form class="form has-validation" id="editForm" action="<?=base_url()?>index.php/penguji/riwayat_editsave" method="post">
		  
		  <?php foreach ($fields as $m): ?>
			
			<div class="form-input">
			<input type="hidden" style="width:190px" name="kd_riwayat" required="required" value="<?= $m->kd_riwayat; ?>"/>
			</div>
			<label for="no_sertifikat" class="form-label">Periode <em>*</em></label>
			<div class="form-input">
			<input type="text" style="width:190px" id="periode" name="periode" required="required" value="<?= $m->periode; ?>"/>
			</div>
			<label for="tgl_terbit" class="form-label">Keterangan <em>*</em></label>
			<div class="form-input">
			<textarea name="keterangan" rows="3"><?= $m->keterangan; ?></textarea>
			</div>
			<div class="form-action clearfix" align="right" style="padding-right:20px">
				<button class="button" type="submit" data-icon-primary="ui-icon-circle-check">Update</button>
                <button class="button" type="button" onClick="$('#editRiwayat' ).dialog('close');">Batalkan</button>
				</div>
				
			<?php endforeach; ?>
		</form>

</body>

</html>