<?php
class PaketModel extends Model{
   public function __construct(){
      $this->connect();
      $this->_table = "paket";  
   }

   	public function showPaket(){
		$queryx = "SELECT * from paket";
		$query=$this->query($queryx);	        	
		$data = $this->getResult($query);	
		return $data;
	}
}