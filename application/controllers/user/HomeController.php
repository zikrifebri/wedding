<?php
use \application\controllers\UserMainController;
class HomeController extends UserMainController{
	function __construct(){
	}

   public function index(){ 
   $this->template('user/home');
    
   }
}