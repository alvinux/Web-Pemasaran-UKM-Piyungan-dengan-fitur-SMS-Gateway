<?php if (!defined('BASEPATH'))	exit('No direct script access allowed');

Class M_content extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->database();
	}



  function daftar() {
        $now = date("Y-m-d H:i:s");
        // ->nama=nama kolom db dan 'nama'=nama field form
        $this->nama = $this->input->post('nama');
        $this->username_user = $this->input->post('username');
        $this->email = $this->input->post('email');

        $this->img_user = 'default.jpg';
        
        $this->pass_user = $this->input->post('password');
        $this->telpon = $this->input->post('telepon');
        $this->id_provinsi = $this->input->post('provinsi');
        $this->id_kota = $this->input->post('kabupaten');
        $this->id_kecamatan = $this->input->post('kecamatan');
        $this->alamat = $this->input->post('alamat');
        $this->kode_pos = $this->input->post('kode_pos');
        $this->tgl_daftar = $now;

        //admin adalah nama tabel
        $this->db->insert('data_user', $this);
    }

    //untuk menampilkan provinsi di beranda/daftar
    function provinsi() {
        $query = $this->db->query('select * from provinsi');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
        }
        return $data;
    }
    //untuk menampilkan kabupaten / kota di beranda/daftar
    function kab_kota($id_provinsi) {
        $query = $this->db->query("select * from kab_kota left join kecamatan on kab_kota.provinsi_id=kecamatan.id_kecamatan where kab_kota.provinsi_id='$id_provinsi'");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
        }
        return $data;
    }
    //untuk menampilkan kecamatan di beranda/daftar
    function kecamatan($id_kab_kota) {
        $query = $this->db->query("select * from kecamatan where kab_kota_id='$id_kab_kota'");
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
            return $query->row_array();
        }else{
            return false;
        }

    }




}

?>