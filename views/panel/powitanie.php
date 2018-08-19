<?php   
        require_once 'naglowek.php';
        require_once 'menu.php';
?>

        <h1>Panel pracownika</h1>
        <?php

        if (isset($_POST['zaloguj'], $_POST['login'], $_POST['ranga'])) {
                 
            $uzyt = $_POST['login'];
            $hasl = $_POST['haslo'];
            $rang = $_POST['ranga'];
            $sql = "SELECT ranga, password FROM new_user WHERE username=$uzyt";
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_row($result);
            
            if (($rang[0] === $row[0]) && password_verify($hasl, $row[1])){
                   
                $_SESSION['zalogowany'] = true;
                $_SESSION['login'] = $uzyt;
                $_SESSION['ranga'] = $rang[0];
                echo "Zostałeś pomyślnie zalogowany <b>$uzyt</b>!";
                echo $_SESSION['ranga'];
                } 
            else 
                {
                $_SESSION = array();
                $_POST = array();
                echo "Zła ranga";
                echo '<p><a class="page-link" href="logpanel.php">Spróbuj zalogować się jeszcze raz</a></p>';
            }
        } else {
                $_SESSION = array();
                $_POST = array();
            echo '<p><a class="page-link" href="logpanel.php">Zaloguj się by zacząć pracę.</a></p>';
           
           }

if (isset($_POST['ranga'], $_SESSION['zalogowany'], $_SESSION['ranga']) && $_SESSION['ranga'] === '1') {
                
                echo "<p><b>$uzyt</b> jesteś administratorem.</p>";
                ?>
                <p><a class="btn btn-success btn-lg btn-block" href="przegladanie.php">Zacznij pracę</a></p>
                <?php  
                
            } 
            elseif (isset($_POST['ranga'], $_SESSION['zalogowany'], $_SESSION['ranga']) && $_SESSION['ranga'] === '2') {
                
                echo "<p><b>$uzyt</b> jesteś lekarzem.</p>";
                ?>
                <p><a class="btn btn-success btn-lg btn-block" href="przegladanie.php">Zacznij pracę</a></p>
                <?php
            } 
            elseif (isset($_POST['ranga'], $_SESSION['zalogowany'], $_SESSION['ranga']) && $_SESSION['ranga'] === '3') {
                
                echo "<p><b>$uzyt</b> jesteś operatorem.</p>";
                ?>
                <p><a class="btn btn-success btn-lg btn-block" href="przegladanie.php">Zacznij pracę</a></p>
                <?php
            }

    require_once 'stopka.php';        
            ?>    