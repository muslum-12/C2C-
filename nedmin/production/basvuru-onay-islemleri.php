<?php 

include 'header.php'; 


$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_id=:id");
$kullanicisor->execute(array(
  'id' => $_GET['kullanici_id']
  ));

$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);

?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Başvuru Onay İşlemleri<small>,

         

            </small></h2>
           
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />

            <!-- / => en kök dizine çık ... ../ bir üst dizine çık -->
            <form action="../netting/adminislem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

          

            <?php 

            $zaman=explode(" ",$kullanicicek['kullanici_zaman']);

             ?>
               <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mail <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name"  disabled="" value="<?php echo $kullanicicek['kullanici_mail'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

             <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kayıt Tarihi <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="" id="first-name" name="kullanici_tc" disabled="" value="<?php echo $zaman[0]; ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kayıt Saati <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="time" id="first-name" name="kullanici_zaman" disabled="" value="<?php echo $zaman[1]; ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

      <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Üye İşyeri Tip <span class="required">*</span>
                </label>
                <div id="kullanici_tip"class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" disabled="" name="kullanici_tip" value="<?php echo $kullanicicek['kullanici_tip'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
 <div id="kurumsal">
          <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Firma Ünvanı <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="kullanici_unvan" value="<?php echo $kullanicicek['kullanici_unvan'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
               <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Vergi Dairesi <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="kullanici_vdaire" value="<?php echo $kullanicicek['kullanici_vdaire'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
                        </div> 
                <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">V.No<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="kullanici_vno" value="<?php echo $kullanicicek['kullanici_vno'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

   
          <div id="tc">
             <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tc <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="kullanici_tc" value="<?php echo $kullanicicek['kullanici_tc'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
           </div>

                 <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Banka<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="kullanici_banka" value="<?php echo $kullanicicek['kullanici_banka'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
      <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">İban No<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="kullanici_iban" value="<?php echo $kullanicicek['kullanici_iban'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

       <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ad  <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="kullanici_ad" value="<?php echo $kullanicicek['kullanici_ad'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Soyad <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="kullanici_soyad" value="<?php echo $kullanicicek['kullanici_soyad'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div> 
         <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Gsm<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="kullanici_gsm" value="<?php echo $kullanicicek['kullanici_gsm'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div> 
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Adres <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="kullanici_adres"  value="<?php echo $kullanicicek['kullanici_adres'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>


              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">İl<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="kullanici_il" value="<?php echo $kullanicicek['kullanici_il'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">İlçe <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="kullanici_ilce"value="<?php echo $kullanicicek['kullanici_ilce'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kullanıcı Durum<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                 <select id="heard" class="form-control" name="kullanici_durum" required>
                <option value="1" <?php echo $kullanicicek['kullanici_durum'] == '1' ? 'selected=""' : ''; ?>>Aktif</option>

           <option value="0" <?php if ($kullanicicek['kullanici_durum']==0) { echo 'selected=""'; } ?>>Pasif</option>
         
            </select>
               </div>
             </div>
          <input type="hidden" name="kullanici_id" value="<?php echo $_GET['kullanici_id'] ?>"> 
           <div class="ln_solid"></div>
             <div class="form-group">
              <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" name="magazaonaykayit" class="btn btn-success">Başvuruyu Onayla</button>

     <a onclick="return confirm('Mağaza Başvurusunu İptal Etmek İstiyormusunuz')"class="btn btn-danger"href="../netting/adminislem.php?magazaonay=red&kullanici_id=<?php echo $kullanicicek['kullanici_id'];?>">İşlemi İptal Et </button></a>

              </div>
            </div>
          </form>



        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- /page content -->

<?php include 'footer.php'; ?>
                      
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