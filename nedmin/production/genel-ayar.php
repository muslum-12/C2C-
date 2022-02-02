<?php 

include 'header.php'; 


?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Logo Ayar</h2>
            <ul class="nav navbar-right panel_toolbox">
              </li>
              <li class="dropdown">
               
              </li>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />

            <form action="../netting/islem.php" method="POST" enctype="multipart/form-data"  data-parsley-validate class="form-horizontal form-label-left">

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yüklü Logo<br><span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">

                    <?php 
                    if (strlen($ayarcek['ayar_logo'])>0) {?>

                    <img width="200"  src="../../<?php echo $ayarcek['ayar_logo']; ?>">

                    <?php } else {?>


                    <img width="200"  src="../../dimg/logo-yok.png">


                    <?php } ?>

                    
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Resim Seç<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="file" id="first-name"  name="ayar_logo"  class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <input type="hidden" name="eski_yol" value="<?php echo $ayarcek['ayar_logo']; ?>">

                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="submit" name="logoduzenle" class="btn btn-primary">Güncelle</button>
                </div>

              </form>

              <hr>

          </div>
        </div>
      </div>
    </div>
</div>
</div>
<!-- /page content -->

<?php include 'footer.php'; ?>
