<div class="row-fluid">
	<div class="span12">
		<form name="form-foto" id="form-foto"
		action="<?php echo site_url(); ?>/profil/simpan_foto" method="post" enctype="multipart/form-data">
			<div class="profile-info-row">
				<div class="profile-info-name"> Upload File Foto </div>
				<div class="profile-info-value">
					<input type="file" name="gambar" id="gambar" />
				</div>
			</div>
			<div class="form-actions center">
				<button type="submit" name="simpan_profil" id="simpan_profil" class="btn btn-mini btn-primary">
					<i class="icon-save"></i> Upload Foto
				</button>
			</div>
		</form>
	</div>
</div>