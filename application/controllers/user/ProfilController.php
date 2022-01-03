<?php
use \application\controllers\UserMainController;
class ProfilController extends UserMainController{
     function __construct(){
      parent::__construct();
      $this->model('customer');
   }

//Menampilkan halaman   
   public function index(){
      $this->template('user/profil', 'Profil');
   }

//Menampilkan data melalui ajax   
   public function listData(){
      require_once ROOT."/application/functions/function_action.php";
      $query = $this->customer->getCustomer();
      $list = $this->customer->getResult($query);
      $data = array();
      $no = 0;
      foreach($list as $li){
         $no ++;
         $row = array();
         $row[] = $no;
         $row[] = $li['nama_lengkap'];
         $row[] = $li['email'];
         $row[] = create_modify($li['id_customer']);
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
   public function update(){
      $data = array();
      $data['password'] = password_hash($_POST['password'],PASSWORD_BCRYPT); 
      $id = $_POST['id'];
      $simpan = $this->customer->update($data, array('id_customer'=>$id));
   }
}