<!DOCTYPE html>

<html lang="en">

<head>

	<script type="text/javascript" src="<?= base_url(); ?>js/global.js"></script>

</head>

<body style="overflow: hidden;">

							<!-- ========== Forms Section ============= -->
                            <form class="form has-validation" action="<?= base_url() ?>index.php/kabkota/konfirmUpdateData" method="post">
							 <table width="100%">
                             <?php foreach($fields as $m): ?>
							  <input type="hidden" name="kode_sblmnya" id="kode_sblmnya" required="required" style="width:200px" value="<?= $m->kode_kabkota; ?>"/>
								<tr><td colspan="2">
									<div class="clearfix">
										<label for="kode_provinsi" class="form-label">Nama Provinsi <em>*</em></label>
										<div class="form-input">
										<select name="kode_provinsi" id="kode_provinsi">
                                            <option value="" selected="selected"> -- Daftar Provinsi --&nbsp;&nbsp;</option>
                                            <?php foreach($prov as $s): ?>
                                            <?php if($m->kode_provinsi==$s->kode_provinsi){ $style="selected"; }else{ $style=""; } ?>
                                            <option value="<?=$s->kode_provinsi?>" <?=$style?> ><?=$s->nama_provinsi?></option>
                                            <?php endforeach; ?>
                                        </select>
										</div>
									</div>
								</td></tr>
                                
                                <tr><td colspan="2">
									<div class="clearfix">
										<label for="kode" class="form-label">Kode Kab/Kota <em>*</em></label>
										<div class="form-input">
										<input type="text" name="kode" id="kode" required="required" style="width:200px" value="<?= $m->kode_kabkota; ?>"/>
										</div>
									</div>
								</td></tr>
								
								<tr><td colspan="2">
									<div class="clearfix">
										<label for="nama_provinsi" class="form-label">Nama Kab/Kota <em>*</em></label>
										<div class="form-input"><textarea rows="3" name="nama_kabkota" id="nama_kabkota" required="required" style="width:300px" ><?= $m->nama_kabkota; ?></textarea></div>
									</div>
								</td></tr>
																								
								<tr><td colspan="2">
                                            <div class="form-action clearfix" align="right" style="padding-right:20px">

                                                <button class="button" type="submit" data-icon-primary="ui-icon-circle-check">Update</button>
								
                                                <button class="button" type="button" onClick="$('#editForm' ).dialog('close');">Batal</button>

                                            </div>
                               
								</td></tr>
								<?php endforeach; ?>
								</table>
								</form>
								 <!-- End Forms Section -->
                            

</body>

</html>