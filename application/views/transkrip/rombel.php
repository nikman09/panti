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
				<th class="center">KELOMPOK BELAJAR</th>
				<th class="center">PROGRAM PEMBINAAN</th>
				<th class="center">KELAS
				<th class="center">TAHUN</th></th>
			</tr>
		</thead>
		<tbody>
			<?php
			$i=1;

			foreach ($datarombel->result() as $dt ) {
			
			?>
			<tr>
				<td class="center span1"><?php echo $i++; ?></td>
				<td class="center span2"><?php echo $dt->rombel; ?></td>
				<td ><?php echo $dt->probi; ?></td>
				<td class="center"><?php echo $dt->kelas; ?></td>

				<td class="center"><?php echo $dt->tahunakademik; ?></td>
				
			</tr>
			<?php
			}
		  ?>

		</tbody>
	</table>
	<a href="<?php echo site_url("transkrip") ?>" style="margin:10px" class="btn btn-small btn-info">Kembali</a>
</div>