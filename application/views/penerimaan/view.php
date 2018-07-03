<script type="text/javascript">
$(document).ready(function(){
	$('.chzn-select').chosen();

	$('.edit').click(function(e){
		var id = this.id;
		$.ajax({
			type: 'GET',
			url: "<?php echo site_url(); ?>/penerimaan/cari/" + id,
			dataType: "json",
			success: function(data){
				$('#id_klien').val(data.id_klien);
				$('#nama_klien').val(data.nama_klien);
				$('#ktp').val(data.ktp);
				$('#jk').val(data.jk);
				$('#agama').val(data.agama);
				$('#tempat_lahir').val(data.tempat_lahir);
				$('#tanggal_lahir').val(data.tanggal_lahir);
				$('#hp').val(data.hp);
				$('#alamat').val(data.alamat);
				$('#kota').val(data.kota);
				$('#status_daftar').val(data.status_daftar);
				$('#nama_ayah').val(data.nama_ayah);
				$('#nama_ibu').val(data.nama_ibu);
				$('#alamat_ortu').val(data.alamat_ortu);
				$('#hp_ortu').val(data.hp_ortu);
			
			}
		});
	});


	$('#simpan').click(function(){
		var string = $('#my-form').serialize(); 
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>/penerimaan/simpan",
			data	: string,
			cache	: false,
			success	: function(data){
				alert(data);
				location.reload();
			}
		});
	});

	$('.status').click(function(e){
		var id = this.id;
		$.ajax({
			type: 'GET',
			url: "<?php echo site_url(); ?>/penerimaan/cari/" + id,
			dataType: "json",
			success: function(data){
				$('#id_klien2').val(data.id_klien);
				$('#status2').val(data.status);
			
			}
		});
	});

	$('#simpan2').click(function(){
		var v_id_klien2 = $('#id_klien2').val(); 
		var v_status2 = $('#status2').val();
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>/penerimaan/simpan2",
			data	: {
					    id_klien2 : v_id_klien2,
						status2 : v_status2
						},
			cache	: false,
			success	: function(data){
				alert(data);
				location.reload();
			}
		});
	});

});
</script>

