<?php 
			if ($class == 'home'){
				$home = 'class="active"';
				$master= '';
				$transaksi= '';
				$laporan = '';
				
			} elseif ($class == 'master') {
				$home = '';
				$master = 'class="active"';
				$transaksi= '';
				$laporan = '';
				
			} elseif ($class == 'transaksi') {
				$home = '';
				$master = '';
				$transaksi= 'class="active"';
				$laporan = '';
				
			} elseif ($class == 'laporan') {
				$home = '';
				$master = '';
				$transaksi= '';
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
								<a href="<?php echo base_url(); ?>index.php/klien">
									<i class="icon-double-angle-right"></i>
									Klien
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