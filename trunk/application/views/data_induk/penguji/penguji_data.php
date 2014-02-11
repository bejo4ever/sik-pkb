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
			//$(".has-validation").validate();
			//$('form').attr('validation', 'validation').validator();
			$( "#addForm" ).dialog({
			autoOpen: false,
			width: 450,
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
		var url	= '<?=base_url()?>index.php/penguji/edit/'+id;
		$.fx.speeds._default = 1000;
		$(function() {
			$( "#editForm" ).dialog({
			autoOpen: false,
			width: 450,
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
						"Hapus": function(){ location.href='<?=base_url()?>index.php/penguji/hapus/'+id; 
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
	function sertifikat(id)
	{
		var url	= '<?=base_url()?>index.php/penguji/sertifikat/'+id;
		$.fx.speeds._default = 1000;
		$(function() {
			$( "#sertifikasi" ).dialog({
			autoOpen: false,
			width: 800,
			height:400,
			show: "fade",
			hide: "fade",
			modal: true,
			close: function (event,ui) { $( "#sertifikasi" ).dialog( "destroy" );  }, 
			open: function (event,ui) { $("#sertifikasi").html(ajax_load).load(url); }
			})
			$( "#sertifikasi" ).dialog( "open" );
		});
	}
	function riwayat(id)
	{
		var url	= '<?=base_url()?>index.php/penguji/riwayatPendidikan/'+id;
		$.fx.speeds._default = 1000;
		$(function() {
			$( "#riwayatPendidikan" ).dialog({
			autoOpen: false,
			width: 800,
			height:400,
			show: "fade",
			hide: "fade",
			modal: true,
			close: function (event,ui) { $( "#riwayatPendidikan" ).dialog( "destroy" );  }, 
			open: function (event,ui) { $("#riwayatPendidikan").html(ajax_load).load(url); }
			})
			$( "#riwayatPendidikan" ).dialog( "open" );
		});
	}
	function penghargaan(id)
	{
		var url	= '<?=base_url()?>index.php/penguji/penghargaan/'+id;
		$.fx.speeds._default = 1000;
		$(function() {
			$( "#penghargaan" ).dialog({
			autoOpen: false,
			width: 800,
			height:400,
			show: "fade",
			hide: "fade",
			modal: true,
			close: function (event,ui) { $( "#penghargaan" ).dialog( "destroy" );  }, 
			open: function (event,ui) { $("#penghargaan").html(ajax_load).load(url); }
			})
			$( "#penghargaan" ).dialog( "open" );
		});
	}
	function sanksi(id)
	{
		var url	= '<?=base_url()?>index.php/penguji/sanksi/'+id;
		$.fx.speeds._default = 1000;
		$(function() {
			$( "#sanksi" ).dialog({
			autoOpen: false,
			width: 800,
			height:400,
			show: "fade",
			hide: "fade",
			modal: true,
			close: function (event,ui) { $( "#sanksi" ).dialog( "destroy" );  }, 
			open: function (event,ui) { $("#sanksi").html(ajax_load).load(url); }
			})
			$( "#sanksi" ).dialog( "open" );
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
			$display='none';
		}else{
			$display='block';
		}
	?>
	
	<div id="addForm" title="Tambah Penguji" style="display:none">	
		<form class="form has-validation" id="formAdd" action="<?=base_url()?>index.php/penguji/saveData" method="post">
			<label for="nip" class="form-label">NIP <em>*</em></label>
			<div class="form-input">
			<input type="text" style="width:275px" id="nip" name="nip" required="required" />
			</div>
			<label for="nip" class="form-label">NRP <em>*</em></label>
			<div class="form-input">
			<input type="text" style="width:275px" id="nrp" name="nrp" required="required" />
			</div>
			<label for="nama" class="form-label">Nama Penguji <em>*</em></label>
			<div class="form-input">
			<input type="text" style="width:275px" id="nama" name="nama" required="required" />
			</div>
			<label for="pangkat" class="form-label">Pangkat <em>*</em></label>
			<div class="form-input">
			<select name="pangkat" required="required">
				<option value="">Pilih Pangkat</option>
				<option value="I A / Juru Muda">I A / Juru Muda</option>
				<option value="I B / Juru Muda Tingkat I">I B / Juru Muda Tingkat I</option>
				<option value="I C / Juru">I C / Juru</option>
				<option value="I D / Juru Tingkat I">I D / Juru Tingkat I</option>
				<option value="II A / Pengatur Muda">II A / Pengatur Muda</option>
				<option value="II B / Pengatur Muda Tingkat I">II B / Pengatur Muda Tingkat I</option>
				<option value="II C / Pengatur">II C / Pengatur</option>
				<option value="II D / Pengatur Tingkat I">II D / Pengatur Tingkat I</option>
				<option value="III A / Penata Muda">III A / Penata Muda</option>
				<option value="III B / Penata Muda Tingkat I">III B / Penata Muda Tingkat I</option>
				<option value="III C / Penata">III C / Penata</option>
				<option value="III D / Penata Tingkat I">III D / Penata Tingkat I</option>
				<option value="IV A / Pembina">IV A / Pembina</option>
				<option value="IV B / Pembina Tingkat I">IV B / Pembina Tingkat I</option>
				<option value="IV C / Pembina Utama Muda">IV C / Pembina Utama Muda</option>
				<option value="IV D / Pembina Utama Madya">IV D / Pembina Utama Madya</option>
				<option value="IV E / Pembina Utama">IV E / Pembina Utama</option>
			</select>
			</div>
			<!--label for="golongan" class="form-label">Golongan <em>*</em></label>
			<div class="form-input">
			<select name="golongan">
				<option value="">Pilih Golongan</option>
				<option value="I A">I A</option>
				<option value="I B">I B</option>
				<option value="I C">I C</option>
				<option value="I D">I D</option>
				<option value="II A">II A</option>
				<option value="II B">II B</option>
				<option value="II C">II C</option>
				<option value="II D">II D</option>
				<option value="III A">III A</option>
				<option value="III B">III B</option>
				<option value="III C">III C</option>
				<option value="III D">III D</option>
				<option value="IV A">IV A</option>
				<option value="IV B">IV B</option>
				<option value="IV C">IV C</option>
				<option value="IV D">IV D</option>
				<option value="IV E">IV E</option>
			</select>
			</div-->
			<label for="nip" class="form-label">Jabatan Fungsional <em>*</em></label>
			<div class="form-input">
			<select name="jabatan" required="required">
				<option value="">Pilih Jabatan Fungsional</option>
				<option value="penyelia">Penyelia</option>
				<option value="pelaksana lanjutan">Pelaksana Lanjutan</option>
				<option value="pelaksana">Pelaksana</option>
				<option value="pemula">Pemula</option>
			</select>
			</div>
			<label for="nip" class="form-label">Status<em>*</em></label>
			<div class="form-input">
			<select name="status" required="required">
				<option value="">Pilih Status</option>
				<option value="PNS">PNS</option>
				<option value="Non-PNS">Non-PNS</option>
			</select>
			</div>
		</form>
	</div>
	<div id="editForm" title="Update Data Penguji" style="display:none"></div>
	<div id="confirDel" title="Hapus Data Penguji" style="display:none"><p>Anda Yakin Akan Menghapus Data Ini ?</p></div>
	<div id="sertifikasi" title="Daftar Sertifikat Penguji" style="display:none"></div>
	<div id="riwayatPendidikan" title="Riwayat Pendidikan" style="display:none"></div>
	<div id="penghargaan" title="Penghargaan Yang Pernah diterima" style="display:none"></div>
	<div id="sanksi" title="Sanksi Yang Pernah diterima" style="display:none"></div>
	
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
                    
                    <div class="main-content" style="min-height:500px;">
                        <header>
						<?php if($display!="none"){ ?>
                            <ul class="action-buttons clearfix">
                                <li><a onClick="add();" class="button" data-icon-primary="ui-icon-plusthick">Tambah Penguji</a></li>
                            </ul>
						<?php } ?>
                            <h2>
                               Daftar Penguji
                            </h2>
                        </header>
                        <section class="container_6 clearfix">
                            <div class="grid_6 clearfix" style="margin-top:-20px;">
                                <table class="display">
                                    <thead>
                                        <tr>
                                            <th class="ui-state-default" width="3%">No.</th>
                                            <th class="ui-state-default">NIP</th>
											<th class="ui-state-default">NRP</th>
                                            <th class="ui-state-default">Nama Penguji</th>
                                            <th class="ui-state-default">Pangkat</th>
                                            
											<th class="ui-state-default">Jabatan Fungsional</th>
											<th class="ui-state-default">Status</th>
                                            <th width="160px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php foreach($data as $row): ?>
                                        <tr>
                                        	<td><?=$a=$a+1?></td>
                                            <td><?=$row->nip_penguji?></td>
											 <td><?=$row->NRP?></td>
                                            <td><?=$row->nama_penguji?></td>
                                            <td><?=$row->gol_pangkat?></td>
                                            
											<td><?=$row->jabatan_fungsional?></td>
											<td><?=$row->tipe_penguji?></td>
                                            <td>
											<div align="center">
											<a onClick="sertifikat('<?=$row->NRP?>');" class="iconApp" title="Sertifikat">
											<img src="<?=base_url()?>images/icons/sertifikat.png" ></a>
											<a onClick="riwayat('<?=$row->NRP?>');" class="iconApp" title="Riwayat Pendidikan">
											<img src="<?=base_url()?>images/icons/riwayat.png" ></a>
											<a onClick="penghargaan('<?=$row->NRP?>');" class="iconApp" title="Penghargaan">
											<img src="<?=base_url()?>images/icons/penghargaan.png" ></a>
											<a onClick="sanksi('<?=$row->NRP?>');" class="iconApp" title="Sanksi">
											<img src="<?=base_url()?>images/icons/sanksi.png" ></a>
											<?php if($display!="none"){ ?>
											<a onClick="edit('<?=$row->NRP?>');" class="iconApp" title="Edit">
											<img src="<?=base_url()?>images/icons/edit.png" ></a>
                                            <a  onClick="hapus('<?=$row->NRP?>');" class="iconApp" title="Hapus">
											<img src="<?=base_url()?>images/icons/hapus.png" >
											</a>
											<?php } ?>
											</div>
                                            </td>
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
