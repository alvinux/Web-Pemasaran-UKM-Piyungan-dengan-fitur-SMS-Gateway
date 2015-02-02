<?php
 
if(!defined('BASEPATH')) exit('No direct script access allowed');
   
  class Anotherdb_model extends CI_Model
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
      $q = $this->another->get('index');
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



    public function sms_index()
    {
      $this->another->select('*');
      $q = $this->another->get('index');
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