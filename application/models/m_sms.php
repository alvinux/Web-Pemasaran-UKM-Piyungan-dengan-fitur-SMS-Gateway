<?php

if(!defined('BASEPATH')) exit('No direct script access allowed');

class M_sms extends CI_Model
{
   private $another;
   function __construct()
   {
      parent::__construct();
      $this->another = $this->load->database('anotherdb',TRUE);
   }
   //lihat pesar sms inbox
   public function sms_inbox()
   {
      $this->another->where('processed','false');//
      $query = $this->another->get('inbox');
      if($query->num_rows()>0){
         return $query->result_array();
      } else {
         return array();
      }
   }
   // -------------SMS Keluhan user
   //lihat pesar sms inbox keluhan
   public function sms_inbox_keluhan()
   {
      // $this->another->where('processed','false');//
      $this->another->order_by('ID','DESC');
      $query = $this->another->get('admininboxmessage');
      if($query->num_rows()>0){
         return $query->result_array();
      } else {
         return array();
      }
   }

   public function sms_sent_keluhan($id_admin)
   {
      // $this->another->where('processed','false');//
      $sql = "SELECT * from adminsentmessage inner join sentitems on sentitems.id = adminsentmessage.id_sms where adminsentmessage.id_admin = ?";
      $query = $this->another->query($sql,$id_admin);
      if($query->num_rows()>0){
         return $query->result_array();
      } else {
         return array();
      }
   }
   public function sms_solved_keluhan()
   {
      $this->another->where('processed','true');//
      $query = $this->another->get('admininboxmessage');
      if($query->num_rows()>0){
         return $query->result_array();
      } else {
         return array();
      }
   }
   public function sms_pending_keluhan()
   {
      $this->another->where('processed','false');//
      $query = $this->another->get('admininboxmessage');
      if($query->num_rows()>0){
         return $query->result_array();
      } else {
         return array();
      }
   }


   //////////////// /sms Keluhan user

   public function jml_inbox()
   {
      $this->another->select('processed','false');
      $query = $this->another->get('inbox');
      return $query->num_rows();//menampilkan berupa angka
   }

   public function sms_outbox()
   {
      $this->another->select('*');
      $q = $this->another->get('outbox');
      if($q->num_rows()>0)
      {
         foreach($q->result() as $row)
         {
            $data[] = $row;
         }
      }
      else
      {
         return FALSE;
      }
   }
   //inbox detail by id
   public function inboxDetailById($id){
      $this->another->where('id',$id);
      $query = $this->another->get('inbox');
      return $query->row_array();//get single result
   }
   //update status inbox
   public function updateStatusInbox($id){
      $this->another->where('id',$id);
      return $this->another->update('inbox',array('Processed'=>'true'));
   }
   ////////////////////
   // ALL ABOUT INBOX FORMAT
   ////////////////////
   //check jumlah barang berdasarkan pin

   ////////////////////// Format SMS 2 SUku
   public function cjp($pin,$id,$SenderNumber){
      //check jumlah
      $params = array($pin, $SenderNumber);//memasukkan fild inputan sql ke array params
      $sql = "SELECT id_produk FROM data_produk
      INNER JOIN data_user ON data_user.id_user = data_produk.penjual_id
      WHERE data_user.pin = ? AND data_user.telpon = ?";
      $query = $this->db->query($sql,$params);
      if($query->num_rows()>0){//produk ditemukan
         $reply = 'jumlah produk saat ini '.$query->num_rows();
      }else{//produk ditemukan
         $reply = 'Produk tidak ditemukan atau PIN Salah';
      }
      echo $reply;
      //end of jumlah produk
      $this->m_sms->updateStatusInbox($id);//update status inbox[worked]
      //balas sms
      $inboxDet = $this->m_sms->inboxDetailById($id);//get detail inbox
      $data = array(
         'TextDecoded'=>$reply,
         'DestinationNumber'=>$inboxDet['SenderNumber'],
      );
      return $this->m_sms->sendReply($data);//insert to outbox table
      //end of balas sms
   }

