<?php require_once 'header.php' ?>
            <!-- Main Banner 1 Area Start Here -->
            
            <!-- Main Banner 1 Area End Here --> 
            <!-- Inner Page Banner Area Start Here -->
             <div class="pagination-area bg-secondary">
                <div class="container">
                    <div class="pagination-wrapper">
                        <ul>
                            <li><a href="index.php">Anasayfa</a><span> -</span></li>
                            <li>Kayıt</li>
                        </ul>
                    </div>
                </div>  
            </div> 
            <!-- Inner Page Banner Area End Here -->          
            <!-- Registration Page Area Start Here -->
            <div class="registration-page-area bg-secondary section-space-bottom">
                <div class="container">
                    <h2 class="title-section"> Üye Kayıt İşlemleri</h2>
                    <div class="registration-details-area inner-page-padding">
 

                            <form action="nedmin/netting/kullanici.php" method="POST" id="personal-info-form">
                              <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label" for="first-name">Mail Adresiniz</label>
                                        <input type="text"id="first-name"name="kullanici_mail"placeholder="lütfen Mail Adresini Girin(kullanıcı Adınız Olucak!)"required="" class="form-control">
                                       
                                    </div>
                                </div>                                      
                            </div>
                              <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label" for="first-name">Adınız*</label>
                                        <input type="text" id="first-name"placeholder="lütfen Adınız Girin"required=""name="kullanici_ad"class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">                                          
                                    <div class="form-group">
                                        <label class="control-label" for="last-name">Soyadınız*</label>
                                        <input type="text" id="last-name"placeholder="lütfen soyadınızı Girin"required=""name="kullanici_soyad"class="form-control">
                                    </div>
                                </div>
                            </div>

                             <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">                                          
                                    <div class="form-group">
                                        <label class="control-label" for="first-name">Şifreniz*</label>
                                        <input type="password" id="first-name"placeholder="lütfen Şifrenizi Girin"required=""name="kullanici_passwordone"class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">                                          
                                    <div class="form-group">
                                        <label class="control-label" for="last-name">Şifreniz Tekrar*</label>
                                        <input type="password" id="last-name"placeholder="lütfen Şifrenizi Tekrar Girin"required=""name="kullanici_passwordtwo" class="form-control">
                                    </div>
                                </div>
                     
                                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">                            
                                     <div class="pLace-order">
                                        <button class="update-btn disabled" type="submit" name="musterikaydet">Gönder</button>
                                    </div>
                                </div>
                            </div> 
                        </form>                      
                    </div> 
                </div>
            </div>
            <!-- Registration Page Area End Here -->
            <!-- Footer Area Start Here -->
           <?php require_once 'footer.php' ?>