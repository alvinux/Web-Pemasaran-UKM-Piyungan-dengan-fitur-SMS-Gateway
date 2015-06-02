<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class proses_ubah extends CI_Controller {

   public function __construct(){
      parent::__construct();
      // Your own constructor code
      $this->load->model(array('m_admin', 'm_user', 'm_produk', 'm_content'));
      $this->load->helper(array('form', 'url', 'html'));
      $this->load->library(array('form_validation', 'session', 'user_agent'));
   }

   // public function tentang_kami() {
   //     if($this->session->userdata('login_admin')) {
   //         if(isset($_POST['simpan'])) {
   //             $this->m_admin->ubah_tentang_kami();
   //             echo '<script>';
   //             echo "alert('Halaman Berhasil Diubah');";
   //             echo "window.location='../admin/blog'";
   //             echo '</script>';
   //         } else {
   //             echo '<script>';
   //             echo "alert('Gagal Mengubah Halaman');";
   //             echo "window.location='../admin/blog'";
   //             echo '</script>';
   //         }
   //     } else {
   //         redirect('beranda/admin');
   //     }//end session
   // }//end function tentang kami

   // public function cara_pembelian() {
   //     if($this->session->userdata('login_admin')) {
   //         if(isset($_POST['simpan'])) {
   //             $this->m_admin->ubah_cara_pembelian();
   //             echo '<script>';
   //             echo "alert('Halaman Berhasil Diubah');";
   //             echo "window.location='../admin/blog'";
   //             echo '</script>';
   //         } else {
   //             echo '<script>';
   //             echo "alert('Gagal Mengubah Halaman');";
   //             echo "window.location='../admin/blog'";
   //             echo '</script>';
   //         }
   //     } else {
   //         redirect('beranda/admin');
   //     }//end session
   // }//end function cara pembelian

   // public function download_brosur() {
   //     if($this->session->userdata('login_admin')) {
   //         if(isset($_POST['simpan'])) {
   //             $this->m_admin->ubah_download_brosur();
   //             echo '<script>';
   //             echo "alert('Halaman Berhasil Diubah');";
   //             echo "window.location='../admin/blog'";
   //             echo '</script>';
   //         } else {
   //             echo '<script>';
   //             echo "alert('Gagal Mengubah Halaman');";
   //             echo "window.location='../admin/blog'";
   //             echo '</script>';
   //         }
   //     } else {
   //         redirect('beranda/admin');
   //     }//end session
   // }//end function download_brosur

   // public function hubungi_kami() {
   //     if($this->session->userdata('login_admin')) {
   //         if(isset($_POST['simpan'])) {
   //             $this->m_admin->ubah_hubungi_kami();
   //             echo '<script>';
   //             echo "alert('Halaman Berhasil Diubah');";
   //             echo "window.location='../admin/blog'";
   //             echo '</script>';
   //         } else {
   //             echo '<script>';
   //             echo "alert('Gagal Mengubah Halaman');";
   //             echo "window.location='../admin/blog'";
   //             echo '</script>';
   //         }
   //     } else {
   //         redirect('beranda/admin');
   //     }//end session
   // }//end function hubungi kami



   // public function biodata() {
   //     if($this->session->userdata('login_user')) {
   //         $this->form_validation->set_rules('username_admin', 'username_admin', 'trim|required|xss_clean');
   //         $this->form_validation->set_rules('nama_admin', 'nama_admin', 'trim|required|xss_clean');
   //         $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
   //         $this->form_validation->set_rules('telpon', 'Telpon', 'trim|required|numeric|max_length[15]|xss_clean');
   //         $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required|xss_clean');
   //         // $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|md5|max_length[50]|xss_clean');
   //         // $this->form_validation->set_rules('password_conf', 'Password Konfimasi', 'trim|required|matches[password]|md5|xss_clean');
   //         $run= $this->form_validation->run();

   //         if ($run == TRUE) {
   //             $this->m_admin->ubah_data_admin(); //kirim ke m_admin
   //             echo '<script>';
   //             echo "alert('Data Berhasil Diubah');";
   //             echo "window.location='../admin/pengaturan_admin'";
   //             echo '</script>';
   //         } else {
   //             $data['biodata'] = $this->m_admin->biodata_admin();
   //             $this->load->view('base/head_adm');

   //             $this->load->view('admin/header');
   //             $this->load->view('admin/sidebar_kiri');
   //             $this->load->view('admin/sisi_kanan',$data);
   //             $this->load->view('base/tail_adm');
   //         }
   //     } else {
   //         redirect('beranda/admin');
   //         }//end session
   // }//end function admin


   public function biodata() {
      if ($this->session->userdata('login_user')) {

         $this->form_validation->set_rules('nama', 'Nama', 'trim|required|xss_clean');
         if ($this->session->userdata('login_user')['status'] === 'penjual') {
            $this->form_validation->set_rules('username_user', 'Nama Toko', 'trim|required|max_length[15]|xss_clean');
         } else {
            $this->form_validation->set_rules('username_user', 'Nama Panggilan', 'trim|required|max_length[15]|xss_clean');
         }
         $this->form_validation->set_rules('email', 'Email', 'trim|required|max_length[50]|xss_clean'); //is_unique[data_user.email]|
         // $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|md5|max_length[50]|xss_clean');
         // $this->form_validation->set_rules('passwordconf', 'Password', 'trim|required|matches[password]|md5|xss_clean');
         $this->form_validation->set_rules('telpon', 'Telpon', 'trim|required|numeric|max_length[15]|xss_clean'); //is_unique[data_user.telpon]|
         $this->form_validation->set_rules('provinsi', 'Provinsi', 'trim|required|xss_clean');
         $this->form_validation->set_rules('kabupaten', 'Kabupaten', 'trim|required|xss_clean');
         $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'trim|required|xss_clean');
         $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required|xss_clean');
         $this->form_validation->set_rules('kode_pos', 'Kode Pos', 'trim|required|numeric|max_length[6]|xss_clean');

         if ($this->session->userdata('login_user')['status'] === 'penjual') {
            $this->form_validation->set_rules('PIN', 'PIN', 'trim|required|max_length[4]|numeric|xss_clean');
         } else {

         }

         $run= $this->form_validation->run();
         if ($run == TRUE) {

            $id_user = $_POST['id_user'];
            $this->db->where('id_user', $id_user);

            $this->nama = $this->input->post('nama');
            $this->username_user = $this->input->post('username_user'); // cara Setting supaya jika username lebih dari 10 karakter maka muncul pesan error edit profil gagal
            $this->email = $this->input->post('email');
            $this->telpon = $this->input->post('telpon');
            $this->id_provinsi = $this->input->post('provinsi');
            $this->id_kota = $this->input->post('kabupaten');
            $this->id_kecamatan = $this->input->post('kecamatan');
            $this->alamat = $this->input->post('alamat');
            $this->kode_pos = $this->input->post('kode_pos');
            if ($this->session->userdata('login_user')['status'] === 'penjual') {
               $this->PIN = $this->input->post('PIN');
            } else {
               # code...
            }

            $this->kode_pos = $this->input->post('kode_pos');

            if (!empty($_POST['provinsi'])&&!empty($_POST['kabupaten'])&&!empty($_POST['kecamatan'])) {
               $mysession = $this->session->userdata('login_user');
               $sess_array = array(
                  'id_user' => $mysession['id_user'],
                  'username_user' => $this->input->post('username_user'),
                  'nama' => $this->input->post('nama'),
                  'email' => $this->input->post('email'),
                  'img_user' => $mysession['img_user'],
                  'status' => $mysession['status'],
                  'pass_user' => $mysession['pass_user'],
               );

               $this->session->set_userdata('login_user', $sess_array);

               $this->db->update('data_user', $this);
               echo '<script>';
               echo "alert('Biodata Berhasil Diubah');";
               echo "window.location='".$this->agent->referrer()."'";
               echo '</script>';
            } else {
               echo '<script>';
               echo "alert('Ubah biodata gagal, mohon lengkapi alamat Anda');";
               echo "window.location='".$this->agent->referrer()."'";
               echo '</script>';
            }
         } else {
            echo '<script>';
            echo "alert('Ubah biodata gagal, Mohon perhatikan ketentuan masing-masing Form ".
            strip_tags(form_error('nama')).
            strip_tags(form_error('username_user')).
            strip_tags(form_error('email')).strip_tags(form_error('telpon')).strip_tags(form_error('alamat')).strip_tags(form_error('kode_pos')).
            strip_tags(form_error('kecamatan'))
            ."');";
            echo "window.location='".$this->agent->referrer()."'";
            echo '</script>';
         }





      } else {
         redirect('home');
      }
   }//end function biodata
   public function pass_user() {
      if ($this->session->userdata('login_user')) {
         //  $id_user = $_POST['id_user'];
         $pass_user = $this->session->userdata('login_user')['pass_user'];
         // $this->db->where('id_user', $id_user);


         $this->form_validation->set_rules('newpassword', 'Password', 'trim|required|min_length[6]|md5|max_length[50]|xss_clean');
         $this->form_validation->set_rules('newpasswordconf', 'Password Konfimasi', 'trim|required|matches[newpassword]|md5|xss_clean');
         $run= $this->form_validation->run();


         $password_lama = MD5($this->input->post('passwordlama'));
         $newpassword = $this->input->post('newpassword');
         //$sess_array = array();

         if ($run == TRUE ) {
            if ($pass_user == $password_lama) {
               $mysession = $this->session->userdata('login_user');
               $sess_array = array(
                  'id_user' => $mysession['id_user'],
                  'username_user' => $mysession['username_user'],
                  'nama' => $mysession['nama'],
                  'email' => $mysession['email'],
                  'img_user' => $mysession['img_user'],
                  'status' => $mysession['status'],
                  'pass_user' => $this->input->post('newpassword')
               );

               $this->session->set_userdata('login_user', $sess_array);

               $this->m_user->ubah_pass_user();

               echo '<script>';
               echo "alert('Password Berhasil Dirubah');";
               echo "window.location='".$this->agent->referrer()."'";
               echo '</script>';
            } else {
               echo '<script>';
               echo "alert('Gagal Ubah password, Password lama tidak sesuai');";
               echo "window.location='".$this->agent->referrer()."'";
               echo '</script>';
            }
         } else {
            echo '<script>';
            echo "alert('Konfimasi Password tidak sama, atau Password kurang dari 6 karakter.');";
            echo "window.location='".$this->agent->referrer()."'";
            echo '</script>';
         }
      } else {
         redirect('home');
      }
   }

   public function foto() {
      if ($this->session->userdata('login_user')) {
         $id_user = $this->session->userdata('login_user')['id_user'];
         $foto_user = $this->m_user->foto_user($id_user);//mengambil data foto yang akan diubah dan dihapus

         $foto = $_FILES['foto'];
         $nama = $foto['name'];


         // $nama = str_replace(' ', '_', $nama);

         $config['upload_path'] = './assets/img/photo/';
         $config['allowed_types'] = 'gif|jpg|png';
         $config['max_size'] = '500';
         // $config['max_width']  = '1024';
         // $config['max_height']  = '768';
         $config['overwrite'] = false;
         $config['encrypt_name'] = true;
         $this->load->library('upload');
         $this->upload->initialize($config);


         if ($this->upload->do_upload('foto')) {
            $path_foto = './assets/img/photo/'.$foto_user;//lokasi foto yang akan dihapus
            $pp =$this->upload->data('file_name');
            $pp = $pp['file_name'];
            if ($foto_user != 'default.jpg') {
               unlink($path_foto);
               $data = array('img_user'=>$pp);
               $this->db->where('id_user', $id_user);
               $this->db->update('data_user', $data);

               //JIka nama file sebelumnya bukan default.jpg maka diapus
               $mysession = $this->session->userdata('login_user');
               $sess_array = array(
                  'id_user' => $mysession['id_user'],
                  'username_user' => $mysession['username_user'],
                  'nama' => $mysession['nama'],
                  'email' => $mysession['email'],
                  'img_user' => $pp,
                  'status' => $mysession['status'],
                  'pass_user' => $mysession['pass_user'],
               );

               $this->session->set_userdata('login_user', $sess_array);
            } else {
               $data = array('img_user'=>$pp);
               $this->db->where('id_user', $id_user);
               $this->db->update('data_user', $data);

               $mysession = $this->session->userdata('login_user');
               $sess_array = array(
                  'id_user' => $mysession['id_user'],
                  'username_user' => $mysession['username_user'],
                  'nama' => $mysession['nama'],
                  'email' => $mysession['email'],
                  'img_user' => $pp,
                  'status' => $mysession['status'],
                  'pass_user' => $mysession['pass_user'],
               );

               $this->session->set_userdata('login_user', $sess_array);
            }
            echo '<script>';
            echo "alert('Foto Berhasil Diubah');";
            echo "window.location='../home/profile_user'";
            echo '</script>';

         } else {

            echo '<script>';
            echo "alert('Foto Gagal Diubah');";
            echo "window.location='../home/profile_user'";
            echo '</script>';
         }
      } else {
         redirect('beranda');
      }
   }//end function foto


   ////////////////////Produk AREA
   public function foto_produk() {
      if ($this->session->userdata('login_user')) {
         $id_gambar = $this->input->post('id_gambar');
         $foto_produk = $this->m_produk->foto_produk($id_gambar);//mengambil data foto yang akan diubah dan dihapus

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

            $path_foto = './doc/themes/public/img/produk/'.$foto_produk;//lokasi foto yang akan dihapus
            $pp =$this->upload->data('file_name');
            $pp = $pp['file_name'];

            unlink($path_foto);
            $data = array('gambar'=>$pp);
            $this->db->where('id_gambar', $id_gambar);
            $this->db->update('gambar', $data);

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
            echo "alert('Gambar produk Berhasil Diubah');";
            echo "window.location='".$this->agent->referrer()."'";
            echo '</script>';

         } else {

            echo '<script>';
            echo "alert('Foto Gagal Diubah, Foto terlalu besar atau format gambar tidak sesuai..');";
            echo "window.location='".$this->agent->referrer()."'";
            echo '</script>';
         }
      } else {
         redirect('beranda');
      }
   }//end function foto prduk



   public function foto_utama_produk() {
      if ($this->session->userdata('login_user')) {
         $id_produk = $this->input->post('id_produk');
         $foto_produk = $this->m_produk->show_detail_produk($id_produk)['img_produk'];//mengambil data foto yang akan diubah dan dihapus

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

            $path_foto = './doc/themes/public/img/produk/'.$foto_produk;//lokasi foto yang akan dihapus
            $pp =$this->upload->data('file_name');
            $pp = $pp['file_name'];

            unlink($path_foto);
            $data = array('img_produk'=>$pp);
            $this->db->where('id_produk', $id_produk);
            $this->db->update('data_produk', $data);

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
            echo "alert('Gambar produk Berhasil Diubah');";
            echo "window.location='".$this->agent->referrer()."'";
            echo '</script>';

         } else {

            echo '<script>';
            echo "alert('Foto Gagal Diubah, Foto terlalu besar atau format gambar tidak sesuai..');";
            echo "window.location='".$this->agent->referrer()."'";
            echo '</script>';
         }
      } else {
         redirect('beranda');
      }
   }//end function foto prduk





   public function detail_produk() {
      if ($this->session->userdata('login_user')) {

         $this->form_validation->set_rules('nama_produk', 'Nama', 'trim|required|xss_clean');
         $this->form_validation->set_rules('stok_produk', 'Stok produk', 'trim|required|numeric|xss_clean');
         $this->form_validation->set_rules('harga_produk', 'Harga produk', 'trim|required|numeric|xss_clean'); //is_unique[data_user.email]|
         // $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|md5|max_length[50]|xss_clean');
         // $this->form_validation->set_rules('passwordconf', 'Password', 'trim|required|matches[password]|md5|xss_clean');
         $this->form_validation->set_rules('berat_produk', 'Berat produk', 'trim|required|numeric|xss_clean'); //is_unique[data_user.telpon]|
         $this->form_validation->set_rules('katagoriproduk', 'Katagori produk', 'trim|required|xss_clean');
         $this->form_validation->set_rules('jenis_produk', 'Jenis produk', 'trim|xss_clean');
         $this->form_validation->set_rules('deskripsi_produk', 'Deskripsi produk', 'trim|required|xss_clean');
         // $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required|xss_clean');
         // $this->form_validation->set_rules('kode_pos', 'Kode Pos', 'trim|required|numeric|max_length[6]|xss_clean');

         $run= $this->form_validation->run();
         if ($run == TRUE) {

            $id_produk = $_POST['id_produk'];
            $this->db->where('id_produk', $id_produk);

            $this->nama_produk = $this->input->post('nama_produk');
            $this->stok_produk = $this->input->post('stok_produk'); // cara Setting supaya jika username lebih dari 10 karakter maka muncul pesan error edit profil gagal
            $this->harga_produk = $this->input->post('harga_produk');
            $this->berat_produk = $this->input->post('berat_produk');
            $this->katagori_id = $this->input->post('katagoriproduk');
            $this->jenis_produk_id = $this->input->post('jenis_produk');
            $this->deskripsi_produk = $this->input->post('deskripsi_produk');
            // $this->alamat = $this->input->post('alamat');
            // $this->kode_pos = $this->input->post('kode_pos');

            $this->db->update('data_produk', $this);
            echo '<script>';
            echo "alert('Data produk Berhasil Diubah');";
            echo "window.location='".$this->agent->referrer()."'";
            echo '</script>';

         } else {
            echo '<script>';
            echo "alert('Ubah data produk gagal, Mohon perhatikan ketentuan masing-masing Form |".
            strip_tags(form_error('nama_produk')).
            strip_tags(form_error('stok_produk')).
            strip_tags(form_error('harga_produk')).strip_tags(form_error('berat_produk')).strip_tags(form_error('katagoriproduk')).strip_tags(form_error('jenis_produk')).
            strip_tags(form_error('deskripsi_produk'))
            ."');";
            echo "window.location='".$this->agent->referrer()."'";
            echo '</script>';
         }
      } else {
         redirect('home');
      }
   }//end function biodata






   /////////////ADMIN AREA
   public function foto_admin() {
      if($this->session->userdata('login_admin')) {
         $id_admin = $this->session->userdata('login_admin')['id_admin'];
         $foto_admin = $this->m_admin->foto_admin($id_admin);//mengambil foto yang akan dihapus

         $foto = $_FILES['foto'];
         $nama = $foto['name'];
         $nama = str_replace(' ', '_', $nama);

         $config['upload_path'] = './resource/img/';
         $config['allowed_types'] = 'gif|jpg|png';
         $config['max_size'] = '500';
         // $config['max_width']  = '1024';
         // $config['max_height']  = '768';
         $config['overwrite'] = true;
         $this->load->library('upload');
         $this->upload->initialize($config);

         if ($this->upload->do_upload('foto')) {
            $path = './resource/img/'.$foto_admin;//lokasi foto yang akan dihapus
            if(unlink($path)) {//jika file sudah dihapus maka update foto
               $data = array('foto'=>$nama);
               $this->db->where('id_admin', $id_admin);
               $this->db->update('admin', $data);
            }
            echo '<script>';
            echo "alert('Foto Berhasil Diubah');";
            echo "window.location='".$this->agent->referrer()."'";
            echo '</script>';

         } else {

            echo '<script>';
            echo "alert('Foto Gagal Diubah');";
            echo "window.location='".$this->agent->referrer()."'";
            echo '</script>';
         }
      } else {
         redirect('beranda/admin');
      }//end session
   }//end function foto_admin

   public function biodata_admin() {
      if($this->session->userdata('login_admin')) {
         $this->form_validation->set_rules('username_admin', 'username_admin', 'trim|required|max_length[10]|xss_clean');
         $this->form_validation->set_rules('nama_admin', 'nama_admin', 'trim|required|xss_clean');
         $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
         $this->form_validation->set_rules('telpon', 'Telpon', 'trim|required|numeric|max_length[15]|xss_clean');
         $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required|xss_clean');
         // $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|md5|max_length[50]|xss_clean');
         // $this->form_validation->set_rules('password_conf', 'Password Konfimasi', 'trim|required|matches[password]|md5|xss_clean');
         $run= $this->form_validation->run();

         if ($run == TRUE) {
            $this->m_admin->ubah_data_admin(); //kirim ke m_admin
            echo '<script>';
            echo "alert('Data Berhasil Diubah');";
            echo "window.location='../admin/pengaturan_admin'";
            echo '</script>';
         } else {
            $data['biodata'] = $this->m_admin->biodata_admin();
            $this->load->view('base/head_adm');

            $this->load->view('admin/header');
            $this->load->view('admin/sidebar_kiri');
            $this->load->view('admin/sisi_kanan',$data);
            $this->load->view('base/tail_adm');
         }
      } else {
         redirect('beranda/admin');
      }//end session
   }//end function admin




   public function pass_admin() {
      if ($this->session->userdata('login_admin')) {
         //  $id_user = $_POST['id_user'];
         $pass_admin = $this->session->userdata('login_admin')['pass_admin'];
         // $this->db->where('id_user', $id_user);


         $this->form_validation->set_rules('newpassword', 'Password', 'trim|required|min_length[6]|md5|max_length[50]|xss_clean');
         $this->form_validation->set_rules('newpasswordconf', 'Password Konfimasi', 'trim|required|matches[newpassword]|md5|xss_clean');
         $run= $this->form_validation->run();


         $password_lama = MD5($this->input->post('passwordlama'));
         $newpassword = $this->input->post('newpassword');
         //$sess_array = array();

         if ($run == TRUE ) {
            if ($pass_admin == $password_lama) {
               $mysession = $this->session->userdata('login_admin');
               $sess_array = array(
                  'id_admin' => $mysession['id_admin'],
                  'username_admin' => $mysession['username_admin'],
                  'nama_admin' => $mysession['nama_admin'],
                  // 'email' => $mysession['email'],
                  // 'img_user' => $mysession['img_user'],
                  'stts' => $mysession['stts'],
                  'pass_admin' => $this->input->post('newpassword')
               );

               $this->session->set_userdata('login_admin', $sess_array);

               $this->m_admin->ubah_pass_admin();

               echo '<script>';
               echo "alert('Password Berhasil Dirubah');";
               echo "window.location='".$this->agent->referrer()."'";
               echo '</script>';
            } else {
               echo '<script>';
               echo "alert('Gagal Ubah password, Password lama tidak sesuai');";
               echo "window.location='".$this->agent->referrer()."'";
               echo '</script>';
            }
         } else {
            echo '<script>';
            echo "alert('Konfimasi Password tidak sama, atau Password kurang dari 6 karakter.');";
            echo "window.location='".$this->agent->referrer()."'";
            echo '</script>';
         }
      } else {
         redirect('admin/home');
      }
   }

   public function ubah_bank() {

      //is_unique[user.email]=user nama tabel, email nama kolom
      //Nama=pesan validasi, nama=nama field form
      $id_bank = $_POST['id_bank'];
      $this->form_validation->set_rules('nama_bank', 'Nama bank', 'trim|required|xss_clean');
      $this->form_validation->set_rules('atas_nama', 'Atas nama', 'trim|required|xss_clean');
      $this->form_validation->set_rules('nomor_rekening', 'Nomor Rekening', 'trim|required|xss_clean');


      //untuk form daftar
      if($this->form_validation->run() == FALSE) {
         //agar tetap di halaman daftar dan menampilkan validasi error. jika menggunakan redirect validasi tidak muncul.
         echo '<script>';
         echo "alert('Edit data Bank gagal, Mohon perhatikan ketentuan masing-masing Form ".
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
         $this->db->where('id_bank', $id_bank);
         $this->db->update('bank', $this);
         echo '<script>';
         echo "alert('Berhasil Merubah data Bank');";
         echo "window.location='".$this->agent->referrer()."'";
         echo '</script>';
      }
   }

   public function edit_page() {
      $id_page = $_POST['id_page'];
      $this->isi_berita = $_POST['editorAboutUs'];
      $this->tanggal_berita = date("Y-m-d H:i:s");
      //is_unique[user.email]=user nama tabel, email nama kolom
      // $this->form_validation->set_rules('editorAboutUs', 'Content Tentang kami', 'trim|required|xss_clean');
      // $this->form_validation->set_rules('atas_nama', 'Atas nama', 'trim|required|xss_clean');
      // $this->form_validation->set_rules('nomor_rekening', 'Nomor Rekening', 'trim|required|xss_clean');
      $this->db->where('id_berita',$id_page);
      $this->db->update('berita_intermezzo',$this);
      echo '<script>';
      echo "alert('Berhasil Merubah Halaman -Tentang Kami-');";
      echo "window.location='".$this->agent->referrer()."'";
      echo '</script>';
   }

   public function edit_page_full() {
      $id_page = $_POST['id_page'];
      $now = date("Y-m-d H:i:s");
      // $this->isi_berita = $_POST['editorAboutUs'];
      // $this->tanggal_berita = date("Y-m-d H:i:s");
      // $this->db->where('id_berita',$id_page);
      // $this->db->update('berita_intermezzo',$this);
      // echo '<script>';
      // echo "alert('Berhasil Merubah Halaman -Tentang Kami-');";
      // echo "window.location='".$this->agent->referrer()."'";
      // echo '</script>';
      $this->form_validation->set_rules('isi_berita', 'Isi Berita', 'trim|required');
      $this->form_validation->set_rules('judul', 'Nama Rekening Pengirim', 'trim|required');

      $img = $_POST['img_berita'];//mengambil data foto yang akan diubah dan dihapus

      $foto = $_FILES['img_berita'];
      $nama = $foto['name'];

      $config['upload_path'] = './assets/img/berita-content/';
      $config['allowed_types'] = 'gif|jpg|png|jpeg';
      $config['max_size'] = '5000';
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
         echo "alert('Input data Banner gagal, Mohon perhatikan ketentuan masing-masing Form ".
         strip_tags(form_error('judul')).
         strip_tags(form_error('isi_berita'))."');";
         echo "window.location='".$this->agent->referrer()."'";
         echo '</script>';


      } else {

         if (empty($_FILES['img_berita']['name'])) {
            // $pp = $pp['file_name'];
            $data = array('judul'=>$_POST['judul'],
            'tanggal_berita'=>$now,
            'isi_berita'=>$_POST['isi_berita']
         );
         $this->db->where('id_berita',$id_page);
         $this->db->update('berita_intermezzo',$data);

         echo '<script>';
         echo "alert('Data Berita Berhasil Diubah');";
         echo "window.location='".$this->agent->referrer()."'";
         echo '</script>';

      } else {

         // mulai upload foto
         if ($this->upload->do_upload('img_berita')) {

            $path_foto = './assets/img/berita-content/'.$img;//lokasi foto yang akan dihapus
            $pp =$this->upload->data('file_name');
            $pp = $pp['file_name'];

            if (!empty($img)) {
               unlink($path_foto);
            } else {
            }
            $data = array('img_berita'=>$pp,
            'judul'=>$_POST['judul'],
            'isi_berita'=>$_POST['isi_berita'],
            'tanggal_berita'=>$now
         );
         $this->db->where('id_berita',$id_page);
         $this->db->update('berita_intermezzo',$data);

         echo '<script>';
         echo "alert('Data Berita Berhasil Diubah');";
         echo "window.location='".$this->agent->referrer()."'";
         echo '</script>';

      } else {

         echo '<script>';
         echo "alert('Berita gagal Diubah, Foto terlalu besar atau format gambar tidak sesuai..');";
         echo "window.location='".$this->agent->referrer()."'";
         echo '</script>';
      }
      // Selesai upload foto

   }
}


}



