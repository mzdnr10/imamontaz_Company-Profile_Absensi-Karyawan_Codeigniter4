<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title><?=$title?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />

    <!-- Favicons -->
    <link href="<?=base_url('assets/')?>img/logo.jpeg" rel="icon" />
    <link href="<?=base_url('assets/')?>img/apple-touch-icon.png" rel="apple-touch-icon" />

    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700"
      rel="stylesheet"
    />

    <!-- Bootstrap CSS File -->
    <link href="<?= base_url('assets/')?>lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Libraries CSS Files -->
    <link href="<?= base_url('assets/')?>lib/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?= base_url('assets/')?>lib/animate/animate.min.css" rel="stylesheet" />
    <link href="<?= base_url('assets/')?>lib/ionicons/css/ionicons.min.css" rel="stylesheet" />
    <link href="<?= base_url('assets/')?>lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />
    <link href="<?= base_url('assets/')?>lib/magnific-popup/magnific-popup.css" rel="stylesheet" />
    <link href="<?= base_url('assets/')?>lib/ionicons/css/ionicons.min.css" rel="stylesheet" />

    <!-- Main Stylesheet File -->
    <link href="<?= base_url('assets/')?>css/style.css" rel="stylesheet" />


    <!-- emailjs -->
    <script src="https://cdn.emailjs.com/dist/email.min.js"></script>
    <script>
      (function() {
        emailjs.init('Ze_DZnDxgzxU6ZJg2');
      })();
    </script>
    <!-- emailjs -->
  </head>

  <body id="body">
    <!--==========================
    Top Bar
    ============================-->
    <section id="topbar" class="d-none d-lg-block">
      <div class="container clearfix">
        <div class="contact-info float-left">
          <i class="fa fa-phone"></i> <a href="https://wa.me/6281318318983">+62 813 1831 8983</a>
          <i class="fa fa-phone"></i> <a href="https://wa.me/6281280780214">+62 812 8078 0214</a>
          <i class="fa fa-phone"></i> <a href="https://wa.me/6285771524066">+62 857 7152 4066</a>
          <i class="fa fa-phone"></i> <a href="https://wa.me/6285210005588">+62 852 1000 5588</a>
        </div>
        <div class="social-links float-right">
          <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
          <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
          <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
          <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
          <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
        </div>
      </div>
    </section>

    <!--==========================
    Header
    ============================-->
    <header id="header">
      <div class="container">
        <div id="logo" class="pull-left">
          <!-- <h1><a href="#body" class="scrollto">Reve<span>al</span></a></h1> -->
           <!-- Uncomment below if you prefer to use an image logo  -->
          <h1><a href="#body" style="font-size: 15px;">
            <img src="<?= base_url('assets/')?>img/logo.jpeg" alt="" title="" style="max-height: 30px;"/>PT. IMA MONTAZ TEKNINDO
          </a>
        
        </div></h1>
    <!-- 
        <div class="lugu">
          <img src="img/logo.jpeg" alt="Logo" class="logo" style="max-width: 40px;">
          <p class="text">Nama Perusahaan</p>
        </div> -->
      

        <nav id="nav-menu-container">
          <ul class="nav-menu">
            <li class="menu-active"><a href="<?=base_url()?>">Home</a></li>
            <li><a href="<?=base_url('#aboutus')?>">About Us</a></li>
            <li><a href="<?=base_url('#sevices')?>">Services</a></li>
            <li><a href="<?=base_url('#product')?>">Product</a></li>
            <li><a href="<?=base_url('#contact')?>">Contact</a></li>
          </ul>
        </nav>
        <!-- #nav-menu-container -->
      </div>
    </header>
    <!-- #header -->