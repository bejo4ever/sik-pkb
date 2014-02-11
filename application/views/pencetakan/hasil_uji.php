<!DOCTYPE html>

<html lang="en">

<head>
	<?= $inc; ?>

	<script>
	// increase the default animation speed to exaggerate the effect
	var ajax_load = '<br /><br /><center><img src="<?=base_url()?>images/loading.gif"></center>';
	
	function detail(id)
	{
		var url	= '<?=base_url()?>index.php/pencetakan/hasilPengujianDet/'+id;
		$.fx.speeds._default = 1000;
		$(function() {
			$( "#detailForm" ).dialog({
			autoOpen: false,
			width: 600,
			show: "fade",
			hide: "fade",
			modal: true,
			close: function (event,ui) { $( "#detailForm" ).dialog( "destroy" );  }, 
			open: function (event,ui) { $("#detailForm").html(ajax_load).load(url); }
			})
			$( "#detailForm" ).dialog( "open" );
		});
	}
	</script>

</head>

<body style="overflow: hidden;">

	<div id="detailForm" title="Status Pengujian" style="display:none"></div>

    <div id="loading"> 
        <script type = "text/javascript"> 
            document.write("<div id='container'><p id='content'>" +"<img id='loadinggraphic' width='16' height='16' src='<?= base_url() ?>images/ajax-loader-eeeeee.gif' /> " + "Loading...</p></div>");
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
                        	<h2>
                                Pencetakan Hasil Uji
                            </h2>
                        </header>
                        <section class="container_6 clearfix">
                            <div class="grid_6 clearfix" style="margin-top:-10px;">
                                <table class="display">
                                    <thead>
                                         <tr>
											<th class="ui-state-default">No. Uji</th>
											<th class="ui-state-default">Tanggal Pengujian</th>
                                            <th class="ui-state-default">Jenis Pengujian</th>
											<th class="ui-state-default">Nama Pendaftar</th>
                                            <th class="ui-state-default">No. Kendaraan</th>
                                            <th class="ui-state-default">Merek</th>
                                            <th class="ui-state-default">Type</th>
											<th class="ui-state-default">Hasil</th>
                                            <th width="10%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php foreach($data as $dat): ?>
										<?php $i=$i+1; ?>
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
                                        	<td><?=$dat->no_uji?></td>
											<td><?=$this->converter_model->tgl_Eng_In($this->pengujianmodel->getVerifikasi($dat->no_pendaftaran,"tgl"))?></td>
											<td><?=$permohonan?></td>
                                            <td><?=$dat->nama_pendaftar?></td>
                                            <td><?=$dat->no_kendaraan?></td>
                                            <td><?=$dat->merek?></td>
                                            <td><?=$dat->tipe?></td>
											<?php $hasilUji=$this->pengujianmodel->getVerifikasi($dat->no_pendaftaran,"status"); ?>
											<td><b><?=$hasilUji?></b></td>
                                            <td align="center">
	                                            <a href="<?= base_url() ?>index.php/pencetakan/hasilPengujianDet/<?=$dat->no_pendaftaran?>" class="iconApp" title="Lihat Hasil Pengujian"><img src="<?=base_url()?>images/icons/detail.png" ></a>
												 <a href="<?= base_url() ?>index.php/kendaraan/printPDF/<?=$dat->no_srut?>" target="_blank" class="iconApp" title="Cetak Buku Uji"><img src="<?=base_url()?>images/icons/buku.png" ></a>
												<a href="<?= base_url() ?>index.php/kendaraan/printTandaSamping/<?=$dat->no_srut?>" target="_blank" class="iconApp" title="Cetak Tanda Samping"><img src="<?=base_url()?>images/icons/sertifikat.png" ></a>
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