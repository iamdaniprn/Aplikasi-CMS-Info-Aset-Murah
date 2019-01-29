<?php
defined('BASEPATH') OR EXIT('No direct script access allowed');

class Laporan extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->library('Pdf');
		$this->load->model('model_cetak');
	}
	
	public function index()
	{
		$this->load->view('login');
	}

	public function cetak_data_properti_jual(){
        $pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(280,7,'LAPORAN DATA PROPERTI JUAL',0,1,'C');
        $pdf->Image('assets/img/logo.png',10,10,40,10);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(280,7,'CV SOLUSI PRIMA',0,1,'C');
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(280,7,'Jl. Laguna Seca I No.257, Karang Pamulang, Mandalajati, Kota Bandung, Jawa Barat 40195',0,1,'C');

        //membuat garis
        $pdf->SetLineWidth(1);
		$pdf->Line(10,36,287,36);
		$pdf->SetLineWidth(0);
		$pdf->Line(10,37,287,37);

        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,10,'',0,1);
        $pdf->SetFont('Arial','B', 9);
        $pdf->SetFillColor(192,192,192);
        $pdf->Cell(20,6,'ID',1,0,'C');
        $pdf->Cell(28,6,'JENIS',1,0,'C');
        $pdf->Cell(35,6,'LOKASI',1,0,'C');
        $pdf->Cell(140,6,'ALAMAT',1,0,'C');
        $pdf->Cell(50,6,'PROVINSI',1,1,'C');
        
        $pdf->SetFont('Arial','', 8);
   		$mahasiswa = $this->db->query('SELECT tr_agunan.id, tr_agunan.jenis, tr_agunan.alamat, tr_agunan.lokasi, tr_agunan.status, provinsi.provinsi FROM tr_agunan
            JOIN provinsi ON tr_agunan.id_provinsi = provinsi.id
            WHERE tr_agunan.status_agunan = 1 AND tr_agunan.kategori != 1
            ORDER BY tr_agunan.id DESC');
   		foreach ($mahasiswa->result_array() as $row){
            $pdf->Cell(20,6,"PROP-".$row['id'],1,0);
            $pdf->Cell(28,6,$row['jenis'],1,0);
            $pdf->Cell(35,6,$row['lokasi'],1,0);
            $pdf->Cell(140,6,$row['alamat'],1,0);  
            $pdf->Cell(50,6,$row['provinsi'],1,1); 
        }
        $pdf->Output();
    }

    public function cetak_data_properti_jual_unggulan(){
        $pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(280,7,'LAPORAN DATA PROPERTI JUAL UNGGULAN',0,1,'C');
        $pdf->Image('assets/img/logo.png',10,10,40,10);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(280,7,'CV SOLUSI PRIMA',0,1,'C');
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(280,7,'Jl. Laguna Seca I No.257, Karang Pamulang, Mandalajati, Kota Bandung, Jawa Barat 40195',0,1,'C');

        //membuat garis
        $pdf->SetLineWidth(1);
        $pdf->Line(10,36,287,36);
        $pdf->SetLineWidth(0);
        $pdf->Line(10,37,287,37);

        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,10,'',0,1);
        $pdf->SetFont('Arial','B', 9);
        $pdf->SetFillColor(192,192,192);
        $pdf->Cell(20,6,'ID',1,0,'C');
        $pdf->Cell(28,6,'JENIS',1,0,'C');
        $pdf->Cell(35,6,'LOKASI',1,0,'C');
        $pdf->Cell(140,6,'ALAMAT',1,0,'C');
        $pdf->Cell(50,6,'PROVINSI',1,1,'C');
        
        $pdf->SetFont('Arial','', 8);
        $mahasiswa = $this->db->query('SELECT tr_agunan.id, tr_agunan.jenis, tr_agunan.alamat, tr_agunan.lokasi, tr_agunan.status, provinsi.provinsi FROM tr_agunan
            JOIN provinsi ON tr_agunan.id_provinsi = provinsi.id
            WHERE tr_agunan.status_agunan = 1 AND tr_agunan.kategori = 1
            ORDER BY tr_agunan.id DESC');
        foreach ($mahasiswa->result_array() as $row){
            $pdf->Cell(20,6,"PROP-".$row['id'],1,0);
            $pdf->Cell(28,6,$row['jenis'],1,0);
            $pdf->Cell(35,6,$row['lokasi'],1,0);
            $pdf->Cell(140,6,$row['alamat'],1,0);  
            $pdf->Cell(50,6,$row['provinsi'],1,1); 
        }
        $pdf->Output();
    }


    public function cetak_data_properti_lelang(){
        $pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(280,7,'LAPORAN DATA PROPERTI LELANG (verifikator)',0,1,'C');
        $pdf->Image('assets/img/logo.png',10,10,40,10);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(280,7,'CV SOLUSI PRIMA',0,1,'C');
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(280,7,'Jl. Laguna Seca I No.257, Karang Pamulang, Mandalajati, Kota Bandung, Jawa Barat 40195',0,1,'C');

        //membuat garis
        $pdf->SetLineWidth(1);
        $pdf->Line(10,36,287,36);
        $pdf->SetLineWidth(0);
        $pdf->Line(10,37,287,37);

        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,10,'',0,1);
        $pdf->SetFont('Arial','B', 9);
        $pdf->SetFillColor(192,192,192);
        $pdf->Cell(20,6,'ID',1,0,'C');
        $pdf->Cell(28,6,'JENIS',1,0,'C');
        $pdf->Cell(35,6,'LOKASI',1,0,'C');
        $pdf->Cell(100,6,'ALAMAT',1,0,'C');
        $pdf->Cell(50,6,'PROVINSI',1,0,'C');
        $pdf->Cell(40,6,'VERIFIKATOR',1,1,'C');
        
        $pdf->SetFont('Arial','', 8);
        $mahasiswa = $this->db->query('SELECT tr_agunan.id, tr_agunan.jenis, tr_agunan.alamat, tr_agunan.lokasi, tr_agunan.status, tr_agunan.status_agunan, provinsi.provinsi, m_employee.name as nama_pegawai FROM tr_agunan
            JOIN provinsi ON tr_agunan.id_provinsi = provinsi.id
            JOIN data_klaim ON tr_agunan.id_klaim = data_klaim.id
            JOIN tr_penempatan ON (tr_penempatan.id_bank = data_klaim.bank AND data_klaim.cabang = tr_penempatan.id_cabang)
            JOIN m_employee ON m_employee.reg_employee = tr_penempatan.reg_employee
            LEFT JOIN tr_ots ON tr_agunan.id_klaim = tr_ots.id_klaim
            LEFT JOIN tr_ots_p ON tr_ots.id = tr_ots_p.id_tr_ots
            
            WHERE 
            tr_agunan.status_agunan != 1 AND
            tr_agunan.kategori != 1 AND
            tr_ots_p.j_komitmen = 3 AND
            tr_ots_p.sumber = 3
            
            ORDER BY tr_agunan.id DESC');
        foreach ($mahasiswa->result_array() as $row){
            $pdf->Cell(20,6,"PROP-".$row['id'],1,0);
            $pdf->Cell(28,6,$row['jenis'],1,0);
            $pdf->Cell(35,6,$row['lokasi'],1,0);
            $pdf->Cell(100,6,$row['alamat'],1,0);  
            $pdf->Cell(50,6,$row['provinsi'],1,0); 
            $pdf->Cell(40,6,$row['nama_pegawai'],1,1); 
        }
        $pdf->Output();
    }

    public function cetak_data_properti_lelang_unggulan(){
        $pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(280,7,'LAPORAN DATA PROPERTI LELANG UNGGULAN (verifikator)',0,1,'C');
        $pdf->Image('assets/img/logo.png',10,10,40,10);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(280,7,'CV SOLUSI PRIMA',0,1,'C');
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(280,7,'Jl. Laguna Seca I No.257, Karang Pamulang, Mandalajati, Kota Bandung, Jawa Barat 40195',0,1,'C');

        //membuat garis
        $pdf->SetLineWidth(1);
        $pdf->Line(10,36,287,36);
        $pdf->SetLineWidth(0);
        $pdf->Line(10,37,287,37);

        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,10,'',0,1);
        $pdf->SetFont('Arial','B', 9);
        $pdf->SetFillColor(192,192,192);
        $pdf->Cell(20,6,'ID',1,0,'C');
        $pdf->Cell(28,6,'JENIS',1,0,'C');
        $pdf->Cell(35,6,'LOKASI',1,0,'C');
        $pdf->Cell(100,6,'ALAMAT',1,0,'C');
        $pdf->Cell(50,6,'PROVINSI',1,0,'C');
        $pdf->Cell(40,6,'VERIFIKATOR',1,1,'C');
        
        $pdf->SetFont('Arial','', 8);
        $mahasiswa = $this->db->query('SELECT tr_agunan.id, tr_agunan.jenis, tr_agunan.alamat, tr_agunan.lokasi, tr_agunan.status, tr_agunan.status_agunan, provinsi.provinsi, m_employee.name as nama_pegawai FROM tr_agunan
            JOIN provinsi ON tr_agunan.id_provinsi = provinsi.id
            JOIN data_klaim ON tr_agunan.id_klaim = data_klaim.id
            JOIN tr_penempatan ON (tr_penempatan.id_bank = data_klaim.bank AND data_klaim.cabang = tr_penempatan.id_cabang)
            JOIN m_employee ON m_employee.reg_employee = tr_penempatan.reg_employee
            LEFT JOIN tr_ots ON tr_agunan.id_klaim = tr_ots.id_klaim
            LEFT JOIN tr_ots_p ON tr_ots.id = tr_ots_p.id_tr_ots
            
            WHERE 
            tr_agunan.status_agunan != 1 AND
            tr_agunan.kategori = 1 AND
            tr_ots_p.j_komitmen = 3 AND
            tr_ots_p.sumber = 3
            
            ORDER BY tr_agunan.id DESC');
        foreach ($mahasiswa->result_array() as $row){
            $pdf->Cell(20,6,"PROP-".$row['id'],1,0);
            $pdf->Cell(28,6,$row['jenis'],1,0);
            $pdf->Cell(35,6,$row['lokasi'],1,0);
            $pdf->Cell(100,6,$row['alamat'],1,0);  
            $pdf->Cell(50,6,$row['provinsi'],1,0); 
            $pdf->Cell(40,6,$row['nama_pegawai'],1,1); 
        }
        $pdf->Output();
    }

    public function cetak_data_properti_terjual(){
        $pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(280,7,'LAPORAN DATA PROPERTI JUAL TERJUAL',0,1,'C');
        $pdf->Image('assets/img/logo.png',10,10,40,10);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(280,7,'CV SOLUSI PRIMA',0,1,'C');
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(280,7,'Jl. Laguna Seca I No.257, Karang Pamulang, Mandalajati, Kota Bandung, Jawa Barat 40195',0,1,'C');

        //membuat garis
        $pdf->SetLineWidth(1);
		$pdf->Line(10,36,287,36);
		$pdf->SetLineWidth(0);
		$pdf->Line(10,37,287,37);

       // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,10,'',0,1);
        $pdf->SetFont('Arial','B', 9);
        $pdf->SetFillColor(192,192,192);
        $pdf->Cell(20,6,'ID',1,0,'C');
        $pdf->Cell(28,6,'JENIS',1,0,'C');
        $pdf->Cell(35,6,'LOKASI',1,0,'C');
        $pdf->Cell(140,6,'ALAMAT',1,0,'C');
        $pdf->Cell(50,6,'PROVINSI',1,1,'C');
        
        $pdf->SetFont('Arial','', 8);
        $mahasiswa = $this->db->query('SELECT tr_agunan.id, tr_agunan.jenis, tr_agunan.alamat, tr_agunan.lokasi, tr_agunan.status, provinsi.provinsi FROM tr_agunan 
            JOIN provinsi ON tr_agunan.id_provinsi = provinsi.id
            where tr_agunan.status_agunan = 1 AND tr_agunan.status = 1
            ORDER BY tr_agunan.id DESC');
        foreach ($mahasiswa->result_array() as $row){
            $pdf->Cell(20,6,"PROP-".$row['id'],1,0);
            $pdf->Cell(28,6,$row['jenis'],1,0);
            $pdf->Cell(35,6,$row['lokasi'],1,0);
            $pdf->Cell(140,6,$row['alamat'],1,0);  
            $pdf->Cell(50,6,$row['provinsi'],1,1); 
        }
        $pdf->Output();
    }

    public function cetak_data_properti_lelang_terjual(){
        $pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(280,7,'LAPORAN DATA PROPERTI LELANG TERJUAL',0,1,'C');
        $pdf->Image('assets/img/logo.png',10,10,40,10);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(280,7,'CV SOLUSI PRIMA',0,1,'C');
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(280,7,'Jl. Laguna Seca I No.257, Karang Pamulang, Mandalajati, Kota Bandung, Jawa Barat 40195',0,1,'C');

        //membuat garis
        $pdf->SetLineWidth(1);
        $pdf->Line(10,36,287,36);
        $pdf->SetLineWidth(0);
        $pdf->Line(10,37,287,37);

        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,10,'',0,1);
        $pdf->SetFont('Arial','B', 9);
        $pdf->SetFillColor(192,192,192);
        $pdf->Cell(20,6,'ID',1,0,'C');
        $pdf->Cell(28,6,'JENIS',1,0,'C');
        $pdf->Cell(35,6,'LOKASI',1,0,'C');
        $pdf->Cell(100,6,'ALAMAT',1,0,'C');
        $pdf->Cell(50,6,'PROVINSI',1,0,'C');
        $pdf->Cell(40,6,'VERIFIKATOR',1,1,'C');
        
        $pdf->SetFont('Arial','', 8);
        $mahasiswa = $this->db->query('SELECT tr_agunan.id, tr_agunan.jenis, tr_agunan.alamat, tr_agunan.lokasi, tr_agunan.status, tr_agunan.status_agunan, provinsi.provinsi, m_employee.name as nama_pegawai FROM tr_agunan
            JOIN provinsi ON tr_agunan.id_provinsi = provinsi.id
            JOIN data_klaim ON tr_agunan.id_klaim = data_klaim.id
            JOIN tr_penempatan ON (tr_penempatan.id_bank = data_klaim.bank AND data_klaim.cabang = tr_penempatan.id_cabang)
            JOIN m_employee ON m_employee.reg_employee = tr_penempatan.reg_employee
            LEFT JOIN tr_ots ON tr_agunan.id_klaim = tr_ots.id_klaim
            LEFT JOIN tr_ots_p ON tr_ots.id = tr_ots_p.id_tr_ots
            
            WHERE 
            tr_agunan.status_agunan != 1 AND
            tr_agunan.kategori != 1 AND
            tr_ots_p.j_komitmen = 3 AND
            tr_ots_p.sumber = 3 AND
            tr_agunan.status = 1
            
            ORDER BY tr_agunan.id DESC');
        foreach ($mahasiswa->result_array() as $row){
            $pdf->Cell(20,6,"PROP-".$row['id'],1,0);
            $pdf->Cell(28,6,$row['jenis'],1,0);
            $pdf->Cell(35,6,$row['lokasi'],1,0);
            $pdf->Cell(100,6,$row['alamat'],1,0);  
            $pdf->Cell(50,6,$row['provinsi'],1,0); 
            $pdf->Cell(40,6,$row['nama_pegawai'],1,1); 
        }
        $pdf->Output();
    }

    public function cetak_deskripsi($kode = 0){
         
        $dpthasil = $this->model_cetak->detail_foto_bangunan("WHERE tr_agunan.id = '$kode' AND foto_bangunan.status = 1 ORDER BY foto_bangunan.status DESC");
        if ($dpthasil)
        {
            $data['detail_foto_bangunan'] = $dpthasil;
        }

        $dpthasil2 = $this->model_cetak->detail_foto_akses("WHERE tr_agunan.id = '$kode' AND foto_akses.status = 1 ORDER BY foto_akses.status DESC");
        if ($dpthasil)
        {
            $data['detail_foto_akses'] = $dpthasil2;
        }

        $cari = $this->model_cetak->detail_data_agunan("WHERE tr_agunan.id = '$kode'");
        if ($cari)
        {
            $data['detail_agunan'] = $cari;
        }

        $this->load->view('admin/detail_cetak_agunan', $data);
    }

    public function cetak_brosur($kode = 0){
         
        $dpthasil = $this->model_cetak->detail_foto_bangunan("WHERE tr_agunan.id = '$kode' AND foto_bangunan.status = 1 ORDER BY foto_bangunan.status DESC");
        if ($dpthasil)
        {
            $data['detail_foto_bangunan'] = $dpthasil;
        }

        $dpthasil2 = $this->model_cetak->detail_foto_akses("WHERE tr_agunan.id = '$kode' AND foto_akses.status = 1 ORDER BY foto_akses.status DESC");
        if ($dpthasil)
        {
            $data['detail_foto_akses'] = $dpthasil2;
        }

        $cari = $this->model_cetak->detail_data_agunan("WHERE tr_agunan.id = '$kode'");
        if ($cari)
        {
            $data['detail_agunan'] = $cari;
        }

        $this->load->view('admin/cetak_brosur', $data);
    }

    public function cetak_brosur_lelang($kode = 0){
         
        $dpthasil = $this->model_cetak->detail_foto_bangunan("WHERE tr_agunan.id = '$kode' AND foto_bangunan.status = 1 ORDER BY foto_bangunan.status DESC");
        if ($dpthasil)
        {
            $data['detail_foto_bangunan'] = $dpthasil;
        }

        $dpthasil2 = $this->model_cetak->detail_foto_akses("WHERE tr_agunan.id = '$kode' AND foto_akses.status = 1 ORDER BY foto_akses.status DESC");
        if ($dpthasil)
        {
            $data['detail_foto_akses'] = $dpthasil2;
        }

        $cari = $this->model_cetak->detail_data_agunan_lelang("WHERE tr_agunan.id = '$kode'");
        if ($cari)
        {
            $data['detail_agunan'] = $cari;
        }

        $this->load->view('admin/cetak_brosur_lelang', $data);
    }

    public function cetak_properti_lelang_unggulan(){
        $pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(280,7,'LAPORAN DATA PROPERTI LELANG UNGGULAN (operator)',0,1,'C');
        $pdf->Image('assets/img/logo.png',10,10,40,10);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(280,7,'CV SOLUSI PRIMA',0,1,'C');
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(280,7,'Jl. Laguna Seca I No.257, Karang Pamulang, Mandalajati, Kota Bandung, Jawa Barat 40195',0,1,'C');

        //membuat garis
        $pdf->SetLineWidth(1);
        $pdf->Line(10,36,287,36);
        $pdf->SetLineWidth(0);
        $pdf->Line(10,37,287,37);

        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,10,'',0,1);
        $pdf->SetFont('Arial','B', 9);
        $pdf->SetFillColor(192,192,192);
        $pdf->Cell(20,6,'ID',1,0,'C');
        $pdf->Cell(28,6,'JENIS',1,0,'C');
        $pdf->Cell(35,6,'LOKASI',1,0,'C');
        $pdf->Cell(140,6,'ALAMAT',1,0,'C');
        $pdf->Cell(50,6,'PROVINSI',1,1,'C');
        
        $pdf->SetFont('Arial','', 8);
        $mahasiswa = $this->db->query('SELECT tr_agunan.id, tr_agunan.jenis, tr_agunan.alamat, tr_agunan.lokasi, tr_agunan.status, provinsi.provinsi FROM tr_agunan
            JOIN provinsi ON tr_agunan.id_provinsi = provinsi.id
            WHERE tr_agunan.status_agunan = 3 AND tr_agunan.kategori = 1
            ORDER BY tr_agunan.id DESC');
        foreach ($mahasiswa->result_array() as $row){
            $pdf->Cell(20,6,"PROP-".$row['id'],1,0);
            $pdf->Cell(28,6,$row['jenis'],1,0);
            $pdf->Cell(35,6,$row['lokasi'],1,0);
            $pdf->Cell(140,6,$row['alamat'],1,0);  
            $pdf->Cell(50,6,$row['provinsi'],1,1); 
        }
        $pdf->Output();
    }

    public function cetak_properti_lelang(){
        $pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(280,7,'LAPORAN DATA PROPERTI LELANG (operator)',0,1,'C');
        $pdf->Image('assets/img/logo.png',10,10,40,10);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(280,7,'CV SOLUSI PRIMA',0,1,'C');
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(280,7,'Jl. Laguna Seca I No.257, Karang Pamulang, Mandalajati, Kota Bandung, Jawa Barat 40195',0,1,'C');

        //membuat garis
        $pdf->SetLineWidth(1);
        $pdf->Line(10,36,287,36);
        $pdf->SetLineWidth(0);
        $pdf->Line(10,37,287,37);

        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,10,'',0,1);
        $pdf->SetFont('Arial','B', 9);
        $pdf->SetFillColor(192,192,192);
        $pdf->Cell(20,6,'ID',1,0,'C');
        $pdf->Cell(28,6,'JENIS',1,0,'C');
        $pdf->Cell(35,6,'LOKASI',1,0,'C');
        $pdf->Cell(140,6,'ALAMAT',1,0,'C');
        $pdf->Cell(50,6,'PROVINSI',1,1,'C');
        
        $pdf->SetFont('Arial','', 8);
        $mahasiswa = $this->db->query('SELECT tr_agunan.id, tr_agunan.jenis, tr_agunan.alamat, tr_agunan.lokasi, tr_agunan.status, provinsi.provinsi FROM tr_agunan
            JOIN provinsi ON tr_agunan.id_provinsi = provinsi.id
            WHERE tr_agunan.status_agunan = 3 AND tr_agunan.kategori = 0
            ORDER BY tr_agunan.id DESC');
        foreach ($mahasiswa->result_array() as $row){
            $pdf->Cell(20,6,"PROP-".$row['id'],1,0);
            $pdf->Cell(28,6,$row['jenis'],1,0);
            $pdf->Cell(35,6,$row['lokasi'],1,0);
            $pdf->Cell(140,6,$row['alamat'],1,0);  
            $pdf->Cell(50,6,$row['provinsi'],1,1); 
        }
        $pdf->Output();
    }

    public function cetak_properti_lelang_terjual_operator(){
        $pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(280,7,'LAPORAN DATA PROPERTI LELANG TERJUAL (operator)',0,1,'C');
        $pdf->Image('assets/img/logo.png',10,10,40,10);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(280,7,'CV SOLUSI PRIMA',0,1,'C');
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(280,7,'Jl. Laguna Seca I No.257, Karang Pamulang, Mandalajati, Kota Bandung, Jawa Barat 40195',0,1,'C');

        //membuat garis
        $pdf->SetLineWidth(1);
        $pdf->Line(10,36,287,36);
        $pdf->SetLineWidth(0);
        $pdf->Line(10,37,287,37);

        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,10,'',0,1);
        $pdf->SetFont('Arial','B', 9);
        $pdf->SetFillColor(192,192,192);
        $pdf->Cell(20,6,'ID',1,0,'C');
        $pdf->Cell(28,6,'JENIS',1,0,'C');
        $pdf->Cell(35,6,'LOKASI',1,0,'C');
        $pdf->Cell(140,6,'ALAMAT',1,0,'C');
        $pdf->Cell(50,6,'PROVINSI',1,1,'C');
        
        $pdf->SetFont('Arial','', 8);
        $mahasiswa = $this->db->query('SELECT tr_agunan.id, tr_agunan.jenis, tr_agunan.alamat, tr_agunan.lokasi, tr_agunan.status, tr_agunan.kategori, provinsi.provinsi FROM tr_agunan
            JOIN provinsi ON tr_agunan.id_provinsi = provinsi.id
            WHERE 
            tr_agunan.status_agunan = 3 AND 
            tr_agunan.kategori = 1 AND  
            tr_agunan.status = 1
            ORDER BY tr_agunan.id DESC');
        foreach ($mahasiswa->result_array() as $row){
            $pdf->Cell(20,6,"PROP-".$row['id'],1,0);
            $pdf->Cell(28,6,$row['jenis'],1,0);
            $pdf->Cell(35,6,$row['lokasi'],1,0);
            $pdf->Cell(140,6,$row['alamat'],1,0);  
            $pdf->Cell(50,6,$row['provinsi'],1,1); 
        }
        $pdf->Output();
    }

    public function cetak_properti_lelang_terjual_verifikator(){
        $pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(280,7,'LAPORAN DATA PROPERTI LELANG TERJUAL (verifikator)',0,1,'C');
        $pdf->Image('assets/img/logo.png',10,10,40,10);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(280,7,'CV SOLUSI PRIMA',0,1,'C');
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(280,7,'Jl. Laguna Seca I No.257, Karang Pamulang, Mandalajati, Kota Bandung, Jawa Barat 40195',0,1,'C');

        //membuat garis
        $pdf->SetLineWidth(1);
        $pdf->Line(10,36,287,36);
        $pdf->SetLineWidth(0);
        $pdf->Line(10,37,287,37);

        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,10,'',0,1);
        $pdf->SetFont('Arial','B', 9);
        $pdf->SetFillColor(192,192,192);
        $pdf->Cell(20,6,'ID',1,0,'C');
        $pdf->Cell(28,6,'JENIS',1,0,'C');
        $pdf->Cell(35,6,'LOKASI',1,0,'C');
        $pdf->Cell(140,6,'ALAMAT',1,0,'C');
        $pdf->Cell(50,6,'PROVINSI',1,1,'C');
        
        $pdf->SetFont('Arial','', 8);
        $mahasiswa = $this->db->query('SELECT tr_agunan.id, tr_agunan.jenis, tr_agunan.alamat, tr_agunan.lokasi, tr_agunan.status, tr_agunan.status_agunan, provinsi.provinsi, m_employee.name as nama_pegawai FROM tr_agunan
            JOIN provinsi ON tr_agunan.id_provinsi = provinsi.id
            JOIN data_klaim ON tr_agunan.id_klaim = data_klaim.id
            JOIN tr_penempatan ON (tr_penempatan.id_bank = data_klaim.bank AND data_klaim.cabang = tr_penempatan.id_cabang)
            JOIN m_employee ON m_employee.reg_employee = tr_penempatan.reg_employee
            LEFT JOIN tr_ots ON tr_agunan.id_klaim = tr_ots.id_klaim
            LEFT JOIN tr_ots_p ON tr_ots.id = tr_ots_p.id_tr_ots
            
            WHERE 
            tr_agunan.status_agunan != 1 AND
            tr_ots_p.j_komitmen = 3 AND
            tr_ots_p.sumber = 3 AND
            tr_agunan.status = 1
            ORDER BY tr_agunan.id DESC');
        foreach ($mahasiswa->result_array() as $row){
            $pdf->Cell(20,6,"PROP-".$row['id'],1,0);
            $pdf->Cell(28,6,$row['jenis'],1,0);
            $pdf->Cell(35,6,$row['lokasi'],1,0);
            $pdf->Cell(140,6,$row['alamat'],1,0);  
            $pdf->Cell(50,6,$row['provinsi'],1,1); 
        }
        $pdf->Output();
    }

}