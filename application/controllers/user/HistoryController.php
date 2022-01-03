<?php
use \application\controllers\UserMainController;
class HistoryController extends UserMainController{
   function __construct(){
      parent::__construct();
      $this->model('transaksi');
      $this->model('jadwal');
      $this->model('paket');
      $this->model('tempat');
      $this->model('customer');
      $this->model('pengaturan');
   }

//Menampilkan halaman produk   
   public function index(){
      $query = $this->tempat->showTempat();
      $queryb = $this->paket->showPaket();
      $queryc = $this->customer->showCustomer();
      $queryd = $this->pengaturan->showPengaturan();
         $data['a'] = $this->tempat->getResult($query);
         $data['b'] = $this->paket->getResult($queryb);
         $data['c'] = $this->customer->getResult($queryc);
         $data['d'] = $this->pengaturan->getResult($queryd);
      $this->template('user/history', 'Transaksi');
   }

//Menampilkan data melalui ajax      
   public function listData(){
      require_once ROOT."/application/functions/function_action.php";
      require_once ROOT."/application/functions/function_date.php";
      require_once ROOT."/application/functions/function_rupiah.php";
      $query = $this->transaksi->showHistory();
      $list = $this->transaksi->getResult($query);
      $data = array();
      $no = 0;
      foreach($list as $li){
         $no ++;
         $row = array();
         $row[] = $no;
         $row[] = $li['nama_tempat'];
         $row[] = $li['tgl_pesan']." - ". ($li['jam_pesan']);
         $row[] = $li['nama_paket']." - Rp. ". (format_rupiah($li['harga'] ));
         $row[] = $li['jml_kursi'];
         $row[] = $li['status'];
         $row[] = create_modify($li['id_transaksi']);
         $data[] = $row;
      }
      
      $output = array('data' => $data);
      echo json_encode($output);
   }

   public function edit($id){
      $query = $this->transaksi->selectJoin(
      array('customer'), "LEFT JOIN", 
      array('transaksi.id_customer'=>'customer.id_customer'), 
      array('transaksi.id_transaksi'=>$id));
      $data = $this->transaksi->getResult($query);
      echo json_encode($data[0]);
   }

   public function update(){
      $data = array();
      $data['status'] = $_POST['status'];   
      $id = $_POST['id'];
      $simpan = $this->transaksi->update($data, array('id_transaksi'=>$id));
   }

   public function delete($id){
      $this->transaksi->delete(array('id_transaksi'=>$id));     
   }

}