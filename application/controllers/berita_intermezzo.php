<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');




class Berita_intermezzo extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('m_produk','m_user','m_content'));
		$this->load->library(array('user_agent'));
	}

	public function index()
	{

   				// //load View
		// if (!empty($this->uri->segment(3))) {

			$data['provinsi'] = $this->m_content->provinsi();

			$id_page = 5;
			// $data['detail_produk'] = $this->m_produk->show_detail_produk($id_produk);
			// $data['testimonial'] = $this->m_produk->show_testimonial($id_produk);
			$data['berita'] = $this->m_content->show_page_byid($id_page);
 
			$data['title']= 'List Berita / Intermezzo';
			$this->load->view('base/head', $data);
			$this->load->view('general/navbar');
			// $this->load->view('general/head_katagori',$data);
			$this->load->view('general/list_berita',$data);

			$this->load->view('general/bottom_menu');
			$this->load->view('general/footer');
			$this->load->view('general/modal/modal_login');
			$this->load->view('general/modal/modal_register',$data,$data);

			$this->load->view('base/tail');
		// } else { 
	}


	public function tentang_kami()
	{

		// //load View
		// if (!empty($this->uri->segment(3))) {

			$data['provinsi'] = $this->m_content->provinsi();

			$id_page = 1;
			// $data['detail_produk'] = $this->m_produk->show_detail_produk($id_produk);
			// $data['testimonial'] = $this->m_produk->show_testimonial($id_produk);
			$data['berita'] = $this->m_content->show_page_byid($id_page);
 
			$data['title']= 'Tentang Kami';
			$this->load->view('base/head', $data);
			$this->load->view('general/navbar');
			// $this->load->view('general/head_katagori',$data);
			$this->load->view('general/newspage_content',$data);

			$this->load->view('general/bottom_menu');
			$this->load->view('general/footer');
			$this->load->view('general/modal/modal_login');
			$this->load->view('general/modal/modal_register',$data,$data);

			$this->load->view('base/tail');
		// } else {
		// 	redirect($this->agent->referrer());
		// }
	}
	

	public function contact()
	{

		// //load View
		// if (!empty($this->uri->segment(3))) {

			$data['provinsi'] = $this->m_content->provinsi();

			$id_page = 3;
			// $data['detail_produk'] = $this->m_produk->show_detail_produk($id_produk);
			// $data['testimonial'] = $this->m_produk->show_testimonial($id_produk);
			$data['berita'] = $this->m_content->show_page_byid($id_page);
 
			$data['title']= 'Hubungi Kami';
			$this->load->view('base/head', $data);
			$this->load->view('general/navbar');
			// $this->load->view('general/head_katagori',$data);
			$this->load->view('general/newspage_content',$data);

			$this->load->view('general/bottom_menu');
			$this->load->view('general/footer');
			$this->load->view('general/modal/modal_login');
			$this->load->view('general/modal/modal_register',$data,$data);

			$this->load->view('base/tail');
		// } else {
		// 	redirect($this->agent->referrer());
		// }
	}

	public function bantuan()
	{

		// //load View
		// if (!empty($this->uri->segment(3))) {

			$data['provinsi'] = $this->m_content->provinsi();

			$id_page = 5;
			// $data['detail_produk'] = $this->m_produk->show_detail_produk($id_produk);
			// $data['testimonial'] = $this->m_produk->show_testimonial($id_produk);
			$data['berita'] = $this->m_content->show_page_byid($id_page);
 
			$data['title']= 'Bantuan';
			$this->load->view('base/head', $data);
			$this->load->view('general/navbar');
			// $this->load->view('general/head_katagori',$data);
			$this->load->view('general/newspage_content',$data);

			$this->load->view('general/bottom_menu');
			$this->load->view('general/footer');
			$this->load->view('general/modal/modal_login');
			$this->load->view('general/modal/modal_register',$data,$data);

			$this->load->view('base/tail');
		// } else {
		// 	redirect($this->agent->referrer());
		// }
	}

	public function pageDetail()
	{

			$data['provinsi'] = $this->m_content->provinsi();

			$id_page = $this->uri->segment(3);
			// $data['detail_produk'] = $this->m_produk->show_detail_produk($id_produk);
			// $data['testimonial'] = $this->m_produk->show_testimonial($id_produk);
			$data['berita'] = $this->m_content->show_page_byid($id_page);
 
			$data['title']= 'Bantuan';
			$this->load->view('base/head', $data);
			$this->load->view('general/navbar');
			// $this->load->view('general/head_katagori',$data);
			$this->load->view('general/newspage_content',$data);

			$this->load->view('general/bottom_menu');
			$this->load->view('general/footer');
			$this->load->view('general/modal/modal_login');
			$this->load->view('general/modal/modal_register',$data,$data);

			$this->load->view('base/tail');
		// } else {
		// 	redirect($this->agent->referrer());
		// }
	}

	public function blog_berita()
	{

		// //load View
		// if (!empty($this->uri->segment(3))) {

			$data['provinsi'] = $this->m_content->provinsi();

			$id_page = 5;
			// $data['detail_produk'] = $this->m_produk->show_detail_produk($id_produk);
			// $data['testimonial'] = $this->m_produk->show_testimonial($id_produk);
			$data['berita'] = $this->m_content->show_page_byid($id_page);
 
			$data['title']= 'List Berita / Intermezzo';
			$this->load->view('base/head', $data);
			$this->load->view('general/navbar');
			// $this->load->view('general/head_katagori',$data);
			$this->load->view('general/list_berita',$data);

			$this->load->view('general/bottom_menu');
			$this->load->view('general/footer');
			$this->load->view('general/modal/modal_login');
			$this->load->view('general/modal/modal_register',$data,$data);

			$this->load->view('base/tail');
		// } else {
		// 	redirect($this->agent->referrer());
		// }
	}





}?>