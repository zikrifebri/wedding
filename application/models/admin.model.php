<?php
class AdminModel extends Model{
   public function __construct(){
      $this->connect();
      $this->_table = "admin";      
   }

   public function cekUser($username,$password){
		$query = "SELECT count(*) from admin where username='".$username."' and password='".$password."' ";
    $jum=$this->getRows($query);		
		return $jum;
	}

	 public function showAdmin($uname){
    $queryx = "SELECT * from admin where username='$uname'";
    $query=$this->query($queryx);           
    $data = $this->getResult($query); 
    return $data;
  }
}