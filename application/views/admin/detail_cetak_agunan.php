<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.3.js"></script>
    <style type="text/css">
		body {
		  background: rgb(204,204,204); 
		}
		page {
		  background: white;
		  display: block;
		  margin: 0 auto;
		  margin-bottom: 0.5cm;
		  box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
		}
		page[size="A4"] {  
		  width: 21cm;
		  height: 29.7cm; 
		}

		@media print {
		  body, page {
		    margin: 0;
		    box-shadow: 0;
		  }
		}

		#kiri
		{
			width:28%;
			height:215px;
			background-color:#E6E6FA;
			float:left;
			margin-left: 10px;

		}
		#kanan
		{
			width:70%;
			height:215px;
			background-color:#E6E6FA;
			float:right;
		}
	</style>

	<script type="text/javascript">
        $(document).ready(function() {

            $("#exportpdf").click(function() {
                var pdf = new jsPDF('p', 'pt', 'a4');
                // var pdf = new jsPDF('p', 'cm', [21,29]);
                // source can be HTML-formatted string, or a reference
                // to an actual DOM element from which the text will be scraped.
                source = $('#yourTableIdName')[0];

                // we support special element handlers. Register them with jQuery-style 
                // ID selector for either ID or node name. ("#iAmID", "div", "span" etc.)
                // There is no support for any other type of selectors 
                // (class, of compound) at this time.
                specialElementHandlers = {
                    // element with id of "bypass" - jQuery style selector
                    '#bypassme' : function(element, renderer) {
                        // true = "handled elsewhere, bypass text extraction"
                        return true
                    }
                };
                margins = {
                    top : 20,
                    bottom : 20,
                    left : 20,
                    width : 522
                };
                // all coords and widths are in jsPDF instance's declared units
                // 'inches' in this case
                pdf.fromHTML(source, // HTML string or DOM elem ref.
                margins.left, // x coord
                margins.top, { // y coord
                    'width' : margins.width, // max width of content on PDF
                    'elementHandlers' : specialElementHandlers
                },

                function(dispose) {
                    // dispose: object with X, Y of the last line add to the PDF 
                    //          this allow the insertion of new lines after html
                    pdf.save('fileNameOfGeneretedPdf.pdf');
                }, margins);
            });

        });
    </script>

</head>
<body class="fixed-left">
<div id="yourTableIdName">
<page size="A4" style="background: #E6E6FA">
<div class="container">
		<img src="<?php echo base_url('assets/img/atas.png');?>" style="width: 100%">
		
		<?php 
		if(!empty($detail_foto_bangunan)){
		    $no = 0; foreach($detail_foto_bangunan as $row)     
		    { ?>
		        <img src="data:image/jpeg;base64,<?php echo $row->foto ?>" style="width: 794px; height: 595px">
		    <?php 
		    } 
		}
		?>
		<img src="<?php echo base_url('assets/img/tengah.png');?>" style="width: 100%">
		<div id="kiri">
			<center><p style="font-family: Verdana, Geneva, sans-serif; font-size: 11px"><b>AKSES JALAN</b></p></center>
			<?php
	        if(!empty($detail_foto_akses)){  
	            $no = 0; foreach($detail_foto_akses as $row) 
	            { ?>
	            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
	                <?php
	                if($row->foto_akses != null){
	                    ?> <img alt="" src="data:image/jpeg;base64,<?php echo $row->foto_akses?>" class="img-rounded" style="height: 150px; width: 200px"><?php
	                }else{
	                    ?> <small>Foto Akses Tidak Tersedia</small> <?php
	                }
	                ?>
	            </div>
	            <?php 
	            }
	        } 
	        ?>
		</div>
		<div id="kanan">
	        <?php
	        if(!empty($detail_agunan)){ 
	          $no = 0; foreach($detail_agunan as $row)     
	          { ?>
	            <table class="table" style="font-family: Verdana, Geneva, sans-serif; font-size: 13px">
	              <tr>
	                <td style="text-align: left;" class="col-md-3"><b style="font-family: Verdana, Geneva, sans-serif;">Harga</b></td>
	                <td style="text-align: left;" class="col-md-9"><h2 style="font-family: Verdana, Geneva, sans-serif;">Rp <?php echo number_format($row->total_harga,0,',','.'); ?></h2></td>
	              </tr>
	              <tr>
                    <td style="text-align: left;" class="col-md-3"><b>Jenis</b></td>
                    <td style="text-align: left;" class="col-md-9"><?php echo $row->jenis ?></td>
                  </tr>
                  <tr>
                    <td style="text-align: left;" class="col-md-3"><b>Lokasi</b></td>
                    <td style="text-align: left;" class="col-md-9"><?php echo $row->lokasi ?></td>
                  </tr>
                  <tr>
                    <td style="text-align: left;" class="col-md-3"><b>Alamat</b></td>
                    <td style="text-align: left;" class="col-md-9"><?php echo $row->alamat ?></td>
                  </tr>
                  <tr>
                    <td style="text-align: left;" class="col-md-3"><b>Provinsi</b></td>
                    <td style="text-align: left;" class="col-md-9"><?php echo $row->provinsi ?></td>
                  </tr>
                  <tr>
                    <td style="text-align: left;" class="col-md-3"><b>Keterangan</b></td>
                    <td style="text-align: left;" class="col-md-9"><?php echo $row->keterangan ?></td>
                  </tr>
                  <tr>
                    <td colspan="2" style="text-align: left;" class="col-md-9"><img alt="" src="data:image/jpeg;base64,<?php echo $row->foto?>" class="img-rounded" style="max-height: 60px;"></td>
                  </tr>
	            </table>
	          <?php 
	          } 
	          } 
	        ?>
	    </div>
        <img src="<?php echo base_url('assets/img/bawah.png');?>" style="width: 100%">
</div>
</div>
</page>
<script>
    var resizefunc = [];
</script>

<!-- jQuery  -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>
<script src="<?php echo base_url('assets/blue/js/jquery.min.js');?>"></script>
<script src="<?php echo base_url('assets/blue/js/bootstrap.min.js');?>"></script>

<script>
		window.print();
</script>
</body>
</html>