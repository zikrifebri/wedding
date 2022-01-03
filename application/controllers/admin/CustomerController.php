<?php
use \application\controllers\AdminMainController;
class CustomerController extends AdminMainController{
   function __construct(){
      parent::__construct();
      $this->model('customer');
   }

//Menampilkan halaman   
   public function index(){
      $this->template('admin/customer', 'Customer');
   }

//Menampilkan data melalui ajax   
   public function listData(){
      require_once ROOT."/application/functions/function_action.php";
      $query = $this->customer->selectAll("id_customer", "DESC");
      $list = $this->customer->getResult($query);
      $data = array();
      $no = 0;
      foreach($list as $li){
         $no ++;
         $row = array();
         $row[] = $no;
         $row[] = $li['nama_lengkap']. "<br/>" .$li['no_ktp'];
         $row[] = $li['email']. "<br/>" .$li['password'];
         $row[] = create_action($li['id_customer']);
         $data[] = $row;
      }
      $output = array("data" => $data);
      echo json_encode($output);
   }

//Menampilkan data untuk ditampilkan pada form edit   
   public function edit($id){
      $query = $this->customer->selectWhere(array('id_customer'=>$id));
      $data = $this->customer->getResult($query);
      echo json_encode($data[0]);
   }

//Memperbaharui data pada database
   // public function update(){
   //    $data = array();
   //    $data['nama_lengkap'] = $_POST['nama_lengkap'];
   //    $data['no_ktp'] = $_POST['no_ktp'];
   //    $data['email'] = $_POST['email'];   
   //    $data['password'] = $_POST['password'];
   //    $id = $_POST['id'];
   //    $simpan = $this->customer->update($data, array('id_customer'=>$id));
   // }

//Menghapus data pada database
   public function delete($id){
      $hapus = $this->customer->delete(array('id_customer'=>$id));
   }
}