<?php
use application\controllers\UserMainController;
class PemesananController extends UserMainController{
    function __construct(){
      parent::__construct();
      $this->model('jadwal');
      $this->model('paket');
      $this->model('tempat');
       $this->model('transaksi');
   }
   public function index(){
      $query = $this->tempat->showTempat();
      $queryb = $this->paket->showPaket();
         $data['a'] = $this->tempat->getResult($query);
         $data['b'] = $this->paket->getResult($queryb);
      $this->template('user/pemesanan', 'Pemesanan', $data);
   }
   
   public function listData($lokasi){
      require_once ROOT."/application/functions/function_action.php";
      require_once ROOT."/application/functions/function_date.php";
      require_once ROOT."/application/functions/function_rupiah.php";
      $query = $this->jadwal->pemesanan($lokasi);
      $list = $this->jadwal->getResult($query);
      $data = array();
      $no = 0;
      foreach($list as $li){
         $no ++;
         $row = array();
         $row[] = $no;
         $row[] = $li['kode_jadwal']." - ". ($li['nama_tempat']);
         $row[] = $li['tgl_pesan']." - ". ($li['jam_pesan']);
         $row[] = $li['nama_paket']." - Rp. ". (format_rupiah($li['harga'] ));
         $row[] = $li['available']." Tempat ";
// fungsi if, jika available seat = 0, jalankan fungsi empty
      $tersedia = $li['available'];
      if ($tersedia != '0' ):
         $row[] = create_modify($li['id_jadwal']);
      else :
         $row[] = empty_var();
      endif ;
         $data[] = $row;
      }
// end fungsi

      $output = array('data' => $data);
      echo json_encode($output);
   }

   //Menampilkan data untuk ditampilkan pada form edit   
   public function edit($id){
      $query = $this->jadwal->selectWhere(array('id_jadwal'=>$id));
      $data = $this->jadwal->getResult($query);
      echo json_encode($data[0]);
   }

//Menyimpan data ke database
   public function insert(){
   $customer = $_SESSION['id_customer'];
   $id_jadwal = $_POST['id'];
   $tanggal = date('Ymd');
   $jam = date('His');
   $kode = ($customer)."-".($tanggal)."-".($id_jadwal)."-".($jam);
      $data = array();
      $data['id_customer'] = $_SESSION['id_customer'];
      $data['id_jadwal'] = $_POST['id'];
      $data['jml_pemesan'] = $_POST['jmlpemesan'];
      $data['tanggal'] = date('Y-m-d');
      $data['jam'] = date('h:i:s');
      $data['kode_pemesanan'] = $kode;
      $data['status'] = "Pending";
      $simpan = $this->transaksi->insert($data);
   }
}