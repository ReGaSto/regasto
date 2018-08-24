<?php   
        require_once 'naglowek.php';
        require_once 'menu.php';
        require_once '../../../config/param_db.php';
        require_once 'PDO_bd.php';
?>
        <h1>Generator recept</h1>
<?php   
    if (isset($_SESSION['role']) && $_SESSION['role'] === '20' )                 
    {   
    ?>           <form action="skryba.php" method="POST">
                <div class="form-group">
                    <div class="row">
                    <div class="col">
                    <label for="imie">Imię</label>
                    <input class="form-control" type="text" name="rimie" required/><br />    
                    <label for="nazwisko">Nazwisko</label>
                    <input class="form-control" type="text" name="rnazwisko" required/><br />
                    <label for="pesel">PESEL</label>
                    <input class="form-control" type="text" name="rpesel" required/><br />
                    </br>
                    <input class="btn btn-success btn-lg btn-block" type="submit" name="recepta" value="Pobierz plik PDF recepty" />
                    </div>
            </form> 
        <?php
    } 
    else
    {
        echo "Ta zakładka jest tylko dla lekarzy.";
    }

require_once 'stopka.php';  
          ?>
