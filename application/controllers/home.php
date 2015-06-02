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

   		if ($this->session->userdata('login_user')['status'] === 'penjual') { redirect('home/profile_user'); } else
   		{
			$data['banner'] = $this->m_content->banner();
			// $config['base_url'] = site_url('home/index');
			$data['provinsi'] = $this->m_content->provinsi();
			$data['title']= 'Selamat Datang';
			$data['hotlist'] = $this->m_produk->show_hot_item();
			$data['terlaris'] = $this->m_produk->show_terlaris();
			// $data['datalist'] = array($hotlist);
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
		}
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
			$data['testimonial'] = $this->m_produk->show_testimonial($id_produk);//other member testimonial
			$data['mytestimonial'] = $this->m_produk->show_testimonial($id_produk,$this->session->userdata('login_user')['id_user']);//my testimonial
			$data['gambar'] = $this->m_produk->all_gambar_by_id($id_produk);

			$data['title']= 'Detail Produk';
			$this->load->view('base/head', $data);
			$this->load->view('general/navbar');
			// $this->load->view('general/head_katagori',$data);

			if ($this->session->userdata('login_user')['status'] === 'penjual') {
				$data['katagoriproduk'] = $this->m_content->katagoriproduk();
				$data['jenis_produk'] = $this->m_content->jenis_produk($data['detail_produk']['katagori_id']);
				$this->load->view('general/edit_detail_item',$data);
			} else {
				$this->load->view('general/detail_item', $data);
			}

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
			//mengambil session proses_masuk dan menyimpan session email
			$session_data = $this->session->userdata('login_user');
			$data['title']= 'Profile';
			$data['biodata'] = $this->m_user->biodata();
			// print_r($data);
			$id_prov = $data['biodata']['id_provinsi'];
			$data['provinsi'] = $this->m_content->provinsi();
			$data['kab_kota'] = $this->m_content->kab_kota($id_prov);
			// $data['kecamatan'] = $this->m_content->kecamatan($this->session->userdata('login_user')['id_user'];);
			//load View
			$this->load->view('base/head', $data);
			$this->load->view('general/navbar');
			$this->load->view('general/head_katagori');
			if ($this->session->userdata('login_user')['status'] === 'pembeli') {
				$data['Transaksi'] = $this->m_produk->transaksi($this->session->userdata('login_user')['id_user']);
				$data['TransaksiDetail'] = array();
				// $data['TransaksiItem'] = $this->m_produk->TransaksiItem();
				// $data['bank'] = $this->m_content->bank();
				// $data['konfirmasi_pembayaran'] = $this->m_produk->show_konfirmasi_pembayaran_byid($this->session->userdata('login_user')['id_user']);
				$this->load->view('general/profile_pembeli',$data);
				// $this->load->view('general/modal/modal_konfirmasi_pembayaran',$data);
			} else {
				$data['biodata'] = $this->m_user->biodata();
				$data['katagoriproduk'] = $this->m_content->katagoriproduk();
				$data['id_penjual'] = $this->session->userdata['login_user']['id_user'];
				// $id_penjual = $this->session->userdata['login_user']['id_user'];
				$this->load->view('general/profile_penjual',$data);
				$this->load->view('general/modal/modal_tambah_produk',$data);
			}
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
	//detail transaksi
	public function detailtransaksi()
	{
		$kodetransaksi = $this->uri->segment(3);//get kode transaksi
		if ($this->session->userdata('login_user') || $this->session->userdata('login_admin')) {
			$session_data = $this->session->userdata('login_user');
			$data = array(
				'title'=>'Detail Transaksi '.$kodetransaksi,
				//'bidodata'=>$this->m_user->biodata(),
			);
			$this->load->view('base/head', $data);
			$this->load->view('general/navbar');
			$this->load->view('general/head_katagori');
			if ($this->session->userdata('login_user')['status'] === 'pembeli' || $this->session->userdata('login_admin')) {
				$data['Transaksi'] = $this->m_produk->transaksiByIdTransaksi($kodetransaksi);//get transaksi data
				$data['TransaksiDetail'] = $this->m_produk->newDetailTransaksi($kodetransaksi);//worked
				$data['Pembayaran'] = $this->m_produk->show_konfirmasi_pembayaran_by_kode_transaksi($kodetransaksi);//get data konfirmasi pambayaran
				$this->load->view('general/transaksi_detail',$data);
			} else {
				//???
			}
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
		if (!empty($this->uri->segment(3))) {
			$data['provinsi'] = $this->m_content->provinsi();
			$id_penjual = $this->uri->segment(3);
			//mengambil id penjual dari addressbar

			$data['title']= 'Data Penjual';
			$data['data_penjual'] = $this->m_user->data_penjual($id_penjual);
			$data['produk_penjual'] = $this->m_produk->show_all_product_by_seller($id_penjual);

			//load View
			$this->load->view('base/head', $data);

			$this->load->view('general/navbar');
			// $this->load->view('general/head_katagori');
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
			$this->load->view('general/daftar',$data);

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
		$id_prov = $this->input->post('id_prov');
		$data['kab_kota'] = $this->m_content->kab_kota($id_prov);
		$this->load->view('general/show_city', $data);
	}
	//dipanggil melalui ajax di base/footer
	public function pilih_kecamatan() {
		// $id_kab_kota = $this->input->post('id_kab_kota');
		// $data['kecamatan'] = $this->m_content->kecamatan($id_kab_kota);
		$this->load->view('general/show_district');
	}

	//dipanggil melalui ajax di base/footer
	public function pilih_jenis_produk() {
		$id_katagori = $this->input->post('id_katagori');
		$data['jenis_produk'] = $this->m_content->jenis_produk($id_katagori);
		$this->load->view('general/show_jenisproduk', $data);
	}

	////////////////////////////////////////////////////////////////////////////////
    // HANYA DI EKSEKUSI SATU KALI UNTUK MENGAMBIL DATA PROVINSI DAN KOTA DARI RAJAONGKIR
	// //dipanggil Sekali untuk get kode dan list provinsi dari raja ongkir ke db
	// public function get_rajaongkir_db() {
	// 	$curl = curl_init();
	// 	curl_setopt_array($curl, array(
	// 		CURLOPT_URL => "http://rajaongkir.com/api/starter/province",
	// 		CURLOPT_RETURNTRANSFER => true,
	// 		CURLOPT_ENCODING => "",
	// 		CURLOPT_MAXREDIRS => 10,
	// 		CURLOPT_TIMEOUT => 30,
	// 		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	// 		CURLOPT_CUSTOMREQUEST => "GET",
	// 		CURLOPT_HTTPHEADER => array(
	// 			"key: 43682bb7d8fe7f657b942d33b443dbd3"
	// 			),
	// 		));
	// 	$response = curl_exec($curl);
	// 	$err = curl_error($curl);
	// 	curl_close($curl);
	// 	if ($err) {
	// 		echo "cURL Error #:" . $err;
	// 	} else {
	// 		$responseArray = json_decode($response);
	// 		$provinsi = $responseArray->rajaongkir->results;
	// 		foreach($provinsi as $p):
	// 			$idprov =  $p->province_id;
	// 			$prov = $p->province;
	// 			$this->m_content->get_rajaongkir_db_prov($idprov,$prov);
	// 		endforeach;
	// 	}
	// }
	// public function get_rajaongkir_db_kota(){
	// 	//input data kabupaten
	// 	$curl = curl_init();
	// 	curl_setopt_array($curl, array(
	// 		CURLOPT_URL => "http://rajaongkir.com/api/starter/city",
	// 		CURLOPT_RETURNTRANSFER => true,
	// 		CURLOPT_ENCODING => "",
	// 		CURLOPT_MAXREDIRS => 10,
	// 		CURLOPT_TIMEOUT => 30,
	// 		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	// 		CURLOPT_CUSTOMREQUEST => "GET",
	// 		CURLOPT_HTTPHEADER => array(
	// 			"key: 43682bb7d8fe7f657b942d33b443dbd3"
	// 			),
	// 		));
	// 	$response = curl_exec($curl);
	// 	$err = curl_error($curl);
	// 	curl_close($curl);
	// 	if ($err) {
	// 		echo "cURL Error #:" . $err;
	// 	} else {
	// 		$responseArray = json_decode($response);
	// 		$city = $responseArray->rajaongkir->results;
	// 		foreach($city as $c):
	// 			$idprov =  $c->province_id;
	// 			$idkota = $c->city_id;
	// 			$kota = $c->city_name;
	// 			$type = $c->type;
	// 			$kodepos = $c->postal_code;
	// 			$this->m_content->get_rajaongkir_db_kota($idprov,$idkota,$kota,$type,$kodepos);
	// 		endforeach;
	// 	}
	// }
	//////////////////////////////////////////////////////////////////





}

?>
