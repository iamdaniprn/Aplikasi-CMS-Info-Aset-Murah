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
                        
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading"><h3 class="panel-title">Edit Data Properti</h3></div>
                                <div class="panel-body">
                                    <form class="form-horizontal" action="<?php echo site_url('admin/update_deskripsi');?>" method="post" enctype="multipart/form-data">
                                    <?php foreach ($data_deskripsi as $row): 
                                       $jenis = $row['jenis']
                                    ?>
                                      <input type="hidden" name="id_agunan" value="<?php echo $row['id'];?>">
                                       <div class="form-group">
                                        <label class="control-label col-sm-3" for="pwd">Jenis:</label>
                                        <div class="col-sm-9"> 
                                         <select class="form-control" name="jenis">
                                              <option value="<?php echo $row['jenis'];?>" selected="selected"><?php echo $row['jenis'];?></option>
                                              <option value="Tanah">Tanah</option>
                                              <option value="Rumah">Rumah</option>
                                              <option value="Ruko">Ruko</option>
                                              <option value="Kios/Tempat Usaha">Kios/Tempat Usaha</option>
                                              <option value="Apartemen">Apartemen</option>
                                              <option value="Gudang/Pabrik">Gudang/Pabrik</option>
                                          </select>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="control-label col-sm-3" for="pwd">Alamat:</label>
                                        <div class="col-sm-9"> 
                                          <input type="text" class="form-control" name="alamat" value="<?php echo $row['alamat'];?>">
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="control-label col-sm-3" for="pwd">Lokasi:</label>
                                        <div class="col-sm-9"> 
                                          <input type="text" class="form-control" name="lokasi" value="<?php echo $row['lokasi'];?>">
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label class="control-label col-sm-3" for="pwd">Provinsi:</label>
                                        <div class="col-sm-9"> 
                                          <select class="form-control" name="provinsi" id="provinsi">
                                          <option value="<?php echo $row['id_provinsi'];?>" selected="selected"><?php echo $row['provinsi'];?></option>
                                          <option value="1">Bali</option>
                                          <option value="2">Banten</option>
                                          <option value="3">Bengkulu</option>
                                          <option value="4">DI Yogyakarta</option>
                                          <option value="5">DKI Jakarta</option>
                                          <option value="6">Gorontalo</option>
                                          <option value="7">Jambi</option>
                                          <option value="8">Jawa Barat</option>
                                          <option value="9">Jawa Tengah</option>
                                          <option value="10">Jawa Timur</option>
                                          <option value="11">Kalimantan Barat</option>
                                          <option value="12">Kalimantan Selatan</option>
                                          <option value="13">Kalimantan Tengah</option>
                                          <option value="14">Kalimantan Timur</option>
                                          <option value="15">Kalimantan Utara</option>
                                          <option value="16">Kepulauan Bangka Belitung</option>
                                          <option value="17">Kepulauan Riau</option>
                                          <option value="18">Lampung</option>
                                          <option value="19">Maluku</option>
                                          <option value="20">Maluku Utara</option>
                                          <option value="21">Nanggroe Aceh Darussalam</option>
                                          <option value="22">Nusa Tenggara Barat</option>
                                          <option value="23">Nusa Tenggara Timur</option>
                                          <option value="24">Papua</option>
                                          <option value="25">Papua Barat</option>
                                          <option value="26">Riau</option>
                                          <option value="27">Sulawesi Barat</option>
                                          <option value="28">Sulawesi Selatan</option>
                                          <option value="29">Sulawesi Tengah</option>
                                          <option value="30">Sulawesi Tenggara</option>
                                          <option value="31">Sulawesi Utara</option>
                                          <option value="32">Sumatera Barat</option>
                                          <option value="33">Sumatera Selatan</option>
                                          <option value="34">Sumatera Utara</option>
                                          </select>
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label class="control-label col-sm-3" for="pwd">Kabupaten:</label>
                                        <div class="col-sm-9"> 
                                          <select name="kabupaten" class="kabupaten form-control">
                                            <option value="<?php echo $row['id_kabupaten'];?>" selected="selected"><?php echo $row['kabupaten'];?>
                                          </select>
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label class="control-label col-sm-3" for="pwd">Jenis Dokumen:</label>
                                        <div class="col-sm-9"> 
                                          <input type="text" class="form-control" name="jenis_dok" value="<?php echo $row['jenis_dok'];?>">
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="control-label col-sm-3" for="pwd">No Dokumen:</label>
                                        <div class="col-sm-9"> 
                                          <input type="text" class="form-control" name="no_dok" value="<?php echo $row['no_dok'];?>">
                                        </div>
                                      </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-3" for="pwd">Luas Tanah/m<sup>2</sup>:</label>
                                          <div class="col-sm-9"> 
                                            <input type="number" class="form-control" name="luas_tanah" value="<?php echo $row['l_tanah'];?>">
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label class="control-label col-sm-3" for="pwd">Harga Tanah/m<sup>2</sup>:</label>
                                          <div class="col-sm-9"> 
                                            <input type="text" class="form-control uang" name="harga_tanah" value="<?php echo $row['h_tanah'];?>">
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label class="control-label col-sm-3" for="pwd">Luas Bangunan/m<sup>2</sup>:</label>
                                          <div class="col-sm-9"> 
                                            <input type="number" class="form-control" name="luas_bangunan" value="<?php echo $row['l_bangunan'];?>">
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label class="control-label col-sm-3" for="pwd">Harga Bangunan/m<sup>2</sup>:</label>
                                          <div class="col-sm-9"> 
                                            <input type="text" class="form-control uang" name="harga_bangunan" value="<?php echo $row['h_bangunan'];?>">
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label class="control-label col-sm-3" for="pwd">Total Harga:</label>
                                          <div class="col-sm-9"> 
                                            <input type="text" class="form-control uang" name="total_harga" value="<?php echo $row['total_harga'];?>">
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label class="control-label col-sm-3" for="pwd">Keterangan:</label>
                                          <div class="col-sm-9"> 
                                            <textarea name="keterangan" class="form-control" rows="8"><?php echo $row['keterangan'];?></textarea>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-3" for="pwd">Nama Verifikator:</label>
                                          <div class="col-sm-9"> 
                                            <input type="text" class="form-control uang" name="nama_verifikator" value="<?php echo $row['verifikator'];?>">
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-3" for="pwd">No Telepon:</label>
                                          <div class="col-sm-9"> 
                                            <input type="text" class="form-control uang" name="no_telepon" value="<?php echo $row['no_telepon'];?>">
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-3" for="pwd">No Whatsapp:</label>
                                          <div class="col-sm-9"> 
                                            <input type="text" class="form-control uang" name="no_whatsapp" value="<?php echo $row['no_whatsapp'];?>">
                                          </div>
                                        </div>
                                      
                                      
                                      <div class="form-group"> 
                                          <label class="control-label col-sm-3" for="pwd"></label>
                                          <button type="submit" class="btn btn-info">Edit</button>
                                          <button type="button" onclick="javascript:history.back()" class="btn btn-danger"><span ></span style="color: white"> Batal</button>
                                      </div>
                                      <?php endforeach;?>
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
     <script type="text/javascript">
          $(document).ready(function(){

              // Format mata uang.
              $( '.uang' ).mask('000.000.000.000.000', {reverse: true});

          })
      </script>

      <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
      <script type="text/javascript">
          $(document).ready(function(){
              $('#provinsi').change(function(){
                  var id=$(this).val();
                  $.ajax({
                      url : "<?php echo base_url();?>index.php/admin/ambil_kabupaten",
                      method : "POST",
                      data : {id: id},
                      async : false,
                      dataType : 'json',
                      success: function(data){
                          var html = '';
                          var i;
                          for(i=0; i<data.length; i++){
                              html += '<option value='+data[i].id+'>'+data[i].kabupaten+'</option>';
                          }
                          $('.kabupaten').html(html);
                           
                      }
                  });
              });
          });
      </script>

    </body>
</html>