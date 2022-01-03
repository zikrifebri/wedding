<?php
use \application\controllers\UserMainController;
class CustomerController extends UserMainController{
   function __construct(){
      parent::__construct();
      $this->model('customer');
   }

   public function insert(){
      $data = array();
      $data['nama_lengkap'] = $_POST['nama_lengkap'];
      $data['no_ktp'] = $_POST['no_ktp'];
      $data['tempat_lahir'] = $_POST['tempat_lahir'];
      $data['tgl_lahir'] = $_POST['tgl_lahir'];
      $data['nama_bank'] = $_POST['nama_bank'];
      $data['no_rek'] = $_POST['no_rek'];
      $data['alamat'] = $_POST['alamat'];
      $data['no_telp'] = $_POST['no_telp'];
      $data['pekerjaan'] = $_POST['pekerjaan'];
      $data['email'] = $_POST['email'];
      $data['password'] = password_hash($_POST['password'],PASSWORD_BCRYPT);
      $simpan = $this->customer->insert($data);
   }
}