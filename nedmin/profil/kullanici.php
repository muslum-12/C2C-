

<?php
ob_start();
session_start();

include 'baglan.php';
include '../production/fonksiyon.php';


// MÜŞTERİ KAYDET KODLARI
if (isset($_POST['musterikaydet'])) {
		$kullanici_ad=htmlspecialchars(trim($_POST['kullanici_ad'])); 
	$kullanici_soyad=htmlspecialchars(trim($_POST['kullanici_soyad'])); 

	$kullanici_mail=htmlspecialchars(trim($_POST['kullanici_mail'])); 
    $kullanici_passwordone=htmlspecialchars(trim($_POST['kullanici_passwordone'])); 
    $kullanici_passwordtwo=htmlspecialchars(trim($_POST['kullanici_passwordtwo'])); 
	if ($kullanici_passwordone==$kullanici_passwordtwo) {
		//echo "Şifreler Eşit";
		//exit;
     if (strlen($kullanici_passwordone)>=6) {
        //echo " Altıdan veya Daha Büyük";
		
		// Başlangıç
	$kullanicisor=$db->prepare("select * from kullanici where kullanici_mail=:mail");
	$kullanicisor->execute(array(
	 'mail' => $kullanici_mail
	));
	$say=$kullanicisor->rowCount();
	if ($say==0) {
				//md5 fonksiyonu şifreyi md5 şifreli hale getirir.
	$password=md5($kullanici_passwordone);
	$kullanici_yetki=1;
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
	header("Location:../../login?durum=kayıtok");
			//Header("Location:../production/genel-ayarlar.php?durum=ok");
	} else {
	header("Location:../../register?durum=basarisiz");
			}

			} else {

      header("Location:../../register?durum=mukerrerkayit");
			}
		// Bitiş
		} else {
 header("Location:../../register?durum=eksiksifre");
		}
	} else {
header("Location:../../register?durum=farklisifre");
	}
	}

	// MÜŞTERİ GİRİŞ İÇİN KODLAR

if (isset($_POST['musterigiris'])) {	
	echo $kullanici_mail=htmlspecialchars($_POST['kullanici_mail']); 
	echo $kullanici_password=md5(htmlspecialchars($_POST['kullanici_password'])); 
	$kullanicisor=$db->prepare(" SELECT * from kullanici where kullanici_mail=:mail and kullanici_yetki=:yetki and kullanici_password=:password and kullanici_durum=:durum");
	$kullanicisor->execute(array(
		'mail' => $kullanici_mail,
		'yetki' => 1,
		'password' => $kullanici_password,
		'durum' => 1
	));
	$say=$kullanicisor->rowCount();
    if ($say==1) {
 $_SESSION['kullanici_mail']=$kullanici_mail;



    header("Location:../../index.php?durum=girisbasarili");
	exit;
	} else {
   header("Location:../../login?durum=hata");
    }
}



    // MÜŞTERİ BİLGİ GÜNCELLEME KODLARI 
