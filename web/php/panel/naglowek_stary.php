<?php
session_start();
$con = mysqli_connect('localhost', 'root', '', 'regasto');
?>
<!DOCTYPE html>
<html lang="pl-PL">
<head>
   <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--<link rel="Stylesheet" type="text/css" href="style.css" />-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <title>Panel pracownika</title>
    </head>
    <body>