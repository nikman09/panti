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
        <p align="center"><b> PANTI SOSIAL BINA NETRA "FAJAR HARAPAN"  PROVINSI KALIMANTAN SELATAN 
		<br/>Daftar Hadir Instruktur</b> </p>
		<p align="left">Kelompok Belajar : <?php echo $rombel->rombel ?>  <br/>
			Tanggal :    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp-<br/>
		</p>
        <hr/>
        <br/>
        <table border="1px" cellspacing="0" border-color="#000" style="margin-left:50px;width:90%">
        <thead>
			<tr>
				<th>No</th>
				<th>Hari</th>
				<th>Nama Instruktur</th>
				<th>Mata Pelajaran</th>
				<th>Waktu</th>
				<th>Tanda Tangan</th>
			</tr>
		
		</thead>
		<tbody>
			<?php
			$i=0;
			$jumlah = $senin->num_rows();
			foreach ($senin->result() as $dt ) {
				 $i++;
			?>
			<tr>
				<td style="width:2%"><?php echo $i; ?></td>
				<?php if($i==1){ ?> <td rowspan='<?php echo $jumlah ?>'>Senin</td> <?php }?>
				<td><?php echo $dt->nama_pegawai; ?></td>
				<td><?php echo $dt->mapel; ?></td>
				<td><?php echo $dt->jam; ?></td>
				<td></td>
			</tr>
			<?php
			}
		  ?>

			<?php
			$i=0;
			$jumlah = $selasa->num_rows();
			foreach ($selasa->result() as $dt ) {
				 $i++;
			?>
			<tr>
				<td style="width:2%"><?php echo $i; ?></td>
				<?php if($i==1){ ?> <td rowspan='<?php echo $jumlah ?>'>Selasa</td> <?php }?>
				<td><?php echo $dt->nama_pegawai; ?></td>
				<td><?php echo $dt->mapel; ?></td>
				<td><?php echo $dt->jam; ?></td>
				<td></td>
			</tr>
			<?php
			}
		  ?>
		  <?php
			$i=0;
			$jumlah = $rabu->num_rows();
			foreach ($rabu->result() as $dt ) {
				 $i++;
			?>
			<tr>
				<td style="width:2%"><?php echo $i; ?></td>
				<?php if($i==1){ ?> <td rowspan='<?php echo $jumlah ?>'>Rabu</td> <?php }?>
				<td><?php echo $dt->nama_pegawai; ?></td>
				<td><?php echo $dt->mapel; ?></td>
				<td><?php echo $dt->jam; ?></td>
				<td></td>
			</tr>
			<?php
			}
		  ?>
		  <?php
			$i=0;
			$jumlah = $kamis->num_rows();
			foreach ($kamis->result() as $dt ) {
				 $i++;
			?>
			<tr>
				<td style="width:2%"><?php echo $i; ?></td>
				<?php if($i==1){ ?> <td rowspan='<?php echo $jumlah ?>'>Kamis</td> <?php }?>
				<td><?php echo $dt->nama_pegawai; ?></td>
				<td><?php echo $dt->mapel; ?></td>
				<td><?php echo $dt->jam; ?></td>
				<td></td>
			</tr>
			<?php
			}
		  ?>
		  <?php
			$i=0;
			$jumlah = $jumat->num_rows();
			foreach ($jumat->result() as $dt ) {
				 $i++;
			?>
			<tr>
				<td style="width:2%"><?php echo $i; ?></td>
				<?php if($i==1){ ?> <td rowspan='<?php echo $jumlah ?>'>Jumat</td> <?php }?>
				<td><?php echo $dt->nama_pegawai; ?></td>
				<td><?php echo $dt->mapel; ?></td>
				<td><?php echo $dt->jam; ?></td>
				<td></td>
			</tr>
			<?php
			}
		  ?>
		  <?php
			$i=0;
			$jumlah = $sabtu->num_rows();
			foreach ($sabtu->result() as $dt ) {
				 $i++;
			?>
			<tr>
				<td style="width:2%"><?php echo $i; ?></td>
				<?php if($i==1){ ?> <td rowspan='<?php echo $jumlah ?>'>Sabtu</td> <?php }?>
				<td><?php echo $dt->nama_pegawai; ?></td>
				<td><?php echo $dt->mapel; ?></td>
				<td><?php echo $dt->jam; ?></td>
				<td></td>
			</tr>
			<?php
			}
		  ?>
		  <?php
			$i=0;
			$jumlah = $minggu->num_rows();
			foreach ($minggu->result() as $dt ) {
				 $i++;
			?>
			<tr>
				<td style="width:2%"><?php echo $i; ?></td>
				<?php if($i==1){ ?> <td rowspan='<?php echo $jumlah ?>'>Minggu</td> <?php }?>
				<td><?php echo $dt->nama_pegawai; ?></td>
				<td><?php echo $dt->mapel; ?></td>
				<td><?php echo $dt->jam; ?></td>
				<td></td>
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
