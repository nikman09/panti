<script type="text/javascript">
$(document).ready(function(){
	$('#simpan').click(function(){
		var id = $('#id').val();
		var tahunakademik = $('#tahunakademik').val();
		var status = $('#status').val();
		var string = $('#my-form').serialize(); 

		if(tahunakademik.length == 0){
			alert('Maaf, Tahun Akademik Tidak boleh kosong');
			$('#tahunakademik').focus();
			return false;
		}

		if(status.length == 0){
			alert('Maaf, Status Harus Diisi');
			$('#status').focus();
			return false;
		}

		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>/tahunakademik/simpan",
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
		$('#tahunakademik').val('');
		$('#status').val('');
	});
});

function editData(id){
	$.ajax({
		type: 'GET',
		url: "<?php echo site_url(); ?>/tahunakademik/cari/" + id,
		dataType: "json",
		success: function(data){
			$('#id').val(data.id);
			$('#tahunakademik').val(data.tahunakademik);
			$('#status').val(data.status);
		}
	});
}
</script>


<div class="row-fluid">
	<div class="table-header">
		<?php echo $judul; ?>
		<div class="widget-toolbar no-border pull-right">
			<a href="#modal-table" class="btn btn-small btn-info" role="button" data-toggle="modal" name="tambah" id="tambah">
				<i class="icon-check"></i>
				Tambah Data
			</a>
			
		</div>	
	</div>

	<table class="table fpTable lncp table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th class="center span2">No</th>
				<th class="center span3">ID</th>
				<th class="center">Tahun Akademik</th>
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
				<td class="center"><?php echo $i++; ?></td>
				<td class="center span3"><?php echo $dt->id_tahunakademik; ?></td>
				<td ><?php echo $dt->tahunakademik; ?></td>
				<td ><?php echo $dt->status; ?></td>
				<td class="td-actions">
					<center>
						<div class="hidden-phone visible-desktop action-buttons">
							<a class="green" href="#modal-table" onclick="javascript:editData('<?php echo $dt->id_tahunakademik;?>')" data-toggle="modal" >
								<i class="icon-pencil bigger-130"></i>
							</a>
							<a class="red" href="<?php echo site_url(); ?>/tahunakademik/hapus/<?php echo $dt->id_tahunakademik; ?>" onClick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
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

<div id="modal-table" class="modal hide fade " tabindex="-1">
	<div class="modal-header no-padding">
		<div class="table-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			Data Tahun Akademik
		</div>
	</div>

	<div class="modal-body no-padding">
		<div class="row-fluid">
			<form class="form-horizontal" name="my-form" id="my-form">
			<br/>
			
						<input type="hidden" name="id" id="id" placeholder="id" class="span4" />
				
				<div class="control-group">
					<label class="control-label" for="form-filed-1">Tahun Akademik</label>
					<div class="controls">
						<input type="text" name="tahunakademik" id="tahunakademik" placeholder="Tahun Akademik" class="span8" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="form-filed-1">Status</label>
					<div class="controls">
						<select name="status" id="status" class="span8">
						 <option value="">.:Pilih Status:.</option>
							<option value="Aktif">Aktif</option>
							<option value="Tidak Aktif">Tidak Aktif</option>
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