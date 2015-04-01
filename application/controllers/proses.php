<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Proses extends CI_Controller {

		public function __construct(){
		parent::__construct();
		$this->load->library(array('session', 'upload', 'user_agent','form_validation'));
		$this->load->helper(array('form', 'url'));
        // memanggil model m_home
		$this->load->model(array('m_produk','m_user','m_content','m_admin'));

	}



	public function proses_daftar_user() {

		//is_unique[user.email]=user nama tabel, email nama kolom
		//Nama=pesan validasi, nama=nama field form
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required|xss_clean');
		$this->form_validation->set_rules('username', 'Nama Panggilan', 'trim|required|max_length[10]|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[data_user.email]|max_length[50]|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|md5|max_length[50]|xss_clean');
		$this->form_validation->set_rules('passwordconf', 'Password', 'trim|required|matches[password]|md5|xss_clean');
		$this->form_validation->set_rules('telepon', 'Telpon', 'trim|required|numeric|is_unique[data_user.telpon]|max_length[15]|xss_clean');
		$this->form_validation->set_rules('provinsi', 'Provinsi', 'trim|required|xss_clean');
		$this->form_validation->set_rules('kabupaten', 'Kabupaten', 'trim|required|xss_clean');
		$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'trim|required|xss_clean');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required|xss_clean');
		$this->form_validation->set_rules('kode_pos', 'Kode Pos', 'trim|required|numeric|max_length[6]|xss_clean');

		//untuk form daftar
		if($this->form_validation->run() == FALSE) {
			//agar tetap di halaman daftar dan menampilkan validasi error. jika menggunakan redirect validasi tidak muncul.

			if ($this->session->userdata('login_user')) {
				redirect('home');
				} else {
			//untuk menampilkan option provinsi
				$data['provinsi'] = $this->m_content->provinsi();

				$data['title']= 'Daftar User';

				//load View
				$this->load->view('base/head', $data);

				$this->load->view('general/navbar');
				$this->load->view('general/head_katagori');
				$this->load->view('general/daftar',$data);

				$this->load->view('general/bottom_menu');
				$this->load->view('general/footer');
				$this->load->view('general/modal/modal_login');
				$this->load->view('general/modal/modal_register');	
				$this->load->view('general/modal/modal_ganti_password');
				
				$this->load->view('base/tail');
			}


		} else {
			//memanggil model m_beranda funsi daftar
			$this->m_user->daftar();
			echo '<script>';
			echo "alert('Berhasil Melakukan Pendaftaran');";
			echo "window.location='../home'";
			echo '</script>';
		}
	}


	public function proses_login_user()
	{

		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_cek_data_user');

		$run = $this->form_validation->run();

		// $con 

		if ($run == FALSE) {
			echo '<script>';
			echo "alert('Email dan password tidak sesuai');";
			echo "window.location='../home'";
			echo '</script>';
		} else {
			// bisa juga menggunakan redirect ini
			// redirect('beranda/biodata');
			// menggunakan javascript lebih cepat
			echo '<script>';
			echo "alert('Login Berhasil');";
			echo "window.location='".$this->agent->referrer()."'";
			echo '</script>';

		}
	}
	//dipanggil melalui form_validation password (callback_cek_data)
	public function cek_data_user($password) {
        //validasi field terhadap database 
		$email = $this->input->post('email');

        //query ke database
		$result = $this->m_user->proses_masuk($email, $password);

		if ($result) {
			$sess_array = array();
			foreach ($result as $row) {
				$sess_array = array(
					'id_user' => $row->id_user,
					'username_user' => $row->username_user,
					'nama' => $row->nama,
					'email' => $row->email,
					'img_user' => $row->img_user,
					'status' => $row->status,
					'pass_user' => $row->pass_user
					);
				$this->session->set_userdata('login_user', $sess_array);
			}
			return TRUE;
		} else {
			$this->form_validation->set_message('cek_data', 'Email dan password tidak sesuai');
			return FALSE;
		}
	}
	public function keluar_user() {
		$this->session->unset_userdata('login_user');
		$this->cart->destroy();
		redirect('home');
	}


