<?php
use application\controllers\UserMainController;
class ContactController extends UserMainController{

   public function index(){
      $this->template('user/contact');   
   }

   public function insert(){
      $this->model('pesan');

      $data = array();
      $data['subjek'] = $_POST['subjek'];
      $data['pesan'] = $_POST['pesan'];
      $data['id_customer'] = $_SESSION['id_customer'];
      $data['tanggal'] = date('Y-m-d');
      $data['dibaca'] = "N";
      $simpan = $this->pesan->insert($data);
   }
} 