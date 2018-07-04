<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Laporan</title>
 <style>
	page[size="A4"] {
    background: white;
    width:29.7cm;
    min-height:  21cm;
    display: block;
    margin: 0 auto;
    padding-left: 25px;
    padding-right: 25px;
    padding-top: 25px;
    margin-bottom: 0.5cm;
    border: 1px solid #dadada;
}
* {
	font-size:12pt;
}

.halus {
	font-size:8pt;
}
.sedang {
	font-size:11pt;
}

th, td {
    padding: 5px;
	font-size: 11pt;
}

 </style>

</head>

<body>
	<page size="A4">
        <p align="center"><b> PANTI SOSIAL BINA NETRA "FAJAR HARAPAN"  PROVINSI KALIMANTAN SELATAN <br/>JADWAL PELAJARAN</b> </p>
		<p align="left">Kelompok Belajar : <?php echo $rombel->rombel ?> 
		
		</p>
        <hr/>
        <br/>
        <table border="1px" cellspacing="0" border-color="#000" style="margin-left:50px;width:90%">
        <thead>
			<tr>
				<th>No</th>
				<th>Jam</th>
				<th>Senin</th>
				<th>Selasa</th>
				<th>Rabu</th>
				<th>Kamis</th>
				<th>Jumat</th>
				<th>Sabtu</th>
				<th>Minggu</th>
			</tr>
		
		</thead>
		<tbody>
			<?php
			$i=1;
			foreach ($data->result() as $dt ) {
			?>
			<tr>
				<td style="width:2%"><?php echo $i++; ?></td>
				<td><?php echo $dt->jam; ?></td>
				<td><?php echo $dt->mpsenin; ?></td>
				<td><?php echo $dt->mpselasa; ?></td>
				<td><?php echo $dt->mprabu; ?></td>
				<td><?php echo $dt->mpkamis; ?></td>
				<td><?php echo $dt->mpjumat; ?></td>
				<td><?php echo $dt->mpsabtu; ?></td>
				<td><?php echo $dt->mpminggu; ?></td>
			</tr>
			<?php
			}
		  ?>

		</tbody>
	</table>
    <br/><br/>
        <div style="float:right;width:300px">
            <p align="center"> Martapura, <?php echo date('d-M-Y') ?>
                <br/> Kasi Pembinaan dan Resosialisasi <br/><br/><br/><br/>
               <b>Dra. Nurul Helyati</b> <br/>
               NIP. 19600721 198203 2 003
            </p>
        </div>

   
	</page>
</body>
</html>
<script>
window.print();
</script>
