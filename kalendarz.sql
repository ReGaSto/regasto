SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `kalendarz` (
  `id` int(11) NOT NULL,
  `title` varchar(64) COLLATE utf8_bin NOT NULL,
  `description` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `created_date` datetime NOT NULL,
  `id_stomatologa` int(11) DEFAULT NULL,
  `id_pacjenta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


ALTER TABLE `kalendarz`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `kalendarz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;
COMMIT;

