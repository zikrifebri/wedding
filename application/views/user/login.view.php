<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login</title>
    <?php
    require_once ROOT."/application/functions/function_html.php";
    load_css('bootstrap/css/bootstrap.min.css');
    load_css('css/venus.css');
    load_script('jquery/jquery-2.0.2.min.js');
    load_css('bootstrap-datepicker/css/bootstrap-datepicker3.min.css');
    ?>

</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
<?php
if(isset($msg)){
   echo "<div class='alert alert-danger'>$msg</div>";
}
?>
                        <form role="form" action="<?= BASE_PATH ?>/user/login/check" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                             <button class="btn btn-info pull-right">Login</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
<center>
<a href=" /wedding "><button class="btn btn-secondary">Beranda</button></a>
<?php                   
create_button("Belum Terdaftar? Klik disini", "success", "addForm()", "");
?></center>
            </div>
        </div>
    </div>

</body>
</html>


<?php
//Membuat modal form
start_modal('modal-form', 'return saveData()');
 form_input("Nama Lengkap", "nama_lengkap", "text", 6, "", "required");
 form_input("Nomor KTP", "no_ktp", "number", 6, "", "required");
 form_input("Tempat Lahir", "tempat_lahir", "text", 6, "", "required");
 form_date("Tanggal Lahir", "tgl_lahir", "text", 6, "", "required");
 form_input("Akun Bank", "nama_bank", "text", 6, "", "required");
 form_input("No Rekening", "no_rek", "text", 6, "", "required");
 form_textarea("Alamat", "alamat", "text", 6, "", "required");
 form_input("No Telp", "no_telp", "number", 6, "", "required");
 form_input("Pekerjaan", "pekerjaan", "text", 6, "", "required");
 form_input("E-mail", "email", "email", 6, "", "required");
 form_input("Password", "password", "password", 6, "", "required");
end_modal();
?>

<script type="text/javascript">
//Menampilkan form modal pendaftaran
function addForm(){
   save_method = "add";
   $('#modal-form').modal('show');
   $('#modal-form form')[0].reset();                
   $('.modal-title').text('Registrasi');
}

//Menyimpan data dengan AJAX
function saveData(){
  url = "<?= BASE_PATH ?>/user/customer/insert";
   $.ajax({
      url : url,
      type : "POST",
      data : $('#modal-form form').serialize(),
      success : function(data){
         $('#modal-form').modal('hide');
         alert("Anda berhasil registrasi, Silahkan login");
         table.ajax.reload();
      },
        error : function(){
        alert("Tidak dapat menyimpan data!");
      }   
   });
   return false;
}
</script>

<?php
   load_script('js/venus.js');
   load_script('js/jquery.min.js');
   load_script('bootstrap/js/bootstrap.min.js');
   load_script('bootstrap-datepicker/js/bootstrap-datepicker.min.js');
   load_script('js/datepicker.js');