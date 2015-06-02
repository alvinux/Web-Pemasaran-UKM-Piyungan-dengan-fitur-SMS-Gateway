<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(array('m_produk','m_admin','m_sms','m_user','m_content','m_transaksi'));
		$this->load->library(array('user_agent'));
		$this->another = $this->load->database('anotherdb',TRUE);


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

	//
	public function sms()
	{
		$id_admin = $this->session->userdata('login_admin')['id_admin'];
		if ($this->session->userdata('login_admin')) {
			// $config['base_url'] = site_url('home/index');

			//load View

			// $data['jml_inbox'] = $this->m_sms->jml_inbox();
			// $data['jml_konfirmasi'] = $this->m_produk->jml_konfirmasi();
			if (empty($this->uri->segment(3))) {
				$data['sms_data'] = $this->m_sms->sms_inbox_keluhan();
			} else if ($this->uri->segment(3) == 'sent') {
				$data['sms_data'] = $this->m_sms->sms_sent_keluhan($id_admin);
			} else if ($this->uri->segment(3) == 'solved') {
				$data['sms_data'] = $this->m_sms->sms_solved_keluhan();
			} else if ($this->uri->segment(3) == 'pending') {
				$data['sms_data'] = $this->m_sms->sms_pending_keluhan();
			}
			// $data['sms_data'] = $this->m_sms->sms_inbox_keluhan();
			$this->load->view('base/head_adm');


			$this->load->view('admin/header');
			$this->load->view('admin/sidebar_kiri');
			$this->load->view('admin/sisi_kanan',$data);



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
			$data['provinsi'] = $this->m_content->provinsi();
			$data['all_penjual']= $this->m_user->show_all_data_penjual();

			// $data['jml_inbox'] = $this->m_sms->jml_inbox();
			// $data['jml_konfirmasi'] = $this->m_produk->jml_konfirmasi();

			$this->load->view('base/head_adm');


			$this->load->view('admin/header');
			$this->load->view('admin/sidebar_kiri');
			$this->load->view('admin/sisi_kanan',$data);



			$this->load->view('base/tail_adm');

		} else {
			redirect('admin');
		}
	}

	public function list_transaksi()
	{
		//search transaksi
		if(!empty($_GET['q']))redirect(site_url('admin/cariTransaksi/'.$_GET['q']));
		$this->load->model(array('m_transaksi'));
		//pagination
		$this->load->library('pagination');
		$config['base_url'] = site_url($this->uri->uri_string());
		$config['per_page'] = 4;
		$config['uri_segment'] = 4;
		$config['num_links'] = 3;
		$config['full_tag_open'] = '<p>';
		$config['full_tag_close'] = '</p>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<div>';
		$config['first_tag_close'] = '</div>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<div>';
		$config['last_tag_close'] = '</div>';
		$config['next_link'] = '&gt;';
		$config['next_tag_open'] = '<div>';
		$config['next_tag_close'] = '</div>';
		$config['prev_link'] = '&lt;';
		$config['prev_tag_open'] = '<div>';
		$config['prev_tag_close'] = '</div>';
		$config['cur_tag_open'] = '<b>';
		$config['cur_tag_close'] = '</b>';
		//end of pagination
		$uri = $this->uri->segment('4');
		if(empty($uri))$uri=0;
		//filter
		switch ($this->uri->segment(3)) {
			case 'Pending'://pending transaksi
			$config['total_rows'] = $this->m_transaksi->countListTransaksi('pending') ;
			$data['view'] = $this->m_transaksi->listTransaksi($config['per_page'],$uri,'Pending');
			break;
			case 'Lunas'://transaksi lunas
			$config['total_rows'] = $this->m_transaksi->countListTransaksi('terkirim') ;
			$data['view'] = $this->m_transaksi->listTransaksi($config['per_page'],$uri,'Lunas');
			break;
			case 'Batal'://transaksi batal
			$config['total_rows'] = $this->m_transaksi->countListTransaksi('batal') ;
			$data['view'] = $this->m_transaksi->listTransaksi($config['per_page'],$uri,'Not Found');
			break;
			default://semua transaksi
			$config['total_rows'] = $this->m_transaksi->countListTransaksi() ;
			$data['view'] = $this->m_transaksi->listTransaksi($config['per_page'],$uri);
			break;
		}
		//pagination
		//end of pagination
		//end of filter
		$data['total'] = $config['total_rows'];
		$data['title']='Olah Data Transaksi';
		$data['keyword']='';
		$this->pagination->initialize($config);
		//view
		if ($this->session->userdata('login_admin')) {
			$this->load->view('base/head_adm');
			$this->load->view('admin/header');
			$this->load->view('admin/sidebar_kiri');
			$this->load->view('admin/sisi_kanan',$data);//main view
			$this->load->view('base/tail_adm');

		} else {
			redirect('admin');
		}
	}
	//pencarian transaksi
	public function cariTransaksi()
	{
		//search transaksi
		if(!empty($_GET['q']))redirect(site_url('admin/cariTransaksi/'.$_GET['q']));
		$this->load->model(array('m_transaksi'));
		$keyword = $this->uri->segment(3);
		$data = array(
			'view'=>$this->m_transaksi->searchTransaksi($keyword),
			'total'=>$this->m_transaksi->countSearchTransaksi($keyword),
			'keyword'=>$keyword
		);
		//view
		//view
		if ($this->session->userdata('login_admin')) {
			$this->load->view('base/head_adm');
			$this->load->view('admin/header');
			$this->load->view('admin/sidebar_kiri');
			$this->load->view('admin/sisi_kanan',$data);//main view
			$this->load->view('base/tail_adm');
		} else {
			redirect('admin');
		}
	}
	//DETAIL TRANSAKSI
	public function detailtransaksi()
	{
		$this->load->model('m_transaksi');
		$koderef = $_GET['noref'];
		$transaksidb = $this->m_transaksi->transaksi($koderef);
		$transaksi = $transaksidb->row_array();
		echo '
		<div class="modal-body">
		<h4>'.$transaksi['nama'].'</h4>
		<h5>'.$transaksi['email'].'</h5>
		<div class="row">
		<div class="well col-sm-6">
		<p>'.$transaksi['alamat'].'</p>
		</div>
		<div class="well col-sm-6">
		<h2>Produk Item</h2>';
		//start	item
		$Transaksi = $this->m_produk->transaksiByIdTransaksi($koderef);//get transaksi data
		$TransaksiDetail = $this->m_produk->newDetailTransaksi($koderef);//worked
		?>
		<?php foreach($TransaksiDetail->result_array() as $TD):?>
		Nama Toko : <?php echo $TD['username_user'];?>
		<table class="table">
			<tr><th>Kode Barang</th><th>Nama Barang</th><th>Jumlah</th><th>Berat (/item)</th><th>Harga Satuan (Rp)</th></tr>
			<?php
			$TransaksiItem = $this->m_produk->newTransaksiItem($TD['id_transaksi_detail']);
			foreach($TransaksiItem as $TI):
			echo '<tr>';
			echo "<tr><td>".$TI['id_produk']."</td><td>".$TI['nama_produk']."</td><td>".$TI['jumlah']."</td><td>".$TI['berat']."</td><td>".$TI['harga']."</td></tr>";
			echo '</tr>';
			endforeach;
			?>
		</table>
		<?php endforeach;?>
		<?php
		$Pembayaran = $this->m_produk->show_konfirmasi_pembayaran_by_kode_transaksi($koderef);//get data konfirmasi pambayaran
		//end of item
		$konfirmasi = $this->m_produk->show_konfirmasi_pembayaran_by_kode_transaksi($koderef);//get statyus konfirmasi
		echo '</div>
		</div>
		<hr>
		<h3>'.$konfirmasi['metode_pembayaran'].'<strong> '.$konfirmasi['nama_bank'].'</strong></h3>
		<h3>Jumlah Transfer <b>Rp.'.number_format($transaksi['total_biaya']).',-</b></h3>
		<h3>Status : <strong>'.$this->m_produk->statusKonfirmasi($koderef).'</strong></h3>
		<select id="statusTransaksi" onchange="ubahStatusTransaksi(\''.$transaksi['kode_transaksi'].'\')" class="form-control col-sm-5">
		<option>Update Status</option>
		<option value="Pending">Pending</option>
		<option value="Lunas">Lunas</option>
		<option value="Not Found">not Found</option>
		</select>
		</div>
		';
	}

	//ubah status transaksi
	public function ubahTransaksi()
	{
		$noref = $_GET['noref'];
		$status = $_GET['status'];

		$sql1 = "SELECT * FROM transaksi_detail INNER JOIN transaksi_item ON transaksi_item.id_transaksi_detail = transaksi_detail.id_transaksi_detail INNER JOIN transaksi ON transaksi.kode_transaksi = transaksi_detail.kode_transaksi WHERE transaksi_detail.kode_transaksi = '$noref'";
		$dataPesanan = $this->db->query($sql1);
	      // if($dataPesanan->num_rows()>0){//produk ditemukan
	      //    foreach($dataPesanan->result() as $row) {
	      //    	$id_penjual = $row['id_penjual'];
	      //    	$datapenjual = $this->m_user->data_penjual($id_penjual);
	      //       $reply = 'Segera Kirim Barang: ('.$row->nama_produk.') Jumlah '.number_format($row->jumlah) . '(pcs), Kepada: '.$row->nama.', Alamat: '.$row->alamat.', Telpon: '.$row->telpon.', Paket: '.$row->paket_kirim;
	      //    }
	      // }else{//produk ditemukan
	      //    // $reply = 'Produk tidak ditemukan, Atau PIN Salah';
	      // }

		// $datapenjual = array();
  //    	$datapenjual = $this->m_user->data_penjual($id_penjual);

		if ($status == 'Lunas') {
		  $this->db->where('kode_transaksi',$noref);
          //$this->db->where('id_penjual',$idpenjual);
          $this->db->update('transaksi_detail',array('status'=>'Proses'));
          // Nanti dikasih SMS ke penjual untuk konfirmasi pengiriman barang

           if($dataPesanan->num_rows()>0){//produk ditemukan
	         foreach($dataPesanan->result() as $row) {
	         	$id_penjual = $row->id_penjual;
	         	$datapenjual = $this->m_user->data_penjual($id_penjual);
	            $reply = 'Segera Kirim Barang: ('.$row->nama_produk.') Jumlah '.number_format($row->jumlah) . '(pcs), Kepada: '.$row->nama.', Alamat: '.$row->alamat.', Telpon: '.$row->telpon.', Paket: '.$row->paket_kirim;
          		$sql = 'INSERT INTO outbox (DestinationNumber,TextDecoded) VALUES ("'.$datapenjual['telpon'].'","'.$reply.'")';
          		$this->another->query($sql);

	         }
	      }else{//produk ditemukan
	         // $reply = 'Produk tidak ditemukan, Atau PIN Salah';
	      }
          
		} elseif ($status == 'Pending') {
		  $this->db->where('kode_transaksi',$noref);
          //$this->db->where('id_penjual',$idpenjual);
          $this->db->update('transaksi_detail',array('status'=>'Pending'));
		}
		$this->db->where('kode_transaksi',$noref);
		$data = array('Status'=>$status);
		return $this->db->update('konfirmasi_pembayaran',$data);
	}

	// ---------------Pengaturan-------------------
	public function pengaturan_bank()
	{
		if ($this->session->userdata('login_admin')) {
			$data['data_bank'] = $this->m_content->bank();
			// $config['base_url'] = site_url('home/index');

			//load View

			// $data['jml_inbox'] = $this->m_sms->jml_inbox();
			// $data['jml_konfirmasi'] = $this->m_produk->jml_konfirmasi();

			$this->load->view('base/head_adm');


			$this->load->view('admin/header');
			$this->load->view('admin/sidebar_kiri');
			$this->load->view('admin/sisi_kanan',$data);



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
		// print_r($inbox);
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
						if (!empty($this->m_user->tlpPenjual($i['SenderNumber']))) {
							return $this->m_sms->cjp($pin,$i['ID'],$SenderNumber);//pin and id
						} else {
							echo $i['SenderNumber'];
							$this->m_sms->updateStatusInbox($i['ID']);
						}
						break;
						case 'CLKP'://check List Kode produk
						$pin = $explodeInbox[1];
						$SenderNumber = $i['SenderNumber'];
						if (!empty($this->m_user->tlpPenjual($i['SenderNumber']))) {
							return $this->m_sms->clkp($pin,$i['ID'],$SenderNumber);//pin and id
						} else {
							echo $i['SenderNumber'];
							$this->m_sms->updateStatusInbox($i['ID']);
						}
						break;
						case 'K'://check jumlah produk
						$pesan = $explodeInbox[1];
						$SenderNumber = $i['SenderNumber'];
						if (!empty($this->m_user->tlpPenjual($i['SenderNumber']))) {
							return $this->m_sms->keluhan($pesan,$i['ID'],$SenderNumber);//pin and id
						} else {
							echo $i['SenderNumber'];
							$this->m_sms->updateStatusInbox($i['ID']);
						}
						break;


						default:
						if (!empty($this->m_user->tlpPenjual($i['SenderNumber']))) {
							return $this->m_sms->salah($pin,$i['ID'],$SenderNumber);//pin and id
						} else {
							echo $i['SenderNumber'];
							$this->m_sms->updateStatusInbox($i['ID']);
						}
						break;
					}

				} else if($totalIndex == 3){
					switch ($explodeInbox[0]) {
						case 'CHP'://check jumlah produk
						$kpr = $explodeInbox[1];
						$pin = $explodeInbox[2];
						$SenderNumber = $i['SenderNumber'];
						if (!empty($this->m_user->tlpPenjual($i['SenderNumber']))) {
							return $this->m_sms->chp($pin,$i['ID'],$SenderNumber,$kpr);//pin and id
						} else {
							echo $i['SenderNumber'];
							$this->m_sms->updateStatusInbox($i['ID']);
						}
						break;
						case 'CSTP'://check Stok produk
						$kpr = $explodeInbox[1];
						$pin = $explodeInbox[2];
						$SenderNumber = $i['SenderNumber'];
						if (!empty($this->m_user->tlpPenjual($i['SenderNumber']))) {
							return $this->m_sms->cstp($pin,$i['ID'],$SenderNumber,$kpr);//pin and id
						} else {
							echo $i['SenderNumber'];
							$this->m_sms->updateStatusInbox($i['ID']);
						}
						break;
						case 'CDP'://check Stok produk
						$kpr = $explodeInbox[1];
						$pin = $explodeInbox[2];
						$SenderNumber = $i['SenderNumber'];
						if (!empty($this->m_user->tlpPenjual($i['SenderNumber']))) {
							return $this->m_sms->cdp($pin,$i['ID'],$SenderNumber,$kpr);//pin and id
						} else {
							echo $i['SenderNumber'];
							$this->m_sms->updateStatusInbox($i['ID']);
						}
						break;
						///////////////////////Area rUbah Data
						case 'UP'://Ubah Pin
						$pin = $explodeInbox[1];
						$pinbaru = $explodeInbox[2];
						$SenderNumber = $i['SenderNumber'];
						if (!empty($this->m_user->tlpPenjual($i['SenderNumber']))) {
							return $this->m_sms->upp($pin,$i['ID'],$SenderNumber,$pinbaru);//pin lama dan baru
						} else {
							echo $i['SenderNumber'];
							$this->m_sms->updateStatusInbox($i['ID']);
						}
						break;

						default:
						if (!empty($this->m_user->tlpPenjual($i['SenderNumber']))) {
							return $this->m_sms->salah($pin,$i['ID'],$SenderNumber);//pin and id
						} else {
							echo $i['SenderNumber'];
							$this->m_sms->updateStatusInbox($i['ID']);
						}
						break;
					}


				}else if($totalIndex == 4){
					switch ($explodeInbox[0]) {
						case 'UHP'://Ubah Harga PRoduk
						$kpr = $explodeInbox[1];
						$hbr = $explodeInbox[2]; // Harga Baru
						$pin = $explodeInbox[3];
						$SenderNumber = $i['SenderNumber'];
						if (!empty($this->m_user->tlpPenjual($i['SenderNumber']))) {
							if (ctype_digit($hbr)) {
								return $this->m_sms->uhp($pin,$i['ID'],$SenderNumber,$kpr,$hbr);//pin dan kode produk
							} else {
								$reply = 'Input Harga salah, Untuk harga baru silahkan hanya masukkan angka tanpa karakter "." atau ","';
								$this->m_sms->updateStatusInbox($i['ID']);//update status inbox[worked]
								//balas sms
								echo $reply;
								$inboxDet = $this->m_sms->inboxDetailById($i['ID']);//get detail inbox
								$data = array(
									'TextDecoded'=>$reply,
									'DestinationNumber'=>$inboxDet['SenderNumber'],
								);
								return $this->m_sms->sendReply($data);//insert to outbox table
							}

						} else {
							echo $i['SenderNumber'];
							$this->m_sms->updateStatusInbox($i['ID']);
						}
						break;
						// Uba Status produk
						case 'USP'://Ubah Harga PRoduk
						$kpr = $explodeInbox[1];
						$stp = $explodeInbox[2]; // Harga Baru
						$pin = $explodeInbox[3];
						$SenderNumber = $i['SenderNumber'];
						if (!empty($this->m_user->tlpPenjual($i['SenderNumber']))) {
							if (ctype_digit($stp)) {
								return $this->m_sms->usp($pin,$i['ID'],$SenderNumber,$kpr,$stp);//pin dan kode produk
							} else {
								$reply = 'Input Stok salah, Untuk Stok baru silahkan hanya masukkan angka tanpa karakter "." atau ","';
								$this->m_sms->updateStatusInbox($i['ID']);//update status inbox[worked]
								//balas sms
								echo $reply;
								$inboxDet = $this->m_sms->inboxDetailById($i['ID']);//get detail inbox
								$data = array(
									'TextDecoded'=>$reply,
									'DestinationNumber'=>$inboxDet['SenderNumber'],
								);
								return $this->m_sms->sendReply($data);//insert to outbox table
							}

						} else {
							echo $i['SenderNumber'];
							$this->m_sms->updateStatusInbox($i['ID']);
						}
						break;
						default:
						if (!empty($this->m_user->tlpPenjual($i['SenderNumber']))) {
							return $this->m_sms->salah($pin,$i['ID'],$SenderNumber);//pin and id
						} else {
							echo $i['SenderNumber'];
							$this->m_sms->updateStatusInbox($i['ID']);
						}
						break;
						//Konfirm Resi Pengirim Penjual
						case 'RESI'://Ubah Harga PRoduk
						$ktr = $explodeInbox[1];
						$nrs = $explodeInbox[2]; // Harga Baru
						$pin = $explodeInbox[3];
						$SenderNumber = $i['SenderNumber'];
						if (!empty($this->m_user->tlpPenjual($i['SenderNumber']))) {
							if (!empty($this->m_transaksi->searchTransaksi($ktr))) {
								return $this->m_sms->resi($pin,$i['ID'],$SenderNumber,$ktr,$nrs);//pin dan kode produk
							} else {
								$reply = 'Input Kode Transaksi salah, Silahkan masukkan dengan benar, Format [RESI#KODE_TRANSAKSI#NOMOR_RESI#PIN]';
								$this->m_sms->updateStatusInbox($i['ID']);//update status inbox[worked]
								//balas sms
								echo $reply;
								$inboxDet = $this->m_sms->inboxDetailById($i['ID']);//get detail inbox
								$data = array(
									'TextDecoded'=>$reply,
									'DestinationNumber'=>$inboxDet['SenderNumber'],
								);
								return $this->m_sms->sendReply($data);//insert to outbox table
							}

						} else {
							echo $i['SenderNumber'];
							$this->m_sms->updateStatusInbox($i['ID']);
						}
						break;

					}

				}else{
					if (!empty($this->m_user->tlpPenjual($i['SenderNumber']))) {
						return $this->m_sms->salah($pin,$i['ID'],$SenderNumber);//pin and id
					} else {
						echo $i['SenderNumber'];
						$this->m_sms->updateStatusInbox($i['ID']);
					}
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
