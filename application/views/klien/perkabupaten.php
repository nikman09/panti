<div class="row-fluid">
	<div class="tabbable">
		<ul class="nav nav-tabs padding-18" id="myTab">
			<li class="active">
				<a data-toggle="tab" href="#profil">
					<i class="green icon-user bigger-110"></i>
					Laporan Data Klien Perkabupaten
				</a>
			</li>
			
		</ul>
	</div>
	<div class="tab-content">
		<div id="profil" class="tab-pane in active">
			<div>
				<form method="get" action="<?php echo site_url() ?>/klien/cetakperkabupaten" >
					<div class="profile-info-row">
						<div class="profile-info-name">Klien</div>
						<div class="profile-info-value">
						<select name="kota" id="kota"  class="span6" required>
							<option value="">--Pilih Asal Kota/Kabupaten--</option>
							<?php
								foreach ($data_kota as $dt ) {
									?>
										<option value="<?php echo $dt; ?>"><?php echo $dt; ?></option>
									<?php
								}
							?>
						</select>
						</div>
					</div>
					<div style="margin-left:127px">
						<button type="submit" name="simpan" id="simpan" class="btn btn-small btn-success pull-left" >
						<i class="icon-save"></i>
						Simpan
						</button> &nbsp <a href="<?php echo site_url() ?>/klien" class="btn btn-small btn-default">Kembali</a>
					</div>
					</form>

			</div>
		</div>
	</div>
</div>
