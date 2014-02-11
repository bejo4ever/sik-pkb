<!DOCTYPE html>

<html lang="en">

<head>

<?= $inc; ?>

	<script>
	// increase the default animation speed to exaggerate the effect
	var ajax = new Array();
	function cekUser(nip)
	{
		var index 					= ajax.length;
		ajax[index]					= new sack();
		ajax[index].requestFile 	= '<?=base_url()?>index.php/ajax/getKab/'+id;
		ajax[index].onCompletion 	= function(){ createalert(index) };
		ajax[index].runAJAX();
	}
	function createalert(index)
	{
		eval(ajax[index].response);	
	}
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
			modal: true
			})
			$( "#addForm" ).dialog( "open" );
		});
	}
	function hapus(id)
	{
		$.fx.speeds._default = 1000;
		$(function() {
			$( "#dialog" ).dialog({
			autoOpen: false,
			show: "fade",
			hide: "fade",
			buttons: {
						"Hapus": function() {
							location.href='<?=base_url()?>index.php/user/hapus/'+id;
							$( this ).dialog( "close" );
						},
						"Batalkan": function() {
							$( this ).dialog( "close" );
						}
					}
		})
		
			//$( "#opener" ).click(function() {
				$( "#dialog" ).dialog( "open" );
				//return false;
			//});
		});
	}
	function edit(id)
	{
		var url	= '<?=base_url()?>index.php/user/edit/'+id;
		$.fx.speeds._default = 1000;
		$(function() {
			$( "#editForm" ).dialog({
			autoOpen: false,
			width: 400,
			height: 250,
			show: "fade",
			hide: "fade",
			modal: true,
			close: function (event,ui) { $( "#editForm" ).dialog( "destroy" );  }, 
			open: function (event,ui) { $("#editForm").html(ajax_load).load(url); }
			})
			$( "#editForm" ).dialog( "open" );
		});
	}
	</script>

</head>

<body style="overflow: hidden;">
	
	<div id="editForm" title="Edit Data" style="display:none"></div>
	<div id="addForm" title="Tambah User Account" style="display:none">						
		<form class="form has-validation" action="<?=base_url()?>index.php/user/save" method="post">
		   <table width="100%">
			<tr><td colspan="2">
				<div class="clearfix">
					<label for="nip" class="form-label">NIP <em>*</em></label>
					<div class="form-input">
						<input type="text" name="nip" id="nip" required="required" style="width:220px" />
					</div>
				</div>
			</td></tr>
			
			<tr><td colspan="2">
				<div class="clearfix">
					<label for="nama" class="form-label">Nama User <em>*</em></label>
					<div class="form-input">
						<input type="text" name="nama" id="nama" required="required" style="width:220px" />
					</div>
				</div>
			</td></tr>
			
			<!--<tr><td colspan="2">
				<div class="clearfix">
					<label for="username" class="form-label">Username <em>*</em></label>
					<div class="form-input">
						<input type="text" name="username" id="username" required="required" style="width:220px" />
					</div>
				</div>
			</td></tr>-->
			
			<tr><td colspan="2">
				<div class="clearfix">
					<label for="pass1" class="form-label">Password <em>*</em></label>
					<div class="form-input">
						<input type="password" name="pass1" id="pass1" required="required" style="width:220px" />
					</div>
				</div>
			</td></tr>
			
			<tr><td colspan="2">
				<div class="clearfix">
					<label for="pass1" class="form-label">User Tipe<em>*</em></label>
					<div class="form-input">
						<select name="level">
							<option value="2">Pendaftaran</option>
							<option value="3">Pembayaran</option>
							<option value="4">Penguji</option>
							<option value="5">Pencetak</option>
						</select>
					</div>
				</div>
			</td></tr>
			
			<tr><td colspan="2">
			<hr>
				<div class="form-action clearfix" align="right">
					<button class="button" style="width:80px; height:25px" type="submit" data-icon-primary="ui-icon-circle-check">Simpan</button>
					<button class="button" style="width:80px; height:25px" type="button" onClick="$('#addForm' ).dialog('close');">Batalkan</button>
				</div>
			</td></tr>
			
			</table>
		   </form>
	</div>
	<div id="dialog" title="Hapus Data" class="ui-helper-hidden">
		<p>Anda yakin akan menghapus data ini?</p>
	</div>

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
                 <?php $userLevel=$this->session->userdata('id_level'); ?> 
				 <?php if($userLevel=="1"){ ?>  
                    <nav class="collapsed">
					<a class="chevron" href="#">&raquo;</a>
						<ul>
							<li><a href="<?=base_url()?>index.php/user/editAccount" class="navicon-id-card">My Account</a></li>
							<li class="current"><a href="<?=base_url()?>index.php/user" class="navicon-table">User Data</a></li>
						</ul>
					</nav>
				<?php } ?>
                    <div class="main-content">
                        <header>
                            <ul class="action-buttons clearfix">
                                <li><a onClick="javascript:add();" class="button" data-icon-primary="ui-icon-plusthick">Tambah Data User</a></li>
                            </ul>
                            <h2>
                                Daftar User Sistem
                            </h2>
                        </header>
                        <section class="container_6 clearfix">
                            <div class="grid_6 clearfix" style="width:98%;">
                                <table class="display">
                                    <thead>
                                        <tr>
                                            <th width="5%" class="ui-state-default">No</th>
                                            <th class="ui-state-default">NIP</th>
                                            <th class="ui-state-default">Nama User</th>
                                            <!--<th class="ui-state-default">Username</th>-->
                                            <th class="ui-state-default">User Level</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php foreach($fields as $row): ?>
									<?php $no=$no+1; ?>
                                        <tr>
                                        	<td><?=$no?></td>
                                            <td><?=$row->NIP?></td>
                                            <td><?=$row->nama_asli?></td>
                                            <!--<td><?=$row->username?></td>-->
                                            <td><?=$row->nama_level?></td>
                                            <td width="70px">
											<div align="center">
											<a onClick="edit(<?=$row->id_user?>);" class="iconApp" title="Edit">
											<img src="<?=base_url()?>images/icons/edit.png" ></a>
                                            <a onClick="hapus(<?=$row->id_user?>);" class="iconApp" title="Hapus">
											<img src="<?=base_url()?>images/icons/hapus.png" >
											</a>
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