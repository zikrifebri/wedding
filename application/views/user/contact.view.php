<?php
   create_title("Contact Us");   
?>
<form id="form-contact" class="form form-horizontal" method="post">  
<?php
start_content();
   form_input("Subjek", "subjek", "text", 5, "", "required");
   form_textarea("Pesan", "pesan", "","required");
   echo '<div class="col-sm-offset-2"> ';
   create_button("Kirim Pesan", "primary", "", "send");
   echo '</div>';
end_content();
?>
</form>

<script type="text/javascript">
$(function(){
   $('#form-contact').submit(function(){
      $.ajax({
         url : "<?= BASE_PATH ?>/user/contact/insert",
         type : "POST",
         data : $('#form-contact').serialize(),
         success : function(data){
            if(data == 'success') alert('Perubahan telah disimpan');
            else alert('Pesan telah dikirim');
         },
         error : function(){
           alert("Tidak dapat menyimpan data!");
         }   
      });
      return false;
   });
});
</script>