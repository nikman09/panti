<script type="text/javascript">
$(document).ready(function(){
	$('.date-picker').datepicker().next().on(ace.click_event, function(){		
		$(this).prev().focus();
	});

	$('.edit').click(function(e){
		var id = this.id;
		$.ajax({
			type: 'GET',
			url: "<?php echo site_url(); ?>/penempatan/cari/" + id,
			dataType: "json",
			success: function(data){
				$('#kd_asrama').val(id);
				$('#pegawai').val(data.id_pegawai);
				$('#sk').val(data.sk);
				$('#tmt').val(data.tmt);
				$('#tanggal_sk').val(data.tanggal_sk);
			}
		});
	});

	$('#simpan').click(function(){	
		var v_id_pegawai	= $('#pegawai').val();
		var v_sk			= $('#sk').val();
		var v_tmt 			= $('#tmt').val();
		var v_tanggal_sk    = $('#tanggal_sk').val();
		var v_kd_asrama 	= $('#kd_asrama').val();
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>/penempatan/pengelola",
			data	:  {
						id_pegawai: v_id_pegawai,
						sk: v_sk,
						tmt: v_tmt,
						tanggal_sk: v_tanggal_sk,
						kd_asrama: v_kd_asrama
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
		
	</div>

	<table class="table fpTable lncp table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th class="center">NO</th>
				<th class="center">ASRAMA</th>
				<th class="center">PENGELOLA</th>
				
				<th class="center">KOUTA</th>
				<th class="center">PENEMPATAN KLIEN</th>
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
				<td ><?php echo $dt->asrama; ?></td>
				<td class='center'><?php 
						if ($dt->nama_pegawai=='') {
							echo "<a class=\" edit \"  href=\"#modal-table\"  data-toggle='modal' id=\"".$dt->kd_asrama."\"><i class='icon-plus'></i> Tambah</a>";
						} else {
							echo "<a class=\"edit \"  href=\"#modal-table\"  data-toggle='modal' id=\"".$dt->kd_asrama."\">".$dt->nama_pegawai."</a>";
						}
					?>
					</td>
				<td class="center"><?php echo $dt->kouta; ?> Orang</td>
				<td class="td-actions">
					<center>
						<a href="<?php site_url() ?>penempatan/klien?as=<?php echo $dt->kd_asrama; ?>" class="" ><i class="icon-user bigger-130"></i> <?php  echo $this->model_penempatan->jumlahklien($dt->kd_asrama);  ?> Orang</a> 
					</center>
				</td> 
				<td class="center"><a target="_blank" href="<?php echo site_url('penempatan/cetakdataklien/'.$dt->kd_asrama.'') ?>"><i class="icon icon-print bigger-160"></i> </a></td>
			</tr>
			<?php
			}
		  ?>

		</tbody>
	</table>
	<p align="right" style="margin-top:20px">
	<a href="<?php echo site_url("penempatan/riwayatpenempatan") ?>" class="btn btn-success btn-small"> Riwayat Penempatan </a>
	<a href="<?php echo site_url("penunjukan") ?>" class="btn btn-success btn-small"> Riwayat Penunjukan </a>
	<a href="<?php echo site_url("penempatan/laporanasrama/") ?>" class="btn btn-success btn-small" target="_blank"><i class="icon icon-print"></i> Print Laporan </a>
	</p>
</div>

<div id="modal-table" class="modal hide fade " tabindex="-1">
	<div class="modal-header no-padding">
		<div class="table-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			Tambah Data Pengelola Asrama
		</div>
	</div>

	<div class="modal-body no-padding">
		<div class="row-fluid">
			<form class="form-horizontal" name="my-form" id="my-form">
				<br/>
				<div class="control-group">
					<label class="control-label" for="form-filed-1">Nama Pegawai</label>
					<div class="controls">
					<select class="span6" name="pegawai" id="pegawai">
						<option value='' selected="selected">.:Pilih pegawai:.</option>
						<?php
							foreach($datapegawai as $row) {
								echo "<option value='".$row->id_pegawai."'>".$row->nama_pegawai."</option>";
							}  
						?>
					</select>
					<input type="hidden" name="kd_asrama" id="kd_asrama"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="form-filed-1">SK</label>
					<div class="controls">
						<input type="text" name="sk" id="sk" placeholder="SK" class="span6"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="form-filed-1">TMT</label>
					<div class="controls">
					<div class="input-append">
						<input type="text" name="tmt" id="tmt" value=""  class="span10 date-picker" data-date-format="dd-mm-yyyy" />
							<span class="add-on">
								<i class="icon-calendar"> </i>
							</span>
					</div>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="form-filed-1">Tanggal SK</label>
					<div class="controls">
					<div class="input-append">
							<input type="text" name="tanggal_sk" id="tanggal_sk" value=""  class="span10 date-picker" data-date-format="dd-mm-yyyy" />
							<span class="add-on">
								<i class="icon-calendar"> </i>
							</span>
						</div>
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