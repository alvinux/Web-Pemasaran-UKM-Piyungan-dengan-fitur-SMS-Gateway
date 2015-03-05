<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
require_once 'application/controllers/base.php';
class Cart_control extends Base {
	
	public function __construct(){
		parent::__construct();
		$this->load->library(array('session', 'user_agent'));
        // memanggil model m_beranda
		$this->load->model(array('m_user', 'm_admin','m_produk'));
	}

	//tambah ke cart
	public function add_cart(){
		$id_produk = $_POST['id_produk'];
		$harga = $_POST['harga'];
		$jumlah = $_POST['jumlah'];
		//query menampilkan detail barang berdasasrkan id barang
		$this->db->where('id_produk',$id_produk);
		$queryprod = $this->db->get('data_produk');
		$queryprod = $queryprod->row_array();
		//instanisasi
		$produk = $querybarang['data_produk'];
		$harga_asli = $querybarang['harga'];//harga asli
		$total_harga_asli = $harga_asli * $jumlah;
		$berat = $querybarang['berat'];//berat barang perunit
		$total_berat = $berat * $jumlah;

		//memasukan ke dalam cart
		$insert = array(
			'id'=>$id_produk,
			'qty'=>$jumlah,
			'price'=>$harga,
			'name'=>$produk,
			'total_harga_asli'=>$total_harga_asli,
			'total_berat'=>$total_berat,		
			);
		//eksusi ke dalam cart
		$this->cart->insert($insert);
		//echo $status;
		//kembali ke halaman sebelumnya
		redirect($this->agent->referrer());
	}
	//menambah barang dari tombol beli
	public function add_cart_from_home(){
		$id_produk = $_POST['id_produk'];
		//cek di cart apakah sudah ada
		//mencari id barang di array cart
		$notfound = true;
		foreach($this->cart->contents() as $item):
			if($item['id'] == $id_barang){//jika barang sudah di cart
				$jumlah_sekarang = $item['qty'] + 1;
				//melakukan update di cart
				$data = array(
					'rowid'=>$item['rowid'],
					'qty'=>$jumlah_sekarang,
					);
				//update cart				
				$notfound = false;
			}
			endforeach;
			//jika barang belum di cart
			if($notfound){
				//deskripsi barang yang harus diinsert
				$jumlah = 1;
				$detail_produk = $this->m_produk->get_produk_by_id($id_produk);
				$barang = $detail_barang['barang'];
				$harga = $detail_produk['harga'] -  $detail_produk['grosir'];
				$total_harga_asli = $detail_produk['harga'];
				$total_berat = $detail_barang['berat'];
				//bikin cart baru
				$insert = array(
					'id'=>$id_produk,
					'qty'=>$jumlah,
					'price'=>$harga,
					'name'=>$produk,
					'total_harga_asli'=>$total_harga_asli,
					'total_berat'=>$total_berat,		
					);
				$this->cart->insert($insert);
			}else{//jika barang sudah ditemukan
				$this->cart->update($data);
			}
			//kembali ke halaman sebelumnya
			redirect($this->agent->referrer());
		}
	//membersihkan item di cart
		public function reset_cart(){
			$this->cart->destroy();
			redirect($this->agent->referrer());
		}

	//delete cart
		public function delete_cart(){
			$id_produk = $_GET['id'];
			$data = array(
				'rowid'=>$id_produk,
				'qty'=>0
				);
			$this->cart->update($data);
		//print_r($data);
			redirect($this->agent->referrer());
		}

	//menambah cart ke tabel transaksi
		public function add_transaksi(){
		//jika cart kosong kembali ke halaman sebelumny
			if(empty($this->cart->contents())){
			redirect($this->agent->referrer());//kembali kehalaman sebelumnya
		}
		//membuat transaksi baru
		$now = date('Y-m-d h:i:s');
		//harga total
		$hargatotal = $this->cart->total();
		//ongkos kirim
		$ongkoskirim = 'Menunggu Konfirmasi';
		//id_user
		$id_user = $this->session->userdata['login_user']['id_user'];
		//status
		$status = 'Menunggu Pembayaran';
		//memasukan ke tabel
		$datatransaksi = array(
			'tgl_transaksi' => $now,
			'harga' => $hargatotal,
			'ongkos_kirim' => $ongkoskirim,
			'total_harga' => $hargatotal,
			'user_id' => $id_user,
			'status' => $status
			);
		if($this->db->insert('transaksi',$datatransaksi)){//jika berhasil memasukan ke tabel transaksi
			//ambil id transaksi terbaru
			$this->db->select_max('id_transaksi');
			$query = $this->db->get('transaksi');
			$query = $query->row_array();
			$id_transaksi_max = $query['id_transaksi'];
			//memasukan ke tabel transaksi item
			foreach($this->cart->contents() as $item):
				$dataitem = array(
					'jumlah'=>$item['qty'],
					'sub_total'=>$item['subtotal'],
					'transaksi_id'=>$id_transaksi_max,
					'barang_id'=>$item['id']
					);
			$this->db->insert('transaksi_item',$dataitem);
			endforeach;
			//destroy cart
			$this->cart->destroy();
			redirect('beranda/selesai_belanja');
		}else{	
			echo 'Proses transaksi gagal';
		}
	}
	public function edit_status() {
		$id_transaksi = $_GET['id_transaksi'];
		$status = $_POST['input_status'];
		$this->db->where('id_transaksi', $id_transaksi);
		if(isset($_POST['simpan'])) {
			$this->db->update('transaksi',array('status'=>$status));
		} else if(isset($_POST['hapus'])) {
			$this->db->delete('transaksi');
		}
		redirect($this->agent->referrer());
	}

}
/* End of file barang.php */
/* Location: ./application/controllers/barang.php */
?>