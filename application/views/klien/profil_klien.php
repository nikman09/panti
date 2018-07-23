<script type="text/javascript">
$(document).ready(function(){

	$('#nama_klien').focus();

	$('.date-picker').datepicker().next().on(ace.click_event, function(){
		$(this).prev().focus();
	});

	<?php if (isset($_GET['a'])) { echo 'var a = 1;'; } else { echo 'var a = 0;'; }   ?>

	if (a==1) {
		$.gritter.add({
			title: 'Info',
			text: 'Berhasil Menambah Data',
			class_name: 'gritter-info'
		});
	}

});	


</script>




<div class="row-fluid">
	<div class="span3 center">
		<span class="profile-picture">
			<?php if (empty($foto)) { ?>
			<img class="editable" id="avatar2" src="<?php echo base_url(); ?>assets/foto_klien/no_foto.jpg"/>
			<?php } else { ?>
			<img class="editable" id="avatar2" src="<?php echo base_url(); ?>assets/foto_klien/<?php echo $foto; ?>" />
			<?php } ?>
		</span>
	</div>

	<div class="span9">
		<h3  class="green">
		<i class=" icon-user"></i> DATA KLIEN
		</h3>

		<form name="my-form" id="my-form" method="post" enctype="multipart/form-data" action="<?php echo site_url('klien/simpan') ?>"> 
		<input type="hidden" name="id" id="id" value="<?php echo $id_klien; ?>"  class="span3"  />
		<input type="hidden" value="<?php echo $a ?>" id="a" name="a" />
 			<div class="profile-user-info">
				<div class="profile-info-row">
					<div class="profile-info-name">NIR</div>
					<div class="profile-info-value">
						<input type="text" name="nir" id="nir" value="<?php echo $nir;?>"  class="span2" required />
					</div>
			</div>
			</div>

			<div class="profile-user-info">
				<div class="profile-info-row">
					<div class="profile-info-name">NIK</div>
					<div class="profile-info-value">
						<input type="text" name="nik" id="nik" value="<?php echo $nik;?>"  class="span4" required />
					</div>
			</div>
			</div>

			<div class="profile-user-info">
				<div class="profile-info-row">
					<div class="profile-info-name">Nama Lengkap</div>
					<div class="profile-info-value">
						<input type="text" name="nama_klien" id="nama_klien" value="<?php echo $nama_klien;?>"  class="span6" required/>
					</div>
			</div>
			</div>

			<div class="profile-user-info">
				<div class="profile-info-row">
					<div class="profile-info-name">TTL</div>
					<div class="profile-info-value">
						<input type="text" name="tempat_lahir" id="tempat_lahir" value="<?php echo $tempat_lahir; ?>"  class="span4" required/>
						<div class="input-append">
							<input type="text" name="tanggal_lahir" id="tanggal_lahir" value="<?php echo $tanggal_lahir; ?>"  class="span6 date-picker" data-date-format="dd-mm-yyyy" required/>
							<span class="add-on">
								<i class="icon-calendar"> </i>
							</span>
						</div>
					</div>
			</div>
			</div>

			<div class="profile-user-info">
				<div class="profile-info-row">
					<div class="profile-info-name">Jenis Kelamin</div>
					<div class="profile-info-value">
						<select name="sex" id="sex" class="span4" required>
							<option value="" selected="selected">--Pilih Jenis Kelamin--</option>
							<option value="L" <?php if ($sex == 'L') { ?> selected="selected"<?php } ?>>Laki-laki</option>
							<option value="P" <?php if ($sex == 'P') { ?> selected="selected"<?php } ?> >Perempuan</option>
						</select>
					</div>
				</div>
			</div>

			<div class="profile-user-info">
				<div class="profile-info-row">
					<div class="profile-info-name">Agama</div>
					<div class="profile-info-value">
						<select name="agama" id="agama"  class="span4" required>
							<option value="">--Pilih Agama--</option>
							<?php
								foreach ($data_agama as $dt ) {
									?>
										<option value="<?php echo $dt; ?>" <?php echo $agama==$dt? "selected":"" ?>><?php echo $dt; ?></option>
									<?php
								}
							?>
						</select>
					</div>
			</div>
			</div>

			<div class="profile-user-info">
				<div class="profile-info-row">
					<div class="profile-info-name">Alamat</div>
					<div class="profile-info-value">
						<input type="text" name="alamat" id="alamat" value="<?php echo $alamat;?>" class="span11"/>
					</div>
			</div>
			</div>
			<div class="profile-user-info">
				<div class="profile-info-row">
					<div class="profile-info-name">Kota/Kabupaten</div>
					<div class="profile-info-value">
						<select name="kota" id="kota"  class="span6">
							<option value="">--Pilih Asal Kota/Kabupaten--</option>
							<?php
								foreach ($data_kota as $dt ) {
									?>
										<option value="<?php echo $dt; ?>" <?php echo $kota==$dt? "selected":"" ?>><?php echo $dt; ?></option>
									<?php
								}
							?>
						</select>
					</div>
			</div>
			</div>

			<div class="profile-user-info">
				<div class="profile-info-row">
					<div class="profile-info-name">Telepon</div>
					<div class="profile-info-value">
						<input type="text" name="hp" id="hp" value="<?php echo $hp; ?>" class="span4" />
					</div>
			</div>
			</div>

			<div class="profile-user-info">
				<div class="profile-info-row">
					<div class="profile-info-name">Email</div>
					<div class="profile-info-value">
						<input type="text" name="email" id="email" value="<?php echo $email; ?>"  class="span4" />
					</div>
			</div>
			</div>

			<div class="profile-user-info">
				<div class="profile-info-row">
					<div class="profile-info-name">Status <?php echo $status ?></div>
					<div class="profile-info-value">
						<select name="status" id="status"  class="span4" required>
							<option value="">--Tentukan Status Klien--</option>
							<?php
								foreach ($data_status as $dt ) {
									?>
										<option value="<?php echo $dt; ?>" <?php echo $status==$dt? "selected":"" ?>><?php echo $dt; ?></option>
									<?php
								}
							?>
						</select>
					</div>
				</div>
			</div>

			<div class="profile-user-info">
				<div class="profile-info-row">
					<div class="profile-info-name">Upload File Foto</div>
					<div class="profile-info-value">
						<input type="file" name="foto" ID="foto"> 			
					</div>
				</div>
			</div>

			
		<h3 class="red">
		<i class=" icon-group "></i> DATA ORANG TUA
		</h3>
			<div class="profile-user-info">
				<div class="profile-info-row">
					<div class="profile-info-name">Nama Ayah</div>
					<div class="profile-info-value">
						<input type="text" name="nama_ayah" id="nama_ayah" value="<?php echo $nama_ayah;?>"  class="span6" />
					</div>
			</div>
			</div>

			<div class="profile-user-info">
				<div class="profile-info-row">
					<div class="profile-info-name">Nama Ibu</div>
					<div class="profile-info-value">
						<input type="text" name="nama_ibu" id="nama_ibu" value="<?php echo $nama_ibu;?>"  class="span6" />
					</div>
			</div>
			</div>

			<div class="profile-user-info">
				<div class="profile-info-row">
					<div class="profile-info-name">Alamat</div>
					<div class="profile-info-value">
						<input type="text" name="alamat_ortu" id="alamat_ortu" value="<?php echo $alamat_ortu;?>"  class="span11" />
					</div>
			</div>
			</div>

			<div class="profile-user-info">
				<div class="profile-info-row">
					<div class="profile-info-name">Telepon</div>
					<div class="profile-info-value">
						<input type="text" name="hp_ortu" id="hp_ortu" value="<?php echo $hp_ortu; ?>"  class="span4" />
					</div>
			</div>
			</div>

			<div class="alert alert-error" align="center">
				<button type="submit" name="simpan" id="simpan" class="btn btn-mini btn-primary">
				<i class="icon-save"></i> Simpan
				</button>
				<a href="<?php echo base_url(); ?>index.php/klien" class="btn btn-mini btn-success">
				<i class="icon-double-angle-left"></i> Kembali
				</a>
			</div>
		</form>
	</div>
</div>