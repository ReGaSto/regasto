<?php

// Skrypt wylicza daty z godzinami co 30 minut = 1800 sekund + usuwa z tablicy godziny nierobocze
    
// DEKLARACJA Zmiennych
    $tablica_dat = array();

// SETUP
    $odstep_czasowy = 1800; // W sekundach
    $godziny_wylaczone = array('21', '22', '23', '00', '01', '02', '03', '04', '05', '06', '07');
    $dni_tygodnia_wylaczone = array('0', '6'); // 0 - niedziela, 6 - sobota
    $data_poczatkowa = "2018-08-22 07:00"; // tutaj można ustawić zmienną (z datepickera)
    $data_koncowa = "2018-08-31 11:30";  // tutaj można ustawić zmienną (z datepickera)
    $czas_poczatkowy = strtotime($data_poczatkowa);
    $czas_koncowy = strtotime($data_koncowa);

//LOGIKA
    for ($i = 0, $t = $czas_poczatkowy; $t < $czas_koncowy; $t += $odstep_czasowy, $i++) {

        if (!in_array(date('w', $t), $dni_tygodnia_wylaczone) && !in_array(date('H', $t), $godziny_wylaczone)) {
            $tablica_dat[$i] = date('Y-m-d H:i:s', $t);
        }
    }
    return $tablica_dat;
