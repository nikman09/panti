<div role="main" class="main">
				<div class="slider-container rev_slider_wrapper">
					<div id="revolutionSlider" class="slider rev_slider" data-plugin-revolution-slider data-plugin-options="{'delay': 9000, 'gridwidth': 1170, 'gridheight': 500, 'responsiveLevels': [4096,1200,992,500]}">
						<ul>
							<li data-transition="fade">

								<img src="<?php echo base_url() ?>assets/images/banner/1.jpg"  
									alt=""
									data-bgposition="center center" 
									data-bgfit="cover" 
									data-bgrepeat="no-repeat" 
									class="rev-slidebg">
							</li>
							<li data-transition="fade">

								<img src="<?php echo base_url() ?>assets/images/banner/2.jpg"  
									alt=""
									data-bgposition="center center" 
									data-bgfit="cover" 
									data-bgrepeat="no-repeat" 
									class="rev-slidebg">
							</li>
						</ul>
					</div>
				</div>
				<div class="home-intro" id="home-intro">
					<div class="container">

						<div class="row align-items-center">
							<div class="col-lg-8">
								<p>
								<em>Panti Sosial </em>Bina Netra Fajar Harapan 
									<span>Provinsi Kalimantan Selatan.</span>
								</p>
							</div>
							<div class="col-lg-4">
								<div class="get-started text-left text-lg-right">
									<a href="<?php echo site_url('pendaftaran') ?>" target="_blank" class="btn btn-lg btn-primary">Pendaftaran Klien</a>
								</div>
							</div>
						</div>

					</div>
				</div>
				<div class="container">
					<div class="row mb-5">
						<div class="col-lg-4">
							<h2 class="mb-4"><strong>Profil</strong></h2>
							<p>PSBN Fajar Harapan yang berdiri sejak tanggal 3 Januari 1962, merupakan Unit Pelaksana Teknis (UPT) Dinas Sosial Provinsi Kalimantan Selatan. PSBN Fajar Harapan menyelenggarakan pelayanan dan rehabilitasi/pembinaan bagi penyandang cacat netra untuk dibina menuju kemandirian dan kesetaraan dari usia 7– 35 tahun dengan sistem diasramakan. Kapasitas tampung sebanyak 70 klien baik putra maupun putri.</p>

						</div>
						<div class="col-lg-8 mt-5 mt-lg-0">
							<h2 class="mb-4">VISI & MISI</h2>

							<div class="row">
								<div class="col-lg-12">
									<div class="feature-box feature-box-style-2 appear-animation" data-appear-animation="fadeInLeft" data-appear-animation-delay="0">
										<div class="feature-box-icon">
											<i class="icon-user-following icons"></i>
										</div>
										<div class="feature-box-info">
											<h4 class="mb-2">Visi :</h4>
											<p class="mb-4">Terwujudnya pelayanan & rehabilitasi sosial bagi penyandang cacat netra agar mereka terampil dan percaya diri.</p>
										</div>
									</div>
								</div>
								</div>
								<div class="row">
							
								<div class="col-lg-12">
									<div class="feature-box feature-box-style-2 appear-animation" data-appear-animation="fadeInLeft" data-appear-animation-delay="0">
										<div class="feature-box-icon">
											<i class="icon-layers icons"></i>
										</div>
										<div class="feature-box-info">
											<h4 class="mb-2">Misi</h4>
											<p class="mb-4">◊ Memulihkan dan meningkatkan rasa harga diri, percaya diri, kecintaan kerja, dan kesadaran serta tanggung jawab terhadap masa depannya.
<br/>
									◊ Meningkatkan sumber daya penyandang tunanetra.
									<br/>
									◊ Meningkatkan kesadaran dan tanggung jawab bagi penyandang tunanetra untuk ikut berperan serta dalam proses pembangunan nasional.
									<br/>
									◊ Meningkatkan profesionalisme pekerja sosial/karyawan dalam menyelenggarakan pelayanan dan rehabilitasi penyandang cacat netra.
									<br/>
									◊ Menjalin kerjasama dengan berbagai pihak.</p>
										</div>
									</div>
								</div>
							</div>

						
							
							</div>
						</div>
					</div>
				</div>
			
					
				</div>
				<section class="parallax section section-text-light section-parallax section-center mt-0 mb-0" data-plugin-parallax data-plugin-options="{'speed': 1.5}" data-image-src="<?php echo base_url() ?>assets/front-end/img/parallax-6.jpg">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-lg-10">
								<div class="owl-carousel owl-theme nav-bottom rounded-nav" data-plugin-options="{'items': 1, 'loop': false}">
									<div>
										<div class="col">
											<div class="testimonial testimonial-style-2 testimonial-with-quotes mb-0">
												
												<blockquote>
													<p>Pusat Layanan Dan Rehabilitasi Bagi Penyandang Cacat Netra Di Kalimantan Selatan.</p>
												</blockquote>
												<!-- <div class="testimonial-author">
													<p><strong>John Smith</strong><span>CEO & Founder - Okler</span></p>
												</div> -->
											</div>
										</div>
									</div>
									
								</div>
							</div>
						</div>
					</div>
				</section>
				<div class="container">
					<div class="row mt-4">
						<div class="col-lg-12 text-center">
							<h2 class="mt-4 mb-4">Berita</h2>
						</div>
					</div>
					<div class="row">

					<?php foreach($berita->result() as  $row ) { ?>
						<div class="col-lg-4">
							<div class="recent-posts mt-4">
								<article class="post">
									<div class="date">
										<span class="day"><?php echo date('d',strtotime($row->tanggal)) ?></span>
										<span class="month"><?php echo date('M',strtotime($row->tanggal)) ?></span>
									</div>
									<h4><a href="blog-post.html"><?php echo $row->judul ?></a></h4>
									<p><?php echo substr($row->isi,0,200) ?></p>
									<a class="btn btn-outline btn-light mt-3 mb-5" href="<?php echo site_url('berita/daftar/'.$row->id_berita.'') ?>">Read More</a>
								</article>
							</div>
						</div>
					<?php } ?>
						
						</div>
					</div>
				</div>
			</div>