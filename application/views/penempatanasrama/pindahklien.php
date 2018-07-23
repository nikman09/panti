<div class="row-fluid">
	<div class="tabbable">
		<ul class="nav nav-tabs padding-18" id="myTab">
			<li class="active">
				<a data-toggle="tab" href="#profil">
					<i class="green icon-user bigger-110"></i>
					Penempatan Klien
				</a>
			</li>
			
		</ul>
	</div>
	<div class="tab-content">
		<div id="profil" class="tab-pane in active">
			<div>
				<form method="post" action="<?php echo site_url() ?>/penempatan/pindahklien?id=<?php echo $data->id_penempatan ?>" >
					<div class="profile-info-row">
						<div class="profile-info-name">Nama Klien</div>
						<div class="profile-info-value">
							<?php	echo $data->nama_klien; ?>
							<input type="hidden" name="nama_klien" id="nama_klien" value="<?php echo $data->nama_klien?>" />
							<input type="hidden" name="id_klien" id="id_klien" value="<?php echo $data->id_klien?>" />
							<input type="hidden" name="id_penempatan" id="id_penempatan" value="<?php echo $data->id_penempatan?>" />
						</div>
					</div>
					<div class="profile-info-row">
						<div class="profile-info-name">NIR</div>
						<div class="profile-info-value">
							<?php	echo $data->nir; ?>
							<input type="hidden" name="nir" id="nir" value="<?php echo $data->nir?>" />
						</div>
					</div>

					<div class="profile-info-row">
						<div class="profile-info-name">Asrama Saat ini</div>
						<div class="profile-info-value">
							<?php	echo $asrama->asrama; ?>
							<input type="hidden" name="asalasrama" id="asalasrama" value="<?php echo $asrama->kd_asrama?>" />
						</div>
					</div>
					<div class="profile-info-row">
						<div class="profile-info-name">Pindah ke asrama</div>
						<div class="profile-info-value">
							<select id="pindahasrama" name="pindahasrama" class="span3" required>
							<?php
								foreach($daftarasrama->result() as $row){
									echo "<option value='".$row->kd_asrama."'>".$row->asrama."</option>";
								}
							?>
							</select>
						</div>
					</div>
					<div style="margin-left:127px">
						<button type="submit" name="simpan" id="simpan" class="btn btn-small btn-success pull-left" >
						<i class="icon-save"></i>
						Pindah
						</button> &nbsp <a href="<?php echo site_url() ?>/penempatan/klien?as=<?php echo $asrama->kd_asrama ?>" class="btn btn-small btn-default">Kembali</a>
					</div>
					</form>
					
			</div>
		</div>
	</div>
</div>
