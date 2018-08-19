-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 19 Sie 2018, 17:54
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
-- Struktura tabeli dla tabeli `new_user`
--

CREATE TABLE `new_user` (
  `id` int(11) NOT NULL,
  `username` char(80) NOT NULL,
  `email` char(80) NOT NULL,
  `password` char(255) NOT NULL,
  `authKey` char(255) NOT NULL,
  `accessToken` char(255) NOT NULL,
  `ranga` int(11) NOT NULL,
  `mieszka` char(255) NOT NULL,
  `tel` int(10) NOT NULL,
  `imie` varchar(25) NOT NULL,
  `nazwisko` varchar(50) NOT NULL,
  `notatka` varchar(1000) NOT NULL,
  `pesel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `new_user`
--

INSERT INTO `new_user` (`id`, `username`, `email`, `password`, `authKey`, `accessToken`, `ranga`, `mieszka`, `tel`, `imie`, `nazwisko`, `notatka`, `pesel`) VALUES
(12, '7', '7@7.7', '1', '305296bd303906f6d93bfc5ae00fe37b', '$2y$10$A2VjtOr2x2zqsPUbXr3MceW3ncLWLOMKF7.aRhD45KBvpyQBbaJUS', 1, '', 0, '', '', '', 0),
(17, '6', '666@66.pl', '$2y$10$HXaFTE0kFxuxK8jebZX6IedcC3W3uHYpojjO9gG6jjlx70szHVIbC', '91ddd7768acecd1a50e40d4baf87b1ef', '$2y$10$X8c6Xa2rtMUP46Y6sLzWl.eq0PIQ7sjer4U5bH0BbBndUc9OV5oxi', 1, '', 0, '', '', '', 0),
(18, '8', '8@8.pl', '$2y$10$W1e8nLyV6K9z9.29UytEfOh17V6fWUxckHLeMuA5bAwxhNEEJKGuW', '3057e7add51a316fe9af6b01a862397d', '$2y$10$AHefCLZAinTMrMy5qdOIjOhM7NfDqBrDlcMe2iF5sMKDzve6lpjmy', 3, '', 0, '', '', '', 0),
(19, '5', '5@5.pl', '$2y$10$rjhH7mjaV445sXxxPHU3BeTY8mj6lpGuszgIpyPmrXwi6jw3K8WGq', 'a21c0b57030d0159df4d2ec29bba2564', '$2y$10$r8Vk.GhrnRTovm/Qqx1v8elgn0jGWdqow3TYG3NaUiyQdX6pjKpxm', 2, '', 0, '', '', '', 0),
(20, 'r', 'r@r', '$2y$10$fI07NqL2DqXfiPJF4POAEuENCDO9J/TCl9sJ8p82IacduLVcoPG9.', '', '', 0, '', 0, '', '', '', 0),
(21, 't', 't@t.pl', '$2y$10$bTFh21nnrERfhNB8CzOFCuRbzyb5fPelxt8NHdmiVPTFZ9JCbH24e', '', 'a7c07d20ab481cf1e47c7e34ddb31079', 0, '', 0, '', '', '', 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `new_user`
--
ALTER TABLE `new_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `new_user`
--
ALTER TABLE `new_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
