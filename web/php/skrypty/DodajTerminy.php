<?php
require_once '../../../config/param_db.php';
Echo 'Generacja Terminów do Wizyt<br><br>';
// Skrypt wylicza daty z godzinami co 30 minut = 1800 sekund + usuwa z tablicy godziny nierobocze
    
// DEKLARACJA Zmiennych
    $date;
    $time;
    $data_poczatkowa = "2018-08-22 16:00"; // tutaj można ustawić zmienną (z datepickera)
    $data_koncowa = "2018-11-30 20:00";  // tutaj można ustawić zmienną (z datepickera)
    /* Dane bazy danych*/

    define('DB_SERVER', $adres_serwera); // TUTAJ dodałbym zmienne które byłyby zintegrowane z plikiem db.php z Yii2 dzięki temu zmiana BD tam zgra się z tym

    define('DB_USERNAME', $nazwa_uzytkownika);

    define('DB_PASSWORD', $haslo);

    define('DB_NAME', $nazwa_bazy);
    
    //define ('DB_CHARSET', $kodowanie); - zrezygnowałem chwilowo
    
    try{

    $connect = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME /*. ";charset=" . DB_CHARSET*/, DB_USERNAME, DB_PASSWORD);

    // Wyłapywanie błędu połączenia w bloku try-catch


    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo 'Nawiązano połączenie z bazą!';

} catch(PDOException $e){

    die("<b>Błąd: Nie można połączyć z bazą danych.</b> " . $e->getMessage());

}
    
    

// SETUP
    $odstep_czasowy = 1800; // W sekundach
    $godziny_wylaczone = array('21', '22', '23', '00', '01', '02', '03', '04', '05', '06', '07');
    $dni_tygodnia_wylaczone = array('0', '6'); // 0 - niedziela, 6 - sobota

    $czas_poczatkowy = strtotime($data_poczatkowa);
    $czas_koncowy = strtotime($data_koncowa);

//LOGIKA
    for ($i = 0, $t = $czas_poczatkowy; $t < $czas_koncowy; $t += $odstep_czasowy, $i++) {

        if (!in_array(date('w', $t), $dni_tygodnia_wylaczone) && !in_array(date('H', $t), $godziny_wylaczone)) {
            //$tablica_dat[$i] = date('Y-m-d H:i:s', $t);
            $datetime =  date('Y-m-d H:i:s', $t);
            $date_arr = explode(" ", $datetime);
            $date= $date_arr[0];
            $time= $date_arr[1];
            $query = "INSERT INTO wizyty (id_pacjenta, data, godzina) VALUES ('0', :date, :time);";
            $statement = $connect->prepare($query);
            
             try {
                 $statement->execute(
                array(
                    ':date' => $date,
                    ':time' => $time,
                )
                         
        );} catch (Exception $e) {
           
    echo '<br><br><b>BŁĄD! Prawdopodobnie zdublowane wpisy sprawdź dokładnie wykasuj lub podaj prawidłowe ramy czasowe:</b><br><br>Komunikat błędu: ',  $e->getMessage(), "\n";
     exit;
}
    }
    }
    //return $tablica_dat;
    
    
    //$dresult = mysqli_query($con, $dsql);
    
    ?>