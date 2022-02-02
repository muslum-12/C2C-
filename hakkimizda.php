<?php require_once 'header.php'?>

 <?php require_once 'search.php'; ?> 

<?php 
$hakkimizdasor=$db->prepare("SELECT * FROM hakkimizda where hakkimizda_id=:id");
$hakkimizdasor->execute(array(
  'id' => 0
  ));
$hakkimizdacek=$hakkimizdasor->fetch(PDO::FETCH_ASSOC);

 ?>









         <!-- Header Area End Here -->
            <!-- Main Banner 1 Area Start Here -->
   <?php require_once 'search.php' ?>
            <!-- Main Banner 1 Area End Here --> 
            <!-- Inner Page Banner Area Start Here -->
            <div class="pagination-area bg-secondary">
                <div class="container">
                    <div class="pagination-wrapper">
                       
                    </div>
                </div>  
            </div> 
            <!-- Inner Page Banner Area End Here -->          
            <!-- About Page Start Here -->
            <div class="about-page-area bg-secondary section-space-bottom">
                <div class="container">
                    <h2 class="title-section">Hakkımızda</h2>
                    <div class="inner-page-details inner-page-padding">



                        <h3><?php echo $hakkimizdacek['hakkimizda_baslik'] ?></h3>
                        <p><?php echo $hakkimizdacek['hakkimizda_icerik']; ?></p>
                         <h3>Vizyonumuz</h3>
                           <p><?php echo $hakkimizdacek['hakkimizda_vizyon']; ?></p>

                        <h3>Misyonumuz</h3>
                           <p><?php echo $hakkimizdacek['hakkimizda_misyon']; ?></p>




                  
                    </div>  
                </div>  
            </div> 
            <!-- About Page End Here -->
            <!-- Footer Area Start Here -->
       
       <?php require_once 'footer.php' ?>
