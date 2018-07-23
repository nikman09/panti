

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
				<th class="center">NO PENDAFTARAN</th>
				<th class="center span5">NAMA KLIEN</th>
				<th class="center">L/P</th>
				<th class="center">ASAL KOTA/KABUPATEN</th>
				<th class="center">STATUS PENDAFTARAN</th>
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
				<td class="center span2"><?php echo $dt->id_klien; ?></td>
				<td ><?php echo $dt->nama_klien; ?></td>
				<td class="center span1"><?php echo $dt->sex; ?></td>

				<td class="center span3"><?php echo $dt->kota; ?></td>
				
				<td >
				<?php 
					if ($dt->status_daftar=='n') { echo "<span style='color:black'>Belum Diperiksa</span>"; }
					else if ($dt->status_daftar=='y')  { echo "<span style='color:green'>Di Terima</span>"; }
					else if ($dt->status_daftar=='t')  { echo "<span style='color:red'>Di Tolak</span>"; }
				?></td>
				<td class="td-actions">
					<center>
						<div class="hidden-phone visible-desktop action-buttons">
						<a class="black" href="<?php echo site_url(); ?>/penerimaan/printpenerimaan/<?php echo $dt->id_klien; ?>" 			target="_blank">
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

