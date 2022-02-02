<?php require_once 'header.php' ?>
            <!-- Main Banner 1 Area Start Here -->
            
            <!-- Main Banner 1 Area End Here --> 
            <!-- Inner Page Banner Area Start Here -->
             <div class="pagination-area bg-secondary">
                <div class="container">
                    <div class="pagination-wrapper">
                     
                    </div>
                </div>  
            </div> 
            <!-- Inner Page Banner Area End Here -->          
            <!-- Registration Page Area Start Here -->
            <div class="registration-page-area bg-secondary section-space-bottom">
                <div class="container">
                    <h2 class="title-section">Üye Giriş İşlemleri</h2>
                    <div class="registration-details-area inner-page-padding">
                       <form action="nedmin/netting/kullanici.php" method="POST" id="personal-info-form">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">                                          
                                    <div class="form-group">
                                        <label class="control-label" for="first-name">Mail Adresiniz*</label>
                                        <input type="text" id="first-name"placeholder="Mail Adresini Girin Lütfen"required=""name="kullanici_mail"class="form-control">
                                    </div>
                                   </div>

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">                                          
                                    <div class="form-group">
                                        <label class="control-label" for="last-name">Şifrenizi Girin*</label>
                                        <input type="password" id="last-name"placeholder="lütfen Şifrenizi Girin"required=""name="kullanici_password" class="form-control">
                                    </div>
                                </div>


                                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">                                    
                                    <div class="form-group">
                                        <label class="control-label" for="last-name"></label>

                                        <img id="captcha" src="securimage/securimage_show.php" alt="CAPTCHA Image"/><br>
                                       <a class="btn btn-danger btn-xs" href="#" onclick="document.getElementById('captcha').src='securimage/securimage_show.php?'+ Math.random(); return false">Değiştir</a>
                                  </div>
                                 </div> 

         


                                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">                                            
                                    <div class="form-group">
                                        <label class="control-label" for="first-name">Güvenlik kodunu Giriniz*</label>
                                        <input type="text" id="first-name"placeholder="Güvenlik kodu Girin Lütfen"required=""name="captcha_code"class="form-control"><br>

                                    </div>
                                   </div>

                                   
                                  
                     
                                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">                             
                                    <div class="pLace-order">
                                    <button class="update-btn disabled" type="submit" name="musterigiris">Gönder</button>


                                <button style="background-color: green" type="button" class="update-btn disabled " data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Şifremi unuttum</button>


                      
                                    </div>
                                </div>
                            </div> 
                        </form>                      
                    </div> 
                </div>
            </div>
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



                           
             <!-- Modal Bitiş -->  
            <!-- Registration Page Area End Here -->
            <!-- Footer Area Start Here -->
          <?php require_once 'footer.php' ?>