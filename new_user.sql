-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 23 Sie 2018, 11:15
-- Wersja serwera: 10.1.31-MariaDB
-- Wersja PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `regasto`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `new_user` WERSJA NA CZYSTO M.Kurant 23.08.2018 11:17
--

CREATE TABLE `new_user` (
  `id` int(11) NOT NULL,
  `username` char(80) COLLATE utf8_bin NOT NULL,
  `email` char(80) COLLATE utf8_bin NOT NULL,
  `password` char(60) COLLATE utf8_bin NOT NULL,
  `authKey` char(255) COLLATE utf8_bin NOT NULL,
  `accessToken` char(255) COLLATE utf8_bin NOT NULL,
  `role` int(11) NOT NULL DEFAULT '10',
  `mieszka` char(255) COLLATE utf8_bin NOT NULL,
  `tel` int(10) NOT NULL,
  `imie` varchar(25) COLLATE utf8_bin NOT NULL,
  `nazwisko` varchar(50) COLLATE utf8_bin NOT NULL,
  `notatka` varchar(2500) COLLATE utf8_bin NOT NULL,
  `pesel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Zrzut danych tabeli `new_user`
--

INSERT INTO `new_user` (`id`, `username`, `email`, `password`, `authKey`, `accessToken`, `role`, `mieszka`, `tel`, `imie`, `nazwisko`, `notatka`, `pesel`) VALUES
(1, '30', '30@30.pl', '$2y$10$g1upm6FpMJDMWRt3y4TnDeM0WGrW9ke5iEVUHkONJE1.eca.jukBm', 'c45d18f3b33d96986992fcf4e7309b55', '$2y$10$pndEkb4rWgyUadpPt97qUerN7xye2LbbqdmKQ8uXn3eTEt64z.24O', 30, '', 0, '', '', '', 0),
(2, '20', '20@20.pl', '$2y$10$ygq7kwclu5YwLDjn44B//ObLvN4.m3FBXDlWKuSzQN57S5bFSFF3K', '2ad730feb36203fb067a1ac85f588e2e', '$2y$10$cXpVt0wyxKM8X7PapbpF3eRarTPEMjIpmcl9gzQzRe.Dpa7z/xvsC', 20, '', 0, '', '', '', 0),
(3, '15', '15@15.pl', '$2y$10$qcxZyFZa2rbG/ABmAVP8AOzWG9FDt8xyCCyP4XCTUe2bQ3SGxXGzu', '5cc493d05751097c930dc253feddcae0', '$2y$10$eZQM99vxnXJ/puv4/XRjzu3MTjZwwQtFEyuEK/ONXdkLFUbJccnlS', 15, '', 0, '', '', '', 0),
(4, '10', '10@10.pl', '$2y$10$1Myo0OaBApWxt6SgjnSUxOglqx38JwcDNRAV.PPMnEQ6naDVk32ya', 'ea51dcba6e63d87f47b400aed1c05ce9', '$2y$10$vSXGO8suBR9blRyCRI6b6utDOA8ygDUUvoH7k2LY71b6D6tCIxgy2', 10, '', 0, '', '', '', 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `new_user`
--
ALTER TABLE `new_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`username`,`email`,`pesel`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `new_user`
--
ALTER TABLE `new_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
