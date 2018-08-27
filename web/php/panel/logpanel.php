<?php
require_once 'naglowek.php';
require_once 'menu.php';
//Formularz logowania do panelu pracownika M.Kurant
?>
<h1>Panel pracownika</h1>

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
require_once 'stopka.php';
?>

