<script type="text/javascript">
$(document).ready(function(){
	$('.date-picker').datepicker().next().on(ace.click_event, function(){
		$(this).prev().focus();
	});
	

});

function editData(id_klien,id,tgl_disalurkan, nama_klien, nilai,acc_pembinaan){
		$('#id_klien2').val(id_klien);
		$('#id_penyaluran2').val(id);
		$('#tanggal2').val(tgl_disalurkan);
		$('#nama2').val(nama_klien);
		$('#nilai2').val(nilai);
		$('#acc2').val(acc_pembinaan);
	}

</script>


<div class="row-fluid">
	<?php 
		if($this->input->get('p')) {	
			$s = $this->input->get('p');
			if($s=='1') {
				echo  "<div class='alert alert-success' style='margin-top:10px;margin-bottom:10px'>Berhasil Menyalurkan Klien</div>";
			} else if ($s=='3') {
				echo  "<div class='alert alert-danger' style='margin-top:10px;margin-bottom:10px'>Berhasil Menghapus</div>";
			} else if ($s=='2') {
				echo  "<div class='alert alert-info' style='margin-top:10px;margin-bottom:10px'>Berhasil Mengedit </div>";
			}
		} else {
		
		}
	?>
	<div class="table-header">
		<?php echo $judul; ?>
		<div class="widget-toolbar no-border pull-right">
		<a href="#modal-table" class="btn btn-small btn-info" role="button" data-toggle="modal" name="tambah" id="tambah" > 
			&nbsp <i class="icon-edit"></i>
			Tambah Data &nbsp 
		</a>	
		</div>	
	</div>
	
	<table class="table fpTable lncp table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th class="center">NO</th>
				<th class="center">TANGGAL</th>
				<th class="center">NAMA</th>
				<th class="center">NIR</th>
				<th class="center">JENIS KELAMIN</th>
				<th class="center">NILAI</th>
				<th class="center">STATUS</th>
				<th class="center">AKSI</th>
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
				<td class="center"><?php echo tgl_indo($dt->tgl_disalurkan) ?></td>
				<td ><?php echo $dt->nama_klien; ?></td>
				<td class="center"><?php echo $dt->nir; ?></td>
				<td class="center"><?php echo $dt->sex; ?></td>
				<td class="center"><?php echo $dt->nilai; ?></td>
				<td class="center"><?php echo $dt->acc_pembinaan=="Y"?"<a style='color:green'>ACC</a>":"<a style='color:red'>TIDAK ACC</a>" ?></td>
				<td class="td-actions">
					<center>
							<div class="hidden-phone visible-desktop action-buttons">
								<a class="green" href="#modal-table2" onclick="javascript:editData( '<?php echo $dt->id_klien ?>','<?php echo $dt->id_penyaluran ?>','<?php echo tgl_indo($dt->tgl_disalurkan) ?>', '<?php echo $dt->nama_klien ?>','<?php echo $dt->nilai ?>','<?php echo $dt->acc_pembinaan ?>')" data-toggle="modal" >
									<i class="icon-pencil bigger-130"></i>
								</a>
								<a class="red" href="<?php echo site_url(); ?>/penyaluran/hapuspenyaluran/<?php echo $dt->id_penyaluran; ?>" onClick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
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
	<p align="right" style="margin-top:20px">
		<a href="<?php echo site_url("penyaluran/laporanpenyaluran/") ?>" class="btn btn-success btn-small" target="_blank"><i class="icon icon-print"></i> Print Laporan </a>
	</p>
</div>

