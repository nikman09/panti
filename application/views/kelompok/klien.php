<script type="text/javascript">
$(document).ready(function(){
	$('.chzn-select').chosen();

});
</script>

<div class="row-fluid">
	<div class="table-header">
		<?php echo $judul; ?>
		<div class="widget-toolbar no-border pull-right">
	
			<a href="<?php echo site_url(); ?>/kelompok/tambahklien?kd=<?php echo $rombel->id_rombel ?>" class="btn btn-small btn-success" role="button" data-toggle="modal" name="tambah" id="tambah" > 
				<i class="icon-plus"></i>
				Tambah Klien
			</a>
		
		</div>	
	</div>
	<?php echo $pesan ?>
	<table class="table fpTable lncp table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th class="center">No</th>
				<!-- <th class="center">Foto</th> -->
				<th class="center">NIR</th>
				<th class="center">Nama Klien</th>
				<th class="center">L/P</th>
				<th class="center">Asal Kota/Kabupaten</th>
				<th class="center">#</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$i=1;

			foreach ($data->result() as $dt ) {
			
			?>
			<tr>
				<td class="center span1"><?php echo $i++; ?></td>
				<!-- <td class="center span2"><?php echo $dt->foto; ?></td> -->
				<td class="center span2"><?php echo $dt->nir; ?></td>
				<td ><?php echo $dt->nama_klien; ?></td>
				<td class="center"><?php echo $dt->sex; ?></td>

				<td class="center"><?php echo $dt->kota; ?></td>
			
				<td class="td-actions">
					<center>
						<div class="hidden-phone visible-desktop action-buttons">
							<a class="red" href="<?php echo site_url(); ?>/kelompok/hapus/<?php echo $dt->id_penentuan; ?>" onClick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
								<i class="icon-trash bigger-130"></i>
							</a>
						</div>
					</center>
				</td> 
			</tr>
			<?php
			}
		  ?>

		</tbody>
	</table>
	<a href="<?php echo site_url("kelompok") ?>" style="margin:10px" class="btn btn-small btn-info">Kembali</a>
</div>