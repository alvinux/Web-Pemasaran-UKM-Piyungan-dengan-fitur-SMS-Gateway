<?php if (!defined('BASEPATH'))	exit('No direct script access allowed');

Class M_admin extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	function proses_masuk_admin($username, $password) {
		$this->db->select('*');
		$this->db->from('data_admin');
		$this->db->where('username_admin', $username);
		$this->db->where('pass_admin', MD5($password));

		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}

	 function biodata_admin() {
        $id_admin = $this->session->userdata['login_admin']['id_admin'];
        $sql = "SELECT * FROM data_admin 
    
        WHERE id_admin =  ?";
        
        $query = $this->db->query($sql,$id_admin);
        if($query->num_rows>0){
            return $query->row_array();
        }else{
            return false;
        }
    }

    function ubah_data_admin() {
    	$id_admin = $_POST['id_admin'];
    	$this->email = $this->input->post('email');
    	$this->username_admin = $this->input->post('username_admin');
    	$this->nama_admin = $this->input->post('nama_admin');
    	$this->telpon = $this->input->post('telpon');
    	$this->alamat = $this->input->post('alamat');
    	// $this->password = $this->input->post('password');
    	$this->db->where('id_admin', $id_admin);
    	$this->db->update('data_admin', $this);
    }

   function ubah_pass_admin() {
    	$id_admin = $_POST['id_admin'];
    	$this->password = $this->input->post('password');
    	
    	// $this->password = $this->input->post('password');
    	$this->db->where('id_admin', $id_admin);
    	$this->db->update('data_admin', $this);
    }




}	
?>