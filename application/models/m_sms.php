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
          $reply = 'maaf produk tidak ditemukan atau PIN Salah';
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
          $reply = 'jumlah produk saat ini '.$query->num_rows();
        }else{//produk ditemukan
          $reply = 'maaf produk tidak ditemukan';
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

    //check Stok produk
    public function CSTP($pin,$id,$SenderNumber,$kpr){
        //check harga
      $params = array($pin, $SenderNumber,$kpr);
        $sql = "SELECT stok_produk FROM data_produk
        INNER JOIN data_user ON data_user.id_user = data_produk.penjual_id
        WHERE data_user.pin = ? AND data_user.telpon = ? AND data_produk.id_produk = ?";
        $query = $this->db->query($sql,$params);
        if($query->num_rows()>0){//produk ditemukan
          $reply = 'jumlah produk saat ini '.$query->num_rows();
        }else{//produk ditemukan
          $reply = 'maaf produk tidak ditemukan';
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
  }
  ?>