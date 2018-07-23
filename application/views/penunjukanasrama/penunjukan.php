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
				<th class="center">NAMA PEGAWAI</th>
				<th class="center">ASRAMA</th>
				<th class="center">SK</th>
				<th class="center">TMT</th>
				<th class="center">TANGGAL SK</th>
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
				<td class="center"><?php echo $dt->nama_pegawai; ?></td>
				<td ><?php echo $dt->asrama; ?></td>
				<td class="center"><?php echo $dt->sk; ?></td>
				<td class="center"><?php echo $dt->tmt; ?></td>
				<td class="center"><?php echo $dt->tgl_sk; ?></td>
				<td class="center">
				<a class="red" href="<?php echo site_url(); ?>/penunjukan/hapusriwayat/<?php echo $dt->id_penunjukan; ?>" onClick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
								<i class="icon-trash bigger-160"></i>
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
	</p>
</div>

	