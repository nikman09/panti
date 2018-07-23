<script type="text/javascript">
$(document).ready(function(){

});

</script>


<div class="row-fluid">
	<div class="table-header">
		<?php echo $judul; ?>
		<div class="widget-toolbar no-border pull-right">
		"Tahun Akademik <?php echo $tahun ?>"
		</div>	
	</div>

	<table class="table fpTable lncp table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th class="center">NO</th>
				<th class="center">KELOMPOK BELAJAR</th>
				<th class="center">KLIEN</th>
				<th class="center">JADWAL</th>
				<th class="center">DAFTAR HADIR KLIEN</th>
				<th class="center">DAFTAR HADIR INSTRUKTUR</th>
				<th class="center">JADWAL</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$i=1;
			foreach ($data as $dt ) {	
				$prob = $this->model_rombel->tampildatarombel($dt->kd_probi);		
			?>
			<tr>
				<td class="center"><?php echo $i++; ?></td>
				<!-- 	 -->
				<td ><?php echo $dt->rombel; ?></td>
				<td class="td-actions">
					<center>
						<a href="<?php site_url() ?>kelompok/klien?as=<?php echo $dt->id_rombel; ?>" class="" ><i class="icon-user bigger-130"></i> <?php  echo $this->model_kelompok->jumlahklien($dt->id_rombel);  ?> Orang</a> 
					</center>
				</td> 
				<td class="td-actions">
					<center>
						<a href="<?php site_url() ?>kelompok/jadwal?as=<?php echo $dt->id_rombel; ?>" class="btn btn-info btn-small" ><i class="icon-list"></i> Jadwal </a>
					</center>
				</td> 
				<td class="center"><a target="_blank" href="<?php echo site_url('kelompok/daftarhadir/'.$dt->id_rombel.'') ?>"><i class="icon icon-print bigger-160"></i></a></td>
				<td class="center"><a target="_blank" href="<?php echo site_url('kelompok/cetakinstruktur/'.$dt->id_rombel.'') ?>"><i class="icon icon-print bigger-160"></i></a></td>
				<td class="center"><a target="_blank" href="<?php echo site_url('kelompok/cetakjadwal/'.$dt->id_rombel.'') ?>"><i class="icon icon-print bigger-160"></i></a></td>

				
			</tr>
			<?php
			}
		  ?>

		</tbody>
	</table>
</div>

<div id="modal-table" class="modal hide fade " tabindex="-1">
	<div class="modal-header no-padding">
		<div class="table-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			Data Kelompok Belajar
		</div>
	</div>

	<div class="modal-body no-padding">
		<div class="row-fluid">
			<form class="form-horizontal" name="my-form" id="my-form">
			<br/>
				<div class="control-group">
					<label class="control-label" for="form-filed-1">ID</label>
					<div class="controls">
						<input type="text" name="id" id="id" placeholder="ID" class="span4"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="form-filed-1">Nama Kelompok Belajar</label>
					<div class="controls">
						<input type="text" name="rombel" id="rombel" placeholder="Nama Kelompok Belajar" class="span8" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="form-filed-1">Kelas</label>
					<div class="controls">
						<input type="text" name="kelas" id="kelas" placeholder="kelas" class="span4" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="form-filed-1">Program Pembinaan</label>
					<div class="controls">
						<select name="probi" id="probi"  class="span6" >
							<option value="">-Pilih Program Pembinaan</option>
							<?php 
								foreach ($probi->result_array() as $row) {
									echo "<option value='".$row['kd_probi']."'>".$row['probi']."</option>";
								}
							 ?>
						</select>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="modal-footer">
		<div class="pagination pull-right no-margin">
			
			<button type="button" name="simpan" id="simpan" class="btn btn-small btn-success pull-left" >
				<i class="icon-save"></i>
				Simpan
			</button>
			<button type="button" name="reset" id="reset" class="btn btn-small btn-info pull-left" >
				<i class="icon-add"></i>
				Reset
			</button>
			<button type="button" class="btn btn-small btn-danger pull-left" data-dismiss="modal">
				<i class="icon-remove"></i>
				Tutup
			</button>
		</div>
	</div>
</div>