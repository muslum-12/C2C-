<?php
ob_start();
session_start();
//islemkontrol();
include 'baglan.php';
include'../production/fonksiyon.php';

//Logo Düzenle

if (isset($_POST['logoduzenle'])) {

	if ($_FILES['ayar_logo']['size']>1048576) {
		
		echo "Bu dosya boyutu çok büyük";

		Header("Location:../production/genel-ayar.php?durum=dosyabuyuk");

	    }
$izinli_uzantilar=array('jpg','png');
//echo $_FILES['ayar_logo']["name"];
$ext=strtolower(substr($_FILES['ayar_logo']["name"],strpos($_FILES['ayar_logo']["name"],'.')+1));
if (in_array($ext, $izinli_uzantilar) === false) {
		echo "Bu uzantı kabul edilmiyor";
		Header("Location:../production/genel-ayar.php?durum=formathata");
		exit;
    	}

   $uploads_dir = '../../dimg';
    @$tmp_name = $_FILES['ayar_logo']["tmp_name"];
	@$name = $_FILES['ayar_logo']["name"];

	$benzersizsayi4=rand(20000,32000);
	$refimgyol=substr($uploads_dir, 6)."/".$benzersizsayi4.$name;

	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4$name");
     $duzenle=$db->prepare("UPDATE ayar SET
		ayar_logo=:logo
		WHERE ayar_id=0");
	$update=$duzenle->execute(array(
		'logo' => $refimgyol
	));
if ($update) {
	$resimsilunlink=$_POST['eski_yol'];
		unlink("../../$resimsilunlink");
		Header("Location:../production/genel-ayar.php?durum=ok");
	} else {
		Header("Location:../production/genel-ayar.php?durum=no");
	}
}

// Admin Giriş Bölümü 

if (isset($_POST['admingiris'])) {

	$kullanici_mail=$_POST['kullanici_mail'];
	$kullanici_password=md5($_POST['kullanici_password']);

	$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail and kullanici_password=:password and kullanici_yetki=:yetki");
	$kullanicisor->execute(array(
		'mail' => $kullanici_mail,
		'password' => $kullanici_password,
		'yetki' => 5
	));

	echo $say=$kullanicisor->rowCount();

	if ($say==1) {

		$_SESSION['kullanici_mail']=$kullanici_mail;
		header("Location:../production/index.php");
		exit;



	} else {

		header("Location:../production/login.php?durum=no");
		exit;
	}
	

}

















if (isset($_POST['uyekayıt'])) {

  $kullanici_mail=htmlspecialchars(trim($_POST['kullanici_mail'])); 
    $kullanici_passwordone=htmlspecialchars(trim($_POST['kullanici_passwordone'])); 
    $kullanici_passwordtwo=htmlspecialchars(trim($_POST['kullanici_passwordtwo'])); 
  if ($kullanici_passwordone==$kullanici_passwordtwo) {
    //echo "Şifreler Eşit";
    //exit;
     if (strlen($kullanici_passwordone)>=6) {
        //echo " Altıdan veya Daha Büyük";
    
    // Başlangıç
  $kullanicisor=$db->prepare("select * from kullanici where kullanici_mail=:mail DESC  limit 6");
  $kullanicisor->execute(array(
   'mail' => $kullanici_mail
  ));
  $say=$kullanicisor->rowCount();
  if ($say==0) {
        //md5 fonksiyonu şifreyi md5 şifreli hale getirir.
  $password=md5($kullanici_passwordone);
  $kullanici_yetki=5;
      //Kullanıcı kayıt işlemi yapılıyor...
  $kullanicikaydet=$db->prepare("INSERT INTO kullanici SET
    kullanici_ad=:kullanici_ad,
    kullanici_soyad=:kullanici_soyad,
    kullanici_mail=:kullanici_mail,
    kullanici_password=:kullanici_password,
    kullanici_yetki=:kullanici_yetki
    ");
  $insert=$kullanicikaydet->execute(array(
     'kullanici_ad' =>htmlspecialchars($_POST['kullanici_ad']),
     'kullanici_soyad' =>htmlspecialchars($_POST['kullanici_soyad']),
     'kullanici_mail' => $kullanici_mail,
     'kullanici_password' =>$password,
     'kullanici_yetki' => $kullanici_yetki
  ));

  if ($insert) {
  header("Location:../production/login.php?durum=kayıtok");
  } else {
  header("Location:../production/register?durum=basarisiz");
      }

      } else {

      header("Location:../production/register?durum=mukerrerkayit");
      }
    // Bitiş
    } else {
 header("Location:../production/register?durum=eksiksifre");
    }
  } else {
header("Location:../production/register?durum=farklisifre");
  }
  }















// Admin Kullanıcı Düzenle

if (isset($_POST['adminkullaniciduzenle'])){
echo $kullanici_id=$_POST['kullanici_id'];
  $kullaniciguncelle=$db->prepare("UPDATE kullanici SET 
      kullanici_ad=:kullanici_ad,
    kullanici_soyad=:kullanici_soyad,
    kullanici_gsm=:kullanici_gsm,
    kullanici_tc=:kullanici_tc,
    kullanici_adres=:kullanici_adres,
    kullanici_il=:kullanici_il,
    kullanici_ilce=:kullanici_ilce,
    kullanici_durum=:kullanici_durum
WHERE kullanici_id={$_POST['kullanici_id']}");
  $update=$kullaniciguncelle->execute(array(
     'kullanici_ad'=>htmlspecialchars($_POST['kullanici_ad']),
     'kullanici_soyad'=>htmlspecialchars($_POST['kullanici_soyad']),
     'kullanici_gsm'=>htmlspecialchars($_POST['kullanici_gsm']),
     'kullanici_tc'=>htmlspecialchars($_POST['kullanici_tc']),
     'kullanici_adres'=>htmlspecialchars($_POST['kullanici_adres']),
     'kullanici_il'=>htmlspecialchars($_POST['kullanici_il']),
     'kullanici_ilce'=>htmlspecialchars($_POST['kullanici_ilce']),
     'kullanici_durum'=>htmlspecialchars($_POST['kullanici_durum'])
  ));
    if ($update)
          {
  
    Header("Location:../production/kullanici-duzenle.php?durum=ok&kullanici_id=$kullanici_id&durum=ok");

          } else { 
        Header("Location:../production//kullanici-duzenle.php?durum=no&kullanici_id=$kullanici_id&durum=ok");
          }
      }  

//MAĞAZA İPTAL İŞLEMİ //
    if ($_GET['magazaonay']=="red"){
		$kullaniciguncelle=$db->prepare("UPDATE kullanici SET 
      	kullanici_magaza=:kullanici_magaza
		WHERE kullanici_id={$_GET['kullanici_id']}");
  		$update=$kullaniciguncelle->execute(array(
  	 	'kullanici_magaza'=>0
  		));
    if ($update)
          {
        Header("Location:../production/kullanici-duzenle.php?durum=ok");
          } else { 
		Header("Location:../production/kullanici-duzenle.php?durum=no");
          }
      }  

// Mağaza Onay Red İşlemi

if (isset($_POST['magazaonaykayit'])){
	//$kullanici_id=$_POST['kullanici_id'];
	$kullaniciguncelle=$db->prepare("UPDATE kullanici SET 
      kullanici_ad=:kullanici_ad,
	  kullanici_soyad=:kullanici_soyad,
	  kullanici_gsm=:kullanici_gsm,
	  kullanici_banka=:kullanici_banka,
	  kullanici_iban=:kullanici_iban,
	  kullanici_tc=:kullanici_tc,
	  kullanici_unvan=:kullanici_unvan,
	  kullanici_vdaire=:kullanici_vdaire,
	  kullanici_vno=:kullanici_vno,
	  kullanici_adres=:kullanici_adres,
	  kullanici_il=:kullanici_il,
	  kullanici_ilce=:kullanici_ilce,
	  kullanici_magaza=:kullanici_magaza
WHERE kullanici_id={$_POST['kullanici_id']}");
$update=$kullaniciguncelle->execute(array(
  	 'kullanici_ad'=>htmlspecialchars($_POST['kullanici_ad']),
     'kullanici_soyad'=>htmlspecialchars($_POST['kullanici_soyad']),
     'kullanici_gsm'=>htmlspecialchars($_POST['kullanici_gsm']),
     'kullanici_banka'=>htmlspecialchars($_POST['kullanici_banka']),
     'kullanici_iban'=>htmlspecialchars($_POST['kullanici_iban']),
     'kullanici_tc'=>htmlspecialchars($_POST['kullanici_tc']),
     'kullanici_unvan'=>htmlspecialchars($_POST['kullanici_unvan']),
     'kullanici_vdaire'=>htmlspecialchars($_POST['kullanici_vdaire']),
     'kullanici_vno'=>htmlspecialchars($_POST['kullanici_vno']),
     'kullanici_adres'=>htmlspecialchars($_POST['kullanici_adres']),
     'kullanici_il'=>htmlspecialchars($_POST['kullanici_il']),
     'kullanici_ilce'=>htmlspecialchars($_POST['kullanici_ilce']),
     'kullanici_magaza'=>2
        ));
   
    if ($update)
          {
        Header("Location:../production/magazalar.php?durum=ok");

          } else { 
		Header("Location:../production/magazalar.php?durum=no");

          }
        }



/// Profil Resmi Değişme kodu////

if (isset($_POST['kullaniciresimguncelle'])) {

  if ($_FILES['kullanici_magazafoto']['size']>1048576) {
		echo "Bu dosya boyutu çok büyük";
          Header("Location:../../profil-resim-guncelle.php?durum=dosyabuyuk");
   }

     $izinli_uzantilar=array('jpg','png');

       $ext=strtolower(substr($_FILES['kullanici_magazafoto']["name"],strpos($_FILES['kullanici_magazafoto']["name"],'.')+1));
         if(in_array($ext, $izinli_uzantilar) === false) {
		   echo "Bu uzantı kabul edilmiyor";

		     Header("Location:../../profil-resim-guncelle.php?durum=formathata");

      	       exit;
   }

    @$tmp_name = $_FILES['kullanici_magazafoto']["tmp_name"];
	@$name = seo ($_FILES['kullanici_magazafoto']["name"]);


              include('SimpleImage.php');
              $image=new SimpleImage();
              $image->load($tmp_name);
              $image->resize(128,128);
              $image->save($tmp_name);

    $uploads_dir = '../../dimg/userphoto';

	$benzersizsayi4=uniqid();
	$refimgyol=substr($uploads_dir, 6)."/".$benzersizsayi4.".".$ext;

	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4.$ext");

     $duzenle=$db->prepare("UPDATE kullanici SET
		kullanici_magazafoto=:kullanici_magazafoto
		WHERE kullanici_id={$_SESSION['userkullanici_id']}");

	$update=$duzenle->execute(array(
		'kullanici_magazafoto' => $refimgyol
	));

if ($update) {
	$resimsilunlink=$_POST['eski_yol'];
		unlink("../../$resimsilunlink");
		Header("Location:../../profil-resim-guncelle.php?durum=ok");
	} else {
		Header("Location:../../profil-resim-guncelle.php?durum=hata");
	}
}



























	


//Mağaza Ürün  Ekleme İşlemleri

if (isset($_POST['magazaurunekle'])) {
  if ($_FILES['urunfoto_resimyol']['size']>1048576) {
		echo "Bu dosya boyutu çok büyük";
          Header("Location:../../urun-ekle.php?durum=dosyabuyuk");
}
$izinli_uzantilar=array('jpg','png');

$ext=strtolower(substr($_FILES['urunfoto_resimyol']["name"],strpos($_FILES['urunfoto_resimyol']["name"],'.')+1));
if (in_array($ext, $izinli_uzantilar) === false) {
		echo "Bu uzantı kabul edilmiyor";
		Header("Location:../../urun-ekle.php?durum=formathata");
      	exit;
	    }
    @$tmp_name = $_FILES['urunfoto_resimyol']["tmp_name"];
	@$name = $_FILES['urunfoto_resimyol']["name"];

// image resize İşlemleri İçin  Dahil Edilcek kodlar(Simplelmage/klosörü)//
	    include('SimpleImage.php');
	    $image=new SimpleImage();
	    $image->load($tmp_name);
	    $image->resize(829,422);
	    $image->save($tmp_name);

$uploads_dir = '../../dimg/urunfoto';

	$uniq=uniqid();
	$refimgyol=substr($uploads_dir, 6)."/".$uniq.".".$ext;
	@move_uploaded_file($tmp_name, "$uploads_dir/$uniq.$ext");
	$duzenle=$db->prepare("INSERT INTO urun SET
	 kategori_id=:kategori_id,
	 kullanici_id=:kullanici_id,
     urun_ad=:urun_ad,
     urun_detay=:urun_detay,
     urun_fiyat=:urun_fiyat,
     urunfoto_resimyol=:urunfoto_resimyol"
     );

	$update=$duzenle->execute(array(

   'kategori_id'=>htmlspecialchars($_POST['kategori_id']),
   'kullanici_id'=>htmlspecialchars($_SESSION['userkullanici_id']),
   'urun_ad'=>htmlspecialchars($_POST['urun_ad']),
   'urun_detay'=>htmlspecialchars($_POST['urun_detay']),
   'urun_fiyat'=>htmlspecialchars($_POST['urun_fiyat']),
   'urunfoto_resimyol' => $refimgyol
	));
	if ($update) {

		Header("Location:../../urunlerim.php?durum=ok");

	} else {

		Header("Location:../../urun-ekle.php?durum=hata");
	}

}





// mağza Ürün Düzenle

	
if (isset($_POST['magazaurunduzenle'])) {
 if ($_FILES['urunfoto_resimyol']['size']>0) {
  if ($_FILES['urunfoto_resimyol']['size']>1048576) {
        echo "Bu dosya boyutu çok büyük";
          Header("Location:../../urun-duzenle.php?durum=dosyabuyuk");
}
$izinli_uzantilar=array('jpg','png');

$ext=strtolower(substr($_FILES['urunfoto_resimyol']["name"],strpos($_FILES['urunfoto_resimyol']["name"],'.')+1));
if (in_array($ext, $izinli_uzantilar) === false) {
        echo "Bu uzantı kabul edilmiyor";
        Header("Location:../../urun-duzenle.php?durum=formathata");
          exit;
        }
    @$tmp_name = $_FILES['urunfoto_resimyol']["tmp_name"];
    @$name = $_FILES['urunfoto_resimyol']["name"];

// image resize İşlemleri İçin  Dahil Edilcek kodlar(Simplelmage/klosörü)//
        include('SimpleImage.php');
        $image=new SimpleImage();
        $image->load($tmp_name);
        $image->resize(829,422);
        $image->save($tmp_name);

$uploads_dir = '../../dimg/urunfoto';

    $uniq=uniqid();
    $refimgyol=substr($uploads_dir, 6)."/".$uniq.".".$ext;
    @move_uploaded_file($tmp_name, "$uploads_dir/$uniq.$ext");
    


    $duzenle=$db->prepare("UPDATE  urun SET
     kategori_id=:kategori_id,
     urun_ad=:urun_ad,
     urun_detay=:urun_detay,
     urun_fiyat=:urun_fiyat,
     urunfoto_resimyol=:urunfoto_resimyol
     WHERE urun_id={$_POST['urun_id']}");

    
    $update=$duzenle->execute(array(
   'kategori_id'=>htmlspecialchars($_POST['kategori_id']),
   'urun_ad'=>htmlspecialchars($_POST['urun_ad']),
   'urun_detay'=>htmlspecialchars($_POST['urun_detay']),
   'urun_fiyat'=>htmlspecialchars($_POST['urun_fiyat']),
   'urunfoto_resimyol' => $refimgyol
    ));

    $urun_id=$_POST['urun_id'];

    if ($update) {

        $resimsilunlink=$_POST['eski_yol'];
        unlink("../../$resimsilunlink");

        Header("Location:../../urun-duzenle.php?durum=ok&urun_id=$urun_id");
    } else {
        Header("Location:../../urun-duzenle.php?durum=hata&urun_id=$urun_id");
    }
// fotoğraf yoksa yapılan işlemler
 } else {   $duzenle=$db->prepare("UPDATE  urun SET
     kategori_id=:kategori_id,
     urun_ad=:urun_ad,
     urun_detay=:urun_detay,
     urun_fiyat=:urun_fiyat
     WHERE urun_id={$_POST['urun_id']}");

    
    $update=$duzenle->execute(array(
   'kategori_id'=>htmlspecialchars($_POST['kategori_id']),
   'urun_ad'=>htmlspecialchars($_POST['urun_ad']),
   'urun_detay'=>htmlspecialchars($_POST['urun_detay']),
   'urun_fiyat'=>htmlspecialchars($_POST['urun_fiyat'])
    ));

    $urun_id=$_POST['urun_id'];

    if ($update) {


        Header("Location:../../urun-duzenle.php?durum=ok&urun_id=$urun_id");
    } else {
        Header("Location:../../urun-duzenle.php?durum=hata&urun_id=$urun_id");
    }


       }
}


//ürün Silme İşlemi

if ($_GET['urunsil']=="ok") {	
	$sil=$db->prepare("DELETE from urun where urun_id=:urun_id");
	$kontrol=$sil->execute(array(
		'urun_id' => $_GET['urun_id']
	));

	if ($kontrol) {

		$resimsilunlink=$_GET['urunfoto_resimyol'];
		unlink("../../$resimsilunlink");

        Header("Location:../../urunlerim.php?durum=ok");

	} else {

        Header("Location:../../urunlerim.php?durum=hata");
	}

}

// Kategori Düzlenle
if (isset($_POST['kategoriduzenle'])) {

	$kategori_id=$_POST['kategori_id'];
	$kategori_seourl=seo($_POST['kategori_ad']);

	
	$kaydet=$db->prepare("UPDATE kategori SET
		kategori_ad=:ad,
		kategori_durum=:kategori_durum,	
		kategori_seourl=:seourl,
	  kategori_onecikar=:kategori_onecikar,
    kategori_sira=:sira
		WHERE kategori_id={$_POST['kategori_id']}");
	$update=$kaydet->execute(array(
		'ad' =>htmlspecialchars($_POST['kategori_ad']) ,
		'kategori_durum' => htmlspecialchars($_POST['kategori_durum']),
		'seourl' => $kategori_seourl,
	  'kategori_onecikar' => htmlspecialchars($_POST['kategori_onecikar']),
    'sira' =>$_POST['kategori_sira']		
	));

	if ($update) {

		Header("Location:../production/kategori-duzenle.php?durum=ok&kategori_id=$kategori_id");

	} else {

		Header("Location:../production/kategori-duzenle.php?durum=no&kategori_id=$kategori_id");
	}

}



if (isset($_POST['mailayarkaydet'])) {
  
  $ayarkaydet=$db->prepare("UPDATE ayar SET
    ayar_smtphost=:smtphost,
    ayar_smtpuser=:smtpuser,
    ayar_smtppassword=:smtppassword,
    ayar_smtpport=:smtpport
    WHERE ayar_id=0");
  $update=$ayarkaydet->execute(array(
    'smtphost' => $_POST['ayar_smtphost'],
    'smtpuser' => $_POST['ayar_smtpuser'],
    'smtppassword' => $_POST['ayar_smtppassword'],
    'smtpport' => $_POST['ayar_smtpport']
  ));

  if ($update) {

    Header("Location:../production/mail-ayar.php?durum=ok");

  } else {

    Header("Location:../production/mail-ayar.php?durum=no");
  }

}
//menu düzenleme İşlemi 

if (isset($_POST['menuduzenle'])) {

  $menu_id=$_POST['menu_id'];

  $menu_seourl=seo($_POST['menu_ad']);

  
  $ayarkaydet=$db->prepare("UPDATE menu SET
    menu_ad=:menu_ad,
    menu_detay=:menu_detay,
    menu_url=:menu_url,
    menu_sira=:menu_sira,
    menu_seourl=:menu_seourl,
    menu_durum=:menu_durum
    WHERE menu_id={$_POST['menu_id']}");

  $update=$ayarkaydet->execute(array(
    'menu_ad' => $_POST['menu_ad'],
    'menu_detay' => $_POST['menu_detay'],
    'menu_url' => $_POST['menu_url'],
    'menu_sira' => $_POST['menu_sira'],
    'menu_seourl' => $menu_seourl,
    'menu_durum' => $_POST['menu_durum']
  ));


  if ($update) {

    Header("Location:../production/menu-duzenle.php?menu_id=$menu_id&durum=ok");

  } else {

    Header("Location:../production/menu-duzenle.php?menu_id=$menu_id&durum=no");
  }

}

// menü sil


if ($_GET['menusil']=="ok") {

  islemkontrol();

  $sil=$db->prepare("DELETE from menu where menu_id=:id");
  $kontrol=$sil->execute(array(
    'id' => $_GET['menu_id']
  ));


  if ($kontrol) {


    header("location:../production/menu.php?sil=ok");


  } else {

    header("location:../production/menu.php?sil=no");

  }


}



//menü  ekle


if (isset($_POST['menukaydet'])) {


  $menu_seourl=seo($_POST['menu_ad']);


  $ayarekle=$db->prepare("INSERT INTO menu SET
    menu_ad=:menu_ad,
    menu_detay=:menu_detay,
    menu_url=:menu_url,
    menu_sira=:menu_sira,
    menu_seourl=:menu_seourl,
    menu_durum=:menu_durum
    ");

  $insert=$ayarekle->execute(array(
    'menu_ad' => $_POST['menu_ad'],
    'menu_detay' => $_POST['menu_detay'],
    'menu_url' => $_POST['menu_url'],
    'menu_sira' => $_POST['menu_sira'],
    'menu_seourl' => $menu_seourl,
    'menu_durum' => $_POST['menu_durum']
  ));


  if ($insert) {

    Header("Location:../production/menu.php?durum=ok");

  } else {

    Header("Location:../production/menu.php?durum=no");
  }

}





































?>