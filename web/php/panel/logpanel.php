<?php   
        require_once 'naglowek.php';
        require_once 'menu.php';

?>
        <h1>Panel pracownika</h1>
        <?php
/*
        if (isset($_POST['zaloguj'], $_POST['login'], $_POST['role'])) {
                 
            $uzyt = $_POST['login'];
            $hasl = password_hash($_POST['haslo'], PASSWORD_DEFAULT);
            $rang = $_POST['role'];
            $sql = "SELECT role FROM new_user WHERE username=$uzyt AND password=$hasl";
            $result = mysqli_query($connect, $sql);
            $row = mysqli_fetch_row($result);
            echo $hasl;
            echo $row[0];
            echo $rang;
            if ($rang === $row[0]) {
                   
                $_SESSION['zalogowany'] = true;
                $_SESSION['login'] = $uzyt;
                $_SESSION['role'] = $rang[0];
                echo "Zostałeś pomyślnie zalogowany <b>$uzyt</b>!";
                echo $rang;
                } 
            else 
                {
                $_SESSION = array();
                $_POST = array();
                echo "Zła ranga.";
                echo '<p><a class="page-link" href="logpanel.php">Spróbuj zalogować się jeszcze raz</a></p>';
            }
        } else {
                $_SESSION = array();
                $_POST = array();
            echo '<p>Zaloguj się by zacząć pracę.</p>';
           
 * 
 */
            ?>
 
 
            <form action="powitanie.php" method="POST"> 
                <div class="form-group">
                    <div class="row">
                    <div class="col">
                    <label for="login">Login</label>
                    <input class="form-control" type="text" name="login" /><br />
                    </div>
                    <div class="col">
                    <label for="haslo">Hasło</label>
                    <input class="form-control" type="password" name="haslo" /><br />
                    </div>
                    </div>
                    <div class="row">
                    <label>Ranga:</label>
                    </div>
                    <div class="form-check">
                    <input id="r1" class="form-check-input" type="radio" name="role" value="30">
                    <label class="form-check-label" for="r1">
                        Administrator
                    </label>
                    </div>
                    <div class="form-check">
                    <input id="r2" class="form-check-input" type="radio" name="role" value="20">
                    <label class="form-check-label" for="r2">
                        Lekarz
                    </label>
                    </div>
                    <div class="form-check">
                    <input id="r3" class="form-check-input" type="radio" name="role" value="15">
                    <label class="form-check-label" for="r3">
                        Operator
                    </label>
                    </div>
                    </div>
                    <div class="col">
                    </br>
                    <input class="btn btn-success btn-lg btn-block" type="submit" name="zaloguj" value="Zaloguj" />
                    </div>
                    
            </form>
    <?php
            //}   
          require_once 'stopka.php';  
          ?>

