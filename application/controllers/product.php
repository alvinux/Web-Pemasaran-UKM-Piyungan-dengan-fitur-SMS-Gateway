<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
// require_once 'application/controllers/base.php';
class Produk extends CI_Controller
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

}

?>