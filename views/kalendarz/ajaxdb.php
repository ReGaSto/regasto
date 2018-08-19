<?php

/* Dane bazy danych*/

    define('DB_SERVER', 'localhost');

    define('DB_USERNAME', 'root');

    define('DB_PASSWORD', '');

    define('DB_NAME', 'regasto');
    
    //define ('DB_CHARSET', 'utf8'); - zrezygnowałem chwilowo
    
    try{

    $connect = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME /*. ";charset=" . DB_CHARSET*/, DB_USERNAME, DB_PASSWORD);

    // Wyłapywanie błędu połączenia w bloku try-catch


    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo 'Nawiązano połączenie z bazą!';

} catch(PDOException $e){

    die("Błąd: Nie można połączyć z bazą danych. " . $e->getMessage());

}


if(isset($_GET['ajaxTitle']))
{
 $query = "
 INSERT INTO kalendarz 
 (title, created_date) 
 VALUES (:title, :created_date);
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
 array(
   ':title'  => $_GET['ajaxTitle'],
   ':created_date' => $_GET['ajaxStart'],
  )
 );
}


?>