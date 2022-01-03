<?php
use application\controllers\UserMainController;
class InformasiController extends UserMainController{
   function __construct(){
      parent::__construct();
      $this->model('informasi');
   }
   public function index(){
      $this->template('user/informasi', 'Informasi');
   }
   
   public function listData(){
      require_once ROOT."/application/functions/function_action.php";
      $query = $this->informasi->selectAll("id_informasi", "DESC");
      $list = $this->informasi->getResult($query);
      $data = array();
      $no = 0;
      foreach($list as $li){
         $no ++;
         $row = array();
         $row[] = $no;
         $row[] = $li['judul'];
         $row[] = create_modify($li['id_informasi']);
         $data[] = $row;
      }
      
      $output = array("data" => $data);
      echo json_encode($output);
   }
   
   public function edit($id){
      $query = $this->informasi->selectWhere(array('id_informasi'=>$id));
      $data = $this->informasi->getResult($query);
      echo json_encode($data[0]);
   }
   
}