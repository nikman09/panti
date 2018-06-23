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
												<div class="space-6"></div>
												<p> Silahkan Masukan Data Calon Klien: </p>
												<div class="space-6"></div>
												<form name="my-form" id="my-form" method="post" action="" >
													<fieldset>	
														<label>
															<span class="block input-icon input-icon-right">
																<input type="text" id="ktp" name="ktp" class="span4" placeholder="Masukan No. KTP" required="required" value="<?php echo $ktp; ?>" />
																<span style="color:red;font-size:12px" ><?php echo $peringatan ?></span>
															</span>
														</label>
														<label>
															<span class="block input-icon input-icon-right">
															<input type="text" class="span4" id="nama" name="nama" placeholder="Masukan Nama Lengkap"  required="required" value="<?php echo $nama; ?>"  />
															
															</span>
														</label>
														
														<label>
															<span class="block input-icon input-icon-right">
															<select name="sex" id="sex" class="span4"   required="required" >
																<option value="">-Pilih Jenis Kelamin-</option>
																<option value="L"  <?php  echo $sex=="L"? "selected":"" ?> >Laki-laki</option>
																<option value="P"  <?php  echo $sex=="P"? "selected":"" ?> >Perempuan</option>
															</select>
															</span>
														</label>

														<label>
															<span class="block input-icon input-icon-right">
															<select name="agama" id="agama"  class="span4"  required="required">
																<option value="">--Pilih Agama--</option>
																<?php
																	foreach ($data_agama as $dt ) {
																		?>
																			<option  value="<?php echo $dt; ?>"  <?php  echo $agama==$dt? "selected":"" ?> ><?php echo $dt; ?></option>
																		<?php
																	}
																?>
															</select>
															</span>
														</label>														
														
														<label>
															<span class="block input-icon input-icon-right">
															<input type="text" name="tempat_lahir" id="tempat_lahir" value="<?php echo $tempat_lahir; ?>"  class="span2" placeholder="Masukan Tempat Lahir"   required="required"  /> 
																<span class="input-append">
																	<input type="date" name="tanggal_lahir"  id="tanggal_lahir" value="<?php echo $tanggal_lahir; ?>"  class="span9 date-picker" data-date-format="dd-mm-yyyy"  required="required" />
																	<span class="add-on">
																		<i class="icon-calendar"> </i>
																	</span>
																</span>
															</span>
														</label>
														
	
														<label>
															<span class="block input-icon input-icon-right">
																<input type="text" name="hp" id="hp" class="span4" placeholder="Masukan No. Handphone"  required="required" value="<?php echo $hp; ?>" />
																
															</span>
														</label>
														<label>
															<span class="block input-icon input-icon-right">
																<input type="text" id="alamat" name="alamat" class="span6" placeholder="Masukan Alamat yang Lengkap"  required="required" value="<?php echo $alamat; ?>"  />
																
															</span>
														</label>
														<label>
															<span class="block input-icon input-icon-right">
																<select name="kota" id="kota"  class="span5"  required="required" value="<?php echo $kota; ?>">
																	<option value="">--Pilih Asal Kota/Kabupaten--</option>
																	<?php
																		foreach ($data_kota as $dt ) {
																			?>
																				<option value="<?php echo $dt; ?>"  <?php  echo $kota==$dt? "selected":"" ?> ><?php echo $dt; ?></option>
																			<?php
																		}
																	?>
																</select>
															</span>
														</label>

														<label>
															<input type="checkbox"  required="required" />
															<span class="lbl">
																Saya Setuju dengan
																<a href="#">Persyaratan</a>
															</span>
														</label>

														<div class="space"></div>
														<div class="clearfix">
															<button type="reset" class="width-10 right btn btn-small">
																<i class="icon-refresh"></i>
																Reset
															</button>

															<button type="submit" name="daftar" id="daftar" class="width-10 pull-right btn btn-small btn-success">
																Daftar
																<i class="icon-arrow-right icon-on-right"></i>
															</button>
														</div>
														<div class="space-4"></div>
													</fieldset>
													
												</form>
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

