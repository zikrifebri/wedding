<?php
 require_once ROOT."/application/functions/function_rupiah.php";
create_title("Pemesanan Tempat");
   
start_content();
 $list = array();
    foreach($data['a'] as $d){
      $key = $d['id_tempat'];
      $list[$key] = $d['nama_tempat'];
   }  
   foreach($data['b'] as $d){
      $keyb = $d['id_paket'];
      $listb[$keyb] = $d['nama_paket'] ." - Rp. ". (format_rupiah($d['harga'] ));
   } 

?>
<!-- 

<form id="form-pemesanan" class="form form-horizontal" method="post" >
   <div class="form-group">
      <label class="control-label col-md-1">Tempat</label>
      <div class="col-md-3">      
      <?php
      echo'<select class="form-control " name="nama_tempat" id="nama_tempat" >
           <option value="">- Pilih -</option>';
           foreach($list as $key => $val){
           echo '<option value='.$key.'>'.$val.'</option>';
           }
           echo '</select>';
      ?>

      </div>
      <div class="col-md-3">
<?php  
   create_button("Tampilkan", "primary", "", "play-circle"); 
?>
      </div>
   </div>
</form> -->


<?php
   create_table(array("Kode - Nama Tempat","Tanggal & Jam Pesan","Nama Paket & Harga","Tempat Tersedia","Aksi"));
end_content();

//Membuat modal form
start_modal('modal-form', 'return saveData()');
   form_input("Kode Jadwal", "kode_jadwal", "text", 4, "", "readonly");
   form_combobox('Nama Tempat', 'tempat', $list, 4,"","disabled");
   form_combobox('Nama Paket', 'paket', $listb, 4,"","disabled");
   form_input("Tanggal Pesan", "tgl_pesan", "text", 4, "", "readonly");
   form_input("Waktu Pesan", "jam_pesan", "text", 4, "", "readonly");
   form_input("Jumlah Pesanan", "jmlpemesan", "text", 4, "");
end_modal();
?>

<script type="text/javascript">
var table, nama_tempat, save_method;
$(function(){
   //Menerapkan plugin datepicker
   $('.datepicker').datepicker({
      format: 'yyyy-mm-dd', 
      autoclose: true
   }); 

   //Menerapkan plugin dataTable dengan tambahan tombol ekspor
      table = $('.table').DataTable({
        "dom" : 'Brt',
        "bSort" : false,
        "buttons" : [
            {
               extend: 'pdf', 
               text: 'Export PDF', 
               className: 'pdf btn btn-primary'
            },
            {
               extend: 'excel', 
               text: 'Export Excel',
               className: 'excel btn btn-success'
            },
            {
               extend: 'print', 
               text: 'Print',
               className: 'print btn btn-info'
            }
         ],
        "processing" : true,
        "ajax" : {
          "url" : "<?= BASE_PATH ?>/user/pemesanan/listData/"+nama_tempat,
          "type" : "POST"
        }
      });
    
  //Me-refresh tabel ketika tombol Tampilkan diklik
   $('#form-pemesanan').submit(function(){
      nama_tempat = $('#nama_tempat').val();
      document.title = "Jadwal Pemesanan";
      table.ajax.url("<?= BASE_PATH ?>/user/pemesanan/listData/"+nama_tempat);
      table.buttons();
      table.ajax.reload();
      return false;
    });
   
   //Membuat tombol menjadi grup tombol
   table.buttons().container()
        .appendTo( '#example_wrapper .col-sm-6:eq(0)' );
    
  //Menambahkan ikon pada tombol
    $('.pdf').prepend('<i class="glyphicon glyphicon-file"></i> ');
    $('.excel').prepend('<i class="glyphicon glyphicon-list-alt"></i> ');
    $('.print').prepend('<i class="glyphicon glyphicon-print"></i> ');
    
});

//Menampilkan form edit data
function editForm(id){
   save_method = "add";
   $('#modal-form form')[0].reset();
   $.ajax({
      url : "<?= BASE_PATH ?>/user/pemesanan/edit/"+id,
      type : "GET",
      dataType : "JSON",
      success : function(data){
         $('#modal-form').modal('show');
         $('.modal-title').text('Pemesanan');
         
         $('#id').val(data.id_jadwal);
         $('#kode_jadwal').val(data.kode_jadwal);
         $('#tempat').val(data.id_tempat);
         $('#paket').val(data.id_paket);
         $('#tgl_pesan').val(data.tgl_pesan);
         $('#jam_pesan').val(data.jam_pesan);
         $('#nama_tempat').val(data.nama_tempat);
      },
      error : function(){
         alert("Tidak dapat menampilkan data!");
      }
   });
}

//Menyimpan data dengan AJAX
function saveData(){
  if(save_method == "add") url = "<?= BASE_PATH ?>/user/pemesanan/insert";
   $.ajax({
      url : url,
      type : "POST",
      data : $('#modal-form form').serialize(),
      success : function(data){
         $('#modal-form').modal('hide');
         table.ajax.reload();
         alert("Terimakasih telah memesan tiket perjalanan");
          alert("Silahkan melakukan pembayaran pada menu History");
      },
        error : function(){
        alert("Tidak dapat menyimpan data!");
      }   
   });
   return false;
}
</script>