<div id="modal-table" class="modal hide fade " tabindex="-1">
	<div class="modal-header no-padding">
		<div class="table-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			Penyaluran Klien
		</div>
	</div>

	<div class="modal-body no-padding">
		<div class="row-fluid">
			<form class="form-horizontal" name="my-form" id="my-form" action="<?php echo site_url('penyaluran/tambahpenyaluran') ?>" method="post">
				<br/>
				<div class="control-group">
					<label class="control-label" for="form-filed-1">Tanggal Penyaluran</label>
					<div class="controls">
					<div class="input-append">
						<input type="text" name="tanggal" id="tanggal" class="span6 date-picker" data-date-format="dd-mm-yyyy" required="required"/>
						<span class="add-on">
						<i class="icon-calendar"> </i>
					</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="form-filed-1">Nama Klien</label>
					<div class="controls">
						<select class="span8" name="id_klien" id="id_klien"  required="required">
							<option value=''>.:Pilih Nama Klien:.</option>
							<?php 
								foreach($dataklien->result() as $row) {
									echo "<option value='".$row->id_klien."'>".$row->nama_klien." (".$row->nir.")</option>";
								}
							?>
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="form-filed-1">Nilai</label>
					<div class="controls">
						<select name="nilai" id="nilai" class="span6" required="required">
							<option value="">.::Tentukan Nilai::.</option>
							<option value="Sangat Baik">Sangat Baik</option>
							<option value="Baik">Baik</option>
							<option value="Cukup Baik">Cukup Baik</option>
							<option value="Kurang Baik">Kurang Baik</option>
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="form-filed-1">Status</label>
					<div class="controls">
						<select name="acc" id="acc" class="span6" required="required">
							<option value="">.::Tentukan Status::.</option>
							<option value="T">Belum ACC</option>
							<option value="Y">ACC</option>
						</select>
					</div>
				</div>
				
		
		</div>
	</div>
	<div class="modal-footer">
		<div class="pagination pull-right no-margin">
			<button type="submit" name="simpan" id="simpan" class="btn btn-small btn-success pull-left" onClick="return confirm('Apakah anda yakin ingin Menambah/Merubah data ini?')">
				<i class="icon-save"></i>
				Simpan
			</button>
			<button type="button" class="btn btn-small btn-danger pull-left" data-dismiss="modal">
				<i class="icon-remove"></i>
				Tutup
			</button>
		</div>
		</form>
	</div>
</div>


<div id="modal-table2" class="modal hide fade " tabindex="-1">
	<div class="modal-header no-padding">
		<div class="table-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			Edit Penyaluran Klien
		</div>
	</div>

	<div class="modal-body no-padding">
		<div class="row-fluid">
			<form class="form-horizontal" name="my-form" id="my-form" action="<?php echo site_url('penyaluran/editpenyaluran') ?>" method="post">
			<input type="hidden" name="id_penyaluran2" id="id_penyaluran2" value="" />
				<br/>
				<div class="control-group">
					<label class="control-label" for="form-filed-1">Tanggal Penyaluran</label>
					<div class="controls">
					<div class="input-append">
						<input type="text" name="tanggal2" id="tanggal2" class="span6 date-picker" data-date-format="dd-mm-yyyy" required="required" readonly/>
						<span class="add-on">
						<i class="icon-calendar"> </i>
					</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="form-filed-1">Nama Klien</label>
					<div class="controls">
					<input type="text" name="nama2" id="nama2"  value="" class="span6"  readonly/>
					<input type="hidden" name="id_klien2" id="id_klien2"  value="" class="span6"  readonly/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="form-filed-1">Nilai</label>
					<div class="controls">
						<select name="nilai2" id="nilai2" class="span6" required="required">
							<option value="">.::Tentukan Nilai::.</option>
							<option value="Sangat Baik">Sangat Baik</option>
							<option value="Baik">Baik</option>
							<option value="Cukup Baik">Cukup Baik</option>
							<option value="Kurang Baik">Kurang Baik</option>
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="form-filed-1">ACC Pembinaan</label>
					<div class="controls">
						<select name="acc2" id="acc2" class="span6" re>
							<option value="">.::Tentukan Status::.</option>
							<option value="T">Belum ACC</option>
							<option value="Y">ACC</option>
						</select>
					</div>
				</div>
				
		
		</div>
	</div>
	<div class="modal-footer">
		<div class="pagination pull-right no-margin">
			<button type="submit" name="simpan" id="simpan" class="btn btn-small btn-success pull-left" onClick="return confirm('Apakah anda yakin ingin Menambah/Merubah data ini?')">
				<i class="icon-save"></i>
				Simpan
			</button>
			<button type="button" class="btn btn-small btn-danger pull-left" data-dismiss="modal">
				<i class="icon-remove"></i>
				Tutup
			</button>
		</div>
		</form>
	</div>
</div>