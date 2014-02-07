
<page backtop="40px" backbottom="5px" backleft="5px" backright="5px" width="100%">
	
	<page_header>
		<table style="width: 100%; border: solid 0px black;">
			<tr>
				<td style="text-align: left;	width: 23%"><img src="<?=base_url()?>dishub.png"/></td>
				<td style="text-align: center;	width: 54%">SISTEM INFORMASI PENGUJIAN DAN PEMERIKSAAN KENDARAAN BERMOTOR</td>
				<td style="text-align: right;	width: 23%"><?=date('m/d/Y')?></td>
			</tr>
		</table>
	</page_header>
	
	<table border='0' cellpadding='0' cellspacing='0' align='center'>
	<tr>
		<td align='center' colspan="3" width="850">
			<h3><u>STRUK PEMBAYARAN</u></h3>
		</td>
	</tr>
	<tr align="left">
		<td width="100" height="20">No Pendaftaran</td><td width="10">:</td><td width="640"><?=$no?></td>
	</tr>
	<tr align="left">
		<td height="20">Pendaftar</td><td>:</td><td><?=$nama?></td>
	</tr>
	</table>
	
	<br />
	
	<table width='100%' border='1' cellpadding='0' cellspacing='0' align='center' style="font-size:12px">
	<tr style="font-weight:bold">
		<td align="center" height="25" width="40">No</td>
		<td width="600">&nbsp; Keterangan Biaya</td>
		<td width="80">&nbsp;Jumlah</td>
		<td width="100">&nbsp;Sub Total</td>
	</tr>
		<?php 
		for($i=0;$i<count($retribusi)-1;$i++)
		{
			$datRetribusi=$this->retribusimodel->getbyid("$retribusi[$i]")->result();
			foreach($datRetribusi as $dat2)
			{
				echo "<tr><td height='25' align='center'>".($i+1)."</td><td>&nbsp;".$dat2->deskripsi."</td><td align='center'>1</td><td align='right'>".$this->converter_model->setRp($dat2->nilai)."&nbsp;</td></tr>";
			}
			
		}
		?>
	<tr>
		<td colspan='3' align='right' height="30"><b>Jumlah Yang Dibayar</b>&nbsp;&nbsp;</td>
		<td align='right'><b><?=$jumlahBayar?></b>&nbsp;</td>
	</tr>
	</table>
	
	<br /><br />
	<table border='0' cellpadding='0' cellspacing='0' align='center'>
	<tr align="left">
		<td width="850" align="right">Petugas <br /><br /><br /></td>
	</tr>
	<tr align="left">
		<td align="right"><u> <?=$this->session->userdata('nama')?></u><br /><small>NIP : <?=$this->session->userdata('nip')?></small></td>
	</tr>
	</table>
</page>