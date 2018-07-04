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
        <p align="center"><b> DATA PENYANDANG DISABILITAS NETRA
        <br/>PESERTA PROGRAM PELAYANAN REHABILITASI SOSIAL
        <br/> PANTI SOSIAL BINA NETRA "FAJAR HARAPAN" PROVINSI KALIMANTAN SELATAN
        <br/> BERDASARKAN DAERAH HASIL PENGIRIMAN</b></P>
        <hr/>
        <br/>
        <p align="center"><b>Kabupaten <?php echo $kota ?></b></p>
        <table border="1px" cellspacing="0" border-color="#000" style="margin-left:50px;width:90%">
          <thead>
            <tr>
                <td>No</td>
                <td>Nama</td>
                <td>Umur/TTL</td>
                <td>Alamat</td>
                <td>Program</td>
            </tr>
          </thead>
          <tbody>
          <?php 
           $i=0;
           foreach ($data as $row) {
                $i++;
                echo "<tr><td>".$i."</td>";
                echo "<td>".$row->nama_klien."</td>";
                $biday = new DateTime($row->tanggal_lahir);
                $today = new DateTime();
                $diff = $today->diff($biday);
              
                echo "<td>".  $diff->y." Tahun / ".tgl_indo($row->tanggal_lahir)."</td>";
                echo "<td>".$row->alamat."</td>";
                echo "<td>".$row->rombel."</td></tr>";
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
