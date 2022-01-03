<?php
use \application\controllers\AdminMainController;
class TempatController extends AdminMainController{
   function __construct(){
      $this->model('tempat');
   }

   public function index(){
      $this->template('admin/tempat', 'Tempat');
   }
	
   public function listData(){
      require_once ROOT."/application/functions/function_action.php";
      $query = $this->tempat->selectAll("nama_tempat", "ASC");
      $list = $this->tempat->getResult($query);
      $data = array();
      $no = 0;
      foreach($list as $li){
         $no ++;
         $row = array();
         $row[] = $no;
		 $row[] = $li['nama_tempat'];
		 $row[] = $li['jml_kursi'];
         $row[] = "<a class='btn btn-primary' onclick='editForm(".$li['id_tempat'].")'>Edit</a> 
                   <a class='btn btn-danger' onclick='deleteData(".$li['id_tempat'].")'>Hapus</a>";
         $data[] = $row;
      }
		
      $output = array("data" => $data);
      echo json_encode($output);
   }
 

   public function edit($id){
	$query = $this->tempat->selectWhere(array('id_tempat'=>$id));
	$data = $this->tempat->getResult($query);
	echo json_encode($data[0]);
 }

 public function insert(){
	$data = array();
	$data['nama_tempat'] = $_POST['namatempat'];
	$data['jml_kursi'] = $_POST['jumlahkursi'];
			 
	$simpan = $this->tempat->insert($data);
 }

 public function update(){
	$data = array();
	$data['nama_tempat'] = $_POST['namatempat'];
	$data['jml_kursi'] = $_POST['jumlahkursi'];
			 
	$id = $_POST['id'];
	$simpan = $this->tempat->update($data, array('id_tempat'=>$id));
 }

 public function delete($id){
	$hapus = $this->tempat->delete(array('id_tempat'=>$id));
 }

}