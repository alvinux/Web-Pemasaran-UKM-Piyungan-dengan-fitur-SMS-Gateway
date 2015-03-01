<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');




class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('m_produk','m_user','m_content'));
		$this->load->library(array('user_agent'));
	}

	public function index()
	{

			$data['banner'] = $this->m_content->banner();
			// $config['base_url'] = site_url('home/index');
//		if ($this->session->userdata('login_user')['status'] === 'penjual') { redirect('home/list_produk'); } else { 
			$data['provinsi'] = $this->m_content->provinsi();
			$data['title']= 'Selamat Datang';
			$data['hotlist'] = $this->m_produk->show_hot_item();
			$data['terlaris'] = $this->m_produk->show_terlaris();

			//load View
			$this->load->view('base/head', $data);
			
			$data['katagori'] = $this->m_produk->show_limited_category();//mengambil data katagori
			$this->load->view('general/navbar');
			$this->load->view('general/slider',$data);
			$this->load->view('general/katagori', $data);
			$this->load->view('general/slide_terlaris',$data);
			$this->load->view('general/hotlist',$data);
			$this->load->view('general/bottom_menu');
			$this->load->view('general/footer');
			$this->load->view('general/modal/modal_login');
			$this->load->view('general/modal/modal_register',$data);
			
			
			$this->load->view('base/tail');
			// } 
	}
	
	public function katagori()
	{	
			$data['provinsi'] = $this->m_content->provinsi();
		
			$data['title']= 'Katagori';
			$data['katagori'] = $this->m_produk->show_limited_category();
			$nama_katagori = $this->uri->segment(3);
			$nama_katagori = str_replace('_', ' ', $nama_katagori);			
			$nama_jenis = $this->uri->segment(4);
			$nama_jenis = str_replace('_', ' ', $nama_jenis);
		//load View
			$this->load->view('base/head', $data);
			if (!empty($this->uri->segment(4))) 
			{
				$data['daftar_item'] = $this->m_produk->show_jenisproduk_list_item($nama_jenis);
			}
			else if (!empty($this->uri->segment(3))) 
			{
				$data['daftar_item'] = $this->m_produk->show_category_list_item($nama_katagori);
			}

			
			$this->load->view('general/navbar');
			$this->load->view('general/head_katagori');
			$this->load->view('general/content_list_katagori', $data);

			$this->load->view('general/katagori', $data);
			$this->load->view('general/bottom_menu');
			$this->load->view('general/footer');
			$this->load->view('general/modal/modal_login');
			$this->load->view('general/modal/modal_register',$data);

			$this->load->view('base/tail');
	}


	public function semua_katagori()
	{
		$data['provinsi'] = $this->m_content->provinsi();
		$data['title']= 'Semua Katagori';
		$data['katagori'] = $this->m_produk->show_all_category();
		//$nama = $data['ktegori']['kategori'];

		$nama_katagori = $this->uri->segment(3);
		$nama_katagori = str_replace('_', ' ', $nama_katagori);
	//load View
		$this->load->view('base/head', $data);
		$this->load->view('general/navbar');
		$this->load->view('general/head_katagori');

		$this->load->view('general/semua_katagori', $data);//menmpilkan list katagori
		$this->load->view('general/bottom_menu');
		$this->load->view('general/footer');
		$this->load->view('general/modal/modal_login');
		$this->load->view('general/modal/modal_register',$data,$data);

		$this->load->view('base/tail');
	
	}
	
	public function detailproduk()
	{

		//load View
		if (!empty($this->uri->segment(3))) {

			$data['provinsi'] = $this->m_content->provinsi();

			$id_produk = $this->uri->segment(3);
			$data['detail_produk'] = $this->m_produk->show_detail_produk($id_produk);
			$data['testimonial'] = $this->m_produk->show_testimonial($id_produk);
 
			$data['title']= 'Detail Produk';
			$this->load->view('base/head', $data);
			$this->load->view('general/navbar');
			// $this->load->view('general/head_katagori',$data);
			$this->load->view('general/detail_item', $data);

			$this->load->view('general/bottom_menu');
			$this->load->view('general/footer');
			$this->load->view('general/modal/modal_login');
			$this->load->view('general/modal/modal_register',$data,$data);

			$this->load->view('base/tail');
		} else {
			redirect($this->agent->referrer());
		}
	}
	
	
	public function profile_user()
	{	
		if ($this->session->userdata('login_user')) {
			$data['provinsi'] = $this->m_content->provinsi();

			//mengambil session proses_masuk dan menyimpan session email
			$session_data = $this->session->userdata('login_user');
			$data['title']= 'Profile';
			$data['biodata'] = $this->m_user->biodata();

			//load View
			$this->load->view('base/head', $data);

			$this->load->view('general/navbar');
			$this->load->view('general/head_katagori');
			$this->load->view('general/profile_user',$data);

			$this->load->view('general/bottom_menu');
			$this->load->view('general/footer');
			$this->load->view('general/modal/modal_login');
			$this->load->view('general/modal/modal_register',$data);	
			$this->load->view('general/modal/modal_ganti_password');
			
			$this->load->view('base/tail');
		} else {
			redirect('home');
		}
	}	
	public function detail_penjual()
	{	
		if ($this->session->userdata('login_user')) {
			$data['provinsi'] = $this->m_content->provinsi();
			$id_penjual = $this->uri->segment(3);
			//mengambil session proses_masuk dan menyimpan session email
			$session_data = $this->session->userdata('login_user');
			$data['title']= 'Profile';
			$data['data_penjual'] = $this->m_user->data_penjual($id_penjual);
			$data['produk_penjual'] = $this->m_produk->show_all_product_by_seller($id_penjual);

			//load View
			$this->load->view('base/head', $data);

			$this->load->view('general/navbar');
			$this->load->view('general/head_katagori');
			$this->load->view('general/detail_penjual',$data);

			$this->load->view('general/bottom_menu');
			$this->load->view('general/footer');
			$this->load->view('general/modal/modal_login');
			$this->load->view('general/modal/modal_register',$data);	
			$this->load->view('general/modal/modal_ganti_password');
			
			$this->load->view('base/tail');
		} else {
			redirect('home');
		}
	}
	
	public function keranjang()
	{
		$data['provinsi'] = $this->m_content->provinsi();

		//load View
		$this->load->view('base/head');

		$this->load->view('general/navbar');
		
		$this->load->view('general/head_katagori');
		$this->load->view('general/keranjang');

		$this->load->view('general/bottom_menu');
		$this->load->view('general/footer');
		$this->load->view('general/modal/modal_login');
		$this->load->view('general/modal/modal_register',$data);	
		$this->load->view('general/modal/modal_ganti_password');
		
		$this->load->view('base/tail');
	}
	
	
	
	
	public function list_produk()
	{
		$data['provinsi'] = $this->m_content->provinsi();

		//load View
		$this->load->view('base/head');

		$this->load->view('general/navbar');
		
		$this->load->view('general/head_katagori');
		$this->load->view('general/content_list_produk');

		$this->load->view('general/bottom_menu');
		$this->load->view('general/footer');
		$this->load->view('general/modal/modal_login');
		$this->load->view('general/modal/modal_register',$data);	
		$this->load->view('general/modal/modal_ganti_password');
		
		$this->load->view('base/tail');
	}


	public function daftar()
	{	
		if ($this->session->userdata('login_user')) {
			redirect($this->agent->referrer());
			} else {
			$data['provinsi'] = $this->m_content->provinsi();
			//mengambil session proses_masuk dan menyimpan session email
			$data['title']= 'Daftar User';

			//load View
			$this->load->view('base/head', $data);

			$this->load->view('general/navbar');
			$this->load->view('general/head_katagori');
			$this->load->view('general/daftar');

			$this->load->view('general/bottom_menu');
			$this->load->view('general/footer');
			$this->load->view('general/modal/modal_login');
			$this->load->view('general/modal/modal_register',$data);	
			$this->load->view('general/modal/modal_ganti_password');
			
			$this->load->view('base/tail');
		} 
			
	}

	//dipanggil melalui ajax di base/footer
	public function pilih_kabupaten() {
		$id_provinsi = $this->input->post('id_provinsi');
		$data['kab_kota'] = $this->m_content->kab_kota($id_provinsi);
		$this->load->view('general/show_city', $data);
	}
	//dipanggil melalui ajax di base/footer
	public function pilih_kecamatan() {
		$id_kab_kota = $this->input->post('id_kab_kota');
		$data['kecamatan'] = $this->m_content->kecamatan($id_kab_kota);
		$this->load->view('general/show_district', $data);
	}	





	
}

?>