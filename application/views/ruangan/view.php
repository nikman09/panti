<script type="text/javascript">
$(document).ready(function(){
	$('#simpan').click(function(){
		if (confirm("Yakin Ingin Menambah/Merubah Data?") == true) {
		var kode = $('#kode').val();
		var ruangan = $('#ruangan').val();
		var string = $('#my-form').serialize(); 

	
		if(ruangan.length == 0){
			alert('Maaf, Nama Ruangan Tidak boleh kosong');
			$('#ruangan').focus();
			return false;
		}
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>/ruangan/simpan",
			data	: string,
			cache	: false,
			success	: function(data){
				alert(data);
				location.reload();
			}
		});
		}
	});

	$('#tambah').click(function(){
		$('#kode').val('');
		$('#ruangan').val('');
	});
});

function editData(id){
	$.ajax({
		type: 'GET',
		url: "<?php echo site_url(); ?>/ruangan/cari/" + id,
		dataType: "json",
		success: function(data){
			$('#kode').val(data.kode);
			$('#kode').attr('readonly', 'true');
			$('#ruangan').val(data.ruangan);
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
				<th class="center span2">NO</th>
				<th class="center">RUANGAN</th>
				<th class="center">AKSI</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$i=1;
			foreach ($data as $dt ) {			
			?>
			<tr>
				<td class="center"><?php echo $i++; ?></td>
				<td ><?php echo $dt->nama_ruangan; ?></td>
				<td class="td-actions">
					<center>
						<div class="hidden-phone visible-desktop action-buttons">
							<a class="green" href="#modal-table" onclick="javascript:editData('<?php echo $dt->kd_ruangan;?>')" data-toggle="modal" >
								<i class="icon-pencil bigger-130"></i>
							</a>
							<a class="red" href="<?php echo site_url(); ?>/ruangan/hapus/<?php echo $dt->kd_ruangan; ?>" onClick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
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
			Data Ruangan Kelas
		</div>
	</div>

	<div class="modal-body no-padding">
		<div class="row-fluid">
			<form class="form-horizontal" name="my-form" id="my-form">
				<div class="control-group">
					
						<input type="hidden" name="kode" id="kode" placeholder="Kode Ruangan" class="span4"/>
					
				</div>
				<div class="control-group">
					<label class="control-label" for="form-filed-1">Nama Ruangan</label>
					<div class="controls">
						<input type="text" name="ruangan" id="ruangan" placeholder="Nama Ruangan" class="span8" />
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