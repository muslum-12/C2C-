        <?php 
           require_once'header.php';
        //islemkontrol();
$adressor=$db->prepare("SELECT * FROM adres order by adres_id ASC");
$adressor->execute();
    
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

          
           
 <div class="settings-details tab-content">
        <div class="tab-pane fade active in" id="Personal">
        <h2 class="title-section">Adresleriniz</h2>
        <div class="personal-info inner-page-padding"> 

<a href="adres-bilgileri-ekle.php"><button class="btn btn-primary btn-xs">Yeni Adres Ekle </button></a>
<table class="table table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Sıra No</th>
       <th scope="col">Adres Başlığı</th>
       <th scope="col">Açık Adres</th>
      <th scope="col">İl</th>
     <th scope="col">İlçe</th>
    <th scope="col"></th>
    <th scope="col"></th>



    </tr>
  </thead>
  <tbody>


<?php 


$say=0;

while($adrescek=$adressor->fetch(PDO::FETCH_ASSOC)) { $say++?>
  


 <tr>
      <th scope="row"><?php echo $say ?></th>
      <td><?php echo $adrescek['adres_baslik'] ?></td>
       <td><?php echo $adrescek['adres'] ?></td>
       <td><?php echo $adrescek['il'] ?></td>
      <td><?php echo $adrescek['ilce'] ?></td>


   



     <td>   <a onclick="return confirm('Bu Adresi Silmek istiyormusunuz? \n İşlem Geri Alınamaz..')"href="nedmin/netting/kullanici.php?adressil=ok&adres_id=<?php echo $adrescek['adres_id'] ?>"><button class="btn btn-danger btn-xs">Sil </button></a></td>
</tr>
 <?php } ?>
    </tbody>

</table>
 </div> 
        </div>                                                                       
        </div>
        </div>  
        </div>  
        </div>  
        </div> 
      </div>
        <?php require_once'footer.php';?>
 