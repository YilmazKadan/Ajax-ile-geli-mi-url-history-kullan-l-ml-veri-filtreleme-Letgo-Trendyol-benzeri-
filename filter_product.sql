-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 01 Ağu 2021, 23:33:08
-- Sunucu sürümü: 10.4.18-MariaDB
-- PHP Sürümü: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `filter_product`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ilanlar`
--

CREATE TABLE `ilanlar` (
  `ilan_id` int(11) NOT NULL,
  `ilan_baslik` varchar(250) COLLATE utf8_turkish_ci DEFAULT NULL,
  `ilan_kategori` int(11) DEFAULT NULL,
  `ilan_sehir` int(11) DEFAULT NULL,
  `ilan_gorsel` varchar(250) COLLATE utf8_turkish_ci DEFAULT NULL,
  `ilan_icerik` text COLLATE utf8_turkish_ci DEFAULT NULL,
  `ilan_tarih` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ilanlar`
--

INSERT INTO `ilanlar` (`ilan_id`, `ilan_baslik`, `ilan_kategori`, `ilan_sehir`, `ilan_gorsel`, `ilan_icerik`, `ilan_tarih`) VALUES
(1, 'Elbise arıyorum', 1, 34, 'image/ziynet.jpg', 'Cafer Elibol yıllardan beri bu ürünü arıyor ve artık arama işini ben devir aldım.', '2021-05-13 15:46:05'),
(2, 'Son dakika altınımı kaybettim', 1, 34, 'image/altin.jpg', NULL, '2021-05-13 15:47:11'),
(3, 'Aslanımı kaybettim acil yardım', 2, 34, 'image/aslan.jpg', 'Aslanımı bulana ödül vereceğimi defaatle bildirdim sizlere ama halen bir geri dönüş alamadım sizlerden.', '2021-06-18 22:03:21');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ilceler`
--

CREATE TABLE `ilceler` (
  `ilce_id` int(11) NOT NULL,
  `ilce_sehir` int(11) NOT NULL,
  `ilce_isim` varchar(250) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ilceler`
--

INSERT INTO `ilceler` (`ilce_id`, `ilce_sehir`, `ilce_isim`) VALUES
(5, 34, 'Esenyurt');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_ust` int(11) NOT NULL,
  `kategori_ad` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `kategori_sef` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `kategori_bilgi` varchar(250) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_ust`, `kategori_ad`, `kategori_sef`, `kategori_bilgi`) VALUES
(1, 0, 'Ziynet', 'ziynet', 'Ziynet Eşyaları'),
(2, 0, 'Hayvan', 'hayvan', 'Bu kategori hayvanları içerir'),
(3, 0, 'İnsan ve hayvan', 'insan-ve-hayvan', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sehirler`
--

CREATE TABLE `sehirler` (
  `sehir_id` int(11) NOT NULL,
  `sehir_ad` varchar(250) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `sehirler`
--

INSERT INTO `sehirler` (`sehir_id`, `sehir_ad`) VALUES
(6, 'Ankara'),
(16, 'Bursa'),
(21, 'İzmir'),
(34, 'İstanbul');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ilanlar`
--
ALTER TABLE `ilanlar`
  ADD PRIMARY KEY (`ilan_id`);

--
-- Tablo için indeksler `ilceler`
--
ALTER TABLE `ilceler`
  ADD PRIMARY KEY (`ilce_id`);

--
-- Tablo için indeksler `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Tablo için indeksler `sehirler`
--
ALTER TABLE `sehirler`
  ADD PRIMARY KEY (`sehir_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `ilanlar`
--
ALTER TABLE `ilanlar`
  MODIFY `ilan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
