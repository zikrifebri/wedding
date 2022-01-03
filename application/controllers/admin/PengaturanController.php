<?php
use \application\controllers\AdminMainController;
class PengaturanController extends AdminMainController{
   function __construct(){
      parent::__construct();
      $this->model('pengaturan');
   }
   public function index(){
      $query = $this->pengaturan->selectAll();
      $data = $this->pengaturan->getResult($query);
      $this->template('admin/pengaturan', 'Pengaturan', $data);
   }

   public function update(){
      $data = array();
      $data['judul_website'] = $_POST['judul'];
      $data['favicon'] = $_POST['favicon'];
      $data['email_admin'] = $_POST['email'];
      $data['alamat'] = $_POST['alamat'];
      $data['telp'] = $_POST['telp'];
      $data['sms'] = $_POST['sms'];
      $data['bank'] = $_POST['bank'];
      $data['pemilik_rekening'] = $_POST['pemilik'];
      $data['rekening'] = $_POST['rekening'];
      $data['facebook'] = $_POST['facebook'];
      $simpan = $this->pengaturan->update($data);
      if($simpan) echo "success";
   }
}
