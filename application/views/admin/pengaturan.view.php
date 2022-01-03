<?php
   create_title("Pengaturan");   
?>

<form id="form-pengaturan" class="form form-horizontal" method="post">   
<?php
$data = $data[0];
start_content();
   form_input("Judul Website", "judul", "text", 5, "", "value='$data[judul_website]'");
   form_mediapicker("Favicon", "favicon");
   form_input("Email", "email", "text", 5, "", "value='$data[email_admin]'");
   form_input("Alamat", "alamat", "text", 5, "", "value='$data[alamat]'");
   form_input("Telpon", "telp", "text", 5, "", "value='$data[telp]'");
   form_input("SMS", "sms", "text", 5, "", "value='$data[sms]'");
   form_input("Bank", "bank", "text", 5, "", "value='$data[bank]'");
   form_input("Pemilik Rekening", "pemilik", "text", 5, "", "value='$data[pemilik_rekening]'");
   form_input("No. Rekening", "rekening", "text", 5, "", "value='$data[rekening]'");
   form_input("Facebook", "facebook", "text", 5, "", "value='$data[facebook]'");
   echo '<div class="col-sm-offset-2"> ';
   create_button("Simpan Perubahan", "primary", "", "floppy-disk");
   echo '</div>';
end_content();
?>
</form>

<script type="text/javascript">
$(function(){
   $('#favicon').val('<?= $data['favicon'] ?>');
   $('#img-favicon').html('<br><img src="<?= BASE_PATH ?>/public/images/thumbs/<?= $data['favicon'] ?>" width="150">');
   $('#form-pengaturan').submit(function(){
      $.ajax({
         url : "<?= BASE_PATH ?>/admin/pengaturan/update",
         type : "POST",
         data : $('#form-pengaturan').serialize(),
         success : function(data){
            if(data == 'success') alert('Perubahan telah disimpan');
            else alert(data);
         },
         error : function(){
           alert("Tidak dapat menyimpan data!");
         }   
      });
      return false;
   });
});
</script>