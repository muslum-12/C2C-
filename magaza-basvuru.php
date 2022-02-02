        <?php 
           require_once'header.php';
           //islemkontrol();
         
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

    
 <div class="settings-details tab-content">
        <div class="tab-pane fade active in" id="Personal">
        <h2 class="title-section">Mağaza Başvurusu</h2>
        <div class="personal-info inner-page-padding">


<?php 
if ($kullanicicek['kullanici_magaza']==0) {?>
  <p>*Başvuru İşlemini Gerçekleştirmek İçin Lütfe Tüm Bilgileri Eksiksiz Doldurunuz. Aksi Durumda İşlemleriniz Gerçkleşmiyecektir.ELÇİ EMLAK </p><hr>
  <form action="nedmin/netting/kullanici.php"method="POST" class="form-horizontal" id="personal-info-form">


    <div class="form-group">
        <label class="col-sm-3 control-label">Kayıtlı Mail-Adresi(Değiştiremezsiniz)</label>
        <div class="col-sm-9">
        <input class="form-control" disabled="" id="first-name"name="kullanici_mail"value="<?php echo $kullanicicek['kullanici_mail']?>"type="text">
        </div>
        </div>
          <div class="form-group">
        <label class="col-sm-3 control-label">Banka Adı</label>
        <div class="col-sm-9">
        <input class="form-control"name="kullanici_banka" id="first-name"value="<?php echo $kullanicicek['kullanici_banka']?>"type="text">
        </div>
        </div>

          <div class="form-group">
        <label class="col-sm-3 control-label">Bankaya Ait İban Numarası</label>
        <div class="col-sm-9">
        <input class="form-control"name="kullanici_iban" id="first-name"value="<?php echo $kullanicicek['kullanici_iban']?>"type="text">
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

        

    <div class="form-group">
            <label class="col-sm-3 control-label">Bireysel/Kurumsal</label>
            <div class="col-sm-9">
            <div class="custom-select">
            <select name="kullanici_tip" id="kullanici_tip" class='select2'>
            <option
            <?php 
           if ($kullanicicek['kullanici_tip']=="PERSONAL"){
                echo "selected";
            }
            ?>
            value="PERSONAL">Bireysel</option>
            <option
             <?php 
            if ($kullanicicek['kullanici_tip']=="PRIVATE_COMPANY"){
                echo "selected";
            }
            ?> 
              value="PRIVATE_COMPANY">Kurumsal</option>
    </select>
    </div>
    </div>
    </div>
    <!-- KUlLANICIYA İD gÖNDER -->
<div id="tc">
<div class="form-group">
        <label class="col-sm-3 control-label">T.C</label>
        <div class="col-sm-9">
        <input class="form-control" name="kullanici_tc" id="Company-name"value="<?php echo $kullanicicek['kullanici_tc']?>"type="text">
        </div>
        </div>
         </div>

 <div id="kurumsal">    
<div class="form-group">
        <label class="col-sm-3 control-label">Firma Ünvanı</label>
        <div class="col-sm-9">
        <input class="form-control" name="kullanici_unvan" id="Company-name"value="<?php echo $kullanicicek['kullanici_unvan']?>"type="text">
        </div>
        </div>

<div class="form-group">
        <label class="col-sm-3 control-label">Firma V.Dairesi</label>
        <div class="col-sm-9">
        <input class="form-control" name="kullanici_vdaire" id="Company-name"value="<?php echo $kullanicicek['kullanici_vdaire']?>"type="text">
        </div>
        </div>

<div class="form-group">
        <label class="col-sm-3 control-label">Firma V.Numarası</label>
        <div class="col-sm-9">
        <input class="form-control" name="kullanici_vno" id="Company-name"value="<?php echo $kullanicicek['kullanici_vno']?>"type="text">
        </div>
        </div> 
        </div>


<div class="form-group">
        <label class="col-sm-3 control-label">Açık Adres</label>
        <div class="col-sm-9">
        <input class="form-control"required=""name="kullanici_adres" id="Company-name"value="<?php echo $kullanicicek['kullanici_adres']?>"type="text">
        </div>
        </div> 

<div class="form-group">
        <label class="col-sm-3 control-label">İl</label>
        <div class="col-sm-9">
        <input class="form-control"required=""name="kullanici_il" id="Company-name"value="<?php echo $kullanicicek['kullanici_il']?>"type="text">
        </div>
        </div>  

<div class="form-group">
        <label class="col-sm-3 control-label">İlçe</label>
        <div class="col-sm-9">
        <input class="form-control"required=""name="kullanici_ilce" id="Company-name"value="<?php echo $kullanicicek['kullanici_ilce']?>"type="text">
        </div>
        </div>

<div class="form-group">
        <label class="col-sm-3 control-label">Onay</label>
        <div class="checkbox">
           <div class="col-sm-9">
          <label>
          <input type="checkbox"required="" value="" name="">Kullanım Şartlarını Kabul Ediyorum</label>
          </div>
        </div>





<div class="form-group">
        <div  align="right" class="col-sm-12">
        <button class="update-btn"name="musterimagazabasvuru" id="login-update">Başvuruyu Tamamla</button>  
        </div>
       </form> 
<?php } else if ($kullanicicek['kullanici_magaza']==1) {?>
<div class="alert alert-success">
  <strong>Bilgi!</strong>Başvurunuz Onay Aşamasında!
    <p>NOT:Başvurular  24 Saat Dilimi İçerisinde İncelenir Ve Sonuçlanır.</p>
     </div>
       

<?php } else if ($kullanicicek['kullanici_magaza']==2) {?>



<div class="alert alert-success">
  <strong>Bilgi!</strong>Mağaza İşlemleriniz Onaylandı 
  
  <p>Mağaza Yönetim Panelinden İşlemleri Gerçekleştirebilirsiniz.</p>
   </div>
    <?php } ?>

        </div> 
        </div>                                                                       
        </div>
      </form></div></div></div></div></div></div></div>
  


        </div>  
        </div>  
        </div>  
        </div> 
        <?php require_once'footer.php';?>
            <!-- Footer Area Start Here -->
                      
          <script type="text/javascript">
        $(document).ready(function() {



            $("#kullanici_tip").change(function() {
                
        var tip=$("#kullanici_tip").val();
            if (tip=="PERSONAL") {
              $("#kurumsal").hide();
              $('#tc').show();

              }else if (tip=="PRIVATE_COMPANY") {
                $('#kurumsal').show();
                $('#tc').hide();
              }

            }).change();

          });  

          </script>  
           

