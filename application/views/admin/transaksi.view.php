<?php
require_once ROOT."/application/functions/function_rupiah.php";
create_title("Data Transaksi");

//Membuat tabel   
start_content();
   create_table(array("Nama Tempat", "Tanggal & Jam Pesan", "Nama Paket & Harga", "Jumlah Kursi", "Status", "Aksi"));
end_content();

start_modal('modal-form', 'return saveData()');
   echo "<input type='hidden' name='ket' id='ket'>";
   form_input("Nama Pemesan", "namalengkap", "text", 5, "", "readonly");
   form_input("Email", "email", "text", 5, "", "readonly");
   form_input("Telpon", "notelp", "text", 5, "", "readonly");
   form_input("Akun Bank", "namabank", "text", 5, "", "readonly");
   form_input("Nomor Rekening", "norek", "text", 5, "", "readonly");
   
   echo "<h4 class='page-header'><b> Detail Transaksi </b></h4>";
   form_input("Kode Pemesanan", "kodepemesanan", "text", 5, "", "readonly");
   form_input("Tanggal Transaksi", "tgltransaksi", "text", 5, "", "readonly");
   form_input("Jam Transaksi", "jamtransaksi", "text", 5, "", "readonly");
   form_input("Jumlah Pemesanan", "jmlpemesan", "text", 5, "", "readonly");

   $list = array('Lunas'=>'Lunas', 'Batal'=>'Batal');
   form_combobox('Status', 'status', $list, 3, '', 'required');
end_modal();
?>

<script type="text/javascript">
var table, save_method;
$(function(){
//Menampilkan data ke tabel dengan AJAX
   table = $('.table').DataTable({
      "processing" : true,
      "ajax" : {
         "url" : "<?= BASE_PATH ?>/admin/transaksi/listData",
         "type" : "POST"
      }
   }); 
});

function editForm(id){
   save_method = "edit";
   $('#modal-form form')[0].reset();
   $.ajax({
      url : "<?= BASE_PATH ?>/admin/transaksi/edit/"+id,
      type : "GET",
      dataType : "JSON",
      success : function(data){
         $('#modal-form').modal('show');
         $('.modal-title').text('Edit Status Transaksi');
         
         $('#id').val(data.id_transaksi);
         $('#namalengkap').val(data.nama_lengkap);
         $('#email').val(data.email);
         $('#notelp').val(data.no_telp);
         $('#namabank').val(data.nama_bank);
         $('#norek').val(data.no_rek);

         $('#kodepemesanan').val(data.kode_pemesanan);
         $('#tgltransaksi').val(data.tanggal);
         $('#jamtransaksi').val(data.jam);
         $('#jmlpemesan').val(data.jml_pemesan);
         $('#status').val(data.status);
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

function deleteData(id){
   if(confirm("Apakah yakin data akan dihapus?")){
      $.ajax({
         url : "<?= BASE_PATH ?>/admin/transaksi/delete/"+id,
         type : "GET",
         success : function(data){
            table.ajax.reload();
         },
         error : function(){
           alert("Tidak dapat menghapus data!");
         }
      });
   }
}

</script>