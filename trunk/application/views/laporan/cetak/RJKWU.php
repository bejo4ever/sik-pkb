<page backtop="60px" backbottom="15px" backleft="5px" backright="5px" width="100%">
	
	<page_header>
		<table style="width: 100%; border: solid 0px black;">
			<tr>
				<td style="text-align: left;	width: 23%"><img src="<?=base_url()?>dishub.png"/></td>
				<td style="text-align: center;	width: 54%">Sistem Informasi & Komunikasi Pengujian Kendaraan Bermotor</td>
				<td style="text-align: right;	width: 23%">Ditjen Hubdat</td>
			</tr>
		</table>
	</page_header>
	
	<page_footer>
		<table style="width: 100%; border: solid 0px black;">
			<tr>
				<td style="text-align:left; width: 50%"><?=date('d/m/Y')?></td>
				<td style="text-align:right; width: 50%">Halaman [[page_cu]]/[[page_nb]]</td>
			</tr>
		</table>
	</page_footer>
    
	
	<h3 align="center">Rekapitulasi Jumlah Kendaraan Wajib Uji
	<br>s.d. Bulan <?=$this->converter_model->getNamaBulan(date('m'))?> <?=date('Y')?>
	</h3>
	
	<table border="1" align="center" cellpadding="0" cellspacing="0">
		<thead>
		<tr align="center">
			<th class="ui-state-default" width="30" rowspan="2" height="30"><b>No</b></th> 
			<th class="ui-state-default" rowspan="2" width="240"><b>Jenis Kendaraan</b></th>
			<th class="ui-state-default" align="center" width="400" colspan="<?=count($statKendaraan)?>"><b>Jumlah</b></th>
			<th class="ui-state-default" rowspan="2" width="150"><b>Jumlah</b></th>
		</tr>
		<tr align="center">
			<?php foreach($statKendaraan as $d1): ?>
			<th class="ui-state-default" height="20"><b><?=$d1->detail?></b></th>
			<?php endforeach; ?>
		</tr>
		</thead>
		<tbody>
			<?php  
			$jumlahTot=0;
			foreach($kelKendaraan as $d2): 
			?>
			<tr>
				<td align="center"  height="20"><?=$a=$a+1?></td>
				<td>&nbsp;&nbsp;<?=$d2->nama_kelompok?></td>
				
				<?php 
				$jumlah=0; $idBar=0;
				foreach($statKendaraan as $d3):
					$idBar		= $idBar+1;
					$totD		= $this->kendaraanmodel->getJumlahUjiKel($d2->id_kelompokkendaraan,$d3->id_statuskendaraan);
					$jumlah		= $jumlah+$totD;
					$jumlahBar[$idBar]	= $jumlahBar[$idBar]+$totD;
				?>
				<td align="center"><?=$totD?></td>
				<?php endforeach; ?>
				<?php $jumlahTot=$jumlahTot+$jumlah; ?>
				<td align="center"><?=$jumlah?></td>
			</tr>
			<?php endforeach; ?>
			<tr>
				<td colspan="2" align="center" height="20"><b>Jumlah</b></td>
				<?php 
				foreach($statKendaraan as $d4):
				$idBar2		= $idBar2+1;
				?>
				<td align="center"><b><?=$jumlahBar[$idBar2]?></b></td>
				<?php endforeach; ?>
				<td align="center"><b><?=$jumlahTot?></b></td>
			</tr>
		</tbody>
		</table> 
	
	<br /><br />
	
	<table border="1" align="center" cellpadding="0" cellspacing="0">
		<thead>
		<tr align="center">
			<th class="ui-state-default" width="30" rowspan="2" height="30"><b>No</b></th> 
			<th class="ui-state-default" rowspan="2" width="240"><b>Subjenis Kendaraan</b></th>
			<th class="ui-state-default" align="center" width="400" colspan="<?=count($statKendaraan)?>"><b>Jumlah</b></th>
			<th class="ui-state-default" rowspan="2" width="150"><b>Jumlah</b></th>
		</tr>
		<tr align="center">
			<?php foreach($statKendaraan as $d1): ?>
			<th class="ui-state-default" height="20"><b><?=$d1->detail?></b></th>
			<?php endforeach; ?>
		</tr>
		</thead>
		<tbody>
			<?php  
			$jumlahTot=0;
			foreach($jnsKendaraan as $d2): 
			?>
			<tr>
				<td align="center"  height="20"><?=$b=$b+1?></td>
				<td>&nbsp;&nbsp;<?=$d2->detail?></td>
				
				<?php 
				$jumlah=0; $idBar=0;
				foreach($statKendaraan as $d3):
					$idBar		= $idBar+1;
					$totD		= $this->kendaraanmodel->getJumlahUji($d2->id_jeniskendaraan,$d3->id_statuskendaraan);
					$jumlah		= $jumlah+$totD;
					$jumlahBar[$idBar]	= $jumlahBar[$idBar]+$totD;
				?>
				<td align="center"><?=$totD?></td>
				<?php endforeach; ?>
				<?php $jumlahTot=$jumlahTot+$jumlah; ?>
				<td align="center"><?=$jumlah?></td>
			</tr>
			<?php endforeach; ?>
			<tr>
				<td colspan="2" align="center" height="20"><b>Jumlah</b></td>
				<?php 
				foreach($statKendaraan as $d4):
				$idBar2		= $idBar2+1;
				?>
				<td align="center"><b><?=$jumlahBar[$idBar2]?></b></td>
				<?php endforeach; ?>
				<td align="center"><b><?=$jumlahTot?></b></td>
			</tr>
		</tbody>
		</table> 

</page>