   //Check List Kode produk berdasarkan id penjual dari no.hp
   public function clkp($pin,$id,$SenderNumber){
      //check jumlah
      $params = array($pin, $SenderNumber);//memasukkan field inputan sql ke array params
      $sql = "SELECT id_produk, nama_produk FROM data_produk
      INNER JOIN data_user ON data_user.id_user = data_produk.penjual_id
      WHERE data_user.pin = ? AND data_user.telpon = ?";
      $query = $this->db->query($sql,$params);
      if($query->num_rows()>0){//produk ditemukan
         $reply1 = 'List Kode produk yang anda miliki adalah ';
         foreach($query->result() as $row) {
            $reply2[] = '(Produk :'.$row->nama_produk.', id:'.$row->id_produk.') , ';
         }
         $reply = $reply1.implode("",$reply2);
      }else{//produk ditemukan
         $reply = 'Produk tidak ditemukan atau PIN Salah';
      }
      echo $reply ;
      //print_r ($reply2) ;

      //end of jumlah produk
      $this->m_sms->updateStatusInbox($id);//update status inbox[worked]
      //balas sms
      $inboxDet = $this->m_sms->inboxDetailById($id);//get detail inbox
      $data = array(
         'TextDecoded'=>$reply,
         'DestinationNumber'=>$inboxDet['SenderNumber'],
      );
      return $this->m_sms->sendReply($data);//insert to outbox table
      //end of balas sms
   }
   // Keluhan penjual
   public function keluhan($pesan,$id,$SenderNumber){

      // $params = array($pin, $SenderNumber);//memasukkan field inputan sql ke array params
      // $sql = "SELECT * FROM data_user
      // WHERE data_user.telpon = ?";
      // $query = $this->db->query($sql,$SenderNumber);
      // if($query->num_rows()>0){//produk ditemukan
      // $reply1 = 'List Kode produk yang anda miliki adalah ';
      // foreach($query->result() as $row) {
      //   $reply2[] = '(Produk :'.$row->nama_produk.', id:'.$row->id_produk.') , ';
      // }
      $reply = "Pesan anda sudah kami masukkan kedalam data admin dan akan segera kami tindak lanjuti, Trimakasih";
      // }else{//produk ditemukan
      //   $reply = 'Produk tidak ditemukan atau PIN Salah';
      // }
      echo $reply ;
      //print_r ($reply2) ;

      //end of jumlah produk
      $this->m_sms->updateStatusInbox($id);//update status inbox[worked]
      //balas sms
      $inboxDet = $this->m_sms->inboxDetailById($id);//get detail inbox
      $data = array(
         'TextDecoded'=>$pesan,
         'SenderNumber'=>$inboxDet['SenderNumber'],
         'ReceivingDateTime'=>$inboxDet['ReceivingDateTime'],
         'Text'=>$inboxDet['Text'],
         'Coding'=>$inboxDet['Coding'],
         'SMSCNumber'=>$inboxDet['SMSCNumber'],
         'Class'=>$inboxDet['Class'],
         // 'ID'=>$inboxDet['ID'],
         'RecipientID'=>$inboxDet['RecipientID'],
         'Processed'=> "false",
      );
      $this->m_sms->sendReplyAdmin($data);//insert to outbox table
      $data2 = array(
         'TextDecoded'=>$reply,
         'DestinationNumber'=>$inboxDet['SenderNumber'],
      );
      return $this->m_sms->sendReply($data2);//insert to outbox table
      //end of balas sms
   }

   // SELECT `stok_produk` FROM `data_produk` inner join data_user on data_user.id_user = data_produk.penjual_id WHERE data_produk.id_produk = '1'

   //Format SMS 3 SUKU
   //check harga produk
   public function chp($pin,$id,$SenderNumber,$kpr){
      //check harga
      $params = array($pin, $SenderNumber,$kpr);
      $sql = "SELECT harga_produk FROM data_produk
      INNER JOIN data_user ON data_user.id_user = data_produk.penjual_id
      WHERE data_user.pin = ? AND data_user.telpon = ? AND data_produk.id_produk = ?";
      $query = $this->db->query($sql,$params);
      if($query->num_rows()>0){//produk ditemukan
         foreach($query->result() as $row) {
            $reply = 'harga produk dengan kode produk ('.$kpr.') saat ini Rp.'.number_format($row->harga_produk) . '';
         }
      }else{//produk ditemukan
         $reply = 'Produk tidak ditemukan, Atau PIN Salah';
      }
      echo $reply;
      //print_r ($query->result());

      //end of HARGA produk
      $this->m_sms->updateStatusInbox($id);//update status inbox[worked]
      //balas sms
      $inboxDet = $this->m_sms->inboxDetailById($id);//get detail inbox
      $data = array(
         'TextDecoded'=>$reply,
         'DestinationNumber'=>$inboxDet['SenderNumber'],
      );
      return $this->m_sms->sendReply($data);//insert to outbox table
      //end of balas sms
   }

