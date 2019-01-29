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
                                        <h3 class="panel-title">Detail Agunan</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                            <?php foreach($detail_agunan as $row) 
           { ?>
                                                <section class="bar">
            <div class="row portfolio-project">
              <div class="col-sm-8">
                <div class="project owl-carousel mb-4">
                  <div class="item"><img src="data:image/jpeg;base64,<?php echo $row['foto'] ?>" alt="" class="img-rounded" height="400" width="650"></div>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="project-more">
                  <h4>ID Agunan</h4>
                  <h5><i>AGUNAN-<?php echo $row['id_agunan'] ?></i></h5>
                  <h4>Harga</h4>
                  <?php
                      $jenis = $row['jenis'];
                      $nilai_pengurang = $row['nilai_pengurang'];
                      $persen = ($nilai_pengurang/100);

                      $harga_tanah = $row['harga_tanah'];
                      $harga_bangunan = $row['harga_bangunan'];

                      $total_harga_tanah = $harga_tanah - $nilai_pengurang;
                      $total_harga_tanah_bangunan = ($harga_tanah + $harga_bangunan) - $nilai_pengurang;

                      $hasil_rupiah1 = "Rp " . number_format($total_harga_tanah,2,',','.');
                      $hasil_rupiah2 = "Rp " . number_format($total_harga_tanah_bangunan,2,',','.');
                  ?>
                  <h4> <?php
                          if($jenis == 'Tanah'){
                              ?><h5><?php echo $hasil_rupiah1 ?></h5><?php
                          }elseif($jenis == 'Tanah & Bangunan'){
                              ?><h5><?php echo $hasil_rupiah2 ?></h5><?php
                          }
                          ?>
                  </h4>
                  <h4>Lokasi</h4>
                  <p><?php echo $row['lokasi']; ?></p>
                  <h4>Alamat</h4>
                  <p><?php echo $row['alamat']; ?></p>
                  <h4>Provinsi</h4>
                  <p><?php echo $row['provinsi']; ?></p>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="heading">
                  <h3>Deskripsi</h3>
                </div>
                <div class="row">
                <?php if($row['jenis'] == 'Tanah & Bangunan'){
                    ?>
                    <div class="col-md-5">
                    <table class="table-condensed">
                      <tr>
                      <td><h5>Batas Utara</h5></td>
                      <td><p>:</p></td>
                      <p><td><?php echo $row['batas_utara']; ?></p></td>
                      </tr>
                      <tr>
                      <td><h5>Batas Selatan</h5></td>
                      <td><p>:</p></td>
                      <p><td><?php echo $row['batas_selatan']; ?></p></td>
                      </tr>
                      <tr>
                      <td><h5>Batas Timur</h5></td>
                      <td><p>:</p></td>
                      <p><td><?php echo $row['batas_timur']; ?></p></td>
                      </tr>
                      <tr>
                      <td><h5>Batas Barat</h5></td>
                      <td><p>:</p></td>
                      <p><td><?php echo $row['batas_barat']; ?></p></td>
                      </tr>
                      <tr>
                      <td><h5>Aksesbilitas</h5></td>
                      <td><p>:</p></td>
                      <p><td><?php echo $row['aksesbilitas']; ?></p></td>
                      </tr>
                      <tr>
                      <td><h5>Pusat Belanja</h5></td>
                      <td><p>:</p></td>
                      <p><td><?php echo $row['pusat_belanja'] ?></p></td>
                      </tr>
                      <tr>
                      <td><h5>Sekolah</h5></td>
                      <td><p>:</p></td>
                      <p><td><?php echo $row['sekolah']; ?></p></td>
                      </tr>
                      <tr>
                      <td><h5>Transportasi</h5></td>
                      <td><p>:</p></td>
                      <p><td><?php echo $row['transportasi']; ?></p></td>
                      </tr>
                      <tr>
                      <td><h5>Rekreasi</h5></td>
                      <td><p>:</p></td>
                      <p><td><?php echo $row['rekreasi']; ?></p></td>
                      </tr>
                      <tr>
                      <td><h5>Kejahatan</h5></td>
                      <td><p>:</p></td>
                      <p><td><?php echo $row['kejahatan']; ?></p></td>
                      </tr>
                      <tr>
                      <td><h5>Bencana Alam</h5></td>
                      <td><p>:</p></td>
                      <p><td><?php echo $row['bencana_alam']; ?></p></td>
                      </tr>
                      <tr>
                      <td><h5>Penggunaan Tanah</h5></td>
                      <td><p>:</p></td>
                      <p><td><?php echo $row['penggunaan_tanah']; ?></p></td>
                      </tr>
                      <tr>
                      <td><h5>Perubahan Tata</h5></td>
                      <td><p>:</p></td>
                      <p><td><?php echo $row['perubahan_tata']; ?></p></td>
                      </tr>
                      <tr>
                         <td><h5>Tusuk Sate</h5></td>
                        <td><p>:</p></td>
                        <td><p><?php echo $row['tusuk_sate']; ?> </p></td>
                        </tr> 
                        <tr>
                         <td><h5>Sutet</h5></td>
                        <td><p>:</p></td>
                        <td><p><?php echo $row['sutet']; ?> </p></td>
                        </tr> 
                        <tr>
                         <td><h5>Lapu Jalan</h5></td>
                        <td><p>:</p></td>
                        <td><p><?php echo $row['lampu_jalan']; ?> </p></td>
                        </tr>
                        <tr>
                         <td><h5>Jumlah lantai</h5></td>
                        <td><p>:</p></td>
                        <td><p><?php echo $row['jml_lantai']; ?> </p></td>
                        </tr>
                        <tr>
                         <td><h5>Jenis Bangunan</h5></td>
                        <td><p>:</p></td>
                        <td><p><?php echo $row['jenis_bangunan']; ?> </p></td>
                        </tr>
                        <tr>
                         <td><h5>Konstruksi</h5></td>
                        <td><p>:</p></td>
                        <td><p><?php echo $row['konstruksi']; ?> </p></td>
                        </tr> 
                        <tr>
                         <td><h5>Pondasi</h5></td>
                        <td><p>:</p></td>
                        <td><p><?php echo $row['pondasi']; ?> </p></td>
                        </tr>
                        <tr>
                         <td><h5>Sinding</h5></td>
                        <td><p>:</p></td>
                        <td><p><?php echo $row['dinding']; ?> </p></td>
                        </tr> 
                        <tr>
                         <td><h5>Partisi</h5></td>
                        <td><p>:</p></td>
                        <td><p><?php echo $row['partisi']; ?> </p></td>
                        </tr>
                        <tr>
                         <td><h5>Lantai</h5></td>
                        <td><p>:</p></td>
                        <td><p><?php echo $row['lantai']; ?> </p></td>
                        </tr>
                        <tr>
                         <td><h5>Langit-Langit</h5></td>
                        <td><p>:</p></td>
                        <td><p><?php echo $row['langit']; ?> </p></td>
                        </tr>
                        <tr>
                         <td><h5>Atap</h5></td>
                        <td><p>:</p></td>
                        <td><p><?php echo $row['atap']; ?> </p></td>
                        </tr>
                        <tr>
                         <td><h5>Jendela</h5></td>
                        <td><p>:</p></td>
                        <td><p><?php echo $row['jendela']; ?> </p></td>
                        </tr>
                  </table>
                  </div>
                 <div class="col-md-6">
                    <table class="table-condensed">
                        <tr>
                        <td><h5>Data Hunian</h5></td>
                        <td><p>:</p></td>
                        <td><p><?php echo $row['data_hunian']; ?></p></td>
                        </tr>
                        <tr>
                         <td><h5>Jaringan Listrik</h5></td>
                        <td><p>:</p></td>
                        <td><p><?php echo $row['jaringan_listrik']; ?></p></td>
                        </tr>
                        <tr>
                         <td><h5>Jaringan Telepon</h5></td>
                        <td><p>:</p></td>
                        <td><p><?php echo $row['jaringan_telepon']; ?></p></td>
                        </tr>
                        <tr>
                         <td><h5>Jaringan Gas</h5></td>
                        <td><p>:</p></td>
                        <td><p><?php echo $row['jaringan_gas']; ?></p></td>
                        </tr>
                        <tr>
                         <td><h5>Jalan Masuk</h5></td>
                        <td><p>:</p></td>
                        <td><p><?php echo $row['jalan_masuk']; ?></p></td>
                        </tr>
                        <tr>
                         <td><h5>Jalan Depan Objek</h5></td>
                        <td><p>:</p></td>
                        <td><p><?php echo $row['jalan_depan_objek']; ?></p></td>
                        </tr>
                        <tr>
                         <td><h5>Saluran Air</h5></td>
                        <td><p>:</p></td>
                        <td><p><?php echo $row['saluran_air']; ?></p></td>
                        </tr>
                        <tr>
                         <td><h5>Trotoar</h5></td>
                        <td><p>:</p></td>
                        <td><p><?php echo $row['trotoar']; ?></p></td>
                        </tr>
                        <tr>
                         <td><h5>Jenis Tanah</h5></td>
                        <td><p>:</p></td>
                        <td><p><?php echo $row['jenis_tanah']; ?></p></td>
                        </tr>
                        <tr>
                         <td><h5>Penghijauan</h5></td>
                        <td><p>:</p></td>
                        <td><p><?php echo $row['penghijauan']; ?></p></td>
                        </tr>
                        <tr>
                         <td><h5>Penataan Lingkungan</h5></td>
                        <td><p>:</p></td>
                        <td><p><?php echo $row['penataan_lingkungan']; ?></p></td>
                        </tr>
                        <tr>
                         <td><h5>Resiko Banjir</h5></td>
                        <td><p>:</p></td>
                        <td><p><?php echo $row['resiko_banjir']; ?></p></td>
                        </tr>
                        <tr>
                         <td><h5>Tinggi Tanah</h5></td>
                        <td><p>:</p></td>
                        <td><p><?php echo $row['tinggi_tanah']; ?></p></td>
                        </tr>
                        <tr>
                         <td><h5>Jumlah Pintu</h5></td>
                        <td><p>:</p></td>
                        <td><p><?php echo $row['pintu']; ?> </p></td>
                        </tr>
                        <tr>
                         <td><h5>Ruang Tamu</h5></td>
                        <td><p>:</p></td>
                        <td><p><?php echo $row['r_tamu']; ?> </p></td>
                        </tr>
                        <tr>
                         <td><h5>Ruang Keluarga</h5></td>
                        <td><p>:</p></td>
                        <td><p><?php echo $row['r_keluarga']; ?> </p></td>
                        </tr>
                        <tr>
                         <td><h5>Ruang Tidur</h5></td>
                        <td><p>:</p></td>
                        <td><p><?php echo $row['k_tidur']; ?> </p></td>
                        </tr>
                        <tr>
                         <td><h5>Toilet</h5></td>
                        <td><p>:</p></td>
                        <td><p><?php echo $row['toilet']; ?> </p></td>
                        </tr>
                        <tr>
                         <td><h5>Dapur</h5></td>
                        <td><p>:</p></td>
                        <td><p><?php echo $row['dapur']; ?> </p></td>
                        </tr>
                        <tr>
                         <td><h5>Garasi</h5></td>
                        <td><p>:</p></td>
                        <td><p><?php echo $row['garasi']; ?> </p></td>
                        </tr>
                        <tr>
                         <td><h5>Jenis Dokumen</h5></td>
                        <td><p>:</p></td>
                        <td><p><?php echo $row['jenis_dok']; ?> </p></td>
                        </tr>
                        <tr>
                         <td><h5>No Dokumen</h5></td>
                        <td><p>:</p></td>
                        <td><p><?php echo $row['no_dok']; ?> </p></td>
                        </tr>
                        <tr>
                         <td><h5>Luas Tanah (m2)</h5></td>
                        <td><p>:</p></td>
                        <td><p><?php echo $row['l_tanah']; ?> m2 </p></td>
                        </tr>   
                        <tr>
                         <td><h5>Harga Tanah/m2</h5></td>
                        <td><p>:</p></td>
                        <?php 
                        $hasil_rupiah3 = "Rp " . number_format($row['h_tanah'],2,',','.');
                        ?>
                        <td><p><?php echo $hasil_rupiah3 ?> </p></td>
                        </tr>

                        <tr>
                         <td><h5>Luas Bangunan (m2)</h5></td>
                        <td><p>:</p></td>
                        <td><p><?php echo $row['l_bangunan'] ?> m2</p></td>
                        </tr>
                        <tr>
                         <td><h5>Harga Bangunan/m2</h5></td>
                        <td><p>:</p></td>
                        <?php 
                        $hasil_rupiah5 = "Rp " . number_format($row['h_bangunan'],2,',','.');
                        ?>
                        <td><p><?php echo $hasil_rupiah5 ?> </p></td>
                        </tr>
                    </table>
                    </div>
                  <?php
                }elseif($row['jenis'] == 'Tanah'){
                    ?>
                <div class="col-md-4">
                    <table class="table-condensed">
                    <tr>
                        <td><h5>Batas Utara</h5></td>
                        <td><p>:</p></td>
                        <td><p><?php echo $row['batas_utara']; ?></p></td>
                      </tr>
                    <tr>
                          <td><h5>Batas Selatan</h5></td>
                          <td><p>:</p></td>
                        <td><p><?php echo $row['batas_selatan']; ?></p></td>
                      </tr>
                    <tr>
                          <td><h5>Batas Timur</h5></td>
                          <td><p>:</p></td>
                        <td><p><?php echo $row['batas_timur']; ?></p></td>
                      </tr>
                    <tr>
                          <td><h5>Batas Barat</h5></td>
                          <td><p>:</p></td>
                        <td><p><?php echo $row['batas_barat']; ?></p></td>
                      </tr>
                    <tr>
                          <td><h5>Aksesbilitas</h5></td>
                          <td><p>:</p></td>
                        <td><p><?php echo $row['aksesbilitas']; ?></p></td>
                      </tr>
                    </tr>
                    <tr>
                        <td><h5>Pusat Belanja</h5></td>
                        <td><p>:</p></td>
                        <td><p><?php echo $row['pusat_belanja']; ?></p></td>
                      </tr>
                    <tr>
                        <td><h5>Sekolah</h5></td>
                        <td><p>:</p></td>
                        <td><p><?php echo $row['sekolah']; ?></p></td>
                      </tr>
                    <tr>
                        <td><h5>Transportasi</h5></td>
                        <td><p>:</p></td>
                        <td><p><?php echo $row['transportasi']; ?></p></td>
                    </tr>
                    <tr>
                       <td><h5>Rekreasi</h5></td>
                       <td><p>:</p></td>
                        <td><p><?php echo $row['rekreasi']; ?></p></td>
                      </tr>
                    <tr>
                        <td><h5>Kejahatan</h5></td>
                        <td><p>:</p></td>
                        <td><p><?php echo $row['kejahatan']; ?></p></td>
                      </tr>
                    </table>
                </div>
                <div class="col-md-5">
                    <table class="">
                    <tr>
                        <td><h5>Bencana Alam</h5></td>
                        <td><p>:</p></td>
                        <td><p><?php echo $row['bencana_alam']; ?></p></td>
                      </tr>
                    <tr>
                        <td><h5>Penggunaan Tanah</h5></td>
                        <td><p>:</p></td>
                        <td><p><?php echo $row['penggunaan_tanah']; ?></p></td>
                      </tr>
                    <tr>
                        <td><h5>Perubahan Tata</h5></td>
                        <td><p>:</p></td>
                        <td><p><?php echo $row['perubahan_tata']; ?></p></td>
                      </tr>
                    <tr>
                        <td><h5>Jenis Tanah</h5></td>
                        <td><p>:</p></td>
                        <td><p><?php echo $row['jenis_tanah']; ?></p></td>
                      </tr>
                    <tr>
                        <td><h5>Penghijauan</h5></td>
                        <td><p>:</p></td>
                        <td><p><?php echo $row['penghijauan']; ?></p></td>
                      </tr>
                    <tr>
                        <td><h5>Penataan Lingkungan</h5></td>
                        <td><p>:</p></td>
                        <td><p><?php echo $row['penataan_lingkungan']; ?></p></td>
                      </tr>
                    <tr>
                       <td><h5>Resiko Banjir</h5></td>
                       <td><p>:</p></td>
                        <td><p><?php echo $row['resiko_banjir']; ?></p></td>
                      </tr>
                    <tr>
                          <td><h5>Tinggi Tanah</h5></td>
                          <td><p>:</p></td>
                        <td><p><?php echo $row['tinggi_tanah']; ?></p></td>
                      </tr>
                    <tr>
                          <td><h5>Luas Tanah (m2)</h5></td>
                          <td><p>:</p></td>
                        <td><p> <?php echo $row['l_tanah']; ?> m2</p></td>
                      </tr>
                    <tr>
                        <td><h5>Harga Tanah/m2</h5></td>
                        <td><p>:</p></td>
                    <?php
                    $hasil_rupiah4 = "Rp " . number_format($row['h_tanah'] ,2,',','.');  
                    ?>
                        <td><p> <?php echo $hasil_rupiah4 ?> </p></td>
                      </tr>
                </table>
                </div>
                 <?php 
                 } ?> 
                </div>                
                <section>
                  <div class="row portfolio">
                    <div class="col-md-12">
                      <div class="heading">
                        <h3>Foto Akses Jalan</h3>
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                      <div class="box-image">
                        <div class="image"><img src="data:image/jpeg;base64,<?php echo $row['foto_akses'] ?>" alt="" class="img-rounded" width="400" height="290">
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