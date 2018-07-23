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
				<th class="center">MATA PELAJARAN</th>
				<th class="center">KELOMPOK BELAJAR</th>
				<th class="center">KELAS</th>
				<th class="center">NILAI</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$i=1;
			foreach ($data->result() as $dt ) {			
			?>
			<tr>
				<td class="center"><?php echo $i++; ?></td>
				<!-- 	 -->
				<td ><?php echo $dt->mapel; ?></td>
				<td ><?php echo $dt->rombel; ?></td>
				<td class="center"><?php echo $dt->kelas; ?></td>
				
				<td class="td-actions">
					<center>
						<a href="<?php echo site_url() ?>/nilai/inputnilai?id=<?php echo $dt->id_rombel; ?>&mp=<?php echo $dt->kd_mapel; ?>" class="btn btn-info btn-mini" ><i class="icon-book bigger-130"></i> Input Nilai</a>
					</center>
				</td> 
				
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