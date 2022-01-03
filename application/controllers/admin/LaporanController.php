<?php
use \application\controllers\AdminMainController;
class LaporanController extends AdminMainController{
   function __construct(){
      parent::__construct();
      $this->model('transaksi');
      $this->model('jadwal');
      $this->model('paket');
      $this->model('tempat');
      $this->model('customer');
   }
   public function index(){
      $query = $this->tempat->showTempat();
      $queryb = $this->paket->showPaket();
      $queryc = $this->customer->showCustomer();
         $data['a'] = $this->tempat->getResult($query);
         $data['b'] = $this->paket->getResult($queryb);
         $data['c'] = $this->customer->getResult($queryc);
      $this->template('admin/laporan', 'Laporan');
   }
   
   public function listData($tanggal){
      require_once ROOT."/application/functions/function_action.php";
      require_once ROOT."/application/functions/function_date.php";
      require_once ROOT."/application/functions/function_rupiah.php";
      $query = $this->transaksi->laporan($tanggal);
      $list = $this->transaksi->getResult($query);
      $data = array();
      $no = 0;
      $total = 0;
      $jumlah = 0;
      foreach($list as $li){
         $subtotal = $li['harga'] * $li['jml_pemesan'];
         $subtotal_rupiah = format_rupiah($subtotal);
      $jumlah += $li['jml_pemesan'];
      $total += $subtotal;

         $no ++;
         $row = array();
         $row[] = $no;
         $row[] = $li['kode_booking'];
         $row[] = tgl_indonesia($li['tgl_pesan']); 
         $row[] = $li['kode_jadwal'];    
         $row[] = $li['jml_kursi']." Kursi"; 
         $row[] = "Rp. ".$subtotal_rupiah.",-";
         $data[] = $row;
      }
     //Menampilkan total harga dan jumlah tiket    
      $total_rupiah = format_rupiah($total);
      $no++;
        $data[] = array("","","","","<b>Total Harga</b>","<b>Rp. $total_rupiah,-</b>");
      $no++;
        $data[] = array("","","","","<b>Total Pemesan</b>","<b>$jumlah</b>");

      $output = array('data' => $data);
      echo json_encode($output);
   }
}