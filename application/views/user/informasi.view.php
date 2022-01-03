<?php
create_title("Data Informasi");
   
start_content();
   create_table(array("Judul", "Lihat"));
end_content();

start_modal('modal-form', 'return saveData()');
   form_input("Judul", "judul", "", 8, "", "");
   form_textarea("Informasi", "konten", "richtext");
end_modalx();
?>

<script type="text/javascript">
var table, save_method;
$(function(){
   table = $('.table').DataTable({
      "processing" : true,
      "ajax" : {
         "url" : "<?= BASE_PATH ?>/user/informasi/listData",
         "type" : "POST"
      }
   }); 
});

function editForm(id){
   $('#modal-form form')[0].reset();
   $.ajax({
      url : "<?= BASE_PATH ?>/user/informasi/edit/"+id,
      type : "GET",
      dataType : "JSON",
      success : function(data){
         $('#modal-form').modal('show');
         $('.modal-title').text('Lihat Informasi');
         
         $('#id').val(data.id_informasi);
         $('#judul').val(data.judul);        
         tinymce.get('konten').setContent(data.konten);
      },
      error : function(){
         alert("Tidak dapat menampilkan data!");
      }
   });
}

</script>