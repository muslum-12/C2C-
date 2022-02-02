  <?php require_once 'header.php'; ?>          <!-- Header Area End Here -->
            <!-- Main Banner 1 Area Start Here -->
            <div class="main-banner2-area">
                <div class="container">
                    <div class="main-banner2-wrapper">                       
                        <h1>Online Alış Veriş Platformu!</h1>
                        <p></p>
                        <form action="arama-detay" method="POST">
                        <div class="banner-search-area input-group">
                            <input class="form-control" required=""minlength="3"name="searchkeyword" placeholder="anahtar kelimeyi Gir . . ." type="text">
                            <span class="input-group-addon">
                                <button type="submit"name="searchsayfa">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>  
                            </span>

                        </div>
                      </form>
                    </div>
                </div>
            </div>
   
     <div class="trending-products-area section-space-default">
                

  <?php require_once 'cok-satanlar.php'; ?>   



         


            <!-- Newest Products Area Start Here -->
            <div class="newest-products-area bg-secondary section-space-default">                
                <div class="container">
                    <h3 class="title-default">Öne Çıkan Ürünler</h3>  
                </div>

                <div class="container-fluid" id="isotope-container">
                    <div class="isotope-classes-tab isotop-box-btn-white"> 

                      
                    </div>
                    <div class="row featuredContainer">

                     <!-- start Anasayfa listeleme-->   
                   <?php 

                    $urunsor=$db->prepare("SELECT urun.urun_ad,urun.kategori_id,urun.urun_id,urun.urun_fiyat,urun.urunfoto_resimyol,urun.kullanici_id,urun.urun_durum,urun.urun_onecikar,kategori.kategori_id,kategori.kategori_ad,kullanici.kullanici_id,kullanici.kullanici_ad,kullanici.kullanici_soyad,kullanici.kullanici_magazafoto From urun INNER JOIN kategori ON urun.kategori_id=kategori.kategori_id INNER JOIN kullanici ON urun.kullanici_id=kullanici.kullanici_id where urun_onecikar=:onecikar and urun_durum=:durum order by urun_onecikar DESC  limit 16");
                        $urunsor->execute(array(

                        'onecikar' => 1,
                        'durum' => 1


                       ));

                    while($uruncek=$urunsor->fetch(PDO::FETCH_ASSOC)) {  ?>

  

                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 yenigelen plugins">
                            <div class="single-item-grid">
                                <div class="item-img">
                                  <a  href="urun-<?=seo($uruncek['urun_ad'])."-".$uruncek['urun_id'] ?>"> <img style="width: 451px; height: 252px;" src="<?php echo $uruncek['urunfoto_resimyol']?>" alt="product" class="img-responsive"></a>
                                    <div class="trending-sign" data-tips="öne çıkan ürünler"><i class="fa fa-bolt" aria-hidden="true"></i></div>
                                </div>
                                                                        

                                <div class="item-content">
                                    <div class="item-info">
                                        <h5><a href="urun-<?=seo($uruncek['urun_ad'])."-".$uruncek['urun_id'] ?>"><?php echo $uruncek['urun_ad']?></a></h5>
                                       <h5> <span><a href="kategoriler-<?=seo($uruncek['kategori_ad'])."-".$uruncek['kategori_id']?>"><?php echo $uruncek['kategori_ad']?></a></span><br></h5>
                                        <div class="price"><?php echo $uruncek['urun_fiyat']?>TL</div>
                                    </div></h5></a>
                                    <div class="item-profile">
                                        <div class="profile-title">
                                            <div class="img-wrapper"><img style=" width:32px;height:32px;"src="<?php echo $uruncek['kullanici_magazafoto']?>" alt="profile" class="img-responsive img-circle"></div>
                                        <h4><span><?php echo $uruncek['kullanici_ad']." ".$uruncek['kullanici_soyad']?></span></h5><br>
                                        </div>
                                        <div class="profile-rating">


                                            <!--Unutma İlerde Bunu Açıcaz İşlem Yapılması Gerekişyor-->
                                            <a href="#"><b><h5>Tüm Ürünler </h5></b></a>
                                          <!--  <ul>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li>(<span> 05</span> )</li>
                                            </ul>-->
                                        </div>
                                    </div>

                                </div>
                            </div>

                         </div>

                         <?php } ?>
                     <!-- Finish Anasayfa listeleme-->  

                      <!-- start Anasayfa listeleme-->   
          
                     

                        
                    </div>
                    
                </div>
            </div>
            <!-- Newest Products Area End Here -->
           
            <!-- Trending Products Area End Here -->
            <!-- Why Choose Area Start Here -->

          <!--  <div class="why-choose-area bg-primaryText section-space-default">                
                <div class="container">
                    <h2 class="title-textPrimary">Online ALışverişini Yap </h2>  
                </div>
                <div class="container">
                    <div class="row">
                         <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="why-choose-box">
                                <a href="#"><i class="fa fa-gift" aria-hidden="true"></i></a>
                                <h3><a href="#">Al ve Sat </a></h3>
                                <p></p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="why-choose-box">
                                <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a>
                                <h3><a href="#">Marka Ürünler</a></h3>
                                <p></p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="why-choose-box">
                                <a href="#"><i class="fa fa-lock" aria-hidden="true"></i></a>
                                <h3><a href="#">100% Güvenli Ödeme</a></h3>
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>-->
            <!-- Why Choose Area End Here -->
                 
            <!-- Author Banner Area Start Here -->
            <div class="author-banner-area">
                <div class="author-banner-wrapper">
                    <div id="ri-grid" class="author-banner-bg ri-grid header text-center">
                  
                    </div>
                 
                </div>               
            </div>
            <!-- Author Banner Area End Here -->            
   <?php require_once'footer.php'; ?>               
            <!-- Footer Area Start Here -->
           
