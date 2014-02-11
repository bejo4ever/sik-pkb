<!DOCTYPE html>

<html lang="en">
<head>

	<script type="text/javascript" src="<?= base_url(); ?>js/global.js"></script>

</head>

<body style="overflow: hidden;">

							<!-- ========== Forms Section ============= -->
                            <form class="form has-validation" action="<?= base_url() ?>index.php/kabkota/saveDat" method="post">
							 <table width="100%">
							  
								<tr><td colspan="2">
									<div class="clearfix">
										<label for="kode_provinsi" class="form-label">Kode Provinsi <em>*</em></label>
										<div class="form-input">
										<select name="kode_provinsi" id="kode_provinsi">
                                            <option value="" selected="selected"> -- Daftar Provinsi --&nbsp;&nbsp;</option>
                                            <?php foreach($prov as $s): ?>
                                            <option value="<?=$s->kode_provinsi?>"><?=$s->nama_provinsi?></option>
                                            <?php endforeach; ?>
                                        </select>
										</div>
									</div>
								</td></tr>
                                
                                <tr><td colspan="2">
									<div class="clearfix">
										<label for="kode_kabkota" class="form-label">Kode Kab/Kota <em>*</em></label>
										<div class="form-input">
										<input type="text" name="kode_kabkota" id="kode_kabkota" required="required" style="width:200px" />
										</div>
									</div>
								</td></tr>
								
								<tr><td colspan="2">
									<div class="clearfix">
										<label for="nama_kabkota" class="form-label">Nama Kab/Kota<em>*</em></label>
										<div class="form-input"><textarea rows="3" name="nama_kabkota" id="nama_kabkota" required="required" style="width:300px" ></textarea></div>
									</div>
								</td></tr>
																								
								<tr><td colspan="2">
                                            <div class="form-action clearfix" align="right" style="padding-right:20px">

                                                <button class="button" type="submit" data-icon-primary="ui-icon-circle-check">Simpan</button>

                                                <button class="button" type="button" onClick="$('#addForm' ).dialog('close');">Batal</button>

                                            </div>
                               
								</td></tr>
								
								</table>
								</form>
								 <!-- End Forms Section -->

</body>

</html>