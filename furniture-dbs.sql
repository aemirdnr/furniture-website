-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 04 Tem 2022, 01:37:12
-- Sunucu sürümü: 10.4.24-MariaDB
-- PHP Sürümü: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `furniture-dbs`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `price` varchar(250) NOT NULL,
  `link` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `link`, `image`) VALUES
(1, 'Velvet Living Room Set', '1.250$', 'https://amazon.com', '0.92109300 1656638762.webp'),
(2, 'Modern Living Room Set', '1.500$', 'https://amazon.com', '0.71649600 1656638811.webp'),
(3, 'Faux Living Room Set', '1.799$', 'https://amazon.com', '0.19804600 1656638821.webp'),
(4, 'Modern Kitchen Set', '1.999$', 'https://amazon.com', '0.31414900 1656638828.webp'),
(5, 'New Modern Kitchen Set', '2.199$', 'https://amazon.com', '0.22125300 1656639546.webp'),
(6, 'Metal Kitchen Shelf', '139$', 'https://amazon.com', '0.07874600 1656638846.webp'),
(7, 'Flower Stand', '89$', 'https://amazon.com', '0.93182300 1656638852.webp'),
(8, 'Modern Design Shelf', '119$', 'https://amazon.com', '0.65415500 1656638878.webp'),
(9, 'Modern Picture With Frame', '175$', 'https://amazon.com', '0.98041800 1656639094.webp'),
(10, 'Wooden Wall Shelf', '99$', 'https://amazon.com', '0.42539100 1656639140.webp'),
(11, 'Modern Bedroom Set', '2.199$', 'https://amazon.com', '0.01975800 1656639148.webp'),
(12, 'Argos Bedroom Set', '2.799$', 'https://amazon.com', '0.15757700 1656639154.webp'),
(13, 'New Modern Bedroom Set', '2.050$', 'https://amazon.com', '0.69419800 1656639159.webp');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `producttags`
--

CREATE TABLE `producttags` (
  `id` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `tag` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `producttags`
--

INSERT INTO `producttags` (`id`, `productID`, `tag`) VALUES
(1, 1, 'Living Room'),
(2, 2, 'Living Room'),
(3, 3, 'Living Room'),
(4, 4, 'Kitchen'),
(5, 5, 'Kitchen'),
(6, 6, 'Kitchen'),
(7, 7, 'Garden and Balcony'),
(8, 8, 'Decoration'),
(9, 9, 'Decoration'),
(10, 10, 'Decoration'),
(11, 11, 'Bedroom'),
(12, 12, 'Bedroom'),
(13, 13, 'Bedroom');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `tag` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `tags`
--

INSERT INTO `tags` (`id`, `tag`) VALUES
(1, 'Living Room'),
(2, 'Bedroom'),
(3, 'Dining Room'),
(4, 'Kitchen'),
(5, 'Study Room'),
(6, 'Garden and Balcony'),
(7, 'Kids and Young'),
(8, 'Decoration');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'password');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `producttags`
--
ALTER TABLE `producttags`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Tablo için AUTO_INCREMENT değeri `producttags`
--
ALTER TABLE `producttags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Tablo için AUTO_INCREMENT değeri `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
