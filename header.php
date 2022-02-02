<?php 
ob_start();
session_start();

date_default_timezone_set('Europe/Istanbul');
error_reporting(0);
require_once'nedmin/netting/baglan.php';
require_once'nedmin/production/fonksiyon.php';
if (basename($_SERVER['PHP_SELF'])==basename(__FILE__)) {
    exit("Bu sayfaya erişim yasak.");
}

//Ayar Tablosundan Site Ayarlarını Çekiyoruz
$ayarsor=$db->prepare("SELECT * FROM ayar where ayar_id=:id");
$ayarsor->execute(array(
    'id' => 0
    ));
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);

if (isset($_SESSION['userkullanici_mail'])){
   $kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail");
     $kullanicisor->execute(array(
      'mail'=>$_SESSION['userkullanici_mail']
     ));


$say=$kullanicisor->rowCount();
$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);
    // Kulalnıcı id Sesion Ataması
if (!isset($_SESSION['userkullanici_id'])){
   $_SESSION['userkullanici_id']=$kullanicicek['kullanici_id'];

  }

}
                                                
     $kullanici_sonzaman=strtotime($_SESSION['userkullanici_sonzaman']);                                        
     $suan=time();

    $fark=($suan-$kullanici_sonzaman);

    if ($fark>600) {


        $zamanguncelle=$db->prepare("UPDATE kullanici SET

          kullanici_sonzaman=:kullanici_sonzaman

            WHERE kullanici_id={$_SESSION['userkullanici_id']}");

       $update=$zamanguncelle->execute(array(

    'kullanici_sonzaman'=>date("Y-m-d H:i:s")

  ));

  $kullanici_sonzaman=strtotime($_SESSION['userkullanici_sonzaman']);         

     }



    $adressor=$db->prepare("SELECT * FROM adres where kullanici_id=:kullanici_id");
    $adressor->execute(array(
    'kullanici_id'=>$_SESSION['userkullanici_id']));
    $say=0;

    while($adrescek=$adressor->fetch(PDO::FETCH_ASSOC)) {} 
      



   


?>

<!doctype html>
<html class="no-js" lang="">
    <head>
<title>
    <?php 
if(empty($title)){
    echo $ayarcek['ayar_title'];
   } else {
       echo $title;
   }  ?>

 


</title>



    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo $ayarcek['ayar_description'] ?>">
    <meta name="keywords" content="<?php echo $ayarcek['ayar_keywords'] ?>">
    <meta name="author" content="<?php echo $ayarcek['ayar_author'] ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="img\favicon.png">
        <!-- Normalize CSS --> 
        <link rel="stylesheet" href="css\normalize.css">
        <!-- Main CSS -->         
        <link rel="stylesheet" href="css\main.css">
        <!-- Bootstrap CSS --> 
        <link rel="stylesheet" href="css\bootstrap.min.css">
        <!-- Animate CSS --> 
        <link rel="stylesheet" href="css\animate.min.css">
        <!-- Select2 CSS -->
        <link rel="stylesheet" href="css\select2.min.css">
        <!-- Font-awesome CSS-->
        <link rel="stylesheet" href="css\font-awesome.min.css">
        
        <!-- Owl Caousel CSS -->
        <link rel="stylesheet" href="vendor\OwlCarousel\owl.carousel.min.css">
        <link rel="stylesheet" href="vendor\OwlCarousel\owl.theme.default.min.css">
        
        <!-- Main Menu CSS -->      
        <link rel="stylesheet" href="css\meanmenu.min.css">

        <!-- Datetime Picker Style CSS -->
        <link rel="stylesheet" href="css\jquery.datetimepicker.css">

         <!-- ReImageGrid CSS -->
        <link rel="stylesheet" href="css\reImageGrid.css">

        <!-- Switch Style CSS -->
        <link rel="stylesheet" href="css\hover-min.css">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="style.css">

        <!-- Modernizr Js -->
        <script src="js\modernizr-2.8.3.min.js"></script>
        <!-- ck editörü  Açıklama Kısmına Eklenir -->
        <script src="nedmin/production/ckeditor/ckeditor.js"></script>

    </head>
    <body>
     
        <div id="preloader"></div>
         <div id="wrapper">
   
            <header>                
                <div id="header2" class="header2-area right-nav-mobile">
                    <div class="header-top-bar">
                        <div class="container">
                            <div class="row">                         
                                <div class="col-lg-2 col-md-2 col-sm-2 hidden-xs">
                                    <div class="logo-area">
                                        <a href="index.php"><img class="img-responsive" src="<?php echo $ayarcek['ayar_logo']?>" alt="logo"></a>
                                    </div>
                                </div> 
                            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                        <ul class="profile-notification">                                            
                    <li>
                          </li>
                                     <?php 
                                    if (isset($_SESSION['userkullanici_mail'])){?>

                               

                                      
                                        <li>
                                          <!--
                                            <div class="notify-notification">
                                                <a href="#"><i class="fa fa-bell-o" aria-hidden="true"></i><span>8</span></a>
                                                <ul>
                                                    <li>
                                                        <div class="notify-notification-img">
                                                            <img class="img-responsive" src="img\profile\1.png" alt="profile">
                                                        </div>
                                                        <div class="notify-notification-info">
                                                            <div class="notify-notification-subject">Need WP Help!</div>
                                                            <div class="notify-notification-date">01 Dec, 2016</div>
                                                        </div>
                                                        <div class="notify-notification-sign">
                                                            <i class="fa fa-bell-o" aria-hidden="true"></i>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="notify-notification-img">
                                                            <img class="img-responsive" src="img\profile\2.png" alt="profile">
                                                        </div>
                                                        <div class="notify-notification-info">
                                                            <div class="notify-notification-subject">Need HTML Help!</div>
                                                            <div class="notify-notification-date">01 Dec, 2016</div>
                                                        </div>
                                                        <div class="notify-notification-sign">
                                                            <i class="fa fa-bell-o" aria-hidden="true"></i>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="notify-notification-img">
                                                            <img class="img-responsive" src="img\profile\3.png" alt="profile">
                                                        </div>
                                                        <div class="notify-notification-info">
                                                            <div class="notify-notification-subject">Psd Template Help!</div>
                                                            <div class="notify-notification-date">01 Dec, 2016</div>
                                                        </div>
                                                        <div class="notify-notification-sign">
                                                            <i class="fa fa-bell-o" aria-hidden="true"></i>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>-->

                                        </li>


                                        <li>
                                            <div class="notify-message">
                                                <a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i><span>
                                                    
    
                                                 <?php
                                                    $mesajsay=$db->prepare("SELECT COUNT(mesaj_okunma) as say FROM mesaj Where mesaj_okunma=:id and kullanici_gel=:kullanici_id");
                                                    $mesajsay->execute(array(
                                                    'id'=>0,
                                                    'kullanici_id'=>$_SESSION['userkullanici_id']
                                                    ));
                                                    $mesajcek=$mesajsay->fetch(PDO::FETCH_ASSOC);
                                                    echo $mesajcek['say'];
                                                 ?>


                                                </span></a>
                                                <ul>

                                                  <?php 

                                                  $mesajsor=$db->prepare("SELECT mesaj.*,kullanici.* FROM mesaj INNER JOIN kullanici ON mesaj.kullanici_gon=kullanici.kullanici_id where mesaj.kullanici_gel=:id and mesaj.mesaj_okunma=:okunma order by mesaj_okunma,mesaj_zaman DESC limit 6");

                                                  $mesajsor->execute(array(
                                                  'id'=>$_SESSION['userkullanici_id'],
                                                  'okunma'=>0
                                                  ));

                                                  if ($mesajsor->rowCount()==0) {?>
                                                <li>
                                                  <div class="notify-message-info">
                                                    <div style="color: black !important" class="notify-message-subject"><h5>Yeni Mesajınız Yok</h5></div>
                                                  </div>
                                               </li>

                                                    
                                                <?php }
                                              
                                                   while($mesajcek=$mesajsor->fetch(PDO::FETCH_ASSOC)) { ?>
                                                
                                                    <li>
                                                        <div class="notify-message-img">
                                                            <img class="img-responsive" src="<?php echo $mesajcek['kullanici_magazafoto']; ?>" alt="profile">
                                                        </div>
                                                        <div class="notify-message-info">
                                                            <div class="notify-message-sender"><?php echo $mesajcek['kullanici_ad']." ".$mesajcek['kullanici_soyad'];?></div>
                                                         <div class="notify-message-date"><?php echo $mesajcek['mesaj_zaman'];?></div>
                                                          <div class="notify-message-subject">Mesaj Detayı</div>
                                                     
                                                        </div>
                                                         <div class="notify-message-sign">
                                                               <a href="mesaj-detay?mesaj_id=<?php echo $mesajcek['mesaj_id'] ?>&kullanici_gon=<?php echo $mesajcek['kullanici_gon'] ?>"> 
                                                            <i style="color: orange ! important " class="fa fa-envelope-o" aria-hidden="true"></i></a>
                                                        </div>
                                                
                                                <?php } ?>
                                                    </li>
                                            
                                      
                                                </ul>
                                            </div>





                                        </li>
                                      
                                 <?php } ?>







                                              <li>
                                                      
                                                      
                                            <div class="cart-area">
                                                <a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span>
                                                  


                                                  <?php
                                                    $sepetsay=$db->prepare("SELECT COUNT(sepet_id) as say FROM sepet Where sepet_id=:id and kullanici_id=:kullanici_id");
                                                    $sepetsay->execute(array(
                                                    'id'=>0,
                                                    'kullanici_id'=>$_SESSION['userkullanici_id']
                                                    ));
                                                    $sepetcek=$sepetsay->fetch(PDO::FETCH_ASSOC);
                                                    echo $sepetcek['say'];
                                                 ?>


                                                </span></a>
                                                <ul>
                                                    <li>
                                                        <div class="cart-single-product">
                                                            
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="cart-single-product">
                                                            <div class="media">
                                                                <div class="pull-left cart-product-img">
                                                                    <a href="#">
                                                                        <img class="img-responsive" alt="product" src="img\product\more3.jpg">
                                                                    </a>
                                                                </div>


                                                                <div class="media-body cart-content">
                                                                    <ul>
                                                                        
                                                                        <li>
                                                                            <p>Alış Veriş Sepeti</p>
                                                                        </li>
                                                                       
                                                                    </ul>
                                                                </div>


                                                        
                                                            </div>
                                                        </div>
                                                    </li>                                                   
                                                    <li>
                                                        <table class="table table-bordered sub-total-area">
                                                           <thead>

                                                                <tr>
                                                                    <th>Ürün Adı</th>
                                                                     <th> Fiyat</th>
                                                                      <th>Adet </th>


                                                               </tr>
                                                                </thead>






                                                            <tbody>
                                                                     <?php 
                        $kullanici_id=$kullanicicek['kullanici_id'];
                        $sepetsor=$db->prepare("SELECT * FROM sepet where kullanici_id=:id");
                        $sepetsor->execute(array(
                            'id' => $kullanici_id
                            ));

                       while($sepetcek=$sepetsor->fetch(PDO::FETCH_ASSOC)) {

                        $urun_id=$sepetcek['urun_id'];
                        $urunsor=$db->prepare("SELECT * FROM urun where urun_id=:urun_id");
                        $urunsor->execute(array(
                            'urun_id' => $urun_id
                            ));

                        $uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);
                         $toplam_fiyat+=$uruncek['urun_fiyat']*$sepetcek['urun_adet'];
                        ?>

                                                                <tr>
                                                                    <td><?php echo $uruncek['urun_ad'] ?></td>
                                                                    <td><?php echo $uruncek['urun_fiyat'] ?></td>
                                                                    <td><?php echo $sepetcek['urun_adet'] ?></td>

                                                                </tr>
                                                               
                                                           <?php }?>   
                                                               
                                                                
                                                                                                                             
                                                            </tbody>
                                                        </table>
                                                    </li>
                                                <ul>
                                                   <li>
                                                      <p><h3> Toplam Fiyat  :  <?php echo $toplam_fiyat ?> TL</h3></p>
                                                   </li>
                                                                     
                                                 </ul>
                                                    <li>
                                                        <ul class="cart-checkout-btn">
                                                        
                                                            <li><a href="sepetim.php" class="btn-find"><i class="fa fa-share" aria-hidden="true"></i>Sepeti Görüntüle</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        
                                                    </li>


                           



































                                    <?php 
                                   if (isset($_SESSION['userkullanici_mail'])) {?>
                                          <li>
                                            <div class="user-account-info">
                                                <div class="user-account-info-controler">
                                                    <div class="user-account-img">
                                                        <img style="border-radius:30px"width="32" heigt="32"class="img-responsive" src="<?php echo $kullanicicek['kullanici_magazafoto']?>" alt="profil Resmi">
                                                    </div>
                                                    <div class="user-account-title">
                                                        <div class="user-account-name"><?php echo $kullanicicek['kullanici_ad']." ".substr( $kullanicicek ['kullanici_soyad'],0,1)?>.</div>
                                                        <div class="user-account-balance">


                                                     <!-- Satış Yapıldığında  satış Toplamını Gösteren  bölüm -->
                                                            <?php 
                                                          $siparissor=$db->prepare("SELECT SUM(urun_fiyat) as toplam FROM siparis_detay where kullanici_idsatici=:kullanici_id");
                                                            $siparissor->execute(array(
                                                            'kullanici_id'=>$_SESSION['userkullanici_id']

                                                            )); 


                                                            $sipariscek=$siparissor->fetch(PDO::FETCH_ASSOC);
                                                            if(isset( $sipariscek['toplam'])){
                                                                echo $sipariscek['toplam']."TL";
                                                            }else{
                                                                echo "0.00";
                                                            }

                                                            ?>

                                                        </div>
                                                    </div>
                                                    <div class="user-account-dropdown">
                                                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                                                    </div>
                                                </div>


                                                <ul>
                                                    <li><a href="hesabim">Hesap Bilgilerim</a></li>
                                               
                                                   <!-- UNUTMA MÜSLÜM !!! İlerde Bunlara Link ve Ekleme Yapıcaksın -->
                                                </ul>
                                            </div>
                                        </li>
                                          <li><a class="apply-now-btn" href="logout.php" id="logout-button">Çıkış Yap</a></li>

                                    <?php }else {?>
                                           <li>
























      
                                             <div class="apply-btn-area">
                                                <a class="apply-now-btn" href="#" id="login-button">Giriş</a>
                                                <div class="login-form" id="login-form" style="display: none;">
                                                    <h2>Giriş</h2>


                                                   <form action="nedmin/netting/kullanici.php" method="POST" id="personal-info-form">

                                                        <input class="form-control" type="text" required=""placeholder="Mail adresini giriniz"name="kullanici_mail">

                                                        <input class="form-control" type="password"required="" placeholder="şifrenizi Girin"name="kullanici_password">


                                                     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">                                    
                                                      <div class="form-group">
                                                         <label class="control-label" for="last-name"></label>
                                                       <img id="captcha" src="securimage/securimage_show.php" alt="CAPTCHA Image"/><br><br><br>
                                                         <a class="btn btn-danger btn-xs" href="#" onclick="document.getElementById('captcha').src='securimage/securimage_show.php?'+ Math.random(); return false">Değiştir</a>
                                                      </div>
                                                    </div> <br>


                                                       <input class="form-control" type="text" required="" placeholder="Güvenlik kodunu Girin"name="captcha_code">

                                                        <button class="btn-login" type="submit" value="login" name="musterigiris">Gönder</button>

                                                     <button style="background-color: green" type="button" class="update-btn disabled " data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Şifremi unuttum</button>

                                                        <div class="remember-lost">
                                                         <div class="checkbox">


                                                        <label><input type="checkbox"> Beni Hatırla</label>
                                                            </div>
                                                        </div>
                                                        <button class="cross-btn form-cancel" type="submit" value=""><i class="fa fa-times" aria-hidden="true"></i></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </li>
                                     </li>
    <!-- Modal Başlangıç 

                 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Şifreni Sıfırla</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <form accept="mailphp/sifremi-unuttum.php/" method="POST">

                                        <div class="form-group">
                                        <p><b>Uyarı:</b> Girdiğini mail adresi kayıtlarda varsa yeni şifreniz Mail adresine gönderilecekir</p>
                                          </div>


                                          <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Mail Adresiniz:</label>
                                            <input type="email" class="form-control" name="kullanici_mail" id="recipient-name">
                                          </div>
                                       
                                          
                                           
                                      
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                                        <button type="submit" name="sifremiunuttum"class="btn btn-primary">Şifre İste</button>
                                          </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>



                           
              Modal Bitiş -->  




                                                    <li><a class="apply-now-btn-color hidden-on-mobile" href="register">Kayıt</a></li>
                                                    <li>
                                                      

                                                    </li>

                                    <?php }
                                      ?>
                                   
                                    </ul>
                         
                                </div>                          
                            </div>                          
                        </div>
                    </div>
                    <div class="main-menu-area bg-primaryText" id="sticker">
                        <div class="container">
                            <nav id="desktop-nav">
                                <ul>
                                    <li class=""><a href="index.php">Anasayfa</a></li>
                             <li class=""><a href="kategoriler.php">kategoriler</a>
                          

                                  <ul class="mega-menu-area"> 
                                      
                                              <?php 
                                        $kategorisor=$db->prepare("SELECT * FROM kategori where kategori_onecikar=:onecikar order by kategori_sira ASC");
                                        $kategorisor->execute(array(
                                            'onecikar' => 1 
                                        ));
                                        while($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)) {  ?>  
                                  
                                      
                                    <li><a href="kategoriler-<?=seo($kategoricek['kategori_ad'])."-".$kategoricek['kategori_id']?>"><?php echo $kategoricek['kategori_ad']?></a>        
                                       <?php }?>

                                         
                                          
                                          </li>
                                           
                                        </ul>   


                              </li>



                                       <?php 
                                        $kategorisor=$db->prepare("SELECT * FROM kategori where kategori_onecikar=:onecikar order by kategori_sira ASC");
                                        $kategorisor->execute(array(
                                            'onecikar' => 1 
                                        ));
                                        while($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)) {  ?>  
                                  
                                      
                                    <li><a href="kategoriler-<?=seo($kategoricek['kategori_ad'])."-".$kategoricek['kategori_id']?>"><?php echo $kategoricek['kategori_ad']?></a>        
                                       <?php }?>









