
<?php

ob_start();
session_start();
error_reporting(0);
date_default_timezone_set('Europe/Istanbul');
//error_reporting(0); hataları Gizler  hatalarımızı Görmeyiz İlerde Açacaksın Müslüm..//
require_once'../nedmin/netting/baglan.php';
require_once'../nedmin/production/fonksiyon.php';


if (İsset($_POST['sifremiunuttum'])) {

$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail");
     $kullanicisor->execute(array(
      'mail'=>$_POST['kullanici_mail']
     ));

     $say=$kullanicisor->rowCount();

     if ($say==0) {

     header("location:../login.php?durum=kullaniciyok")
     exit;

     }else{
     

     	 $kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);
     	 $uretilensifre=uniqid();
     	 $sifrekaydet=md5($uretilensifre);

     	 // veritabanı kaydı
     	 $sifreguncelle=$db->prepare(" UPDATE kullanici SET kullanici_password=:$kullanici_password

     	 	WHERE kullanici_mail=:'$kullanici_mail'");

     	 $update=$sifreguncelle->execute(array(

         'kullanici_password'=>$sifrekaydet

     	 ));

     	 //veritabanı Bitir


//Sanal Değişkenler
// mail Gönderimi başlat
$from="muslumelci.9312@gmail.com";
$gonderici="Müslüm Elçi";
$host="smtp.gmail.com";
$pass="muslum19921992";
$konu="Test Mail PHP Mailer Kontrol";
$yenisifre="Yeni Şifreniz:".$uretilensifre;

require("class.phpmailer.php"); // PHPMailer dosyamizi çagiriyoruz
$mail = new PHPMailer(); // Sinifimizi $mail degiskenine atadik
$mail->IsSMTP(true);  // Mailimizin SMTP ile gönderilecegini belirtiyoruz


$mail->From     = $from;//"admin@localhost"; //Gönderen kisminda yer alacak e-mail adresi
$mail->Sender   = $from;//"admin@localhost";//Gönderen Mail adresi
//$mail->ReplyTo  = ($_POST["mailiniz"]);//"admin@localhost";//Tekrar gönderimdeki mail adersi
$mail->AddAttachment('resim.jpg')
$mail->AddReplyTo=($from);//"admin@localhost";//Tekrar gönderimdeki mail adersi
$mail->AddAddress($_POST['kullanici_mail']); // Mail gönderilecek adresleri ekliyoruz.
$mail->FromName = "muslumelci.9312@gmail.com";//"PHP Mailer";//gönderenin ismi
$mail->Host     = $host;//"localhost"; //SMTP server adresi
$mail->SMTPAuth = true; //SMTP server'a kullanici adi ile baglanilcagini belirtiyoruz
$mail->Port     = 587; //Natro SMPT Mail Portu
$mail->CharSet = 'UTF-8'; //Türkçe yazı karakterleri için CharSet  ayarını bu şekilde yapıyoruz.
$mail->Username = $from;//"admin@localhost"; //SMTP kullanici adi
$mail->Password = $pass;//""; //SMTP mailinizin sifresi
//$mail->WordWrap = 50;
//$mail->IsHTML(true); //Mailimizin HTML formatinda hazirlanacagini bildiriyoruz.
$mail->Subject  = $konu;//"Deneme Maili"; // Mailin Konusu Konu
//Mailimizin gövdesi: (HTML ile)
$mail->Body = $yenisifre;
//$mail->AltBody = $text_body;


if ($mail->Send()) {
	
header("location:../login.php");
exit;

}

else {
	header("location:../login.php?durum=mailno");
exit;


//echo "Mail Gönderimi Başarısız"; echo "<br>";
//echo "Hata: ".$mail->ErrorInfo;


}



/*$mail->ClearAddresses();
$mail->ClearAttachments();
$mail->AddAttachment('images.png'); //mail içinde resim göndermek için
$mail->addCC('mailadi@alanadiniz.site');// cc email adresi
$mail->addBCC('mailadi@alanadiniz.site');// bcc email adresi
$mail->AddAddress("mailadi@alanadiniz.site"); // Mail gönderilecek adresleri ekliyoruz.
$mail->AddAddress("mailadi@alanadiniz.site"); // Mail gönderilecek adresleri ekliyoruz. Birden fazla ekleme yapılabilir.
$mail->Send();
$mail->ClearAddresses();
$mail->ClearAttachments();
*/


     }


}
//mail Başlama Bitiş

?>