//////////////////////////ADMIN//////////////////
//----------------------ADMIN-----------------

	public function proses_login_admin()
	{

		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_cek_data_admin');

		$run = $this->form_validation->run();

		// $con 

		if ($run == FALSE) {
			echo '<script>';
			echo "alert('Email dan password tidak sesuai');";
			echo "window.location='../admin'";
			echo '</script>';
		} else {
			// bisa juga menggunakan redirect ini
			// redirect('beranda/biodata');
			// menggunakan javascript lebih cepat
			echo '<script>';
			echo "alert('Login Berhasil');";
			echo "window.location='../admin/home'";
			echo '</script>';

		}
	}
	//dipanggil melalui form_validation password (callback_cek_data)
	public function cek_data_admin($password) {
        //validasi field terhadap database 
		$username = $this->input->post('username');

        //query ke database
		$result = $this->m_admin->proses_masuk_admin($username, $password);

		if ($result) {
			$sess_array = array();
			foreach ($result as $row) {
				$sess_array = array(
					'id_admin' => $row->id_admin,
					'nama_admin' => $row->nama_admin,
					'username_admin' => $row->username_admin,
					//'img_user' => $row->img_user,
					'stts' => $row->stts,
					'pass_admin' => $row->pass_admin
					// 'foto' => $row->foto
					);
				$this->session->set_userdata('login_admin', $sess_array);
			}
			return TRUE;
		} else {
			$this->form_validation->set_message('cek_data', 'Username dan password tidak sesuai');
			return FALSE;
		}
	}
	public function keluar_admin() {
		$this->session->unset_userdata('login_admin');
		redirect('admin');
	}
	/////////////////////////////////////////////////////////
// 	public function proses_login_admin()
// 	{
// 		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
// 		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_cek_data_admin');

// 		$run = $this->form_validation->run();

// 		// $con
// 	if ($run == FALSE) {
// 			echo '<script>';
// 			echo "alert('Email dan password tidak sesuai');";
// 			echo "window.location='../beranda/daftar'";
// 			echo '</script>';
// 		} else {
// 			// bisa juga menggunakan redirect ini
// 			// redirect('beranda/biodata');
// 			// menggunakan javascript lebih cepat
// 			echo '<script>';
// 			echo "alert('Login Berhasil');";
// 			echo "window.location='".$this->agent->referrer()."'";
// 			echo '</script>';

// 		}
// 	}
// 	//dipanggil melalui form_validation password (callback_cek_data)
// 	public function cek_data_admin($password) {
//         //validasi field terhadap database 
// 		$email = $this->input->post('email');

//         //query ke database
// 		$result = $this->m_user->proses_masuk($email, $password);

// 		if ($result) {
// 			$sess_array = array();
// 			foreach ($result as $row) {
// 				$sess_array = array(
// 					'id_user' => $row->id_user,
// 					'nama' => $row->nama,
// 					'email' => $row->email,
// 					'foto' => $row->foto
// 					);
// 				$this->session->set_userdata('login_user', $sess_array);
// 			}
// 			return TRUE;
// 		} else {
// 			$this->form_validation->set_message('cek_data', 'Email dan password tidak sesuai');
// 			return FALSE;
// 		}
// 	}
// 	public function proses_login_penjual()
// 	{
// 		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
// 		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_cek_data');

// 		$run = $this->form_validation->run();

// 		// $con
// 	}
// if ($run == FALSE) {
// 			echo '<script>';
// 			echo "alert('Email dan password tidak sesuai');";
// 			echo "window.location='../beranda/daftar'";
// 			echo '</script>';
// 		} else {
// 			// bisa juga menggunakan redirect ini
// 			// redirect('beranda/biodata');
// 			// menggunakan javascript lebih cepat
// 			echo '<script>';
// 			echo "alert('Login Berhasil');";
// 			echo "window.location='".$this->agent->referrer()."'";
// 			echo '</script>';

// 		}
// 	}
// 	//dipanggil melalui form_validation password (callback_cek_data)
// 	public function cek_data($password) {
//         //validasi field terhadap database 
// 		$email = $this->input->post('email');

//         //query ke database
// 		$result = $this->m_user->proses_masuk($email, $password);

// 		if ($result) {
// 			$sess_array = array();
// 			foreach ($result as $row) {
// 				$sess_array = array(
// 					'id_user' => $row->id_user,
// 					'nama' => $row->nama,
// 					'email' => $row->email,
// 					'foto' => $row->foto
// 					);
// 				$this->session->set_userdata('login_user', $sess_array);
// 			}
// 			return TRUE;
// 		} else {
// 			$this->form_validation->set_message('cek_data', 'Email dan password tidak sesuai');
// 			return FALSE;
// 		}
// 	}




}
?>