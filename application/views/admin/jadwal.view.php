<?php
 require_once ROOT."/application/functions/function_rupiah.php";
create_title("Data Jadwal");

//Membuat tabel   
start_content();
   create_button("Tambah", "success", "addForm()", "plus-sign");
   create_table(array("Nama Tempat", "Paket & Harga", "Tanggal & Jam Pemesanan", "Aksi"));
end_content();

//Membuat modal form
start_modal('modal-form', 'return saveData()');
   
   $list = array();
    foreach($data['a'] as $d){
      $key = $d['id_tempat'];
      $list[$key] = $d['nama_tempat'];
   }  

   foreach($data['b'] as $d){
      $keyb = $d['id_paket'];
      $listb[$keyb] = $d['nama_paket'] ." - Rp. ". (format_rupiah($d['harga'] ));

   } 

   form_input("Kode Jadwal", "kodejadwal", "text", 4, "", "required");
   form_combobox('Nama Tempat', 'idtempat', $list, 4);
   form_combobox('Paket & Harga', 'idpaket', $listb, 4);
   form_date("Tanggal Pemesanan", "tgl_pesan", "text", 4, "", "required");
   form_clock("Waktu Pemesanan", "jam_pesan", "text", 4, "", "required");
   form_input("Tempat Tersedia", "available", "text", 4, "", "required");
   form_textarea("Catatan", "catatan", "richtext");
end_modal();
?>

<script type="text/javascript">
var table, save_method;
$(function(){
//Menampilkan data ke tabel dengan AJAX
   table = $('.table').DataTable({
      "processing" : true,
      "ajax" : {
         "url" : "<?= BASE_PATH ?>/admin/jadwal/listData",
         "type" : "POST"
      }
   }); 
});

//Menampilkan form tambah data
function addForm(){
   save_method = "add";
   $('#modal-form').modal('show');
   $('#modal-form form')[0].reset();                
   $('.modal-title').text('Tambah Jadwal');
}

//Menampilkan form edit data
function editForm(id){
   save_method = "edit";
   $('#modal-form form')[0].reset();
   $.ajax({
      url : "<?= BASE_PATH ?>/admin/jadwal/edit/"+id,
      type : "GET",
      dataType : "JSON",
      success : function(data){
         $('#modal-form').modal('show');
         $('.modal-title').text('Edit Jadwal');
         
         $('#id').val(data.id_jadwal);
         $('#kodejadwal').val(data.kode_jadwal);
         $('#idtempat').val(data.id_tempat);
         $('#idpaket').val(data.id_paket);
         $('#tgl_pesan').val(data.tgl_pesan);
         $('#jam_pesan').val(data.jam_pesan);
         $('#available').val(data.available);
         tinymce.get('catatan').setContent(data.catatan);
      },
      error : function(){
         alert("Tidak dapat menampilkan data!");
      }
   });
}

//Menyimpan data dengan AJAX
function saveData(){
   if(save_method == "add") url = "<?= BASE_PATH ?>/admin/jadwal/insert";
   else url = "<?= BASE_PATH ?>/admin/jadwal/update";
   
   $.ajax({
      url : url,
      type : "POST",
      data : $('#modal-form form').serialize(),
      success : function(data){
         if(data=='success'){
            $('#modal-form').modal('hide');
            table.ajax.reload();
         }else{
            alert(data);
         }
      },
        error : function(){
        alert("Tidak dapat menyimpan data!");
      }   
   });
   return false;
}

//Menghapus data dengan AJAX
function deleteData(id){
   if(confirm("Apakah yakin data akan dihapus?")){
      $.ajax({
         url : "<?= BASE_PATH ?>/admin/jadwal/delete/"+id,
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