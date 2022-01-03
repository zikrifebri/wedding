<?php
create_title("Data Customer");

//Membuat tabel
start_content();
   create_table(array("Nama Customer" ."<br/>". "Nomor KTP", "Email" ."<br/>". "Password", "Aksi"));
end_content();

//Membuat modal form
start_modal('modal-form', 'return saveData()');
   form_input("Nama Customer", "namalengkap", "text", 5, "", "readonly");
   form_input("Nomor KTP", "noktp", "number", 5, "", "readonly");
   form_input("E-mail", "email", "text", 5, "", "readonly");
   form_input("Password", "password", "text", 5, "", "readonly");
end_modal();
?>

<script type="text/javascript">
var table, save_method;
$(function(){
//Menampilkan data ke tabel dengan AJAX
   table = $('.table').DataTable({
      "processing" : true,
      "ajax" : {
         "url" : "<?= BASE_PATH ?>/admin/customer/listData",
         "type" : "POST"
      }
   }); 
});

//Menampilkan form edit data
function editForm(id){
   save_method = "edit";
   $('#modal-form form')[0].reset();
   $.ajax({
      url : "<?= BASE_PATH ?>/admin/customer/edit/"+id,
      type : "GET",
      dataType : "JSON",
      success : function(data){
         $('#modal-form').modal('show');
         $('.modal-title').text('Edit Customer');
         
         $('#id').val(data.id_customer);
         $('#namalengkap').val(data.nama_lengkap);
         $('#noktp').val(data.no_ktp);
         $('#email').val(data.email);
         $('#password').val(data.password);
      },
      error : function(){
         alert("Tidak dapat menampilkan data!");
      }
   });
}
//Menyimpan data dengan AJAX
function saveData(){
   url = "<?= BASE_PATH ?>/admin/customer/update";
   
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

//Menghapus data dengan AJAX
function deleteData(id){
   if(confirm("Apakah yakin data akan dihapus?")){
      $.ajax({
         url : "<?= BASE_PATH ?>/admin/customer/delete/"+id,
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