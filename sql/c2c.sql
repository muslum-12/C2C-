-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 15 Nis 2020, 13:03:42
-- Sunucu sürümü: 10.4.11-MariaDB
-- PHP Sürümü: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `c2c`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayar`
--

CREATE TABLE `ayar` (
  `ayar_id` int(11) NOT NULL,
  `ayar_logo` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_url` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_title` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_description` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_keywords` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_author` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_tel` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_gsm` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_faks` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_mail` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_ilce` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_il` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_adres` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_mesai` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_maps` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_analystic` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_zopim` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_facebook` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_twitter` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_google` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_youtube` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_smtphost` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_smtpuser` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_smtppassword` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_smtpport` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_bakim` enum('0','1') COLLATE utf8_turkish_ci NOT NULL DEFAULT '1',
  `ayar-resim` varchar(100) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ayar`
--

INSERT INTO `ayar` (`ayar_id`, `ayar_logo`, `ayar_url`, `ayar_title`, `ayar_description`, `ayar_keywords`, `ayar_author`, `ayar_tel`, `ayar_gsm`, `ayar_faks`, `ayar_mail`, `ayar_ilce`, `ayar_il`, `ayar_adres`, `ayar_mesai`, `ayar_maps`, `ayar_analystic`, `ayar_zopim`, `ayar_facebook`, `ayar_twitter`, `ayar_google`, `ayar_youtube`, `ayar_smtphost`, `ayar_smtpuser`, `ayar_smtppassword`, `ayar_smtpport`, `ayar_bakim`, `ayar-resim`) VALUES
(0, 'dimg/2172114940_1458728631055516_80602699674872466_n.jpg', 'http://wwww.mslmsatıs.com', 'Joy Akademi E-Ticaret Scripti', 'Joy Akademi E-Ticaret Scripti yazım eğitimi projesi', 'eticaret, shopping, php, learning, student php', 'Müslüm Elçi', '0850 840 81 76', '0850 840 80 7289', '0850 840 80 76', 'muslumelci.9312@gmail.com', 'İstanbul', 'Beylikdüzü', 'beylikdüzü', '', 'ayar_maps_api', 'ayar_analystic', 'https://v2.zopim.com/?5DyUgwL2c2nc43kG0j9udM8FLxy9XfWX', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.google.com', 'http://www.youtube.com', 'muslumelci.9321@gmail.com', 'muslumelci.9312@gmail.com', '1234567', 'muslumelci.9312@gmail.com', '1', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `banka`
--

CREATE TABLE `banka` (
  `banka_id` int(11) NOT NULL,
  `banka_ad` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `banka_iban` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `banka_hesapadsoyad` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `banka_durum` enum('0','1') COLLATE utf8_turkish_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `banka`
--

INSERT INTO `banka` (`banka_id`, `banka_ad`, `banka_iban`, `banka_hesapadsoyad`, `banka_durum`) VALUES
(1, 'Garanti Bankası', 'TR123456789101112', 'Müslüm  Elçi', '1'),
(2, 'Yapı Kredi', 'TR45646545646545646465546', 'Emrah Yüksel', '1'),
(3, 'Vakıfbank', 'TR455645645646546465465', 'Emrah Yüksel', '1'),
(5, 'Ziraat Bankası', 'TR45646545646awrwerwerwer', 'Emrah Yüksel', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hakkimizda`
--

CREATE TABLE `hakkimizda` (
  `hakkimizda_id` int(11) NOT NULL,
  `hakkimizda_baslik` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `hakkimizda_icerik` text COLLATE utf8_turkish_ci NOT NULL,
  `hakkimizda_video` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `hakkimizda_vizyon` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `hakkimizda_misyon` varchar(500) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `hakkimizda`
--

INSERT INTO `hakkimizda` (`hakkimizda_id`, `hakkimizda_baslik`, `hakkimizda_icerik`, `hakkimizda_video`, `hakkimizda_vizyon`, `hakkimizda_misyon`) VALUES
(0, 'Mslsmsm elçi', '<p>Y&ouml;netim anlayışını ve kalite standardlarını s&uuml;rekli geliştirerek, Yurti&ccedil;i gayrimenkul sekt&ouml;r&uuml;ndeki konumunu devam ettirmek ve daha ileriye taşımak,</p><p>Planlı, nitelikli ve &ccedil;evreye duyarlı şehircilik anlayışını, Uluslararası kriterlerde daha yukarıya taşıyarak, D&uuml;nyadaki sayılı gayrimenkul yatırım ortaklıkları arasına girmek.</p><p>Bu g&uuml;ne kadar ger&ccedil;ekleştirilen ve ger&ccedil;ekleştirilmekte olan konut + ticari &uuml;nite sayısını, 2023 yılı sonuna kadar 250 bine &ccedil;ıkarmak,98</p>', '', 'pemfkmwc', 'rver');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_ad` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `kategori_onecikar` enum('0','1') COLLATE utf8_turkish_ci NOT NULL,
  `kategori_seourl` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `kategori_sira` int(2) NOT NULL,
  `kategori_durum` enum('0','1') COLLATE utf8_turkish_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_ad`, `kategori_onecikar`, `kategori_seourl`, `kategori_sira`, `kategori_durum`) VALUES
