<?php
defined('BASEPATH') OR EXIT('No direct access allowed');

class model_cetak extends CI_Model
{
	public function detail_foto_bangunan($where= ""){
		$query='SELECT tr_agunan.id AS id_agunan, foto_bangunan.foto FROM tr_agunan
			JOIN foto_bangunan ON tr_agunan.id = foto_bangunan.id_tr_agunan '.$where;
		$cari = $this->db->query($query);
        if($cari->num_rows()>0)
        {
            foreach($cari->result() as $baris)
            {
                $detail_foto_bangunan[]=$baris;
            }
            return $detail_foto_bangunan;
        }
	}

    public function detail_foto_akses($where= ""){
        $query='SELECT tr_agunan.id AS id_agunan,  foto_akses.foto AS foto_akses FROM tr_agunan
            JOIN foto_akses ON tr_agunan.id = foto_akses.id_tr_agunan '.$where;
        $cari = $this->db->query($query);
        if($cari->num_rows()>0)
        {
            foreach($cari->result() as $baris)
            {
                $detail_foto_akses[]=$baris;
            }
            return $detail_foto_akses;
        }
    }

    public function detail_data_agunan($where= ""){
        $query='SELECT tr_agunan."id" AS id_agunan, tr_agunan.*, (tr_agunan.l_tanah*tr_agunan.h_tanah) AS harga_tanah, (tr_agunan.l_bangunan*tr_agunan.h_bangunan) AS harga_bangunan, provinsi.id as id_provinsi, provinsi.provinsi, foto_logo.foto, m_kabupaten.id as id_kabupaten, m_kabupaten.kabupaten FROM tr_agunan 
            JOIN provinsi ON tr_agunan.id_provinsi = provinsi.id
            LEFT JOIN foto_logo ON tr_agunan.id = foto_logo.id_tr_agunan
            JOIN m_kabupaten ON tr_agunan.id_kabupaten = m_kabupaten.id '.$where;
        $cari = $this->db->query($query);
        if($cari->num_rows()>0)
        {
            foreach($cari->result() as $baris)
            {
                $detail_agunan[]=$baris;
            }
            return $detail_agunan;
        }
    }

    public function detail_data_agunan_lelang($where= ""){
        $query='SELECT tr_agunan."id" AS id_agunan, tr_agunan.*, provinsi.provinsi, m_kabupaten.id as id_kabupaten, m_kabupaten.kabupaten, m_employee.name as nama_pegawai, m_employee.phone as no_telp FROM tr_agunan
            JOIN provinsi ON tr_agunan.id_provinsi = provinsi.id
            JOIN m_kabupaten ON tr_agunan.id_kabupaten = m_kabupaten.id
            JOIN data_klaim ON tr_agunan.id_klaim = data_klaim.id
            JOIN tr_penempatan ON (tr_penempatan.id_bank = data_klaim.bank AND data_klaim.cabang = tr_penempatan.id_cabang)
            JOIN m_employee ON m_employee.reg_employee = tr_penempatan.reg_employee
            LEFT JOIN tr_ots ON tr_agunan.id_klaim = tr_ots.id_klaim
            LEFT JOIN tr_ots_p ON tr_ots.id = tr_ots_p.id_tr_ots '.$where;
        $cari = $this->db->query($query);
        if($cari->num_rows()>0)
        {
            foreach($cari->result() as $baris)
            {
                $detail_agunan[]=$baris;
            }
            return $detail_agunan;
        }
    }
}