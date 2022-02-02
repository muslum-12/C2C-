

                <?php 

                if (basename($_SERVER['PHP_SELF'])==basename(__FILE__)) {
                    exit("Bu sayfaya rişim yasak.");
                }


                ?>
                                
                <div class="container">
                    <h2 class="title-default">Çok Satan Ürünler</h2>  
                </div>
                <div class="container=fluid">
                    <div class="fox-carousel dot-control-textPrimary" data-loop="true" data-items="4" data-margin="30" data-autoplay="true" data-autoplay-timeout="10000" data-smart-speed="2000" data-dots="false" data-nav="true" data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="false" data-r-x-small-dots="true" data-r-x-medium="2" data-r-x-medium-nav="false" data-r-x-medium-dots="true" data-r-small="2" data-r-small-nav="false" data-r-small-dots="true" data-r-medium="3" data-r-medium-nav="false" data-r-medium-dots="true" data-r-large="4" data-r-large-nav="false" data-r-large-dots="true">

                <?php 

                              $urunsor=$db->prepare("SELECT COUNT(siparis_detay.urun_id)as urunsay,urun.*,kategori.*,kullanici.*,siparis_detay.* FROM urun INNER JOIN kategori ON urun.kategori_id=kategori.kategori_id INNER JOIN kullanici ON urun.kullanici_id=kullanici.kullanici_id INNER JOIN siparis_detay ON urun.urun_id=siparis_detay.urun_id where urun_durum=:durum GROUP BY siparis_detay.urun_id order by urunsay  DESC  limit 8");

                                $urunsor->execute(array(

                           
                               'durum' => 1
                                ));
                    while($uruncek=$urunsor->fetch(PDO::FETCH_ASSOC)) {  ?>

                        <!-- çok satanlar start-->
                               <div class="single-item-grid">
                                <div class="item-img">
                                  <a  href="urun-<?=seo($uruncek['urun_ad'])."-".$uruncek['urun_id'] ?>"> <img style="width: 451px; height: 252px;"     src="<?php echo $uruncek['urunfoto_resimyol']?>" alt="product" class="img-responsive"></a>
                                    <div class="trending-sign" data-tips="Çok Satan ürünler"><i class="fa fa-bolt" aria-hidden="true"></i></div>
                                </div>
                                                                        

                                <div class="item-content">
                                    <div class="item-info">
                                        <h5><a href="#"><?php echo $uruncek['urun_ad']?></a></h5>
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
                        <!-- çok satanlar finish-->
<?php } ?>
                
                    </div>
                </div>
               