(17, 'Hediyelik Eşyalar', '1', 'hediyelik-esyalar', 2, '1'),
(29, 'Yiyecek ve İçecek ', '1', 'yiyecek-ve-icecek', 4, '1'),
(32, 'Satılık Dükkanlar', '1', 'satilik-dukkanlar', 5, '1'),
(33, 'Kiralık Evler', '1', 'kiralik-evler', 8, '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `kullanici_id` int(11) NOT NULL,
  `subMerchantKey` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_magaza` enum('0','1','2') COLLATE utf8_turkish_ci NOT NULL DEFAULT '0',
  `kullanici_magazafoto` varchar(500) COLLATE utf8_turkish_ci NOT NULL DEFAULT 'dimg/magaza-fotoyok.png',
  `kullanici_zaman` datetime NOT NULL DEFAULT current_timestamp(),
  `kullanici_resim` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_tc` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_banka` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_iban` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `kullanici_ad` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_soyad` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_mail` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_gsm` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_password` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_adres` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_il` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_ilce` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_unvan` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_tip` enum('PERSONAL','PRIVATE_COMPANY','LIMITED_OR_JOINT_STOCK_COMPANY','') COLLATE utf8_turkish_ci DEFAULT 'PERSONAL',
  `kullanici_vdaire` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_vno` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_yetki` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_durum` int(1) NOT NULL DEFAULT 1,
  `kullanici_sonzaman` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`kullanici_id`, `subMerchantKey`, `kullanici_magaza`, `kullanici_magazafoto`, `kullanici_zaman`, `kullanici_resim`, `kullanici_tc`, `kullanici_banka`, `kullanici_iban`, `kullanici_ad`, `kullanici_soyad`, `kullanici_mail`, `kullanici_gsm`, `kullanici_password`, `kullanici_adres`, `kullanici_il`, `kullanici_ilce`, `kullanici_unvan`, `kullanici_tip`, `kullanici_vdaire`, `kullanici_vno`, `kullanici_yetki`, `kullanici_durum`, `kullanici_sonzaman`) VALUES
(170, '', '0', 'dimg/magaza-fotoyok.png', '2020-03-19 16:24:28', '', '147258369', '', NULL, 'Muhammet', 'elçi', 'muhammet@gmail.com', '02122121212', 'fcea920f7412b5da7be0cf42b8c93759', 'küçük tekören köyü', 'BİNGÖL', 'mekez', '', 'PERSONAL', '', '', '5', 1, '0000-00-00 00:00:00'),
(171, '', '2', 'dimg/userphoto/5e9428f9b9462.jpg', '2020-03-19 17:09:42', '', '123456789101112', '', NULL, 'Müslüm', 'elci', 'satıcı@hotmail.com', '05426335816pp', 'e10adc3949ba59abbe56e057f20f883e', 'yukarı zeynep köyü', 'bingöl', 'merkez12', 'zaza', 'PRIVATE_COMPANY', 'bingöl', '12', '1', 1, '2020-04-15 10:55:24'),
(172, '', '0', 'dimg/userphoto/5e907497c2c6d.jpg', '2020-03-19 17:09:42', '', '123456789101112', '', NULL, 'Muhsin', 'elci', 'alıcı@hotmail.com', '05426342236', 'e10adc3949ba59abbe56e057f20f883e', 'zafer Mah.Tongucbaba cad.cömertkent sit. istanbul/beylikdüzü', 'istanbul', 'esenyurt', 'zaza', 'PRIVATE_COMPANY', 'bingöl', '12', '1', 1, '2020-04-14 13:52:05'),
(174, '', '0', 'dimg/userphoto/5e9090c3173ff.jpg', '2020-04-08 18:22:42', '', '', '', NULL, 'zeynep', 'elçi', 'zeynep@hotmail.com', '', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '', 'PERSONAL', '', '', '1', 1, '0000-00-00 00:00:00'),
(175, '', '0', 'dimg/magaza-fotoyok.png', '2020-04-14 13:42:51', '', '', '', NULL, 'cemile', 'sarı', 'me@cemilesari.com', '', '6ea4694950ac4c50caa9d85ceb0c6497', '', '', '', '', 'PERSONAL', '', '', '1', 1, '2020-04-14 13:59:51');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `menu_ust` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `menu_ad` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `menu_detay` text COLLATE utf8_turkish_ci NOT NULL,
  `menu_url` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `menu_sira` int(2) NOT NULL,
  `menu_durum` enum('0','1') COLLATE utf8_turkish_ci NOT NULL,
  `menu_seourl` varchar(250) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_ust`, `menu_ad`, `menu_detay`, `menu_url`, `menu_sira`, `menu_durum`, `menu_seourl`) VALUES
(1, '0', 'Hakkımızda', '', 'hakkimizda', 1, '1', 'hakkimizda'),
(4, '0', 'Kategoriler', '', 'kategoriler', 3, '1', 'kategoriler');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mesaj`
--

