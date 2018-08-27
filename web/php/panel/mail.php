<?php   
        require_once 'naglowek.php';
        require_once 'menu.php';
        require_once '../../../config/param_db.php';
        require_once 'PDO_bd.php'; 
?>
        <h1>Komunikacja masowa</h1>
 <?php       
    if (isset($_SESSION['role'], $_POST['mail'], $_POST['komunikat'], $_POST['tytul']) && ($_SESSION['role'] === '30' || $_SESSION['role'] === '20' || $_SESSION['role'] === '15'))
    {
        $komunikat = $_POST['komunikat'];
        
            $mailsql = "SELECT email FROM new_user where email<>' '";
            $mailek = $connect->query($mailsql);
            $mailek->execute();
                        
            $odbiornik = $mailek->fetch( PDO::FETCH_ASSOC );
            

            while($rowm = $mailek->fetch( PDO::FETCH_ASSOC ))
	{       
                        
			$odbiornik = $rowm['email'];
                        //$odbiorcy = explode(', ', $odbiornik);
    
        $od  = "From: regasto.wsb@wp.pl".PHP_EOL."Content-type: text/plain; charset=utf-8".PHP_EOL."BCC: regasto.wsb@wp.pl";

        $tytul =  $_POST['tytul'];
        $wiadomosc = "<html>
        <head>
        </head>
        <body>
        <h2>Przychodnia ReGaSto</h2>
           <div>$komunikat</div>   
        </body>
        </html>";

        // użycie funkcji mail
        mail($odbiornik, $tytul, $wiadomosc, $od);
        }
    }
   
   
    if (isset($_SESSION['role']) && ($_SESSION['role'] === '30' || $_SESSION['role'] === '20' || $_SESSION['role'] === '15'))                 
    {   
        ?>       
                    <label for="tytul">Świetny skrypt do wysyłania powiadomień, o awariach, urlopach itp. do pacjentów i pracowników.</label>
                    <form action="mail.php" method="POST"> 
                <div class="form-group">
                    
                    <div class="col">
                    <label for="tytul">Tytuł wiadomości</label>
                    <input class="form-control" type="text" name="tytul" required/><br />
                    <label for="komunikat">Komunikat</label>
                    <textarea class="form-control" name="komunikat" placeholder="Tutaj proszę wpisać treść wiadomośći, która zostanie wysłana do wszystkich użytkowników." required/></textarea><br />   
                    </br>
                    </div>
                    <div class="row">
                    <input class="btn btn-success btn-lg btn-block" type="submit" name="mail" value="Wyślij" />
                    </div>
                    </div>
                    </form>
        <?php
    } 
    else
    {
        echo "Nie masz uprawnień do tego narzędzia.";
    }
echo "</div>";
require_once 'stopka.php';  
          ?>
