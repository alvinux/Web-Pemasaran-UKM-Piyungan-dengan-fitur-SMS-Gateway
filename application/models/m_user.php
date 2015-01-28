<?php if (!defined('BASEPATH'))	exit('No direct script access allowed');

Class M_user extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	function proses_masuk($email, $password) {
		$this->db->select('*');
		$this->db->from('data_user');
		$this->db->where('email', $email);
		$this->db->where('pass_user', MD5($password));

		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}

	 function biodata() {
        $id_user = $this->session->userdata['login_user']['id_user'];
        $sql = "SELECT * FROM data_user 
        -- INNER JOIN kecamatan ON kecamatan.id_kecamatan = user.id_kecamatan
        -- INNER JOIN kab_kota ON kab_kota.id_kab_kota = user.id_kab_kota
        -- INNER JOIN provinsi ON provinsi.id_provinsi = user.id_provinsi
        WHERE id_user =  ?";

        // $sql = "SELECT data_user.id_user AS 'id_user', data_user.nama_user AS 'nama',data_user.email AS 'email', data_user.telepon AS 'telepon',user.alamat AS 'alamat',user.kode_pos AS 'kode_pos', user.foto AS 'foto',
        // kecamatan.id_kecamatan AS 'id_kecamatan', kecamatan.kecamatan AS 'kecamatan', kab_kota.kab_kota AS 'kabupaten', kab_kota.id_kab_kota AS 'id_kabupaten', provinsi.provinsi AS 'provinsi'
        // FROM user 
        // INNER JOIN kecamatan ON kecamatan.id_kecamatan = user.id_kecamatan
        // INNER JOIN kab_kota ON kab_kota.id_kab_kota = user.id_kab_kota
        // INNER JOIN provinsi ON provinsi.id_provinsi = user.id_provinsi
        // WHERE user.id_user =  ?";

        $query = $this->db->query($sql,$id_user);
        if($query->num_rows>0){
            return $query->row_array();
        }else{
            return false;
        }
    } 
    function data_penjual($id_penjual) {
        $sql = "SELECT * FROM data_user 
        -- INNER JOIN kecamatan ON kecamatan.id_kecamatan = user.id_kecamatan
        -- INNER JOIN kab_kota ON kab_kota.id_kab_kota = user.id_kab_kota
        -- INNER JOIN provinsi ON provinsi.id_provinsi = user.id_provinsi
        WHERE id_user =  ?";

        // $sql = "SELECT data_user.id_user AS 'id_user', data_user.nama_user AS 'nama',data_user.email AS 'email', data_user.telepon AS 'telepon',user.alamat AS 'alamat',user.kode_pos AS 'kode_pos', user.foto AS 'foto',
        // kecamatan.id_kecamatan AS 'id_kecamatan', kecamatan.kecamatan AS 'kecamatan', kab_kota.kab_kota AS 'kabupaten', kab_kota.id_kab_kota AS 'id_kabupaten', provinsi.provinsi AS 'provinsi'
        // FROM user 
        // INNER JOIN kecamatan ON kecamatan.id_kecamatan = user.id_kecamatan
        // INNER JOIN kab_kota ON kab_kota.id_kab_kota = user.id_kab_kota
        // INNER JOIN provinsi ON provinsi.id_provinsi = user.id_provinsi
        // WHERE user.id_user =  ?";

        $query = $this->db->query($sql,$id_penjual);
        if($query->num_rows>0){
            return $query->row_array();
        }else{
            return false;
        }
    }




}	
?>