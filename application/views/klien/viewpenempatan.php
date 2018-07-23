
<script type="text/javascript">
$(document).ready(function(){
	$('#simpan').click(function(){
		var asrama = $('#asrama').val();
		var string = $('#my-form').serialize(); 

		if(asrama.length == 0){
			alert('Maaf, Asrama Harus Dipilih');
			$('#asrama').focus();
			return false;
		}
		
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>/penempatan/simpan",
			data	: string,
			cache	: false,
			success	: function(data){
				alert(data);
				location.reload();
			}
		});
	});

	$('#tambah').click(function(){
		$('#id').val('');
		$('#nir').val('');
		$('#nama').val('');
		$('#asrama').val('');
	});
});

function editData(id){
	$.ajax({
		type: 'GET',
		url: "<?php echo site_url(); ?>/penempatan/cari/" + id,
		dataType: "json",
		success: function(data){
			$('#id').val(data_id);
			$('#nir').val(data_nir);
			$('#nama').val(data_nama);
			$('#asrama').val(data_asrama);
		}
	});
}
</script><div class="row-fluid">
	<div class="table-header">
		<?php echo $judul; ?>
			
	</div>

	<table class="table fpTable lncp table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th class="center">No</th>
				<th class="center">NIR</th>
				<th class="center">Nama Klien</th>
				<th class="center">Jenis Kelamin</th>
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
				<td class="center span2"><?php echo $dt->nir; ?></td>
				<td ><?php echo $dt->nama_klien; ?></td>
				<td class="center"><?php echo $dt->sex; ?></td>
				<td class="td-actions">
					<center>
						<div class="hidden-phone visible-desktop action-buttons">
							<a class="green" href="#modal-table" onclick="javascript:editData('<?php echo $dt->id_penempatan;?>')" data-toggle="modal" >
								<i class="icon-check bigger-130"></i>
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

<div id="modal-table" class="modal hide fade " tabindex="-1">
	<div class="modal-header no-padding">
		<div class="table-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			Data Penempatan Klien
		</div>
	</div>

	<div class="modal-body no-padding">
		<div class="row-fluid">
			<form class="form-horizontal" name="my-form" id="my-form">
				<div class="control-group">
					<label class="control-label" for="form-filed-1">ID</label>
					<div class="controls">
						<input type="text" name="id" id="id" placeholder="ID" class="span4"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="form-filed-1">NIR</label>
					<div class="controls">
						<input type="text" name="nir" id="nir" placeholder="NIR" class="span4"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="form-filed-1">Nama Klien </label>
					<div class="controls">
						<input type="text" name="nama" id="nama" placeholder="Nama Klien" class="span8" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="form-filed-1">Asrama</label>
					<div class="controls">
						<select name="asrama" id="asrama"  class="span6" >
							<option value="">-Plih Asrama-</option>
							<option><?php 
								foreach ($asrama->result_array() as $row) {
									echo "<option value='".$row['kd_asrama']."'>".$row['asrama']."</option>";
								}
							 ?>
							 </option>
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