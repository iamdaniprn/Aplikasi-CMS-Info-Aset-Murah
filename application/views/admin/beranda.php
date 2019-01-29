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

                        <div class="row">
							<div class="col-lg-12 col-md-12 col-xs-12">
                                <div class="panel panel-info">
                                    <div class="panel-heading"> 
                                        <h3 class="panel-title" style="color: white">Selamat Datang</h3> 
                                    </div> 
                                    <div class="panel-body" style="text-align: center; background: #e0ebeb"> 
    									<p><b><h3>Content Management System (CMS) <span style="color: #1E90FF">Info Aset Properti Murah</span></h3></b></p><br><br>
                                        <div style="text-align: center;">
                                            <img src="<?php echo base_url('assets/img/logo.png');?>"  style="width:300px;">
                                        </div><br><br>
                                        <p><b>CMS Info Aset Properti adalah aplikasi yang digunakan untuk mengelola data Properti yang akan dijual atau dilelangkan melalui website <a href="http://infoasetmurah.com/" target="_blank">www.infoasetmurah.com</a></b></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                       <div class="row">
                            <div class="col-lg-4 col-md-4 col-xs-12">
                                <div class="panel panel-danger" style="text-align: center;">
                                    <div class="panel-heading" style="background: #1a8cff"> 
                                        <h3 class="panel-title" style="color: white">Total Properti Jual</h3> 
                                    </div> 
                                    <div class="panel-body" style="background: #b3cccc"> 
                                        <?php $no = 0; foreach($hasil_data_agunan_jual as $row)     
                                        { ?>
                                        <h1> <?php echo $row->jumlah_terjual; ?></h1><p>Properti</p>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-xs-12">
                                <div class="panel panel-info" style="text-align: center;">
                                    <div class="panel-heading" style="background: #00cccc"> 
                                        <h3 class="panel-title" style="color: white">Total Properti Lelang (Operator)</h3> 
                                    </div> 
                                    <div class="panel-body" style="background: #b3cccc"> 
                                        <?php $no = 0; foreach($hasil_data_agunan_lelang_oparator as $row)     
                                        { ?>
                                        <h1> <?php echo $row->jumlah_terjual; ?></h1><p>Properti</p>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-xs-12">
                                <div class="panel panel-success" style="text-align: center;">
                                    <div class="panel-heading" style="background: #008080"> 
                                        <h3 class="panel-title" style="color: white">Total Properti Lelang (Verifikator)</h3> 
                                    </div> 
                                    <div class="panel-body" style="background: #b3cccc"> 
                                        <?php $no = 0; foreach($hasil_data_agunan_lelang_verifikator as $row)     
                                        { ?>
                                        <h1> <?php echo $row->jumlah_terjual; ?></h1><p>Properti</p>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-xs-12">
                                <div class="panel panel-warning" style="text-align: center;">
                                    <div class="panel-heading" style="background: #008080"> 
                                        <h3 class="panel-title" style="color: white">Total Properti Jual Terjual</h3> 
                                    </div> 
                                    <div class="panel-body" style="background: #b3cccc"> 
                                        <?php $no = 0; foreach($hasil_data_jual_terjual as $row)     
                                        { ?>
                                        <h1> <?php echo $row->jumlah_terjual; ?></h1><p>Properti</p>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-xs-12">
                                <div class="panel panel-success" style="text-align: center;">
                                    <div class="panel-heading"> 
                                        <h3 class="panel-title" style="color: white">Total Properti Lelang (Operator) Terjual</h3> 
                                    </div> 
                                    <div class="panel-body" style="background: #b3cccc"> 
                                        <?php $no = 0; foreach($hasil_data_lelang_operator_terjual as $row)     
                                        { ?>
                                        <h1> <?php echo $row->jumlah_terjual; ?></h1><p>Properti</p>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-xs-12">
                                <div class="panel panel-danger" style="text-align: center;">
                                    <div class="panel-heading" style="background: #1a8cff"> 
                                        <h3 class="panel-title" style="color: white">Total Properti Lelang (Verifikator) Terjual</h3> 
                                    </div> 
                                    <div class="panel-body" style="background: #b3cccc"> 
                                        <?php $no = 0; foreach($hasil_data_lelang_verifikator_terjual as $row)     
                                        { ?>
                                        <h1> <?php echo $row->jumlah_terjual; ?></h1><p>Properti</p>
                                        <?php
                                        }
                                        ?>
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