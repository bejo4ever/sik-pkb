<!DOCTYPE html>

<html lang="en">

<head>
	<?= $inc; ?>

	<script>
	// Increase the default animation speed to exaggerate the effect
	var ajax_load = '<br /><br /><center><img src="<?=base_url()?>images/loading.gif"></center>';

	function add()
	{
		$.fx.speeds._default = 1000;
		$(function() {
			$( "#addForm" ).dialog({
			autoOpen: false,
			width: 500,
			show: "fade",
			hide: "fade",
			modal: true,
			buttons:{  
				"Simpan": function(){ simpanData(); $( this ).dialog("close"); },
				"Batal": function() { $( this ).dialog( "close" ); }
			}})
			$( "#addForm" ).dialog( "open" );
		});
	}

	function edit(id)
	{
		var url	= '<?=base_url()?>index.php/keberatan/edit/'+id;
		$.fx.speeds._default = 1000;
		$(function() {
			$( "#editForm" ).dialog({
			autoOpen: false,
			width: 500,
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
				"Hapus": function(){ location.href='<?=base_url()?>index.php/keberatan/hapus/'+id; 
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
	
	<div id="addForm" title="Keberatan Hasil Uji" style="display:none">						
		<form class="form has-validation" id="formAdd" action="<?=base_url()?>index.php/keberatan/saveData" method="post">
			<label for="no_bap" class="form-label">Nomor BAP <em>*</em></label>
			<div class="form-input">
			<select name="no_bap">
				<option value="">- Pilih Nomor BAP -</option>
				<?php foreach($noBAP as $d): ?>
					<option style="width:190px" value="<?=$d->no_bap?>"><?=$d->no_bap?></option>
				<?php endforeach; ?>
			</select>
			</div>

			<label for="tgl_berat" class="form-label">Tanggal Keberatan <em>*</em></label>
			<div class="form-input">
			<input type="date" style="width:100px" id="tgl_berat" name="tgl_berat" required="required" />
			</div>

			<label for="pemohon" class="form-label">Nama Pemohon <em>*</em></label>
			<div class="form-input">
			<input type="text" style="width:250px" id="pemohon" name="pemohon" required="required" />
			</div>

			<label for="id_pemohon" class="form-label">No. Identitas Pemohon <em>*</em></label>
			<div class="form-input">
			<input type="text" style="width:150px" id="id_pemohon" name="id_pemohon" required="required" />
			</div>

			<label for="alamat" class="form-label">Alamat Pemohon <em>*</em></label>
			<div class="form-input">
			<input type="text" style="width:250px" id="alamat" name="alamat" required="required" />
			</div>

			<label for="ket" class="form-label">Keterangan <em>*</em></label>
			<div class="form-input">
			<input type="text" style="width:250px" id="ket" name="ket" required="required" />
			</div>

			<label for="status" class="form-label">Status Penanganan <em>*</em></label>
			<div class="form-input">
			<input type="text" style="width:250px" id="status" name="status" required="required" />
			</div>

		</form>
	</div>
	<div id="editForm" title="Edit Data Keberatan" style="display:none"></div>
	<div id="confirDel" title="Hapus Data Keberatan" style="display:none"><p>Apakah Anda akan menghapus data ini?</p></div>

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
                    <div class="main-content" style="min-height:500px">
                        <header>
							<?php if($display!="hidden"){ ?>
                            	<ul class="action-buttons clearfix">
                                	<li><a onClick="add();" class="button" data-icon-primary="ui-icon-plusthick">Tambah Keberatan</a></li>
                            	</ul>
							<?php } ?>
							<h2>
                        		Pengajuan Keberatan Hasil Uji
                        	</h2>
                        </header>
                        <section class="container_6 clearfix">
                            <div class="grid_6 clearfix" style="margin-top:-20px;">
                                <table class="display">
                                    <thead>
                                        <tr>
                                            <th class="ui-state-default" width="3%">No.</th>
											<th class="ui-state-default">No. BAP</th>
                                            <th class="ui-state-default">Tgl Keberatan</th>
                                            <th class="ui-state-default">Nama Pemohon</th>
											<th class="ui-state-default">Id. Pemohon</th>
                                            <th class="ui-state-default">Alamat</th>
											<th class="ui-state-default">Keterangan</th>
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
                                            <td><?=$d->no_bap?></td>
                                            <td><?=$d->tgl_keberatan?></td>
                                            <td><?=$d->nama_pemohon?></td>
											<td><?=$d->id_pemohon?></td>
                                            <td><?=$d->alamat_pemohon?></td>
											<td><?=$d->keterangan?></td>
											<td><?=$d->status?></td>
											<?php if($display!="hidden"){ ?>
											<td>
												<div align="center">
												<a onClick="edit('<?=$d->no_keberatan?>');" class="iconApp" title="Edit">
												<img src="<?=base_url()?>images/icons/edit.png" ></a>
												<a onClick="hapus('<?=$d->no_keberatan?>');" class="iconApp" title="Hapus">
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