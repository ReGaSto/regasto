<?php

// Skrypt PHP łączący się z BD - Licencja RPK - Rób Pan Kody jak pan se chce.

// Tutaj pobiera plik z konfiguracją BD Regasto
require_once '../../../config/param_db.php';

Echo 'Generacja Terminów do Wizyt<br><br>';
// Skrypt wylicza daty z godzinami co 30 minut = 1800 sekund + usuwa z tablicy godziny nierobocze
    
// DEKLARACJA Zmiennych
    $date;
    $time;
    /* Dane bazy danych*/

    define('DB_SERVER', $adres_serwera); // TUTAJ dodałbym zmienne które byłyby zintegrowane z plikiem db.php z Yii2 dzięki temu zmiana BD tam zgra się z tym

    define('DB_USERNAME', $nazwa_uzytkownika);

    define('DB_PASSWORD', $haslo);

    define('DB_NAME', $nazwa_bazy);
    
    //define ('DB_CHARSET', $kodowanie); - chwilowo wyłączone
    
   /* // W dalszej części po dołączeniu tego pliku w nagłówku php require_once 'PDO_bd.php' należy użyć kodu poniżej!
    * 
    * // Wskazówka: Aby łatwo usunąć gwiazdki w Netbeans i nie tylko należy uruchomić edycję wielowierszową
    * // (Rectangular Selection) CTRL+SHIFT+R zaznaczyć wszystkie wiersze zaraz przed lub za gwiazdką i skasować dwoma ruchami potem wyłączyć RS
    * // Nie robiłem już funkcji bo nie wiem ile parametrów i danych trzeba dodać, więc wystarczy rozwinąć poniższy kod
    *  
    * // Przygotowanie szablonu zapytania do BD (Może być dowolna komenda oczywiście)
    * 
    * $kwerenda = "INSERT INTO nazwa_tabeli (kolumna1, kolumna2, kolumna3) VALUES ('jakis ciag przykladowy', :dane_do_bd1, :dane_do_bd2);";
    * 
    * // Tworzenie wyrażenia do połączenia z bazą danych
    *             
    * $wyrazenie = $connect->prepare($kwerenda);
    * 
    * // Egzekucja wyrażenia z tablicą parametrów
    * $wyrazenie->execute(
                array(
                    ':dane_do_bd1' => 'przykladowy ciag znakow',
                    ':dane_do_bd2' => $przykladowa_zmienna,
                )
    * 
    * 
    */ 
