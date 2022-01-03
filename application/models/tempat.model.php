<?php
class TempatModel extends Model{
   public function __construct(){
      $this->connect();
      $this->_table = "tempat";  
   }

   // public function getNum(){
	// 	$query = "SELECT count(*) from tempat";			
   //  	$jml_tempat=$this->getRows($query);		
	// 	return $jml_tempat;
	// }

	public function showTempat(){
		$queryx = "SELECT * from tempat";
		$query=$this->query($queryx);	        	
		$data = $this->getResult($query);	
		
		return $data;
	}
}