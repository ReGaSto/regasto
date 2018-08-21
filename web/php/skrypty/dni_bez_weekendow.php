<?php

/*
 * 
 * Skrypt wylicza daty z godzinami co 30 minut = 1800 sekund
 * 
 */

$odstep_czasowy = 1800; // W sekundach
$tablica_dat = array();
$data_poczatkowa = "2018-08-22 07:00"; // tutaj można ustawić zmienną (z datepickera)
$data_koncowa = "2018-08-31 11:30";  // tutaj można ustawić zmienną (z datepickera)

$czas_poczatkowy = strtotime($data_poczatkowa);
$czas_koncowy = strtotime($data_koncowa);

for ($i = 0, $t = $czas_poczatkowy; $t < $czas_koncowy; $t += $odstep_czasowy, $i++) {

    if (!in_array(date('w', $t), array('0', '6'))) {
        $tablica_dat[$i] = date('Y-m-d H:i:s', $t);
    }
}
print_r($tablica_dat);
?>
