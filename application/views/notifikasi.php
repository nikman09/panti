<ul class="nav ace-nav pull-right">
						

						<li class="" style="background:#438eb9">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="<?php echo base_url();?>assets/avatar/<?php echo $this->model_data->cari_foto_username($this->session->userdata('username')) ?>" alt="Admin Photo" />
								<span class="user-info">
									<small>Selamat Datang</small>
									<?php echo $this->session->userdata('nama_lengkap'); ?>
								</span>

								<i class="icon-caret-down"></i>
							</a>

							<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer">

								<li>
									<a href="<?php echo base_url(); ?>index.php/profil">
										<i class="icon-user"></i>
										Edit Profile
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="<?php echo base_url(); ?>index.php/login/logout">
										<i class="icon-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul><!--/.ace-nav-->