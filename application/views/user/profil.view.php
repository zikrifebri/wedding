<?php
create_title("Data Profil");

//Membuat tabel
start_content();
   create_table(array("Nama Lengkap", "Email","Aksi"));
end_content();

//Membuat modal form
start_modal('modal-form', 'return saveData()');
   form_input("Nama Lengkap", "namalengkap", "text", 5, "", "required");
   form_input("Tempat Lahir", "tgllahir", "text", 5, "", "required");
   form_input("Tanggal Lahir", "tempatlahir", "text", 5, "", "required");
   form_input("No Telp", "notelp", "text", 5, "", "required");
   form_input("Alamat", "alamat", "text", 5, "", "required");
   form_input("Pekerjaan", "pekerjaan", "text", 5, "", "required");
   form_input("Email", "email", "text", 5, "", "required");
   form_input("Password", "password", "password", 5, "", "required");
end_modal();
?>

<script type="text/javascript">
var table, save_method;
$(function(){
//Menampilkan data ke tabel dengan AJAX
   table = $('.table').DataTable({
      "processing" : true,
      "ajax" : {
         "url" : "<?= BASE_PATH ?>/user/profil/listData",
         "type" : "POST"
      }
   }); 
});

//Menampilkan form edit data
function editForm(id){
   save_method = "edit";
   $('#modal-form form')[0].reset();
   $.ajax({
      url : "<?= BASE_PATH ?>/user/profil/edit/"+id,
      type : "GET",
      dataType : "JSON",
      success : function(data){
         $('#modal-form').modal('show');
         $('.modal-title').text('Edit Data');
         
         $('#id').val(data.id_customer);
         $('#namalengkap').val(data.nama_lengkap);
         $('#tempatlahir').val(data.tempat_lahir);
         $('#tgllahir').val(data.tgl_lahir);
         $('#notelp').val(data.no_telp);
         $('#alamat').val(data.alamat);
         $('#pekerjaan').val(data.pekerjaan);
         $('#email').val(data.email);
         $('#password').val();
      },
      error : function(){
         alert("Tidak dapat menampilkan data!");
      }
   });
}
//Menyimpan data dengan AJAX
function saveData(){
   (save_method == "edit") url = "<?= BASE_PATH ?>/user/profil/update";   
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