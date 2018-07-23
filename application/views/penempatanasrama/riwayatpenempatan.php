<script type="text/javascript">

</script>

<div class="row-fluid">
	<div class="table-header">
		<?php echo $judul; ?>
		
	</div>

	<table class="table fpTable lncp table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th class="center">NO</th>
				<th class="center">NAMA</th>
				<th class="center">DARI ASRAMA</th>
				<th class="center">KE ASRAMA</th>
				<th class="center">KETERANGAN</th>
				<th class="center">TANGGAL</th>
				<th class="center">AKSI</td>
			</tr>
		</thead>
		<tbody>
			<?php
			$i=1;
			foreach ($data as $dt ) {
			?>
			<tr>
				<td class="center"><?php echo $i++; ?></td>
				<td class="center"><?php echo $dt->nama_klien; ?></td>
				<td ><?php echo $dt->asrama_asal; ?></td>
				<td class="center"><?php echo $dt->asrama_akhir; ?></td>
				<td class="center"><?php echo $dt->ket; ?></td>
				<td class="center"><?php echo $dt->tanggal; ?></td>
				<td class="center">
				<a class="red" href="<?php echo site_url(); ?>/penempatan/hapusriwayat/<?php echo $dt->id; ?>" onClick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
								<i class="icon-trash bigger-150"></i>
							</a>
							</td>
			</tr>
			<?php
			}
		  ?>

		</tbody>
	</table>
	<p align="right" style="margin-top:20px">
	<a href="<?php echo site_url("penempatan") ?>" class="btn btn-success btn-small"> Kembali </a>
	<a href="<?php echo site_url("penempatan/riwayatpenempatancetak") ?>" target="_blank" class="btn btn-success btn-small"><i class="icon icon-print"></i> Print </a>
	</p>
 </a>
</div>