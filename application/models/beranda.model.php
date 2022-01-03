<?php
class BerandaModel extends Model{
   public function __construct(){
      $this->connect();
      $this->_table = "beranda";  
   }
}