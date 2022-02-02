<?php
ob_start();
session_start();
include '../netting/baglan.php';
include 'fonksiyon.php';

//Belirli veriyi seçme işlemi
$ayarsor=$db->prepare("SELECT * FROM ayar where ayar_id=:id");
$ayarsor->execute(array(
  'id' => 0
  ));
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);


$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail");
$kullanicisor->execute(array(
  'mail' => $_SESSION['kullanici_mail']
  ));
$say=$kullanicisor->rowCount();
$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);

if ($say==0) {

  Header("Location:login.php?durum=izinsiz");
  exit;

}



if (!isset($_SESSION['kullanici_mail'])) {


}//1.Yöntem


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Admin Paneli </title>

  <!-- Bootstrap -->
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  <!-- Datatables -->
 

 <!-- Dropzone.js -->




  <!-- Dropzone.js -->

  <script src="../vendors/dropzone/dist/min/dropzone.min.js"></script>
  <!-- Ck Editör -->
  <!--<script src="https://cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>-->
   <script src="ckeditor/ckeditor.js"></script>


  <!-- Custom Theme Style -->
  <link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border:">
         <a href="index.php" class="site_title"></i> <span>Admin Giriş</span></a>
         
          </div>
          <div class="clearfix"></div>
          <!-- menu profile quick info -->
          <div class="profile clearfix">
          <div class="profile_pic">
            </div>
            </div>
          <!-- /menu profile quick info -->
          <br />
          <!-- sidebar menu -->
          <div id="" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
            <ul class="nav side-menu">

              
           <li><a href="index.php"> Anasayfa </a></li>
           <li><a href="genel-ayar.php">Logo Ayarı</a></li>
           <li><a href="iletisim-ayarlar.php">İletişim Ayarlar</a></li>
           <li><a href="mail-ayar.php">Mail Ayarlar</a></li>
           <li><a href="hakkimizda.php"> Hakkımızda </a></li>
           <li><a href="kullanici.php">Kullanıcılar </a></li>
           <li><a href="menu.php">Menüler</a></li>
           <li><a href="urun.php">Ürünler </a></li>
           <li><a href="kategori.php"> Kategoriler </a></li>
           <li><a href="magaza-onay.php"> Mağaza Başvuruları </a></li>
           <li><a href="magazalar.php">Mağazalar </a></li>
           <li><a href="banka.php">Bankalar </a></li>



           </ul>
         </div>
       </div>
    </div>
  </div>

  <!-- top navigation -->
  <div class="top_nav">
    <div class="nav_menu">
      <nav>
        

        <ul class="nav navbar-nav navbar-right">
          <li class="">
            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              <img src="" alt=""><?php echo $kullanicicek['kullanici_ad'] ?> <?php echo $kullanicicek['kullanici_soyad'] ?>
                
              <span class=" fa fa-angle-down"></span>
            </a>
            <ul class="dropdown-menu dropdown-usermenu pull-right">
              <li><a href="#"> Profil Bilgilerim</a></li>
             <li><a href="logout.php">Güvenli Çıkış</a></li>
            </ul>
          </li>

        </ul>
      </nav>
    </div>
  </div>
     