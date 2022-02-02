        <?php 
           require_once'header.php';
          // islemkontrol();
         
ini_set('display_errors', 'On');
error_reporting(E_ALL);
        ?>
        <div class="pagination-area bg-secondary">
        <div class="container">
        <div class="pagination-wrapper">
                        
        </div>
        </div>  
        </div> 
            <!-- Inner Page Banner Area End Here -->          
            <!-- Settings Page Start Here -->
        <div class="settings-page-area bg-secondary section-space-bottom">
        <div class="container">
        <div class="row settings-wrapper">  
        <?php require_once 'hesap-sidebar.php'?>
           <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12"> 

    
            


  <form action="nedmin/netting/kullanici.php"method="POST" class="form-horizontal" id="personal-info-form">
        <div class="settings-details tab-content">
        <div class="tab-pane fade active in" id="Personal">
        <h2 class="title-section">Şifre Güncelleme</h2>
        <div class="personal-info inner-page-padding"> 

 
        <div class="form-group">
        <label class="col-sm-3 control-label">Eski Şifrenizi Giriniz</label>
        <div class="col-sm-9">
        <input class="form-control"name="kullanici_eskipassword" id="first-name" placeholder="Eski Şifrenizi Giriniz"type="password">
        </div>
        </div>


        <div class="form-group">
        <label class="col-sm-3 control-label">Şifreniz</label>
        <div class="col-sm-9">
        <input class="form-control"name="kullanici_passwordone" id="first-name" placeholder="Yeni Şifrenizi Giriniz"type="password">
        </div>
        </div>

        <div class="form-group">
        <label class="col-sm-3 control-label">Yeni Şifreniz</label>
        <div class="col-sm-9">
        <input class="form-control"name="kullanici_passwordtwo" id="first-name" placeholder=" Şifrenizi Tekrar Giriniz"type="password">
        </div>
        </div>
      
    
                    <!-- KUlLANICIYA İD gÖNDER -->
        <input type="hidden"name="kullanici_id"value="<?php echo $kullanicicek['kullanici_id']?>">
        <div class="form-group">
        <div  align="right" class="col-sm-12">
        <button class="update-btn"name="musterisifreguncelle" id="login-update">Şifre Güncelle</button>  
        </div>
        </div>                                        
        </div> 
        </div>                                                                       
        </div>
        </form> 
        </div>  
        </div>  
        </div>  
        </div> 
        <?php require_once'footer.php';?>
            <!-- Footer Area Start Here -->
           