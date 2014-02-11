<!DOCTYPE html>
<html lang="en">
<head>
<script type="text/javascript" src="<?= base_url(); ?>js/global.js"></script>
<script>
	// increase the default animation speed to exaggerate the effect
	var ajax_load = '<br /><br /><center><img src="<?=base_url()?>images/loading.gif"></center>';
	function adds(id)
	{
		var url	= '<?=base_url()?>index.php/penguji/sanksi_add/'+id;
		$.fx.speeds._default = 1000;
		$(function() {
			$( "#addSanksi" ).dialog({
			autoOpen: false,
			width: 400,
			show: "fade",
			hide: "fade",
			modal: true,
			close: function (event,ui) { $( "#addSanksi" ).dialog( "destroy" );  },
			open: function (event,ui) { $("#addSanksi").html(ajax_load).load(url); }
			})
			$( "#addSanksi" ).dialog( "open" );
		});
	}
	function editSanksi(id)
	{
		var url	= '<?=base_url()?>index.php/penguji/sanksi_edit/'+id;
		$.fx.speeds._default = 1000;
		$(function() {
			$( "#editSanksi" ).dialog({
			autoOpen: false,
			width: 400,
			show: "fade",
			hide: "fade",
			modal: true,
			close: function (event,ui) { $( "#editSanksi" ).dialog( "destroy" );  }, 
			open: function (event,ui) { $("#editSanksi").html(ajax_load).load(url); }
			})
			$( "#editSanksi" ).dialog( "open" );
		});
	}
	function hapusSanksi(id)
	{
		$.fx.speeds._default = 1000;
		$(function() {
			$( "#confirDelSanksi" ).dialog({
			autoOpen: false,
			width: 300,
			show: "fade",
			hide: "fade",
			modal: true,
			buttons:{  
						"Hapus": function(){ location.href='<?=base_url()?>index.php/penguji/sanksi_delete/'+id; 
						$( this ).dialog( "close" ); },
						"Batalkan": function() { $( this ).dialog( "close" ); }
					}})
			$( "#confirDelSanksi" ).dialog( "open" );
		});
	}
	
	
	</script>
</head>
<body>
	
	<?php 
		$userLevel=$this->session->userdata('id_level');
		if($userLevel!="1")
		{
			$display='hidden';
		}else{
			$display='block';
		}
	?>
	
	<div id="addSanksi" title="Tambah Sanksi Penguji" style="display:none"></div>
	<div id="editSanksi" title="Update Sanksi Penguji" style="display:none"></div>
	<div id="confirDelSanksi" title="Hapus Sanksi Penguji" style="display:none"><p>Anda Yakin Akan Menghapus Data Ini ?</p></div>
		   <div class="grid_8 clearfix" style="width:100%; margin:5px 0 5px 0;">
		   				
            <table width="100%" >
            	<tr>
                	<td width="25%">N I P<br>N R P<br>Nama Penguji<br>Jabatan Fungsional<br>Status</td>
                    <td>:<br>:<br>:<br>:<br>:</td>
                    <td><?= $nip_penguji; ?><br><?= $nrp; ?><br><?= $nama_penguji; ?><br><?=$jabatan?><br><?=$status?></td>
					<td align="right" style="margin-right:10px;" rowspan="2">
					<img src="<?=base_url()?>images/foto/default.png" height="70"></td>
                </tr>
            </table>
            
            <table width="100%" class="display2" style="border:1px #CCCCCC solid;">
			<thead>
			<tr>
				<th class="ui-state-default" width="5%">No</th>
				<th width="10%" class="ui-state-default">Tahun</th>
				<th class="ui-state-default">Sanksi yang diterima</th>
				<?php if($display!="hidden"){ ?>
					<th width="8%" class="ui-state-default">Aksi</th>
				<?php } ?>
			</tr>
			</thead>
			<tbody>
			<?php foreach($data as $d):?>
			<tr align="center">
				<td> <?=$a=$a+1?></td>
				<td> <?=$d->tahun?></td>
				<td> <?=$d->sanksi?></td>
				<?php if($display!="hidden"){ ?>
				<td valign="middle">
					<div align="center" style="margin-top:6px;">
						<a onClick="javascript:editSanksi('<?= $d->kd_sanksi; ?>')" class="iconApp" title="Edit">
						<img src="<?=base_url()?>images/icons/edit.png" ></a>
						<a  onClick="javascript:hapusSanksi('<?= $d->kd_sanksi; ?>')" class="iconApp" title="Hapus">
						<img src="<?=base_url()?>images/icons/hapus.png" >
						</a>
					</div>
				</td>
				<?php } ?>
			</tr>
			<?php endforeach; ?>
			<?php if(count($data)==0){ ?>
			<tr>
				<td colspan="6"><center>Tidak ada Sanksi tersimpan</center></td>
			</tr>
			<?php } ?>
			</tbody>
			</table>
			</div>
		<br>
		<div align="right" style="margin-top:20px;">
			<?php if($display!="hidden"){ ?>
			<button class="button" style="width:140px; height:25px;" type="button" data-icon-primary="ui-icon-circle-plus" onClick="javascript:adds('<?= $nrp ?>');">Tambah Sanksi</button>
			<?php } ?>
			<button class="button" style="width:80px; height:25px;" type="button" data-icon-primary="ui-icon-circle-close" onClick="$('#sanksi' ).dialog('close');">Tutup</button>
		</div>
	
</body>
</html>