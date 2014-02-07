
<page backtop="5px" backbottom="5px" backleft="5px" backright="5px" width="100%">
	
	<table style="width:100%;" border='0' cellpadding='0' cellspacing='0' align='center'>
	<tr>
		<td align='left' width="750">
			<h3>MASA BERLAKU UJI BERKALA</h3><h4 style="margin-top:-15px">(<i>PERIODICAL INSPECTION VALIDITY</i>)</h4>
		</td>
		<td width="200" align="right" align="center">
		<h3>02 Des 2012</h3>
		</td>
	</tr>
	</table>
	<?php
	foreach($dKendaraan as $d3)
	{
		$panjang	= $d3->panjang;
		$lebar		= $d3->lebar;
		$tinggi		= $d3->tinggi;
		$bk			= $d3->bk_sumbu_1+$d3->bk_sumbu_2+$d3->bk_sumbu_3+$d3->bk_sumbu_4;
		$orang		= $d3->orang;
		$barang		= $d3->barang;
		$jbi		= $d3->JBI;
		$jbki		= $d3->JBKI;
		$mst		= $d3->MST;
		$kjt		= $d3->KJT;
	}
	?>
	<br />
	<table style="width:100%;" border='0' cellpadding='0' cellspacing='0' align='left'>
	<tr style="font-size:16px">
		<td width="400" align="left">
			<label><b><u>BERAT KOSONG KENDARAAN</u><br>
			<p style="margin-top:-1px;"><i>(KERB WEIGHT)</i></p></b></label>
		</td>
		<td width="200">:</td>
		<td width="300" align="right"><b style="font-size:24px"><?=$bk?></b></td>
		<td width="100" align="center"><b>Kg</b></td>
	</tr>
	<tr style="font-size:16px">
		<td align="left">
			<label><b>PANJANG KENDARAAN <i>(LENGTH)</i></b></label>
		</td>
		<td >:</td>
		<td align="right"><b style="font-size:24px"><?=$panjang?> </b></td>
		<td align="center"><b>mm</b></td>
	</tr>
	<tr style="font-size:16px">
		<td align="left">
			<label><b>LEBAR KENDARAAN <i>(WIDTH)</i></b></label>
		</td>
		<td >:</td>
		<td align="right"><b style="font-size:24px"><?=$lebar?> </b></td>
		<td align="center"><b>mm</b></td>
	</tr>
	<tr style="font-size:16px">
		<td align="left">
			<label><b>TINGGI KENDARAAN <i>(HEIGHT)</i></b></label>
		</td>
		<td >:</td>
		<td align="right"><b style="font-size:24px"><?=$tinggi?> </b></td>
		<td align="center"><b>mm</b></td>
	</tr>
	<tr style="font-size:16px">
		<td align="left">
			<label><b>J.B.B <i>(G.V.W)</i></b></label>
		</td>
		<td >:</td>
		<td align="right"><b style="font-size:24px"><?=$jbki?></b></td>
		<td align="center"><b>Kg</b></td>
	</tr>
	<tr style="font-size:16px">
		<td align="left">
			<label><b>J.B.I <i>(G.P.W)</i></b></label>
		</td>
		<td >:</td>
		<td align="right"><b style="font-size:24px"><?=$jbi?></b></td>
		<td align="center"><b>Kg</b></td>
	</tr>
	<tr style="font-size:16px">
		<td align="left">
			<label><b>M.S.T <i>(M.A.L)</i></b></label>
		</td>
		<td >:</td>
		<td align="right"><b style="font-size:24px"><?=$mst?></b></td>
		<td align="center"><b>Kg</b></td>
	</tr>
	<tr style="font-size:16px">
		<td align="left" colspan="4">
			<br /><label><b>DAYA ANGKUT <i>(PAY LOAD)</i></b></label>
		</td>
	</tr>
	<tr style="font-size:16px">
		<td align="left">
			<label><b>ORANG <i>(60 KG/PERSON)</i></b></label>
		</td>
		<td >:</td>
		<td align="right"><b style="font-size:18px"><?=$orang?> Org, Equivalent <span style="width:200px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?=$orang*60?> </span> </b></td>
		<td align="center"><b>Kg</b></td>
	</tr>
	<tr style="font-size:16px">
		<td align="left">
			<label><b>BARANG <i>(GOODS)</i></b></label>
		</td>
		<td >:</td>
		<td align="right"><b style="font-size:24px"><?=$barang?> </b></td>
		<td align="center"><b>Kg</b></td>
	</tr>
	<tr style="font-size:16px">
		<td width="400" align="left">
			<label><b><u>KELAS JALAN TERENDAH</u><br>
			<p style="margin-top:-1px;"><i>(LOWEST ROAD CLASS)</i></p></b></label>
		</td>
		<td width="200">:</td>
		<td width="300" align="right"><b style="font-size:24px"> <?=$kjt?> </b></td>
		<td width="100" align="center"><b></b></td>
	</tr>
	<tr style="font-size:16px">
		<td width="400" align="left">
			<label><b><u>DINAS / KANTOR</u><br>
			<p style="margin-top:-1px;"><i>(VEHICLE INSPECTION OFFICE)</i></p></b></label>
		</td>
		<td width="200">:</td>
		<td width="300" align="right"><b style="font-size:24px"><?=strtoupper($this->session->userdata('nmUnit'));?></b></td>
		<td width="100" align="center"></td>
	</tr>
	<tr style="font-size:14px">
		<td colspan="3" align="right">&nbsp;</td>
		<td colspan="1" align="right">
			<br /><br /><br /><p align="center" style="margin-left:-40px;">
			<span style="font-size:16px; letter-spacing:1">Penguji Kendaraan Bermotor</span><br />
			<b>Penyelia/Pelaksana Lanjutan</b><br />
			<i>(INSPECTOR)</i><br /><br /><br />
			</p>
			<p align="left" style="margin-left:-40px;">
			Penguji<hr style="width:150px;" />
			NO REG :
			</p>
		</td>
	</tr>
	</table>
	
</page>
