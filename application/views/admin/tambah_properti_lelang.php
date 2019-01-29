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
                                <div class="panel-heading"><h3 class="panel-title">Tambah Properti Lelang (Operator)</h3></div>
                                <div class="panel-body">
                                    <form class="form-horizontal" action="<?php echo site_url('admin/simpan_properti_lelang');?>" method="post" enctype="multipart/form-data">
                                      <div class="form-group">
                                        <label class="control-label col-sm-3" for="email">Jenis Properti:</label>
                                        <div class="col-sm-9">
                                          <select class="form-control" name="jenis">
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
                                          <input type="text" class="form-control" name="alamat">
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="control-label col-sm-3" for="pwd">Lokasi:</label>
                                        <div class="col-sm-9"> 
                                          <input type="text" class="form-control" name="lokasi">
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label class="control-label col-sm-3" for="pwd">Provinsi:</label>
                                        <div class="col-sm-9"> 
                                          <select class="form-control" name="provinsi" id="provinsi">
                                           <option>Pilih Provinsi</option>
                                            <?php foreach($data->result() as $row):?>
                                                <option value="<?php echo $row->id;?>"><?php echo $row->provinsi;?></option>
                                            <?php endforeach;?>
                                          </select>
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label class="control-label col-sm-3" for="pwd">Kabupaten:</label>
                                        <div class="col-sm-9"> 
                                          <select name="kabupaten" class="kabupaten form-control">
                                            <option>Pilih Kabupaten</option>
                                          </select>
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label class="control-label col-sm-3" for="pwd">Jenis Dokumen:</label>
                                        <div class="col-sm-9"> 
                                          <input type="text" class="form-control" name="jenis_dok">
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="control-label col-sm-3" for="pwd">No Dokumen:</label>
                                        <div class="col-sm-9"> 
                                          <input type="text" class="form-control" name="no_dok">
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="control-label col-sm-3" for="pwd">Luas Tanah/m<sup>2</sup>:</label>
                                        <div class="col-sm-9"> 
                                          <input type="number" class="form-control" name="luas_tanah">
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="control-label col-sm-3" for="pwd">Harga Tanah/m<sup>2</sup>:</label>
                                        <div class="col-sm-9"> 
                                          <input type="text" class="form-control uang" name="harga_tanah">
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="control-label col-sm-3" for="pwd">Luas Bangunan/m<sup>2</sup>:</label>
                                        <div class="col-sm-9"> 
                                          <input type="number" class="form-control" name="luas_bangunan">
                                          <small style="color: red"><i>* Kosongkan jika tidak perlu</i></small>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="control-label col-sm-3" for="pwd">Harga Bangunan/m<sup>2</sup>:</label>
                                        <div class="col-sm-9"> 
                                          <input type="text" class="form-control uang" name="harga_bangunan">
                                          <small style="color: red"><i>* Kosongkan jika tidak perlu</i></small>
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label class="control-label col-sm-3" for="pwd">Total Harga:</label>
                                        <div class="col-sm-9"> 
                                          <input type="text" class="form-control uang" name="total_harga" placeholder="Rp">
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label class="control-label col-sm-3" for="pwd">Keterangan:</label>
                                        <div class="col-sm-9"> 
                                          <textarea name="keterangan" class="form-control" rows="8"></textarea>
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label class="control-label col-sm-3" for="pwd">Gambar Properti:</label>
                                        <div class="col-sm-9"> 
                                          <input type="file" class="form-control" name="berkas" >
                                          <small style="color: red"><i>* Wajib diisi</i></small>
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label class="control-label col-sm-3" for="pwd">Nama Verifikator:</label>
                                        <div class="col-sm-9"> 
                                          <input type="text" class="form-control uang" name="nama_verifikator">
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label class="control-label col-sm-3" for="pwd">No Telepon:</label>
                                        <div class="col-sm-9"> 
                                          <input type="text" class="form-control uang" name="no_telepon">
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label class="control-label col-sm-3" for="pwd">No Whatsapp:</label>
                                        <div class="col-sm-9"> 
                                          <input type="text" class="form-control uang" name="no_whatsapp">
                                        </div>
                                      </div>

                                      <div class="form-group"> 
                                          <label class="control-label col-sm-3" for="pwd"></label>
                                          <button type="submit" class="btn btn-info">Tambah</button>
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