   //check Stok produk
   public function CSTP($pin,$id,$SenderNumber,$kpr){
      //check stok
      $params = array($pin, $SenderNumber,$kpr);
      $sql = "SELECT stok_produk FROM data_produk
      INNER JOIN data_user ON data_user.id_user = data_produk.penjual_id
      WHERE data_user.pin = ? AND data_user.telpon = ? AND data_produk.id_produk = ?";
      $query = $this->db->query($sql,$params);
      if($query->num_rows()>0){//produk ditemukan
         foreach($query->result() as $row) {
            $reply = 'Jumlah Stok produk dengan kode produk ('.$kpr.') adalah '.number_format($row->stok_produk) . '(pcs)';
         }
      }else{//produk ditemukan
         $reply = 'Produk tidak ditemukan, Atau PIN Salah';
      }
      echo $reply;
      //print_r ($query->result());

      //end of STOK produk
      $this->m_sms->updateStatusInbox($id);//update status inbox[worked]
      //balas sms
      $inboxDet = $this->m_sms->inboxDetailById($id);//get detail inbox
      $data = array(
         'TextDecoded'=>$reply,
         'DestinationNumber'=>$inboxDet['SenderNumber'],
      );
      return $this->m_sms->sendReply($data);//insert to outbox table
      //end of balas sms
   }

   //check Detail produk
   public function CDP($pin,$id,$SenderNumber,$kpr){
      //check stok
      $params = array($pin, $SenderNumber,$kpr);
      $sql = "SELECT * FROM data_produk
      INNER JOIN data_user ON data_user.id_user = data_produk.penjual_id
      WHERE data_user.pin = ? AND data_user.telpon = ? AND data_produk.id_produk = ?";
      $query = $this->db->query($sql,$params);
      if($query->num_rows()>0){//produk ditemukan
         foreach($query->result() as $row) {
            $reply = '(id:'.$row->id_produk.') , Nama: '.$row->nama_produk. ', Stok :'.number_format($row->stok_produk). '(pcs), Harga: Rp.'.number_format($row->harga_produk).', Terjual :'.$row->pembeli;
         }
      }else{//produk ditemukan
         $reply = 'Produk tidak ditemukan, Atau PIN Salah';
      }
      echo $reply;
      //print_r ($query->result());

      //end of STOK produk
      $this->m_sms->updateStatusInbox($id);//update status inbox[worked]
      //balas sms
      $inboxDet = $this->m_sms->inboxDetailById($id);//get detail inbox
      $data = array(
         'TextDecoded'=>$reply,
         'DestinationNumber'=>$inboxDet['SenderNumber'],
      );
      return $this->m_sms->sendReply($data);//insert to outbox table
      //end of balas sms
   }
   /////////////////////Area rUbah data
   public function UPP($pin,$id,$SenderNumber,$pinbaru){
      //check stok
      $params = array($pin, $SenderNumber);
      $sql = "SELECT * FROM data_user
      WHERE data_user.pin = ? AND data_user.telpon = ?";
      $query = $this->db->query($sql,$params);
      if($query->num_rows()>0){//user ditemukan
         $this->db->where('telpon',$SenderNumber);
         $this->db->update('data_user',array('pin'=>$pinbaru));
         foreach($query->result() as $row) {
            $reply = 'PIN Lama anda telah dirubah menjadi ('.$pinbaru.'). Silahkan ingat PIN baru anda dan segera hapus SMS ini untuk keamanan ';
         }
      }else{//produk ditemukan
         $reply = 'Pin lama Salah, Silahkan cek kembali. Jika Lupa PIN silhkan hubungi ADMIN PNPM Piyungan';
      }
      echo $reply;
      //print_r ($query->result());

      //end of STOK produk
      $this->m_sms->updateStatusInbox($id);//update status inbox[worked]
      //balas sms
      $inboxDet = $this->m_sms->inboxDetailById($id);//get detail inbox
      $data = array(
         'TextDecoded'=>$reply,
         'DestinationNumber'=>$inboxDet['SenderNumber'],
      );
      return $this->m_sms->sendReply($data);//insert to outbox table
      //end of balas sms
   }
   /////////////////////////////////////////////////////////////
   ///Format 4 Suku

