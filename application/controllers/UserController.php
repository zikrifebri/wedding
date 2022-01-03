<?php
class UserController extends Controller{

//Method untuk mengakses controller pada folder user
   private function getController($controller, $action='', $parameter=''){
      $controllerPath = ROOT .'/application/controllers/user/'. ucfirst($controller) .'Controller.php';
      if(file_exists($controllerPath)){
         require_once $controllerPath;
         $controllerName = ucfirst($controller)."Controller";      
         $object = new $controllerName();
      
         $act = ($action!='') ? $action : 'index';
         $param = array($parameter);
      
         if(method_exists($controllerName, $act)){
            call_user_func_array(array($object, $act), $param);
         }else die('Action not found!');
      }else die('Controller not found!');
   }
   
   public function index(){
      if(empty($_SESSION['username']) AND empty($_SESSION['password'])){
         $this->redirect('user/login');
      }   
      $this->getController('home');
   }
   
   public function customer($action=''){
      $this->getController('customer', $action);
   }

   public function login($action=''){
      $this->getController('login', $action);
   }

   public function contact($action='', $parameter=''){
      $this->getController('contact', $action, $parameter);
   }

   public function history($action='', $parameter=''){
      $this->getController('history', $action, $parameter);
   }

   public function informasi($action='', $parameter=''){
      $this->getController('informasi', $action, $parameter);
   }

   public function pemesanan($action='', $parameter=''){
      $this->getController('pemesanan', $action, $parameter);
   }
   
   public function menu($action='', $parameter=''){
      $this->getController('menu', $action, $parameter);
   }

   public function pengaturan($action='', $parameter=''){
      $this->getController('pengaturan', $action, $parameter);
   }
   
   public function profil($action='', $parameter=''){
      $this->getController('profil', $action, $parameter);
   }
   
   public function logout(){
      session_destroy();
      $this->redirect('user/login');
   }
   
}