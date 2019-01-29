<!DOCTYPE html>
<html>
    <head>
        <?php $this->load->view('admin/css_eksternal') ?>
        <script src="<?php echo base_url();?>assets/js/jquery.js"></script>
        <script src="<?php echo base_url();?>assets/js/highcharts.js"></script>
    </head>
    <body class="fixed-left">
    
            
        <!-- Begin page -->
        <div id="wrapper">
        
            <!-- Top Bar Start -->
            <?php $this->load->view('admin/top_menu');?>
            <!-- Top Bar End -->

            <!-- ========== Left Sidebar Start ========== -->

            <?php $this->load->view('admin/sidebar');?>
            <!-- Left Sidebar End --> 

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->    
			<div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                    	<h4>Properti Input Manual</h4>
                    	<div class="row">
                            <div class="col-lg-12 col-md-12 col-xs-12">
                                <div class="panel panel-default" style="text-align: center;">
                                    <div class="panel-heading" > 
                                        <h3 class="panel-title">Daftar Menu</h3> 
                                    </div> 
                                    <div class="panel-body"> 
                                         <p><b>Silahkan Pilih Menu Dibawah Ini </b></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                       <div class="row"> 
                            <div class="col-lg-3 col-md-3 col-xs-12">
                                <div class="panel panel-default" style="text-align: center;">
                                    <div class="panel-heading"> 
                                        <h3 class="panel-title" style="color: white"></h3> 
                                    </div> 
                                    <div class="panel-body"> 
                                        <div style="text-align: center;">
                                            <a href="<?php echo site_url('admin/agunan_jual');?>"><img src="<?php echo base_url('assets/img/prop_jual.png');?>"  style="width:50px;"></a>
                                        </div><br>
                                        <a href="<?php echo site_url('admin/agunan_jual');?>" style="text-transform: uppercase;"><p><b>Properti Jual</b></p></a>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-xs-12">
                                <div class="panel panel-default" style="text-align: center;">
                                    <div class="panel-heading"> 
                                        <h3 class="panel-title" style="color: white"></h3> 
                                    </div> 
                                    <div class="panel-body"> 
                                        <div style="text-align: center;">
                                            <a href="<?php echo site_url('admin/properti_lelang');?>"><img src="<?php echo base_url('assets/img/prop_jual.png');?>"  style="width:50px;"></a>
                                        </div><br>
                                        <a href="<?php echo site_url('admin/properti_lelang');?>" style="text-transform: uppercase;"><p><b>Properti Lelang</b></p></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-xs-12">
                                <div class="panel panel-default" style="text-align: center;">
                                    <div class="panel-heading"> 
                                        <h3 class="panel-title" style="color: white"></h3> 
                                    </div> 
                                    <div class="panel-body"> 
                                        <div style="text-align: center;">
                                            <a href="<?php echo site_url('admin/agunan_unggulan');?>"><img src="<?php echo base_url('assets/img/unggulan.png');?>"  style="width:50px;"></a>
                                        </div><br>
                                        <a href="<?php echo site_url('admin/agunan_unggulan');?>" style="text-transform: uppercase;"><p><b>Properti Jual Unggulan</b></p></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-xs-12">
                                <div class="panel panel-default" style="text-align: center;">
                                    <div class="panel-heading"> 
                                        <h3 class="panel-title" style="color: white"></h3> 
                                    </div> 
                                    <div class="panel-body"> 
                                        <div style="text-align: center;">
                                            <a href="<?php echo site_url('admin/properti_lelang_unggulan');?>"><img src="<?php echo base_url('assets/img/unggulan.png');?>"  style="width:50px;"></a>
                                        </div><br>
                                        <a href="<?php echo site_url('admin/properti_lelang_unggulan');?>" style="text-transform: uppercase;"><p><b>Properti Lelang Unggulan</b></p></a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        
					</div>
				</div>
			</div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

            
         <?php $this->load->view('admin/script') ?>;
        </div>
        <!-- END wrapper -->
   
    </body>
</html>