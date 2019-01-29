<?php
defined('BASEPATH') OR EXIT('No direct access allowed');

class Agunan_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function get_grafik()
	{
		$data = $this->db->query("SELECT jenis, count(*) as jumlah from tr_agunan group by jenis");
		return $data->result();
	}
	

	function agunan_jual()
	{
		$data = $this->db->query('SELECT tr_agunan.id, tr_agunan.jenis, tr_agunan.alamat, tr_agunan.lokasi, tr_agunan.status, tr_agunan.kategori, provinsi.provinsi FROM tr_agunan
			JOIN provinsi ON tr_agunan.id_provinsi = provinsi.id
			WHERE tr_agunan.status_agunan = 1 AND tr_agunan.kategori != 1
			ORDER BY tr_agunan.id DESC')->result();
	    return $data;
	}

	function agunan_lelang()
	{
		$data = $this->db->query('SELECT tr_agunan.id, tr_agunan.jenis, tr_agunan.alamat, tr_agunan.lokasi, tr_agunan.status, tr_agunan.status_agunan, provinsi.provinsi, m_employee.name as nama_pegawai FROM tr_agunan
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
			
			ORDER BY tr_agunan.id DESC')->result();
	    return $data;
	}

	function agunan_unggulan()
	{
		$data = $this->db->query('SELECT tr_agunan.id, tr_agunan.jenis, tr_agunan.alamat, tr_agunan.lokasi, tr_agunan.status, provinsi.provinsi FROM tr_agunan
			JOIN provinsi ON tr_agunan.id_provinsi = provinsi.id
			WHERE tr_agunan.status_agunan = 1 AND
			tr_agunan.kategori = 1
			ORDER BY tr_agunan.id DESC')->result();
	    return $data;
	}

	function agunan_lelang_unggulan()
	{
		$data = $this->db->query('SELECT tr_agunan.id, tr_agunan.jenis, tr_agunan.alamat, tr_agunan.lokasi, tr_agunan.status, tr_agunan.status_agunan, provinsi.provinsi, m_employee.name as nama_pegawai FROM tr_agunan
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
			
			ORDER BY tr_agunan.id DESC')->result();
	    return $data;
	}

	function edit_agunan($where= "") {
		$data = $this->db->query('SELECT id FROM tr_agunan '.$where);
		return $data;
	}

	function update_agunan($data){
        $this->db->where('id',$data['id']);
        $this->db->update('tr_agunan',$data);
    }

    function data_agunan_terjual()
	{
		$data = $this->db->query('SELECT tr_agunan.id, tr_agunan.jenis, tr_agunan.alamat, tr_agunan.lokasi, tr_agunan.status, tr_agunan.kategori, provinsi.provinsi FROM tr_agunan
			JOIN provinsi ON tr_agunan.id_provinsi = provinsi.id
			WHERE 
			tr_agunan.status_agunan = 1 AND 
			-- tr_agunan.kategori != 1 AND  
			tr_agunan.status = 1
			ORDER BY tr_agunan.id DESC')->result();
	    return $data;
	}

	function data_agunan_lelang_terjual()
	{
		$data = $this->db->query('SELECT tr_agunan.id, tr_agunan.jenis, tr_agunan.alamat, tr_agunan.lokasi, tr_agunan.status, tr_agunan.status_agunan, provinsi.provinsi, m_employee.name as nama_pegawai FROM tr_agunan
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
			ORDER BY tr_agunan.id DESC')->result();
	    return $data;
	}

	function detail_agunan($where= "") {
		$data = $this->db->query('SELECT tr_agunan."id" AS id_agunan, tr_agunan.*, provinsi.provinsi, m_kabupaten.id as id_kabupaten, m_kabupaten.kabupaten FROM tr_agunan 
			JOIN provinsi ON tr_agunan.id_provinsi = provinsi.id
			JOIN m_kabupaten ON tr_agunan.id_kabupaten = m_kabupaten.id '.$where);
		return $data;
	}

	function detail_agunan_lelang($where= "") {
		$data = $this->db->query('SELECT tr_agunan."id" AS id_agunan, tr_agunan.*, provinsi.provinsi, m_kabupaten.id as id_kabupaten, m_kabupaten.kabupaten, m_employee.name as nama_pegawai, m_employee.phone as no_telp FROM tr_agunan
			JOIN provinsi ON tr_agunan.id_provinsi = provinsi.id
			JOIN m_kabupaten ON tr_agunan.id_kabupaten = m_kabupaten.id
			JOIN data_klaim ON tr_agunan.id_klaim = data_klaim.id
			JOIN tr_penempatan ON (tr_penempatan.id_bank = data_klaim.bank AND data_klaim.cabang = tr_penempatan.id_cabang)
			JOIN m_employee ON m_employee.reg_employee = tr_penempatan.reg_employee
			LEFT JOIN tr_ots ON tr_agunan.id_klaim = tr_ots.id_klaim
			LEFT JOIN tr_ots_p ON tr_ots.id = tr_ots_p.id_tr_ots '.$where);
		return $data;
	}

	function simpan($table, $data){
		return $this->db->insert($table, $data);
	}

	// function foto_agunan()
	// {
	// 	$this->db->select('tr_agunan.id, tr_agunan.jenis, foto_bangunan.foto');
	// 	$this->db->from('tr_agunan');
	// 	$this->db->join('foto_bangunan', 'tr_agunan.id = foto_bangunan.id_tr_agunan');
	// 	$this->db->order_by('tr_agunan.id', 'ASC');
	// 	$query = $this->db->get()->result();
	//     return $query;
	// }

	function foto_agunan($where= "") {
		$data = $this->db->query('SELECT tr_agunan.id, tr_agunan.jenis, foto_bangunan.id as id_foto_bangunan, foto_bangunan.foto, foto_bangunan.status FROM tr_agunan JOIN foto_bangunan ON tr_agunan.id = foto_bangunan.id_tr_agunan '.$where);
		return $data;
	}

	function data_id_agunan($where= "") {
		$data = $this->db->query('SELECT tr_agunan.id FROM tr_agunan '.$where);
		return $data;
	}

	function foto_akses($where= "") {
		$data = $this->db->query('SELECT tr_agunan.id, tr_agunan.jenis, foto_akses.id AS id_foto_akses, foto_akses.id as id_foto_akses, foto_akses.status, foto_akses.foto FROM tr_agunan JOIN foto_akses ON tr_agunan.id = foto_akses.id_tr_agunan '.$where);
		return $data;
	}

	function id_foto_akses($where= "") {
		$data = $this->db->query('SELECT tr_agunan.id, tr_agunan.jenis, foto_akses.id AS id_foto_akses, foto_akses.status, foto_akses.foto FROM tr_agunan JOIN foto_akses ON tr_agunan.id = foto_akses.id_tr_agunan '.$where);
		return $data;
	}

	function update_gambar_akses($data){
        $this->db->where('id',$data['id']);
        $this->db->update('foto_akses',$data);
    }	

    function data_deskripsi($where= "") {
		$data = $this->db->query('SELECT tr_agunan."id" AS id_agunan, tr_agunan.*, (tr_agunan.l_tanah*tr_agunan.h_tanah) AS harga_tanah, (tr_agunan.l_bangunan*tr_agunan.h_bangunan) AS harga_bangunan, provinsi.id as id_provinsi, provinsi.provinsi, m_kabupaten.id as id_kabupaten, m_kabupaten.kabupaten FROM tr_agunan 
			JOIN provinsi ON tr_agunan.id_provinsi = provinsi.id
			JOIN m_kabupaten ON tr_agunan.id_kabupaten = m_kabupaten.id  '.$where);
		return $data;
	}

	function data_deskripsi_lelang($where= "") {
		$data = $this->db->query('SELECT tr_agunan."id" AS id_agunan, tr_agunan.*, (tr_agunan.l_tanah*tr_agunan.h_tanah) AS harga_tanah, (tr_agunan.l_bangunan*tr_agunan.h_bangunan) AS harga_bangunan, provinsi.id as id_provinsi, provinsi.provinsi, m_kabupaten.id as id_kabupaten, m_kabupaten.kabupaten, m_employee.name as nama_pegawai, m_employee.phone as phone FROM tr_agunan 
			JOIN provinsi ON tr_agunan.id_provinsi = provinsi.id
			JOIN m_kabupaten ON tr_agunan.id_kabupaten = m_kabupaten.id 
			
			JOIN data_klaim ON tr_agunan.id_klaim = data_klaim.id
			JOIN tr_penempatan ON (tr_penempatan.id_bank = data_klaim.bank AND data_klaim.cabang = tr_penempatan.id_cabang)
			JOIN m_employee ON m_employee.reg_employee = tr_penempatan.reg_employee
			LEFT JOIN tr_ots ON tr_agunan.id_klaim = tr_ots.id_klaim
			LEFT JOIN tr_ots_p ON tr_ots.id = tr_ots_p.id_tr_ots '.$where);
		return $data;
	}

	function update_deskripsi($data){
        $this->db->where('id',$data['id']);
        $this->db->update('tr_agunan',$data);
    }	

    function update_provinsi($data){
        $this->db->where('id_agunan',$data['id_agunan']);
        $this->db->update('provinsi',$data);
    }	

    function id_foto_bangunan($where= "") {
		$data = $this->db->query('SELECT tr_agunan.id, tr_agunan.jenis, foto_bangunan.id AS id_foto_bangunan, foto_bangunan.foto, foto_bangunan.status FROM tr_agunan JOIN foto_bangunan ON tr_agunan.id = foto_bangunan.id_tr_agunan '.$where);
		return $data;
	}

	function update_gambar_bangunan($data){
        $this->db->where('id',$data['id']);
        $this->db->update('foto_bangunan',$data);
    }

    function update_status_foto_bangunan($data){
        $this->db->where('id',$data['id']);
        $this->db->update('foto_bangunan',$data);
    }

    function update_status_foto_akses($data){
        $this->db->where('id',$data['id']);
        $this->db->update('foto_akses',$data);
    }

    function data_terjual(){
		$query='SELECT count(tr_agunan.status) as jumlah_terjual FROM tr_agunan
			JOIN provinsi ON tr_agunan.id_provinsi = provinsi.id where status = 1';
		$cari = $this->db->query($query);
        if($cari->num_rows()>0)
        {
            foreach($cari->result() as $baris)
            {
                $hasil_data_terjual[]=$baris;
            }
            return $hasil_data_terjual;
        }
	}

	function data_belum_terjual(){
		$query='SELECT count(tr_agunan.status) as jumlah_terjual FROM tr_agunan
			JOIN provinsi ON tr_agunan.id_provinsi = provinsi.id
			WHERE 
			tr_agunan.status_agunan = 1 AND  
			tr_agunan.status = 1';
		$cari = $this->db->query($query);
        if($cari->num_rows()>0)
        {
            foreach($cari->result() as $baris)
            {
                $hasil_data_belum_terjual[]=$baris;
            }
            return $hasil_data_belum_terjual;
        }
	}

	function data_agunan_jual(){
		$query="SELECT count(tr_agunan.id) as jumlah_terjual FROM tr_agunan
			JOIN provinsi ON tr_agunan.id_provinsi = provinsi.id
			WHERE tr_agunan.status_agunan = 1 AND tr_agunan.kategori != 1";
		$cari = $this->db->query($query);
        if($cari->num_rows()>0)
        {
            foreach($cari->result() as $baris)
            {
                $hasil_data_agunan_tanah[]=$baris;
            }
            return $hasil_data_agunan_tanah;
        }
	}

	function data_agunan_lelang_verifikator(){
		$query="SELECT count(tr_agunan.id) as jumlah_terjual FROM tr_agunan
			JOIN provinsi ON tr_agunan.id_provinsi = provinsi.id
			JOIN data_klaim ON tr_agunan.id_klaim = data_klaim.id
			JOIN tr_penempatan ON (tr_penempatan.id_bank = data_klaim.bank AND data_klaim.cabang = tr_penempatan.id_cabang)
			JOIN m_employee ON m_employee.reg_employee = tr_penempatan.reg_employee
			LEFT JOIN tr_ots ON tr_agunan.id_klaim = tr_ots.id_klaim
			LEFT JOIN tr_ots_p ON tr_ots.id = tr_ots_p.id_tr_ots
			
			WHERE 
			tr_agunan.status_agunan != 1 AND
			tr_ots_p.j_komitmen = 3 AND
			tr_ots_p.sumber = 3";
		$cari = $this->db->query($query);
        if($cari->num_rows()>0)
        {
            foreach($cari->result() as $baris)
            {
                $hasil_data_agunan_tanah_bangunan[]=$baris;
            }
            return $hasil_data_agunan_tanah_bangunan;
        }
	}

	function data_agunan_lelang_operator(){
		$query="SELECT count(tr_agunan.id) as jumlah_terjual FROM tr_agunan
			JOIN provinsi ON tr_agunan.id_provinsi = provinsi.id
			
			WHERE 
			tr_agunan.status_agunan = 3 ";
		$cari = $this->db->query($query);
        if($cari->num_rows()>0)
        {
            foreach($cari->result() as $baris)
            {
                $hasil_data_agunan_tanah_bangunan[]=$baris;
            }
            return $hasil_data_agunan_tanah_bangunan;
        }
	}

	function data_agunan_lelang_operator_terjual(){
		$query="SELECT count(tr_agunan.id) as jumlah_terjual FROM tr_agunan
			JOIN provinsi ON tr_agunan.id_provinsi = provinsi.id
			
			WHERE 
			tr_agunan.status_agunan = 3 AND 
			tr_agunan.status = 1";
		$cari = $this->db->query($query);
        if($cari->num_rows()>0)
        {
            foreach($cari->result() as $baris)
            {
                $hasil_data_agunan_tanah_bangunan[]=$baris;
            }
            return $hasil_data_agunan_tanah_bangunan;
        }
	}

	function data_agunan_lelang_verifikator_terjual(){
		$query="SELECT count(tr_agunan.id) as jumlah_terjual FROM tr_agunan
			JOIN provinsi ON tr_agunan.id_provinsi = provinsi.id
			JOIN data_klaim ON tr_agunan.id_klaim = data_klaim.id
			JOIN tr_penempatan ON (tr_penempatan.id_bank = data_klaim.bank AND data_klaim.cabang = tr_penempatan.id_cabang)
			JOIN m_employee ON m_employee.reg_employee = tr_penempatan.reg_employee
			LEFT JOIN tr_ots ON tr_agunan.id_klaim = tr_ots.id_klaim
			LEFT JOIN tr_ots_p ON tr_ots.id = tr_ots_p.id_tr_ots
			
			WHERE 
			tr_agunan.status_agunan != 1 AND
			tr_agunan.status = 1 AND
			tr_ots_p.j_komitmen = 3 AND
			tr_ots_p.sumber = 3";
		$cari = $this->db->query($query);
        if($cari->num_rows()>0)
        {
            foreach($cari->result() as $baris)
            {
                $hasil_data_agunan_tanah_bangunan[]=$baris;
            }
            return $hasil_data_agunan_tanah_bangunan;
        }
	}

	function foto_logo($where= "") {
		$data = $this->db->query('SELECT tr_agunan.id, tr_agunan.jenis, foto_logo.id as id_foto_logo, foto_logo.foto FROM tr_agunan JOIN foto_logo ON tr_agunan.id = foto_logo.id_tr_agunan '.$where);
		return $data;
	}

	function id_foto_logo($where= "") {
		$data = $this->db->query('SELECT tr_agunan.id, tr_agunan.jenis, foto_logo.id AS id_foto_logo, foto_logo.foto FROM tr_agunan JOIN foto_logo ON tr_agunan.id = foto_logo.id_tr_agunan '.$where);
		return $data;
	}

	function update_gambar_logo($data){
        $this->db->where('id',$data['id']);
        $this->db->update('foto_logo',$data);
    }

    function ambil_provinsi(){
        $hasil=$this->db->query("SELECT * FROM provinsi order by id ASC");
        return $hasil;
    }

    function ambil_kabupaten($id_provinsi){
        $hasil=$this->db->query("SELECT * FROM m_kabupaten WHERE m_kabupaten.id_provinsi= '$id_provinsi'");
        return $hasil->result();
    }


    function data_jual_terjual(){
		$query='SELECT count(tr_agunan.status) as jumlah_terjual FROM tr_agunan
			JOIN provinsi ON tr_agunan.id_provinsi = provinsi.id where
			tr_agunan.status_agunan = 1 AND 
			-- tr_agunan.kategori != 1 AND  
			tr_agunan.status = 1';
		$cari = $this->db->query($query);
        if($cari->num_rows()>0)
        {
            foreach($cari->result() as $baris)
            {
                $hasil_data_jual_terjual[]=$baris;
            }
            return $hasil_data_jual_terjual;
        }
	}

	function data_lelang_terjual(){
		$query='SELECT count(tr_agunan.status) as jumlah_terjual FROM tr_agunan
			JOIN provinsi ON tr_agunan.id_provinsi = provinsi.id
			JOIN data_klaim ON tr_agunan.id_klaim = data_klaim.id
			JOIN tr_penempatan ON (tr_penempatan.id_bank = data_klaim.bank AND data_klaim.cabang = tr_penempatan.id_cabang)
			JOIN m_employee ON m_employee.reg_employee = tr_penempatan.reg_employee
			LEFT JOIN tr_ots ON tr_agunan.id_klaim = tr_ots.id_klaim
			LEFT JOIN tr_ots_p ON tr_ots.id = tr_ots_p.id_tr_ots
			
			WHERE 
			tr_agunan.status_agunan != 1 AND
			-- tr_agunan.kategori != 1 AND
			tr_ots_p.j_komitmen = 3 AND
			tr_ots_p.sumber = 3 AND
			tr_agunan.status = 1';
		$cari = $this->db->query($query);
        if($cari->num_rows()>0)
        {
            foreach($cari->result() as $baris)
            {
                $hasil_data_lelang_terjual[]=$baris;
            }
            return $hasil_data_lelang_terjual;
        }
	}

	function hapus($table,$where){
		return $this->db->delete($table,$where);
	}


	function properti_lelang()
	{
		$data = $this->db->query('SELECT tr_agunan.id, tr_agunan.jenis, tr_agunan.alamat, tr_agunan.lokasi, tr_agunan.status, tr_agunan.kategori, provinsi.provinsi FROM tr_agunan
			JOIN provinsi ON tr_agunan.id_provinsi = provinsi.id
			WHERE tr_agunan.status_agunan = 3 AND tr_agunan.kategori != 1
			ORDER BY tr_agunan.id DESC')->result();
	    return $data;
	}

	function properti_lelang_unggulan()
	{
		$data = $this->db->query('SELECT tr_agunan.id, tr_agunan.jenis, tr_agunan.alamat, tr_agunan.lokasi, tr_agunan.status, provinsi.provinsi FROM tr_agunan
			JOIN provinsi ON tr_agunan.id_provinsi = provinsi.id
			WHERE tr_agunan.status_agunan = 3 AND
			tr_agunan.kategori = 1
			ORDER BY tr_agunan.id DESC')->result();
	    return $data;
	}

	function properti_lelang_unggulan_operator_terjual()
	{
		$data = $this->db->query('SELECT tr_agunan.id, tr_agunan.jenis, tr_agunan.alamat, tr_agunan.lokasi, tr_agunan.status, tr_agunan.kategori, provinsi.provinsi FROM tr_agunan
			JOIN provinsi ON tr_agunan.id_provinsi = provinsi.id
			WHERE 
			tr_agunan.status_agunan = 3 AND 
			tr_agunan.kategori = 1 AND  
			tr_agunan.status = 1
			ORDER BY tr_agunan.id DESC')->result();
	    return $data;
	}

	function properti_lelang_operator_terjual()
	{
		$data = $this->db->query('SELECT tr_agunan.id, tr_agunan.jenis, tr_agunan.alamat, tr_agunan.lokasi, tr_agunan.status, tr_agunan.kategori, provinsi.provinsi FROM tr_agunan
			JOIN provinsi ON tr_agunan.id_provinsi = provinsi.id
			WHERE 
			tr_agunan.status_agunan = 3 AND 
			-- tr_agunan.kategori = 1 AND  
			tr_agunan.status = 1
			ORDER BY tr_agunan.id DESC')->result();
	    return $data;
	}

	function properti_lelang_verifikator_terjual()
	{
		$data = $this->db->query('SELECT tr_agunan.id, tr_agunan.jenis, tr_agunan.alamat, tr_agunan.lokasi, tr_agunan.status, tr_agunan.status_agunan, provinsi.provinsi, m_employee.name as nama_pegawai FROM tr_agunan
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
			ORDER BY tr_agunan.id DESC')->result();
	    return $data;
	}

}

