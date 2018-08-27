SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";




CREATE VIEW `kalendarz2`  AS  select `wizyty`.`data` AS `data`,`wizyty`.`godzina` AS `godzina`,`wizyty`.`id_pacjenta` AS `id_pacjenta`,`wizyty`.`id_stomatologa` AS `id_stomatologa` from `wizyty` where ((`wizyty`.`id_pacjenta` <> 0) or (`wizyty`.`id_pacjenta` <> NULL)) ;



COMMIT;