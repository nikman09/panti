<div role="main" class="main">

				<section class="page-header">
					<div class="container">
						<div class="row">
							<div class="col">
								<h1>Berita</h1>
							</div>
						</div>
					</div>
				</section>

				<div class="container">
				<?php foreach($data->result() as  $row ) { ?>
						<div class="col-lg-12">
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
