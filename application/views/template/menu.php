<?php
	$menu = $this->router->fetch_class();
	$submenu = $this->router->fetch_method();
	
?>
<div class="header-row">
	<div class="header-nav">
		<div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1">
			<nav class="collapse">
				<ul class="nav nav-pills" id="mainNav">
					<li class="">
						<a class="nav-link <?php echo (($submenu=='index' && $menu=='web')? "active":""); ?>" href="<?php echo base_url() ?>">
							Beranda
						</a>
					</li>
						<li class="">
						<a class="nav-link <?php echo (( $menu=='berita')? "active":""); ?>" href="<?php echo site_url() ?>/berita">
							Berita
						</a>
					</li>
					
					<li class="">
						<a class="nav-link <?php echo (($menu=='pendaftaran')? "active":""); ?>" target="_blank" href="<?php echo site_url() ?>/pendaftaran">
							Pendaftaran Klien
						</a>
					</li>
				
				</ul>
			</nav>
		</div>
		<ul class="header-social-icons social-icons d-none d-sm-block">
			<li class="social-icons-facebook">
				<a href="http://www.facebook.com/" target="_blank" title="Facebook">
					<i class="fa fa-facebook"></i>
				</a>
			</li>
			<li class="social-icons-twitter">
				<a href="http://www.twitter.com/" target="_blank" title="Twitter">
					<i class="fa fa-twitter"></i>
				</a>
			</li>
			<li class="social-icons-linkedin">
				<a href="http://www.linkedin.com/" target="_blank" title="Linkedin">
					<i class="fa fa-linkedin"></i>
				</a>
			</li>
		</ul>
		<button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main nav">
			<i class="fa fa-bars"></i>
		</button>
	</div>
</div>
