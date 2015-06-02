<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'application/controllers/base.php';

class Ajax extends Base {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('m_produk','m_user','m_content'));
		$this->load->library(array('user_agent'));
	}

	function modal_konfirmasi(){
		// print_r($_POST);
		$id_user = $this->session->userdata('login_user')['id_user'];
		$data['kode_transaksi'] = $_POST['kode'];
		$data['bank'] = $this->m_content->bank();
		$data['konfirmasi_pembayaran'] = $this->m_produk->show_konfirmasi_pembayaran_by_kode_transaksi($_POST['kode']);
		//print_r($data['konfirmasi_pembayaran']);
			$this->load->view('general/modal/modal_konfirmasi_pembayaran',$data);
	}


	function modal_detail_penjual(){
		// print_r($_POST); 
		$id_penjual = $_POST['id'];
		$data['katagoriproduk'] = $this->m_content->katagoriproduk();
		$data['id_penjual'] = $id_penjual;
		$data['biodata'] = $this->m_user->biodata_byID($id_penjual);
		$id_prov = $data['biodata']['id_provinsi'];
		$data['provinsi'] = $this->m_content->provinsi();
		$data['kab_kota'] = $this->m_content->kab_kota($id_prov);
		// $id_penjual = $this->session->userdata['login_user']['id_user'];
		$this->load->view('general/profile_penjual',$data);
		$this->load->view('general/modal/modal_tambah_produk',$data);
		// $data['kode_transaksi'] = $_POST['kode'];
		// $data['bank'] = $this->m_content->bank();
		// $data['konfirmasi_pembayaran'] = $this->m_produk->show_konfirmasi_pembayaran_by_kode_transaksi($_POST['kode']);
		//print_r($data['konfirmasi_pembayaran']);
		// if (empty($data['konfirmasi_pembayaran'])) {
		// 	$this->load->view('general/modal/modal_konfirmasi_pembayaran',$data);
		// } else {
		// 	$this->load->view('general/modal/modal_konfirmasi_pembayaran',$data);
		// }
		
	}

	function detail_penjual(){
		$id_penjual = $_POST['id'];
     	$mysession = $this->m_user->data_penjual($id_penjual);
        $sess_array = array(
            'id_user' => $mysession['id_user'],
            'username_user' => $mysession['username_user'],
            'nama' => $mysession['nama'],
            'email' => $mysession['email'],
            'img_user' => $mysession['img_user'],
            'status' => $mysession['status'],
            'pass_user' => $mysession['pass_user'],
            );

    $this->session->set_userdata('login_user', $sess_array);

	}


	function ongkos_kirim(){
		$origin = $_GET['origin'];
		$destination = $_GET['destination'];
		$weight = $_GET['weight'];
		$courier = $_GET['courier'];
		$cost = $this->hitungOngkir($origin,$destination,$weight,$courier);
		//parse json
		$costarray = json_decode($cost);
		$results = $costarray->rajaongkir->results;
		echo '<br/>';
		// print_r($results);
		if(!empty($results)){
			foreach($results as $r):
				if (empty($r->costs)) {
					echo "'paket tidak tersedia'";
					# code...
				} else {
					# code...
				foreach($r->costs as $rc):
					foreach($rc->cost as $rcc):
						echo '<label><input onclick="totalOngkir()" type="radio" id="pilihpaket" name="pilihpaket" value="'.$rcc->value.'">'.$r->code.'<br/>'.$rc->service.'<br/>'.$rc->description.'Rp.'.number_format($rcc->value).'</label><br/>';
					endforeach;
				endforeach;
				}
				
			endforeach;
		}else{
			echo "'paket tidak tersedia'";
		}

		// $paket = $this->input->post('paket');
		// if ($paket == "JNE") {
		// 	echo '<div class="col-md-12"><span><b>JNE</b></span><br>
		// 		<input type="radio" name="jne" value="jne_reg">JNE REG<br>
		// 		<input type="radio" name="jne" value="jne_reg">JNE OKE<br>
		// 		<input type="radio" name="jne" value="jne_reg">JNE YES<br>
		// 	</div>';
		// 	# code...
		// } else {
		// 	# code...
		// }
	}


	function hapus_bank(){
		// print_r($_POST); 
		$id_bank = $_POST['id'];
		$this->db->where('id_bank',$id_bank);
		$this->db->delete('bank');
		
		 	echo '<script>';
            echo "alert('Berhasil menghapus Bank')";
            echo "window.location='".$this->agent->referrer()."'";
            echo '</script>';
	}

	function hapus_banner(){
		// print_r($_POST); 
		$id_banner = $_POST['id'];

		$img = $this->m_content->banner_byid($id_banner)['img']; // mengambil data nama banner yang akan dihapus
		$path_foto = './doc/themes/public/images/slider/'.$img;//lokasi foto yang akan dihapus
		if (!empty($img)) {
	            unlink($path_foto);
	       } else {
	    }
		
		 $data = array('judul'=> "",
                       'link'=>"",
                       'deskripsi'=>"",
                       'img'=>""
                       );
		$this->db->where('id_banner',$id_banner);
		$this->db->update('set_banner',$data);
		
	 	echo '<script>';
        echo "alert('Berhasil Mereset Banner')";
        echo "window.location='".$this->agent->referrer()."'";
        echo '</script>';
	}

	function hapusBerita(){
		// print_r($_POST); 
		$id_berita = $_POST['id'];

		$img = $this->m_content->show_page_byid($id_berita)['img_berita']; // mengambil data nama banner yang akan dihapus
		$path_foto = './assets/img/berita-content/'.$img;//lokasi foto yang akan dihapus
		if (!empty($img)) {
	            unlink($path_foto);
	       } else {
	       }
		$this->db->where('id_berita',$id_berita);
		$this->db->delete('berita_intermezzo');
		
	 	echo '<script>';
        echo "alert('Berhasil Mengahpus Berita')";
        echo "window.location='".$this->agent->referrer()."'";
        echo '</script>';
	}

	function hapusProduk(){
		// print_r($_POST); 
		$id_produk = $_POST['id'];

		$img = $this->m_produk->show_detail_produk($id_produk)['img_produk']; // mengambil data nama banner yang akan dihapus
		$path_foto = './doc/themes/public/img/produk/'.$img;//lokasi foto yang akan dihapus
		if (!empty($img)) {
	            unlink($path_foto);
	       } else {
	       }
	    $hapusimgproduk =  $this->m_produk->all_gambar_by_id($id_produk);
	    foreach ($hapusimgproduk as $gbr) {
	    	unlink('./doc/themes/public/img/produk/'.$gbr['gambar']);
	    }
		$this->db->where('id_produk',$id_produk);
		$this->db->delete('data_produk');

		$sql = 'DELETE FROM gambar WHERE id_produk = ?';
		$this->db->query($sql,$id_produk);
		
	 	echo '<script>';
        echo "alert('Berhasil Menghapus Produk')";
        echo "window.location='".$this->agent->referrer()."'";
        echo '</script>';
	}


	function hapus_imgProduk(){
		// print_r($_POST); 
		$id_gambar = $_POST['id'];

		$img = $this->m_produk->foto_produk($id_gambar); // mengambil data nama banner yang akan dihapus
		$path_foto = './doc/themes/public/img/produk/'.$img;//lokasi foto yang akan dihapus
		if (!empty($img)) {
	            unlink($path_foto);
	       } else {
	    }

		$this->db->where('id_gambar',$id_gambar);
		$this->db->delete('gambar');
		
	 	echo '<script>';
        echo "alert('Berhasil menghapus Gambar')";
        echo "window.location='".$this->agent->referrer()."'";
        echo '</script>';
	}


	// ADMIN AREA
	function modal_editBerita(){
		// print_r($_POST);
		$id_berita = $_POST['id'];
		$data['berita'] = $this->m_content->show_page_byid($id_berita);
		//print_r($data['konfirmasi_pembayaran']);
			$this->load->view('admin/modal/modal_new_berita',$data);
	}


	
}

?>