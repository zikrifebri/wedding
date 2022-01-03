<?php
namespace application\controllers;
use \Controller;
class UserMainController extends Controller{

   public function __construct(){
          if(empty($_SESSION['akses']) AND empty($_SESSION['nama_lengkap'])){
         $this->redirect('user/login');
       }
   }

   public function template($viewName, $bc='', $data=array()){
     $this->model('pengaturan');
     $query = $this->pengaturan->selectAll();
     $datapengaturan = $this->pengaturan->getResult($query);

     $view = $this->view('user/template');
     $view->bind('viewName', $viewName);
     $view->bind('data', $data);
     $view->bind('pengaturan', $datapengaturan);	
   }

   public function logout(){
      session_destroy();
      $this->redirect('user/login');
   }
}