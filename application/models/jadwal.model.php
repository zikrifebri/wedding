<?php
class JadwalModel extends Model{
   public function __construct(){
      $this->connect();
      $this->_table = "jadwal";  
   }

   public	function getNum(){
		$query = "SELECT count(*) from jadwal";			
    	$jml_jadwal=$this->getRows($query);		
		return $jml_jadwal;
	}
	
	public function showJadwal(){
	$queryx = "SELECT * from tempat a, paket f, jadwal b where a.id_tempat=b.id_tempat  and f.id_paket=b.id_paket ORDER BY kode_jadwal asc";

		$query=$this->query($queryx);	        	
		$data = $this->getResult($query);	
		return $data;
	}

	public function pemesanan($lokasi){
		$lokasi = explode("_", $lokasi);
      	$queryx = "SELECT *	FROM paket b, tempat c, jadwal e where 
      	b.id_paket=e.id_paket and c.id_tempat=e.id_tempat and  
      	e.id_jadwal=e.id_jadwal ORDER BY kode_jadwal asc";

      	$query=$this->query($queryx);	        	
		$data = $this->getResult($query);	
		return $data;
	}

}