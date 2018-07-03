<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Laporan</title>
 <style>
	page[size="A4"] {
    background: white;
    width: 21cm;
    min-height: 29.7cm;
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
        <p align="center"><b> BIODATA KLIEN
        <br/>PANTI SOSIAL  BINA NETRA FAJAR HARAPAN
        <br/> PROVINSI KALIMANTAN SELATAN</b></P>
        <hr/>
        <br/>
        <p><b> I. Data  Klien</b></p>
        <table style="margin-left:50px">
            <tr>
                 <td>Nama  Klien</td>
                 <td>:</td>
                 <td><?php echo $data->nama_klien ?></td>
            </tr>
            <tr>
                 <td>NIK</td>
                 <td>:</td>
                 <td><?php echo $data->nik ?></td>
            </tr>
            <tr>
                 <td>Tempat / Tanggal Lahir</td>
                 <td>:</td>
                 <td><?php echo $data->tempat_lahir ?> / <?php echo tgl_indo("$data->tanggal_lahir") ?></td>
            </tr>
            <tr>
                 <td>Jenis Kelamin</td>
                 <td>:</td>
                 <td><?php echo ($data->sex=="L"?"Laki-laki":"Perempuan") ?></td>
            </tr>
            <tr>
                 <td>Agama</td>
                 <td>:</td>
                 <td><?php echo $data->agama ?></td>
            </tr>
            <tr>
                 <td>Alamat</td>
                 <td>:</td>
                 <td rowspan="2"><?php echo $data->alamat ?></td>
            </tr>
            <tr>
                 <td></td>
                 <td></td>
            </tr>
            <tr>
                 <td>Kota/Kabupaten</td>
                 <td>:</td>
                 <td rowspan="2"><?php echo $data->kota ?></td>
            </tr>
        </table>
        <br/>
        <p><b> I. Data Orang Tua  Klien</b></p>
        <table style="margin-left:50px">
            <tr>
                 <td>Nama Ayah</td>
                 <td>:</td>
                 <td><?php echo $data->nama_ayah ?></td>
            </tr>
            <tr>
                 <td>Nama Ibu</td>
                 <td>:</td>
                 <td><?php echo $data->nama_ibu ?></td>
            </tr>
            <tr>
                 <td>Alamat Orang Tua</td>
                 <td>:</td>
                 <td rowspan="2"><?php echo $data->alamat_ortu ?></td>
            </tr>
            <tr>
                 <td></td>
                 <td></td>
               
            </tr>
            <tr>
                 <td>Telepon Orang Tua</td>
                 <td>:</td>
                 <td><?php echo $data->hp_ortu ?></td>
            </tr>
           
        </table>
    <br/><br/>
        <div style="float:right;width:300px">
            <p align="center"> Martapura, <?php echo date('d-M-Y') ?>
                <br/> Calon Klien <br/><br/><br/><br/>
               <b> <?php echo  $data->nama_klien ?></b>
            </p>
        </div>

   
	</page>
</body>
</html>
<script>
window.print();
</script>
