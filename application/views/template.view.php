<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pemesanan Wedding Organizer</title>
    <?php
   //Memanggil function_html.php, file CSS dan library jQuery
   require_once ROOT."/application/functions/function_html.php";
   load_css('bootstrap/bootstrap.min.css');
   load_css('bootstrap-datepicker/css/bootstrap-datepicker3.min.css');
   load_css('dataTables/css/dataTables.bootstrap.min.css');
   load_css('metis-menu/dist/metisMenu.min.css');
   load_css('css/style.css');
   load_css('fontawesome/css/all.min.css');
   load_css('clockpicker/dist/bootstrap-clockpicker.min.css');
   load_css('owlCarousel/css/owl.carousel.min.css');
   load_script('jquery/jquery-3.5.1.slim.min.js');
   load_script('jquery/main.js');
   load_script('bootstrap/bootstrap.min.js');
   load_script('owlCarousel/js/owl.carousel.min.js');
?>  

</head>
<body>
<div id="topbar">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <ul class="top-contact">
                        <li><a href=""><i class="fas fa-phone"></i> 0896-2480-2524</a></li>
                        <li><a href=""><i class="fas fa-envelope"></i> zikri.febrianza@gmail.com</a></li>
                        <li><a href=""><i class="fas fa-bullhorn"></i> Selamat Datang</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <ul class="sosmed">
                        <li><a href=""><i class="fab fa-facebook"></i></a></li>
                        <li><a href=""><i class="fab fa-instagram"></i></a></li>
                        <li><a href=""><i class="fab fa-youtube"></i></a></li>
                    </ul>
                </div>

            </div>
        </div>
    </section>

    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="brand">
                        <img src="public/images/logo wo.png" alt="">
                        <div class="brand-name">
                            <h1>Wedding Organizer</h1>
                            <h3>Apapun Ada Disini....</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 pembungkus-searchbox">
                    <div class="searchbox">
                        <form method="get">
                            <div class="input-group">
                                <input type="text" class="form-control" name="cari" placeholder="Cari Sesuatu..." 
                                aria-label="Tombol Cari" aria-describedby="tombol-cari">
                                <div class="input-group-append">
                                    <button class="btn btn-utama" id="tombol-cari">Cari</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>

<!-- section menu -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-hitam">
        <div class="container">
            <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse"
            aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="my-nav" class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Beranda <span class="sr-only">(current)</span> </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" 
                        aria-expanded="false" role="button">Paket Pernikahan</a>
                        <ul class="dropdown-menu">
                            <a class="dropdown-item" href="#">Indoor</a>
                            <a class="dropdown-item" href="#">Outdoor</a>
                            <a class="dropdown-item" href="#">Akad</a>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Gallery</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

<!-- Slider Carousel -->
<section id="slider-carousel">
        <div id="carousel_1" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel_1" data-slide-to="0" class="active"></li>
                <li data-target="#carousel_1" data-slide-to="1"></li>
                <li data-target="#carousel_1" data-slide-to="2"></li>
                </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="public/images/efdc263048f824100a43439b22e85122.jpg" class="d-block w-100"
                    alt="">
                    <div class="carousel-caption d-none d-md-block">
                        <h2>Cara Mudah Memesan Paket Pernikahan</h2>
                        <p>Isi Form Pemesanan dengan Klik Tombol dibawah ini</p>
                        <a href="user/login"><button class="btn btn-utama" href="">Pesan Paket</button></a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="public/images/efdc263048f824100a43439b22e85122.jpg" class="d-block w-100" 
                    alt="">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="public/images/efdc263048f824100a43439b22e85122.jpg" class="d-block w-100" 
                    alt="">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carousel_1" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </a>
            <a class="carousel-control-next" href="#carousel_1" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </a>
    </section>
    
    <section id="venue">
        <div class="venue-badan">
            <div class="section-title">
                <h2>Venue</h2>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div id="slider-tools-1"></div>
                    <div class="owl-carousel" id="venue-slider">
                        <div class="section-item-slider">
                            <a href=""><img class="foto-tempat" src="public/images//GOLDENSR.jpg" alt="">
                            </a>
                            <div class="section-item-caption">
                                <h5>Golden Sriwijaya</h5>
                                <h6>Rp.188.500.000,-</h6>
                            </div>
                        </div>
                        <div class="section-item-slider">
                            <a href=""><img class="foto-tempat" src="public/images/TSULTAN.jpg" alt="">
                            </a>
                            <div class="section-item-caption">
                                <h5>The Sultan Convention</h5>
                                <h6>Rp.188.500.000,-</h6>
                            </div>
                        </div>
                        <div class="section-item-slider">
                            <a href=""><img class="foto-tempat" src="public/images/OPICC.jpg" alt="">
                            </a>
                            <div class="section-item-caption">
                                <h5>Opi Convention Center</h5>
                                <h6>Rp.169.000.000,-</h6>
                            </div>
                        </div>
                        <div class="section-item-slider">
                            <img class="foto-tempat" src="public/images/SRIMC.jpg" alt="">
                            <div class="section-item-caption">
                                <h5>Sri Melayu Convention</h5>
                                <h6>Rp.157.000.000,-</h6>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 kanan">
                    <div class="jam-digital">
                        <div class="kotak">
                            <p id="jam"></p>
                        </div>
                        <div class="kotak">
                            <p id="menit"></p>
                        </div>
                        <div class="kotak">
                            <p id="detik"></p>
                        </div>
                    </div>
                    <div id="idx-calendar">
                        <div id="calendar-control">
                         <div id="monthNow">Januari 2014</div>
                         <div id="nextMonth"></div>
                         <div id="prevMonth"></div>
                        </div>
                        <div id="dayNames">
                         <ul>
                          <li>Minggu</li>
                          <li>Senin</li>
                          <li>Selasa</li>
                          <li>Rabu</li>
                          <li>Kamis</li>
                          <li>Jum'at</li>
                          <li>Sabtu</li>
                         </ul>
                        </div>
                        <div id="daysNum">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="footer-col">
                        <div class="brand">
                            <ul class="sosmed">
                                <li><a href=""><i class="fab fa-facebook"></i></a></li>
                                <li><a href=""><i class="fab fa-instagram"></i></a></li>
                                <li><a href=""><i class="fab fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                        <div class="footer-col">
                            <h2>Kontak Kami</h2>
                            <p class="alamat">Jln. Ahmad Yani Palembang, Sumatera Selatan</p>
                            <ul class="kontak">
                                <li><i class="fas fa-phone"></i>Telp : 089624802524</li>
                                <li><i class="fas fa-envelope"></i>Email : zikrifebrianza@gmail.com </i></li>
                            </ul>
                        </div>
                </div>
                <div class="col-md-4">
                    <div class="footer-col">
                        <h2>Navigasi</h2>
                        <ul class="footer-nav">
                            <li><a>Paket Pernikahan</a>
                                <ul>
                                    <li><a href="">Indoor</a></li>
                                    <li><a href="">Outdoor</a></li>
                                    <li><a href="">Akad</a></li>
                                </ul>
                            </li>
                            <li><a href="">Gallery</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container text-center">
                <h6>Hak Cipta Dilindungi. &copy; 2021 
                    <a href="">Universitas Bina Darma Palembang</a></h6>
            </div>
        </div>
    </footer>

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
   load_script('jquery/jquery-3.5.1.slim.min.js');
   load_script('jquery/main.js');
   load_script('bootstrap/bootstrap.min.js');
   load_script('owlCarousel/js/owl.carousel.min.js');

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