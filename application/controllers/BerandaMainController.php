<?php
namespace application\controllers;
use \Controller;
class BerandaMainController extends Controller{
   public function __construct(){
    $this->template('beranda');  
   }

   public function template($viewName, $bc='', $data=array()){
      $view = $this->view('template');
      $view->bind('viewName', $viewName);
      $view->bind('data', $data);   
   }

} 