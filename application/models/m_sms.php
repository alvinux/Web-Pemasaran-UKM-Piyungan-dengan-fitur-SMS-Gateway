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
   

    public function sms_inbox()
    {
      $this->another->select('*');
      $query = $this->another->get('inbox');
      if($query->num_rows()>0){
            return $query->row_array();
        } else {
            return array();
        }
    }  

    public function jml_inbox()
    {
      $this->another->select('*');
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







  }


?>