-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 18 Sie 2018, 23:21
-- Wersja serwera: 10.1.31-MariaDB
-- Wersja PHP: 7.1.16

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
-- Struktura tabeli dla tabeli `new_user`
--

CREATE TABLE `new_user` (
  `id` int(11) NOT NULL,
  `username` char(80) NOT NULL,
  `email` char(80) NOT NULL,
  `password` char(255) NOT NULL,
  `authKey` char(255) NOT NULL,
  `accessToken` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `new_user`
--

INSERT INTO `new_user` (`id`, `username`, `email`, `password`, `authKey`, `accessToken`) VALUES
(1, 'JF', 'janflpk@yahoo.com', '$2y$10$3wME8LpVcF3uA29VW0SbAeXNhtaiM.7gqOBm7r9XsBlMolH3e4kXe', '03da98c9d7ec253c57a224fe7e978d63', '$2y$10$vLtd7LQa5LS///FGGTfureTeQRP4do.2zm2QyXqRhCnNtbRkfS3jW'),
(2, 'JF2', 'janflpk@yahoo.com', '$2y$10$j9DL71gIAmKFCO3R1DtV5.XpMN21uLIFXumAYnYlAVQFU0s2UAcHq', '8ec0e0fd3e1608fcfdbb1ebe3e2569fb', '$2y$10$GV4X4WJmFDdwwzeMljxLxuBk4bRr/nDd2mDn85AcnUoehEqfvjV.m'),
(3, 'JF3', 'janflpk@yahoo.com', '$2y$10$x1fYU6mnXH7vsCkaGyaGveo7tTNZOiNK5ktKnvqswElpfGZ8DFUk2', '2852c1d93f717c803f5d0b63e5e65eac', '$2y$10$Pjssi3If5p8.0NqszuyVK.CaR27wssBD2P.Ph0S2itpb2lcYzIlkq');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pacjenci`
--

CREATE TABLE `pacjenci` (
  `id_pacjenta` int(11) NOT NULL,
  `imie_pac` text CHARACTER SET utf8 NOT NULL,
  `nazwisko_pac` text CHARACTER SET utf8 NOT NULL,
  `nazwa_uzytkownika` varchar(11) CHARACTER SET utf8 DEFAULT NULL,
  `haslo` varchar(11) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2;

--
-- Zrzut danych tabeli `pacjenci`
--

INSERT INTO `pacjenci` (`id_pacjenta`, `imie_pac`, `nazwisko_pac`, `nazwa_uzytkownika`, `haslo`) VALUES
(1, 'Adam', 'Kowalski', 'akowal', 'ak21'),
(2, 'Filip', 'Kos', 'fkos', 'fk43');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `stomatolodzy`
--

CREATE TABLE `stomatolodzy` (
  `id_stomatologa` int(11) NOT NULL,
  `imie` text CHARACTER SET utf8 NOT NULL,
  `nazwisko` text CHARACTER SET utf8 NOT NULL,
  `nazwa_uzytkownika` varchar(11) CHARACTER SET utf8 DEFAULT NULL,
  `haslo` varchar(11) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2;

--
-- Zrzut danych tabeli `stomatolodzy`
--

INSERT INTO `stomatolodzy` (`id_stomatologa`, `imie`, `nazwisko`, `nazwa_uzytkownika`, `haslo`) VALUES
(1, 'Jan', 'TrzepadĹ‚ek', 'jtrzepa', 'jt32'),
(2, 'Bonawentura', 'TrÄ…ba', 'btraba', 'bt456');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wizyty`
--

CREATE TABLE `wizyty` (
  `id_pacjenta` int(11) DEFAULT NULL,
  `id_stomatologa` int(11) NOT NULL,
  `data` date NOT NULL,
  `godzina` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2;

--
-- Zrzut danych tabeli `wizyty`
--

INSERT INTO `wizyty` (`id_pacjenta`, `id_stomatologa`, `data`, `godzina`) VALUES
(0, 1, '2018-08-03', '09:30:00'),
(0, 1, '2018-08-13', '09:00:00'),
(0, 1, '2018-08-13', '09:30:00'),
(0, 1, '2018-08-13', '10:00:00'),
(2, 1, '2018-08-13', '10:30:00'),
(0, 1, '2018-08-13', '11:00:00'),
(0, 1, '2018-08-13', '11:30:00'),
(0, 1, '2018-08-21', '09:00:00'),
(0, 1, '2018-09-13', '13:00:00'),
(0, 2, '2018-08-03', '10:30:00'),
(2, 2, '2018-08-14', '23:30:00'),
(0, 2, '2018-08-15', '13:30:00'),
(0, 2, '2018-08-22', '10:00:00'),
(2, 2, '2018-09-19', '12:00:00');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `new_user`
--
ALTER TABLE `new_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `pacjenci`
--
ALTER TABLE `pacjenci`
  ADD PRIMARY KEY (`id_pacjenta`),
  ADD UNIQUE KEY `haslo` (`haslo`),
  ADD UNIQUE KEY `nazwa_uzytkownika` (`nazwa_uzytkownika`);

--
-- Indeksy dla tabeli `stomatolodzy`
--
ALTER TABLE `stomatolodzy`
  ADD PRIMARY KEY (`id_stomatologa`),
  ADD UNIQUE KEY `nazwa_uzytkownika` (`nazwa_uzytkownika`),
  ADD UNIQUE KEY `haslo` (`haslo`);

--
-- Indeksy dla tabeli `wizyty`
--
ALTER TABLE `wizyty`
  ADD PRIMARY KEY (`id_stomatologa`,`data`,`godzina`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `new_user`
--
ALTER TABLE `new_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `pacjenci`
--
ALTER TABLE `pacjenci`
  MODIFY `id_pacjenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `stomatolodzy`
--
ALTER TABLE `stomatolodzy`
  MODIFY `id_stomatologa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
