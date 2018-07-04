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
        <p align="center"><b>  DAFTAR HADIR PESERTA PEMBINAAN </b> </p>
		<p align="left">Kelompok Belajar : <?php echo $rombel->rombel ?> 
		<br/> 
		Bulan :
		</p>
        <hr/>
        <br/>
        <table border="1px" cellspacing="0" border-color="#000" style="margin-left:50px;width:90%">
        <thead>
			<tr>
				<th rowspan="2">No</th>
				<th rowspan="2">Nama</th>
				<th colspan="31">Tanggal</th>
			</tr>
			<tr>
				<th>1</th>
				<th>2</th>
				<th>3</th>
				<th>4</th>
				<th>5</th>
				<th>6</th>
				<th>7</th>
				<th>8</th>
				<th>9</th>
				<th>10</th>
				<th>11</th>
				<th>12</th>
				<th>13</th>
				<th>14</th>
				<th>15</th>
				<th>16</th>
				<th>17</th>
				<th>18</th>
				<th>19</th>
				<th>20</th>
				<th>21</th>
				<th>22</th>
				<th>23</th>
				<th>24</th>
				<th>25</th>
				<th>26</th>
				<th>27</th>
				<th>28</th>
				<th>29</th>
				<th>30</th>
				<th>31</th>

			</tr>
		</thead>
		<tbody>
			<?php
			$i=1;
			foreach ($data->result() as $dt ) {
			?>
			<tr>
				<td style="width:2%"><?php echo $i++; ?></td>
				<td><?php echo $dt->nama_klien; ?></td>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
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