<div class="row-fluid">
	<div class="table-header">
		<?php echo $judul; ?>
		<div class="widget-toolbar no-border pull-right">
		
		</div>	
	</div>

	<table class="table fpTable lncp table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th class="center">No</th>
				<th class="center">ID Pendaftaran</th>
				<th class="center">Nama Klien</th>
				<th class="center">L/P</th>
				<th class="center">Asal Kota/Kabupaten</th>
				<th class="center">Status</th>
				<th class="center">Status Daftar</th>
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
				<td class="center span2"><?php echo $dt->id_klien; ?></td>
				<td ><?php echo $dt->nama_klien; ?></td>
				<td class="center"><?php echo $dt->sex; ?></td>

				<td class="center"><?php echo $dt->kota; ?></td>
				<td  class="center">
				<?php if ($dt->status_daftar=='y')  { ?>
					<a class="btn btn-small btn-info status" id="<?php echo $dt->id_klien  ?>" href="#modal-table2" data-toggle="modal" ><?php echo $dt->status; ?></a></td>
				<?php } else { ?>
					<?php echo $dt->status; ?>
				<?php } ?>
				<td >
				<?php 
					if ($dt->status_daftar=='n') { echo "<span style='color:black'>Belum Diperiksa</span>"; }
					else if ($dt->status_daftar=='y')  { echo "<span style='color:green'>Di Terima</span>"; }
					else if ($dt->status_daftar=='t')  { echo "<span style='color:red'>Di Tolak</span>"; }
				?></td>
				<td class="td-actions">
					<center>
						<div class="hidden-phone visible-desktop action-buttons">
						<a class="blue" href="<?php echo site_url(); ?>/penerimaan/printpenerimaan/<?php echo $dt->id_klien; ?>" 			target="_blank">
								<i class="icon-print bigger-130"></i>
							</a>
							<a class="green edit" id="<?php echo $dt->id_klien  ?>" href="#modal-table" data-toggle="modal" >
								<i class="icon-pencil bigger-130"></i>
							</a>
							<a class="red" href="<?php echo site_url(); ?>/penerimaan/hapus/<?php echo $dt->id_klien; ?>" onClick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
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
			Data Klien
		</div>
	</div>

	<div class="modal-body no-padding">
		<div class="row-fluid">
			<form class="form-horizontal" name="my-form" id="my-form">
				<br/>
				<div class="control-group">
					<label class="control-label" for="form-filed-1">No. Pendaftaran</label>
					<div class="controls">
					<input type="text" name="id_klien" id="id_klien" placeholder="No Pendaftaran"  class="span6" readonly/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="form-filed-1">Nama Lengkap</label>
					<div class="controls">
					<input type="text" name="nama_klien" id="nama_klien" placeholder="Nama Lengkap"  class="span6" readonly/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="form-filed-1">No KTP</label>
					<div class="controls">
					<input type="text" name="ktp" id="ktp" placeholder="KTP"  class="span6" readonly/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="form-filed-1">Jenis Kelamin</label>
					<div class="controls">
						<select  name="jk" id="jk" placeholder="Jenis Kelamin" class="span6" readonly disabled>
							<option value="L">Laki-laki</option>
							<option value="P">Perempuan</option>
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="form-filed-1">Agama</label>
					<div class="controls">
					<input type="text" name="agama" id="agama" placeholder="Agama"  class="span6" readonly/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="form-filed-1">Tempat Lahir</label>
					<div class="controls">
					<input type="text" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir"  class="span6" readonly/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="form-filed-1">Tanggal Lahir</label>
					<div class="controls">
					<input type="text" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir"  class="span6" readonly/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="form-filed-1">No. Handphone</label>
					<div class="controls">
					<input type="text" name="hp" id="hp" placeholder="No. Handphone"  class="span6" readonly/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="form-filed-1">Alamat</label>
					<div class="controls">
					<input type="text" name="alamat" id="alamat" placeholder="Alamat"  class="span6" readonly/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="form-filed-1">Kota</label>
					<div class="controls">
						<input type="text" name="kota" id="kota" placeholder="Kota"  class="span6" readonly/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="form-filed-1">Nama Ayah</label>
					<div class="controls">
					<input type="text" name="nama_ayah" id="nama_ayah" placeholder="Nama Ayah"  class="span6" readonly/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="form-filed-1">Nama Ibu</label>
					<div class="controls">
					<input type="text" name="nama_ibu" id="nama_ibu" placeholder="Nama ibu"  class="span6" readonly/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="form-filed-1">Alamat Orang Tua</label>
					<div class="controls">
					<textarea name="alamat_ortu" id="alamat_ortu" placeholder="Alamat Orang Tua"  class="span6" readonly></textarea>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="form-filed-1">Telepon Orang Tua</label>
					<div class="controls">
					<input type="text" name="hp_ortu" id="hp_ortu" placeholder="Telepon Orang Tua"  class="span6" readonly/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="form-filed-1">Status Pendaftaran</label>
					<div class="controls">
						<select  name="status_daftar" id="status_daftar" class="span6">
							<option value="n">Belum Diperiksa</option>
							<option value="y">Di Terima</option>
							<option value="t">Di Tolak</option>
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
			<button type="button" class="btn btn-small btn-danger pull-left" data-dismiss="modal">
				<i class="icon-remove"></i>
				Tutup
			</button>
		</div>
	</div>
</div>


<div id="modal-table2" class="modal hide fade " tabindex="-1">
	<div class="modal-header no-padding">
		<div class="table-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			Data Klien
		</div>
	</div>

	<div class="modal-body no-padding">
		<div class="row-fluid">
			<form class="form-horizontal" name="my-form" id="my-form">
				<br/>
				<div class="control-group">
					<label class="control-label" for="form-filed-1">No. Pendaftaran</label>
					<div class="controls">
					<input type="text" name="id_klien2" id="id_klien2" placeholder="No Pendaftaran"  class="span6" readonly/>
					</div>
				</div>
			
				<div class="control-group">
					<label class="control-label" for="form-filed-1">Status</label>
					<div class="controls">
						<select  name="status2" id="status2" class="span6">
							<option value="aktif">Aktif</option>
							<option value="calon">Calon</option>
						</select>
					</div>
				</div>
				
			</form>
		</div>
	</div>
	<div class="modal-footer">
		<div class="pagination pull-right no-margin">
			<button type="button" name="simpan2" id="simpan2" class="btn btn-small btn-success pull-left" >
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