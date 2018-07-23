<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title><?php echo $this->config->item('nama_aplikasi');?></title>
		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<!--basic styles-->
		<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" />
		<link href="<?php echo base_url();?>assets/css/bootstrap-responsive.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.min.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>assets/icon/css/font-awesome.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-fonts.css" />

		<!--ace styles-->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-responsive.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-skins.min.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/app.css" />
        
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery-ui-1.10.3.custom.min.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/chosen.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/datepicker.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery.gritter.css" />
        
        <!--
		<script type="text/javascript">
			window.jQuery || document.write("<script src='<?php echo base_url();?>assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>
		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='<?php echo base_url();?>assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
        -->
        
        <script src="<?php echo base_url();?>assets/js/jquery-2.0.3.min.js"></script>        
        <script src="<?php echo base_url();?>assets/js/jquery.mobile.custom.min.js"></script>        
		<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>        
		
		<script src="<?php echo base_url();?>assets/js/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/jquery.ui.touch-punch.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/chosen.jquery.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/flot/jquery.flot.resize.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/date-time/bootstrap-datepicker.min.js"></script>
        
        <!--Table-->
		<script src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/jquery.dataTables.bootstrap.js"></script>
        <script type='text/javascript' src='<?php echo base_url()?>assets/js/jquery/jquery-migrate-1.1.1.min.js'></script>
        
        
        <!--ace scripts-->
		<script type='text/javascript' src='<?php echo base_url()?>assets/js/app.js'></script>
        <script src="<?php echo base_url();?>assets/js/jquery.gritter.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/ace-elements.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/ace.min.js"></script>
<style>
th, td {
    padding: 5px;
	font-size: 11px;
	color : #707070;
}

</style>
	</head>

	<body>
		<div class="navbar">
			<div class="navbar-inner">
				<div class="container-fluid">
					<a href="#" class="brand">
						<small>
							<!--<i class="icon-leaf"></i>-->
							<b><?php echo $this->config->item('nama_aplikasi');?></b>
						</small>
					</a><!--/.brand-->
					<?php 
					$level = $this->session->userdata('level');
					if ($level=='instruktur'){
					$this->load->view('notifikasiinstruktur');
					} else {
					$this->load->view('notifikasi');
					} 	
			 		?>
				</div><!--/.container-fluid-->
			</div><!--/.navbar-inner-->
		</div>

		<div class="main-container container-fluid">
		<?php 
			$level = $this->session->userdata('level');
			if ($level=='instruktur'){
				$this->load->view('menuinstruktur');
			 } else {
				$this->load->view('menu');
			 } 
		?>
			<div class="main-content">
				<div class="breadcrumbs" id="breadcrumbs">
					<ul class="breadcrumb">
						<li class="active"><?php echo $class; ?></li>
							<span class="divider">
								<i class="icon-angle-right arrow-icon"></i>
							</span>
						</li>
						<li class="active"><?php echo $judul; ?></li>
					</ul><!--.breadcrumb-->
					<div class="pull-right"> Panti Sosial Bina Netra Fajar Harapan</div>
					
				</div>

				<div class="page-content">
					<?php $this->load->view($content); ?>
				</div><!--/.page-content-->

			</div><!--/.main-content-->
		</div><!--/.main-container-->

		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">
			<i class="icon-double-angle-up icon-only bigger-110"></i>
		</a>

		
	</body>
</html>
