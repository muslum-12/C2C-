<?php require_once 'header.php';?>

 <?php require_once 'search.php';?><br><br>





            <!-- Main Banner 1 Area End Here --> 
            <!-- Inner Page Banner Area Start Here -->
        
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
                                   <th>Seç</th>

                                    <th>Ürün ad</th>
                                    <th>Ürün Kodu</th>
                                    <th>Adet</th>
                                    <th>Toplam Fiyat</th>

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
                        <td><form><input type="checkbox"></form></td>

                        <td><?php echo $uruncek['urun_ad'] ?></td>
                        <td><?php echo $uruncek['urun_id'] ?></td>
                        <td><form><input type="text" class="form-control quantity" value="<?php echo $sepetcek['urun_adet'] ?>"></form></td>
                        <td><?php echo $uruncek['urun_fiyat'] ?></td>
                    </tr>
                    <?php } ?>

                </tbody>
                              
        <tfoot>
                                    
                                     <tr>
                                         <td><li><a href="odeme.php" class="btn-find"><i class="fa fa-share" aria-hidden="true"></i>Ödeme Sayfası</a></li></td>

                                    </tr>
                                </tfoot>
                            </table>


                            <table>
                             
                            </table>
                              <div class="total">Toplam Fiyat : <span class="bigprice"><?php echo $toplam_fiyat ?> TL</span></div>


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

