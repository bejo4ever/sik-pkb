<!DOCTYPE html>

<html lang="en">

<head>
	<?= $inc; ?>

	<script>
	// increase the default animation speed to exaggerate the effect
	var ajax_load = '<br /><br /><center><img src="<?=base_url()?>images/loading.gif"></center>';
	
	function addFasilitas()
	{
		$.fx.speeds._default = 1000;
		$(function() {
			$( "#addFasilitasForm" ).dialog({
			autoOpen: false,
			width: 400,
			show: "fade",
			hide: "fade",
			modal: true,
			buttons:{  
				"Simpan": function(){ simpanFasilitas(); $( this ).dialog( "close" ); },
				"Batal": function() { $( this ).dialog( "close" ); }
			}})
			$( "#addFasilitasForm" ).dialog( "open" );
		});
	}

	function simpanFasilitas()
	{
		document.getElementById('formFasilitas').submit();
	}
	
	function editFasilitas(id)
	{
		var url	= '<?=base_url()?>index.php/unit_pkb/editFasilitas/'+id;
		$.fx.speeds._default = 1000;
		$(function() {
			$( "#editFasilitas" ).dialog({
			autoOpen: false,
			width: 400,
			show: "fade",
			hide: "fade",
			modal: true,
			close: function (event,ui) { $( "#editFasilitas" ).dialog( "destroy" );  }, 
			open: function (event,ui) { $("#editFasilitas").html(ajax_load).load(url); }
			})
			$( "#editFasilitas" ).dialog( "open" );
		});
	}

	function hapusFasilitas(id)
	{
		$.fx.speeds._default = 1000;
		$(function() {
			$( "#confirDelFasilitas" ).dialog({
			autoOpen: false,
			width: 300,
			show: "fade",
			hide: "fade",
			modal: true,
			buttons:{  
				"Hapus": function(){ location.href='<?=base_url()?>index.php/unit_pkb/hapusFasilitas/'+id; $( this ).dialog( "close" ); },
				"Batal": function() { $( this ).dialog( "close" ); }
					}})
			$( "#confirDelFasilitas" ).dialog( "open" );
		});
	}

	function fotoGdg(id)
	{
		var url	= '<?=base_url()?>index.php/unit_pkb/detFoto/'+id;
		$.fx.speeds._default = 1000;
		$(function() {
			$( "#fotoGedung" ).dialog({
			autoOpen: false,
			width: 800,
			show: "fade",
			hide: "fade",
			modal: true,
			close: function (event,ui) { $( "#fotoGedung" ).dialog( "destroy" );  }, 
			open: function (event,ui) { $("#fotoGedung").html(ajax_load).load(url); }
			})
			$( "#fotoGedung" ).dialog( "open" );
		});
	}

	</script>
</head>

<body style="overflow: hidden;">

	<?php 
		$userLevel=$this->session->userdata('id_level');
		if($userLevel!="1")
		{
			$styInput='readonly="true"';
			$display='none';
		} 
		else
		{
			$display='block';
		}
	?>
	
	<div id="addFasilitasForm" title="Tambah Fasilitas" style="display:none">						
		<form class="form has-validation" id="formFasilitas" action="<?=base_url()?>index.php/unit_pkb/saveFasilitas" method="post">
			<label for="form-name" class="form-label">Nama Fasilitas<em>*</em></label>
			<div class="form-input">
				<input type="text" style="width:200px" id="form-name" name="fasilitas" required="required" />
			</div>
			<label for="form-name" class="form-label">Jumlah<em>*</em></label>
			<div class="form-input">
				<input type="text" style="width:50px" id="form-name" name="jumlah" required="required" />
			</div>
			<label for="form-name" class="form-label">Satuan<em>*</em></label>
			<div class="form-input">
				<input type="text" style="width:150px" id="form-name" name="satuan" required="required" />
			</div>
		</form>
	</div>

	<div id="editFasilitas" title="Edit Fasilitas" style="display:none"></div>

	<div id="confirDelFasilitas" title="Hapus Fasilitas" style="display:none">
		<p>Apakah Anda akan menghapus data ini?</p>
	</div>

	<div id="fotoGedung" title="Foto Gedung" style="display:none"></div>

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
					<h2>Unit PKB / Bengkel</h2>
				</header>

				<section class="container_6 clearfix">
				<div class="grid_6 clearfix">

				<!-- Forms Section -->
				<?php foreach($unit_pkb as $dat)
					{
						$id			= $dat->kode_unit;
						$nama		= $dat->nama_unit;
						$alamat		= $dat->alamat_unit;
						$telp		= $dat->telp_unit;
						$email		= $dat->email_unit;
						$kanit		= $dat->nama_kanit;
						$nip		= $dat->nip_kanit;
						$luas		= $dat->luas;
						$kapasitas	= $dat->kapasitas;
						$jenis		= $dat->jenis_unit;
						$foto		= $dat->foto;
					} 
				?>