   public function resi($pin,$id,$SenderNumber,$ktr,$nrs)
   {
      $datapenjual = array();
      $datapenjual = $this->m_user->detailPenjual_bytlpuser($SenderNumber);

      $this->db->select('*');
      $this->db->from('transaksi');
      $this->db->join('data_user','data_user.id_user=transaksi.id_user');
      $this->db->where('transaksi.kode_transaksi', $ktr);
      $query = $this->db->get();
      if ($query->num_rows() > 0) {
         foreach ($query->result() as $row) {
            $emailUser = $row->email;
         }
      }

      $dataBarang = array();

      // Detail Barang
      $idpenjual = $datapenjual['id_user'];
      $sql = "SELECT * FROM transaksi_detail
      inner join transaksi_item ON transaksi_item.id_transaksi_detail = transaksi_detail.id_transaksi_detail
      WHERE transaksi_detail.kode_transaksi = '$ktr'
      and transaksi_detail.id_penjual = '$idpenjual'";
      $query2 = $this->db->query($sql);
      if($query2->num_rows()>0) {
         $dataBarang = $query2->result_array();
      }

      // $namaBarang = array();
      // foreach ($dataBarang as $br) { $namaBarang = $dataBarang['nama_produk']}


      // $emailUser = $emailUser;
      $penjual = $datapenjual['username_user'];
      $kode_transaksi = $ktr;
      // $namaBarang = $nama_produk;
      $kodeResi = $nrs;
      $urlgambar = base_url('doc/themes/public/images/slider/bg1.jpg');

      // Mulai Api SendGrid
      $config = Array(
      'protocol' => 'smtp',
      'smtp_host' => 'ssl://smtp.googlemail.com',
      'smtp_port' => 465,
      'smtp_user' => 'ukm.piyungan@gmail.com', // change it to yours
      'smtp_pass' => 'aiypwzqp123', // change it to yours
      'mailtype' => 'html',
      'charset' => 'iso-8859-1',
      'wordwrap' => TRUE
   );

   $namaBarang = '';
   foreach ($dataBarang as $br) { $namaBarang = $namaBarang.', '.$br['nama_produk'];}
   //echo $namaBarang;
   $params['html'] = '
   <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><meta name="viewport" content="width=device-width"><title>My email message created with BeeFree</title><meta http-equiv="Content-Type" content="text/html; charset=utf-8">  <meta name="viewport" content="width=device-width, initial-scale=1.0">  <meta http-equiv="X-UA-Compatible" content="IE=edge">  <meta name="format-detection" content="telephone=no">  <style type="text/css">  /* RESET */  #outlook a {padding:0;} body {width:100% !important; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; margin:0; padding:0; mso-line-height-rule:exactly;}  table td { border-collapse: collapse; }  .ExternalClass {width:100%;}  .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height: 100%;}  table td {border-collapse: collapse;}  /* IMG */  img {outline:none; text-decoration:none; -ms-interpolation-mode: bicubic;}  a img {border:none;}  /* Becoming responsive */  @media only screen and (max-device-width: 480px) {  table[id="container_div"] {max-width: 480px !important;}  table[id="container_table"], table[class="image_container"], table[class="image-group-contenitor"] {width: 100% !important; min-width: 320px !important;}  table[class="image-group-contenitor"] td, table[class="mixed"] td, td[class="mix_image"], td[class="mix_text"], td[class="table-separator"], td[class="section_block"] {display: block !important;width:100% !important;}  table[class="image_container"] img, td[class="mix_image"] img, table[class="image-group-contenitor"] img {width: 100% !important;}  table[class="image_container"] img[class="natural-width"], td[class="mix_image"] img[class="natural-width"], table[class="image-group-contenitor"] img[class="natural-width"] {width: auto !important;}  a[class="button-link justify"] {display: block !important;width:auto !important;}  td[class="table-separator"] br {display: none;}  td[class="cloned_td"]  table[class="image_container"] {width: 100% !important; min-width: 0 !important;} } table[class="social_wrapp"] {width: auto;} </style></head><body bgcolor="#eeeeee"><table id="container_div" style="text-align:center; background-color:#eeeeee; border-collapse: collapse" align="center" bgcolor="#eeeeee" width="100%" cellpadding="0" cellspacing="0" border="0">  <tr><td align="center"><br><table id="container_wrapper" cellpadding="0" cellspacing="0" border="0"><tbody><tr><td><table id="container_table" cellpadding="0" cellspacing="0" border="0" bgcolor="#ffffff" style="border-collapse: collapse; min-width: 600px;" width="600"><tbody><tr><td valign="top" bgcolor="#ffffff"><table cellpadding="10" cellspacing="0" border="0" width="100%" style="border-collapse: collapse; background-color: rgb(255, 255, 255);" bgcolor="#ffffff"><tbody><tr valign="top"><td valign="top" style="line-height: 130%; color: rgb(0, 0, 0);"><div style="color: rgb(102, 102, 102);"><span style="font-size: 14px; line-height: 130%;"><span style="font-family: arial, helvetica, sans-serif; line-height: 130%;">www.PNPM-Piyungan.pe.hu</span></span></div></td></tr></tbody></table></td></tr><tr><td valign="top" bgcolor="#ffffff"><table cellpadding="10" cellspacing="0" border="0" width="100%" style="border-collapse: collapse; background-color: rgb(255, 255, 255);" bgcolor="#ffffff"><tbody><tr valign="top"><td valign="top" style="line-height: 130%; color: rgb(0, 0, 0);"><span style="font-size: 14px; font-family: Arial, Helvetica, sans-serif; color: rgb(102, 102, 102); line-height: 130%;">Barang Pesanan Anda Sudah terkirim ! :D</span></td></tr></tbody></table></td></tr><tr><td valign="top" bgcolor="#ffffff"><table class="image_container" cellpadding="10" cellspacing="0" border="0" width="100%" style="border-collapse: collapse; background-color: rgb(255, 255, 255);" bgcolor="#ffffff"><tbody><tr valign="top"><td valign="top" align="center"><img data-embeded="auto" src="'.$urlgambar.'" alt="Text shown when image is not displayed" style="height: auto; vertical-align: top; width: 580px;" width="580"></td></tr></tbody></table><table cellpadding="10" cellspacing="0" border="0" width="100%" style="border-collapse: collapse; background-color: rgb(255, 255, 255);" bgcolor="#ffffff"><tbody><tr valign="top"><td valign="top" style="line-height: 130%; color: rgb(0, 0, 0);"><span style="font-size: 14px; font-family: Arial, Helvetica, sans-serif; color: rgb(0, 0, 0); line-height: 130%;">Termikasih telah sabar menunggu. Kami beritahukan bahwa barang anda sudah dikirim oleh Penjual : '.$penjual.', Untuk Barang : '.$namaBarang.' ,</span><br><strong style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.3999996185303px;">Nomor Resi Pengiriman anda adalah: ('.$kodeResi.')</strong></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table><br></td></tr></table></body></html>
   ';
   $message = $params['html'] ;
   $this->load->library('email', $config);
   $this->email->set_newline("\r\n");
   $this->email->from('ukm.piyungan@gmail.com'); // change it to yours
   $this->email->to($emailUser);// change it to yours
   $this->email->subject('Nomor Resi Pemesanan Anda -'.$kode_transaksi);
   $this->email->message($message);
   if($this->email->send())
   {
      echo 'Email sent.';
      $this->db->where('kode_transaksi',$ktr);
      $this->db->where('id_penjual',$idpenjual);
      $this->db->update('transaksi_detail',array('status'=>'Terkirim'));
   }
   else
   {
      show_error($this->email->print_debugger());
   }
   print_r($message);
   print_r($datapenjual);

   //Response SMS
   $reply = 'Nomor Resi Sudah terkirim ke Pembeli, Pencairan dana untuk kode transaksi: '.$ktr.' dpt dilakukan di Akhir bulan. SIMPAN SMS INI UNTUK BUKTI';
   //balas sms
   $this->m_sms->updateStatusInbox($id);//update status inbox[worked]

   $inboxDet = $this->m_sms->inboxDetailById($id);//get detail inbox
   $data = array(
      'TextDecoded'=>$reply,
      'DestinationNumber'=>$inboxDet['SenderNumber'],
   );
   return $this->m_sms->sendReply($data);//insert to outbox table
}


// Area rUbah data
public function UHP($pin,$id,$SenderNumber,$kpr,$hbr){
   //check stok
   $sql = "SELECT * FROM data_produk
   WHERE data_produk.id_produk = ?";
   $query = $this->db->query($sql,$kpr);
   if($query->num_rows()>0){//produk ditemukan
      $this->db->where('id_produk',$kpr);
      $this->db->update('data_produk',array('harga_produk'=>$hbr));
      foreach($query->result() as $row) {
         $reply = 'Harga Produk "'.$row->nama_produk. '" Berhasil dirubah menjadi Rp.'.number_format($hbr). '. dari Sebelumnya Rp.'.number_format($row->harga_produk);
      }
   }else{//produk ditemukan
      $reply = 'Produk tidak ditemukan, Atau PIN Salah';
   }
   echo $reply;
   //print_r ($query->result());

   //end of STOK produk
   $this->m_sms->updateStatusInbox($id);//update status inbox[worked]
   //balas sms
   $inboxDet = $this->m_sms->inboxDetailById($id);//get detail inbox
   $data = array(
      'TextDecoded'=>$reply,
      'DestinationNumber'=>$inboxDet['SenderNumber'],
   );
   return $this->m_sms->sendReply($data);//insert to outbox table
   //end of balas sms
}


public function USP($pin,$id,$SenderNumber,$kpr,$stp){
   //check stok
   $sql = "SELECT * FROM data_produk
   WHERE data_produk.id_produk = ?";
   $query = $this->db->query($sql,$kpr);
   if($query->num_rows()>0){//produk ditemukan
      $this->db->where('id_produk',$kpr);
      $this->db->update('data_produk',array('stok_produk'=>$stp));
      foreach($query->result() as $row) {
         $reply = 'Stok Produk "'.$row->nama_produk. '" Berhasil dirubah menjadi '.number_format($stp). '(pcs). dari Sebelumnya '.number_format($row->stok_produk).'(pcs)';
      }
   }else{//produk ditemukan
      $reply = 'Produk tidak ditemukan, Atau PIN Salah';
   }
   echo $reply;
   //print_r ($query->result());

   //end of STOK produk
   $this->m_sms->updateStatusInbox($id);//update status inbox[worked]
   //balas sms
   $inboxDet = $this->m_sms->inboxDetailById($id);//get detail inbox
   $data = array(
      'TextDecoded'=>$reply,
      'DestinationNumber'=>$inboxDet['SenderNumber'],
   );
   return $this->m_sms->sendReply($data);//insert to outbox table
   //end of balas sms
}

///////
//format sms salah
public function salah($pin,$id,$SenderNumber){
   $reply = 'Maaf Format SMS Belum benar, Silahkan cek kembali format sms anda';
   $params = array($pin,$SenderNumber);
   $this->m_sms->updateStatusInbox($id);//update status inbox[worked]
   //balas sms
   $inboxDet = $this->m_sms->inboxDetailById($id);//get detail inbox
   $data = array(
      'TextDecoded'=>$reply,
      'DestinationNumber'=>$inboxDet['SenderNumber'],
   );
   return $this->m_sms->sendReply($data);//insert to outbox table
}

////////////////////
// ALL ABOUT OUTBOX
////////////////////
public function sendReply($data){
   return $this->another->insert('outbox',$data);
}
public function sendReplyAdmin($data){
   $this->another->insert('admininboxmessage',$data);
   // $inboxDet = $this->m_sms->inboxDetailById($id);//get detail inbox
   // $reply = "Pesan anda sudah kami masukkan kedalam data admin dan akan segera kami tindak lanjuti, Trimakasih";

   //   $data = array(
   //     'TextDecoded'=>$reply,
   //     'DestinationNumber'=>$inboxDet['SenderNumber'],
   //     );
   //   return $this->m_sms->sendReply($data);//insert to outbox table
}
/*
** ALL ABOUT sync
*/
public function lattestSmsId($type)//type = inbox / outbox
{
   $this->another->limit(1,0);//only one
   $this->another->select('ID');//get id
   $this->another->order_by('ID','DESC');
   $query = $this->another->get($type)->row_array();
   return $query = $query['ID'];
}
//get update inbox from offline
public function updateInbox($id)//type = inbox
{
   $this->another->where('ID >',$id);
   $query = $this->another->get('inbox');
   return $query->result_array();
}
//clone inbox
public function cloneInbox($params)
{
   foreach($params as $p):
      $this->another->insert('inbox',$p);
   endforeach;
}
//get update outboox from online
public function updateOutbox($id)//type = inbox
{
   $this->another->where('ID >',$id);
   $query = $this->another->get('outbox');
   return $query->result_array();
}
//clone inbox
public function cloneOutbox($params)
{
   foreach($params as $p):
      $this->another->insert('outbox',$p);
   endforeach;
}
}
