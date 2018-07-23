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

						<li class="">
						<a class="nav-link <?php echo (($menu=='login')? "active":""); ?>" target="_blank" href="<?php echo site_url() ?>/login">
							Login
						</a>
					</li>
				
				</ul>
			</nav>
		</div>
		<ul class="header-social-icons social-icons d-none d-sm-block">
			<li class="social-icons-facebook">
						<a href="https://www.facebook.com/psbn.fajarharapan/" target="_blank" title="Facebook PSBN Fajar Harapan">
							<i class="fa fa-facebook"></i>
						</a>
					</li>
					<li class="social-icons-twitter">
						<a href="https://twitter.com/PSBNFH" target="_blank" title="Twitter PSBN Fajar Harapan">
							<i class="fa fa-twitter"></i>
						</a>
					</li>
					<li class="social-icons-youtube">
						<a href="https://www.youtube.com/channel/UCMMtHUsK7olaprw81hCuYlQ" target="_blank" title="Youtube PSBN Fajar Harapan">
							<i class="fa fa-youtube"></i>
						</a>
					</li>
		</ul>
		<button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main nav">
			<i class="fa fa-bars"></i>
		</button>
	</div>
</div>
