<?php

// Zmienne dostępu BD do wykorzystania w modułach poza Yii w pliku param_db.php
require_once 'param_db.php';

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host='.$adres_serwera.';dbname='.$nazwa_bazy,
    'username' => $nazwa_uzytkownika,
    'password' => $haslo,
    'charset' => $kodowanie,

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
