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
                                <a href="<?php echo site_url('admin/verifikator');?>"><button class="btn btn-danger">Kembali</button></a>
                                <a href="<?php echo site_url('laporan/cetak_data_properti_lelang');?>"><button class="btn btn-success">Cetak</button></a><br><br>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Data Properti Lelang (verifikator)</h3>
                                    </div>
                                    <?php echo $this->session->flashdata('sukses'); ?>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>ID Properti</th>
                                                            <th>Jenis</th>
                                                            <th>Alamat</th>
                                                            <th>Verifikator</th>
                                                            <th>Provinsi</th>
                                                            <th>Kategori</th>
                                                            <th>Status</th>
                                                            <th>Status Properti</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                             
                                                    <tbody>
                                                    <?php $no = 0; foreach ($agunan_lelang as $row): 
                                                        $no++;
                                                        $status = $row->status;
                                                        $status_agunan = $row->status_agunan;
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $no;?></td>
                                                            <td>PROPERTI-<?php echo $row->id;?></td>
                                                            <td><?php echo $row->jenis;?></td>
                                                            <td><?php echo $row->alamat;?></td>
                                                            <td><?php echo $row->nama_pegawai;?></td>
                                                            <td><?php echo $row->provinsi;?></td>
                                                            <td>
                                                                <form class="form-horizontal" action="<?php echo site_url('admin/set_lelang_unggulan');?>" method="post">
                                                                <input type="hidden" name="id" value="<?php echo $row->id ?>">
                                                                <input type="hidden" name="kategori" value="1">
                                                                <button type="submit" class="btn btn-primary btn-sm">Set Unggulan</button>
                                                                </form>
                                                            </td>
                                                            <td>
                                                                <?php 
                                                                if($status == 0){
                                                                    ?><span class="btn btn-success">Belum Terjual</span>
                                                                    <?php
                                                                }elseif($status == 1){
                                                                     ?><span class="btn btn-info">Terjual</span>
                                                                    <?php
                                                                }
                                                                ?>
                                                                | <a href="<?php echo site_url('admin/edit_properti_lelang_verifikator/'.$row->id);?>" class="btn btn-info btn-sm" title="EDIT"><i class="fa fa-pencil"></i></a> 
                                                            </td>
                                                            <td>
                                                                <?php 
                                                                if($status_agunan == 0){
                                                                    ?><span class="btn btn-danger">Suspend</span>
                                                                    <?php
                                                                }else{
                                                                     ?><span class="btn btn-info">Publish</span>
                                                                    <?php
                                                                }
                                                                ?>
                                                                | <a href="<?php echo site_url('admin/edit_status_properti/'.$row->id);?>" class="btn btn-info btn-sm" title="EDIT"><i class="fa fa-pencil"></i></a> 
                                                            </td>
                                                            <td>
                                                                <a href="<?php echo site_url('admin/detail_agunan_lelang/'.$row->id);?>" class="btn btn-success btn-sm" title="LIHAT"><i class="fa fa-eye"></i></a>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach;?>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
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