<!DOCTYPE html>
<html>
  <head>
    <meta name="generator"
    content="HTML Tidy for HTML5 (experimental) for Windows https://github.com/w3c/tidy-html5/tree/c63cc39" />
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>PSBN</title>
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Porto - Responsive HTML5 Template" />
    <meta name="author" content="okler.net" />
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/img/logo-kalsel.png" type="image/x-icon" />
    <link rel="apple-touch-icon" href="<?php echo base_url() ?>assets/front-end/img/apple-touch-icon.png" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet"
    type="text/css" />
    <!-- Vendor CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/front-end/vendor/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/front-end/vendor/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/front-end/vendor/animate/animate.min.css" />
    <link rel="stylesheet"
    href="<?php echo base_url() ?>assets/front-end/vendor/simple-line-icons/css/simple-line-icons.min.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/front-end/vendor/owl.carousel/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/front-end/vendor/owl.carousel/assets/owl.theme.default.min.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/front-end/vendor/magnific-popup/magnific-popup.min.css" />
    <!-- Theme CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/front-end/css/theme.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/front-end/css/theme-elements.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/front-end/css/theme-blog.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/front-end/css/theme-shop.css" />
    <!-- Demo CSS -->
    <!-- Skin CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/front-end/css/skins/default.css" />
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/front-end/css/custom.css" />
    <!-- Head Libs -->
    <script src="%3C?php%20echo%20base_url()%20?%3Eassets/front-end/vendor/modernizr/modernizr.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/front-end/vendor/select/select2.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/front-end/vendor/select/select2-bootstrap.css" />
		<!-- Current Page CSS -->
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/front-end/vendor/rs-plugin/css/settings.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/front-end/vendor/rs-plugin/css/layers.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/front-end/vendor/rs-plugin/css/navigation.css">
		
		<!-- Demo CSS -->


		<!-- Skin CSS -->
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/front-end/css/skins/skin-corporate-4.css"> 

  </head>
  <body>
    <div class="body">
      <header id="header"
      data-plugin-options="{&#39;stickyEnabled&#39;: true, &#39;stickyEnableOnBoxed&#39;: true, &#39;stickyEnableOnMobile&#39;: true, &#39;stickyStartAt&#39;: 55, &#39;stickySetTop&#39;: &#39;-55px&#39;, &#39;stickyChangeLogo&#39;: true}">

        <div class="header-body">
          <div class="header-container container">
            <div class="header-row">
              <div class="header-column">
                <div class="header-row">
                  <div class="header-logo">
                    <a href="">
                      <img alt="Porto" width="220"  data-sticky-width="150"  data-sticky-top="35"
                      src="<?php  echo base_url() ?>assets/img/logo-kalsel2.png" style="margin-top:10px" />
                    </a>
                  </div>
                </div>
              </div>
              <div class="header-column justify-content-end">
                <div class="header-row pt-3">
                  <nav class="header-nav-top">
                    <ul class="nav nav-pills">
                      <li class="nav-item d-none d-sm-block">
                        <a class="nav-link" href="<?php echo site_url('login') ?>">Login</a>
                      </li>
                    
                      <li class="nav-item">
                        <span class="ws-nowrap">(0511) 4772375</span>
                      </li>
                    </ul>
                  </nav>
                  <div class="header-search d-none d-md-block">
                    <form id="searchForm" action="page-search-results.html" method="get">
                      <div class="input-group">
                        <input type="text" class="form-control" name="q" id="q" placeholder="Search..." required="" />
                      </div>
                    </form>
                  </div>
                </div>
                <!-- DISINI -->
                <?php $this->load->view('template/menu'); ?>
              </div>
            </div>
          </div>
        </div>
      </header>
    </div>
  </body>
</html>
