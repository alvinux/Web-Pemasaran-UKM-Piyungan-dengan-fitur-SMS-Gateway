<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class proses_ubah extends CI_Controller {

    public function __construct(){
        parent::__construct();
      // Your own constructor code
        $this->load->model(array('m_admin', 'm_user'));
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

    public function biodata() {
        if ($this->session->userdata('login_user')) {
        $id_user = $_GET['id_user'];
        $this->db->where('id_user', $id_user);

        $this->nama = $this->input->post('nama');
        $this->email = $this->input->post('email');
        $this->telepon = $this->input->post('telepon');
        $this->id_provinsi = $this->input->post('provinsi');
        $this->id_kab_kota = $this->input->post('kabupaten');
        $this->id_kecamatan = $this->input->post('kecamatan');
        $this->alamat = $this->input->post('alamat');
        $this->kode_pos = $this->input->post('kode_pos');
        
        if (!empty($_POST['provinsi'])&&!empty($_POST['kabupaten'])&&!empty($_POST['kecamatan'])) {
            $this->db->update('user', $this);
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
            redirect('beranda');
        }
    }//end function biodata

    public function foto() {
        if ($this->session->userdata('login_user')) {
        $id_user = $this->session->userdata('login_user')['id_user'];
        $foto_user = $this->m_admin->foto_user($id_user);//mengambil data foto yang akan diubah dan dihapus

        $foto = $_FILES['foto'];
        $nama = $foto['name'];
        $nama = str_replace(' ', '_', $nama);

        $config['upload_path'] = './resource/img/photo/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '500';
        // $config['max_width']  = '1024';
        // $config['max_height']  = '768';
        $config['overwrite'] = true;
        $this->load->library('upload');
        $this->upload->initialize($config);

        if ($this->upload->do_upload('foto')) {            
            //$path_foto = './resource/img/photo/'.$foto_user;//lokasi foto yang akan dihapus
            //if (unlink($path_foto)) {
                $data = array('foto'=>$nama);
                $this->db->where('id_user', $id_user);
                $this->db->update('user', $data);
            //}tidak berfungsi jika baru daftar. soalnya gambar tidak ada di folder
            echo '<script>';
            echo "alert('Foto Berhasil Diubah');";
            echo "window.location='../beranda/biodata'";
            echo '</script>';

        } else {

            echo '<script>';
            echo "alert('Foto Gagal Diubah');";
            echo "window.location='../beranda/biodata'";
            echo '</script>';
        }
        } else {
            redirect('beranda');
        }
    }//end function foto

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
	        $this->form_validation->set_rules('username_admin', 'username_admin', 'trim|required|xss_clean');
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
	    if($this->session->userdata('login_admin')) {
	        $this->form_validation->set_rules('password', 'Password lama', 'trim|required|matches[data_admin.password]|min_length[6]|md5|max_length[50]|xss_clean');
	        $this->form_validation->set_rules('newpassword', 'Password', 'trim|required|matches[password]|md5|xss_clean');
	        $this->form_validation->set_rules('newpasswordconf', 'Password Konfimasi', 'trim|required|matches[newpassword]|md5|xss_clean');
	        $run= $this->form_validation->run();

	        if ($run == TRUE) {
	            $this->m_admin->ubah_pass_admin(); //kirim ke m_admin
	            echo '<script>';
	            echo "alert('Password Berhasil Diubah');";
	            echo "window.location='../admin/pengaturan_admin'";
	            echo '</script>';
	        } else {
	        	echo '<script>';
	            echo "alert('Password Gagal Diubah, ".form_error('password')."".form_error('password_conf')."');";
	            echo "window.location='../admin/pengaturan_admin'";
	            echo '</script>';
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


}//end class
?>