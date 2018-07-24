<div class="row-fluid">
	<div class="tabbable">
		<ul class="nav nav-tabs padding-18" id="myTab">
			<li class="active">
				<a data-toggle="tab" href="#profil">
					<i class="green icon-user bigger-110"></i>
					Penempatan Klien Kelompok Belajar
				</a>
			</li>
			
		</ul>
	</div>
	<div class="tab-content">
		<div id="profil" class="tab-pane in active">
			<div>
				<form method="post" action="<?php echo site_url() ?>/kelompok/tambahklien?kd=<?php echo $rombel->id_rombel ?>" >
					<div class="profile-info-row">
						<div class="profile-info-name">Klien</div>
						<div class="profile-info-value">
							<select  name="id_klien" id="id_klien" class="span6" required>
								<option value='' >.:Pilih Nama Klien:.</option>
								<?php
									foreach($data->result() as $row) {
										echo "<option value='".$row->id_klien."'>".$row->nama_klien." (".$row->nir.")</option>" ;
									}
								?>
							</select>
						</div>
					</div>
					<div style="margin-left:127px">
						<button type="submit" name="simpan" id="simpan" class="btn btn-small btn-success pull-left" onClick="return confirm('Apakah anda yakin ingin Menambah/Merubah data ini?')">
						<i class="icon-save"></i>
						Tambah
						</button> &nbsp <a href="<?php echo site_url() ?>/kelompok/klien?as=<?php echo $rombel->id_rombel ?>" class="btn btn-small btn-default">Kembali</a>
					</div>
					</form>

			</div>
		</div>
	</div>
</div>
