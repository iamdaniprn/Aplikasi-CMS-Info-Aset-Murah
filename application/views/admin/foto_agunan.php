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
                    <div class="row">
                            <div class="col-lg-12 col-md-12 col-xs-12">

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Foto Properti</h3>
                                    </div>
                                    <?php echo $this->session->flashdata('sukses'); ?>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>ID Properti</th>
                                                            <th>Jenis</th>
                                                            <th>Foto</th>
                                                            <th>Status</th>
                                                            <th>Edit Status</th>
                                                            <th>Edit Foto</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                    <?php foreach ($foto_agunan as $row): 
                                                    ?>
                                                        <tr>
                                                            <td>PROPERTI-<?php echo $row['id'];?></td>
                                                            <td><?php echo $row['jenis'];?></td>
                                                            <td>
                                                                <?php
                                                                if($row['foto'] == ''){
                                                                    ?> <h4><i>Foto Masih Kosong, Silahkan Edit Foto</i></h4><?php
                                                                }else{
                                                                    ?> 
                                                                    <img src="data:image/jpeg;base64,<?php echo $row['foto'] ?>" style="height: 150px; width: 200px;" alt="" class="img-fluid">
                                                                    <?php
                                                                }
                                                                ?>
                                                            </td>
                                                            <td>
                                                            <?php
                                                                if($row['status'] == 0){
                                                                    ?><span class="label label-info">Ditampilkan</span><?php
                                                                }elseif($row['status'] == 1){
                                                                    ?><span class="label label-success">Foto Utama</span><?php
                                                                }elseif($row['status'] == 2){
                                                                    ?><span class="label label-danger">Tidak Ditampilkan</span><?php
                                                                }
                                                            ?>
                                                            </td>
                                                            <td><a href="<?php echo site_url('admin/edit_status_foto_bangunan/'.$row['id_foto_bangunan']);?>" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a> 
                                                            </td>
                                                            <td><a href="<?php echo site_url('admin/edit_gambar_bangunan/'.$row['id_foto_bangunan']);?>" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a> 
                                                            </td>
                                                        </tr>
                                                    <?php endforeach;?>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                        <a href="<?php echo site_url('admin/detail_agunan/'.$row['id']);?>"><button type="button" class="btn btn-danger"><i class="fa fa-arrow-circle-o-left"></i> Kembali</button></a>
                                    </div>
                                </div>
                            </div>
                            
                        </div> <!-- End Row -->
                    
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

           

        </div>
        <!-- END wrapper -->
    <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="<?php echo base_url('assets/blue/js/jquery.min.js');?>"></script>
        <script src="<?php echo base_url('assets/blue/js/bootstrap.min.js');?>"></script>
        <script src="<?php echo base_url('assets/blue/js/waves.js');?>"></script>
        <script src="<?php echo base_url('assets/blue/js/wow.min.js');?>"></script>
        <script src="<?php echo base_url('assets/blue/js/jquery.nicescroll.js');?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/blue/js/jquery.scrollTo.min.js');?>"></script>
        <script src="<?php echo base_url('assets/blue/assets/jquery-detectmobile/detect.js');?>"></script>
        <script src="<?php echo base_url('assets/blue/assets/fastclick/fastclick.js');?>"></script>
        <script src="<?php echo base_url('assets/blue/assets/jquery-slimscroll/jquery.slimscroll.js');?>"></script>
        <script src="<?php echo base_url('assets/blue/assets/jquery-blockui/jquery.blockUI.js');?>"></script>


        <!-- CUSTOM JS -->
        <script src="<?php echo base_url('assets/blue/js/jquery.app.js');?>"></script>

        <script src="<?php echo base_url('assets/blue/assets/datatables/jquery.dataTables.min.js');?>"></script>
        <script src="<?php echo base_url('assets/blue/assets/datatables/dataTables.bootstrap.js');?>"></script>


        <script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').dataTable();
            } );
        </script>
    </body>
</html>