<!--ilerde burası açılacak  çünkü burda menüleri öne alıcaz
                                      <?php 
                                        $menusor=$db->prepare("SELECT * FROM menu where menu_durum:durum order by menu_sira ASC limit 6");
                                        $menusor->execute(array(
                                        'durum'=>1
                                           
                                        ));
                                        while($menucek=$menusor->fetch(PDO::FETCH_ASSOC)) {  ?>  
                                  
                                      
                                    <li><a href= <?php
                                    if(!emty($menucek['menu_url'])){
                                  echo $menucek['menu_url'];

                                    }else{
                                        echo "sayfa ".seo($menucek['menu_ad']);
                                    }
                                     ?>><?php echo $menucek['menu_ad']?></a>       


 
                                       <?php }?>



-->






                          
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- Mobile Menu Area Start -->
                <div class="mobile-menu-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mobile-menu">
                                    <nav id="dropdown">
                                        <ul>
                                          
                                    <li class=""><a href="index.php">Anasayfa</a></li>
                                    <li><a href="login">Üye Gİrişi</a></li>
                                    <li ><a href="">Üye Kayıt</a></li>
                                   <li class=""><a href="kategoriler.php">kategoriler</a></li>





<

                                       <?php 
                                        $kategorisor=$db->prepare("SELECT * FROM kategori where kategori_onecikar=:onecikar order by kategori_sira ASC");
                                        $kategorisor->execute(array(
                                            'onecikar' => 1 
                                        ));
                                        while($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)) {  ?>  
                                  
                                      
                                    <li><a href="kategoriler-<?=seo($kategoricek['kategori_ad'])."-".$kategoricek['kategori_id']?>"><?php echo $kategoricek['kategori_ad']?></a>        
                                       <?php }?>












                          
                                




                                        </ul>
                                    </nav>
                                </div>           
                            </div>
                        </div>
                    </div>
                </div>  



                <!-- Mobile Menu Area End -->
            </header>