if (isset($_POST['musteribilgiguncelle'])){
	$kullanici_id=$_POST['kullanici_id'];
	$kullaniciguncelle=$db->prepare("UPDATE kullanici SET 
	  kullanici_ad=:kullanici_ad,
	  kullanici_soyad=:kullanici_soyad,
	  kullanici_gsm=:kullanici_gsm
WHERE kullanici_id={$_POST['kullanici_id']}");

  $update=$kullaniciguncelle->execute(array(
     'kullanici_ad'=>htmlspecialchars($_POST['kullanici_ad']),
     'kullanici_soyad'=>htmlspecialchars($_POST['kullanici_soyad']),
     'kullanici_gsm'=>htmlspecialchars($_POST['kullanici_gsm'])
     ));
    
    if ($update)
          {
	      Header("location:../../hesabim?durum=ok");
          } else { 
	  	  Header("location:../../hesabim?durum=hata");          
          }
      }

      //MÜSTERİ ADRES GÜNCELLEME YÖNTEM KODLARI

if (isset($_POST['musteriadresguncelle'])){
	//$kullanici_id=$_POST['kullanici_id'];
	$kullaniciguncelle=$db->prepare("UPDATE kullanici SET 
	  kullanici_tip=:kullanici_tip,
	  kullanici_tc=:kullanici_tc,
	  kullanici_unvan=:kullanici_unvan,
	  kullanici_vdaire=:kullanici_vdaire,
	  kullanici_vno=:kullanici_vno,
	  kullanici_adres=:kullanici_adres,
	  kullanici_il=:kullanici_il,
	  kullanici_ilce=:kullanici_ilce


WHERE kullanici_id");

  $update=$kullaniciguncelle->execute(array(
     'kullanici_tip'=>htmlspecialchars($_POST['kullanici_tip']),
     'kullanici_tc'=>htmlspecialchars($_POST['kullanici_tc']),
     'kullanici_unvan'=>htmlspecialchars($_POST['kullanici_unvan']),
     'kullanici_vdaire'=>htmlspecialchars($_POST['kullanici_vdaire']),
     'kullanici_vno'=>htmlspecialchars($_POST['kullanici_vno']),
     'kullanici_adres'=>htmlspecialchars($_POST['kullanici_adres']),
     'kullanici_il'=>htmlspecialchars($_POST['kullanici_il']),
     'kullanici_ilce'=>htmlspecialchars($_POST['kullanici_ilce'])



     ));
    if ($update)
          {
	      header("location:../../adres-bilgileri?durum=ok");
          } else { 
	  	  header("location:../../adres-bilgileri?durum=hata");          
          }
      }  

      // KULLANICI TARAFINDAN ŞİFRE DEĞİŞTİRME VE GÜNCELLEME YÖNTEMİ-- 
if (isset($_POST['musterisifreguncelle'])) {

	$kullanici_eskipassword=trim($_POST['kullanici_eskipassword']); 
    $kullanici_passwordone=trim($_POST['kullanici_passwordone']); 
	$kullanici_passwordtwo=trim($_POST['kullanici_passwordtwo']);

	$kullanici_password=md5($kullanici_eskipassword);


	$kullanicisor=$db->prepare("SELECT * from kullanici where kullanici_password=:password");
	$kullanicisor->execute(array(
		'password' => $kullanici_password
	));
		//dönen satır sayısını belirtir
	$say=$kullanicisor->rowCount();
   if ($say==0) {

		header("Location:../../sifre-guncelle?durum=eskisifrehata");
		exit;

	} else {
//eski şifre doğruysa başla
if ($kullanici_passwordone==$kullanici_passwordtwo) {
if (strlen($kullanici_passwordone)>=6) {
	$sifre=md5($kullanici_passwordone);

				$kullanicikaydet=$db->prepare("UPDATE kullanici SET
					kullanici_password=:kullanici_password
					WHERE kullanici_id={$_POST['kullanici_id']}");
                    $update=$kullanicikaydet->execute(array(
					'kullanici_password' => $sifre
				));

				if ($update) {
	header("Location:../../sifre-guncelle?durum=ok");
	//Header("Location:../production/genel-ayarlar.php?durum=ok");
		} else {

		header("Location:../../sifre-guncelle?durum=hata");
			  }
		// Bitiş

			} else {

				header("Location:../../sifre-guncelle?durum=eksiksifre");
        	}

		} else {

			header("Location:../../sifre-guncelle?durum=sifreleruyusmuyor");

             }
           }
       }


if (isset($_POST['musterimagazabasvuru'])){
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

WHERE kullanici_id=kullanici_id");
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
     'kullanici_magaza'=>1
        ));
    if ($update)
          {
	      header("location:../../magaza-basvuru?durum=ok");
          } else { 
	  	  header("location:../../magaza-basvuru?durum=hata");          
          }
      }  


      










?>



















