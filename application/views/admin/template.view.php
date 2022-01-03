<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pemesanan Wedding Organizer</title>
    <?php
   //Memanggil function_html.php, file CSS dan library jQuery
   require_once ROOT."/application/functions/function_html.php";
   load_css('bootstrap/css/bootstrap.min.css');
   load_css('bootstrap-datepicker/css/bootstrap-datepicker3.min.css');
   load_css('dataTables/css/dataTables.bootstrap.min.css');
   load_css('metis-menu/dist/metisMenu.min.css');
   load_css('css/venus.css');
   load_css('font-awesome/css/font-awesome.min.css');
   load_css('clockpicker/dist/bootstrap-clockpicker.min.css');
   load_script('jquery/jquery.min.js');
   load_script('jquery/jquery-2.0.2.min.js');
?>  
</head>
<body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Pemesanan Wedding Organizer</a>
            </div>

<ul class="nav navbar-top-links navbar-right">
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-cog fa-spin fa-1x fa-fw"></i>Profil <i class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu dropdown-messages">
<?php
//Membuat menu user navbar
   create_menu("admin/profil", "user", "User Profil");
   create_menu("admin/pengaturan", "gear", "Settings");
   line();
   create_menu("admin/logout", "sign-out", "Logout");
?>
        </ul>
    </li>
</ul>

<!-- /.main menu -->
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                    <button class="btn btn-default" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
                </div>
            </li>
<?php
//Membuat menu pada sidebar
   create_menu("admin", "home", "Dashboard");
   menu_drop("sort-desc","Entry List"); 
     menu_drop_child("admin/tempat", "university", "Tempat");
     menu_drop_child("admin/paket", "tags", "Paket");
    close_menu();
   create_menu("admin/jadwal", "file", "Jadwal");
   create_menu("admin/transaksi", "ticket", "Transaksi");
   menu_drop("info","Info & Pesan");
   menu_drop_child("admin/informasi","info", "Informasi");
   menu_drop_child("admin/pesan","envelope", "Pesan");
    close_menu();
   create_menu("admin/laporan","bar-chart", "Laporan");
?>
        </ul>
    </div>
</div>
<!-- /.end menu -->
        </nav>
<!-- /.content -->
   <div id="page-wrapper" >
<?php
//Menampilkan konten halaman
$view = new View($viewName);
$view->bind('data', $data);
$view->render();
?>
   </div>
<!-- /.end content -->
    </div>

<?php
//Memanggil semua file javascript yang diperlukan
   load_script('js/venus.js');
   load_script('js/jquery.min.js');
   load_script('metis-menu/dist/metisMenu.min.js');
  
   load_script('bootstrap/js/bootstrap.min.js');
   load_script('bootstrap-datepicker/js/bootstrap-datepicker.min.js');
   load_script('dataTables/js/jquery.dataTables.min.js');
   load_script('dataTables/js/dataTables.bootstrap.min.js');
   load_script('tinymce/tinymce.min.js');
   load_script('js/tinymce.config.js');
   load_script('clockpicker/dist/bootstrap-clockpicker.min.js');
   load_script('clockpicker/clock.js');
   load_script('js/datepicker.js');

//Memanggil file javascript untuk export laporan dengan dataTables
   load_script('dataTables/js/report/dataTables.buttons.min.js');  
   load_script('dataTables/js/report/buttons.bootstrap.min.js');  
   load_script('dataTables/js/report/jszip.min.js');
   load_script('dataTables/js/report/pdfmake.min.js');
   load_script('dataTables/js/report/vfs_fonts.js');
   load_script('dataTables/js/report/buttons.html5.min.js');
   load_script('dataTables/js/report/buttons.print.min.js');
?>

</body>
</html>