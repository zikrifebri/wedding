<?php
class PengaturanModel extends Model{
   public function __construct(){
      $this->connect();
      $this->_table = "pengaturan";      
   }

   public function showPengaturan(){
		$queryx = "SELECT * from pengaturan";
		$query=$this->query($queryx);	        	
		$data = $this->getResult($query);	
		
      return $data;
   }

}

// import data by 
// cubrid_query(INSERT INTO `pengaturan` VALUES ('value-1','value-2','value-3','value-4','value-5','value-6','value-7','value-8','value-9','value-10');)