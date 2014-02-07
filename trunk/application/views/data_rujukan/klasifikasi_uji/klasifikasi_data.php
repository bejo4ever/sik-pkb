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
		var url	= '<?=base_url()?>index.php/klasifikasi_uji/edit/'+id;
		$.fx.speeds._default = 1000;
		$(function() {
			$( "#editForm" ).dialog({
			autoOpen: false,
			width: 370,
			height: 130,
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
						"Hapus": function(){ location.href='<?=base_url()?>index.php/klasifikasi_uji/hapus/'+id; $( this ).dialog( "close" ); },
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
	
	<div id="addForm" title="Tambah Klasifikasi Uji" style="display:none">						
		<form class="form has-validation" id="formAdd" action="<?=base_url()?>index.php/klasifikasi_uji/simpanBaru" method="post">
			<label for="form-name" class="form-label">Deskripsi Klasifikasi<em>*</em></label>
			<div class="form-input">
			<input type="text" style="width:190px" id="form-name" name="deskripsi" required="required" />
			</div>
		</form>
	</div>
	<div id="confirDel" title="Hapus Data" style="display:none">
		<p>Anda Yakin Akan Menghapus Data Ini ?</p>
	</div>
	<div id="editForm" title="Edit Data" style="display:none"></div>

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
                            <!--ul class="action-buttons clearfix">
                                <li><a onClick="javascript:add();" class="button" data-icon-primary="ui-icon-plusthick">Tambah Klasifikasi</a></li>
                            </ul-->
						<?php } ?>
                            <h2>
                               Daftar Klasifikasi Uji
                            </h2>
                        </header>
                        <section class="container_6 clearfix">
                            <div class="grid_6 clearfix" style="margin-top:-20px;">
                                <table class="display">
                                    <thead>
                                        <tr>
                                            <th class="ui-state-default" width="15%">Kode Klasifikasi</th>
                                            <th class="ui-state-default">Deskripsi Klasifikasi</th>
											<?php if($display!="hidden"){ ?>
                                            	<th width="70px">Aksi</th>
											<?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php foreach($data as $k): ?>
                                        <tr>
                                        	<td align="center"><?=$i=$i+1?></td>
                                            <td><?=$k->deskripsi_klasifikasi?></td>
											<?php if($display!="hidden"){ ?>
												<td>
												<div align="center">
												<a class="iconApp" title="Edit" onClick="edit('<?=$k->kd_klasifikasi?>');">
												<img src="<?=base_url()?>images/icons/edit.png" ></a>
												<a class="iconApp" title="Hapus" onClick="hapus('<?=$k->kd_klasifikasi?>');">
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