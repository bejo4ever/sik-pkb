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
			width: 600,
			show: "fade",
			hide: "fade",
			modal: true
			})
			$( "#addForm" ).dialog( "open" );
		});
	}
	function edit(id)
	{
		var url	= '<?=base_url()?>index.php/provinsi/editData/'+id;
		$.fx.speeds._default = 1000;
		$(function() {
			$( "#editForm" ).dialog({
			autoOpen: false,
			width: 600,
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
						"Hapus": function(){ location.href='<?=base_url()?>index.php/provinsi/deleteData/'+id; $( this ).dialog( "close" ); },
						"Batalkan": function() { $( this ).dialog( "close" ); }
					}})
			$( "#confirDel" ).dialog( "open" );
		});
	}
	function simpanData()
	{
		document.getElementById('formAdd').submit();
	}
	
	function confirData()
	{
		var url	= '<?=base_url()?>index.php/provinsi/kodecheck/';
		$.fx.speeds._default = 1000;
		$(function() {
			$( "#addForm" ).dialog({
			autoOpen: false,
			width: 600,
			show: "fade",
			hide: "fade",
			modal: true,
			close: function (event,ui) { $( "#addForm" ).dialog( "destroy" );  }, 
			open: function (event,ui) { $("#addForm").html(ajax_load).load(url); }
			})
			$( "#addForm" ).dialog( "open" );
		});
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
	
	<div id="addForm" title="Tambah Provinsi" style="display:none">						
			
     
            	
	 <form class="form has-validation" id="formAdd" action="<?=base_url()?>index.php/provinsi/saveDat" method="post">
	 <table width="100%">
	  
		<tr><td colspan="2">
			<div class="clearfix">
				<label for="kode_provinsi" class="form-label">Kode Provinsi <em>*</em></label>
				<div class="form-input">
				<input type="text" name="kode_provinsi" id="kode_provinsi" required="required" style="width:200px" />
				</div>
			</div>
		</td></tr>
		
		<tr><td colspan="2">
			<div class="clearfix">
				<label for="nama_provinsi" class="form-label">Nama Provinsi <em>*</em></label>
				<div class="form-input"><textarea rows="3" name="nama_provinsi" id="nama_provinsi" required="required" style="width:300px" ></textarea></div>
			</div>
		</td></tr>
		
		<tr><td colspan="2">
			
				<div class="form-action clearfix" align="right" style="padding-right:20px">
					<button class="button" type="submit" data-icon-primary="ui-icon-circle-check">Simpan</button>
					<button class="button" type="button" onClick="$('#addForm' ).dialog('close');">Batalkan</button>
				</div>
			</td></tr>
																
	</table>
	</form>
		
	</div>
	
	<div id="confirDel" title="Hapus Data" style="display:none">
		<p>Anda Yakin Akan Menghapus Data Ini ?</p>
	</div>
	
	<div id="editForm" title="Edit Provinsi" style="display:none"></div>
	
	
	

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
						<li><a href="<?=base_url()?>index.php/master" class="navicon-bank">Instansi</a></li>
						<li><a href="<?=base_url()?>index.php/master/jenis_kendaraan" class="navicon-truck">Jenis Kendaraan</a></li>
						<li><a href="<?=base_url()?>index.php/master/tipe_kendaraan" class="navicon-truck">Tipe Kendaraan</a></li>
						<li class="current"><a href="<?=base_url()?>index.php/data_provinsi" class="navicon-table">Provinsi</a></li>
						
						<li><a href="<?=base_url()?>index.php/data_kabkota" class="navicon-newspaper">Kab / Kota</a></li>
					</ul>
				</nav>-->

                    <div class="main-content" style="min-height:500px">
                        <header>
						<?php if($display!="none"){ ?>
                            <ul class="action-buttons clearfix">
                                <li><a class="button" data-icon-primary="ui-icon-plusthick" onClick="javascript:add();">Tambah Provinsi</a></li>
                            </ul>
						<?php } ?>
							<h2>
                               Daftar Provinsi
                            </h2>
                                                     
                        </header>
                        <section class="container_6 clearfix">

                          <?php if($f==1) { ?>
                          <center><div class="ui-widget message closeable" style="width:100%" align="center">
                               <div class="ui-state-error ui-corner-all"> 
                                    <p>
                                        <span class="ui-icon ui-icon-alert"></span> 
                                        <p><h2>PESAN ERROR :</h2><br/><h4>Data yang Anda Masukan, sudah ada di Database...!!</h4></p>
                                    </p>
                                </div>
                            </div></center>
                            
                            <?php } else { } ?>
                           <!-- <div class="grid_6 leading" style="width:98%">

                                <div class="portlet" id="widget-latestactivity">

                                    <header>

                                        <h2>List Data</h2>

                                    </header> 

                                    <section class="container_6 clearfix">-->
									
                                        <table class="display">

                                           <thead>
                                        <tr>
                                            <th class="ui-state-default">No.</th>
                                            <th class="ui-state-default">Kode Provinsi</th>
                                            <th class="ui-state-default">Nama Provinsi</th>
                                            
                                            <th class="ui-state-default">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										
										<?php $i= 1+$offset; ?>
                                   		<?php foreach($fields as $m): ?>
										
                                        <tr>
                                        	<td><?= $i++; ?></td>
                                            <td><?= $m->kode_provinsi; ?></td>
                                            <td><?= $m->nama_provinsi; ?></td>
                                            
                                            <td width="70px">
											<div align="center" style="display:<?=$display?>">
											<a onClick="javascript:edit(<?= $m->kode_provinsi; ?>);" style="cursor:pointer" title="Edit">
											<img src="<?=base_url()?>images/icons/edit.png" >
											</a>
                                            <a onClick="javascript:hapus(<?= $m->kode_provinsi; ?>);" style="cursor:pointer" title="Hapus">
											<img src="<?=base_url()?>images/icons/hapus.png" >
											</a>
											</div>
											
                                            </td>
                                        </tr>
                                      
									    <?php endforeach; ?>                                         
                                    </tbody>

                                        </table>
		
                                    </section>
									
                                </div>
							<?= $pagination ?>
                            </div>

                            

                       <!-- </section>

                    </div> -->

                </section>

                <!-- Main Section End -->



            </div>

        </section>

    </div>

    

    <?= $footer; ?>



</body>

</html>