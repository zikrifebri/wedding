<?php
class PesanModel extends Model{
   public function __construct(){
      $this->connect();
      $this->_table = "pesan";  
   }

   public function getNum(){
		$query = "SELECT count(*) from pesan where dibaca='N'";			
    	$jml_pesan=$this->getRows($query);		
		return $jml_pesan;
	}
}

