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
				<th class="center">NO</th>
				<th class="center">NIR</th>
				<th class="center">NAMA</th>
				<th class="center">TRANSKRIP NILAI</th>
				<!--<th class="center">RIWAYAT ASRAMA</th>
				<th class="center">RIWAYAT KELOMPOK BELAJAR</th>-->
				<th class="center">AKSI</th>
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
				<td class="center"><a class="btn btn-info btn-mini" href="<?php echo site_url('transkrip/nilai/'.$dt->id_klien.'') ?>" ><i class="icon icon-list"></i> Transkrip Nilai</a></td>
				<!--<td class="center"><a class="btn btn-info btn-mini" href="<?php echo site_url('transkrip/asrama/'.$dt->id_klien.'') ?>" ><i class="icon icon-list"></i> Asrama</a></td>
				<td class="center"><a class="btn btn-info btn-mini" href="<?php echo site_url('transkrip/rombel/'.$dt->id_klien.'') ?>" ><i class="icon icon-list"></i> Kelompok Belajar</a></td>-->
				<td class="center"><a class="" href="<?php echo site_url('transkrip/cetaknilai/'.$dt->id_klien.'') ?>" ><i class="icon icon-print bigger-200"></i></a></td>
				
			</tr>
			<?php
			}
		  ?>

		</tbody>
	</table>
</div>