<script type="text/javascript">
$(document).ready(function(){
	
	$('#simpan').click(function(){
		var kode	= $('#kode').val();
		var probi	= $('#probi').val();
		var string = $('#my-form').serialize();
		
		
		if(kode.length == 0){
			alert('Maaf, Kode Tidak boleh kosong');
			$('#kode').focus();
			return false;
		}
		
		if(probi.length == 0){
			alert('Maaf, Nama Program Pembinaan Tidak boleh kosong');
			$('#probi').focus();
			return false;
		}
		
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>/probi/simpan",
			data	: string,
			cache	: false,
			success	: function(data){
				alert(data);
				location.reload();
			}
		});
		
	});

	$('#tambah').click(function(){
		$('#kode').val('');
		$('#probi').val('');	
	});	
});

function editData(id){
	$.ajax({
		type: 'GET',
		url: "<?php echo site_url(); ?>/probi/cari/" + id,
		dataType: "json",
		success: function(data){
			$('#kode').val(data.kode);
			$('#probi').val(data.probi);
		}
	});
}
</script>


<div class="row-fluid">
	<div class="table-header">
		<?php echo $judul; ?>
		<div class="widget-toolbar no-border pull-right">
			<a href="#modal-table" class="btn btn-small btn-success" role="button" data-toggle="modal" name="tambah" id="tambah">
				<i class="icon-check"></i>
				Tambah Data
			</a>
		</div>	
	</div>

	<table class="table fpTable lncp table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th class="center">No</th>
				<th class="center">Kode</th>
				<th class="center">Program Pembinaan</th>
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
				<td class="center span2"><?php echo $dt->kd_probi; ?></td>
				<td ><?php echo $dt->probi; ?></td>
				<td class="td-actions">
					<center>
						<div class="hidden-phone visible-desktop action-buttons">
							<a class="green" href="#modal-table" onclick="javascript:editData('<?php echo $dt->kd_probi;?>')" data-toggle="modal" >
								<i class="icon-pencil bigger-130"></i>
							</a>
							<a class="red" href="<?php echo site_url(); ?>/probi/hapus/<?php echo $dt->kd_probi; ?>" onClick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
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
			Data Program Pembinaan
		</div>
	</div>

	<div class="modal-body no-padding">
		<div class="row-fluid">
			<form class="form-horizontal" name="my-form" id="my-form">
				<div class="control-group">
					<label class="control-label" for="form-filed-1">Kode Program</label>
					<div class="controls">
						<input type="text" name="kode" id="kode" placeholder="Kode Program" class="span4"  maxlength="10" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="form-filed-1">Nama Program</label>
					<div class="controls">
						<input type="text" name="probi" id="probi" placeholder="Nama Program" class="span6"/>
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
			<button type="button" class="btn btn-small btn-danger pull-left" data-dismiss="modal">
				<i class="icon-remove"></i>
				Tutup
			</button>
		</div>
	</div>
</div>