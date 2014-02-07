<!DOCTYPE html>

<html lang="en">

<head>
	<?= $inc; ?>
	
	<script>
	// increase the default animation speed to exaggerate the effect
	var ajax_load = '<br /><br /><center><img src="<?=base_url()?>images/loading.gif"></center>';

	function detail(id)
	{
		var url	= '<?=base_url()?>index.php/kendaraan/detail/'+id;
		$.fx.speeds._default = 1000;
		$(function() {
			$( "#detailData" ).dialog({
			autoOpen: false,
			width: 700,
			height: 580,
			show: "fade",
			hide: "fade",
			buttons:{ "Tutup": function() { $( this ).dialog( "close" ); }},
			modal: true,
			close: function (event,ui) { $( "#detailData" ).dialog( "destroy" );  }, 
			open: function (event,ui) { $("#detailData").html(ajax_load).load(url); }
			})
			$( "#detailData" ).dialog( "open" );
		});
	}
	</script>
</head>

<body style="overflow: hidden;">

	<div id="detailData" style="display:none" title="Detail Data Pendaftar"></div>

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
                    <?= $submenu2; ?>
                    <div class="main-content" style="min-height:500px">

                        <header>
							<ul class="action-buttons clearfix">
								<li><a href="<?= base_url() ?>index.php/pendaftaran/ujiBaru" class="button" data-icon-primary="ui-icon-plusthick">Uji Baru</a></li>
								<li><a href="<?= base_url() ?>index.php/pendaftaran/ujiBerkala" class="button" data-icon-primary="ui-icon-plusthick">Uji Berkala</a></li>
                            </ul>
                            <h2>
								Pendaftaran Pengujian
                            </h2>
                        </header>

                        <section class="container_6 clearfix">
                            <div class="grid_6 clearfix" style="margin-top:-20px;">
                                <table class="display">
                                    <thead>
                                        <tr>
											<th class="ui-state-default">No. Daftar</th>
                                            <th class="ui-state-default">Tanggal Daftar</th>
											<th class="ui-state-default">No. Uji</th>
                                            <th class="ui-state-default">No. Kendaraan</th>
											<th class="ui-state-default">Nama Pemilik</th>
                                            <th class="ui-state-default">Merek</th>
                                            <th class="ui-state-default">Type</th>
											<th class="ui-state-default">No. SRUT</th>
											<th class="ui-state-default">Permohonan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php foreach($data as $dat): ?>
										<?php
											if ($dat->tipe_pendaftaran=="baru")
												{ $permohonan = "Uji Baru"; }
											elseif ($dat->tipe_pendaftaran=="berkala")
												{ $permohonan = "Uji Berkala"; }
											elseif ($dat->tipe_pendaftaran=="numpang")
												{ $permohonan = "Numpang Uji"; }
											else{ $permohonan = "Uji Ulang"; }
										?>
                                        <tr>
                                        	<td><?=$dat->no_pendaftaran?></td>
											<td><?=$this->converter_model->tgl_time_Eng_In($dat->tgl_pendaftaran)?></td>
                                        	<td><?=$dat->no_uji?></td>
                                            <td><?=$dat->no_kendaraan?></td>
                                            <td><?=$dat->nama_pendaftar?></td>
                                            <td><?=$dat->merek?></td>
                                            <td><?=$dat->tipe?></td>
                                        	<td><?=$dat->no_srut?></td>
											<td><?=$permohonan?></td>
                                            <td align="center">
												<a onClick="detail('<?=$dat->no_srut?>');" class="iconApp" title="Detail Pendaftar">
												<img src="<?=base_url()?>images/icons/detail.png" ></a>
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