<?php
use \application\controllers\BerandaMainController;
class GoldenController extends BerandaMainController{
	function __construct(){
	}

   public function index(){ 
   $this->template('golden');
    
   }
}