<?php
use \application\controllers\AdminMainController;
class TransaksiController extends AdminMainController{
   function __construct(){
      parent::__construct();
      $this->model('transaksi');
      $this->model('jadwal');
      $this->model('paket');
      $this->model('tempat');
      $this->model('customer');
   }

//Menampilkan halaman produk   
   public function index(){
      $query = $this->tempat->showTempat();
      $queryb = $this->paket->showPaket();
      $queryc = $this->customer->showCustomer();
         $data['a'] = $this->tempat->getResult($query);
         $data['b'] = $this->paket->getResult($queryb);
         $data['c'] = $this->customer->getResult($queryc);
      $this->template('admin/transaksi', 'Transaksi');
   }

//Menampilkan data melalui ajax      
   public function listData(){
      require_once ROOT."/application/functions/function_action.php";
      require_once ROOT."/application/functions/function_date.php";
      require_once ROOT."/application/functions/function_rupiah.php";
      $query = $this->transaksi->showTransaksi();
      $list = $this->transaksi->getResult($query);
      $data = array();
      $no = 0;
      foreach($list as $li){
         $no ++;
         $row = array();
         $row[] = $no;
         $row[] = $li['kode_jadwal'].' - '.$li['nama_tempat'];
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

// edit
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

      //Update kursi tersedia ketika status diupdate menjadi Lunas
      if($data['status'] == 'Lunas' and $_POST['ket'] == ""){
      $query = $this->transaksi->selectJoin(
      array('jadwal'), "LEFT JOIN", 
      array('transaksi.id_jadwal'=>'jadwal.id_jadwal'), 
      array('transaksi.id_transaksi'=>$id));
         $datadetail = $this->transaksi->getResult($query);  
         foreach($datadetail as $detail){
            $dataupdate = array();
            $dataupdate['available'] = $detail['available'] - $detail['jml_pemesan'];
            $this->jadwal->update($dataupdate, array('id_jadwal'=>$detail['id_jadwal']));
         }
      }
      $simpan = $this->transaksi->update($data, array('id_transaksi'=>$id));
   }

   public function delete($id){
      $this->transaksi->delete(array('id_transaksi'=>$id));     
   }

}