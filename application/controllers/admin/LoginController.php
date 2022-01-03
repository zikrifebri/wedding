<?php
class LoginController extends Controller{
   function __construct(){
      $this->model('admin');
   }

//Method untuk menampilkan halaman login   
   public function index(){
      $this->view('admin/login');
   }

//Method untuk mengecek username dan password yang dikirim dari halaman login
   public function check(){ 
      $username = $this->validate($_POST['username']);
      $queryx = $this->admin->showAdmin($username);     
      $hash= $queryx[0]['password'];
         $password = password_verify($_POST['password'],$hash);
         if($password!=1){
            //redirect ke login password salah
            $view = $this->view('admin/login');
            $view->bind('msg', 'Yaelah Username atau Password Kamu salah!');
         }else{
         
      $query = $this->admin->selectWhere(array('username'=>$username, 'password'=>$hash));
      $data = $this->admin->getResult($query);
      $jum = $this->admin->cekUser($username,$hash);

      if($jum>0){
         $data = $data[0];
         $_SESSION['username'] = $data['username'];
         $_SESSION['password'] = $data['password'];
         $this->redirect('admin');
      }else{
         $view = $this->view('admin/login');
         $view->bind('msg', 'Yaelah Username atau Password Kamu salah!');
      } 
   }
   }
   
}