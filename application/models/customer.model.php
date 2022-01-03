<?php
class CustomerModel extends Model{
   public function __construct(){
      $this->connect();
      $this->_table = "customer";  
   }

  public function cekUser($email,$password){
    $query = "SELECT count(*) from customer where email='".$email."' and password='".$password."' ";
    $jum=$this->getRows($query);    
    return $jum;
  }

  public	function getNum(){
		$query = "SELECT count(*) from customer";			
    $jml_cust=$this->getRows($query);		
		return $jml_cust;
	}

  public function showCustomer(){
    $queryx = "SELECT * from customer";
    $query=$this->query($queryx);           
    $data = $this->getResult($query); 
    return $data;
  }

  public function getCustomer(){
    $sesid = $_SESSION['id_customer'];
    $queryx = "SELECT * from customer where (id_customer='$sesid')";
    $query=$this->query($queryx);           
    $data = $this->getResult($query); 
    return $data;
  }

    public function showCustomerx($mail){
    $queryx = "SELECT * from customer where email='$mail'";
    $query=$this->query($queryx);           
    $data = $this->getResult($query); 
    return $data;
  }

}