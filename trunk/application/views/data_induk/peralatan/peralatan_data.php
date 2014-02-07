<!DOCTYPE html>

<html lang="en">

<head>

<?= $inc; ?>

	<script>
	// increase the default animation speed to exaggerate the effect
	var ajax_load = '<br /><br /><center><img src="<?=base_url()?>images/loading.gif"></center>';
	function add()
	{
		$.fx.speeds._default = 1000;
		$(function() {
			$( "#addForm" ).dialog({
			autoOpen: false,
			width: 400,
			show: "fade",
			hide: "fade",
			modal: true,
			buttons:{  
						"Simpan": function(){ simpanData(); $( this ).dialog( "close" ); },
						"Batalkan": function() { $( this ).dialog( "close" ); }
					}})
			$( "#addForm" ).dialog( "open" );
		});
	}
	function edit(id)
	{
		var url	= '<?=base_url()?>index.php/peralatan_uji/edit/'+id;
		$.fx.speeds._default = 1000;
		$(function() {
			$( "#editForm" ).dialog({
			autoOpen: false,
			width: 400,
			show: "fade",
			hide: "fade",
			modal: true,
			close: function (event,ui) { $( "#editForm" ).dialog( "destroy" );  }, 
			open: function (event,ui) { $("#editForm").html(ajax_load).load(url); }
			})
			$( "#editForm" ).dialog( "open" );
		});
	}
	function hapus(id)
	{
		$.fx.speeds._default = 1000;
		$(function() {
			$( "#confirDel" ).dialog({
			autoOpen: false,
			width: 300,
			show: "fade",
			hide: "fade",
			modal: true,
			buttons:{  
						"Hapus": function(){ location.href='<?=base_url()?>index.php/peralatan_uji/hapus/'+id; 
						$( this ).dialog( "close" ); },
						"Batalkan": function() { $( this ).dialog( "close" ); }
					}})
			$( "#confirDel" ).dialog( "open" );
		});
	}
	function simpanData()
	{
		document.getElementById('formAdd').submit();
	}
	</script>


</head>

<body style="overflow: hidden;">
	
	<?php 
		$userLevel=$this->session->userdata('id_level');
		if($userLevel!="1")
		{
			$display='hidden';
		}else{
			$display='block';
		}
	?>
	
	<div id="addForm" title="Tambah Peralatan Uji" style="display:none">						
		<form class="form has-validation" id="formAdd" action="<?=base_url()?>index.php/peralatan_uji/saveData" method="post">
			<label for="nama" class="form-label">Nama Alat <em>*</em></label>
			<div class="form-input">
			<input type="text" style="width:190px" id="nama" name="nama" required="required" />
			</div>
			<label for="merek" class="form-label">Merek <em>*</em></label>
			<div class="form-input">
			<input type="text" style="width:190px" id="merek" name="merek" required="required" />
			</div>
			<label for="nip" class="form-label">Untuk Pengujian <em>*</em></label>
			<div class="form-input">
			<select name="kelompok">
				<option value="">Pilih Item Pengujian</option>
				<?php foreach($itemUji as $d): ?>
				<option value="<?=$d->kd_kelompok?>"><?=$d->deskripsi_kelompok?></option>
				<?php endforeach; ?>
			</select>
			</div>
			<label for="jumlah" class="form-label">Jumlah Alat <em>*</em></label>
			<div class="form-input">
			<input type="text" style="width:190px" id="jumlah" name="jumlah" required="required" />
			</div>
			<label for="jumlah" class="form-label">Tahun Produksi <em>*</em></label>
			<div class="form-input">
			<input type="text" style="width:190px" id="produksi" name="produksi" required="required" />
			</div>
			<label for="jumlah" class="form-label">Tahun Pemakaian <em>*</em></label>
			<div class="form-input">
			<input type="text" style="width:190px" id="pemakaian" name="pemakaian" required="required" />
			</div>
			<label for="jumlah" class="form-label">Tahun Kalibrasi <em>*</em></label>
			<div class="form-input">
			<input type="text" style="width:190px" id="kalibrasi" name="kalibrasi" required="required" />
			</div>
			<label for="status" class="form-label">Status Alat <em>*</em></label>
			<div class="form-input">
			<select name="status">
				<option value="">Pilih Status Alat</option>
				<option value="Baik dan Berfungsi">Baik dan Berfungsi</option>
				<option value="Baik tetapi Tidak Berfungsi">Baik tetapi Tidak Berfungsi</option>
				<option value="Rusak">Rusak</option>
			</select>
			</div>
		</form>
	</div>
	<div id="editForm" title="Update Data Peralatan" style="display:none"></div>
	<div id="confirDel" title="Hapus Data Peralatan" style="display:none"><p>Anda Yakin Akan Menghapus Data Ini ?</p></div>


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
                    

                    <div class="main-content" style="min-height:500px">
                        <header>
						<?php if($display!="hidden"){ ?>
                            <ul class="action-buttons clearfix">
                                <li><a onClick="add();" class="button" data-icon-primary="ui-icon-plusthick">Tambah Peralatan</a></li>
                            </ul>
						<?php } ?>
                            <h2>
                               Daftar Peralatan Uji
                            </h2>
                        </header>
                        <section class="container_6 clearfix">
                            <div class="grid_6 clearfix" style="margin-top:-20px;">
                                <table class="display">
                                    <thead>
                                        <tr>
                                            <th class="ui-state-default" width="3%">No.</th>
                                            <th class="ui-state-default">Nama Alat</th>
                                            <th class="ui-state-default">Merek</th>
											<th class="ui-state-default">Pengujian</th>
                                            <th class="ui-state-default">Jumlah</th>
											<th class="ui-state-default">Tahun Produksi</th>
											<th class="ui-state-default">Tahun Pemakaian</th>
											<th class="ui-state-default">Tahun Kalibrasi</th>
                                            <th class="ui-state-default">Status</th>
											<?php if($display!="hidden"){ ?>
                                            	<th width="70px">Aksi</th>
											<?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php foreach($data as $d): ?>
                                        <tr>
                                        	<td><?=$a=$a+1?></td>
                                            <td><?=$d->nama_alat?></td>
                                            <td><?=$d->merk?></td>
											<td><?=$d->deskripsi_kelompok?></td>
                                            <td><?=$d->jumlah_alat?></td>
											<td><?=$d->tahun_produksi?></td>
											<td><?=$d->tahun_penggunaan?></td>
											<td><?=$d->tahun_kalibrasi?></td>
                                            <td><?=$d->status_alat?></td>
											<?php if($display!="hidden"){ ?>
												<td>
												<div align="center">
												<a onClick="edit('<?=$d->kode_alat?>');" class="iconApp" title="Edit">
												<img src="<?=base_url()?>images/icons/edit.png" ></a>
												<a onClick="hapus('<?=$d->kode_alat?>');" class="iconApp" title="Hapus">
												<img src="<?=base_url()?>images/icons/hapus.png" >
												</a>
												</div>
												</td>
											<?php } ?>
                                        </tr>
                                     <?php endforeach; ?>
                                    </tbody>
                                </table>
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