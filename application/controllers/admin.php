<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(array('m_produk','m_admin','m_sms','m_user'));
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
	//check sms
	public function checkSMS(){
		$this->load->model('m_sms');//call modal sms
		$inbox = $this->m_sms->sms_inbox();
		if(!empty($inbox)){
			foreach($inbox as $i):
				//processed inbox
				$explodeInbox = explode('#',strtoupper($i['TextDecoded']));
				$totalIndex = count($explodeInbox);
				if($totalIndex == 2){
					switch ($explodeInbox[0]) {
						case 'CJP'://check jumlah produk
						$pin = $explodeInbox[1];
						$SenderNumber = $i['SenderNumber'];
							if (!empty($this->m_user->tlpuser($i['SenderNumber']))) {
								return $this->m_sms->cjp($pin,$i['ID'],$SenderNumber);//pin and id
								break;
							} else {
								echo $i['SenderNumber'];
								break;
							}
						case 'CLKP'://check List Kode produk
						$pin = $explodeInbox[1];
						$SenderNumber = $i['SenderNumber'];
							if (!empty($this->m_user->tlpuser($i['SenderNumber']))) {
								return $this->m_sms->clkp($pin,$i['ID'],$SenderNumber);//pin and id
								break;
							} else {
								echo $i['SenderNumber'];
								break;
							}
					default:
						if (!empty($this->m_user->tlpuser($i['SenderNumber']))) {
							return $this->m_sms->salah($pin,$i['ID'],$SenderNumber);//pin and id
							break;
						} else {
							echo $i['SenderNumber'];
							break;
						}
					break;
					}
						
				} else if($totalIndex == 3){
					switch ($explodeInbox[0]) {
						case 'CHP'://check jumlah produk
							$kpr = $explodeInbox[1];
							$pin = $explodeInbox[2];
							$SenderNumber = $i['SenderNumber'];
							if (!empty($this->m_user->tlpuser($i['SenderNumber']))) {
								return $this->m_sms->chp($pin,$i['ID'],$SenderNumber,$kpr);//pin and id
								break;
							} else {
								echo $i['SenderNumber'];
								break;
							}
						case 'CSTP'://check Stok produk
							$kpr = $explodeInbox[1];
							$pin = $explodeInbox[2];
							$SenderNumber = $i['SenderNumber'];
							if (!empty($this->m_user->tlpuser($i['SenderNumber']))) {
								return $this->m_sms->cstp($pin,$i['ID'],$SenderNumber,$kpr);//pin and id
								break;
							} else {
								echo $i['SenderNumber'];
								break;
							}
					default:
						if (!empty($this->m_user->tlpuser($i['SenderNumber']))) {
							return $this->m_sms->salah($pin,$i['ID'],$SenderNumber);//pin and id
							break;
						} else {
							echo $i['SenderNumber'];
							break;
						}
					break;
					}


					}else if($totalIndex == 4){

					}else{
						return exit();
					}
				endforeach;
		}else{
		return exit();//end of function
		}
	}

	//process sms
	public function processSMS(){

	}
}
?>