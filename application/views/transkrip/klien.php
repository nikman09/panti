<script type="text/javascript">
$(document).ready(function(){
	$('.chzn-select').chosen();

});
</script>

<div class="row-fluid">
	<div class="table-header">
		<?php echo $judul; ?>
		
	</div>

	<table class="table fpTable lncp table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th class="center">No</th>
				<th class="center">NIR</th>
				<th class="center">Nama Klien</th>
				<th class="center">Transkrip Nilai</th>
				<th class="center">Riwayat Asrama</th>
				<th class="center">Riwayat Kelompok Belajar</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$i=1;

			foreach ($data as $dt ) {
			
			?>
			<tr>
				<td class="center span1"><?php echo $i++; ?></td>
				<td class="center span2"><?php echo $dt->nir; ?></td>
				<td><?php echo $dt->nama_klien; ?></a></td>
				<td><a class="btn btn-info btn-mini" href="<?php echo site_url('transkrip/nilai/'.$dt->id_klien.'') ?>" ><i class="icon icon-list"></i> Transkrip Nilai</a></td>
				<td><a class="btn btn-info btn-mini" href="<?php echo site_url('transkrip/asrama/'.$dt->id_klien.'') ?>" ><i class="icon icon-list"></i> Asrama</a></td>
				<td><a class="btn btn-info btn-mini" href="<?php echo site_url('transkrip/rombel/'.$dt->id_klien.'') ?>" ><i class="icon icon-list"></i> Kelompok Belajar</a></td>
				
			</tr>
			<?php
			}
		  ?>

		</tbody>
	</table>
</div>