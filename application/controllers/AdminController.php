<?php
class AdminController extends Controller{

//Method untuk mengakses controller pada folder admin
   private function getController($controller, $action='', $parameter=''){
      $controllerPath = ROOT .'/application/controllers/admin/'. ucfirst($controller) .'Controller.php';
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
         $this->redirect('admin/login');
      }   
      $this->getController('dashboard');
   }
   
   public function login($action=''){
      $this->getController('login', $action);
   }

   public function tempat($action='', $parameter=''){
      $this->getController('tempat', $action, $parameter);
   }

   public function paket($action='', $parameter=''){
      $this->getController('paket', $action, $parameter);
   }

   public function jadwal($action='', $parameter=''){
      $this->getController('jadwal', $action, $parameter);
   }

   public function transaksi($action='', $parameter=''){
      $this->getController('transaksi', $action, $parameter);
   }
   
   public function menu($action='', $parameter=''){
      $this->getController('menu', $action, $parameter);
   }
   
   public function informasi($action='', $parameter=''){
      $this->getController('informasi', $action, $parameter);
   }
   
   public function pesan($action='', $parameter=''){
      $this->getController('pesan', $action, $parameter);
   }
   
   public function profil($action=''){
      $this->getController('profil', $action);
   }
   
   public function pengaturan($action='', $parameter=''){
      $this->getController('pengaturan', $action, $parameter);
   }
   
   public function laporan($action='', $parameter=''){
      $this->getController('laporan', $action, $parameter);
   }

   public function customer($action='', $parameter=''){
      $this->getController('customer', $action, $parameter);
   }
   
   public function logout(){
      session_destroy();
      $this->redirect('admin/login');
   }
   
}