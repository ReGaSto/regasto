<?php   
        require_once 'naglowek.php';
        require_once 'menu.php';
        //require_once '../../../config/param_db.php';
        //require_once 'PDO_bd.php';
?>

        <h1>Panel pracownika</h1>
        <?php

        if (isset($_POST['zaloguj'], $_POST['login'], $_POST['role'] )) {
                 
            $uzyt = $_POST['login'];
            $hasl = $_POST['haslo'];
            $rang = $_POST['role'];
            $sql = "SELECT role, password FROM new_user WHERE username='$uzyt'";
            //$result = mysqli_query($connect, $sql);
            $result = $connect->prepare($sql);
            $result->execute();
            $row = $result->fetch();
            //$row->execute();
            //$row = mysqli_fetch_row($result);
            
            if (($rang === $row[0])&& password_verify($hasl, $row[1])){ 
                   
                $_SESSION['zalogowany'] = true;
                $_SESSION['login'] = $uzyt;
                $_SESSION['role'] = $rang;
                echo "Zostałeś pomyślnie zalogowany <b>$uzyt</b>!";
                //echo $_SESSION['role'];
                } 
            else 
                {
                //echo $_POST['role'];
                $_SESSION = array();
                $_POST = array();
                echo "Zła ranga.";
                echo '<p><a class="page-link" href="logpanel.php">Spróbuj zalogować się jeszcze raz</a></p>';
            }
        } else {
                $_SESSION = array();
                $_POST = array();
            echo '<p><a class="page-link" href="logpanel.php">Zaloguj się by zacząć pracę.</a></p>';
           
           }

if (isset($_POST['role'], $_SESSION['zalogowany'], $_SESSION['role']) && $_SESSION['role'] === '30') {
                
                echo "<p><b>$uzyt</b> jesteś administratorem.</p>";
                ?>
                <p><a class="btn btn-success btn-lg btn-block" href="przegladanie.php">Zacznij pracę</a></p>
                <?php  
                
            } 
            elseif (isset($_POST['role'], $_SESSION['zalogowany'], $_SESSION['role']) && $_SESSION['role'] === '20') {
                
                echo "<p><b>$uzyt</b> jesteś lekarzem.</p>";
                ?>
                <p><a class="btn btn-success btn-lg btn-block" href="przegladanie.php">Zacznij pracę</a></p>
                <?php
            } 
            elseif (isset($_POST['role'], $_SESSION['zalogowany'], $_SESSION['role']) && $_SESSION['role'] === '15') {
                
                echo "<p><b>$uzyt</b> jesteś operatorem.</p>";
                ?>
                <p><a class="btn btn-success btn-lg btn-block" href="przegladanie.php">Zacznij pracę</a></p>
                <?php
            }

    require_once 'stopka.php';        
            ?>    