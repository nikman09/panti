<script type="text/javascript">
$(document).ready(function(){
	$('.chzn-select').chosen();

	$('#cari_nir').change(function(){
		var nir = $(this).val();
		$,ajax({
			type: 'GET',
			url: "<?php echo site_url(); ?>/klien/cari_klien"+nir,
			success: function(data){
				$('#info_klien').html(data);
			}
		});
	});
});
</script>

<div class="row-fluid">
	<div class="table-header">
		<?php echo $judul; ?>
		<div class="widget-toolbar no-border pull-right">
			<a href="<?php echo site_url(); ?>/klien/tambah" class="btn btn-small btn-info" role="button" data-toggle="modal" name="tambah" id="tambah">
				<i class="icon-check"></i>
				Tambah Data
			</a>
		</div>	
	</div>

	<table class="table fpTable lncp table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th class="center">No</th>
				<th class="center">Foto</th>
				<th class="center">NIR</th>
				<th class="center">Nama Klien</th>
				<th class="center">L/P</th>
				<th class="center">Asal Kota/Kabupaten</th>
				<th class="center">Status</th>
				<th class="center">Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$i=1;

			foreach ($data as $dt ) {
			
			?>
			<tr>
				<td class="center span1"><?php echo $i++; ?></td>
				<td class="center span2"><img src="<?php echo base_url('assets/foto_klien');echo '/'.$dt->foto; ?>" style="width:50px"/></td>
				<td class="center span2"><?php echo $dt->nir; ?></td>
				<td ><?php echo $dt->nama_klien; ?></td>
				<td class="center"><?php echo $dt->sex; ?></td>

				<td class="center"><?php echo $dt->kota; ?></td>
				<td ><?php echo $dt->status; ?></td>
				<td class="td-actions">
					<center>
						<div class="hidden-phone visible-desktop action-buttons">
							<a class="green" href="<?php echo site_url();?>/klien/edit/<?php echo $dt->id_klien;?>" data-toggle="modal" >
								<i class="icon-pencil bigger-130"></i>
							</a>
							<a class="red" href="<?php echo site_url(); ?>/klien/hapus/<?php echo $dt->id_klien; ?>" onClick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
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
</div>