public function set_banner() {
   if ($this->session->userdata('login_admin')) {
      $id_banner = $this->input->post('id_banner');
      $this->form_validation->set_rules('judul', 'Judul', 'trim|required|xss_clean');
      $this->form_validation->set_rules('link', 'Link', 'trim|required|xss_clean');
      $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required|xss_clean');

      $img = $this->m_content->banner_byid($id_banner)['img'];//mengambil data foto yang akan diubah dan dihapus

      $foto = $_FILES['img'];
      $nama = $foto['name'];

      $config['upload_path'] = './doc/themes/public/images/slider/';
      $config['allowed_types'] = 'gif|jpg|png|jpeg';
      $config['max_size'] = '5000';
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
            echo "alert('Input data Banner gagal, Mohon perhatikan ketentuan masing-masing Form ".
            strip_tags(form_error('judul')).
            strip_tags(form_error('link')).
            strip_tags(form_error('deskripsi'))."');";
            echo "window.location='".$this->agent->referrer()."'";
            echo '</script>';


         } else {

            if (empty($_FILES['img']['name'])) {
               // $pp = $pp['file_name'];
               $data = array('judul'=>$_POST['judul'],
               'link'=>$_POST['link'],
               'deskripsi'=>$_POST['deskripsi']
            );
            $this->db->where('id_banner', $id_banner);
            $this->db->update('set_banner', $data);

            echo '<script>';
            echo "alert('Data Banner Berhasil Diubah');";
            echo "window.location='".$this->agent->referrer()."'";
            echo '</script>';

            } else {


               // mulai upload foto
               if ($this->upload->do_upload('img')) {

                  $path_foto = './doc/themes/public/images/slider/'.$img;//lokasi foto yang akan dihapus
                  $pp =$this->upload->data('file_name');
                  $pp = $pp['file_name'];

                  if (!empty($img)) {
                     unlink($path_foto);
                  } else {
                  }
                  $data = array('img'=>$pp,
                  'judul'=>$_POST['judul'],
                  'link'=>$_POST['link'],
                  'deskripsi'=>$_POST['deskripsi']
               );
               $this->db->where('id_banner', $id_banner);
               $this->db->update('set_banner', $data);

               echo '<script>';
               echo "alert('Data Banner Berhasil Diubah');";
               echo "window.location='".$this->agent->referrer()."'";
               echo '</script>';

               } else {

                  echo '<script>';
                  echo "alert('Banner gagal Diubah, Foto terlalu besar atau format gambar tidak sesuai..');";
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

public function proses_edit_konfirmasi_pembayaran() {
   $data['kode_transaksi'] = $_POST['kode_transaksi'];
   $this->form_validation->set_rules('kode_transaksi', 'Kode Transaksi', 'trim|required|xss_clean');
   $this->form_validation->set_rules('nama_pengirim', 'Nama Rekening Pengirim', 'trim|required|xss_clean');
   $this->form_validation->set_rules('tanggal_transfer', 'Tanggal Transfer', 'trim|required|xss_clean');
   $this->form_validation->set_rules('jumlah_transfer', 'Jumlah Transfer', 'trim|required|numeric|xss_clean'); //is_unique[data_user.email]|
   // $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|md5|max_length[50]|xss_clean');
   // $this->form_validation->set_rules('passwordconf', 'Password', 'trim|required|matches[password]|md5|xss_clean');
   $this->form_validation->set_rules('bank_pengirim', 'Bank Pengirim', 'trim|required|xss_clean'); //is_unique[data_user.telpon]|
   $this->form_validation->set_rules('bank_tujuan', 'Bank Tujuam', 'trim|required|xss_clean');
   $this->form_validation->set_rules('metode_pembayaran', 'Metode Pembayaran', 'trim|required|xss_clean');

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

      $this->m_produk->update_konfirmasi_pembayaran();
      echo '<script>';
      echo "alert('Berhasil Merubah konfirmasi pembayaran');";
      echo "window.location='../home/profile_user'";
      echo '</script>';
   }
}
   //ubah tstimonial
   public function ubahTestimoni()
   {
      $idTesti = $_GET['id'];//get id testi
      $newTesti = $_POST['newTesti'];//get new testi
      $this->db->where('id_testi',$idTesti);
      $this->db->update('data_testimonial',array('pesan'=>$newTesti,'waktu'=>date('Y-m-d H:i:s')));
      return redirect($this->agent->referrer());
   }

}//end class
?>
