<?php
defined('BASEPATH') OR EXIT('No direct script access allowed');

class Admin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('produk_model');
		$this->load->model('agunan_model');
		$this->load->helper('download');
		$logged_in = $this->session->userdata('logged_in');
		if (empty($logged_in))
		{
			redirect('login');
		}
	}
	
	public function index(){
		$cari = $this->agunan_model->data_terjual();
		if ($cari)
		{
		    $data['hasil_data_terjual'] = $cari;
		}
		 
		$dpthasil = $this->agunan_model->data_belum_terjual();
		if ($dpthasil)
		{
		    $data['hasil_data_belum_terjual'] = $dpthasil;
		}

		$cari2 = $this->agunan_model->data_agunan_jual();
		if ($cari2)
		{
		    $data['hasil_data_agunan_jual'] = $cari2;
		}

		$dpthasil = $this->agunan_model->data_agunan_lelang_operator();
		if ($dpthasil)
		{
		    $data['hasil_data_agunan_lelang_oparator'] = $dpthasil;
		}

		$dpthasil2 = $this->agunan_model->data_agunan_lelang_verifikator();
		if ($dpthasil2)
		{
		    $data['hasil_data_agunan_lelang_verifikator'] = $dpthasil2;
		}


		$jual_terjual = $this->agunan_model->data_jual_terjual();
		if ($jual_terjual)
		{
		    $data['hasil_data_jual_terjual'] = $jual_terjual;
		}

		$lelang_terjual = $this->agunan_model->data_lelang_terjual();
		if ($lelang_terjual)
		{
		    $data['hasil_data_lelang_terjual'] = $lelang_terjual;
		}

		$dpthasil3 = $this->agunan_model->data_agunan_lelang_operator_terjual();
		if ($dpthasil3)
		{
		    $data['hasil_data_lelang_operator_terjual'] = $dpthasil3;
		}
		 
		$dpthasil4 = $this->agunan_model->data_agunan_lelang_verifikator_terjual();
		if ($dpthasil4)
		{
		    $data['hasil_data_lelang_verifikator_terjual'] = $dpthasil4;
		}

		$this->load->view('admin/beranda', $data); 
	}

	function index2()
	{	
		$data['report']=$this->agunan_model->get_grafik();
		$this->load->view('admin/beranda', $data);
	}

	// function data_agunan()
	// {
	// 	$data['data_agunan'] = $this->agunan_model->data_agunan();
	// 	$this->load->view('admin/data_agunan',$data);
	// }

	function agunan_jual()
	{
		$data['agunan_jual'] = $this->agunan_model->agunan_jual();
		$this->load->view('admin/agunan_jual',$data);
	}

	function agunan_lelang()
	{
		$data['agunan_lelang'] = $this->agunan_model->agunan_lelang();
		$this->load->view('admin/agunan_lelang',$data);
	}

	function agunan_unggulan()
	{
		$data['agunan_unggulan'] = $this->agunan_model->agunan_unggulan();
		$this->load->view('admin/agunan_unggulan',$data);
	}


	function agunan_lelang_unggulan()
	{
		$data['agunan_lelang_unggulan'] = $this->agunan_model->agunan_lelang_unggulan();
		$this->load->view('admin/agunan_lelang_unggulan',$data);
	}

	function set_unggulan(){
	    $data = array(
	      'id' => $this->input->post('id'),
	      'kategori' => $this->input->post('kategori'),
	      );

	    $res = $this->agunan_model->update_agunan($data);
	    if($res=1){
	      header('location:'.base_url().'index.php/admin/agunan_unggulan');
	      $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Diedit
	    	</div>");
	    }
	}

	function set_biasa(){
	    $data = array(
	      'id' => $this->input->post('id'),
	      'kategori' => $this->input->post('kategori'),
	      );

	    $res = $this->agunan_model->update_agunan($data);
	    if($res=1){
	      header('location:'.base_url().'index.php/admin/agunan_jual');
	      $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Diedit
	    	</div>");
	    }
	}

	function set_lelang_unggulan(){
	    $data = array(
	      'id' => $this->input->post('id'),
	      'kategori' => $this->input->post('kategori'),
	      );

	    $res = $this->agunan_model->update_agunan($data);
	    if($res=1){
	      header('location:'.base_url().'index.php/admin/agunan_lelang_unggulan');
	      $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Diedit
	    	</div>");
	    }
	}

	function set_lelang_biasa(){
	    $data = array(
	      'id' => $this->input->post('id'),
	      'kategori' => $this->input->post('kategori'),
	      );

	    $res = $this->agunan_model->update_agunan($data);
	    if($res=1){
	      header('location:'.base_url().'index.php/admin/agunan_lelang');
	      $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Diedit
	    	</div>");
	    }
	}

	function edit_agunan($kode = 0){
	    $row = $this->agunan_model->edit_agunan("where tr_agunan.id  = '$kode'")->result_array();

	    $data = array(
	      'id' => $row[0]['id'],
	    );

	    $this->load->view('admin/edit_agunan', $data);
  	}

  	function edit_properti_jual($kode = 0){
	    $row = $this->agunan_model->edit_agunan("where tr_agunan.id  = '$kode'")->result_array();

	    $data = array(
	      'id' => $row[0]['id'],
	    );

	    $this->load->view('admin/edit_properti_jual', $data);
  	}

  	function update_properti_jual(){
	    $data = array(
	      'id' => $this->input->post('id'),
	      'status' => $this->input->post('status'),
	      );

	    $res = $this->agunan_model->update_agunan($data);
	    if($res=1){
	      header('location:'.base_url().'index.php/admin/agunan_jual');
	      $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Diedit
	    	</div>");
	    }
	}


	function edit_properti_lelang($kode = 0){
	    $row = $this->agunan_model->edit_agunan("where tr_agunan.id  = '$kode'")->result_array();

	    $data = array(
	      'id' => $row[0]['id'],
	    );

	    $this->load->view('admin/edit_properti_lelang', $data);
  	}

  	function update_properti_lelang(){
	    $data = array(
	      'id' => $this->input->post('id'),
	      'status' => $this->input->post('status'),
	      );

	    $res = $this->agunan_model->update_agunan($data);
	    if($res=1){
	      header('location:'.base_url().'index.php/admin/agunan_lelang');
	      $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Diedit
	    	</div>");
	    }
	}

	function edit_status_properti($kode = 0){
	    $row = $this->agunan_model->edit_agunan("where tr_agunan.id  = '$kode'")->result_array();
	    $data = array(
	      'id' => $row[0]['id'],
	    );
	    $this->load->view('admin/edit_status_properti', $data);
  	}

  	function update_status_properti(){
	    $data = array(
	      'id' => $this->input->post('id'),
	      'status_agunan' => $this->input->post('status_properti'),
	      );

	    $res = $this->agunan_model->update_agunan($data);
	    if($res=1){
	      header('location:'.base_url().'index.php/admin/agunan_lelang');
	      $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Diedit
	    	</div>");
	    }
	}

	function data_agunan_terjual()
	{
		$data['data_agunan_terjual'] = $this->agunan_model->data_agunan_terjual();
		$this->load->view('admin/data_agunan_terjual',$data);
	}

	function data_agunan_lelang_terjual()
	{
		$data['data_agunan_lelang_terjual'] = $this->agunan_model->data_agunan_lelang_terjual();
		$this->load->view('admin/data_agunan_lelang_terjual',$data);
	}

	function detail_agunan($kode = 0){
	   $data = array('detail_agunan' => $this->agunan_model->detail_agunan("WHERE tr_agunan.id = '$kode'")->result_array(),);
	    $this->load->view('admin/detail_agunan', $data);
  	}

  	function detail_agunan_lelang($kode = 0){
	   $data = array('detail_agunan_lelang' => $this->agunan_model->detail_agunan_lelang("WHERE tr_agunan.id = '$kode'")->result_array(),);
	    $this->load->view('admin/detail_agunan_lelang', $data);
  	}

  	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}

	function tambah_agunan()
	{
		// provinsi
        $data['data']=$this->agunan_model->ambil_provinsi();
		$this->load->view('admin/tambah_agunan', $data);
	}

	function ambil_kabupaten(){
        $id_provinsi = $this->input->post('id');
        $data = $this->agunan_model->ambil_kabupaten($id_provinsi);
        echo json_encode($data);
    }

	function simpan_agunan(){

		//upload file
        $config['max_size']=2048;
        $config['allowed_types']="jpg|jpeg|png";
        $config['remove_spaces']=TRUE;
        $config['overwrite']=TRUE;
        $config['upload_path']=FCPATH.'assets/g_agunan';

        $this->load->library('upload');
        $this->upload->initialize($config);

        //base 64

        $this->upload->do_upload('berkas');
        $data = array('upload_data' => $this->upload->data());
        $filename=$data['upload_data']['file_name'];
        $pathinfo = 'assets/g_agunan/'.$filename;
        $filetype = pathinfo($pathinfo, PATHINFO_EXTENSION);
        $filecontent = file_get_contents($pathinfo);
        $base64=rtrim(base64_encode($filecontent));

	    $id_agunan	= 0;
	    $id_klaim = 0;
	    $jenis= $_POST['jenis']; 
	    $id_kabupaten = $_POST['kabupaten'];

	    $alamat= $_POST['alamat'];
	    if($alamat == ''){
	    	$alamat = '-';
	    }else{
	    	$alamat = $alamat;
	    }

	    $lokasi= $_POST['lokasi']; 
	    if($lokasi == ''){
	    	$lokasi = '-';
	    }else{
	    	$lokasi = $lokasi;
	    }

	    $provinsi= $_POST['provinsi']; 
	    if($provinsi == ''){
	    	$provinsi = '-';
	    }else{
	    	$provinsi = $provinsi;
	    }

	    $jenis_dok= $_POST['jenis_dok']; 
	    if($jenis_dok == ''){
	    	$jenis_dok = '-';
	    }else{
	    	$jenis_dok = $jenis_dok;
	    }

	    $no_dok= $_POST['no_dok']; 
	    if($no_dok == ''){
	    	$no_dok = '-';
	    }else{
	    	$no_dok = $no_dok;
	    }

	    $luas_tanah= $_POST['luas_tanah']; 
	    if($luas_tanah == ''){
	    	$luas_tanah = 0;
	    }else{
	    	$luas_tanah = $luas_tanah;
	    }

	    $h_tanah= $_POST['harga_tanah'];
	    $harga_tanah = str_replace(".", "", $h_tanah);
	    if($harga_tanah == ''){
	    	$harga_tanah = 0;
	    }else{
	    	$harga_tanah = $harga_tanah;
	    }

	    $total= $_POST['total_harga'];
	    $total_harga = str_replace(".", "", $total); 
	    if($total_harga == ''){
	    	$total_harga = 0;
	    }else{
	    	$total_harga = $total_harga;
	    }

	    $keterangan= $_POST['keterangan']; 
	    if($keterangan == ''){
	    	$keterangan = '-';
	    }else{
	    	$keterangan = $keterangan;
	    }

	    $luas_bangunan= $_POST['luas_bangunan']; 
	    if($luas_bangunan == ''){
	    	$l_bangunan = 0;
	    }else{
	    	$l_bangunan = $luas_bangunan;
	    }

	    $h_bangunan = $_POST['harga_bangunan']; 
	    $harga_bangunan = str_replace(".", "", $h_bangunan);
	    if($harga_bangunan == ''){
	    	$h_bangunan = 0;
	    }else{
	    	$h_bangunan = $harga_bangunan;
	    }

	    $verifikator = $_POST['nama_verifikator']; 
	    if($verifikator == ''){
	    	$verifikator = '-';
	    }else{
	    	$verifikator = $verifikator;
	    }

	    $no_telepon = $_POST['no_telepon']; 
	    if($no_telepon == ''){
	    	$no_telepon = '-';
	    }else{
	    	$no_telepon = $no_telepon;
	    }

	    $no_whatsapp = $_POST['no_whatsapp']; 
	    if($no_whatsapp == ''){
	    	$no_whatsapp = '-';
	    }else{
	    	$no_whatsapp = $no_whatsapp;
	    }

	    $sumber_harga = 'Pasar';
	    $jml_lantai = 0;
	    $r_tamu = 0;
	    $r_keluarga = 0;
	    $k_tidur = 0;
	    $status_agunan = 1;

	    $data = array(  
	      'id_klaim'=>$id_klaim,
	      'jenis'=> $jenis,
	      'alamat'=> $alamat,
	      'lokasi'=> $lokasi,
	      'jenis_dok'=> $jenis_dok,
	      'no_dok'=> $no_dok,
	      'l_tanah'=> $luas_tanah,
	      'h_tanah'=> $harga_tanah,
	      'l_bangunan'=> $l_bangunan,
	      'h_bangunan'=> $h_bangunan,
	      'sumber_harga'=> $sumber_harga,
	      'id_provinsi'=> $provinsi,
	      'total_harga'=> $total_harga,
	      'keterangan'=> $keterangan,
	      'status_agunan'=> $status_agunan,
	      'id_kabupaten'=> $id_kabupaten,
	      'verifikator'=> $verifikator,
	      'no_telepon'=> $no_telepon,
	      'no_whatsapp'=> $no_whatsapp,
	      );

	     $id = '';
	     $data2 = array(  
	      'id_agunan'=> $id_agunan,
	      'provinsi'=> $provinsi,
	      );

	    $this->agunan_model->simpan('tr_agunan', $data);

	    $ambil_id = $this->db->query("SELECT id FROM tr_agunan ORDER BY id DESC Limit 1;");
	    foreach ($ambil_id ->result_array() as $row) {
	        $id      = $row['id'];

	        $data3 = array( 
	            'id_tr_agunan'=> $id,
		        'foto'=> $base64,
		        'status'=> '1',
		    );
		    $this->agunan_model->simpan('foto_bangunan', $data3);

		    $data4 = array( 
	            'id_tr_agunan'=> $id,
	            'foto'=> '',
	            'status'=> '1',
		    );
		    $this->agunan_model->simpan('foto_akses', $data4);

		    $data5 = array( 
	            'id_tr_agunan'=> $id,
	            'foto'=> '',
		    );
		    $this->agunan_model->simpan('foto_logo', $data5);
	    }

	    $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Ditambahkan
	    	</div>");
	    redirect('admin/agunan_jual');
  	}

  	function foto_agunan2()
	{
		$data['foto_agunan'] = $this->agunan_model->foto_agunan();
		$this->load->view('admin/foto_agunan',$data);
	}

	function foto_agunan($kode = 0){
	    $data = array('foto_agunan' => $this->agunan_model->foto_agunan("WHERE foto_bangunan.id_tr_agunan = '$kode' ORDER BY foto_bangunan.id")->result_array(),);
	    $this->load->view('admin/foto_agunan', $data);
  	}

  	function tambah_gambar_agunan($kode = 0){
	    $data = array('data_id_agunan' => $this->agunan_model->data_id_agunan("WHERE tr_agunan.id = '$kode'")->result_array(),);
	    $this->load->view('admin/tambah_gambar_agunan', $data);
  	}

  	function simpan_gambar_agunan(){

		//upload file
        $config['max_size']=2048;
        $config['allowed_types']="jpg|jpeg|png";
        $config['remove_spaces']=TRUE;
        $config['overwrite']=TRUE;
        $config['upload_path']=FCPATH.'assets/g_agunan';

        $this->load->library('upload');
        $this->upload->initialize($config);

        //base 64
        $this->upload->do_upload('berkas');
        $data = array('upload_data' => $this->upload->data());
        $filename=$data['upload_data']['file_name'];
        $pathinfo = 'assets/g_agunan/'.$filename;
        $filetype = pathinfo($pathinfo, PATHINFO_EXTENSION);
        $filecontent = file_get_contents($pathinfo);
        $base64=rtrim(base64_encode($filecontent));

	    $id_agunan= $_POST['id_agunan']; 

	    $status = 0;
	    $data = array(
	      'id_tr_agunan'=> $id_agunan,
	      'foto'=> $base64,
	      'status'=> $status,
	      );

	    $this->agunan_model->simpan('foto_bangunan', $data);

	    $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Ditambahkan
	    	</div>");
	    redirect("admin/foto_agunan/".$id_agunan);
  	}

  	function lihat_foto_akses($kode = 0){
	    $data = array('foto_akses' => $this->agunan_model->foto_akses("WHERE foto_akses.id_tr_agunan = '$kode'")->result_array(),);
	    $this->load->view('admin/foto_akses', $data);
  	}

  	function tambah_gambar_akses($kode = 0){
	    $data = array('data_id_agunan' => $this->agunan_model->data_id_agunan("WHERE tr_agunan.id = '$kode'")->result_array(),);
	    $this->load->view('admin/tambah_gambar_akses', $data);
  	}

  	function simpan_gambar_akses(){

		//upload file
        $config['max_size']=2048;
        $config['allowed_types']="jpg|jpeg|png";
        $config['remove_spaces']=TRUE;
        $config['overwrite']=TRUE;
        $config['upload_path']=FCPATH.'assets/g_akses_jalan';

        $this->load->library('upload');
        $this->upload->initialize($config);

        //base 64
        $this->upload->do_upload('berkas');
        $data = array('upload_data' => $this->upload->data());
        $filename=$data['upload_data']['file_name'];
        $pathinfo = 'assets/g_akses_jalan/'.$filename;
        $filetype = pathinfo($pathinfo, PATHINFO_EXTENSION);
        $filecontent = file_get_contents($pathinfo);
        $base64=rtrim(base64_encode($filecontent));

	    $id_agunan= $_POST['id_agunan']; 

	    $status = 0;
	    $data = array(  
	      'id_tr_agunan'=> $id_agunan,
	      'foto'=> $base64,
	      'status'=> $status,
	      );

	    $this->agunan_model->simpan('foto_akses', $data);

	    $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Ditambahkan
	    	</div>");
	    redirect("admin/lihat_foto_akses/".$id_agunan);
  	}

  	// EDIT
  	function edit_gambar_akses($kode = 0){
	    $data = array('data_id_gambar_akses' => $this->agunan_model->id_foto_akses("WHERE foto_akses.id = '$kode'")->result_array(),);
	    $this->load->view('admin/edit_gambar_akses', $data);
  	}

  	function update_gambar_akses(){

		//upload file
        $config['max_size']=2048;
        $config['allowed_types']="jpg|jpeg|png";
        $config['remove_spaces']=TRUE;
        $config['overwrite']=TRUE;
        $config['upload_path']=FCPATH.'assets/g_akses_jalan';

        $this->load->library('upload');
        $this->upload->initialize($config);

        //base 64
        $this->upload->do_upload('berkas');
        $data = array('upload_data' => $this->upload->data());
        $filename=$data['upload_data']['file_name'];
        $pathinfo = 'assets/g_akses_jalan/'.$filename;
        $filetype = pathinfo($pathinfo, PATHINFO_EXTENSION);
        $filecontent = file_get_contents($pathinfo);
        $base64=rtrim(base64_encode($filecontent));

	    $id_foto_akses= $_POST['id_foto_akses']; 

	    $data = array(  
	      'id'=> $id_foto_akses,
	      'foto'=> $base64,
	      );

	    $res = $this->agunan_model->update_gambar_akses($data);

	    $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Gambar Berhasil Diperbaharui
	    	</div>");
	    echo "<script>window.location.href='javascript:history.go(-2);'</script>";
  	}

  	function edit_deskripsi($kode = 0){
	    $data = array('data_deskripsi' => $this->agunan_model->data_deskripsi("WHERE tr_agunan.id = '$kode'")->result_array(),);
	    $this->load->view('admin/edit_deskripsi', $data);
  	}

  	function edit_deskripsi_lelang($kode = 0){
	    $data = array('data_deskripsi' => $this->agunan_model->data_deskripsi_lelang("WHERE tr_agunan.id = '$kode'")->result_array(),);
	    $this->load->view('admin/edit_deskripsi_lelang', $data);
  	}

  	function update_deskripsi(){

	    $id_agunan	= $_POST['id_agunan']; 
	    $id_klaim = 0;
	    $jenis= $_POST['jenis']; 
	    $alamat= $_POST['alamat']; 
	    $lokasi= $_POST['lokasi']; 
	    $provinsi= $_POST['provinsi']; 
	    $id_kabupaten= $_POST['kabupaten']; 
	    $jenis_dok= $_POST['jenis_dok']; 
	    $no_dok= $_POST['no_dok']; 
	    $luas_tanah= $_POST['luas_tanah']; 

	    $h_tanah= $_POST['harga_tanah'];
	    $harga_tanah = str_replace(".", "", $h_tanah);
	    $total= $_POST['total_harga']; 
	    $total_harga = str_replace(".", "", $total);

	    $keterangan= $_POST['keterangan']; 

	    $luas_bangunan= $_POST['luas_bangunan']; 
	    if($luas_bangunan == ''){
	    	$l_bangunan = 0;
	    }else{
	    	$l_bangunan = $luas_bangunan;
	    }

	    $h_bangunan = $_POST['harga_bangunan']; 
	    $harga_bangunan = str_replace(".", "", $h_bangunan);
	    if($harga_bangunan == ''){
	    	$h_bangunan = 0;
	    }else{
	    	$h_bangunan = $harga_bangunan;
	    }

	    $sumber_harga = 'Pasar';
	    $jml_lantai = 0;
	    $r_tamu = 0;
	    $r_keluarga = 0;
	    $k_tidur = 0;

	    $verifikator = $_POST['nama_verifikator'];
	    $no_telepon  = $_POST['no_telepon'];
	    $no_whatsapp = $_POST['no_whatsapp'];   

	    $data = array( 
	      'id'=>$id_agunan,
	      'id_klaim'=>$id_klaim,
	      'jenis'=> $jenis,
	      'alamat'=> $alamat,
	      'lokasi'=> $lokasi,
	      'jenis_dok'=> $jenis_dok,
	      'no_dok'=> $no_dok,
	      'l_tanah'=> $luas_tanah,
	      'h_tanah'=> $harga_tanah,
	      'l_bangunan'=> $l_bangunan,
	      'h_bangunan'=> $h_bangunan,
	      'sumber_harga'=> $sumber_harga,
	      'id_provinsi'=> $provinsi,
	      'total_harga'=> $total_harga,
	      'keterangan'=> $keterangan,
	      'id_kabupaten'=> $id_kabupaten,
	      'verifikator'=> $verifikator,
	      'no_telepon'=> $no_telepon,
	      'no_whatsapp'=> $no_whatsapp,
	    );

	    $res = $this->agunan_model->update_deskripsi($data);

	    $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Deskripsi Berhasil Diperbaharui
	    	</div>");
	    redirect("admin/detail_agunan/".$id_agunan);
  	}


  	function update_deskripsi_lelang(){

	    $id_agunan	= $_POST['id_agunan']; 
	    $id_klaim = 0;
	    $jenis= $_POST['jenis']; 
	    $alamat= $_POST['alamat']; 
	    $lokasi= $_POST['lokasi']; 
	    $provinsi= $_POST['provinsi']; 
	    $id_kabupaten= $_POST['kabupaten']; 
	    $jenis_dok= $_POST['jenis_dok']; 
	    $no_dok= $_POST['no_dok']; 
	    $luas_tanah= $_POST['luas_tanah']; 

	    $h_tanah= $_POST['harga_tanah'];
	    $harga_tanah = str_replace(".", "", $h_tanah);
	    $total= $_POST['total_harga']; 
	    $total_harga = str_replace(".", "", $total);

	    $keterangan= $_POST['keterangan']; 

	    $luas_bangunan= $_POST['luas_bangunan']; 
	    if($luas_bangunan == ''){
	    	$l_bangunan = 0;
	    }else{
	    	$l_bangunan = $luas_bangunan;
	    }

	    $h_bangunan = $_POST['harga_bangunan']; 
	    $harga_bangunan = str_replace(".", "", $h_bangunan);
	    if($harga_bangunan == ''){
	    	$h_bangunan = 0;
	    }else{
	    	$h_bangunan = $harga_bangunan;
	    }

	    $sumber_harga = 'Pasar';
	    $jml_lantai = 0;
	    $r_tamu = 0;
	    $r_keluarga = 0;
	    $k_tidur = 0;

	    $verifikator = $_POST['nama_verifikator'];
	    $no_telepon  = $_POST['no_telepon'];
	    $no_whatsapp = $_POST['no_whatsapp'];   

	    $data = array( 
	      'id'=>$id_agunan,
	      'jenis'=> $jenis,
	      'alamat'=> $alamat,
	      'lokasi'=> $lokasi,
	      'jenis_dok'=> $jenis_dok,
	      'no_dok'=> $no_dok,
	      'l_tanah'=> $luas_tanah,
	      'h_tanah'=> $harga_tanah,
	      'l_bangunan'=> $l_bangunan,
	      'h_bangunan'=> $h_bangunan,
	      'sumber_harga'=> $sumber_harga,
	      'id_provinsi'=> $provinsi,
	      'total_harga'=> $total_harga,
	      'keterangan'=> $keterangan,
	      'id_kabupaten'=> $id_kabupaten,
	      'no_whatsapp'=> $no_whatsapp,
	    );

	    $res = $this->agunan_model->update_deskripsi($data);

	    $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Deskripsi Berhasil Diperbaharui
	    	</div>");
	    redirect("admin/detail_agunan_lelang/".$id_agunan);
  	}

  	function edit_gambar_bangunan($kode = 0){
	    $data = array('data_id_gambar_bangunan' => $this->agunan_model->id_foto_bangunan("WHERE foto_bangunan.id = '$kode'")->result_array(),);
	    $this->load->view('admin/edit_gambar_bangunan', $data);
  	}

  	function update_gambar_bangunan(){

		//upload file
        $config['max_size']=2048;
        $config['allowed_types']="jpg|jpeg|png";
        $config['remove_spaces']=TRUE;
        $config['overwrite']=TRUE;
        $config['upload_path']=FCPATH.'assets/g_agunan';

        $this->load->library('upload');
        $this->upload->initialize($config);

        //base 64
        $this->upload->do_upload('berkas');
        $data = array('upload_data' => $this->upload->data());
        $filename=$data['upload_data']['file_name'];
        $pathinfo = 'assets/g_agunan/'.$filename;
        $filetype = pathinfo($pathinfo, PATHINFO_EXTENSION);
        $filecontent = file_get_contents($pathinfo);
        $base64=rtrim(base64_encode($filecontent));

	    $id_foto_bangunan= $_POST['id_foto_bangunan']; 

	    $data = array(  
	      'id'=> $id_foto_bangunan,
	      'foto'=> $base64,
	      );

	    $res = $this->agunan_model->update_gambar_bangunan ($data);

	    $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Gambar Berhasil Diperbaharui
	    	</div>");
	    echo "<script>window.location.href='javascript:history.go(-2);'</script>";
  	}

  	function edit_status_foto_bangunan($kode = 0){
	    $data = array('data_id_gambar_bangunan' => $this->agunan_model->id_foto_bangunan("WHERE foto_bangunan.id = '$kode'")->result_array(),);
	    $this->load->view('admin/edit_status_foto_bangunan', $data);
  	}

  	function update_status_foto_bangunan(){

	    $id_foto_bangunan= $_POST['id_foto_bangunan']; 
	    $status= $_POST['status']; 

	    $data = array(  
	      'id'=> $id_foto_bangunan,
	      'status'=> $status,
	      );

	    $res = $this->agunan_model->update_status_foto_bangunan($data);

	    $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Status Berhasil Diperbaharui
	    	</div>");
	    echo "<script>window.location.href='javascript:history.go(-2);'</script>";
  	}

  	function edit_status_foto_akses($kode = 0){
	    $data = array('data_id_gambar_akses' => $this->agunan_model->id_foto_akses("WHERE foto_akses.id = '$kode' ORDER BY foto_akses.status DESC")->result_array(),);
	    $this->load->view('admin/edit_status_foto_akses', $data);
  	}

  	function update_status_foto_akses(){

	    $id_foto_akses= $_POST['id_foto_akses']; 
	    $status= $_POST['status']; 

	    $data = array(  
	      'id'=> $id_foto_akses,
	      'status'=> $status,
	      );

	    $res = $this->agunan_model->update_status_foto_akses($data);

	    $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Status Berhasil Diperbaharui
	    	</div>");
	    echo "<script>window.location.href='javascript:history.go(-2);'</script>";
  	}

  	function lihat_foto_logo($kode = 0){
	    $data = array('foto_logo' => $this->agunan_model->foto_logo("WHERE foto_logo.id_tr_agunan = '$kode'")->result_array(),);
	    $this->load->view('admin/foto_logo', $data);
  	}

  	// EDIT
  	function tambah_gambar_logo($kode = 0){
	    $data = array('data_id_gambar_logo' => $this->agunan_model->id_foto_logo("WHERE foto_logo.id = '$kode'")->result_array(),);
	    $this->load->view('admin/tambah_gambar_logo', $data);
  	}

  	function update_gambar_logo(){

		//upload file
        $config['max_size']=2048;
        $config['allowed_types']="jpg|jpeg|png";
        $config['remove_spaces']=TRUE;
        $config['overwrite']=TRUE;
        $config['upload_path']=FCPATH.'assets/g_logo';

        $this->load->library('upload');
        $this->upload->initialize($config);

        //base 64
        $this->upload->do_upload('berkas');
        $data = array('upload_data' => $this->upload->data());
        $filename=$data['upload_data']['file_name'];
        $pathinfo = 'assets/g_logo/'.$filename;
        $filetype = pathinfo($pathinfo, PATHINFO_EXTENSION);
        $filecontent = file_get_contents($pathinfo);
        $base64=rtrim(base64_encode($filecontent));

	    $id_foto_logo= $_POST['id_foto_logo']; 

	    $data = array(  
	      'id'=> $id_foto_logo,
	      'foto'=> $base64,
	      );

	    $res = $this->agunan_model->update_gambar_logo($data);

	    $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Gambar Berhasil Diperbaharui
	    	</div>");
	    echo "<script>window.location.href='javascript:history.go(-2);'</script>";
  	}

  	function hapus_properti($kode = 0){
	    $result = $this->agunan_model->hapus('tr_agunan',array('id' => $kode));
	    $result2 = $this->agunan_model->hapus('foto_bangunan',array('id_tr_agunan' => $kode));
	    $result3 = $this->agunan_model->hapus('foto_akses',array('id_tr_agunan' => $kode));
	    if($result == 1){
	    $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Dihapus
	    	</div>");
		}
		redirect('admin/agunan_jual');
	}

	function hapus_properti_unggulan($kode = 0){
	    $result = $this->agunan_model->hapus('tr_agunan',array('id' => $kode));
	    $result2 = $this->agunan_model->hapus('foto_bangunan',array('id_tr_agunan' => $kode));
	    $result3 = $this->agunan_model->hapus('foto_akses',array('id_tr_agunan' => $kode));
	    if($result == 1){
	    $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Dihapus
	    	</div>");
		}
		redirect('admin/agunan_unggulan');
	}

	function input_manual(){
	    $this->load->view('admin/input_manual');
	}

	function verifikator(){
	    $this->load->view('admin/menu_verifikator');
	}

	function properti_terjual(){
	    $this->load->view('admin/properti_terjual');
	}

	function properti_lelang()
	{
		$data['properti_lelang'] = $this->agunan_model->properti_lelang();
		$this->load->view('admin/properti_lelang',$data);
	}

	function tambah_properti_lelang()
	{
		// provinsi
        $data['data']=$this->agunan_model->ambil_provinsi();
		$this->load->view('admin/tambah_properti_lelang', $data);
	}

	function simpan_properti_lelang(){

		//upload file
        $config['max_size']=2048;
        $config['allowed_types']="jpg|jpeg|png";
        $config['remove_spaces']=TRUE;
        $config['overwrite']=TRUE;
        $config['upload_path']=FCPATH.'assets/g_agunan';

        $this->load->library('upload');
        $this->upload->initialize($config);

        //base 64

        $this->upload->do_upload('berkas');
        $data = array('upload_data' => $this->upload->data());
        $filename=$data['upload_data']['file_name'];
        $pathinfo = 'assets/g_agunan/'.$filename;
        $filetype = pathinfo($pathinfo, PATHINFO_EXTENSION);
        $filecontent = file_get_contents($pathinfo);
        $base64=rtrim(base64_encode($filecontent));

	    $id_agunan	= 0;
	    $id_klaim = 0;
	    $jenis= $_POST['jenis']; 
	    $id_kabupaten = $_POST['kabupaten'];

	    $alamat= $_POST['alamat'];
	    if($alamat == ''){
	    	$alamat = '-';
	    }else{
	    	$alamat = $alamat;
	    }

	    $lokasi= $_POST['lokasi']; 
	    if($lokasi == ''){
	    	$lokasi = '-';
	    }else{
	    	$lokasi = $lokasi;
	    }

	    $provinsi= $_POST['provinsi']; 
	    if($provinsi == ''){
	    	$provinsi = '-';
	    }else{
	    	$provinsi = $provinsi;
	    }

	    $jenis_dok= $_POST['jenis_dok']; 
	    if($jenis_dok == ''){
	    	$jenis_dok = '-';
	    }else{
	    	$jenis_dok = $jenis_dok;
	    }

	    $no_dok= $_POST['no_dok']; 
	    if($no_dok == ''){
	    	$no_dok = '-';
	    }else{
	    	$no_dok = $no_dok;
	    }

	    $luas_tanah= $_POST['luas_tanah']; 
	    if($luas_tanah == ''){
	    	$luas_tanah = 0;
	    }else{
	    	$luas_tanah = $luas_tanah;
	    }

	    $h_tanah= $_POST['harga_tanah'];
	    $harga_tanah = str_replace(".", "", $h_tanah);
	    if($harga_tanah == ''){
	    	$harga_tanah = 0;
	    }else{
	    	$harga_tanah = $harga_tanah;
	    }

	    $total= $_POST['total_harga'];
	    $total_harga = str_replace(".", "", $total); 
	    if($total_harga == ''){
	    	$total_harga = 0;
	    }else{
	    	$total_harga = $total_harga;
	    }

	    $keterangan= $_POST['keterangan']; 
	    if($keterangan == ''){
	    	$keterangan = '-';
	    }else{
	    	$keterangan = $keterangan;
	    }

	    $luas_bangunan= $_POST['luas_bangunan']; 
	    if($luas_bangunan == ''){
	    	$l_bangunan = 0;
	    }else{
	    	$l_bangunan = $luas_bangunan;
	    }

	    $h_bangunan = $_POST['harga_bangunan']; 
	    $harga_bangunan = str_replace(".", "", $h_bangunan);
	    if($harga_bangunan == ''){
	    	$h_bangunan = 0;
	    }else{
	    	$h_bangunan = $harga_bangunan;
	    }

	    $verifikator = $_POST['nama_verifikator']; 
	    if($verifikator == ''){
	    	$verifikator = '-';
	    }else{
	    	$verifikator = $verifikator;
	    }

	    $no_telepon = $_POST['no_telepon']; 
	    if($no_telepon == ''){
	    	$no_telepon = '-';
	    }else{
	    	$no_telepon = $no_telepon;
	    }

	    $no_whatsapp = $_POST['no_whatsapp']; 
	    if($no_whatsapp == ''){
	    	$no_whatsapp = '-';
	    }else{
	    	$no_whatsapp = $no_whatsapp;
	    }

	    $sumber_harga = 'Pasar';
	    $jml_lantai = 0;
	    $r_tamu = 0;
	    $r_keluarga = 0;
	    $k_tidur = 0;
	    $status_agunan = 3;

	    $data = array(  
	      'id_klaim'=>$id_klaim,
	      'jenis'=> $jenis,
	      'alamat'=> $alamat,
	      'lokasi'=> $lokasi,
	      'jenis_dok'=> $jenis_dok,
	      'no_dok'=> $no_dok,
	      'l_tanah'=> $luas_tanah,
	      'h_tanah'=> $harga_tanah,
	      'l_bangunan'=> $l_bangunan,
	      'h_bangunan'=> $h_bangunan,
	      'sumber_harga'=> $sumber_harga,
	      'id_provinsi'=> $provinsi,
	      'total_harga'=> $total_harga,
	      'keterangan'=> $keterangan,
	      'status_agunan'=> $status_agunan,
	      'id_kabupaten'=> $id_kabupaten,
	      'verifikator'=> $verifikator,
	      'no_telepon'=> $no_telepon,
	      'no_whatsapp'=> $no_whatsapp,
	      );

	     $id = '';
	     $data2 = array(  
	      'id_agunan'=> $id_agunan,
	      'provinsi'=> $provinsi,
	      );

	    $this->agunan_model->simpan('tr_agunan', $data);

	    $ambil_id = $this->db->query("SELECT id FROM tr_agunan ORDER BY id DESC Limit 1;");
	    foreach ($ambil_id ->result_array() as $row) {
	        $id      = $row['id'];

	        $data3 = array( 
	            'id_tr_agunan'=> $id,
		        'foto'=> $base64,
		        'status'=> '1',
		    );
		    $this->agunan_model->simpan('foto_bangunan', $data3);

		    $data4 = array( 
	            'id_tr_agunan'=> $id,
	            'foto'=> '',
	            'status'=> '1',
		    );
		    $this->agunan_model->simpan('foto_akses', $data4);

		    $data5 = array( 
	            'id_tr_agunan'=> $id,
	            'foto'=> '',
		    );
		    $this->agunan_model->simpan('foto_logo', $data5);
	    }

	    $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Ditambahkan
	    	</div>");
	    redirect('admin/properti_lelang');
  	}

  	function set_lelang_unggulan_operator(){
	    $data = array(
	      'id' => $this->input->post('id'),
	      'kategori' => $this->input->post('kategori'),
	      );

	    $res = $this->agunan_model->update_agunan($data);
	    if($res=1){
	      header('location:'.base_url().'index.php/admin/properti_lelang_unggulan');
	      $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Diedit
	    	</div>");
	    }
	}

	function properti_lelang_unggulan()
	{
		$data['properti_lelang_unggulan'] = $this->agunan_model->properti_lelang_unggulan();
		$this->load->view('admin/properti_lelang_unggulan',$data);
	}

	function set_lelang_biasa_operator(){
	    $data = array(
	      'id' => $this->input->post('id'),
	      'kategori' => $this->input->post('kategori'),
	      );

	    $res = $this->agunan_model->update_agunan($data);
	    if($res=1){
	      header('location:'.base_url().'index.php/admin/properti_lelang');
	      $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Diedit
	    	</div>");
	    }
	}

	function properti_lelang_unggulan_operator_terjual()
	{
		$data['properti_lelang_unggulan_operator_terjual'] = $this->agunan_model->properti_lelang_unggulan_operator_terjual();
		$this->load->view('admin/properti_lelang_unggulan_operator_terjual',$data);
	}

	function edit_properti_lelang_operator($kode = 0){
	    $row = $this->agunan_model->edit_agunan("where tr_agunan.id  = '$kode'")->result_array();

	    $data = array(
	      'id' => $row[0]['id'],
	    );

	    $this->load->view('admin/edit_properti_lelang_operator', $data);
  	}

  	function update_properti_lelang_operator(){
	    $data = array(
	      'id' => $this->input->post('id'),
	      'status' => $this->input->post('status'),
	      );

	    $res = $this->agunan_model->update_agunan($data);
	    if($res=1){
	      header('location:'.base_url().'index.php/admin/properti_lelang');
	      $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Diedit
	    	</div>");
	    }
	}

	function edit_properti_jual_unggulan($kode = 0){
	    $row = $this->agunan_model->edit_agunan("where tr_agunan.id  = '$kode'")->result_array();

	    $data = array(
	      'id' => $row[0]['id'],
	    );

	    $this->load->view('admin/edit_properti_jual_unggulan', $data);
  	}

  	function update_properti_jual_unggulan(){
	    $data = array(
	      'id' => $this->input->post('id'),
	      'status' => $this->input->post('status'),
	      );

	    $res = $this->agunan_model->update_agunan($data);
	    if($res=1){
	      header('location:'.base_url().'index.php/admin/agunan_unggulan');
	      $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Diedit
	    	</div>");
	    }
	}

	function edit_properti_lelang_unggulan_operator($kode = 0){
	    $row = $this->agunan_model->edit_agunan("where tr_agunan.id  = '$kode'")->result_array();

	    $data = array(
	      'id' => $row[0]['id'],
	    );

	    $this->load->view('admin/edit_properti_lelang_unggulan_operator', $data);
  	}

  	function update_properti_lelang_unggulan_operator(){
	    $data = array(
	      'id' => $this->input->post('id'),
	      'status' => $this->input->post('status'),
	      );

	    $res = $this->agunan_model->update_agunan($data);
	    if($res=1){
	      header('location:'.base_url().'index.php/admin/properti_lelang_unggulan');
	      $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Diedit
	    	</div>");
	    }
	}

	function edit_properti_lelang_verifikator($kode = 0){
	    $row = $this->agunan_model->edit_agunan("where tr_agunan.id  = '$kode'")->result_array();

	    $data = array(
	      'id' => $row[0]['id'],
	    );

	    $this->load->view('admin/edit_properti_lelang_verifikator', $data);
  	}

  	function update_properti_lelang_verifikator(){
	    $data = array(
	      'id' => $this->input->post('id'),
	      'status' => $this->input->post('status'),
	      );

	    $res = $this->agunan_model->update_agunan($data);
	    if($res=1){
	      header('location:'.base_url().'index.php/admin/agunan_lelang');
	      $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Diedit
	    	</div>");
	    }
	}

	function edit_properti_lelang_unggulan_verifikator($kode = 0){
	    $row = $this->agunan_model->edit_agunan("where tr_agunan.id  = '$kode'")->result_array();

	    $data = array(
	      'id' => $row[0]['id'],
	    );

	    $this->load->view('admin/edit_properti_lelang_unggulan_verifikator', $data);
  	}

  	function update_properti_lelang_unggulan_verifikator(){
	    $data = array(
	      'id' => $this->input->post('id'),
	      'status' => $this->input->post('status'),
	      );

	    $res = $this->agunan_model->update_agunan($data);
	    if($res=1){
	      header('location:'.base_url().'index.php/admin/agunan_lelang_unggulan');
	      $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Diedit
	    	</div>");
	    }
	}

	function hapus_properti_lelang_operator($kode = 0){
	    $result = $this->agunan_model->hapus('tr_agunan',array('id' => $kode));
	    $result2 = $this->agunan_model->hapus('foto_bangunan',array('id_tr_agunan' => $kode));
	    $result3 = $this->agunan_model->hapus('foto_akses',array('id_tr_agunan' => $kode));
	    if($result == 1){
	    $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Dihapus
	    	</div>");
		}
		redirect('admin/properti_lelang');
	}

	function hapus_properti_lelang_unggulan_operator($kode = 0){
	    $result = $this->agunan_model->hapus('tr_agunan',array('id' => $kode));
	    $result2 = $this->agunan_model->hapus('foto_bangunan',array('id_tr_agunan' => $kode));
	    $result3 = $this->agunan_model->hapus('foto_akses',array('id_tr_agunan' => $kode));
	    if($result == 1){
	    $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Dihapus
	    	</div>");
		}
		redirect('admin/properti_lelang_unggulan');
	}

	function properti_lelang_operator_terjual()
	{
		$data['properti_lelang_operator_terjual'] = $this->agunan_model->properti_lelang_operator_terjual();
		$this->load->view('admin/properti_lelang_operator_terjual',$data);
	}

	function properti_lelang_verifikator_terjual()
	{
		$data['properti_lelang_verifikator_terjual'] = $this->agunan_model->properti_lelang_verifikator_terjual();
		$this->load->view('admin/properti_lelang_verifikator_terjual',$data);
	}

 }