<!DOCTYPE html>

<html lang="en">

<head>
	<?= $inc; ?>
	<script>
		var ajax = new Array();
		function getKab(id)
		{
			var index 					= ajax.length;
			ajax[index]					= new sack();
			ajax[index].requestFile 	= '<?=base_url()?>index.php/ajax/getKab/'+id;
			ajax[index].onCompletion 	= function(){ createKab(index) };
			ajax[index].runAJAX();
		}

		function createKab(index)
		{
			document.getElementById('kabkota').options.length = 0;
			var kab 	= document.getElementById('kabkota');
			eval(ajax[index].response);
		}
		
	</script>
</head>

<?php foreach($dishub as $dat)
	{
		$kd			= $dat->kode_dishub;
		$nama		= $dat->nama_dishub;
		$alamat		= $dat->alamat_dishub;
		$kdProvinsi	= $dat->kode_provinsi;
		$kdKabkota	= $dat->kode_kabkota;
		$namaKabkota= $dat->nama_kabkota;
		$telp		= $dat->telp_dishub;
		$email		= $dat->email_dishub;
		$kadis		= $dat->nama_kadis;
		$nip		= $dat->nip_kadis;
	} 
?>

<body style="overflow: hidden;">

	<?php 
		$userLevel=$this->session->userdata('id_level');
		if($userLevel!="1")
		{
			$styInput = 'readonly="true"';
		} 
	?>

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
			<div class="main-content">

				<header>
					<h2>Dinas Perhubungan (Dishub)</h2>
				</header>

				<section class="container_6 clearfix">
				<div class="grid_6 clearfix">

					<!--  Form Section -->
					<form class="form has-validation" action="<?=base_url()?>index.php/dishub/update" method="post">
						<input type="hidden" name="kd" value="<?=$kd?>">
						<table width="100%">
							<tr>
								<td colspan="2">
									<div class="clearfix">
									<label for="form-email" class="form-label">Nama Dishub<em>*</em></label>
									<div class="form-input"><input type="text" required="required" style="width:400px" name="nama" value="<?=$nama?>" <?=$styInput?> /></div>
									</div>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<div class="clearfix">
									<label for="form-email" class="form-label">Alamat<em>*</em></label>
									<div class="form-input"><input type="text" name="alamat" value="<?=$alamat?>" required="required" style="width:400px" <?=$styInput?> /></div>
									</div>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<div class="clearfix" style="width:80%">
									<label for="kode_provinsi" class="form-label">Provinsi<em>*</em></label>
									<div class="form-input">
									<select name="kode_provinsi" id="kode_provinsi" onChange="getKab(this.value);">
										<option value="" selected="selected"> -- Provinsi --&nbsp;&nbsp;</option>
										<?php foreach($prov as $s): ?>
										<?php if($kdProvinsi==$s->kode_provinsi){ $style="selected"; }else{ $style=""; } ?>
											<option value="<?=$s->kode_provinsi?>" <?=$style?> ><?=$s->nama_provinsi?></option>
										<?php endforeach; ?>
									</select>
									</div>
									</div>
								</td>
							</tr>
							<tr>
								<td colspan="2">
								<div class="clearfix" style="width:40%">
								<label for="kode_provinsi" class="form-label">Kabupaten / Kota<em>*</em></label>
								<div class="form-input">
								<select name="kabkota" id="kabkota">
									<?php if($kdKabkota!=""){ ?>
										<option value="<?=$kdKabkota?>" selected="selected"> <?=$namaKabkota?> </option>
                                	<?php }else{ ?>
										<option value="" selected="selected"> -- Pilih Kab/Kota -- </option>
									<?php } ?>
								</select>
								</div>
								</div>
								</td>
							</tr>
							<tr>
								<td colspan="2">
								<div class="clearfix">
								<label for="form-email" class="form-label">Nomor Telpon<em>*</em></label>
								<div class="form-input"><input type="text" name="telp" value="<?=$telp?>" required="required" style="width:120px" <?=$styInput?> /></div>
								</div>
								</td>
							</tr>
							<tr>
								<td colspan="2">
								<div class="clearfix">
								<label for="form-email" class="form-label">Alamat Email<em>*</em></label>
								<div class="form-input"><input type="text" name="email" value="<?=$email?>" style="width:340px" <?=$styInput?> /></div>
								</div>
								</td>
							</tr>
							<tr>
								<td colspan="2">
								<div class="clearfix">
								<label for="form-email" class="form-label">Kepala Dinas<em>*</em></label>
								<div class="form-input"><input type="text" required="required" style="width:340px" name="kepala" value="<?=$kadis?>" <?=$styInput?> /></div>
								</div>
								</td>
							</tr>
							<tr>
								<td colspan="2">
								<div class="clearfix">
								<label for="form-timezone" class="form-label">N I P<em>*</em><small>Kepala Dinas</small></label>
								<div class="form-input">
								<input type="text" <?=$styInput?> required="required" name="nip" value="<?=$nip?>" style="width:120px" />
								</div>
								</div>
								</td>
							</tr>
							<tr>
								<td colspan="2">
                                <div class="form-action clearfix" align="right">
									<button class="button" style="width:100px; height:30px; margin-right:10px;" type="submit" data-icon-primary="ui-icon-circle-check"><?php if($kd==""){ echo "Simpan"; }else{ echo "Update"; }?></button>
								</div>
								</td>
							</tr>
						</table>
					</form>
					<!-- End Form Section -->
                               
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