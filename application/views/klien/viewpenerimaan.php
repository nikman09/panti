<div class="row-fluid">
	<div class="table-header">
		<?php echo $judul; ?>
			
	</div>

	<table class="table fpTable lncp table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th class="center">No</th>
				<th class="center">NIK</th>
				<th class="center">Nama Klien</th>
				<th class="center">Jenis Kelamin</th>
				<th class="center">Umur</th>
				<th class="center">Asal Kota/Kabupaten</th>
				<th class="center">Status Pendaftaran</th>
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
				<td class="center span2"><?php echo $dt->nik; ?></td>
				<td ><?php echo $dt->nama_klien; ?></td>
				<td class="center"><?php echo $dt->sex; ?></td>
				<td class="center"><?php echo $dt->umur; ?></td>
				<td class="center"><?php echo $dt->kota; ?></td>
				<td ><?php echo $dt->pendaftaran; ?></td>
				<td class="td-actions">
					<center>
						<div class="hidden-phone visible-desktop action-buttons">
							<a class="green" href="<?php echo site_url();?>/klien/edit/<?php echo $dt->nir;?>" data-toggle="modal" >
								<i class="icon-check bigger-130"></i>
							</a>
							<a class="red" href="<?php echo site_url(); ?>/klien/hapus/<?php echo $dt->nir; ?>" onClick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
								<i class="icon-remove bigger-130"></i>
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