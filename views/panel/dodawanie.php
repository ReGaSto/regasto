<?php   
        require_once 'naglowek.php';
        require_once 'menu.php';
?>

        <h1>Dodawanie użytkowników</h1>
        
<?php
$con = mysqli_connect('localhost', 'root', '', 'regasto');


if (isset($_SESSION['zalogowany'], $_POST['dodaj']) && ($_SESSION['ranga'] === '1' || $_SESSION['ranga'] === '2' || $_SESSION['ranga'] === '3'))                 
{
            $duzyt = $_POST['login'];
            $dem = $_POST['email'];
            $dhasl = password_hash($_POST['haslo'], PASSWORD_DEFAULT);
            $dakey = $_POST['authKey'];
            $datok = $_POST['accessToken'];
            $drang = $_POST['ranga'];
            $dmie = $_POST['mieszka'];
            $dtel = $_POST['tel'];
            $dim = $_POST['imie'];
            $dnaz = $_POST['nazwisko'];
            $dnot = $_POST['notatka'];
            $dpes = $_POST['pesel'];
            $dsql = "INSERT INTO new_user (username, email, password, authKey, accessToken, ranga, mieszka, tel, imie, nazwisko, notatka, pesel) VALUES ( '$duzyt', '$dem', '$dhasl', '$dakey', '$datok', '$drang', '$dmie', '$dtel', '$dim', '$dnaz', '$dnot', '$dpes')";
            $dresult = mysqli_query($con, $dsql);            
}
else
{}

if (isset($_SESSION['ranga']) && $_SESSION['ranga'] === '1' )                 
{
    ?>
            <form action="dodawanie.php" method="POST"> 
                <div class="form-group">
                    <div class="row">
                    <div class="col">
                    <label for="imie">Imię</label>
                    <input class="form-control" type="text" name="imie"/><br />    
                    <label for="login">Login</label>
                    <input class="form-control" type="text" name="login" maxlength="80" required/><br />
                    <label for="email">E-mail</label>
                    <input class="form-control" type="email" name="email" maxlength="80" required/><br />
                    <label for="pesel">PESEL</label>
                    <input class="form-control" type="text" name="pesel" /><br />
                    </div>
                    <div class="col">
                    <label for="nazwisko">Nazwisko</label>
                    <input class="form-control" type="text" name="nazwisko"/><br />
                    <label for="haslo">Hasło</label>
                    <input class="form-control" type="password" name="haslo" maxlength="60" required/><br />
                    <label for="tel">Telefon</label>
                    <input class="form-control" type="tel" name="tel" /><br />
                    </div>
                    </div>
                    <div class="row">
                    <div class="col">
                    <label for="mieszka">Adres</label>
                    <textarea class="form-control" name="mieszka"/></textarea><br />
                    </div>
                    <div class="col">
                    <label for="notatka">Notatka</label>
                    <textarea class="form-control" name="notatka"/></textarea><br />
                    </div>
                    </div>
                    <div class="row">
                    <label>Ranga:</label>
                    </div>
                    <div class="form-check">
                    <input id="r1" class="form-check-input" type="radio" name="ranga" value="1" required>
                    <label class="form-check-label" for="r1">
                        Administrator
                    </label>
                    </div>
                    <div class="form-check">
                    <input id="r2" class="form-check-input" type="radio" name="ranga" value="2" required>
                    <label class="form-check-label" for="r2">
                        Lekarz
                    </label>
                    </div>
                    <div class="form-check">
                    <input id="r3" class="form-check-input" type="radio" name="ranga" value="3" required>
                    <label class="form-check-label" for="r3">
                        Operator
                    </label>
                    </div>
                    <div class="form-check">
                    <input id="r4" class="form-check-input" type="radio" name="ranga" value="0" checked required>
                    <label class="form-check-label" for="r4">
                        Pacjent
                    </label>
                    </div>
                    </div>
                    <input type="hidden" id="accessToken" name="accessToken" value="<?php echo password_hash(random_bytes(10),  PASSWORD_DEFAULT); ?>"> 
                    <input type="hidden" id="authKey" name="authKey" value="<?php echo md5(random_bytes(5)); ?>">
                    <div class="col">
                    </br>
                    <input class="btn btn-success btn-lg btn-block" type="submit" name="dodaj" value="Dodaj" />
                    </div>
                    
            </form>
        <?php
        }
        elseif (isset($_SESSION['ranga']) && ($_SESSION['ranga'] === '2' || $_SESSION['ranga'] === '3'))
        {
    ?>
            <form action="dodawanie.php" method="POST"> 
                <div class="form-group">
                    <div class="row">
                    <div class="col">
                    <label for="imie">Imię</label>
                    <input class="form-control" type="text" name="imie"/><br />    
                    <label for="login">Login</label>
                    <input class="form-control" type="text" name="login" required/><br />
                    <label for="email">E-mail</label>
                    <input class="form-control" type="email" name="email" required/><br />
                    <label for="pesel">PESEL</label>
                    <input class="form-control" type="text" name="pesel" /><br />
                    </div>
                    <div class="col">
                    <label for="nazwisko">Nazwisko</label>
                    <input class="form-control" type="text" name="nazwisko"/><br />
                    <label for="haslo">Hasło</label>
                    <input class="form-control" type="password" name="haslo" required/><br />
                    <label for="tel">Telefon</label>
                    <input class="form-control" type="tel" name="tel" /><br />
                    </div>
                    </div>
                    <div class="row">
                    <div class="col">
                    <label for="mieszka">Adres</label>
                    <textarea class="form-control" name="mieszka"/></textarea><br />
                    </div>
                    <div class="col">
                    <label for="notatka">Notatka</label>
                    <textarea class="form-control" name="notatka"/></textarea><br />
                    </div>
                    </div>
                    <div class="row">
                    <label>Ranga:</label>
                    </div>
                    <div class="form-check">
                    <input id="r4" class="form-check-input" type="radio" name="ranga" value="0" checked required>
                    <label class="form-check-label" for="r4">
                        Pacjent
                    </label>
                    </div>
                    </div>
                    <input type="hidden" id="accessToken" name="accessToken" value="<?php echo md5(random_bytes(5)); ?>"> 
                    <input type="hidden" id="authKey" name="authKey" value="<?php echo password_hash(random_bytes(10),  PASSWORD_DEFAULT); ?>">
                    <div class="col">
                    </br>
                    <input class="btn btn-success btn-lg btn-block" type="submit" name="dodaj" value="Dodaj" />
                    </div>
                    
            </form>
        <?php
        }
            else
            {
                echo "Nie masz uprawnień dostępu do tych danych";
            }

    require_once 'stopka.php';
    