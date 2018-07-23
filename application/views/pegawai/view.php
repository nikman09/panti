<script type="text/javascript">
$(document).ready(function(){
	$('.date-picker').datepicker().next().on(ace.click_event, function(){
		$(this).prev().focus();
	});
	
	$('#simpan').click(function(){
		var string = $('#my-form').serialize();
		
		
		
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>/pegawai/simpan",
			data	: string,
			cache	: false,
			success	: function(data){
				alert(data);
				location.reload();

			}
		});
		
	});

	$('#tambah').click(function(){
		$('#nip').val('');
		$('#nama').val('');
		$('#sex').val('');
		$('#tempat').val('');
		$('#tanggal').val('');
		$('#alamat').val('');
		$('#hp').val('');
		$('#jabatan').val('');
		$('#pendidikan').val('');
		$('#jurusan').val('');
		$('#status').val('');
	
	});	
	$('#reset').click(function(){
		$('#nip').val('');
		$('#nama').val('');
		$('#sex').val('');
		$('#tempat').val('');
		$('#tanggal').val('');
		$('#alamat').val('');
		$('#hp').val('');
		$('#jabatan').val('');
		$('#pendidikan').val('');
		$('#jurusan').val('');
		$('#status').val('');
	
	});	
});

function editData(id){
	$.ajax({
		type: 'GET',
		url: '<?php echo site_url(); ?>/pegawai/cari/' + id,
		dataType: "json",
		success: function(data){
			$('#id').attr('readonly', 'true');
			$('#nip').val(data.nip);
			$('#nip').attr('readonly', 'true');
			$('#nama').val(data.nama);
			$('#sex').val(data.sex);
			$('#tempat').val(data.tempat);
			$('#tanggal').val(data.tanggal);
			$('#alamat').val(data.alamat);
			$('#hp').val(data.hp);
			$('#jabatan').val(data.jabatan);
			$('#pendidikan').val(data.pendidikan);
			$('#jurusan').val(data.jurusan);
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
				<th class="center">NO</th>
			
				<th class="center">NIP/NIK</th>
				<th class="center">NAMA PEGAWAI</th>
				<th class="center">L/P</th>
				<th class="center">JABATAN</th>
				<th class="center">PENDIDIKAN</th>
				<th class="center">STATUS</th>
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
				
				<td class="center span3"><?php echo $dt->nip; ?></td>
				<td ><?php echo $dt->nama_pegawai; ?></td>
				<td class="center"><?php echo $dt->sex; ?></td>
				<td ><?php echo $dt->jabatan; ?></td>
				<td ><?php echo $dt->pendidikan . ' - ' . $dt->jurusan; ?></td>
				<td ><?php echo $dt->status; ?></td>
				<td class="td-actions">
					<center>
						<div class="hidden-phone visible-desktop action-buttons">
							<a class="green" href="#modal-table" onclick="javascript:editData('<?php echo $dt->nip;?>')" data-toggle="modal" >
								<i class="icon-pencil bigger-130"></i>
							</a>
							<a class="red" href="<?php echo site_url(); ?>/pegawai/hapus/<?php echo $dt->id_pegawai; ?>" onClick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
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
			Data Pegawai
		</div>
	</div>

	<div class="modal-body no-padding">
		<div class="row-fluid">
			<form class="form-horizontal" name="my-form" id="my-form">
				<br/>
				<div class="control-group">
					<label class="control-label" for="form-filed-1">NIP</label>
					<div class="controls">
						<input type="text" name="nip" id="nip" placeholder="NIP" class="span6"  maxlength="30" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="form-filed-1">Nama Pegawai</label>
					<div class="controls">
						<input type="text" name="nama" id="nama" placeholder="Nama Pegawai" class="span8"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="form-filed-1">Jenis Kelamin</label>
					<div class="controls">
						<select name="sex" id="sex" class="span3">
							<option value="">--Pilih--</option>
							<option value="L">Laki-laki</option>
							<option value="P">Perempuan</option>
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="form-filed-1">Tempat Lahir</label>
					<div class="controls">
						<input type="text" name="tempat" id="tempat" placeholder="Tempat Lahir" class="span6" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="form-filed-1">Tanggal Lahir</label>
					<div class="controls">
					<div class="input-append">
						<input type="text" name="tanggal" id="tanggal" class="span6 date-picker" data-date-format="dd-mm-yyyy" />
						<span class="add-on">
								<i class="icon-calendar"> </i>
						</span>
					</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="form-filed-1">Alamat</label>
					<div class="controls">
						<input type="text" name="alamat" id="alamat" placeholder="Alamat" class="span10"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="form-filed-1">No.HP</label>
					<div class="controls">
						<input type="text" name="hp" id="hp" placeholder="No.HP" class="span7"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="form-filed-1">Jabatan</label>
					<div class="controls">
						<input type="text" name="jabatan" id="jabatan" placeholder="Jabatan" class="span7"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="form-filed-1">Jenjang Pendidikan</label>
					<div class="controls">
						<select name="pendidikan" id="pendidikan" class="span5">
							<option value="" selected="selected">--Pilih--</option>
							<?php
								foreach ($data_jenjang as $dt ) {
									?>
										<option value="<?php echo $dt; ?>"><?php echo $dt; ?></option>
									<?php
								}
							?>
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="form-filed-1">Jurusan</label>
					<div class="controls">
						<input type="text" name="jurusan" id="jurusan" placeholder="Jurusan" class="span8"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="form-filed-1">Status</label>
					<div class="controls">
						<select name="status" id="status" class="span5">
							<option value="" selected="selected">--Pilih--</option>
							<?php
								foreach ($data_status as $dt ) {
									?>
										<option value="<?php echo $dt; ?>"><?php echo $dt; ?></option>
									<?php
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