<?php
class TransaksiModel extends Model{
   public function __construct(){
      $this->connect();
      $this->_table = "transaksi";  
   }

   public function getNum(){
		$query = "SELECT count(*) from transaksi where status='Sudah_Bayar' ";			
    	$jml_transaksi=$this->getRows($query);		
		return $jml_transaksi;
	}

	public function showTransaksi(){
		$queryx = "SELECT * from paket b, tempat c, customer d, jadwal e, transaksi f where 
		b.id_paket=e.id_paket and c.id_tempat=e.id_tempat 
		and d.id_customer=f.id_customer and e.id_jadwal=f.id_jadwal ORDER BY id_transaksi desc";

		$query=$this->query($queryx);	    	
		$data = $this->getResult($query);	
		return $data;
	}

	public function showHistory(){
		$sesid = $_SESSION['id_customer'];
		$queryx = "SELECT * from paket b, tempat c, customer d, jadwal e, transaksi f where 
		b.id_paket=e.id_paket and c.id_tempat=e.id_tempat 
		and d.id_customer=f.id_customer and e.id_jadwal=f.id_jadwal and (d.id_customer='$sesid')
		ORDER BY id_transaksi desc";

		$query=$this->query($queryx);	        	
		$data = $this->getResult($query);	
		return $data;
	}

	public function laporan($tanggal){
		$tanggal = explode("_", $tanggal);
		$queryx = "SELECT * FROM paket b, tempat c, customer d, jadwal e, transaksi f where 
      b.id_paket=e.id_paket and c.id_tempat=e.id_tempat and d.id_customer=f.id_customer and 
      e.id_jadwal=f.id_jadwal and f.status='Lunas' and 
      (f.tanggal BETWEEN '$tanggal[0]' and '$tanggal[1]') ";

		$query=$this->query($queryx);	        	
		$data = $this->getResult($query);	
		return $data;	
	}

}