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
       
        <div class="settings-page-area bg-secondary section-space-bottom">
        <div class="container">
        <div class="row settings-wrapper">  
        <?php require_once 'hesap-sidebar.php'?>
         <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12"> 


 <form action="nedmin/netting/kullanici.php"method="POST" class="form-horizontal" id="personal-info-form">
 <div class="settings-details tab-content">
        <div class="tab-pane fade active in" id="Personal">
        <h2 class="title-section">Yeni Adres Ekle</h2>
        <div class="personal-info inner-page-padding"> 
        


    <!-- KUlLANICIYA İD gÖNDER -->




<div id="tc">
    <div class="form-group">
        <label class="col-sm-3 control-label">Adres Başlık</label>
        <div class="col-sm-9">
        <input class="form-control" name="adres_baslik" id="Company-name"value=""type="text">
        </div>
        </div>
<div class="form-group">
        <label class="col-sm-3 control-label">Açık Adres</label>
        <div class="col-sm-9">
        <input class="form-control" name="adres" id="Company-name"value=""type="text">
        </div>
        </div>
         </div>
 <div id="kurumsal">    
<div class="form-group">
        <label class="col-sm-3 control-label">İl</label>
        <div class="col-sm-9">
        <input class="form-control" name="il" id="Company-name"value=""type="text">
        </div>
        </div>
<div class="form-group">
        <label class="col-sm-3 control-label">İlçe</label>
        <div class="col-sm-9">
        <input class="form-control" name="ilce" id="Company-name"value=""type="text">
        </div>
        </div>
        </div>

 



        <div class="form-group">
        <div  align="right" class="col-sm-12">
        <button class="update-btn"name="musteriadresekle" id="login-update">Bilgileri Kaydet</button>  
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
           