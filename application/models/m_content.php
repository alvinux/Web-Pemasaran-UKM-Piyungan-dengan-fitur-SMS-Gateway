<?php if (!defined('BASEPATH'))	exit('No direct script access allowed');

Class M_content extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->database();
	}



    //untuk menampilkan provinsi di beranda/daftar
    function provinsi() {
        $query = $this->db->query('select * from province_rajaongkir');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
        }
        return $data;
    }

    function provinsi_byid($id_prov) {
        $query = $this->db->query("select * from province_rajaongkir where id_prov='$id_prov'");
        if ($query->num_rows() > 0) {
            return $query->row_array();
        }
        
    }
    //untuk menampilkan kabupaten / kota di beranda/daftar
    function kab_kota($id_prov) {
        $query = $this->db->query("select * from kota_rajaongkir where id_prov='$id_prov'");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
        }
        return $data;
    }
    //untuk menampilkan kecamatan di beranda/daftar
    function kecamatan($id_kab_kota) {
        $query = $this->db->query("select id_kecamatan from data_user where id_user='$id_user'");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
        }
        return $data;
    }

    function banner(){
        $query = $this->db->query("select * from set_banner");
        if($query->num_rows>0){
            return $query->result_array();
        }else{
            return array();
        }
    }
    function banner_byid($id_banner){
        $query = $this->db->query("select * from set_banner where id_banner='$id_banner'");
        if($query->num_rows>0){
            return $query->row_array();
        }else{
            return array();
        }
    }

    function bank(){
        $query = $this->db->query("select * from bank");
        if($query->num_rows()>0){
            foreach ($query->result() as $row) {
                $data[]= $row;
            }
        }
        return $data;
    }

    function show_bank_byid($id_bank){
        $query = $this->db->query("select * from bank where id_bank = '$id_bank'");
        if($query->num_rows()>0){
            return $query->row_array();
        } else{    
             return false;
        }
    }

    function show_page_byid($id_page){
        $query = $this->db->query("select * from berita_intermezzo where id_berita = '$id_page'");
        if($query->num_rows()>0){
            return $query->row_array();
        } else{    
             return array();
        }
    }

    function list_berita(){
        $query = $this->db->query("select * from berita_intermezzo ORDER BY tanggal_berita DESC");
         if ($query->num_rows > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }







    ////////////////////Katagori Produk
    //untuk menampilkan provinsi di beranda/daftar
    function katagoriproduk() {
        $query = $this->db->query('select * from data_katagori');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
        }
        return $data;
    }
    //untuk menampilkan kabupaten / kota di beranda/daftar
    function jenis_produk($id_katagori) {
        $query = $this->db->query("select * from jenis_produk where katagori_produk_id='$id_katagori'");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
        return $data;
        } else {
            return 0;
        }
    }
    // HANYA DI EKSEKUSI SATU KALI UNTUK MENGAMBIL DATA PROVINSI DAN KOTA DARI RAJAONGKIR
    // function get_rajaongkir_db_prov($idprov,$prov){
    //     $this->id_prov = $idprov;
    //     $this->provinsi = $prov;
    //     $this->db->insert('province_rajaongkir', $this);

    // }
    // function get_rajaongkir_db_kota($idprov,$idkota,$kota,$type,$kodepos){
    //     $this->id_prov = $idprov;
    //     $this->id_kota = $idkota;
    //     $this->kota = $kota;
    //     $this->type = $type;
    //     $this->kodepos = $kodepos;
    //     $this->db->insert('kota_rajaongkir', $this);

    // }




}

?>