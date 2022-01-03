<?php
use \application\controllers\AdminMainController;
class ProfilController extends AdminMainController{
   function __construct(){
      parent::__construct();
      $this->model('admin');
   }
   public function index(){
      $query = $this->admin->selectAll();
      $data = $this->admin->getResult($query);
      $this->template('admin/profil', 'Profil', $data);
   }
   
   public function update(){
      $data = array();
      $data['password'] = password_hash($_POST['baru'],PASSWORD_BCRYPT);
      $username = $this->validate($_POST['username']);
      $queryx = $this->admin->showAdmin($username);     
      $hash= $queryx[0]['password'];
      $lama = password_verify($_POST['lama'],$hash);  
      
      $query= $this->admin->selectWhere(array('username'=>$_SESSION['username']));
      $cek = $this->admin->getResult($query);
      
      if($cek[0]['password'] != $lama){
          echo "Password lama salah!";
      }else{
          $simpan = $this->admin->update($data);
         if($simpan) echo "success";
      }
   }
}