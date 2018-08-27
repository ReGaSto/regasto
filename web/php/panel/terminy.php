<?php
require_once 'naglowek.php';
require_once 'menu.php';
require_once '../../../config/param_db.php';
require_once 'PDO_bd.php';
?>
<h1>Generatory terminów do bazy danych</h1>
<?php

/*
 * To stronka z odnośnikami do generatorów Bartka, które pomagają w uzupełnianiu bazy danych o wolne terminy i dni wolne dla stomatologów.
 * 
 * M.Kurant
 */
if (isset($_SESSION['role']) && ($_SESSION['role'] === '30' || $_SESSION['role'] === '20' || $_SESSION['role'] === '15')) {
    ?>           
    <div class="form-group">
        </br>
        <div class="row" style="padding-bottom: 1em">
            <div class="col">
                <a class="btn btn-success btn-lg btn-block" href="PDO_Terminy.php">Generator wolnych terminów</a>
            </div>
            </br>
        </div>
        <div class="row">
            <div class="col">
                <a class="btn btn-success btn-lg btn-block" href="PDO_Wolne.php">Generator dni wolnych od pracy</a>
            </div>
        </div>
        <?php
    } else {
        echo "Nie maszz uprawnień do tego narzędzia.";
    }
    echo "</div>";
    require_once 'stopka.php';
    ?>
