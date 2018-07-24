<div class="row-fluid">
	<div class="tabbable">
		<ul class="nav nav-tabs padding-18" id="myTab">
			<li class="active">
				<a data-toggle="tab" href="#profil">
					<i class="green icon-star bigger-110"></i>
					Tambah Berita
				</a>
			</li>
			
		</ul>
	</div>
	<div class="tab-content">
		<div id="profil" class="tab-pane in active">
			<div>
			<?php 
		if($this->input->get('p')) {	
			$s = $this->input->get('p');
			if($s=='1') {
				echo  "<div class='alert alert-success' style='margin-top:10px;margin-bottom:10px'>Berhasil Menambah Berita</div>";
			} 
		} else {
		
		}
	?>
				<form method="post" action="<?php echo site_url() ?>/daftarberita/tambah" >
					<div class="profile-info-row">
						<div class="profile-info-name">Berita</div>
						<div class="profile-info-value">
							<input type="text"  name="judul" id="judul" class="span6" required/>
								
						</div>
					</div>
					<div class="profile-info-row">
						<div class="profile-info-name">Keterangan</div>
						<div class="profile-info-value">
							<input type="text"  name="keterangan" id="keterangan" class="span6" required/>
								
						</div>
					</div>
					<div class="profile-info-row">
						<div class="profile-info-name">Isi</div>
						<div class="profile-info-value">
							<textarea type="text"  name="isi" id="isi" class="span6" rows="20" required></textarea>
								
						</div>
					</div>
					<div style="margin-left:127px">
						<button type="submit" name="simpan" id="simpan" class="btn btn-small btn-success pull-left" onClick="return confirm('Apakah anda yakin ingin Menambah/Merubah data ini?')" >
						<i class="icon-save"></i>
						Simpan
						</button> &nbsp <a href="<?php echo site_url() ?>/daftarberita" class="btn btn-small btn-default">Kembali</a>
					</div>
					</form>

			</div>
		</div>
	</div>
</div>
