<?php
use application\controllers\BerandaMainController;
class BerandaController extends BerandaMainController{

   public function index(){
      $this->template('beranda');   
   }
} 