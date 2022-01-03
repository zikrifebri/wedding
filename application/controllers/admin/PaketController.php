<?php
use \application\controllers\AdminMainController;
class PaketController extends AdminMainController{
   function __construct(){
      parent::__construct();
      $this->model('paket');
   }

//Menampilkan halaman   
   public function index(){
      $this->template('admin/paket', 'Paket');
   }

//Menampilkan data melalui ajax   
   public function listData(){
      require_once ROOT."/application/functions/function_rupiah.php";
      require_once ROOT."/application/functions/function_action.php";
      $query = $this->paket->selectAll("nama_paket", "ASC");
      $list = $this->paket->getResult($query);
      $data = array();
      $no = 0;
      foreach($list as $li){
         $no ++;
         $row = array();
         $row[] = $no;
         $row[] = $li['nama_paket'];
         $row[] = "Rp. ".format_rupiah($li['harga']).",-";
         $row[] = create_action($li['id_paket']);
         $data[] = $row;
      }
      
      $output = array("data" => $data);
      echo json_encode($output);
   }

//Menampilkan data untuk ditampilkan pada form edit   
   public function edit($id){
      $query = $this->paket->selectWhere(array('id_paket'=>$id));
      $data = $this->paket->getResult($query);
      echo json_encode($data[0]);
   }

//Menyimpan data ke database
   public function insert(){
      $data = array();
      $data['nama_paket'] = $_POST['namapaket'];
      $data['harga'] = $_POST['harga'];
      $simpan = $this->paket->insert($data);
   }

//Memperbaharui data pada database
   public function update(){
      $data = array();
      $data['nama_paket'] = $_POST['namapaket'];
      $data['harga'] = $_POST['harga'];   
      $id = $_POST['id'];
      $simpan = $this->paket->update($data, array('id_paket'=>$id));
   }

//Menghapus data pada database
   public function delete($id){
      $hapus = $this->paket->delete(array('id_paket'=>$id));
   }
}