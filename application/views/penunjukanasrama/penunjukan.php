<script type="text/javascript">

</script>

<div class="row-fluid">
	<div class="table-header">
		<?php echo $judul; ?>
		
	</div>

	<table class="table fpTable lncp table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th class="center">No</th>
				<th class="center">Nama Pegawai</th>
				<th class="center">Asrama</th>
				<th class="center">SK</th>
				<th class="center">TMT</th>
				<th class="center">Tanggal SK</th>
				<td>#</td>
			</tr>
		</thead>
		<tbody>
			<?php
			$i=1;
			foreach ($data as $dt ) {
			?>
			<tr>
				<td class="center"><?php echo $i++; ?></td>
				<td class="center"><?php echo $dt->nama_pegawai; ?></td>
				<td ><?php echo $dt->asrama; ?></td>
				<td class="center"><?php echo $dt->sk; ?></td>
				<td class="center"><?php echo $dt->tmt; ?></td>
				<td class="center"><?php echo $dt->tgl_sk; ?></td>
				<td>
				<a class="red" href="<?php echo site_url(); ?>/penunjukan/hapusriwayat/<?php echo $dt->id_penunjukan; ?>" onClick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
								<i class="icon-trash bigger-130"></i>
				</a>
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
			Data Asrama
		</div>
	</div>

	<div class="modal-body no-padding">
		<div class="row-fluid">
			<form class="form-horizontal" name="my-form" id="my-form">
				<div class="control-group">
					<label class="control-label" for="form-filed-1">Kode Asrama</label>
					<div class="controls">
						<input type="text" name="kode" id="kode" placeholder="Kode Asrama" class="span4"  maxlength="10" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="form-filed-1">Nama Asrama</label>
					<div class="controls">
						<input type="text" name="asrama" id="asrama" placeholder="Nama Asrama" class="span6"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="form-filed-1">Daya Tampung</label>
					<div class="controls">
						<input type="text" name="kouta" id="kouta" placeholder="daya tampung" class="span5"/>
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