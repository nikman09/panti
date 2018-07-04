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
        <p align="center"><b> DATA PENYALURAN KLIEN  PANTI SOSIAL BINA NETRA "FAJAR HARAPAN"  
        <br/>PROVINSI KALIMANTAN SELATAN</B>
        <hr/>
        <br/>
        <table border="1px" cellspacing="0" border-color="#000" style="margin-left:50px;width:90%">
        <thead>
			<tr>
				<th class="center">No</th>
				<th class="center">Tanggal Disalurkan</th>
				<th class="center">Nama Klien</th>
				<th class="center">NIR</th>
				<th class="center">Jenis Kelamin</th>
				<th class="center">Nilai</th>
				<th class="center">ACC Pembinaan</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$i=1;
			foreach ($data->result() as $dt ) {			
			?>
			<tr>
				<td class="center"><?php echo $i++; ?></td>
				<!-- 	 -->
				<td ><?php echo tgl_indo($dt->tgl_disalurkan) ?></td>
				<td ><?php echo $dt->nama_klien; ?></td>
				<td ><?php echo $dt->nir; ?></td>
				<td ><?php echo $dt->sex; ?></td>
				<td ><?php echo $dt->nilai; ?></td>
				<td ><?php echo $dt->acc_pembinaan=="Y"?"<a style='color:green'>ACC</a>":"<a style='color:red'>TIDAK ACC</a>" ?></td>
				
			</tr>
			<?php
			}
		  ?>

		</tbody>
	</table>
    <br/><br/>
        <div style="float:right;width:300px">
            <p align="center"> Martapura, <?php echo date('d-M-Y') ?>
                <br/> Kepala Panti Sosial <br/><br/><br/><br/>
               <b>Drs. H. M. Masir, M.Ap</b> <br/>
               Pembina Tk I <br/>
               NIP. 19640611 199103 1 009
            </p>
        </div>

   
	</page>
</body>
</html>
<script>
window.print();
</script>
