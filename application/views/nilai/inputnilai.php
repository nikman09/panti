<script type="text/javascript">
$(document).ready(function(){
	$('.chzn-select').chosen();

	

});
function editData(id_nilai, nama_klien, nilai){
			$('#id_nilai').val(id_nilai);
			$('#nama2').val(nama_klien);
			$('#nilai2').val(nilai);
	}
</script>

<div class="row-fluid">
	<div class="table-header">
		<?php echo $judul; ?>
		<div class="widget-toolbar no-border pull-right">
	
		<a href="#modal-table" class="btn btn-small btn-info" role="button" data-toggle="modal" name="tambah" id="tambah" > 
			<i class="icon-plus"></i>
			Beri Nilai
		</a>
		
		</div>	
	</div>
	<?php 
		if($this->input->get('p')) {	
			$s = $this->input->get('p');
			if($s=='3') {
				echo  "<div class='alert alert-success' style='margin-top:10px;margin-bottom:10px'>Berhasil Menambahkan Nilai</div>";
			} else if ($s=='1') {
				echo  "<div class='alert alert-danger' style='margin-top:10px;margin-bottom:10px'>Berhasil Menghapus Nilai </div>";
			} else if ($s=='2') {
				echo  "<div class='alert alert-info' style='margin-top:10px;margin-bottom:10px'>Berhasil Mengedit Nilai </div>";
			}
		} else {
		
		}
	?>
	<table class="table fpTable lncp table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th class="center">NO</th>
				<!-- <th class="center">Foto</th> -->
				<th class="center">NIR</th>
				<th class="center">NAMA KLIEN</th>
				<th class="center">MATA PELAJARAN</th>
				<th class="center">NILAI</th>
				<th class="center">AKSI</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$i=1;

			foreach ($data->result() as $dt ) {
			
			?>
			<tr>	
				<td class="center span1"><?php echo $i++; ?></td>
				<td class="center span2"><?php echo $dt->nir; ?></td>
				<td ><?php echo $dt->nama_klien; ?></td>
				<td class="center"><?php echo $dt->mapel; ?></td>

				<td class="center"><?php echo $dt->nilai; ?></td>
			
				<td class="td-actions">
				 <?php if($dt->nilai!=null) { ?>
					<center>
						<div class="hidden-phone visible-desktop action-buttons">
							<a class="green" href="#modal-table2" onclick="javascript:editData('<?php echo $dt->id_nilai;?>','<?php echo $dt->nama_klien;?>','<?php echo $dt->nilai;?>',)" data-toggle="modal" >
								<i class="icon-pencil bigger-130"></i>
							</a>
							<a class="red" href="<?php echo site_url(); ?>/nilai/hapusnilai/<?php echo $dt->id_nilai; ?>" onClick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
								<i class="icon-trash bigger-130"></i>
							</a>
						</div>
					</center>
				 <?php } ?>
				</td> 
			</tr>
			<?php
			}
		  ?>

		</tbody>
	</table>
	<a href="<?php echo site_url("nilai") ?>" style="margin:10px" class="btn btn-small btn-info">Kembali</a>
</div>


<div id="modal-table" class="modal hide fade " tabindex="-1">
	<div class="modal-header no-padding">
		<div class="table-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			Input Nilai
		</div>
	</div>

	<div class="modal-body no-padding">
		<div class="row-fluid">
			<form class="form-horizontal" name="my-form" id="my-form" action="<?php echo site_url('nilai/tambahnilai') ?>" method="post">
				<br/>
				<input type="hidden" name="id_rombel" id="id_rombel" value="<?php echo $rombel->id_rombel ?>"/>
				<input type="hidden" name="kd_mp" id="kd_mp" value="<?php echo $mapel->kd_mp ?>"/>
				<div class="control-group">
					<label class="control-label" for="form-filed-1">Mata Pelajaran</label>
					<div class="controls">
						<input type="text" name="mp" id="mp"  value="<?php echo $mapel->mapel ?>" class="span6"  readonly/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="form-filed-1">Nama Klien</label>
					<div class="controls">
						<select class="span6" name="id_klien" id="id_klien"  required="required">
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
						<input type="number" name="nilai" id="nilai"  value="" class="span6"  required numeric/>
					</div>
				</div>
				
		
		</div>
	</div>
	<div class="modal-footer">
		<div class="pagination pull-right no-margin">
			<button type="submit" name="simpan" id="simpan" class="btn btn-small btn-success pull-left" onClick="return confirm('Apakah anda yakin ingin Menambah/Merubah data ini?')" >
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
			Input Nilai
		</div>
	</div>

	<div class="modal-body no-padding">
		<div class="row-fluid">
			<form class="form-horizontal" name="my-form" id="my-form" action="<?php echo site_url('nilai/editnilai') ?>" method="post">
				<br/>
				<input type="hidden" name="id_nilai" id="id_nilai" value=""/>
				<div class="control-group">
					<label class="control-label" for="form-filed-1">Mata Pelajaran</label>
					<div class="controls">
						<input type="text" name="mp2" id="mp2"  value="<?php echo $mapel->mapel ?>" class="span6"  readonly/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="form-filed-1">Nama Klien</label>
					<div class="controls">
						<input type="text" name="nama2" id="nama2"  value="" class="span6"  readonly/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="form-filed-1">Nilai</label>
					<div class="controls">
						<input type="number" name="nilai2" id="nilai2"  value="" class="span6"  required numeric/>
					</div>
				</div>
				
		
		</div>
	</div>
	<div class="modal-footer">
		<div class="pagination pull-right no-margin">
			<button type="submit" name="simpan" id="simpan" class="btn btn-small btn-success pull-left" onClick="return confirm('Apakah anda yakin ingin Menambah/Merubah data ini?')" >
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