CREATE TABLE `mesaj` (
  `mesaj_id` int(11) NOT NULL,
  `mesaj_zaman` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `mesaj_detay` text NOT NULL,
  `kullanici_gel` int(15) NOT NULL,
  `kullanici_gon` int(15) NOT NULL,
  `mesaj_okunma` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `mesaj`
--

INSERT INTO `mesaj` (`mesaj_id`, `mesaj_zaman`, `mesaj_detay`, `kullanici_gel`, `kullanici_gon`, `mesaj_okunma`) VALUES
(51, '2020-04-10 11:48:27', '<p>zeynep ten M&uuml;sl&uuml;me</p>', 171, 174, '1'),
(52, '2020-04-10 11:48:02', '<p>zeynepten Muhsine</p>', 172, 174, '1'),
(54, '2020-04-10 11:53:35', '<p>M&uuml;sl&uuml;mden Zeynepe</p>', 174, 171, '1'),
(56, '2020-04-10 12:53:32', '<p>ye afferin</p>', 172, 171, '1'),
(57, '2020-04-10 12:53:55', '<p>mmmmm</p>', 171, 172, '1'),
(58, '2020-04-10 12:57:54', '<p>ne haber abi</p>', 171, 172, '1'),
(59, '2020-04-10 13:24:26', '<p>abi nasılsın&nbsp;</p>', 171, 172, '1'),
(60, '2020-04-10 13:29:19', '<p>iyim canım sen</p>', 172, 171, '1'),
(61, '2020-04-10 13:53:38', '<p>fff</p>', 171, 172, '1'),
(62, '2020-04-10 14:30:07', '<p>vvvv</p>', 171, 172, '1'),
(63, '2020-04-10 15:29:18', '<p>bildirim kontrol</p>', 171, 174, '1'),
(64, '2020-04-14 06:57:34', '<p>merhba</p>', 172, 171, '1'),
(65, '2020-04-14 06:57:57', '<p>vvv</p>', 171, 172, '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sepet`
--

CREATE TABLE `sepet` (
  `sepet_id` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `urun_id` int(11) NOT NULL,
  `urun_adet` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `sepet`
--

INSERT INTO `sepet` (`sepet_id`, `kullanici_id`, `urun_id`, `urun_adet`) VALUES
(9, 152, 17, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siparis`
--

CREATE TABLE `siparis` (
  `siparis_id` int(11) NOT NULL,
  `siparis_zaman` timestamp NOT NULL DEFAULT current_timestamp(),
  `kullanici_id` int(11) NOT NULL,
  `kullanici_idsatici` int(11) NOT NULL,
  `siparis_odeme` enum('0','1') COLLATE utf8_turkish_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `siparis`
--

INSERT INTO `siparis` (`siparis_id`, `siparis_zaman`, `kullanici_id`, `kullanici_idsatici`, `siparis_odeme`) VALUES
(750077, '2020-04-06 14:16:12', 171, 172, '0'),
(750078, '2020-04-06 14:16:39', 171, 172, '0'),
(750079, '2020-04-06 14:16:56', 171, 172, '0'),
(750080, '2020-04-06 14:38:12', 172, 171, '0'),
(750081, '2020-04-06 14:38:30', 172, 171, '0'),
(750082, '2020-04-06 14:38:40', 172, 171, '0'),
(750083, '2020-04-14 10:44:36', 175, 172, '0');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siparis_detay`
--

CREATE TABLE `siparis_detay` (
  `siparisdetay_id` int(11) NOT NULL,
  `siparis_id` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `kullanici_idsatici` int(11) NOT NULL,
  `urun_id` int(11) NOT NULL,
  `urun_fiyat` float(9,2) NOT NULL,
  `urun_adet` int(3) NOT NULL,
  `siparisdetay_kargozaman` datetime NOT NULL,
  `siparisdetay_kargoad` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `siparisdetay_kargono` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `siparisdetay_onay` enum('0','1','2') COLLATE utf8_turkish_ci NOT NULL DEFAULT '0',
  `siparisdetay_yorum` enum('0','1') COLLATE utf8_turkish_ci NOT NULL DEFAULT '0',
  `siparisdetay_onayzaman` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `siparis_detay`
--

INSERT INTO `siparis_detay` (`siparisdetay_id`, `siparis_id`, `kullanici_id`, `kullanici_idsatici`, `urun_id`, `urun_fiyat`, `urun_adet`, `siparisdetay_kargozaman`, `siparisdetay_kargoad`, `siparisdetay_kargono`, `siparisdetay_onay`, `siparisdetay_yorum`, `siparisdetay_onayzaman`) VALUES
(74, 750077, 171, 172, 77, 5.00, 0, '0000-00-00 00:00:00', '', '', '2', '1', '0000-00-00 00:00:00'),
(75, 750078, 171, 172, 76, 4.00, 0, '0000-00-00 00:00:00', '', '', '2', '1', '0000-00-00 00:00:00'),
(76, 750079, 171, 172, 75, 2.00, 0, '0000-00-00 00:00:00', '', '', '2', '1', '0000-00-00 00:00:00'),
(80, 750083, 175, 172, 76, 4.00, 0, '0000-00-00 00:00:00', '', '', '2', '1', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(11) NOT NULL,
  `slider_ad` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `slider_resimyol` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `slider_sira` int(2) NOT NULL,
  `slider_link` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `slider_durum` enum('0','1') COLLATE utf8_turkish_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `slider`
--

INSERT INTO `slider` (`slider_id`, `slider_ad`, `slider_resimyol`, `slider_sira`, `slider_link`, `slider_durum`) VALUES
(2, 'Slider 1', 'dimg/slider/3067331362252582652425762274502674026403slide-1.jpg', 12, '', '1'),
(4, 'Slider 2', 'dimg/slider/29538315172733129852slide-2.jpg', 2, '', '1'),
(5, 'Slider 3', 'dimg/slider/23243301742266520059slide-3.jpg', 3, '', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urun`
--

CREATE TABLE `urun` (
  `urun_id` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `urun_zaman` timestamp NOT NULL DEFAULT current_timestamp(),
  `urunfoto_resimyol` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `urun_ad` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `urun_seourl` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `urun_detay` text COLLATE utf8_turkish_ci NOT NULL,
  `urun_fiyat` float(9,2) NOT NULL,
  `urun_satis` int(4) NOT NULL DEFAULT 0,
  `urun_video` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `urun_keyword` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `urun_stok` int(11) NOT NULL,
  `urun_durum` enum('0','1') COLLATE utf8_turkish_ci NOT NULL,
  `urun_onecikar` enum('0','1') COLLATE utf8_turkish_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `urun`
--

INSERT INTO `urun` (`urun_id`, `kullanici_id`, `kategori_id`, `urun_zaman`, `urunfoto_resimyol`, `urun_ad`, `urun_seourl`, `urun_detay`, `urun_fiyat`, `urun_satis`, `urun_video`, `urun_keyword`, `urun_stok`, `urun_durum`, `urun_onecikar`) VALUES
(75, 172, 17, '2020-04-06 14:12:33', 'dimg/urunfoto/5e8b38d13407a.jpg', 'zambak1', 'zambak1', '<p>zambak1</p>', 2.00, 0, '', '', 0, '1', '1'),
(76, 172, 17, '2020-04-06 14:12:57', 'dimg/urunfoto/5e8b38e904e75.jpg', 'zambak2', 'zambak2', '<p>zambak2</p>', 4.00, 0, '', '', 0, '1', '1'),
(77, 172, 17, '2020-04-06 14:13:19', 'dimg/urunfoto/5e8b38ff1f832.jpg', 'zambak4', 'zambak4', '&lt;p&gt;zambak4&lt;/p&gt;', 0.00, 0, '', '', 0, '1', '1'),
(78, 171, 29, '2020-04-06 14:20:19', 'dimg/urunfoto/5e8b3aa32f451.jpg', 'papatya1', 'papatya1', '<p>papatya1</p>', 3.00, 0, '', '', 0, '1', '1'),
(79, 171, 29, '2020-04-06 14:20:42', 'dimg/urunfoto/5e8b3aba5318e.jpg', 'papatya2', 'papatya2', '<p>papatya2</p>', 4.00, 0, '', '', 0, '1', '1'),
(80, 171, 29, '2020-04-06 14:21:08', 'dimg/urunfoto/5e8b3ad42f7d3.jpg', 'papatya3', 'papatya3', '<p>papatya3</p>', 5.00, 0, '', '', 0, '1', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorumlar`
--

CREATE TABLE `yorumlar` (
  `yorum_id` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `urun_id` int(11) NOT NULL,
  `yorum_detay` text COLLATE utf8_turkish_ci NOT NULL,
  `yorum_zaman` timestamp NOT NULL DEFAULT current_timestamp(),
  `yorum_onay` enum('0','1') COLLATE utf8_turkish_ci DEFAULT '0',
  `yorum_puan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `yorumlar`
--

INSERT INTO `yorumlar` (`yorum_id`, `kullanici_id`, `urun_id`, `yorum_detay`, `yorum_zaman`, `yorum_onay`, `yorum_puan`) VALUES
(37, 171, 75, 'zambak1', '2020-04-06 14:18:10', '0', 3),
(38, 171, 76, '	zambak2', '2020-04-06 14:18:25', '0', 2),
(39, 171, 77, 'zambak3', '2020-04-06 14:18:38', '0', 5),
(40, 172, 78, 'papatya5', '2020-04-06 14:39:23', '0', 3),
(41, 172, 79, 'papatya2', '2020-04-06 14:39:40', '0', 4),
(42, 172, 80, 'papatya3', '2020-04-06 14:39:56', '0', 5),
(44, 172, 80, 'papatya3', '2020-04-06 14:39:56', '0', 5),
(45, 175, 76, 'ürün 1', '2020-04-14 10:52:36', '0', 5);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ayar`
--
ALTER TABLE `ayar`
  ADD PRIMARY KEY (`ayar_id`);

--
-- Tablo için indeksler `banka`
--
ALTER TABLE `banka`
  ADD PRIMARY KEY (`banka_id`);

--
-- Tablo için indeksler `hakkimizda`
--
ALTER TABLE `hakkimizda`
  ADD PRIMARY KEY (`hakkimizda_id`);

--
-- Tablo için indeksler `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`kullanici_id`);

--
-- Tablo için indeksler `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Tablo için indeksler `mesaj`
--
ALTER TABLE `mesaj`
  ADD PRIMARY KEY (`mesaj_id`);

--
-- Tablo için indeksler `sepet`
--
ALTER TABLE `sepet`
  ADD PRIMARY KEY (`sepet_id`);

--
-- Tablo için indeksler `siparis`
--
ALTER TABLE `siparis`
  ADD PRIMARY KEY (`siparis_id`);

--
-- Tablo için indeksler `siparis_detay`
--
ALTER TABLE `siparis_detay`
  ADD PRIMARY KEY (`siparisdetay_id`);

--
-- Tablo için indeksler `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Tablo için indeksler `urun`
--
ALTER TABLE `urun`
  ADD PRIMARY KEY (`urun_id`);

--
-- Tablo için indeksler `yorumlar`
--
ALTER TABLE `yorumlar`
  ADD PRIMARY KEY (`yorum_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `banka`
--
ALTER TABLE `banka`
  MODIFY `banka_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `kullanici_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- Tablo için AUTO_INCREMENT değeri `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `mesaj`
--
ALTER TABLE `mesaj`
  MODIFY `mesaj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- Tablo için AUTO_INCREMENT değeri `sepet`
--
ALTER TABLE `sepet`
  MODIFY `sepet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `siparis`
--
ALTER TABLE `siparis`
  MODIFY `siparis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=750084;

--
-- Tablo için AUTO_INCREMENT değeri `siparis_detay`
--
ALTER TABLE `siparis_detay`
  MODIFY `siparisdetay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- Tablo için AUTO_INCREMENT değeri `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `urun`
--
ALTER TABLE `urun`
  MODIFY `urun_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- Tablo için AUTO_INCREMENT değeri `yorumlar`
--
ALTER TABLE `yorumlar`
  MODIFY `yorum_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
