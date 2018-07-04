<?php 
			if ($class == 'home'){
				$home = 'class="active"';
				$master= '';
				$transaksi= '';
				$website = '';
				$laporan = '';
				
			} elseif ($class == 'master') {
				$home = '';
				$master = 'class="active"';
				$transaksi= '';
				$website = '';
				$laporan = '';
				
			} elseif ($class == 'transaksi') {
				$home = '';
				$master = '';
				$transaksi= 'class="active"';
				$website = '';
				$laporan = '';
				
			} elseif ($class == 'website') {
				$home = '';
				$master = '';
				$transaksi= '';
				$website = 'class="active"';
				$laporan = '';
				
			} elseif ($class == 'laporan') {
				$home = '';
				$master = '';
				$transaksi= '';
				$website = '';
				$laporan = 'class="active"';
				
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
					<li <?php echo $home; ?> >
						<a href="<?php echo base_url(); ?>index.php/home">
							<i class="icon-dashboard"></i>
							<span class="menu-text"> Dashboard </span>
						</a>
					</li>

					
					<li <?php echo $master; ?> ><!-- MAster -->
						<a href="#" class="dropdown-toggle">
							<i class="icon-desktop"></i>
							<span class="menu-text"> Master </span>

							<b class="arrow icon-angle-down"></b>
						</a>

						<ul class="submenu">
						<li>
								<a href="<?php echo base_url(); ?>index.php/klien">
									<i class="icon-double-angle-right"></i>
									Klien
								</a>
							</li>
							<li>
								<a href="<?php echo base_url(); ?>index.php/pegawai">
									<i class="icon-double-angle-right"></i>
									Pegawai
								</a>
							</li>
							<li>
								<a href="<?php echo base_url(); ?>index.php/instruktur">
									<i class="icon-double-angle-right"></i>
									Instruktur
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
									Ruangan Kelas
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

					
					<li <?php echo $transaksi; ?> ><!-- Transaksi -->
						<a href="#" class="dropdown-toggle">
							<i class="icon-edit"></i>
							<span class="menu-text"> Transaksi </span>

							<b class="arrow icon-angle-down"></b>
						</a>

						<ul class="submenu">
							<li>
								<a href="<?php echo base_url(); ?>index.php/penerimaan">
									<i class="icon-double-angle-right"></i>
									Penerimaan Klien
								</a>
							</li>

							<li>
								<a href="<?php echo base_url(); ?>index.php/penempatan">
									<i class="icon-double-angle-right"></i>
									Penempatan Asrama
								</a>
							</li>
							<li>
								<a href="<?php echo base_url(); ?>index.php/kelompok">
									<i class="icon-double-angle-right"></i>
									Kelompok Belajar
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

					<li <?php echo $website; ?> ><!-- Transaksi -->
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
					<li <?php echo $laporan; ?> >
						<a href="#" class="dropdown-toggle">
							<i class="icon-print"></i>
							<span class="menu-text"> laporan </span>

							<b class="arrow icon-angle-down"></b>
						</a>

						<ul class="submenu">
							<li>
								<a href="<?php echo base_url(); ?>index.php/penerimaan" target="_blank">
									<i class="icon-double-angle-right"></i>
									Cetak Calon Klien
								</a>
							</li>
							<li>
								<a href="<?php echo base_url(); ?>index.php/penerimaan" target="_blank">
									<i class="icon-double-angle-right"></i>
									Cetak Data Per Klien
								</a>
							</li>
							<li>
								<a href="<?php echo base_url(); ?>index.php/klien/perkabupaten" target="_blank">
									<i class="icon-double-angle-right"></i>
									Cetak Klien Perkabupaten
								</a>
							</li>
							<li>
								<a href="<?php echo base_url(); ?>index.php/klien/cetakdata" target="_blank">
									<i class="icon-double-angle-right"></i>
									Cetak Data Klien
								</a>
							</li>
							<li>
								<a href="<?php echo base_url(); ?>index.php/penempatan" target="_blank">
									<i class="icon-double-angle-right"></i>
									Cetak Klien perasrama
								</a>
							</li>
							<li>
								<a href="<?php echo base_url(); ?>index.php/penempatan/laporanasrama" target="_blank">
									<i class="icon-double-angle-right"></i>
									Cetak Kondisi Asrama
								</a>
							</li>
							
							<li>
								<a href="<?php echo base_url(); ?>index.php/penempatan/riwayatpenempatancetak" target="_blank">
									<i class="icon-double-angle-right"></i>
									Cetak Riwayat Penempatan Asrama
								</a>
							</li>
							<li>
								<a href="<?php echo base_url(); ?>index.php/kelompok" target="_blank">
									<i class="icon-double-angle-right"></i>
									Cetak Jadwal, Absensi Klien, Absensi Instruktur
								</a>
							</li>
							<li>
								<a href="<?php echo base_url(); ?>index.php/penyaluran/laporanpenyaluran" target="_blank">
									<i class="icon-double-angle-right"></i>
									Cetak Penyaluran
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