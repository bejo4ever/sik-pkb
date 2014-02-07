<!DOCTYPE html>

<html lang="en">

<head>

<?= $inc; ?>
<script>
	// increase the default animation speed to exaggerate the effect
	var ajax_load = '<br /><br /><center><img src="<?=base_url()?>images/loading.gif"></center>';
	function addGedung()
	{
		$.fx.speeds._default = 1000;
		$(function() {
			$( "#addGedungForm" ).dialog({
			autoOpen: false,
			width: 400,
			show: "fade",
			hide: "fade",
			modal: true,
			buttons:{  
						"Simpan": function(){ simpanGedung(); $( this ).dialog( "close" ); },
						"Batalkan": function() { $( this ).dialog( "close" ); }
					}})
			$( "#addGedungForm" ).dialog( "open" );
		});
	}
	function simpanGedung()
	{
		document.getElementById('formGedung').submit();
	}
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
						"Batalkan": function() { $( this ).dialog( "close" ); }
					}})
			$( "#addFasilitasForm" ).dialog( "open" );
		});
	}
	function simpanFasilitas()
	{
		document.getElementById('formFasilitas').submit();
	}
	
	function editGedung(id)
	{
		var url	= '<?=base_url()?>index.php/unit_pkb/editGedung/'+id;
		$.fx.speeds._default = 1000;
		$(function() {
			$( "#editGedung" ).dialog({
			autoOpen: false,
			width: 370,
			height: 130,
			show: "fade",
			hide: "fade",
			modal: true,
			close: function (event,ui) { $( "#editGedung" ).dialog( "destroy" );  }, 
			open: function (event,ui) { $("#editGedung").html(ajax_load).load(url); }
			})
			$( "#editGedung" ).dialog( "open" );
		});
	}
	function editFasilitas(id)
	{
		var url	= '<?=base_url()?>index.php/unit_pkb/editFasilitas/'+id;
		$.fx.speeds._default = 1000;
		$(function() {
			$( "#editFasilitas" ).dialog({
			autoOpen: false,
			width: 370,
			show: "fade",
			hide: "fade",
			modal: true,
			close: function (event,ui) { $( "#editFasilitas" ).dialog( "destroy" );  }, 
			open: function (event,ui) { $("#editFasilitas").html(ajax_load).load(url); }
			})
			$( "#editFasilitas" ).dialog( "open" );
		});
	}
	function hapusGedung(id)
	{
		$.fx.speeds._default = 1000;
		$(function() {
			$( "#confirDelGedung" ).dialog({
			autoOpen: false,
			width: 300,
			show: "fade",
			hide: "fade",
			modal: true,
			buttons:{  
						"Hapus": function(){ location.href='<?=base_url()?>index.php/unit_pkb/hapusGedung/'+id; $( this ).dialog( "close" ); },
						"Batalkan": function() { $( this ).dialog( "close" ); }
					}})
			$( "#confirDelGedung" ).dialog( "open" );
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
						"Batalkan": function() { $( this ).dialog( "close" ); }
					}})
			$( "#confirDelFasilitas" ).dialog( "open" );
		});
	}
	
	</script>

</head>

