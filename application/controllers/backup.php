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
	
	function index()
	{
		$this->load->view('admin/beranda.php');
	}
	
	function daftarproduk()
	{
		$data['produk'] = $this->produk_model->daftar_produk();
		$this->load->view('admin/daftarproduk',$data);
	}
	
	function tambahproduk()
	{
		$this->load->view('admin/tambah_barang');
	}
	
	function proses_tambah_produk()
	{
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'jpg|png|jpeg';
		$config['max_size']             = 10000;
		$config['max_width']            = 5000;
		$config['max_height']           = 5000;

		$this->load->library('upload', $config);
		
		if (!$this->upload->do_upload())
		{
			redirect('admin/tambahproduk');
		}
		else
		{
			$gambar = $this->upload->data();
			
			$data['kategori'] = $this->input->post('kategori',true);
			$data['brand'] = $this->input->post('brand',true);
			$data['model'] = $this->input->post('model',true);
			$data['dimensi'] = $this->input->post('dimensi',true);
			$data['keterangan'] = $this->input->post('keterangan',true);
			$data['harga'] = $this->input->post('harga',true);
			$data['gambar'] = $gambar['file_name'];
		
			$this->produk_model->tambah_produk($data);
			redirect('admin/daftarproduk');
		}
	}
	
	function editproduk($id)
	{
		$data['produk'] = $this->produk_model->select_by_id($id);
		$this->load->view('admin/edit_barang',$data);
	}
	
	function proseseditproduk()
	{
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'jpg|png|jpeg';
		$config['max_size']             = 10000;
		$config['max_width']            = 5000;
		$config['max_height']           = 5000;

		$this->load->library('upload', $config);
		
		if (!$this->upload->do_upload())
		{
			$id = $this->input->post('id');
			redirect('admin/editproduk/'.$id);
		}
		else
		{
			$gambar = $this->upload->data();
			
			$data['kategori'] = $this->input->post('kategori',true);
			$data['brand'] = $this->input->post('brand',true);
			$data['model'] = $this->input->post('model',true);
			$data['dimensi'] = $this->input->post('dimensi',true);
			$data['keterangan'] = $this->input->post('keterangan',true);
			$data['harga'] = $this->input->post('harga',true);
			$data['gambar'] = $gambar['file_name'];
			
			$id=$this->input->post('id');
		
			$this->produk_model->edit_produk($id,$data);
			redirect('admin/daftarproduk');
		}
	}
	
	function hapusproduk($id)
	{
		$this->produk_model->delete_produk($id);
		redirect('admin/daftarproduk');
	}
	
	function invoices()
	{
		$data['invoices'] = $this->produk_model->all_invoices();
		$this->load->view('admin/daftarinvoices',$data);
	}
	
	function detailinvoices($id_invoices)
	{
		$data['invoices'] = $this->produk_model->detailinvoices($id_invoices);
		$this->load->view('admin/detailinvoices',$data);
	}
	
	function konfirmasi()
	{
		$data['konfirmasi'] = $this->produk_model->all_konfirmasi();
		$this->load->view('admin/daftarkonfirmasi',$data);
	}
	
	function detailkonfirmasi($invoice_id)
	{
		$data['konfirmasi'] = $this->produk_model->detail_konfirmasi($invoice_id);
		$this->load->view('admin/detail_konfirmasi',$data);
	}
	
	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
	
	function download($nama)
	{
		$name = $nama;
		$data = file_get_contents('uploads/konfirmasi/'.$nama);
		force_download($name, $data);
	}

	function data_agunan()
	{
		$data['data_agunan'] = $this->agunan_model->data_agunan();
		$this->load->view('admin/data_agunan',$data);
	}

	function edit_agunan($kode = 0){
	    $row = $this->agunan_model->edit_agunan("where tr_agunan.id  = '$kode'")->result_array();

	    $data = array(
	      'id' => $row[0]['id'],
	    );

	    $this->load->view('admin/edit_agunan', $data);
  	}

  	function update_agunan(){
	    $data = array(
	      'id' => $this->input->post('id'),
	      'status' => $this->input->post('status'),
	      );

	    $res = $this->agunan_model->update_agunan($data);
	    if($res=1){
	      header('location:'.base_url().'index.php/admin/data_agunan');
	      $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Diedit
	    	</div>");
	    }
	}
}