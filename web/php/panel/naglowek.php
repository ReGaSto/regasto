<?php
session_start();
/* Nagłówek strony z zawartymi plikami do połączenia z bazą danych wykorzystano PDO
 * linki do szablonów  Bootstrapa i ajaxa
 * M.Kurant
 */

require_once '../../../config/param_db.php';
require_once 'PDO_bd.php';
?>
<!DOCTYPE html>
<html lang="pl-PL">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

        <title>Panel pracownika</title>
    </head>
    <body style="padding-bottom: 10px">