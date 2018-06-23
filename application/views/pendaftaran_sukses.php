<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Halaman Pendaftaran - <?php echo $this->config->item('nama_aplikasi');?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<!--basic styles-->
		<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" />
		<link href="<?php echo base_url();?>assets/css/bootstrap-responsive.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.min.css" />
		<!--[if IE 7]>
		  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
		<![endif]-->
		<!--page specific plugin styles-->
		<!--fonts-->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-fonts.css" />
		<!--ace styles-->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-responsive.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-skins.min.css" />
		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->
		<!--inline styles related to this page-->
        <script type="text/javascript">
			window.jQuery || document.write("<script src='<?php echo base_url();?>assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>
		<!--<![endif]-->
		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
	
		<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
        <!--page specific plugin scripts-->
		<!--ace scripts-->
		<script src="<?php echo base_url();?>assets/js/ace-elements.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/ace.min.js"></script>
        
		<!--inline scripts related to this page-->
        
	</head>
	
	<body class="login-layout">
		<div class="main-container container-fluid">
			<div class="main-content">
				<div class="row-fluid">
					<div class="span12">
						<div class=>
							<div class="row-fluid">
								<div class="center">
									<i class=""></i>
									
									
									 <img src="<?php echo base_url();?>assets/img/logo-kalsel.png" width=50px>
									<h2><span class="white"><?php echo $this->config->item('nama_pendek');?></span></h2>
                                    <h4><span class="white"><?php echo $this->config->item('nama_instansi');?></span></h4>

                                    <h4><span class="red"><?php echo $this->config->item('provinsi');?></span></h4>
								</div>
							</div>
							<div class="span9">

		
	</div>
							<div class="space-6"></div>
							<div class="row-fluid">
							
								<div class="position-relative">
									<div id="login-box" class="login-box visible widget-box no-border">
										<div class="widget-body">
											<div class="widget-main">
												<h4 class="header green lighter bigger">
													<i class="icon-group blue"></i>
													Halaman Pendaftaran Rehabilitasi Klien Penyandang Disabilitas Netra
												</h4>
											
													<div class="tubuh" style="height:300px">
														<p style="font-size:16px"> Berhasil Melakukan Pendaftaran
														<br/>
														<span style="font-size:12px">
														ID Pendaftaran = <?php echo $idpendaftaran ?>
														</span>
														<br/>
														<span style="font-size:12px">
														 Proses Selanjutnya akan kami hubungi melalui telepon
														</span>
														</p>

													<div>
											</div><!--/widget-main-->

										</div><!--/widget-body-->
									</div><!--/login-box-->
								</div><!--/position-relative-->
							</div>
						</div>
					</div><!--/.span-->
				</div><!--/.row-fluid-->
			</div>
		</div><!--/.main-container-->
		<!--basic scripts-->
		<!--[if !IE]>-->



		
		

	</body>

</html>