<form action="<?=base_url()?>index.php/unit_pkb/update" class="form has-validation" method="post">
				<div class="clearfix" align="right">
					<div class="form-input" style="width:25%; margin-top:-15px; margin-right:10px;">
					<select name="dishub">
						<?php foreach($dishub as $d){ ?>
							<option value="<?=$d->kode_dishub?>"><?=$d->nama_dishub?></option>
						<?php } ?>
					</select>
					</div>
				</div>

				<fieldset style="margin:10px 10px 0 0px;">
                
					<input type="hidden" name="id" value="<?=$id?>">
					<table width="100%">
						<tr>
							<td>
								<div class="clearfix">
								<label for="form-email" class="form-label">Nama Unit/Bengkel<em>*</em></label>
								<div class="form-input"><input type="text" required="required" name="nama" value="<?=$nama?>" style="width:350px" <?=$styInput?> /></div>
								</div>
							</td>
							<td>
								<div class="clearfix">
								<label for="form-email" class="form-label">Alamat Email<em>*</em></label>
								<div class="form-input"><input type="text" name="email" value="<?=$email?>" style="width:300px" <?=$styInput?> /></div>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="clearfix">
								<label for="form-email" class="form-label">Alamat<em>*</em></label>
								<div class="form-input"><input type="text" name="alamat" value="<?=$alamat?>" required="required" style="width:350px" <?=$styInput?> /></div>
								</div>
							</td>
							<td>
								<div class="clearfix">
								<label for="form-email" class="form-label">Nomor Telepon<em>*</em></label>
								<div class="form-input"><input type="text" name="telp" value="<?=$telp?>" style="width:150px" <?=$styInput?> /></div>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="clearfix">
								<label for="form-email" class="form-label">L u a s<em>*</em></label>
								<div class="form-input"><input type="text" name="luas" value="<?=$luas?>" style="width:100px" <?=$styInput?> /> m2</div>
								</div>
							</td>
							<td>
								<div class="clearfix">
								<label for="form-email" class="form-label">Nama Kepala Unit<em>*</em></label>
								<div class="form-input"><input type="text" required="required" style="width:300px" name="kepala" value="<?=$kanit?>" <?=$styInput?> /></div>
								</div>
							</td>
						</tr>		
						<tr>
							<td>
								<div class="clearfix">
								<label for="form-timezone" class="form-label">Kapasitas<em>*</em></label>
								<div class="form-input"><input type="text" required="required" name="kapasitas" value="<?=$kapasitas?>" style="width:100px" <?=$styInput?> /> kendaraan/hari
								</div>
								</div>
							</td>
							<td>
								<div class="clearfix">
								<label for="form-timezone" class="form-label">N I P<em>*</em></label>
								<div class="form-input">
								<input type="text" <?=$styInput?> required="required" name="nip" value="<?=$nip?>" style="width:150px" />
								</div>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="clearfix">
								<label for="form-timezone" class="form-label">Jenis Unit<em>*</em></label>
								<div class="form-input" style="width:25%;">
								<?php
									if($jenis=="Unit PKB"){ $a1="selected"; }elseif($jenis=="Bengkel ATPM"){ $a2="selected"; }elseif($jenis=="Bengkel Swasta"){ $a3="selected"; }
								?>
								<select name="jenis" style="width:100">
									<option value="Unit PKB" <?=$a1?> >Unit PKB</option>
									<option value="Bengkel ATPM" <?=$a2?> >Bengkel ATPM</option>														<option value="Bengkel Swasta" <?=$a3?> >Bengkel Swasta</option>
								</select>
								</div>
								</div>     
							</td>
							<td></td>
						</tr>
						<!--<tr>
							<td>
								<div class="clearfix">
								<label for="form-timezone" class="form-label">Foto<em>*</em></label>
								<div class="form-input">
                                <a onClick="javascript:fotoGdg('<?= $id; ?>');" title="View" >
								<img src="<?= base_url() ?>uploads/unit/thumbnail/<?= $foto; ?>"/img></a><br/>
                                <input type="file" name="gambar">
								</div>
								</div>     
							</td>
							<td></td>
						</tr> -->
						<tr>
							<td colspan="2">
								<div class="form-action clearfix" align="right">
									<button class="button" style="width:100px; height:25px; margin-right:5px;" type="submit" data-icon-primary="ui-icon-circle-check"><?php if($id==""){ echo "Simpan"; }else{ echo "Update"; }?></button>
								</div>
							</td>
						</tr>
					</table>
				</form>
				</fieldset>
				<!-- End Forms Section -->

				<div class="grid_8 clearfix" style="width:100%; margin:10px 10px 0px 0px;">
					<h2>Fasilitas</h2>
					<table width="99%" class="display2" style="border:1px #CCCCCC solid;">
						<tr>
							<th width="5%" class="ui-state-default">No.</th>
							<th class="ui-state-default">Nama Fasilitas</th>
							<th width="10%" class="ui-state-default">Jumlah</th>
							<th width="15%" class="ui-state-default">Satuan</th>
							<th width="10%" class="ui-state-default">Aksi</th>
						</tr>
						<?php foreach($fasilitas as $f): ?>
						<tr>
							<td align="center"><?=$b=$b+1?></td>
							<td>&nbsp;<?=$f->fasilitas?></td>
							<td align="center">&nbsp;<?=$f->jumlah?></td>
							<td>&nbsp;<?=$f->satuan?></td>
							<td>
								<div align="center" style="margin-top:6px;display:<?=$display?>;">
									<a onClick="editFasilitas('<?=$f->kd_fasilitas?>');" class="iconApp" title="Edit">
									<img src="<?=base_url()?>images/icons/edit.png" ></a>
									<a onClick="hapusFasilitas('<?=$f->kd_fasilitas?>');" class="iconApp" title="Hapus">
									<img src="<?=base_url()?>images/icons/hapus.png" ></a>
								</div>
							</td>
						</tr>
						<?php endforeach; ?>
						<?php if(count($fasilitas)==0){ ?>
						<tr height="30px">
							<td colspan="3"><center>Tidak ada data fasilitas tersimpan</center></td>
						</tr>
						<?php } ?>
					</table>

					<div align="right" style="margin-top:5px; margin-right:10px;display:<?=$display?>;">
						<button class="button" style="width:140px; height:25px;" type="button" data-icon-primary="ui-icon-circle-plus" onClick="javascript:addFasilitas();">Tambah Fasilitas</button>
					</div>

				</div>
									  
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
