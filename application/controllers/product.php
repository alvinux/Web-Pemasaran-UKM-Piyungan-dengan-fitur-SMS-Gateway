<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
*
*/
// require_once 'application/controllers/base.php';
class Product extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// $this->load->model(array('m_barang', 'm_beranda', 'm_admin'));
		// $this->load->library(array('googlemaps'));
	}

	//menampilkan barang berdasarkan merek
	public function sort(){

		// $keyword = $this->uri->segment(3);
		$keyword = 'makanan';
		// $keyword = str_replace('-', ' ', $keyword);
		// $data['kategori'] = $this->m_beranda->form_kategori();
		//menampilkan daftar_barang

		$data['daftar_barang'] = $this->m_produk->sort_produk($keyword);
		$data['title']= 'Selamat Datang';
		//load data pada controller base dan menyisipkan file header.php
		$this->header('base/header', $data);
		//load modal
		$this->load->view('user/login');
		$this->load->view('user/modal');
		// gunakan kode dibawah untuk pemanggilan secara acak (dipanggil satu-satu)
		//data kontak
		$data['jam_kerja'] = $this->m_admin->jam_kerja();
		//data kontak
		$data['kontak'] = $this->m_admin->kontak();
		//data ym
		$data['ym_chat'] = $this->m_admin->ym_chat();
		//data bank
		$data['bank'] = $this->m_admin->bank();
		$this->navbar('user/navbar', $data);
		$this->form_search('user/form-search', $data);
		$this->menubar('user/menubar', $data);
		$this->load->view('user/content-sort', $data);
		//menampilkan peta google maps
		$config['center'] = '-7.767414, 110.410143';
		$config['zoom'] = 'auto';
		$this->googlemaps->initialize($config);
		$marker = array();
		$marker['position'] = '-7.764946, 110.396499';
		$this->googlemaps->add_marker($marker);
		$data['map'] = $this->googlemaps->create_map();
		$this->footbar('user/footbar', $data);
		//load data pada controller base dan menyisipkan file footer.php
		$this->footer('base/footer', $data);
	}
	//new transaction
	public function addTransaction()
	{
		echo 'loading...';
		$this->load->model(array('m_transaksi','m_user'));
		$agen = $_POST['ongkir'];//karir
		$ongkir = $_POST['pilihpaket'];//total angkir
		$totalbiayasemua = $_POST['TotalBiayaSemua'];//total semua biaya
		//generate kode transaksi
		$kodetransaksi = $this->m_transaksi->generateKodeTransaksi();//get kode transaksi
		//insert transaksi [worked]
		$biodata = $this->m_user->biodata();
		$alamatlengkap = $biodata['alamat'].', provinsi '.$biodata['provinsi'].', kota '.$biodata['kota'].', kodepos '.$biodata['kodepos'];
		$transaksiparams = array($kodetransaksi,date('Y-m-d H:i:s'),$biodata['id_user'],$biodata['nama'],$alamatlengkap,$biodata['telpon'],$agen,'Pending',$totalbiayasemua);
		$sqltransaksi = "INSERT INTO transaksi(kode_transaksi,tgl_transaksi,id_user,nama,alamat,telpon,paket_kirim,status,total_biaya)
		VALUES(?,?,?,?,?,?,?,?,?)";
		$this->db->query($sqltransaksi,$transaksiparams);
		return $this->addTransactionDetail($kodetransaksi,$ongkir);//insert transaction detail and transaction item
	}

	//add transaction detail
	public function addTransactionDetail($kodetransaksi,$ongkir)
	{
		//insert transaksi detail
		$arrayidpenjual = array();//get array id penjual
		foreach($this->cart->contents() as $item) {
			$totalBiaya = '';
			$keys = $item['id_penjual'];
			if (isset($arrayidpenjual[$keys])) {
				$arrayidpenjual[$keys] = $item['id_penjual'];
			} else {
				$arrayidpenjual[$keys] = $item['id_penjual'];
			}
		}
		$TotalPenjual=count($arrayidpenjual);//total penjual
		$OngkirPerPenjual = $ongkir/$TotalPenjual;//harga ongkir penjual
		//start of masuk
		foreach ($arrayidpenjual as $key) {
			foreach ($this->cart->contents() as $item) {
				if ($item['id_penjual'] == $key) {
					//is transaction detail found
					$detail = $this->m_transaksi->getDetailTransaksi($kodetransaksi,$key);
					if($detail->num_rows()<1){
						//create new transaction detail
						$newdetailtransaksi = $this->m_transaksi->newDetailTransaksi($kodetransaksi,$key,$OngkirPerPenjual,$item['subtotal']);
						$detail = $this->m_transaksi->getDetailTransaksi($kodetransaksi,$key);
					}
					//get id transaksi detail
					$detail = $detail->row_array();
					$IdTransaksiDetail = $detail['id_transaksi_detail'];//WORKED
					//insert into transaksi item
					$DataItem = array
					(
						'id_transaksi_Detail'=>$IdTransaksiDetail,
						'id_produk'=>$item['id'],
						'nama_produk'=>$item['name'],
						'harga'=>$item['price'],
						'jumlah'=>$item['qty'],
						'berat'=>$item['total_berat']
					);
					$this->db->insert('transaksi_item',$DataItem);
					//mengurangi stok didatabase [beli dibuat...]
					$sqlkurangstok = 'UPDATE data_produk SET stok_produk = stok_produk - '.$item['qty'].' WHERE id_produk = '.$item['id'];
					$this->db->query($sqlkurangstok);
				}
			}
		}
		//end of masuk
		//clear cart
		$this->cart->destroy();
		//konfirmasi pembayaran
		redirect(site_url('cart_control/pemesananSelesai'));//konfirmasi pembayaran
		redirect(site_url('home/profile_user?act=riwayat'));
	}

}
