<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>üye kayıt sayfası</title>

  <!-- Bootstrap -->
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- Animate.css -->
  <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body  class="login">
  <div>
 

    <div class="login_wrapper">
      <div class="animate form login_form">
        <section class="login_content">
         

          <form action="../../nedmin/netting/adminislem.php" method="POST">


            <h1>Üye Kayıt Formu </h1>
             <div>
              <input type="text" name="kullanici_ad" class="form-control" placeholder="Adınız girin" required="" />
            </div>
             <div>
              <input type="text" name="kullanici_soyad" class="form-control" placeholder="soyadınızı giriniz" required="" />
            </div>
             <div>
              <input type="text" name="kullanici_mail" class="form-control" placeholder="mail adresini girin" required="" />
            </div>
             <div>
              <input type="password" name="kullanici_passwordone" class="form-control" placeholder="şifrenizi girin" required="" />
            </div>
            
            <div>
              <input type="password" name="kullanici_passwordtwo" class="form-control" placeholder="şifre tekrar" required="" />
            </div>
           
            <div>
            <button style="width: 100%; background-color: #ff6a6a; color:white;" type="submit" name="uyekayıt" class="btn btn-default"> Kayıtol</button>
              
            </div>


            <div class="separator">
              <p class="change_link">

    
              </p>

              <div class="clearfix"></div>
              <br />

            
            </div>
          </form>



        </section>
      </div>

    </div>
  </div>
</body>
</html>
