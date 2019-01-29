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
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Detail Properti</h3>
                                    </div>
                                    <div class="panel-body">
                                      <div class="row">
                                            <?php foreach($detail_agunan_lelang as $row) 
                                            { ?>
                                                <section class="bar">
                                              <div class="row portfolio-project">
                                                <div class="col-md-6">
                                                  <div class="heading">
                                                    <div class="well well-sm" style="background: #6495ED;"><h4 style="color: white">Gambar Properti</h4></div>
                                                  </div>
                                                  <div class="item" style="margin-top: 10px">
                                                      <a href="<?php echo site_url('admin/tambah_gambar_agunan/'.$row['id_agunan']);?>" class="btn btn-info btn-sm"><i class="fa fa-pencila"></i> Tambah Gambar Properti</a>
                                                      <a href="<?php echo site_url('admin/foto_agunan/'.$row['id_agunan']);?>" class="btn btn-success btn-sm"><i class="fa fa-eye"></i> Lihat Gambar Properti</a> 
                                                  </div>
                                                </div>

                                                <!-- Gambar Logo -->
                                                <div class="col-sm-6">
                                                  <div class="heading">
                                                    <div class="well well-sm" style="background: #00CED1"><h4 style="color: white">Gambar Logo</h4></div>
                                                  </div>
                                                  <div class="item" style="margin-top: 10px">
                                                      <a href="<?php echo site_url('admin/lihat_foto_logo/'.$row['id_agunan']);?>" class="btn btn-success btn-sm"><i class="fa fa-eye"></i> Lihat Gambar Logo</a> 
                                                  </div>  
                                                </div>

                                                <div class="col-sm-12">
                                                <hr size="12px">
                                                  <div class="heading">
                                                   <div class="well well-sm" style="background: #20B2AA"><h4 style="color: white">Deskripsi</h4></div>
                                                  </div>
                                                  <?php echo $this->session->flashdata('sukses'); ?>
                                                  <div class="row">
                                                  
                                                   <div class="col-md-8 col-xs-12">
                                                      <table class="table-condensed">
                                                          <tr>
                                                           <td><h5>ID Properti</h5></td>
                                                          <td><p>:</p></td>
                                                          <td><h4>PROPERTI-<?php echo $row['id_agunan']; ?> </h4></td>
                                                          </tr>
                                                          <tr>
                                                          <?php
                                                              $jenis = $row['jenis']; 
                                                              $total_harga = $row['total_harga'];
                                                          ?>
                                                          <td><h5>Total Harga</h5></td>
                                                          <td><p>:</p></td>
                                                          <td><h4><b>Rp <?php echo number_format($total_harga, 0,",",".") ?> </b></h4></td>
                                                          </tr>

                                                         <tr>
                                                         <td><h5>Jenis</h5></td>
                                                          <td><p>:</p></td>
                                                          <td><p><b><?php echo $row['jenis']; ?> </b></p></td>
                                                          </tr>

                                                          <tr>
                                                           <td><h5>Lokasi</h5></td>
                                                          <td><p>:</p></td>
                                                          <td><p><?php echo $row['lokasi']; ?> </p></td>
                                                          </tr>

                                                          <tr>
                                                           <td><h5>Alamat</h5></td>
                                                          <td><p>:</p></td>
                                                          <td><p><?php echo $row['alamat']; ?> </p></td>
                                                          </tr>

                                                          <tr>
                                                          <td><h5>Provinsi</h5></td>
                                                          <td><p>:</p></td>
                                                          <td><p><?php echo $row['provinsi']; ?> </p></td>
                                                          </tr>

                                                          <tr>
                                                          <td><h5>Kabupaten/Kota</h5></td>
                                                          <td><p>:</p></td>
                                                          <td><p><?php echo $row['kabupaten']; ?> </p></td>
                                                          </tr>

                                                          <tr>
                                                          <td><h5>Keterangan</h5></td>
                                                          <td><p>:</p></td>
                                                          <td><p><?php echo $row['keterangan']; ?> </p></td>
                                                          </tr>

                                                          <tr>
                                                           <td><h5>Jenis Dokumen</h5></td>
                                                          <td><p>:</p></td>
                                                          <td><p><?php echo $row['jenis_dok']; ?> </p></td>
                                                          </tr>
                                                      </table>
                                                      </div>
                                                      <div class="col-md-4 col-xs-12">
                                                      <table class="table-condensed">
                                                          <tr>
                                                           <td><h5>No Dokumen</h5></td>
                                                          <td><p>:</p></td>
                                                          <td><p><?php echo $row['no_dok']; ?> </p></td>
                                                          </tr>

                                                          <tr>
                                                           <td><h5>Luas Tanah (m<sup>2</sup>)</h5></td>
                                                          <td><p>:</p></td>
                                                          <td><p><?php echo $row['l_tanah']; ?> m<sup>2</sup> </p></td>
                                                          </tr>   
                                                          <tr>
                                                           <td><h5>Harga Tanah/m<sup>2</sup></h5></td>
                                                          <td><p>:</p></td>
                                                          <?php 
                                                          $hasil_rupiah3 = "Rp " . number_format($row['h_tanah'],0,',','.');
                                                          ?>
                                                          <td><p><?php echo $hasil_rupiah3 ?> </p></td>
                                                          </tr>

                                                          <tr>
                                                           <td><h5>Luas Bangunan (m<sup>2</sup>)</h5></td>
                                                          <td><p>:</p></td>
                                                          <td><p><?php echo $row['l_bangunan'] ?> m<sup>2</sup></p></td>
                                                          </tr>
                                                          <tr>
                                                           <td><h5>Harga Bangunan/m<sup>2</sup></h5></td>
                                                          <td><p>:</p></td>
                                                          <?php 
                                                          $hasil_rupiah5 = "Rp " . number_format($row['h_bangunan'],0,',','.');
                                                          ?>
                                                          <td><p><?php echo $hasil_rupiah5 ?> </p></td>
                                                          </tr>

                                                          <tr>
                                                           <td><h5>Nama Verifikator</h5></td>
                                                          <td><p>:</p></td>
                                                          <td><p><?php echo $row['nama_pegawai']; ?> </p></td>
                                                          </tr>

                                                          <tr>
                                                          <td><h5>No Telepon</h5></td>
                                                          <td><p>:</p></td>
                                                          <td><p><?php echo $row['no_telp']; ?> </p></td>
                                                          </tr>

                                                          <tr>
                                                          <td><h5>No Whatsapp</h5></td>
                                                          <td><p>:</p></td>
                                                          <td><p><?php echo $row['no_whatsapp']; ?> </p></td>
                                                          </tr>
                                                      </table>
                                                      </div>
                                                  <div class="col-md-12">
                                                      <a href="<?php echo site_url('admin/edit_deskripsi_lelang/'.$row['id_agunan']);?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit Deskripsi
                                                      </a> 
                                                      <a href="<?php echo site_url('laporan/cetak_deskripsi/'.$row['id_agunan']);?>" class="btn btn-success btn-sm" target="_BLANK"><i class="fa fa-print"></i> Cetak Ke Brosur
                                                      </a> 
                                                      <a href="<?php echo site_url('laporan/cetak_brosur_lelang/'.$row['id_agunan']);?>" class="btn btn-warning btn-sm" target="_BLANK"><i class="fa fa-print"></i> Cetak Brosur 2
                                                      </a> 
                                                  </div>
                                                   
                                                  </div>                
                                                  <section>
                                                  <hr size="12px">
                                                    <div class="row portfolio">
                                                      <div class="col-md-12">
                                                        <div class="heading">
                                                          <div class="well well-sm" style="background: #48D1CC"><h4 style="color: white">Gambar Akses Jalan</h4></div>
                                                        </div>
                                                      </div>
                                                      <div class="col-md-6 col-lg-3">
                                                        <div class="box-image">
                                                          <div class="image"><a href="<?php echo site_url('admin/tambah_gambar_akses/'.$row['id_agunan']);?>" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i> Tambah Gambar</a> 
                                                            <a href="<?php echo site_url('admin/lihat_foto_akses/'.$row['id_agunan']);?>" class="btn btn-success btn-sm"><i class="fa fa-eye"></i> Lihat Gambar</a> 
                                                          </div>
                                                        </div>
                                                      </div>
                                                      
                                                  </section>
                                                </div>
                                              </div>
                                            </section>
                                            <?php 
                                                   } ?> 

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