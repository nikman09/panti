
<div class="row-fluid">
	<div class="table-header">
		<?php echo $judul; ?>
		<div class="widget-toolbar no-border pull-right">
		</div>	
	</div>

	<table class="table fpTable lncp table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th class="center">NO</th>
				<th class="center">NIR</th>
				<th class="center span6">NAMA</th>
				<th class="center">JENIS KELAMIN</th>
				<th class="center">ASAL KABUPATEN/KOTA</th>
				<th class="center span3">AKSI</th>
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
				<td ><?php echo $dt->nama_klien; ?></td>
				<td class="center"><?php echo $dt->sex; ?></td>
				<td class="center"><?php echo $dt->kota; ?></td>
				<td class="td-actions">
					<center>
						<div class="hidden-phone visible-desktop action-buttons">
							<a class="black" href="<?php echo site_url(); ?>/klien/printklien/<?php echo $dt->id_klien; ?>" target="_blank">
								<i class="icon-print bigger-200"></i>
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