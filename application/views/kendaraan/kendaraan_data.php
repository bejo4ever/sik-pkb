<!DOCTYPE html>

<html lang="en">

<head>
	<?= $inc; ?>

	<script>
	// increase the default animation speed to exaggerate the effect
	var ajax_load = '<br /><br /><center><img src="<?=base_url()?>images/loading.gif"></center>';
	
	function add()
	{
		var url	= '<?=base_url()?>index.php/kendaraan/addKendaraan';
		$.fx.speeds._default = 1000;
		$(function() {
			$( "#addForm" ).dialog({
			autoOpen: false,
			width: 1000,
			height: 670,
			show: "fade",
			hide: "fade",
			modal: true,
			close: function (event,ui) { $( "#addForm" ).dialog( "destroy" );  }, 
			open: function (event,ui) { $("#addForm").html(ajax_load).load(url); }
			})
			$( "#addForm" ).dialog( "open" );
		});
	}
	
	function detailPemilik(id)
	{
		var url	= '<?=base_url()?>index.php/kendaraan/detail/'+id;
		$.fx.speeds._default = 1000;
		$(function() {
			$( "#detailDataPemilik" ).dialog({
			autoOpen: false,
			width: 700,
			height: 585,
			show: "fade",
			hide: "fade",
			buttons:{ "Tutup": function() { $( this ).dialog( "close" ); }},
			modal: true,
			close: function (event,ui) { $( "#detailDataPemilik" ).dialog( "destroy" );  }, 
			open: function (event,ui) { $("#detailDataPemilik").html(ajax_load).load(url); }
			})
			$( "#detailDataPemilik" ).dialog( "open" );
		});
	}
	
	function bukuuji(id)
	{
		var url	= '<?=base_url()?>index.php/kendaraan/bukuuji/'+id;
		$.fx.speeds._default = 1000;
		$(function() {
			$( "#bukuuji" ).dialog({
			autoOpen: false,
			width: 600,
			height: 600,
			show: "fade",
			hide: "fade",
			buttons:{ "Cetak" : function() { popup('<?=base_url()?>/index.php/kendaraan/printpdf/'+id); }, "Tutup": function() { $( this ).dialog( "close" ); } },
			modal: true,
			close: function (event,ui) { $( "#bukuuji" ).dialog( "destroy" );  }, 
			open: function (event,ui) { $("#bukuuji").html(ajax_load).load(url); }
			})
			$( "#bukuuji" ).dialog( "open" );
		});
	}
	
	function popup(url) 
	{
		newwindow=window.open(url,'bukuuji','height=600,width=800');
		if (window.focus) {newwindow.focus()}
		return false;
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
				"Hapus": function(){ location.href='<?=base_url()?>index.php/kendaraan/hapus/'+id; 
				$( this ).dialog( "close" ); },
				"Batalkan": function() { $( this ).dialog( "close" ); }
			}})
			$( "#confirDel" ).dialog( "open" );
		});
	}
	</script>
	
</head>

<body style="overflow: hidden;">

	<div id="confirDel" title="Hapus Data" style="display:none">
		<p>Apakah anda yakin akan menghapus data ini?</p>
	</div>
	
	<div id="addForm" style="display:none" title="Tambah Data Kendaraan"></div>
	<div id="detailDataPemilik" style="display:none" title="Detail Kendaraan"></div>
	<div id="bukuuji" style="display:none" title="Buku Uji Kendaraan"></div>

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
					<ul class="action-buttons clearfix">
						<li><a class="button" onClick="javascript:add();" data-icon-primary="ui-icon-plusthick">Tambah Kendaraan</a></li>
					</ul>
					<h2>
						Data Master Kendaraan
					</h2>
				</header>

				<section class="container_6 clearfix">
				<div class="grid_6 clearfix" style="margin-top:-20px;">
					<table class="display">
						<thead>
							<tr>
								<th class="ui-state-default">No. Uji</th>
								<th class="ui-state-default">No. Kendaraan</th>
								<th class="ui-state-default">Pemilik</th>
								<th class="ui-state-default">Alamat</th>
								<th class="ui-state-default">Jenis Kendaraan</th>
								<th class="ui-state-default">Merek</th>
								<th class="ui-state-default">Tipe</th>
								<th class="ui-state-default">No. SRUT</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($data as $dat): ?>
							<tr>
								<td><?=$dat->no_uji?></td>
								<td><?=$dat->no_kendaraan?></td>
								<td><?=$dat->nama?></td>
								<td><?=$dat->alamat?></td>
								<td><?=$dat->detail?></td>
								<td><?=$dat->merek?></td>
								<td><?=$dat->tipe?></td>
								<td><?=$dat->no_srut?></td>
								<td>
									<div align="center">
										<a onClick="detailPemilik('<?=$dat->no_srut?>');" class="iconApp" title="Detail Kendaraan">
										<img src="<?=base_url()?>images/icons/detail.png" ></a>
										<a onClick="bukuuji('<?=$dat->no_srut?>');" class="iconApp" title="Buku Uji">
										<img src="<?=base_url()?>images/icons/buku.png" ></a>
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