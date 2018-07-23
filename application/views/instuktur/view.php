<script type="text/javascript">
$(document).ready(function(){
	$('.date-picker').datepicker().next().on(ace.click_event, function(){
		$(this).prev().focus();
	});
	
});

function editData(id){
			$('#id_instruktur2').val(id);
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
	<?php 
		if($this->input->get('a')) {	
			$s = $this->input->get('a');
			if($s=='1') {
				echo  "<div class='alert alert-success' style='margin-top:10px;margin-bottom:10px;font-size:12px'>Berhasil Menambahkan Instruktur</div>";
			} else if ($s=='2') {
				echo  "<div class='alert alert-danger' style='margin-top:10px;margin-bottom:10px;font-size:12px'>Berhasil Menghapus Data</div>";
			} else if ($s=='3') {
				echo  "<div class='alert alert-success' style='margin-top:10px;margin-bottom:10px;font-size:12px'>Berhasil Mengubah Password</div>";
			}
		} else {
			echo "";
		}
	?>
	<table class="table fpTable lncp table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th class="center">NO</th>
				<th class="center">USERNAME</th>
				<th class="center">NIP/NIK</th>
				<th class="center">NAMA INSTRUKTUR</th>
				<th class="center">L/P</th>
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
				<td class="center span1"><?php echo $i++; ?></td>
				<td class="span3"><?php echo $dt->username; ?></td>

				<td class="span3"><?php echo $dt->nip; ?></td>
				<td ><?php echo $dt->nama_pegawai; ?></td>
				<td class="center"><?php echo $dt->sex; ?></td>
			
				<td ><?php echo $dt->status; ?></td>
				<td class="td-actions">
					<center>
						<div class="hidden-phone visible-desktop action-buttons">
							<a class="green" href="#modal-table2" onclick="javascript:editData('<?php echo $dt->id_instruktur;?>')" data-toggle="modal" >
								<i class="icon-pencil bigger-130"></i>
							</a>
							<a class="red" href="<?php echo site_url(); ?>/instruktur/hapus/<?php echo $dt->id_instruktur; ?>" onClick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
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
			Data Instruktur
		</div>
	</div>

	<div class="modal-body no-padding">
		<div class="row-fluid">
			<form class="form-horizontal" name="my-form" id="my-form" action="<?php  echo site_url('instruktur/tambahinstruktur')?>" method="post">
				<br/>

				<div class="control-group">
					<label class="control-label" for="form-filed-1">Nama Pegawai</label>
					<div class="controls">
					<select class="span10" id="pegawai" name="pegawai">
						<option value="">.:Pilih Pegawai:.</option>
						<?php 
							foreach($datapegawai->result() as $row ){
								echo "<option value='".$row->id_pegawai."'>".$row->nama_pegawai."</option>";
							}
						?>


					</select>
					</div>
				</div>
	
				<div class="control-group">
					<label class="control-label" for="form-filed-1">Username</label>
					<div class="controls">
						<input type="text" name="username" id="username" placeholder="Username" class="span6" required/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="form-filed-1">Password</label>
					<div class="controls">
						<input type="password" name="password" id="password" placeholder="Password" class="span6" required/>
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
			<button type="button" name="reset" id="reset" class="btn btn-small btn-info pull-left" >
				<i class="icon-add"></i>
				Reset
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
			Data Instruktur
		</div>
	</div>

	<div class="modal-body no-padding">
		<div class="row-fluid">
			<form class="form-horizontal" name="my-form" id="my-form" action="<?php  echo site_url('instruktur/editinstruktur')?>" method="post">
				<br/>
				<input type="hidden" name="id_instruktur2" id="id_instruktur2" class="span6"/>
				<div class="control-group">
					<label class="control-label" for="form-filed-1">Password</label>
					<div class="controls">
						<input type="password" name="password" id="password" placeholder="Password Baru" class="span6" required/>
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