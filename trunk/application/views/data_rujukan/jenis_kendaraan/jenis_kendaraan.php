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
				"Batal": function() { $( this ).dialog( "close" ); }
				}})
			$( "#addForm" ).dialog( "open" );
		});
	}

	function edit(id)
	{
		var url	= '<?=base_url()?>index.php/jenis_kendaraan/editJenisKendaraan/'+id;
		$.fx.speeds._default = 1000;
		$(function() {
			$( "#editForm" ).dialog({
			autoOpen: false,
			width: 370,
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
				"Hapus": function(){ location.href='<?=base_url()?>index.php/jenis_kendaraan/hapusJenisKendaraan/'+id; $( this ).dialog( "close" ); },
				"Batal": function() { $( this ).dialog( "close" ); }
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
	
	<div id="addForm" title="Tambah Jenis Kendaraan" style="display:none">						
		<form class="form has-validation" id="formAdd" action="<?=base_url()?>index.php/jenis_kendaraan/simpanJenisKendaraan" method="post">
			<label for="form-name" class="form-label">Jenis Kendaraan<em>*</em></label>
			<div class="form-input">
				<select name="kelompok">
				<?php foreach($kKendaraan as $kK){ ?>
					<option value="<?=$kK->id_kelompokkendaraan?>"><?=$kK->nama_kelompok?></option>
				<?php } ?>
				</select>
			</div>

			<label for="form-name" class="form-label">Subjenis Kendaraan<em>*</em></label>
			<div class="form-input">
				<input type="text" style="width:190px" id="form-name" name="name" required="required" />
			</div>
		</form>
	</div>

	<div id="confirDel" title="Hapus Data" style="display:none">
		<p>Anda yakin akan menghapus data ini?</p>
	</div>

	<div id="editForm" title="Edit Data" style="display:none"></div>
	
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
						<?php if($display!="hidden"){ ?>
                            <ul class="action-buttons clearfix">
                                <li><a class="button" onClick="javascript:add();" data-icon-primary="ui-icon-plusthick">Tambah Jenis</a></li>
                            </ul>
						<?php } ?>
                        <h2>Daftar Jenis Kendaraan</h2>
                        </header>
                        <section class="container_6 clearfix">
                            <div class="grid_6 clearfix" style="margin-top:-20px">
                               <table class="display">
                                    <thead>
                                        <tr>
                                            <th width="5%" class="ui-state-default">No</th>
                                            <th class="ui-state-default">Jenis Kendaraan</th>
											<th class="ui-state-default">Subjenis Kendaraan</th>
											<?php if($display!="hidden"){ ?>
                                            	<th>Aksi</th>
											<?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php foreach($jKendaraan as $row): ?>
                                        <tr>
                                        	<td align="center"><?=$i=$i+1?></td>
                                            <td><?=$row->nama_kelompok?></td>
											<td><?=$row->detail?></td>
											<?php if($display!="hidden"){ ?>
												<td width="70px">
												<div align="center">
												<a onClick="javascript:edit(<?=$row->id_jeniskendaraan?>);" class="iconApp" title="Edit">
												<img src="<?=base_url()?>images/icons/edit.png" ></a>
												<a onClick="javascript:hapus(<?=$row->id_jeniskendaraan?>);" class="iconApp" title="Hapus">
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