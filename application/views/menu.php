<?php 
			if ($class == 'Dashboard'){
				$Dashboard = 'class="active"';
				$Master= '';
				$Pelayanan= '';
				$Pembinaan= '';
				$Website = '';
				$Laporan = '';
				
			} elseif ($class == 'Master') {
				$Dashboard = '';
				$Master = 'class="active"';
				$Pelayanan= '';
				$Pembinaan= '';
				$Website = '';
				$Laporan = '';
				
			} elseif ($class == 'Pelayanan') {
				$Dashboard = '';
				$Master = '';
				$Pelayanan= 'class="active"';
				$Pembinaan= '';
				$Website = '';
				$Laporan = '';

			} elseif ($class == 'Pembinaan') {
				$Dashboard = '';
				$Master = '';
				$Pelayanan= '';
				$Pembinaan= 'class="active"';
				$Website = '';
				$Laporan = '';
				
			} elseif ($class == 'Website') {
				$Dashboard = '';
				$Master = '';
				$Pelayanan= '';
				$Pembinaan= '';
				$Website = 'class="active"';
				$Laporan = '';
				
			} elseif ($class == 'Laporan') {
				$Dashboard = '';
				$Master = '';
				$Pelayanan= '';
				$Pembinaan= '';
				$Website = '';
				$Laporan = 'class="active"';
				
			} 
		?>
			<a class="menu-toggler" id="menu-toggler" href="#">
				<span class="menu-text"></span>
			</a>

			<div class="sidebar" id="sidebar">
				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<i class="icon-calendar"> </i> 
						<?php echo $tgl_hari . ", " . $tgl_indo; ?>
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!--#sidebar-shortcuts-->
				<div align="center">
				<br/>
					<img src="<?php echo base_url();?>assets/img/logo-kalsel.png" width="80" >
					<br/>
					<br/>
					<!-- <h6><?php echo $this->config->item('nama_instansi'); ?>
						<?php echo $this->config->item('provinsi'); ?>
						
					</h6> -->
				</div>

				<ul class="nav nav-list">
					<li <?php echo $Dashboard; ?> >
						<a href="<?php echo base_url(); ?>index.php/home">
							<i class="icon-dashboard"></i>
							<span class="menu-text"> Dashboard </span>
						</a>
					</li>

					
					<li <?php echo $Master; ?> ><!-- Master -->
						<a href="#" class="dropdown-toggle">
							<i class="icon-desktop"></i>
							<span class="menu-text"> Master </span>

							<b class="arrow icon-angle-down"></b>
						</a>

						<ul class="submenu">
						
							<li>
								<a href="<?php echo base_url(); ?>index.php/pegawai">
									<i class="icon-double-angle-right"></i>
									Pegawai
								</a>
							</li>

							<li>
								<a href="<?php echo base_url(); ?>index.php/asrama"> 

									<i class="icon-double-angle-right"></i>
									Asrama
									
								</a>
							</li>

							<li>
								<a href="<?php echo base_url(); ?>index.php/probi">
									<i class="icon-double-angle-right"></i>
									Program Pembinaan
								</a>
							</li>

							<li>
								<a href="<?php echo base_url(); ?>index.php/mapel">
									<i class="icon-double-angle-right"></i>
									Mata Pelajaran
								</a>
							</li>

							<li>
								<a href="<?php echo base_url(); ?>index.php/ruangan">
									<i class="icon-double-angle-right"></i>
									Ruangan
								</a>
							</li>

							<li>
								<a href="<?php echo base_url(); ?>index.php/rombel">
									<i class="icon-double-angle-right"></i>
									Kelompok Belajar
								</a>
							</li>

							<li>
								<a href="<?php echo base_url(); ?>index.php/tahunakademik">
									<i class="icon-double-angle-right"></i>
									Tahun Akademik
								</a>
							</li>
							
						</ul>
					</li>

					
					<li <?php echo $Pelayanan; ?> >
						<a href="#" class="dropdown-toggle">
							<i class="icon-home"></i>
							<span class="menu-text"> Pelayanan </span>

							<b class="arrow icon-angle-down"></b>
						</a>

						<ul class="submenu">
							<li>
								<a href="<?php echo base_url(); ?>index.php/penerimaan">
									<i class="icon-double-angle-right"></i>
									Calon Klien
								</a>
							</li>

							<li>
								<a href="<?php echo base_url(); ?>index.php/klien">
									<i class="icon-double-angle-right"></i>
									Klien
								</a>
							</li>

							<li>
								<a href="<?php echo base_url(); ?>index.php/penempatan">
									<i class="icon-double-angle-right"></i>
									Kondisi Asrama
								</a>
							</li>
							
						</ul>
					</li>

					<li <?php echo $Pembinaan; ?> >
						<a href="#" class="dropdown-toggle">
							<i class="icon-book"></i>
							<span class="menu-text"> Pembinaan </span>

							<b class="arrow icon-angle-down"></b>
						</a>

						<ul class="submenu">
								
							<li>
								<a href="<?php echo base_url(); ?>index.php/kelompok">
									<i class="icon-double-angle-right"></i>
									Kondisi Kelompok Belajar
								</a>
							</li>

							<li>
								<a href="<?php echo base_url(); ?>index.php/instruktur">
									<i class="icon-double-angle-right"></i>
									Instruktur
								</a>
							</li>

							<li>
								<a href="<?php echo base_url(); ?>index.php/nilai">
									<i class="icon-double-angle-right"></i>
									Nilai
								</a>
							</li>
							<li>
								<a href="<?php echo base_url(); ?>index.php/transkrip">
									<i class="icon-double-angle-right"></i>
									Transkrip
								</a>
							</li>
							<li>
								<a href="<?php echo base_url(); ?>index.php/penyaluran">
									<i class="icon-double-angle-right"></i>
									Penyaluran Klien
								</a>
							</li>
							
						</ul>
					</li>

					<li <?php echo $Website; ?> ><!-- Pelayanan -->
						<a href="#" class="dropdown-toggle">
							<i class="icon-star"></i>
							<span class="menu-text"> Web </span>

							<b class="arrow icon-angle-down"></b>
						</a>

						<ul class="submenu">
							<li>
								<a href="<?php echo base_url(); ?>index.php/daftarberita">
									<i class="icon-double-angle-right"></i>
									Berita
								</a>
							</li>

						
						</ul>
					</li>
					<li <?php echo $Laporan; ?> >
						<a href="#" class="dropdown-toggle">
							<i class="icon-print"></i>
							<span class="menu-text"> Laporan </span>

							<b class="arrow icon-angle-down"></b>
						</a>

						<ul class="submenu">
							<li>
								<a href="<?php echo base_url(); ?>index.php/penerimaan/dafcaklien" >
									<i class="icon-double-angle-right"></i>
									Biodata Calon Klien
								</a>
							</li>
							<li>
								<a href="<?php echo base_url(); ?>index.php/klien/daftarklien" >
									<i class="icon-double-angle-right"></i>
									Biodata Klien
								</a>
							</li>
							<li>
								<a href="<?php echo base_url(); ?>index.php/klien/cetakdaftarklien" target="_blank">
									<i class="icon-double-angle-right"></i>
									Daftar Klien 
								</a>
							</li>
							<li>
								<a href="<?php echo base_url(); ?>index.php/klien/perkabupaten" >
									<i class="icon-double-angle-right"></i>
									Daftar Klien Kabupaten/Kota
								</a>
							</li>
							
							<li>
								<a href="<?php echo base_url(); ?>index.php/penempatan/listasrama" >
									<i class="icon-double-angle-right"></i>
									Daftar Klien Asrama
								</a>
							</li>
							<li>
								<a href="<?php echo base_url(); ?>index.php/penempatan/Laporanasrama" target="_blank">
									<i class="icon-double-angle-right"></i>
									Print Kondisi Asrama
								</a>
							</li>
							
							<li>
								<a href="<?php echo base_url(); ?>index.php/penempatan/riwayatpenempatancetak" target="_blank">
									<i class="icon-double-angle-right"></i>
									Print Riwayat Penempatan Asrama
								</a>
							</li>
							<li>
								<a href="<?php echo base_url(); ?>index.php/kelompok/listkelompok" >
									<i class="icon-double-angle-right"></i>
									Print Jadwal, Absensi Klien, Absensi Instruktur
								</a>
							</li>
							<li>
								<a href="<?php echo base_url(); ?>index.php/penyaluran/Laporanpenyaluran" target="_blank">
									<i class="icon-double-angle-right"></i>
									Daftar Penyaluran Klien
								</a>
							</li>
							
						</ul>
					</li>
					


					<li>
						<a href="<?php echo base_url(); ?>index.php/login/logout" class="">
							<i class="icon-off"></i>
							<span class="menu-text"> Keluar </span>
						</a>
					</li>

				</ul><!--/.nav-list-->

				<div class="sidebar-collapse" id="sidebar-collapse">
					<i class="icon-double-angle-left"></i>
				</div>
			</div>