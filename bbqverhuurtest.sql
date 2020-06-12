-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Gegenereerd op: 08 jun 2020 om 07:45
-- Serverversie: 5.7.19
-- PHP-versie: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bbqverhuurtest`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruikers`
--

CREATE TABLE `gebruikers` (
  `Gebruikers_ID` int(11) NOT NULL,
  `Gebruikers_Naam` varchar(20) DEFAULT NULL,
  `Wachtwoord` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product`
--

CREATE TABLE `product` (
  `Product_ID` int(11) NOT NULL,
  `Product_Naam` varchar(50) DEFAULT NULL,
  `Product_Merk` varchar(50) DEFAULT NULL,
  `Close_Up_Foto` varchar(200) DEFAULT NULL,
  `Foto_1` varchar(200) DEFAULT NULL,
  `Foto_2` varchar(200) DEFAULT NULL,
  `Kg` int(11) DEFAULT NULL,
  `Grid_Diameter` int(11) DEFAULT NULL,
  `Oppervlakte` int(11) DEFAULT NULL,
  `Hoogte` int(11) DEFAULT NULL,
  `Korte_Omschrijving` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `resevering`
--

CREATE TABLE `resevering` (
  `Reserverings_Nummer` int(11) NOT NULL,
  `Voornaam` varchar(50) DEFAULT NULL,
  `Insertion` varchar(5) DEFAULT NULL,
  `Achternaam` varchar(50) DEFAULT NULL,
  `Adres` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Telefoon_Nummer` varchar(10) DEFAULT NULL,
  `Product_ID` int(11) DEFAULT NULL,
  `Leveren` varchar(10) DEFAULT NULL,
  `Start_Huur_Periode` datetime DEFAULT NULL,
  `Opmerkingen` varchar(200) DEFAULT NULL,
  `Totale_Prijs` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `vragen`
--

CREATE TABLE `vragen` (
  `Vraag_ID` int(11) NOT NULL,
  `Voornaam` varchar(50) DEFAULT NULL,
  `Insertion` varchar(5) DEFAULT NULL,
  `Achternaam` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Vraag` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `gebruikers`
--
ALTER TABLE `gebruikers`
  ADD PRIMARY KEY (`Gebruikers_ID`);

--
-- Indexen voor tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Product_ID`);

--
-- Indexen voor tabel `resevering`
--
ALTER TABLE `resevering`
  ADD PRIMARY KEY (`Reserverings_Nummer`),
  ADD KEY `FK` (`Product_ID`);

--
-- Indexen voor tabel `vragen`
--
ALTER TABLE `vragen`
  ADD PRIMARY KEY (`Vraag_ID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `gebruikers`
--
ALTER TABLE `gebruikers`
  MODIFY `Gebruikers_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT voor een tabel `product`
--
ALTER TABLE `product`
  MODIFY `Product_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT voor een tabel `resevering`
--
ALTER TABLE `resevering`
  MODIFY `Reserverings_Nummer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT voor een tabel `vragen`
--
ALTER TABLE `vragen`
  MODIFY `Vraag_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
