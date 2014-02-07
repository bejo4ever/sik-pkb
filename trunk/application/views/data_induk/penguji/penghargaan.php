<!DOCTYPE html>
<html lang="en">
<head>
<script type="text/javascript" src="<?= base_url(); ?>js/global.js"></script>
<script>
	// increase the default animation speed to exaggerate the effect
	var ajax_load = '<br /><br /><center><img src="<?=base_url()?>images/loading.gif"></center>';
	function adds(id)
	{
		var url	= '<?=base_url()?>index.php/penguji/penghargaan_add/'+id;
		$.fx.speeds._default = 1000;
		$(function() {
			$( "#addPenghargaan" ).dialog({
			autoOpen: false,
			width: 400,
			show: "fade",
			hide: "fade",
			modal: true,
			close: function (event,ui) { $( "#addPenghargaan" ).dialog( "destroy" );  },
			open: function (event,ui) { $("#addPenghargaan").html(ajax_load).load(url); }
			})
			$( "#addPenghargaan" ).dialog( "open" );
		});
	}
	function editPenghargaan(id)
	{
		var url	= '<?=base_url()?>index.php/penguji/penghargaan_edit/'+id;
		$.fx.speeds._default = 1000;
		$(function() {
			$( "#editPenghargaan" ).dialog({
			autoOpen: false,
			width: 400,
			show: "fade",
			hide: "fade",
			modal: true,
			close: function (event,ui) { $( "#editPenghargaan" ).dialog( "destroy" );  }, 
			open: function (event,ui) { $("#editPenghargaan").html(ajax_load).load(url); }
			})
			$( "#editPenghargaan" ).dialog( "open" );
		});
	}
	function hapusPenghargaan(id)
	{
		$.fx.speeds._default = 1000;
		$(function() {
			$( "#confirDelPenghargaan" ).dialog({
			autoOpen: false,
			width: 300,
			show: "fade",
			hide: "fade",
			modal: true,
			buttons:{  
						"Hapus": function(){ location.href='<?=base_url()?>index.php/penguji/penghargaan_delete/'+id; 
						$( this ).dialog( "close" ); },
						"Batalkan": function() { $( this ).dialog( "close" ); }
					}})
			$( "#confirDelPenghargaan" ).dialog( "open" );
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
	
	<div id="addPenghargaan" title="Tambah Penghargaan Penguji" style="display:none"></div>
	<div id="editPenghargaan" title="Update Data Penghargaan" style="display:none"></div>
	<div id="confirDelPenghargaan" title="Hapus Data Penghargaan" style="display:none"><p>Anda Yakin Akan Menghapus Data Ini ?</p></div>
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
				<th class="ui-state-default">Penghargaan yang diterima</th>
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
				<td> <?=$d->penghargaan?></td>
				<?php if($display!="hidden"){ ?>
				<td valign="middle">
					<div align="center" style="margin-top:6px;">
						<a onClick="javascript:editPenghargaan('<?= $d->kd_penghargaan; ?>')" class="iconApp" title="Edit">
						<img src="<?=base_url()?>images/icons/edit.png" ></a>
						<a  onClick="javascript:hapusPenghargaan('<?= $d->kd_penghargaan; ?>')" class="iconApp" title="Hapus">
						<img src="<?=base_url()?>images/icons/hapus.png" >
						</a>
					</div>
				</td>
				<?php } ?>
			</tr>
			<?php endforeach; ?>
			<?php if(count($data)==0){ ?>
			<tr>
				<td colspan="6"><center>Tidak ada Penghargaan tersimpan</center></td>
			</tr>
			<?php } ?>
			</tbody>
			</table>
			</div>
		<br>
		<div align="right" style="margin-top:20px;">
			<?php if($display!="hidden"){ ?>
			<button class="button" style="width:170px; height:25px;" type="button" data-icon-primary="ui-icon-circle-plus" onClick="javascript:adds('<?= $nrp ?>');">Tambah Penghargaan</button>
			<?php } ?>
			<button class="button" style="width:80px; height:25px;" type="button" data-icon-primary="ui-icon-circle-close" onClick="$('#penghargaan' ).dialog('close');">Tutup</button>
		</div>
	
</body>
</html>