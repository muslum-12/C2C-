        <?php 
           require_once'header.php';
           
        
        islemkontrol();
        ?>
         
        <div class="pagination-area bg-secondary">
        <div class="container">
        <div class="pagination-wrapper">
                        
        </div>
        </div>  
        </div> 
      
        <div class="settings-page-area bg-secondary section-space-bottom">
        <div class="container">
          <div class="row settings-wrapper">  
            <?php require_once 'hesap-sidebar.php'?>
               <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12"> 

    

 <form action="nedmin/netting/kullanici.php"method="POST" class="form-horizontal" id="personal-info-form">
        <div class="settings-details tab-content">
        <div class="tab-pane fade active in" id="Personal">
        <h2 class="title-section">Hesap Bilgilerini Düzenle</h2>
        <div class="personal-info inner-page-padding"> 

        <div class="form-group">
        <label class="col-sm-3 control-label">Kayıtlı Mail-Adresi(Değiştiremezsiniz)</label>
        <div class="col-sm-9">
        <input class="form-control" disabled="" id="first-name"name="kullanici_mail"value="<?php echo $kullanicicek['kullanici_mail']?>"type="text">
        </div>
        </div>
        <div class="form-group">
        <label class="col-sm-3 control-label">Adınız</label>
        <div class="col-sm-9">
        <input class="form-control"name="kullanici_ad" id="first-name"value="<?php echo $kullanicicek['kullanici_ad']?>"type="text">
        </div>
        </div>
        <div class="form-group">
        <label class="col-sm-3 control-label">Soyadınız</label>
        <div class="col-sm-9">
        <input class="form-control" name="kullanici_soyad" id="first-name"value="<?php echo $kullanicicek['kullanici_soyad']?>" type="text">
        </div>
        </div>
    
        <div class="form-group">
        <label class="col-sm-3 control-label">Tel:Gsm</label>
        <div class="col-sm-9">
        <input class="form-control"id="Company-name"name="kullanici_gsm"value="<?php echo $kullanicicek['kullanici_gsm']?>"type="text">
        </div>
        </div>
            <!-- KUlLANICIYA İD gÖNDER -->
        <div class="form-group">
        <div  align="right" class="col-sm-12">
        <button class="update-btn"name="musteribilgiguncelle" id="login-update">Bilgileri Güncelle</button>  
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
           