<body style="overflow: hidden;">

	
	<div id="addFasilitasForm" title="Tambah Fasilitas" style="display:none">						
		<form class="form has-validation" id="formFasilitas" action="<?=base_url()?>index.php/unit_pkb/saveFasilitas" method="post">
			<label for="form-name" class="form-label">Fasilitas<em>*</em></label>
			<div class="form-input">
			<input type="text" style="width:200px" id="form-name" name="fasilitas" required="required" />
			</div>
			<label for="form-name" class="form-label">Jumlah<em>*</em></label>
			<div class="form-input">
			<input type="text" style="width:50px" id="form-name" name="jumlah" required="required" />
			</div>
			<label for="form-name" class="form-label">satuan<em>*</em></label>
			<div class="form-input">
			<input type="text" style="width:150px" id="form-name" name="satuan" required="required" />
			</div>
		</form>
	</div>
	
	<div id="editFasilitas" title="Edit Fasilitas" style="display:none"></div>
	<div id="confirDelFasilitas" title="Hapus Data" style="display:none">
		<p>Anda Yakin Akan Menghapus Data Ini ?</p>
	</div>
	
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

    <div id="loading"> 

        <script type = "text/javascript"> 

            document.write("<div id='container'><p id='content'>" +

                           "<img id='loadinggraphic' width='16' height='16' src='<?= base_url() ?>images/ajax-loader-eeeeee.gif' /> " +

                           "Loading...</p></div>");

        </script> 

    </div>

    

    <div id="wrapper" class="clearfix">
        
        <?= $header; ?>

        <section>

            <div class="container_8 clearfix">                



                <!-- Main Section -->



                <section class="main-section grid_8">
                    
                <!--<nav class="collapsed">
				<a class="chevron" href="#">&raquo;</a>
					<ul>
						<li class="current" ><a href="#" class="navicon-bank">Instansi</a></li>
						<li><a href="<?=base_url()?>index.php/master/jenis_kendaraan" class="navicon-truck">Jenis Kendaraan</a></li>
						<li><a href="<?=base_url()?>index.php/master/tipe_kendaraan" class="navicon-truck">Tipe Kendaraan</a></li>
						<li><a href="<?=base_url()?>index.php/data_provinsi" class="navicon-folder-open">Provinsi</a></li>
						<li><a href="<?=base_url()?>index.php/data_kabkota" class="navicon-folder-open">Kabupaten / Kota</a></li>
					</ul>
				</nav>-->

                    <div class="main-content">
                       
                        <section class="container_6 clearfix">
                            <div class="grid_6 clearfix">
							<!-- ========== Forms Section ============= -->
							<?php
								foreach($data as $dat)
								{
									$id_bengkel	= $dat->kode_bengkel;
									$nama		= $dat->nama_bengkel;
									$alamat		= $dat->alamat_bengkel;
									$telp		= $dat->telp_bengkel;
									$email		= $dat->email_bengkel;
									$pemilik	= $dat->nama_pemilik;
									$luas		= $dat->luas;
									$kapasitas	= $dat->kapasitas;
									$status		= $dat->status;
								} 
							?>
							
							<?php //if($status=="aktif"||$status==""){ ?>
							
							<fieldset style="margin:0 10px 0 0;">
							<legend>Bengkel</legend>
							
                            <form class="form has-validation" action="<?=base_url()?>index.php/bengkel/update" method="post">
							<input type="hidden" name="id" value="<?=$id_bengkel?>">
							 <table width="100%">
							 <table width="100%">
							  <tr>
							  	<td align="right" colspan="4">
								<div class="form-input" style="width:25%; margin-top:-15px;">
								<select name="dishub">
								<?php foreach($dishub as $d){ ?>
									<option value="<?=$d->kode_dishub?>"><?=$d->nama_dishub?></option>
								<?php } ?>
								</select>
								</div>
								</td>
							  </tr>
							  <tr>
							  	<td>
									<div class="clearfix">
										<label for="form-email" class="form-label">Nama Bengkel</label>
										<div class="form-input"><input type="text" required="required" style="width:300px" name="nama" value="<?=$nama?>" <?=$styInput?> /></div>
									</div>
								</td>
								<td>
									<div class="clearfix">
										<label for="form-email" class="form-label">Email <em>*</em></label>
										<div class="form-input"><input type="text" name="email" value="<?=$email?>" required="required" style="width:250px" <?=$styInput?> /></div>
									</div>
									</td>
								</tr>
								
								<tr>
									<td>
									<div class="clearfix">
										<label for="form-email" class="form-label">Alamat<em>*</em></label>
										<div class="form-input"><input type="text" name="alamat" value="<?=$alamat?>" required="required" style="width:300px" <?=$styInput?> /></div>
									</div>
									</td>
									<td>
									<div class="clearfix">
										<label for="form-email" class="form-label">Nomor Telpon <em>*</em></label>
										<div class="form-input"><input type="text" name="telp" value="<?=$telp?>" required="required" style="width:150px" <?=$styInput?> /></div>
									</div>
									</td>
								</tr>
								
								<tr>
									<td>
									<div class="clearfix">
										<label for="form-email" class="form-label">Luas<em>*</em><small>Bengkel</small></label>
										<div class="form-input"><input type="text" name="luas" value="<?=$luas?>" required="required" style="width:150px" <?=$styInput?> /></div>
									</div>
									</td>
									<td>
									<div class="clearfix">
										<label for="form-email" class="form-label">Pemilik <em>*</em></label>
										<div class="form-input"><input type="text" required="required" style="width:200px" name="kepala" value="<?=$pemilik?>" <?=$styInput?> /></div>
									</div>
								</td>
								</tr>
								
								<tr>
									<td colspan="2">
									<div class="clearfix">
										<label for="form-email" class="form-label">Kapasitas<em>*</em><small>Pengujian</small></label>
										<div class="form-input"><input type="text" name="kapasitas" value="<?=$kapasitas?>" required="required" style="width:150px" <?=$styInput?> /></div>
									</div>
									</td>
								</tr>
								
								<tr><td colspan="2">
                                            <div class="form-action clearfix" align="right">
                                                <button class="button" style="width:120px; height:30px; margin-right:10px;" type="submit" data-icon-primary="ui-icon-circle-check"><?php if($status==""){ echo "Simpan"; }else{ echo "update"; }?></button>
                                            </div>
                               
								</td></tr>
								
								</table>
								</form>
								 <!-- End Forms Section -->
                            	
								</fieldset>
								
								<div class="grid_8 clearfix" style="width:100%; margin:0px 5px 0px 0px;">
								
								<h2>Fasilitas</h2>
							
									<table width="99%" class="display2" style="border:1px #CCCCCC solid;">
									<tr>
										<th width="4%" class="ui-state-default">No</th>
										<th class="ui-state-default">Nama Fasilitas</th>
										<th width="10%" class="ui-state-default">Jumlah</th>
										<th width="15%" class="ui-state-default">Satuan</th>
										<th width="8%" class="ui-state-default">Aksi</th>
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
											<img src="<?=base_url()?>images/icons/hapus.png" >
											</a>
										</div>
										</td>
									</tr>
									<?php endforeach; ?>
									<?php if(count($fasilitas)==0){ ?>
									<tr height="30px">
										<td colspan="6"><center>Tidak ada data fasilitas tersimpan</center></td>
									</tr>
									<?php } ?>
									</table>
									<div align="right" style="margin-top:5px; margin-right:10px;display:<?=$display?>;">
										<button class="button" style="width:140px; height:25px;" type="button" data-icon-primary="ui-icon-circle-plus" onClick="javascript:addFasilitas();">Tambah Fasilitas</button>
									</div>
									
								</div>
							
							<?php //}else{ ?>
							
								<!--<div class="ui-widget message notice">
									<div class="ui-state-highlight ui-corner-all">
										<p>
										<span class="ui-icon ui-icon-info"></span>
											Bengkel Tidak digunakan
										</p>
									</div>
								</div>-->
								
							<?php //} ?>			   
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