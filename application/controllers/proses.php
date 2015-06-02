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
		$this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[data_user.email]|valid_email|max_length[50]|xss_clean');
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

	public function proses_daftar_penjual() {
		//is_unique[user.email]=user nama tabel, email nama kolom
		//Nama=pesan validasi, nama=nama field form
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required|xss_clean');
		$this->form_validation->set_rules('username', 'Nama Panggilan', 'trim|required|max_length[10]|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[data_user.email]|valid_email|max_length[50]|xss_clean');
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
			echo '<script>';
			echo "alert('Tambah Penjual gagal, Mohon perhatikan ketentuan masing-masing Form .".
				strip_tags(form_error('nama')).
				strip_tags(form_error('username')).
				strip_tags(form_error('email')).strip_tags(form_error('password')).strip_tags(form_error('passwordconf')).strip_tags(form_error('telepon')).strip_tags(form_error('provinsi')).strip_tags(form_error('kabupaten')).strip_tags(form_error('alamat')).strip_tags(form_error('kode_pos')).
				strip_tags(form_error('kecamatan'))
				."');";
			echo "window.location='".$this->agent->referrer()."'";
			echo '</script>';


		} else {
					//memanggil model m_beranda funsi daftar
			$this->m_user->daftar_penjual();
			echo '<script>';
			echo "alert('Berhasil Menambahkan Penjual');";
			echo "window.location='".$this->agent->referrer()."'";
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
			echo "alert('Username dan password tidak sesuai');";
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




	public function tambah_bank() {

			//is_unique[user.email]=user nama tabel, email nama kolom
			//Nama=pesan validasi, nama=nama field form
		$this->form_validation->set_rules('nama_bank', 'Nama bank', 'trim|required|xss_clean');
		$this->form_validation->set_rules('atas_nama', 'Atas nama', 'trim|required|xss_clean');
		$this->form_validation->set_rules('nomor_rekening', 'Nomor Rekening', 'trim|required|is_unique[bank.nomor_rekening]|xss_clean');


			//untuk form daftar
		if($this->form_validation->run() == FALSE) {
				//agar tetap di halaman daftar dan menampilkan validasi error. jika menggunakan redirect validasi tidak muncul.
			echo '<script>';
			echo "alert('Gagal menambahkan bank, Mohon perhatikan ketentuan masing-masing Form ".
				strip_tags(form_error('nama_bank')).
				strip_tags(form_error('atas_nama')).
				strip_tags(form_error('nomor_rekening'))."');";
	echo "window.location='".$this->agent->referrer()."'";
	echo '</script>';


	} else {
				//memanggil model m_beranda funsi daftar
		$this->nama_bank = $_POST['nama_bank'];
		$this->atas_nama = $_POST['atas_nama'];
		$this->nomor_rekening = $_POST['nomor_rekening'];
		$this->db->insert('bank', $this);
		echo '<script>';
		echo "alert('Berhasil Menambahkan Bank');";
		echo "window.location='".$this->agent->referrer()."'";
		echo '</script>';
	}
	}


	public function tambah_berita() {
		if ($this->session->userdata('login_admin')) {
			$now = date("Y-m-d H:i:s");
				// $id_berita = $this->input->post('id_berita');
			$this->form_validation->set_rules('judul', 'Judul', 'trim|required|xss_clean');
				// $this->form_validation->set_rules('link', 'Link', 'trim|required|xss_clean');
			$this->form_validation->set_rules('isi_berita', 'Isi Berita', 'trim|required|xss_clean');
				// $img = $this->m_content->banner_byid($id_banner);//mengambil data foto yang akan diubah dan dihapus
			$foto = $_FILES['img_berita'];
			$nama = $foto['name'];

			$config['upload_path'] = './assets/img/berita-content/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = '1000';
				// $config['max_width']  = '1024';
				// $config['max_height']  = '768';
			$config['overwrite'] = false;
			$config['encrypt_name'] = true;
			$this->load->library('upload');
			$this->upload->initialize($config);

				//untuk form daftar
			if($this->form_validation->run() == FALSE) {
					//agar tetap di halaman daftar dan menampilkan validasi error. jika menggunakan redirect validasi tidak muncul.
				echo '<script>';
				echo "alert('Input data Berita gagal, Mohon perhatikan ketentuan masing-masing Form ".
					strip_tags(form_error('judul')).
					strip_tags(form_error('isi_berita'))."');";
				echo "window.location='".$this->agent->referrer()."'";
				echo '</script>';


				} else {

					if (empty($_FILES['img_berita']['name'])) {
									// $pp = $pp['file_name'];
						$data = array('judul'=>$_POST['judul'],
							'isi_berita'=>$_POST['isi_berita'],
							'tanggal_berita'=>$now
							);
								// $this->db->where('id_banner', $id_banner);
						$this->db->insert('berita_intermezzo', $data);

						echo '<script>';
						echo "alert('Data berita berhasil ditambah');";
						echo "window.location='".$this->agent->referrer()."'";
						echo '</script>';

					} else {


								// mulai upload foto
						if ($this->upload->do_upload('img_berita')) {

									// $path_foto = '.assets/img/berita-content/'.$img;//lokasi foto yang akan dihapus
							$pp =$this->upload->data('file_name');
							$pp = $pp['file_name'];
							$data = array('img_berita'=>$pp,
								'judul'=>$_POST['judul'],
								'isi_berita'=>$_POST['isi_berita'],
								'tanggal_berita'=>$now
								);
							$this->db->insert('berita_intermezzo', $data);

							echo '<script>';
							echo "alert('Data Berita Berhasil Ditambahkan');";
							echo "window.location='".$this->agent->referrer()."'";
							echo '</script>';

						} else {

							echo '<script>';
							echo "alert('Berita gagal Ditambahkan, Foto terlalu besar atau format gambar tidak sesuai..');";
							echo "window.location='".$this->agent->referrer()."'";
							echo '</script>';
						}
							// Selesai upload foto

					}
				}
			} else {
				redirect('home/admin');
			}
	}//end function foto prduk


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


///#############################       Produk Area---------------------------------------------------

	public function upload_gambar_produk_baru() {
		if ($this->session->userdata('login_user')) {
			$id_produk = $this->input->post('id_produk');
			// $foto_produk = $this->m_produk->foto_produk($id_gambar);//mengambil data foto yang akan diubah dan dihapus

			$foto = $_FILES['foto'];
			$nama = $foto['name'];


			// $nama = str_replace(' ', '_', $nama);

			$config['upload_path'] = './doc/themes/public/img/produk/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = '1000';
			// $config['max_width']  = '1024';
			// $config['max_height']  = '768';
			$config['overwrite'] = false;
			$config['encrypt_name'] = true;
			$this->load->library('upload');
			$this->upload->initialize($config);


			if ($this->upload->do_upload('foto')) {

				// $path_foto = './doc/themes/public/img/produk/'.$foto_produk;//lokasi foto yang akan dihapus
				$pp =$this->upload->data('file_name');
				$pp = $pp['file_name'];

				// unlink($path_foto);
				$data = array('gambar'=>$pp,
					'id_produk'=>$id_produk);
				// $this->db->where('id_gambar', $id_gambar);
				$this->db->insert('gambar', $data);

				//JIka nama file sebelumnya bukan default.jpg maka diapus
				// $mysession = $this->session->userdata('login_user');
				//     $sess_array = array(
				//         'id_user' => $mysession['id_user'],
				//         'username_user' => $mysession['username_user'],
				//         'nama' => $mysession['nama'],
				//         'email' => $mysession['email'],
				//         'img_user' => $pp,
				//         'status' => $mysession['status'],
				//         'pass_user' => $mysession['pass_user'],
				//         );

				// $this->session->set_userdata('login_user', $sess_array);

				echo '<script>';
				echo "alert('Gambar produk Berhasil Ditambahkan');";
				echo "window.location='".$this->agent->referrer()."'";
				echo '</script>';

			} else {

				echo '<script>';
				echo "alert('Foto Gagal Upload, Foto terlalu besar atau format gambar tidak sesuai..');";
				echo "window.location='".$this->agent->referrer()."'";
				echo '</script>';
			}
		} else {
			redirect('beranda');
		}
	}//end function foto





	public function proses_tambah_produk() {
		// $foto_produk = $this->m_produk->show_detail_produk($id_produk)['img_produk'];//mengambil data foto yang akan diubah dan dihapus

		$foto = $_FILES['foto'];
		$nama = $foto['name'];
		$config['upload_path'] = './doc/themes/public/img/produk/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = '1000';
		// $config['max_width']  = '1024';
		// $config['max_height']  = '768';
		$config['overwrite'] = false;
		$config['encrypt_name'] = true;
		$this->load->library('upload');
		$this->upload->initialize($config);

		//is_unique[user.email]=user nama tabel, email nama kolom
		//Nama=pesan validasi, nama=nama field form
		$this->form_validation->set_rules('nama_produk', 'Nama', 'trim|required|xss_clean');
		$this->form_validation->set_rules('stok_produk', 'Stok produk', 'trim|required|numeric|xss_clean');
		$this->form_validation->set_rules('harga_produk', 'Harga produk', 'trim|required|numeric|xss_clean'); //is_unique[data_user.email]|
		// $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|md5|max_length[50]|xss_clean');
		// $this->form_validation->set_rules('passwordconf', 'Password', 'trim|required|matches[password]|md5|xss_clean');
		$this->form_validation->set_rules('berat_produk', 'Berat produk', 'trim|required|numeric|xss_clean'); //is_unique[data_user.telpon]|
		$this->form_validation->set_rules('katagoriproduk', 'Katagori produk', 'trim|required|xss_clean');
		$this->form_validation->set_rules('jenis_produk', 'Jenis produk', 'trim|xss_clean');
		$this->form_validation->set_rules('deskripsi_produk', 'Deskripsi produk', 'trim|required|xss_clean');

		//untuk form gambar
		if ($this->upload->do_upload('foto')) {

			if($this->form_validation->run() == FALSE ) {
				//agar tetap di halaman daftar dan menampilkan validasi error. jika menggunakan redirect validasi tidak muncul.

				if ($this->session->userdata('login_user')['status']== 'penjual') {
					//untuk menampilkan option provinsi
					$data['katagoriproduk'] = $this->m_content->katagoriproduk();

					$data['title']= 'Tambah Produk';

					//load View
					$this->load->view('base/head', $data);

					$this->load->view('general/navbar');
					$this->load->view('general/head_katagori');
					$this->load->view('general/tambah_produk',$data);

					$this->load->view('general/bottom_menu');
					$this->load->view('general/footer');
					$this->load->view('general/modal/modal_login');
					$this->load->view('general/modal/modal_register');
					$this->load->view('general/modal/modal_ganti_password');

					$this->load->view('base/tail');
				} else {
					redirect('home');
				}


			} else {
				//memanggil model m_beranda funsi daftar

				// $path_foto = './doc/themes/public/img/produk/'.$foto_produk;//lokasi foto yang akan dihapus
				$pp =$this->upload->data('file_name');
				$pp = $pp['file_name'];

				// unlink($path_foto);
				// $data = array('img_produk'=>$pp);
				// $this->db->where('id_produk', $id_produk);
				// $this->db->update('data_produk', $data);

				$this->m_produk->tambah_produk($pp);
				echo '<script>';
				echo "alert('Berhasil Menambahkan Produk');";
				echo "window.location='../home'";
				echo '</script>';
			}


		} else {

			echo '<script>';
			echo "alert('Foto Gagal Diubah, Foto terlalu besar atau format gambar tidak sesuai..');";
			echo "window.location='".$this->agent->referrer()."'";
			echo '</script>';
		}
	}

	public function proses_konfirmasi_pembayaran() {
		// $foto_produk = $this->m_produk->show_detail_produk($id_produk)['img_produk'];//mengambil data foto yang akan diubah dan dihapus
		// $foto = $_FILES['foto'];
		// $nama = $foto['name'];
		//  $config['upload_path'] = './doc/themes/public/img/produk/';
		//    $config['allowed_types'] = 'gif|jpg|png|jpeg';
		//    $config['max_size'] = '1000';
		//    $config['overwrite'] = false;
		//    $config['encrypt_name'] = true;
		//    $this->load->library('upload');
		//    $this->upload->initialize($config);

		//is_unique[user.email]=user nama tabel, email nama kolom
		//Nama=pesan validasi, nama=nama field form
		$data['kode_transaksi'] = $_POST['kode_transaksi'];
		$this->form_validation->set_rules('kode_transaksi', 'Kode Transaksi', 'trim|required|is_unique[konfirmasi_pembayaran.kode_transaksi]|xss_clean');
		$this->form_validation->set_rules('nama_pengirim', 'Nama Rekening Pengirim', 'trim|required|xss_clean');
		$this->form_validation->set_rules('tanggal_transfer', 'Tanggal Transfer', 'trim|required|xss_clean');
		$this->form_validation->set_rules('jumlah_transfer', 'Jumlah Transfer', 'trim|required|numeric|xss_clean'); //is_unique[data_user.email]|
		// $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|md5|max_length[50]|xss_clean');
		// $this->form_validation->set_rules('passwordconf', 'Password', 'trim|required|matches[password]|md5|xss_clean');
		$this->form_validation->set_rules('bank_pengirim', 'Bank Pengirim', 'trim|required|xss_clean'); //is_unique[data_user.telpon]|
		$this->form_validation->set_rules('bank_tujuan', 'Bank Tujuam', 'trim|required|xss_clean');
		$this->form_validation->set_rules('metode_pembayaran', 'Metode Pembayaran', 'trim|required|xss_clean');

		//untuk form gambar
		// if ($this->upload->do_upload('foto')) {

		if($this->form_validation->run() == FALSE ) {
			//agar tetap di halaman daftar dan menampilkan validasi error. jika menggunakan redirect validasi tidak muncul.

			if ($this->session->userdata('login_user')['status']== 'pembeli') {
				//untuk menampilkan option provinsi
				$data['bank'] = $this->m_content->bank();
				$data['title']= 'Konfirmasi Pembayaran';
				//load View
				$this->load->view('base/head', $data);
				$this->load->view('general/navbar');
				$this->load->view('general/head_katagori');
				$this->load->view('general/konfirmasi_pembayaran',$data);
				$this->load->view('general/bottom_menu');
				$this->load->view('general/footer');
				$this->load->view('base/tail');
			} else {
				redirect('home');
			}
		} else {
			$this->m_produk->konfirmasi_pembayaran();
			echo '<script>';
			echo "alert('Berhasil Melakukan konfirmasi pembayaran');";
			echo "window.location='../home/profile_user'";
			echo '</script>';
		}
		// } else {
		//     echo '<script>';
		//     echo "alert('Foto Gagal Diubah, Foto terlalu besar atau format gambar tidak sesuai..');";
		//     echo "window.location='".$this->agent->referrer()."'";
		//     echo '</script>';
		// }
	}
	//ALL ABOUT SMS SYNC
	public function smsSync()//do sms sync :: make auto start every 30 seconds, only on local server
	{
		$onlineurl = 'http://alvinux.koding.io/alvin-piyungan';
		$this->load->model('m_sms');
		$host = $_SERVER['HTTP_HOST'];
		if($host == '127.0.0.1' OR $host == 'localhost')//offline
		{
			/////inbox sync
			//differences sms id off n on inbox
			$lattestOffId = $this->m_sms->lattestSmsId('inbox');//lattest offline inbox id [work]
			$lattestOnId = file_get_contents($onlineurl.'/proses/smsSync?get=inbox');
			//inbox sync
			if($lattestOnId < $lattestOffId)//any update inbox from local server
			{
				return $this->syncInbox($lattestOnId);
			}
			/////outbox sync
			///diferences outbox off and on id
			$lattestOffOut = $this->m_sms->lattestSmsId('outbox');//lattest offline inbox id [work];
			$lattestOnOut = file_get_contents($onlineurl.'/proses/smsSync?get=outbox');;
			if($lattestOffOut < $lattestOnOut)//any update from online outbox
			{
				return $this->syncOutbox($lattestOffOut);
			}
		}else//online
		{
			//get lattest online inbox id
			$lattestId = $this->m_sms->lattestSmsId($_GET['get']);//lattest offline inbox id [work]
			if(empty($lattestId))$lattestId=0;
			echo $lattestId;
		}
	}
	//sync offline inbox to online inbox
	public function syncInbox($lattestOnId="")
	{
		$onlineurl = 'http://pnpm-piyungan.pe.hu';
		$this->load->model('m_sms');
		$host = $_SERVER['HTTP_HOST'];
		if($host == '127.0.0.1' OR $host == 'localhost')//offline
		{
			//get all offline inbox where inbox id > lattestonline inbox id
			$result = $this->m_sms->updateInbox($lattestOnId);
			//json encode
			$inboxs = array();
			foreach($result as $r):
				array_push($inboxs,$r);
			endforeach;
			$inboxs = json_encode($inboxs);
			//send to online using curl
			$ch = curl_init();
			curl_setopt($ch,CURLOPT_URL, $onlineurl.'/proses/syncInbox');
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_POSTFIELDS,array('inboxs'=>$inboxs));
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			// curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			// 	'Content-Type: application/json',
			// 	'Content-Length: '.strlen($inboxs)
			// 	)
			// );
			$result = curl_exec($ch);
			curl_close($ch);
			print_r($result);
		}else //online
		{
			if(!empty($_POST))
			{
				$inboxsarray = json_decode($_POST['inboxs']);
				return $this->m_sms->cloneInbox($inboxsarray);
			}
		}
	}//outbox sync
	public function syncOutbox($id="")
	{
		$onlineurl = 'http://pnpm-piyungan.pe.hu';
		$this->load->model('m_sms');
		$host = $_SERVER['HTTP_HOST'];
		if($host == '127.0.0.1' OR $host == 'localhost')//offline
		{
			$outboxs = file_get_contents($onlineurl.'/proses/syncOutbox?id='.$id);
			$outboxsArray = json_decode($outboxs,true);
			return $this->m_sms->cloneOutbox($outboxsArray);
		}else//online
		{
			$id = $_GET['id'];
			$outboxsarray = array();
			$outboxs = $this->m_sms->updateOutbox($id);
			foreach($outboxs as $o):
				array_push($outboxsarray,$o);
			endforeach;
			$outboxsjson = json_encode($outboxsarray);
			echo $outboxsjson;
		}
	}
	//proses transaksi yang sudah jatuh tempo max 2 days
	public function prosesJatuhTempo()
	{
		$this->load->model(array('m_transaksi','m_produk'));
		$transaksiJT = $this->m_transaksi->listJatuhTempo();
		// print_r($transaksiJT);
		//mengembalikan status
		foreach($transaksiJT as $jt):
			//nambah stok
			//get transaksi item
			$transaksiItem = $this->m_produk->NewTransaksiItem($jt['id_transaksi_detail']);
			//hapus transaksi
		foreach($transaksiItem as $tai):
				// print_r($tai);
			$sqltambahstok = 'UPDATE data_produk SET stok_produk = stok_produk + '.$tai['jumlah'].' WHERE id_produk = '.$tai['id_produk'];
		$this->db->query($sqltambahstok);
		endforeach;
		//hapus riwayat
		//hapus konfirmasi pembayaran
		$this->db->delete('konfirmasi_pembayaran',array('kode_transaksi'=>$jt['kode_transaksi']));
		//transaksi item
		$this->db->delete('transaksi_item',array('id_transaksi_detail'=>$jt['id_transaksi_detail']));
			//transaksi detail
		$this->db->delete('transaksi_detail',array('kode_transaksi'=>$jt['kode_transaksi']));
			//transaksi
		$this->db->delete('transaksi',array('kode_transaksi'=>$jt['kode_transaksi']));
		endforeach;
	}
}
