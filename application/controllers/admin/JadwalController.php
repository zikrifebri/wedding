<?php
use \application\controllers\AdminMainController;
class JadwalController extends AdminMainController{
   function __construct(){
      parent::__construct();
      $this->model('jadwal');
      $this->model('paket');
      $this->model('tempat');
   }

//Menampilkan data pesawat   
   public function index(){
	   $query = $this->tempat->showTempat();
      $queryb = $this->paket->showPaket();
	      $data['a'] = $this->tempat->getResult($query);
         $data['b'] = $this->paket->getResult($queryb);
      $this->template('admin/jadwal', 'Jadwal', $data);
   }

//Menampilkan data melalui ajax      
   public function listData(){
      require_once ROOT."/application/functions/function_action.php";
      require_once ROOT."/application/functions/function_date.php";
      require_once ROOT."/application/functions/function_rupiah.php";
     $query = $this->jadwal->showJadwal("nama_tempat", "ASC");
	  $list = $this->jadwal->getResult($query);
      $data = array();
      $no = 0;
      foreach($list as $li){
         $no ++;
         $row = array();
         $row[] = $no;
         $row[] = $li['nama_tempat']." - ".$li['kode_jadwal'];
         $row[] = $li['nama_paket']." - Rp. ". (format_rupiah($li['harga'] ));
         $row[] = (tgl_indonesia($li['tgl_pesan'] )) ." -- Pukul ".$li['jam_pesan']." WIB";
         $row[] = create_action($li['id_jadwal']);
         $data[] = $row;
      }
      
      $output = array("data" => $data);
      echo json_encode($output);
   }

//Mengambil data jadwal untuk ditampilkan pada form edit    
   public function edit($id){
      require_once ROOT."/application/functions/function_rupiah.php";
      $query = $this->jadwal->selectWhere(array('id_jadwal'=>$id));
      $data = $this->jadwal->getResult($query);
      echo json_encode($data[0]);
   }
   
//Menyimpan data ke database
   public function insert(){
      $data = array();
      $data['kode_jadwal']    = $_POST['kodejadwal'];
      $data['id_tempat']      = $_POST['idtempat'];
      $data['id_paket']       = $_POST['idpaket'];
      $data['tgl_pesan']      = $_POST['tgl_pesan'];
      $data['jam_pesan']      = $_POST['jam_pesan'];
      $data['available']      = $_POST['available'];
      $data['catatan']        = addslashes($_POST['catatan']);
         
      $simpan = $this->jadwal->insert($data);
      if($simpan) echo "success";
   }

//Memperbaharui data pada database   
   public function update(){
      $data = array();
      $data['kode_jadwal']    = $_POST['kodejadwal'];
      $data['id_tempat']      = $_POST['idtempat'];
      $data['id_paket']       = $_POST['idpaket'];
      $data['tgl_pesan']      = $_POST['tgl_pesan'];
      $data['jam_pesan']      = $_POST['jam_pesan'];
      $data['available']      = $_POST['available'];
      $data['catatan']        = addslashes($_POST['catatan']);
         
      $id = $_POST['id'];
      $simpan = $this->jadwal->update($data, array('id_jadwal'=>$id));
      if($simpan) echo "success"; 
   }
   
//Menghapus data pada database   
   public function delete($id){
      $hapus = $this->jadwal->delete(array('id_jadwal'=>$id));
   }
}