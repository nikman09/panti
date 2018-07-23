<script type="text/javascript">
$(document).ready(function(){
	$('.chzn-select').chosen();

});
</script>
<div class="row-fluid">
	<?php 
		if($this->input->get('s')) {	
			$s = $this->input->get('s');
			if($s=='1') {
				echo  "<div class='alert alert-success' style='margin-top:10px;margin-bottom:10px'>Berhasil Menambahkan Jadwal</div>";
			} else if ($s=='2') {
				echo  "<div class='alert alert-danger' style='margin-top:10px;margin-bottom:10px'>Berhasil Menghapus Jadwal</div>";
			}
		} else {
			echo "";
		}
	?>
<div class="row-fluid">
	<a href="#modal-table" class="btn btn-small btn-info" role="button" data-toggle="modal" name="tambah" id="tambah" > 
		<i class="icon-plus"></i>
		Tambah Jadwal
	</a>
		<a href="<?php echo site_url(); ?>/kelompok" class="btn btn-small btn-default" role="button" data-toggle="modal" name="tambah" id="tambah" > 
		<i class="icon-arrow-left"></i>
		Kembali
	</a>
</div>
<br/>
<div class="row-fluid" style="min-height:400px;width:100%;margin:auto">
	<div class="span6">
		<table border="1px" style="padding:10px;width:100%; border:1px solid #d1d1d1;">
			<thead>
			<tr>
					<th colspan="7"><h5 align="center" style="color:#467187"><strong>Senin</strong></h5></th>
				</tr>
				<tr>
					<th>Aksi</th>
					<th>No</th>
					<th>Jam</th>
					<th>Mata Pelajaran</th>
					<th>Instruktur</th>
					<th>Ruangan</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$i=0;
					foreach($datasenin->result() as $row) { 
					$i++;
				?>
					<tr>
						<td><center>
							<div class="hidden-phone visible-desktop action-buttons">
							
								<a class="red" href="<?php echo site_url("kelompok/hapusjadwal/".$row->id_jadwal."") ?>" onClick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
									<i class="icon-trash bigger-130"></i>
								</a>
							</div>
						</center></td>
						<td><?php echo $i ?></td>
						<td><?php echo $row->jam ?></td>
						<td><?php echo $row->mapel ?></td>
						<td><?php echo $row->nama_pegawai ?></td>
						<td><?php echo $row->nama_ruangan ?></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
	<div class="span6">
		<table border="1px" style="padding:10px;width:100%; border:1px solid #d1d1d1;">
			<thead>
			<tr>
					<th colspan="6"><h5 align="center" style="color:#467187"><strong>Selasa</strong></h5></th>
				</tr>
				<tr>
					<th>Aksi</th>
					<th>No</th>
					<th>Jam</th>
					<th>Mata Pelajaran</th>
					<th>Instruktur</th>
					<th>Ruangan</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$i=0;
					foreach($dataselasa->result() as $row) { 
					$i++;
				?>
					<tr>
						<td><center>
							<div class="hidden-phone visible-desktop action-buttons">
							
								<a class="red" href="<?php echo site_url("kelompok/hapusjadwal/".$row->id_jadwal."") ?>" onClick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
									<i class="icon-trash bigger-130"></i>
								</a>
							</div>
						</center></td>
						<td><?php echo $i ?></td>
						<td><?php echo $row->jam ?></td>
						<td><?php echo $row->mapel ?></td>
						<td><?php echo $row->nama_pegawai ?></td>
						<td><?php echo $row->nama_ruangan ?></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>
<div class="row-fluid" style="min-height:400px;width:100%;margin:auto">
<div class="span6">
		<table border="1px" style="padding:10px;width:100%; border:1px solid #d1d1d1;">
			<thead>
			<tr>
					<th colspan="6"><h5 align="center" style="color:#467187"><strong>Rabu</strong></h5></th>
				</tr>
				<tr>
					<th>Aksi</th>
					<th>No</th>
					<th>Jam</th>
					<th>Mata Pelajaran</th>
					<th>Instruktur</th>
					<th>Ruangan</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$i=0;
					foreach($datarabu->result() as $row) { 
					$i++;
				?>
					<tr>
						<td><center>
							<div class="hidden-phone visible-desktop action-buttons">
							
								<a class="red" href="<?php echo site_url("kelompok/hapusjadwal/".$row->id_jadwal."") ?>" onClick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
									<i class="icon-trash bigger-130"></i>
								</a>
							</div>
						</center></td>
						<td><?php echo $i ?></td>
						<td><?php echo $row->jam ?></td>
						<td><?php echo $row->mapel ?></td>
						<td><?php echo $row->nama_pegawai ?></td>
						<td><?php echo $row->nama_ruangan ?></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
	<div class="span6">
		<table border="1px" style="padding:10px;width:100%; border:1px solid #d1d1d1;">
			<thead>
			<tr>
					<th colspan="6"><h5 align="center" style="color:#467187"><strong>Kamis</strong></h5></th>
				</tr>
				<tr>
					<th>Aksi</th>
					<th>No</th>
					<th>Jam</th>
					<th>Mata Pelajaran</th>
					<th>Instruktur</th>
					<th>Ruangan</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$i=0;
					foreach($datakamis->result() as $row) { 
					$i++;
				?>
					<tr>
						<td><center>
							<div class="hidden-phone visible-desktop action-buttons">
							
								<a class="red" href="<?php echo site_url("kelompok/hapusjadwal/".$row->id_jadwal."") ?>" onClick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
									<i class="icon-trash bigger-130"></i>
								</a>
							</div>
						</center></td>
						<td><?php echo $i ?></td>
						<td><?php echo $row->jam ?></td>
						<td><?php echo $row->mapel ?></td>
						<td><?php echo $row->nama_pegawai ?></td>
						<td><?php echo $row->nama_ruangan ?></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
	
</div>
<div class="row-fluid" style="min-height:400px;width:100%;margin:auto">
<div class="span6">
		<table border="1px" style="padding:10px;width:100%; border:1px solid #d1d1d1;">
			<thead>
			<tr>
					<th colspan="6"><h5 align="center" style="color:#467187"><strong>Jumat</strong></h5></th>
				</tr>
				<tr>
					<th>Aksi</th>
					<th>No</th>
					<th>Jam</th>
					<th>Mata Pelajaran</th>
					<th>Instruktur</th>
					<th>Ruangan</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$i=0;
					foreach($datajumat->result() as $row) { 
					$i++;
				?>
					<tr>
						<td><center>
							<div class="hidden-phone visible-desktop action-buttons">
							
								<a class="red" href="<?php echo site_url("kelompok/hapusjadwal/".$row->id_jadwal."") ?>" onClick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
									<i class="icon-trash bigger-130"></i>
								</a>
							</div>
						</center></td>
						<td><?php echo $i ?></td>
						<td><?php echo $row->jam ?></td>
						<td><?php echo $row->mapel ?></td>
						<td><?php echo $row->nama_pegawai ?></td>
						<td><?php echo $row->nama_ruangan ?></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
	<div class="span6">
		<table border="1px" style="padding:10px;width:100%; border:1px solid #d1d1d1;">
			<thead>
			<tr>
					<th colspan="6"><h5 align="center" style="color:#467187"><strong>Sabtu</strong></h5></th>
				</tr>
				<tr>
					<th>Aksi</th>
					<th>No</th>
					<th>Jam</th>
					<th>Mata Pelajaran</th>
					<th>Instruktur</th>
					<th>Ruangan</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$i=0;
					foreach($datasabtu->result() as $row) { 
					$i++;
				?>
					<tr>
						<td><center>
							<div class="hidden-phone visible-desktop action-buttons">
							
								<a class="red" href="<?php echo site_url("kelompok/hapusjadwal/".$row->id_jadwal."") ?>" onClick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
									<i class="icon-trash bigger-130"></i>
								</a>
							</div>
						</center></td>
						<td><?php echo $i ?></td>
						<td><?php echo $row->jam ?></td>
						<td><?php echo $row->mapel ?></td>
						<td><?php echo $row->nama_pegawai ?></td>
						<td><?php echo $row->nama_ruangan ?></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
	
</div>
<div class="row-fluid" style="height:400px;width:100%;margin:auto">
<div class="span6">
		<table border="1px" style="padding:10px;width:100%; border:1px solid #d1d1d1;">
			<thead>
			<tr>
					<th colspan="6"><h5 align="center" style="color:#467187"><strong>Minggu</strong></h5></th>
				</tr>
				<tr>
					<th>Aksi</th>
					<th>No</th>
					<th>Jam</th>
					<th>Mata Pelajaran</th>
					<th>Instruktur</th>
					<th>Ruangan</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$i=0;
					foreach($dataminggu->result() as $row) { 
					$i++;
				?>
					<tr>
						<td><center>
							<div class="hidden-phone visible-desktop action-buttons">
							
								<a class="red" href="<?php echo site_url("kelompok/hapusjadwal/".$row->id_jadwal."") ?>" onClick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
									<i class="icon-trash bigger-130"></i>
								</a>
							</div>
						</center></td>
						<td><?php echo $i ?></td>
						<td><?php echo $row->jam ?></td>
						<td><?php echo $row->mapel ?></td>
						<td><?php echo $row->nama_pegawai ?></td>
						<td><?php echo $row->nama_ruangan ?></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>

</div>
</div>


<div id="modal-table" class="modal hide fade " tabindex="-1">
	<div class="modal-header no-padding">
		<div class="table-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			Data Asrama
		</div>
	</div>

	<div class="modal-body no-padding">
		<div class="row-fluid">
			<form class="form-horizontal" name="my-form" id="my-form" action="<?php echo site_url('kelompok/tambahjadwal') ?>" method="post">
				<br/>
				<input type="hidden" name="id_rombel" id="id_rombel" value="<?php echo $rombel->id_rombel ?>"/>
				<div class="control-group">
					<label class="control-label" for="form-filed-1">Hari</label>
					<div class="controls">
					<select class="span6" name="hari" id="hari"  required="required">
						<option value=''>.:Pilih Hari:.</option>
						<option value='Senin'>Senin</option>
						<option value='Selasa'>Selasa</option>
						<option value='Rabu'>Rabu</option>
						<option value='Kamis'>Kamis</option>
						<option value='Jumat'>Jumat</option>
						<option value='Sabtu'>Sabtu</option>
						<option value='Minggu'>Minggu</option>
					</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="form-filed-1">Jam</label>
					<div class="controls">
						<select class="span6" name="jam" id="jam"  required="required">
						<option value=''>.:Pilih Jam:.</option>
						<option value='08:00-08:45'>08:00-08:45</option>
						<option value='08:45-09:30'>08:45-09:30</option>
						<option value='09:30-10:15'>09:30-10:15</option>
						<option value='11:00-11:45'>11:00-11:45</option>
						<option value='16:00-16:45'>16:00-16:45</option>
						<option value='16:45-17:30'>16:45-17:30</option>
						<option value='20:00-20:45'>20:00-20:45</option>
						<option value='20:45-21:30'>20:45-21:30</option>
					</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="form-filed-1">Mata Pelajaran</label>
					<div class="controls">
						<select class="span6" name="matapelajaran" id="matapelajaran"  required="required">
							<option value=''>.:Pilih Mata Pelajaran:.</option>
							<?php 
								foreach($datamapel->result() as $row) {
									echo "<option value='".$row->kd_mp."'>".$row->mapel."</option>";
								}
							?>
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="form-filed-1">Instruktur</label>
					<div class="controls">
						<select class="span10" name="instruktur" id="instruktur"  required="required">
							<option value=''>.:Pilih Instruktur:.</option>
							<?php 
								foreach($datainstruktur->result() as $row) {
									echo "<option value='".$row->id_instruktur."'>".$row->nama_pegawai." (".$row->nip.")</option>";
								}
							?>
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="form-filed-1">Ruangan</label>
					<div class="controls">
						<select class="span6" name="ruangan" id="ruangan" required="required">
							<option value=''>.:Pilih Ruangan:.</option>
							<?php 
								foreach($dataruangan->result() as $row) {
									echo "<option value='".$row->kd_ruangan."'>".$row->nama_ruangan."</option>";
								}
							?>
						</select>
					</div>
				</div>
				
		
		</div>
	</div>
	<div class="modal-footer">
		<div class="pagination pull-right no-margin">
			<button type="submit" name="simpan" id="simpan" class="btn btn-small btn-success pull-left" >
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