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

    function daftar_penjual() {
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
        $this->status = 'penjual';
        $this->tgl_daftar = $now;

        //admin adalah nama tabel
        $this->db->insert('data_user', $this);
    }



     function biodata() {
        $id_user = $this->session->userdata['login_user']['id_user'];
        $sql = "SELECT * FROM data_user
        inner join `province_rajaongkir` on `province_rajaongkir`.`id_prov` = data_user.id_provinsi 
        inner join `kota_rajaongkir` on `kota_rajaongkir`.`id_kota` = data_user.id_kota
        WHERE id_user =  ?";
        $query = $this->db->query($sql,$id_user);
        if($query->num_rows>0){
            return $query->row_array();
        }else{
            return false;
        }
    } 
     function biodata_byID($id_user) {
        // $id_user = $this->session->userdata['login_user']['id_user'];
        $sql = "SELECT * FROM data_user
        inner join `province_rajaongkir` on `province_rajaongkir`.`id_prov` = data_user.id_provinsi 
        inner join `kota_rajaongkir` on `kota_rajaongkir`.`id_kota` = data_user.id_kota
        WHERE id_user =  ?";
        $query = $this->db->query($sql,$id_user);
        if($query->num_rows>0){
            return $query->row_array();
        }else{
            return false;
        }
    } 
     function data_penjual($id_penjual) {
        $sql = "SELECT * FROM data_user 
        WHERE id_user =  ?";
        $query = $this->db->query($sql,$id_penjual);
        if($query->num_rows>0){
            return $query->row_array();
        }else{
            return false;
        }
    } 
     function show_all_data_penjual() {
        $sql = "SELECT * FROM data_user 
        WHERE status =  'penjual'";
        $query = $this->db->query($sql);
        if($query->num_rows>0){
            return $query->result_array();
        }else{
            return false;
        }
    } 

	 function data_user_byPhone($phone) {
        $sql = "SELECT * FROM data_user 
        WHERE telpon =  ?";
        $query = $this->db->query($sql,$phone);
        if($query->num_rows>0){
            return $query->row_array();
        }else{
            return false;
        }
    } 
    
    // function data_penjual($id_penjual) {
    //     $sql = "SELECT * FROM data_user 
    //     -- INNER JOIN kecamatan ON kecamatan.id_kecamatan = user.id_kecamatan
    //     -- INNER JOIN kab_kota ON kab_kota.id_kab_kota = user.id_kab_kota
    //     -- INNER JOIN provinsi ON provinsi.id_provinsi = user.id_provinsi
    //     WHERE id_user =  ?";

    //     // $sql = "SELECT data_user.id_user AS 'id_user', data_user.nama_user AS 'nama',data_user.email AS 'email', data_user.telepon AS 'telepon',user.alamat AS 'alamat',user.kode_pos AS 'kode_pos', user.foto AS 'foto',
    //     // kecamatan.id_kecamatan AS 'id_kecamatan', kecamatan.kecamatan AS 'kecamatan', kab_kota.kab_kota AS 'kabupaten', kab_kota.id_kab_kota AS 'id_kabupaten', provinsi.provinsi AS 'provinsi'
    //     // FROM user 
    //     // INNER JOIN kecamatan ON kecamatan.id_kecamatan = user.id_kecamatan
    //     // INNER JOIN kab_kota ON kab_kota.id_kab_kota = user.id_kab_kota
    //     // INNER JOIN provinsi ON provinsi.id_provinsi = user.id_provinsi
    //     // WHERE user.id_user =  ?";

    //     $query = $this->db->query($sql,$id_penjual);
    //     if($query->num_rows>0){
    //         return $query->row_array();
    //     }else{
    //         return false;
    //     }
    // }




    function ubah_data_user() {
        $id_user = $_POST['id_user'];
        $this->email = $this->input->post('email');
        $this->username_user = $this->input->post('username_user');
        $this->nama_admin = $this->input->post('nama');
        $this->telpon = $this->input->post('telpon');
        $this->alamat = $this->input->post('alamat');
        // ALat dan provinsi
        $this->id_provinsi = $this->input->post('id_provinsi');
        $this->id_kecamatan = $this->input->post('id_kecamatan');
        $this->id_kota = $this->input->post('id_kota');
        $this->kode_pos = $this->input->post('kode_pos');
        // $this->password = $this->input->post('password');
        $this->db->where('id_user', $id_user);
        $this->db->update('data_user', $this);
    }


   function ubah_pass_user() {
        $id_user = $this->session->userdata['login_user']['id_user'];
        $this->pass_user = $this->input->post('newpassword');
        
        // $this->password = $this->input->post('password');
        $this->db->where('id_user', $id_user);
        $this->db->update('data_user', $this);
    }

   function tlpuser($SenderNumber) {
        $tlp = $SenderNumber;

        $sql = "SELECT * FROM data_user WHERE telpon =  ?";
        // $this->password = $this->input->post('password');
        $query = $this->db->query($sql,$tlp);
        // $this->db->where('telpon', $tlp);
        return $query->num_rows();//menampilkan berupa angka

    }
   function tlpPenjual($SenderNumber) {
        $tlp = $SenderNumber;

        $sql = "SELECT * FROM data_user WHERE status = 'penjual' AND telpon =  ?";
        // $this->password = $this->input->post('password');
        $query = $this->db->query($sql,$tlp);
        // $this->db->where('telpon', $tlp);
        return $query->num_rows();//menampilkan berupa angka

    }

    public function detailPenjual_bytlpuser($SenderNumber)
    {
        $tlp = $SenderNumber;

        $sql = "SELECT * FROM data_user WHERE telpon =  ?";
        // $this->password = $this->input->post('password');
        $query = $this->db->query($sql,$tlp);
        if ($query->num_rows() > 0) {
          return $query->row_array();
        }
        // $this->db->where('telpon', $tlp);
       // return $query->num_rows();//menampilkan berupa angka
    }

   function foto_user($id_user) {
       $sql = "SELECT img_user FROM data_user WHERE id_user = ?";
       $query = $this->db->query($sql, $id_user);
       if ($query->num_rows() > 0) {
          foreach ($query->result() as $row) {
            return $row->img_user;
            }
        }
    }
}	
?>