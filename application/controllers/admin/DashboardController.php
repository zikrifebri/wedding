<?php
use \application\controllers\AdminMainController;
class DashboardController extends AdminMainController{
	function __construct(){
	}

   public function index(){ 

   $this->model('transaksi');
   $data['jml_transaksi'] = $this->transaksi->getNum();  

   $this->model('jadwal');
   $data['jml_jadwal'] = $this->jadwal->getNum(); 

   $this->model('customer');
   $data['jml_cust'] = $this->customer->getNum(); 

   $this->model('pesan');
   $data['jml_pesan'] = $this->pesan->getNum(); 

   $this->template('admin/dashboard', 'Dashboard',$data);
    
   }
}