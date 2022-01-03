<?php
require_once ROOT."/application/functions/function_date.php";
create_title("Data Transaksi");

//Membuat tabel   
start_content();
   create_table(array("Nama Tempat","Tanggal & Jam Pesan", "Nama Paket & Harga", "Jumlah Kursi", "Status", "Aksi"));
end_content();

start_modal('modal-form', 'return saveData()');

   echo "<input type='hidden' name='ket' id='ket'>";

   echo "<h4 class='panel-title'><b> TRANSFER KE </b></h4>";
   create_body("Nama Rekening =", "BCA - M Zikri Febrianza");
   create_body("No Rekening =", "8530263674");
   
   echo "<h4 class='page-header'><b> Detail Transaksi </b></h4>";
   form_input("Status Bayar", "status1", "text", 5, "", "disabled");
   form_input("Kode Pemesanan", "kodepemesanan", "text", 5, "", "readonly");
   form_input("Tanggal Transaksi", "tgltransaksi", "text", 5, "", "readonly");
   form_input("Jam Transaksi", "jamtransaksi", "text", 5, "", "readonly");
   form_input("Jumlah Pemesan", "jmlpemesan", "text", 5, "", "readonly");

   $list = array('Sudah_Bayar'=>'Sudah_Bayar');
   form_combobox('Konfirm Pembayaran', 'status', $list, 5, '', 'required');
end_modal();
?>

<script type="text/javascript">
var table, save_method;
$(function(){
//Menampilkan data ke tabel dengan AJAX
   table = $('.table').DataTable({
      "processing" : true,
      "ajax" : {
         "url" : "<?= BASE_PATH ?>/user/history/listData",
         "type" : "POST"
      }
   }); 
});

function editForm(id){
   save_method = "edit";
   $('#modal-form form')[0].reset();
   $.ajax({
      url : "<?= BASE_PATH ?>/user/history/edit/"+id,
      type : "GET",
      dataType : "JSON",
      success : function(data){
         $('#modal-form').modal('show');
         $('.modal-title').text('Edit Status Transaksi');
         
         $('#id').val(data.id_transaksi);
         $('#namalengkap').val(data.nama_lengkap);
         $('#email').val(data.email);
         $('#pemilik').val(data.pemilik_rekening);
         $('#notelp').val(data.no_telp);
         $('#status').val(data.status);
         $('#status1').val(data.status);
         $('#kodepemesanan').val(data.kode_pemesanan);
         $('#tgltransaksi').val(data.tanggal);
         $('#jamtransaksi').val(data.jam);
         $('#jmlpemesan').val(data.jml_pemesan);

      },
      error : function(){
         alert("Tidak dapat menampilkan data!");
      }
   });
}

function saveData(){
   url = "<?= BASE_PATH ?>/admin/transaksi/update";
   $.ajax({
      url : url,
      type : "POST",
      data : $('#modal-form form').serialize(),
      success : function(data){
         $('#modal-form').modal('hide');
         table.ajax.reload();
      },
        error : function(){
        alert("Tidak dapat menyimpan data!");
      }   
   });
   return false;
}

</script>