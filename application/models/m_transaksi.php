<?php if (!defined('BASEPATH'))	exit('No direct script access allowed');

Class m_transaksi extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	//transaksi by kode transaksi
	public function transaksi($kodetransaksi)
	{
		$this->db->order_by('transaksi.tgl_transaksi','DESC'); //order
		$this->db->where('kode_transaksi',$kodetransaksi);
		$this->db->join('data_user','data_user.id_user = transaksi.id_user');
		return $this->db->get('transaksi');
	}
	//list transaksi
	public function listTransaksi($limit,$offset,$status="")
	{
		//list transaksi order by status
		$where = "";
		if(!empty($status))$where = "WHERE konfirmasi_pembayaran.status = '$status'";
		//default list transaksi
		$sql = "SELECT data_user.nama,
		transaksi.kode_transaksi,transaksi.total_biaya,konfirmasi_pembayaran.status,transaksi.tgl_transaksi
		FROM transaksi INNER JOIN data_user ON data_user.id_user = transaksi.id_user
		INNER JOIN konfirmasi_pembayaran ON konfirmasi_pembayaran.kode_transaksi = transaksi.kode_transaksi
		$where ORDER BY transaksi.tgl_transaksi DESC
		LIMIT $offset,$limit " ;
		$query = $this->db->query($sql);
		if($query->num_rows()>0){return $query->result_array();}
		else{return array();}
	}
	//count all list transaksi
	public function countListTransaksi($status="")
	{
		if(!empty($status))$this->db->where('status',$status);
		$query = $this->db->get('transaksi');
		return $query->num_rows();
	}
	//search transaksi
	public function searchTransaksi($keyword)
	{
		//default list transaksi
		$sql = "SELECT data_user.nama,
		transaksi.kode_transaksi,transaksi.total_biaya,transaksi.status,transaksi.tgl_transaksi
		FROM transaksi INNER JOIN data_user
		ON data_user.id_user = transaksi.id_user
		WHERE kode_transaksi LIKE '%$keyword%'";
		$query = $this->db->query($sql,$keyword);
		if($query->num_rows()>0){return $query->result_array();}
		else{return array();}
	}
	//count search transaksi
	public function countSearchTransaksi($keyword)
	{
		if(!empty($status))$this->db->where('kode_transaksi',$keyword);
		$query = $this->db->get('transaksi_detail');
		return $query->num_rows();
	}
	//detail transaksi
	public function detailTransaksi($noref)
	{
		$sql = "SELECT data_user.nama,data_user.alamat,data_user.email,
		transaksi_detail.kode_transaksi,transaksi_detail.total_harga,transaksi_detail.status,transaksi_detail.tgl_transaksi,
		transaksi_detail.metode,transaksi_detail.bank
		FROM transaksi_detail INNER JOIN data_user
		ON data_user.id_user = transaksi_detail.id_user
		WHERE kode_transaksi = $noref";
		$query = $this->db->query($sql);
		if($query->num_rows()>0){return $query->row_array();}
		else{return array();}
	}
	//transaksi item
	public function itemTransaksi($noref)
	{
		$this->db->where('kode_transaksi',$noref);
		$query = $this->db->get('transaksi_item');
		if($query->num_rows()>0){return $query->result_array();}
		else{return array();}
	}
	/*
	* Transaksi
	*/
	public function generateKodeTransaksi()
	{
		$today = date('Ymd');
		$kodetransaksi = $today;
		$sql = "SELECT * FROM transaksi WHERE kode_transaksi LIKE '".$kodetransaksi."%' ORDER BY transaksi.kode_transaksi DESC";
		$query = $this->db->query($sql);
		if($query->num_rows()>0)//ada data sebelumnya
		{
			$query = $query->row_array();
			$kodetransaksi = $query['kode_transaksi']+1;
		}else{//no data
			$kodetransaksi = $kodetransaksi.'1';//kode transaksi baru untuk hari ini
		}
		echo $kodetransaksi;
		return  $kodetransaksi;
	}
	//get detail transaksi
	public function getDetailTransaksi($kodetransaksi,$idpenjual)
	{
		$this->db->where('kode_transaksi',$kodetransaksi);
		$this->db->where('id_penjual',$idpenjual);
		return $this->db->get('transaksi_detail');
	}
	//new detail transaksi
	public function newDetailTransaksi($kodetransaksi,$idpenjual,$ongkir,$totalharga)
	{
		$data = array('kode_transaksi'=>$kodetransaksi,'id_penjual'=>$idpenjual,'biaya_ongkir'=>$ongkir,'total_harga'=>$totalharga);
		return $this->db->insert('transaksi_detail',$data);
	}
	//new transaksi item
	public function newTransaksiItem()
	{

	}
	//transaksi terakhir
	public function transaksiTerakhir($iduser)
	{
		$this->db->where('id_user',$iduser);
		$this->db->order_by('kode_transaksi','DESC');//order by desc
		$this->db->limit(1,0);
		return $this->db->get('transaksi')->row_array();
	}
	//transaksi lewat jatuh tempo
	public function listJatuhTempo()
	{
		$this->db->select('transaksi.kode_transaksi,transaksi_detail.id_transaksi_detail');
		$this->db->where('DATEDIFF(transaksi.tgl_transaksi,CURRENT_DATE) >',-2);
		$this->db->where('konfirmasi_pembayaran.status','Pending');
		$this->db->or_where('konfirmasi_pembayaran.status','');
		$this->db->join('konfirmasi_pembayaran','konfirmasi_pembayaran.kode_transaksi = transaksi.kode_transaksi');
		$this->db->join('transaksi_detail','transaksi_detail.kode_transaksi = transaksi.kode_transaksi');
		return $this->db->get('transaksi')->result_array();
	}
}
