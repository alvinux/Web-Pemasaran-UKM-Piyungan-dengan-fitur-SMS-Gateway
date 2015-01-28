<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Base extends CI_Controller {

      public function __construct(){
            parent::__construct();
      // Your own constructor code
      }

      protected function head($head, $data){
      		//variabel head disimpan
      		$data['head'] = $head;
      		//menyisipkan fila base/head.php;
      		$this->load->view('base/head.php', $data);
      }

      protected function tail($tail, $data){
      		//variabel head disimpan
      		$data['tail'] = $tail;
      		//menyisipkan fila base/head.php;
      		$this->load->view('base/tail.php', $data);

      }

}
?>