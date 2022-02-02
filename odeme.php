﻿<?php require_once 'header.php';?>

            <?php 
                require_once'header.php';
                //islemkontrol();
                
                $urunsor=$db->prepare("SELECT urun.*,kullanici.* FROM urun INNER JOIN kullanici ON urun.kullanici_id=kullanici.kullanici_id where  urun_id=:urun_id and urun_durum=:urun_durum ");
                $urunsor->execute(array(
                    'urun_durum'=>1,
                'urun_id'=>$_POST['urun_id']
                
                
                 ));
                
                $uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);
            ?>





            <div class="inner-banner-area">
                <div class="container">
                    <div class="inner-banner-wrapper">
                       
                    </div>
                </div>
            </div>
            <!-- Main Banner 1 Area End Here --> 
            <!-- Inner Page Banner Area Start Here -->
            <div class="pagination-area bg-secondary">
                <div class="container">
                    <div class="pagination-wrapper">
                      
                    </div>
                </div>  
            </div> 
            <!-- Inner Page Banner Area End Here -->          
            <!-- Product Details Page Start Here -->
            <div class="product-details-page bg-secondary">                
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="inner-page-main-body">
                                <div class="single-banner">
                             <table id="cart" class="table table-hover table-condensed">
                                <thead>
                                    <tr>
                                        <th style="width:50%">Ürün Bilgisi</th>
                                        <th style="width:10%">Fiyat</th>
                                        <th style="width:22%" class="text-center">Satıcı</th>
                                        <th style="width:10%"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td data-th="Product">
                                            <div class="row">
                                                <div class="col-sm-2 hidden-xs"><img style="width: 63px;height:63px;"src="<?php echo $uruncek['urunfoto_resimyol']?>" alt="<?php echo $uruncek['urun_ad']?>"class="img-responsive"/></div>
                                                <div class="col-sm-10">
                                                    <h4 class="nomargin"><?php echo $uruncek['urun_ad']?></h4>
                                                    <p><?php echo mb_substr($uruncek['urun_detay'],0,150,'UTF-8');?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td data-th="Price"><?php echo $uruncek['urun_fiyat']?>TL</td>
                                      
                                        <td data-th="Subtotal" class="text-center"><?php echo $uruncek['kullanici_ad']." ". $uruncek['kullanici_soyad']?></td>
                                 
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr class="visible-xs">
                                        <td class="text-center"><strong>Total 1.99</strong></td>
                                    </tr>
                                    <tr>
                                        <td><button onclick="geridon()"class="btn btn-warning"><i class="fa fa-angle-left"></i>Önceki Sayfa</button></td>
                                        <td colspan="2" class="hidden-xs"></td>

                                        <form action="nedmin/netting/kullanici.php" method="POST">

                                            <input type="hidden" name="kullanici_idsatici" value="<?php echo $uruncek['kullanici_id'] ?>">
                                            <input type="hidden" name="urun_id" value="<?php echo $uruncek['urun_id']?>">
                                            <input type="hidden" name="urun_fiyat" value="<?php echo $uruncek['urun_fiyat']?>">



                                        <td><button name="sipariskaydet"type="submit" class="btn btn-success btn-block">Sipariş Ver<i class="fa fa-angle-right"> </i></button></td>

                                     </form>
                                    </tr>
                                </tfoot>
                            </table>





<!-- Ödeme Sayfasında Kredi Kartı Bilgileri -->
<!-- Kredi Kartı İle Ödeme -->

                                
                                <div class="product-details-tab-area">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <ul class="product-details-title">
                                                <li class="active"><a href="#description" data-toggle="tab" aria-expanded="false">Banka Adı</a></li>
                                                <li><a href="#review" data-toggle="tab" aria-expanded="false">Havale İşlmeleri</a></li>

                                            </ul>
                                        </div>
                                     <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="tab-content">
                                           <div class="tab-pane fade active in" id="description">
                                               <p>Banka Adını Seçerek İşmlerinizi Tamamlıya bilirisiniz</p>




                                                 <?php 

                                                  $bankasor=$db->prepare("SELECT * FROM banka order by banka_id ASC");
                                                  $bankasor->execute();
                                                  while($bankacek=$bankasor->fetch(PDO::FETCH_ASSOC)) { ?>

                                        <input type="radio" name="banka_id " value="<?php echo $bankacek ['banka_id']?>"> <?php echo $bankacek ['banka_ad']; echo " " ?><br>
                                  



                                                <?php } ?>


                                              
                                            </div>                                               
                                              <div class="tab-pane fade" id="review">
                                                 <div class="container">
                                                   <div class="media">
                                                      <div class="media-body">
                                                       <h4 class="media-heading user_name"><p>entegre tamamlandı</p></h4> 

                                                      </div>   
                                                         <ul style="float: left;" class="default-rating">

                                                           <li>
                                                              <span>
                                                               
                                                              </span>
                                                           </li>
                                                       </ul>

                                                   </div>  
                                                   <hr>
                                                </div>
                                             
                                            </div>                                                                          
                                        </div>                        
                                     </div>
                                  </div> 
                                    
                                </div> 

                            <table>
                             <tfoot>
                                 
<?php include'iyzico/buyer.php';?>

<div id="iyzico-checkout-from" class="responsive"></div>

                             </tfoot>   
                            </table>


                             </div>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       
       <?php require_once 'footer.php';?>
        <script type="text/javascript">
            function geridon(){
window.history.back()
            }
        </script>

