<script type="text/javascript">

</script>

<div class="row-fluid">
	<div class="table-header">
		<?php echo $judul; ?>
		<div class="widget-toolbar no-border pull-right">
			<a href="<?php echo site_url(); ?>/daftarberita/tambah" class="btn btn-small btn-info" role="button" data-toggle="modal" name="tambah" id="tambah">
				<i class="icon-check"></i>
				Tambah Data
			</a>
		</div>	
	</div>
	<?php 
		if($this->input->get('p')) {	
			$s = $this->input->get('p');
			if($s=='1') {
				echo  "<div class='alert alert-success' style='margin-top:10px;margin-bottom:10px'>Berhasil Menghapus Berita</div>";
			} 
		} else {
		
		}
	?>
	<table class="table fpTable lncp table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th class="center">NO</th>
				<th class="center">JUDUL</th>
				<th class="center">KETERANGAN</th>
				<th class="center">TANGGAL</th>
				<th class="center">AKSI</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$i=1;

			foreach ($data->result() as $dt ) {
			
			?>
			<tr>
				<td class="center span1"><?php echo $i++; ?></td>
				<td class=""><?php echo $dt->judul; ?></td>
				<td ><?php echo $dt->keterangan; ?></td>
				<td class="center"><?php echo $dt->tanggal; ?></td>
				<td class="td-actions">
					<center>
						<div class="hidden-phone visible-desktop action-buttons">
							<a class="green" href="<?php echo site_url();?>/daftarberita/edit/<?php echo $dt->id_berita;?>" data-toggle="modal" >
								<i class="icon-pencil bigger-130"></i>
							</a>
							<a class="red" href="<?php echo site_url(); ?>/daftarberita/hapus/<?php echo $dt->id_berita; ?>" onClick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
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