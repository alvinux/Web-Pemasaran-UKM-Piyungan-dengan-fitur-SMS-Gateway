<?php if (!defined('BASEPATH'))	exit('No direct script access allowed');

Class m_produk extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	// //menampilkan gambar barang
	// function show_gambar_by_id_barang($id){//id barang
	// 	$this->db->where('id_barang',$id);
	// 	$query = $this->db->get('gambar');
	// 	if ($query->num_rows > 0) {
	//         return $query->result_array();
	//     } else {
	//         return array();
	//     }
	// }
	// //mengetahui jumlah gambar yang ditampilkan di ubah produk
	// function hitung_gambar_tambahan($id){//id barang
	//     $this->db->where('id_barang',$id);
	//     $query = $this->db->get('gambar');
	//     return $query->num_rows();//menampilkan berupa angka
	// }
	// //menampilkan spesifikasi barang
	// function show_spesifikasi_by_id_barang($id){//id barang
	// 	$this->db->where('id_barang',$id);
	// 	$query = $this->db->get('spesifikasi');
	// 	if ($query->num_rows > 0) {
	//         return $query->result_array();
	//     } else {
	//         return array();
	//     }
	// }
	// //belum bisa berdasarkan idKategori
	// function hasil_pencarian_by_kategori($kata_kunci, $kategori, $limit, $offset) {
	//     $this->db->like('barang', $kata_kunci);
	//     $this->db->where('kategori_id', $kategori);
	//     $query = $this->db->get('barang', $limit, $offset);
	//     if ($query->num_rows>0){
	//         return $query->result();
	//     } else {
	//         return array();
	//     }
	// }
	// function hitung_hasil_pencarian_by_kategori($kata_kunci, $kategori) {
	//     $this->db->like('barang', $kata_kunci);
	//     $this->db->where('kategori_id', $kategori);
	//     $query = $this->db->get('barang');
	//     return $query->num_rows();
	// }
	// //
	// function hasil_pencarian($kata_kunci, $limit, $offset) {
	//     $this->db->like('barang', $kata_kunci);
	//     $query = $this->db->get('barang', $limit, $offset);
	//     if ($query->num_rows>0){
	//         return $query->result();
	//     } else {
	//         return array();
	//     }
	// }
	// //total hasil pencarian
	// function count_hasil_pencarian($kata_kunci) {
	//     $this->db->like('barang', $kata_kunci);
	//     $query = $this->db->get('barang');
	//     return $query->num_rows();
	// }
	// //get barang by id barang
	// function get_gambar_by_id_barang($id){
	//     // query buat nampilin gambar
	//     $this->db->where('id_barang',$id);
	//     $this->db->select('gambar');
	//     $query = $this->db->get('barang');
	//     $query = $query->row_array();
	//     $gambar = $query['gambar'];
	//     return $srcgambar = base_url('resource/img/product/'.$gambar);//lokasi src gambar untuk img
	// }
	//////////untuk menampilkan menu produk///////////////////////////
	// function sort_product($keyword) {
	//     $sql = "SELECT id_produk,nama_produk,harga_produk,harga_grosir_produk,berat_produk,stok_produk,deskripsi_produk,img_produk
	//     FROM data_produk
	//     INNER JOIN jenis_produk ON jenis_produk.id_jenis_Produk = data_produk.jenis_produk_id
	//     WHERE jenis_produk.nama_jenis_produk = ? ";
	//     $query = $this->db->query($sql,$keyword);
	//     if($query->num_rows>0){
	//         return $query->result_array();
	//     }else{
	//         return array();
	//     }
	// }
	function show_detail_produk($id_produk){
		$sql = "SELECT * FROM data_produk
		inner join data_user on data_user.id_user = data_produk.penjual_id
		WHERE id_produk = ?";
		$query = $this->db->query($sql, $id_produk);
		if($query->num_rows()>0){
			return $query->row_array();
		} else {
			return array();
		}
	}


	// ambil Gambar Primary produk by id di data_prdouk
	function primary_gambar_by_id($id){
		// query buat nampilin gambar
		$this->db->where('id_produk',$id);
		$this->db->select('img_produk');
		$query = $this->db->get('data_produk');
		$query = $query->row_array();
		$gambar = $query['gambar'];
		return $srcgambar = base_url('doc/themes/public/img/produk/'.$gambar);//lokasi src gambar untuk img
	}

	// ambil Semua Gambar produk by id di gambar
	function all_gambar_by_id($id){//id produk
		$this->db->where('id_produk',$id);
		$query = $this->db->get('gambar');
		if ($query->num_rows > 0) {
			return $query->result_array();
		} else {
			return array();
		}
	}



	//menampilkan list item di katagori yang dipilih
	function show_category_list_item($nama_katagori){
		$sql = "SELECT id_produk,nama_produk,harga_produk,harga_grosir_produk,berat_produk,stok_produk,deskripsi_produk,img_produk,username_user AS nama_penjual, penjual_id
		FROM data_produk
		inner join data_user on data_user.id_user = data_produk.penjual_id
		INNER JOIN data_katagori ON data_katagori.id_katagori = data_produk.katagori_id
		WHERE data_katagori.nama_katagori = ? ";
		$query = $this->db->query($sql, $nama_katagori);
		if($query->num_rows>0){
			return $query->result_array();
		}else{
			return array();
		}
	}
	//menampilkan list item di Jenis Produk yang dipilih
	function show_jenisproduk_list_item($nama_jenis){
		$sql = "SELECT id_produk,nama_produk,harga_produk,harga_grosir_produk,berat_produk,stok_produk,deskripsi_produk,img_produk,username_user AS nama_penjual, penjual_id
		FROM data_produk
		inner join data_user on data_user.id_user = data_produk.penjual_id
		INNER JOIN jenis_produk ON jenis_produk.id_jenis_produk = data_produk.jenis_produk_id
		WHERE jenis_produk.nama_jenis_produk = ? ";
		$query = $this->db->query($sql, $nama_jenis);
		if($query->num_rows>0){
			return $query->result_array();
		}else{
			return array();
		}
	}
	// menampilkan kategori Depan limited
	function show_limited_category(){
		$query=$this->db->get('data_katagori', 9);

		if ($query->num_rows()>0){
			return $query->result_array();
		} else {
			return array();
		}
	}
	// menampilkan semua kategori

	function show_all_category(){
		$query=$this->db->get('data_katagori');

		if ($query->num_rows()>0){
			return $query->result_array();
		} else {
			return array();
		}
	}
	//menampilkan jenis merek berdasarkan kategori
	function show_all_jenis_produk_by_katagori($param){//id kategori
		$this->db->where('katagori_produk_id',$param);
		$query = $this->db->get('jenis_produk');
		return $query->result_array();
	}

	// //untuk edit status di modal daftar pesanan
	// function edit_status() {
	//     $sql = "UPDATE transaksi SET status = 'Lunas' WHERE id_transaksi=8 ";
	//     $query = $this->db->query($sql);
	//     return $query->result_array();
	// }



	function show_testimonial($id_produk,$iduser=""){
		$where='';
		if(!empty($this->session->userdata('login_user'))):
			if(empty($iduser)){
				$where = 'AND data_testimonial.id_user <> '.$this->session->userdata('login_user')['id_user'];
			}else{
				$where = 'AND data_testimonial.id_user = '.$this->session->userdata('login_user')['id_user'];
			}
		endif;
		$sql = "SELECT id_testi,pesan,waktu,data_user.id_user,nama,img_user,status FROM data_testimonial
		inner join data_produk on data_produk.id_produk = data_testimonial.id_produk
		inner join data_user on data_user.id_user = data_testimonial.id_user
		WHERE data_produk.id_produk = ? $where";
		$query = $this->db->query($sql, $id_produk);
		if($query->num_rows()>0){
			return $query->result_array();
		} else {
			return array();
		}
	}

	//menampilkan Produk terbaru
	function show_hot_item(){
		$sql = "SELECT tgl_upload_produk,id_produk,nama_produk,harga_produk,harga_grosir_produk,berat_produk,stok_produk,deskripsi_produk,img_produk,username_user AS nama_penjual, penjual_id
		FROM data_produk
		inner join data_user on data_user.id_user = data_produk.penjual_id ORDER BY tgl_upload_produk DESC LIMIT 4 ";
		$query = $this->db->query($sql);
		if($query->num_rows>0){
			return $query->result_array();
		}else{
			return array();
		}
	}

	//menampilkan Produk terbaru
	function show_terlaris(){
		$sql = "SELECT tgl_upload_produk,id_produk,nama_produk,harga_produk,harga_grosir_produk,berat_produk,stok_produk,deskripsi_produk,img_produk,username_user AS nama_penjual, penjual_id, pengunjung
		FROM data_produk
		inner join data_user on data_user.id_user = data_produk.penjual_id ORDER BY pengunjung DESC LIMIT 8 ";
		$query = $this->db->query($sql);
		if($query->num_rows>0){
			return $query->result_array();
		}else{
			return array();
		}
	}

	// menampilkan produk dari id penjual
	function show_all_product_by_seller($id_penjual){
		$sql = "SELECT tgl_upload_produk,id_produk,nama_produk,harga_produk,harga_grosir_produk,berat_produk,stok_produk,deskripsi_produk,img_produk,username_user AS nama_penjual, penjual_id, pengunjung
		FROM data_produk
		inner join data_user on data_user.id_user = data_produk.penjual_id WHERE penjual_id = ? ORDER BY tgl_upload_produk DESC ";
		$query = $this->db->query($sql,$id_penjual);
		if($query->num_rows>0){
			return $query->result_array();
		}else{
			return array();
		}
	}

	function jml_konfirmasi()
	{
		$sql = "SELECT *
		FROM konfirmasi_pembayaran where status = nocheck ";
		$this->db->select('*');
		$query = $this->db->get('konfirmasi_pembayaran');
		return $query->num_rows();//menampilkan berupa angka


	}

	function foto_produk($id_gambar) {
		$sql = "SELECT gambar FROM gambar WHERE id_gambar = ?";
		$query = $this->db->query($sql, $id_gambar);
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				return $row->gambar;
			}
		}
	}


	function tambah_produk($pp) {
		$now = date("Y-m-d H:i:s");
		// ->nama=nama kolom db dan 'nama'=nama field form
		$this->penjual_id = $this->session->userdata('login_user')['id_user'];
		$this->nama_produk = $this->input->post('nama_produk');
		$this->stok_produk = $this->input->post('stok_produk'); // cara Setting supaya jika username lebih dari 10 karakter maka muncul pesan error edit profil gagal
		$this->harga_produk = $this->input->post('harga_produk');
		$this->berat_produk = $this->input->post('berat_produk');
		$this->katagori_id = $this->input->post('katagoriproduk');
		$this->jenis_produk_id = $this->input->post('jenis_produk');
		$this->deskripsi_produk = $this->input->post('deskripsi_produk');
		$this->img_produk = $pp;

		$this->tgl_upload_produk = $now;

		//admin adalah nama tabel
		$this->db->insert('data_produk', $this);
	}

	function konfirmasi_pembayaran() {
		$now = date("Y-m-d H:i:s");
		// ->nama=nama kolom db dan 'nama'=nama field form
		$this->id_user = $this->session->userdata('login_user')['id_user'];
		$this->kode_transaksi = $this->input->post('kode_transaksi');
		$this->nama_pengirim = $this->input->post('nama_pengirim'); // cara Setting supaya jika username lebih dari 10 karakter maka muncul pesan error edit profil gagal
		$this->tgl_bayar = $this->input->post('tanggal_transfer');
		$this->jumlah_bayar = $this->input->post('jumlah_transfer');
		$this->nama_bank_pengirim = $this->input->post('bank_pengirim');
		$this->bank_tujuan = $this->input->post('bank_tujuan');
		$this->metode_pembayaran = $this->input->post('metode_pembayaran');


		//admin adalah nama tabel
		$this->db->insert('konfirmasi_pembayaran', $this);
	}
	function update_konfirmasi_pembayaran() {
		$now = date("Y-m-d H:i:s");
		// ->nama=nama kolom db dan 'nama'=nama field form
		$this->id_user = $this->session->userdata('login_user')['id_user'];
		$this->kode_transaksi = $this->input->post('kode_transaksi');
		$this->nama_pengirim = $this->input->post('nama_pengirim'); // cara Setting supaya jika username lebih dari 10 karakter maka muncul pesan error edit profil gagal
		$this->tgl_bayar = $this->input->post('tanggal_transfer');
		$this->jumlah_bayar = $this->input->post('jumlah_transfer');
		$this->nama_bank_pengirim = $this->input->post('bank_pengirim');
		$this->bank_tujuan = $this->input->post('bank_tujuan');
		$this->metode_pembayaran = $this->input->post('metode_pembayaran');


		//admin adalah nama tabel
		$this->db->where('kode_transaksi', $this->input->post('kode_transaksi'));
		$this->db->update('konfirmasi_pembayaran', $this);
	}

	function show_konfirmasi_pembayaran_byid($id_user) {
		$sql = "SELECT * from konfirmasi_pembayaran where id_user ='$id_user' ";
		$query = $this->db->query($sql);
		if($query->num_rows>0){
			return $query->result_array();
		}else{
			return array();
		}
	}
	function show_konfirmasi_pembayaran_by_kode_transaksi($kode_transaksi) {
		$sql = "SELECT * from konfirmasi_pembayaran
		INNER JOIN bank ON bank.id_bank=konfirmasi_pembayaran.bank_tujuan
		where kode_transaksi ='$kode_transaksi'";
		$query = $this->db->query($sql);
		if($query->num_rows()>0){
			return $query->row_array();
		}else{
			return array();
		}
	}
	function statusKonfirmasi($kode_transaksi) {
		$sql = "SELECT * from konfirmasi_pembayaran
		INNER JOIN bank ON bank.id_bank=konfirmasi_pembayaran.bank_tujuan
		where kode_transaksi ='$kode_transaksi'";
		$query = $this->db->query($sql);
		if($query->num_rows()>0){
			$konfirmasi = $query->row_array();
			return $konfirmasi['status'];
		}else{
			return null;
		}
	}

	function transaksi($iduser)
	{
		$this->db->order_by('tgl_transaksi','DESC'); //order
		$this->db->where('id_user',$iduser);
		return $this->db->get('transaksi');
	}
	function statusTransaksi($kode_transaksi)
	{
		$this->db->where('kode_transaksi',$kode_transaksi);
		$query = $this->db->get('transaksi')->row_array();
		return $query['status'];
	}
	//transaksi by id transaksi
	public function transaksiByIdTransaksi($kodetransaksi)
	{
		$this->db->where('kode_transaksi',$kodetransaksi);
		return $this->db->get('transaksi');//get all data form 'transaksi' table
	}
	//all detail transaksi
	public function newDetailTransaksi($kodetransaksi)
	{
		$this->db->select('transaksi_detail.id_transaksi_detail,data_user.username_user,data_user.telpon,transaksi_detail.status');
		$this->db->where('transaksi_detail.kode_transaksi',$kodetransaksi);
		$this->db->join('data_user','data_user.id_user=transaksi_detail.id_penjual');
		return $this->db->get('transaksi_detail');
	}
	function TransaksiDetail() {
		$id_user = $this->session->userdata('login_user')['id_user'];
		$sql = "SELECT * from transaksi_detail where id_user ='$id_user' ";
		$query = $this->db->query($sql);
		if($query->num_rows>0){
			return $query->result_array();
		}else{
			return array();
		}
	}
	function TransaksiItem($kode_transaksi) {
		// $id_user = $this->session->userdata('login_user')['id_user'];
		$sql = "SELECT * from transaksi_item where kode_transaksi ='$kode_transaksi' ";
		$query = $this->db->query($sql);
		if($query->num_rows()>0){
			return $query->result_array();
		}else{
			return array();
		}
	}
	function NewTransaksiItem($iddetailtransaksi) {
		// $id_user = $this->session->userdata('login_user')['id_user'];
		$sql = "SELECT * from transaksi_item where id_transaksi_detail ='$iddetailtransaksi' ";
		$query = $this->db->query($sql);
		if($query->num_rows()>0){
			return $query->result_array();
		}else{
			return array();
		}
	}

	//all about testimonial
	function memberSudahBeli($iduser,$idproduk)
	{
		$this->db->select('*');
		$this->db->where('transaksi.id_user',$iduser);
		$this->db->where('transaksi_item.id_produk',$idproduk);
		$this->db->join('transaksi_detail','transaksi_detail.id_transaksi_detail=transaksi_item.id_transaksi_detail');
		$this->db->join('transaksi','transaksi.kode_transaksi=transaksi_detail.kode_transaksi');
		return $this->db->get('transaksi_item');
	}

}
?>
