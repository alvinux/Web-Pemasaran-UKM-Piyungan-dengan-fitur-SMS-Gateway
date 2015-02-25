<?php if (!defined('BASEPATH'))	exit('No direct script access allowed');

Class m_produk extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->database();
	}

    //menampilkan gambar barang
    function show_gambar_by_id_barang($id){//id barang
    	$this->db->where('id_barang',$id);
    	$query = $this->db->get('gambar');
    	if ($query->num_rows > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }
    //mengetahui jumlah gambar yang ditampilkan di ubah produk
    function hitung_gambar_tambahan($id){//id barang
        $this->db->where('id_barang',$id);
        $query = $this->db->get('gambar');
        return $query->num_rows();//menampilkan berupa angka
    }
    //menampilkan spesifikasi barang
    function show_spesifikasi_by_id_barang($id){//id barang
    	$this->db->where('id_barang',$id);
    	$query = $this->db->get('spesifikasi');
    	if ($query->num_rows > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }
    //belum bisa berdasarkan idKategori
    function hasil_pencarian_by_kategori($kata_kunci, $kategori, $limit, $offset) {
        $this->db->like('barang', $kata_kunci);
        $this->db->where('kategori_id', $kategori);
        $query = $this->db->get('barang', $limit, $offset);
        if ($query->num_rows>0){
            return $query->result();
        } else {
            return array();
        }
    }
    function hitung_hasil_pencarian_by_kategori($kata_kunci, $kategori) {
        $this->db->like('barang', $kata_kunci);
        $this->db->where('kategori_id', $kategori);
        $query = $this->db->get('barang');
        return $query->num_rows();
    }
    //
    function hasil_pencarian($kata_kunci, $limit, $offset) {
        $this->db->like('barang', $kata_kunci);
        $query = $this->db->get('barang', $limit, $offset);
        if ($query->num_rows>0){
            return $query->result();
        } else {
            return array();
        }
    }
    //total hasil pencarian
    function count_hasil_pencarian($kata_kunci) {
        $this->db->like('barang', $kata_kunci);
        $query = $this->db->get('barang');
        return $query->num_rows();
    }
    //get barang by id barang
    function get_gambar_by_id_barang($id){
        // query buat nampilin gambar
        $this->db->where('id_barang',$id);
        $this->db->select('gambar');
        $query = $this->db->get('barang');
        $query = $query->row_array();
        $gambar = $query['gambar'];
        return $srcgambar = base_url('resource/img/product/'.$gambar);//lokasi src gambar untuk img                        
    }
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

    //menampilkan list item di katagori yang dipilih
    function show_category_list_item($nama_katagori){
        $sql = "SELECT id_produk,nama_produk,harga_produk,harga_grosir_produk,berat_produk,stok_produk,deskripsi_produk,img_produk,nama AS nama_penjual, penjual_id
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
        $sql = "SELECT id_produk,nama_produk,harga_produk,harga_grosir_produk,berat_produk,stok_produk,deskripsi_produk,img_produk,nama AS nama_penjual, penjual_id
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
    //untuk edit status di modal daftar pesanan
    function edit_status() {
        $sql = "UPDATE transaksi SET status = 'Lunas' WHERE id_transaksi=8 ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }



    function show_testimonial($id_produk){
        $sql = "SELECT id_testi,pesan,waktu,data_user.id_user,nama,img_user,status FROM data_testimonial 
                inner join data_produk on data_produk.id_produk = data_testimonial.id_produk
                inner join data_user on data_user.id_user = data_testimonial.id_user
                     WHERE data_produk.id_produk = ?";
        $query = $this->db->query($sql, $id_produk);
        if($query->num_rows()>0){
            return $query->result_array();
        } else {
            return array();
        }
    }

    //menampilkan Produk terbaru
    function show_hot_item(){
        $sql = "SELECT tgl_upload_produk,id_produk,nama_produk,harga_produk,harga_grosir_produk,berat_produk,stok_produk,deskripsi_produk,img_produk,nama AS nama_penjual, penjual_id
        FROM data_produk
        inner join data_user on data_user.id_user = data_produk.penjual_id ORDER BY tgl_upload_produk DESC LIMIT 3 ";
        $query = $this->db->query($sql);
        if($query->num_rows>0){
            return $query->result_array();
        }else{
            return array();
        }
    }

    //menampilkan Produk terbaru
    function show_terlaris(){
        $sql = "SELECT tgl_upload_produk,id_produk,nama_produk,harga_produk,harga_grosir_produk,berat_produk,stok_produk,deskripsi_produk,img_produk,nama AS nama_penjual, penjual_id, pengunjung
        FROM data_produk
        inner join data_user on data_user.id_user = data_produk.penjual_id ORDER BY pengunjung DESC LIMIT 6 ";
        $query = $this->db->query($sql);
        if($query->num_rows>0){
            return $query->result_array();
        }else{
            return array();
        }
    }

      // menampilkan produk dari id penjual
    function show_all_product_by_seller($id_penjual){
        $this->db->select('*');
        $this->db->where('penjual_id',$id_penjual);
        $query=$this->db->get('data_produk', 9);
        if ($query->num_rows()>0){
            return $query->result_array();    
        } else {
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




}
?>