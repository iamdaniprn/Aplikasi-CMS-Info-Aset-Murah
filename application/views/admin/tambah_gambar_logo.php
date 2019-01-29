<!DOCTYPE html>
<html>
    <head>
        <?php $this->load->view('admin/css_eksternal') ?>
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

                        <div class="col-md-8">
                            <div class="panel panel-default">
                                <div class="panel-heading"><h3 class="panel-title">Edit Gambar Logo</h3></div>
                                <div class="panel-body">
                                    <?php echo $this->session->flashdata('sukses'); ?>
                                    <form class="form-horizontal" action="<?php echo site_url('admin/update_gambar_logo');?>" method="post" enctype="multipart/form-data">
                                    <?php foreach ($data_id_gambar_logo as $row): 
                                    ?>
                                        <input type="hidden" name="id_foto_logo" value="<?php echo $row['id_foto_logo'];?>">
                                    <?php endforeach;?>

                                      <div class="form-group">
                                        <label class="control-label col-sm-3" for="pwd">Gambar Logo:</label>
                                        <div class="col-sm-9"> 
                                          <input type="file" class="form-control" name="berkas" >
                                        </div>
                                      </div>

                                      <div class="form-group"> 
                                          <label class="control-label col-sm-3" for="pwd"></label>
                                          <button type="submit" class="btn btn-info">Edit</button>
                                          <button type="button" onclick="javascript:history.back()" class="btn btn-danger"><span ></span style="color: white"> Batal</button>
                                      </div>
                                    </form>
                                </div> <!-- panel-body -->
                            </div> <!-- panel -->
                        </div>

					</div>
				</div>
			</div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

            

        </div>
        <!-- END wrapper -->
    <?php $this->load->view('admin/script') ?>;
    </body>
</html>