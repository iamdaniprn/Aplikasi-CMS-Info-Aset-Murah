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
                                <div class="panel-heading"><h3 class="panel-title">Edit Status Foto Agunan</h3></div>
                                <div class="panel-body">
                                    <?php echo $this->session->flashdata('sukses'); ?>
                                    <form class="form-horizontal" action="<?php echo site_url('admin/update_status_foto_bangunan');?>" method="post" enctype="multipart/form-data">
                                        <?php foreach ($data_id_gambar_bangunan as $row): 
                                        ?>
                                        <input type="hidden" name="id_foto_bangunan" value="<?php echo $row['id_foto_bangunan'];?>">
                                        

                                      <div class="form-group">
                                        <label class="control-label col-sm-3" for="pwd">ID Gambar Agunan:</label>
                                        <div class="col-sm-9"> 
                                          <input type="text" class="form-control" value="<?php echo $row['id_foto_bangunan'];?>" readonly>
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label class="control-label col-sm-3" for="pwd">Gambar Agunan:</label>
                                        <div class="col-sm-9"> 
                                          <img src="data:image/jpeg;base64,<?php echo $row['foto'] ?>" style="height: 150px; width: 200px;">
                                        </div>
                                      </div>
                                      <?php endforeach;?>

                                      <div class="form-group">
                                        <label class="control-label col-sm-3" for="pwd">Status Foto Agunan:</label>
                                        <div class="col-sm-9"> 
                                          <select class="form-control" name="status">
                                              <option value="1">Foto Utama</option>
                                              <option value="0">Ditampilkan</option>
                                              <option value="2">Tidak Ditampilkan</option>
                                          </select>
                                        </div>
                                      </div>

                                      <div class="form-group"> 
                                          <label class="control-label col-sm-3" for="pwd"></label>
                                          <button type="submit" class="btn btn-info">Edit</button>
                                          <button type="button" onclick="javascript:history.back()" class="btn btn-danger"><span ></span style="color: white"><i class="fa fa-arrow-circle-o-left"></i> Kembali</button>
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