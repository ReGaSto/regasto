SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";




CREATE TABLE `kalendarz` (
  `id` int(11) NOT NULL,
  `title` varchar(64) COLLATE utf8_bin NOT NULL,
  `data_rezerwacji` datetime NOT NULL,
  `id_stomatologa` int(11) DEFAULT NULL,
  `id_pacjenta` int(11) DEFAULT NULL,
  `info` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Zrzut danych tabeli `kalendarz`
--

INSERT INTO `kalendarz` (`id`, `title`, `data_rezerwacji`, `id_stomatologa`, `id_pacjenta`, `info`) VALUES
(16, 'bartek', '2018-08-22 12:30:00', NULL, NULL, NULL),
(17, 'bartek', '2018-08-23 11:30:00', NULL, NULL, NULL),
(18, 'badmin', '2018-08-24 10:00:00', NULL, NULL, NULL),
(19, 'badmin', '2018-08-23 09:00:00', NULL, NULL, NULL),
(20, 'badmin', '2018-08-22 11:00:00', NULL, NULL, NULL),
(21, 'badmin', '2018-08-23 14:30:00', NULL, NULL, NULL),
(22, 'badmin', '2018-08-23 18:30:00', NULL, NULL, NULL),
(23, 'badmin', '2018-08-23 08:00:00', NULL, NULL, NULL),
(24, 'badmin', '2018-08-22 09:30:00', NULL, NULL, NULL),
(25, 'badmin', '2018-08-23 10:00:00', NULL, NULL, NULL),
(26, 'badmin', '2018-08-24 08:30:00', NULL, NULL, NULL),
(27, 'badmin', '2018-08-24 14:00:00', NULL, NULL, NULL),
(28, 'badmin', '2018-08-22 16:30:00', NULL, NULL, NULL),
(29, 'badmin', '2018-08-23 13:00:00', NULL, NULL, NULL),
(30, 'badmin', '2018-08-24 16:00:00', NULL, NULL, NULL),
(31, 'badmin', '2018-08-22 08:30:00', NULL, NULL, NULL),
(32, 'badmin', '2018-08-22 14:30:00', NULL, NULL, NULL),
(33, 'badmin', '2018-08-24 12:00:00', NULL, NULL, NULL),
(34, 'badmin', '2018-08-23 08:30:00', NULL, NULL, NULL);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `kalendarz`
--
ALTER TABLE `kalendarz`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `kalendarz`
--
ALTER TABLE `kalendarz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;
