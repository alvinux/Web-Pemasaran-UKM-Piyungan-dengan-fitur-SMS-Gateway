<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(array('m_produk','m_admin','m_sms'));
		$this->load->library(array('user_agent'));


		// $getsession = $this->session->userdata('login_admin');
		// $this->getSession = $this->session->userdata('login_admin');
		// if (empty($getsession["id_admin"]))
		// 	{
		// 		redirect(base_url("admin"));
		// 	}		
		// else if($getsession['stts']==1){
		// 	redirect(site_url("admin/home"));
		// }
		
		// else if($getsession['tipe']==3){
		// 	redirect(site_url("pimpinan"));
		// }
		// $this->load->library('upload'); //load library upload bisa dilakukan disni atau disimpan di autoload
	}


public function index()
	{
		if ($this->session->userdata('login_admin')) {
			redirect('admin/home');
		} else {
		//load View	
		$this->load->view('admin/login');
		}
	}



public function home()
	{
		if ($this->session->userdata('login_admin')) {
			// $config['base_url'] = site_url('home/index');

			//load View

			$data['jml_inbox'] = $this->m_sms->jml_inbox();
			$data['jml_konfirmasi'] = $this->m_produk->jml_konfirmasi();
			
			$this->load->view('base/head_adm');
			
			
			$this->load->view('admin/header');
			$this->load->view('admin/sidebar_kiri');
			$this->load->view('admin/sisi_kanan', $data);
			
			
			$this->load->view('base/tail_adm');
	
		} else {
			redirect('admin');
		}
	}


	public function sms()
	{
		if ($this->session->userdata('login_admin')) {
			// $config['base_url'] = site_url('home/index');

			//load View

			// $data['jml_inbox'] = $this->m_sms->jml_inbox();
			// $data['jml_konfirmasi'] = $this->m_produk->jml_konfirmasi();
			
			$this->load->view('base/head_adm');
			
			
			$this->load->view('admin/header');
			$this->load->view('admin/sidebar_kiri');
			$this->load->view('admin/sisi_kanan');
		
			
			
			$this->load->view('base/tail_adm');
	
		} else {
			redirect('admin');
		}
	}
	public function list_penjual()
	{
		if ($this->session->userdata('login_admin')) {
			// $config['base_url'] = site_url('home/index');

			//load View

			// $data['jml_inbox'] = $this->m_sms->jml_inbox();
			// $data['jml_konfirmasi'] = $this->m_produk->jml_konfirmasi();
			
			$this->load->view('base/head_adm');
			
			
			$this->load->view('admin/header');
			$this->load->view('admin/sidebar_kiri');
			$this->load->view('admin/sisi_kanan');
		
			
			
			$this->load->view('base/tail_adm');
	
		} else {
			redirect('admin');
		}
	}

	public function list_transaksi()
	{
		if ($this->session->userdata('login_admin')) {
			// $config['base_url'] = site_url('home/index');

			//load View

			// $data['jml_inbox'] = $this->m_sms->jml_inbox();
			// $data['jml_konfirmasi'] = $this->m_produk->jml_konfirmasi();
			
			$this->load->view('base/head_adm');
			
			
			$this->load->view('admin/header');
			$this->load->view('admin/sidebar_kiri');
			$this->load->view('admin/sisi_kanan');
		
			
			
			$this->load->view('base/tail_adm');
	
		} else {
			redirect('admin');
		}
	}

	// ---------------Pengaturan-------------------
	public function pengaturan_bank()
	{
		if ($this->session->userdata('login_admin')) {
			// $config['base_url'] = site_url('home/index');

			//load View

			// $data['jml_inbox'] = $this->m_sms->jml_inbox();
			// $data['jml_konfirmasi'] = $this->m_produk->jml_konfirmasi();
			
			$this->load->view('base/head_adm');
			
			
			$this->load->view('admin/header');
			$this->load->view('admin/sidebar_kiri');
			$this->load->view('admin/sisi_kanan');
		
			
			
			$this->load->view('base/tail_adm');
	
		} else {
			redirect('admin');
		}
	}

	public function pengaturan_admin()
	{
		if ($this->session->userdata('login_admin')) {
			// $config['base_url'] = site_url('home/index');

			//load View

			// $data['jml_inbox'] = $this->m_sms->jml_inbox();
			// $data['jml_konfirmasi'] = $this->m_produk->jml_konfirmasi();
			$data['biodata'] = $this->m_admin->biodata_admin();
			$this->load->view('base/head_adm');
			
			
			$this->load->view('admin/header');
			$this->load->view('admin/sidebar_kiri');
			$this->load->view('admin/sisi_kanan',$data);
		
			
			
			$this->load->view('base/tail_adm');
	
		} else {
			redirect('admin');
		}
	}


	public function format_sms()
	{
		if ($this->session->userdata('login_admin')) {
			// $config['base_url'] = site_url('home/index');

			//load View

			// $data['jml_inbox'] = $this->m_sms->jml_inbox();
			// $data['jml_konfirmasi'] = $this->m_produk->jml_konfirmasi();
			
			$this->load->view('base/head_adm');
			
			
			$this->load->view('admin/header');
			$this->load->view('admin/sidebar_kiri');
			$this->load->view('admin/sisi_kanan');
		
			
			
			$this->load->view('base/tail_adm');
	
		} else {
			redirect('admin');
		}
	}

	public function content_page()
	{
		if ($this->session->userdata('login_admin')) {
			// $config['base_url'] = site_url('home/index');

			//load View

			// $data['jml_inbox'] = $this->m_sms->jml_inbox();
			// $data['jml_konfirmasi'] = $this->m_produk->jml_konfirmasi();
			
			$this->load->view('base/head_adm');
			
			
			$this->load->view('admin/header');
			$this->load->view('admin/sidebar_kiri');
			$this->load->view('admin/sisi_kanan');
		
			
			
			$this->load->view('base/tail_adm');
	
		} else {
			redirect('admin');
		}
	}

	public function testimonial()
	{
		if ($this->session->userdata('login_admin')) {
			// $config['base_url'] = site_url('home/index');

			//load View

			// $data['jml_inbox'] = $this->m_sms->jml_inbox();
			// $data['jml_konfirmasi'] = $this->m_produk->jml_konfirmasi();
			
			$this->load->view('base/head_adm');
			
			
			$this->load->view('admin/header');
			$this->load->view('admin/sidebar_kiri');
			$this->load->view('admin/sisi_kanan');
		
			
			
			$this->load->view('base/tail_adm');
	
		} else {
			redirect('admin');
		}
	}

	
}
?>