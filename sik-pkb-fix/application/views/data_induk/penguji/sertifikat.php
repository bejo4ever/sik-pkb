<!DOCTYPE html>
<html lang="en">
<head>
<script type="text/javascript" src="<?= base_url(); ?>js/global.js"></script>
<script>
	// increase the default animation speed to exaggerate the effect
	var ajax_load = '<br /><br /><center><img src="<?=base_url()?>images/loading.gif"></center>';
	function adds(id)
	{
		var url	= '<?=base_url()?>index.php/penguji/sertifikat_add/'+id;
		$.fx.speeds._default = 1000;
		$(function() {
			$( "#addSertifikat" ).dialog({
			autoOpen: false,
			width: 400,
			show: "fade",
			hide: "fade",
			modal: true,
			close: function (event,ui) { $( "#addSertifikat" ).dialog( "destroy" );  },
			open: function (event,ui) { $("#addSertifikat").html(ajax_load).load(url); }
			})
			$( "#addSertifikat" ).dialog( "open" );
		});
	}
	function editSertifikat(id)
	{
		var url	= '<?=base_url()?>index.php/penguji/sertifikat_edit/'+id;
		$.fx.speeds._default = 1000;
		$(function() {
			$( "#editSertifikat" ).dialog({
			autoOpen: false,
			width: 400,
			show: "fade",
			hide: "fade",
			modal: true,
			close: function (event,ui) { $( "#editSertifikat" ).dialog( "destroy" );  }, 
			open: function (event,ui) { $("#editSertifikat").html(ajax_load).load(url); }
			})
			$( "#editSertifikat" ).dialog( "open" );
		});
	}
	function hapusSertifikat(id)
	{
		$.fx.speeds._default = 1000;
		$(function() {
			$( "#confirDelSertifikat" ).dialog({
			autoOpen: false,
			width: 300,
			show: "fade",
			hide: "fade",
			modal: true,
			buttons:{  
						"Hapus": function(){ location.href='<?=base_url()?>index.php/penguji/sertifikat_delete/'+id; 
						$( this ).dialog( "close" ); },
						"Batalkan": function() { $( this ).dialog( "close" ); }
					}})
			$( "#confirDelSertifikat" ).dialog( "open" );
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
	
	<div id="addSertifikat" title="Tambah Sertifikat Penguji" style="display:none"></div>
	<div id="editSertifikat" title="Update Data Sertifikat Penguji" style="display:none"></div>
	<div id="confirDelSertifikat" title="Hapus Data Sertifikat Penguji" style="display:none"><p>Anda Yakin Akan Menghapus Data Ini ?</p></div>
		   <div class="grid_8 clearfix" style="width:100%; margin:5px 0 5px 0;">
		   				
            <table width="100%" >
            	<tr>
                	<td width="25%">N I P<br>NRP<br>Nama Penguji<br>Jabatan Fungsional<br>Status</td>
                    <td>:<br>:<br>:<br>:<br>:</td>
                    <td><?= $nip_penguji; ?><br><?= $NRP; ?><br><?= $nama_penguji; ?><br><?=$jabatan?><br><?=$status?></td>
					<td align="right" style="margin-right:10px;" rowspan="2">
					<img src="<?=base_url()?>images/foto/default.png" height="70"></td>
                </tr>
            </table>
            
            <table width="100%" class="display2" style="border:1px #CCCCCC solid;">
			<thead>
			<tr>
				<th class="ui-state-default" width="5%">No</th>
				<th class="ui-state-default">No Sertifikat</th>
				<th class="ui-state-default">Tgl Terbit</th>
				<th class="ui-state-default">Lembaga Penerbit</th>
				<th class="ui-state-default">Jenis Sertifikat</th>
				<?php if($display!="hidden"){ ?>
					<th class="ui-state-default">Aksi</th>
				<?php } ?>
			</tr>
			</thead>
			<tbody>
			<?php foreach($data as $d):?>
			<tr align="center">
				<td> <?=$a=$a+1?></td>
				<td> <?=$d->no_sertifikat?></td>
				<td> <?=$d->tgl_terbit?></td>
				<td> <?=$d->lembaga_penerbit?></td>
				<td> <?=$d->jenis_sertifikat?></td>
				<?php if($display!="hidden"){ ?>
				<td valign="middle">
					<div align="center" style="margin-top:6px;">
						<a onClick="javascript:editSertifikat('<?= $d->no_sertifikat; ?>')" class="iconApp" title="Edit">
						<img src="<?=base_url()?>images/icons/edit.png" ></a>
						<a  onClick="javascript:hapusSertifikat('<?= $d->no_sertifikat; ?>')" class="iconApp" title="Hapus">
						<img src="<?=base_url()?>images/icons/hapus.png" >
						</a>
					</div>
				</td>
				<?php } ?>
			</tr>
			<?php endforeach; ?>
			<?php if(count($data)==0){ ?>
			<tr>
				<td colspan="6"><center>Tidak ada Sertifikat</center></td>
			</tr>
			<?php } ?>
			</tbody>
			</table>
			</div>
		<br>
		<div align="right" style="margin-top:20px;">
			<?php if($display!="hidden"){ ?>
			<button class="button" style="width:140px; height:25px;" type="button" data-icon-primary="ui-icon-circle-plus" onClick="javascript:adds('<?= $nrp; ?>');">Tambah Sertifikat</button>
			<?php } ?>
			<button class="button" style="width:80px; height:25px;" type="button" data-icon-primary="ui-icon-circle-close" onClick="$('#sertifikasi' ).dialog('close');">Tutup</button>
		</div>
	
</body>
</html>