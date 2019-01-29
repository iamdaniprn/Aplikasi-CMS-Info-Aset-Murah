<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view('header');?>
  </head>
<body>

<div id="mainBody">
	<div class="container">
		<div class="row">
			<div class="col-span6">
			</div>
		</div>
		<div class="row">
			<div class="col-span6 offset4">
				<div class="well">
				<div style="text-align: center;">	
					<img src="<?php echo base_url('assets/img/logo iam.png');?>" width="30" height="30">
					<h4 style="text-align: center;">CMS</h4>
					<h5 style="text-align: center;">Info Aset Properti Murah</h5><br/>
				</div>
				<form action="<?php echo site_url('login/proses_login');?>" method="post">
				  <div class="control-group">
					<label class="control-label" for="inputEmail0">Username</label>
					<div class="controls">
					  <input name="username" class="span3"  type="text" id="inputEmail0" placeholder="">
					</div>
				  </div>
				  <div class="control-group">
					<label class="control-label" for="inputEmail0">Password</label>
					<div class="controls">
					  <input name="password" class="span3"  type="password" id="inputEmail0" placeholder="">
					</div>
				  </div>
				  <div class="controls" style="text-align: center;">
				  <button type="submit" class="btn btn-info">Login</button>
				  </div>
				</form>
			</div>
			</div>
			<div class="span1"> &nbsp;</div>
		</div>	
	</div>
</div>

<!-- Footer ================================================================== -->
<!-- Placed at the end of the document so the pages load faster ============================================= -->
	<script src="<?php echo base_url('assets/bootshop/themes/js/jquery.js');?>" type="text/javascript"></script>
	<script src="<?php echo base_url('assets/bootshop/themes/js/bootstrap.min.js');?>" type="text/javascript"></script>
	<script src="<?php echo base_url('assets/bootshop/themes/js/google-code-prettify/prettify.js');?>"></script>
	
	<script src="<?php echo base_url('assets/bootshop/themes/js/bootshop.js');?>"></script>
    <script src="<?php echo base_url('assets/bootshop/themes/js/jquery.lightbox-0.5.js');?>"></script>
	
	<!-- Themes switcher section ============================================================================================= -->
</body>
</html>