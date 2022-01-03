<?php
class LoginController extends Controller{
   function __construct(){
      $this->model('customer');
   }

//Method untuk menampilkan halaman login   
   public function index(){
      $this->view('user/login');
   }

//Method untuk mengecek username dan password yang dikirim dari halaman login
   public function check(){ 
      $email = $this->validate($_POST['email']);
      $queryx = $this->customer->showCustomerx($email);     
      $hash= $queryx[0]['password'];
         $password = password_verify($_POST['password'],$hash);
         if($password!=1){
            //redirect ke login password salah
            $view = $this->view('user/login');
            $view->bind('msg', 'Username atau Password salah!');
         }else{
         
      $query = $this->customer->selectWhere(array('email'=>$email, 'password'=>$hash));
      $data = $this->customer->getResult($query);
      $jum = $this->customer->cekUser($email,$hash);

      if($jum>0){
         $data = $data[0];
         $_SESSION['id_customer'] = $data['id_customer'];
         $_SESSION['nama_lengkap'] = $data['nama_lengkap'];
         $_SESSION['password'] = $data['password'];
         $_SESSION['akses'] = "user";
         $this->redirect('user');
      }else{
         $view = $this->view('user/login');
         $view->bind('msg', 'Username atau Password salah!');
      } 
   }
   }
}