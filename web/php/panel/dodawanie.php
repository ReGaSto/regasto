<?php   
        require_once 'naglowek.php';
        require_once 'menu.php';
?>

        <h1>Dodawanie użytkowników</h1>
        
<?php
//M.K dodano indeks UNIQUE email, pesel i usernamew tabeli new_user i zmieniono rangi 30,20,15,10 domyślna 10
//$con = mysqli_connect('localhost', 'root', '', 'regasto');

if (isset($_SESSION['role'], $_POST['dodaj'], $_POST['login']) && ($_SESSION['role'] === '30' || $_SESSION['role'] === '20' || $_SESSION['role'] === '15'))                 
{       $duzyt = $_POST['login'];
        echo  'Dodano użytkownika <b>'.$duzyt.'</b>!';
}
else {}

if (isset($_SESSION['zalogowany'], $_POST['dodaj']) && ($_SESSION['role'] === '30' || $_SESSION['role'] === '20' || $_SESSION['role'] === '15'))                 
{
            $duzyt = $_POST['login'];
            $dem = $_POST['email'];
            $dhasl = password_hash($_POST['haslo'], PASSWORD_DEFAULT);
            $dakey = $_POST['authKey'];
            $datok = $_POST['accessToken'];
            $drang = $_POST['role'];
            $dmie = $_POST['mieszka'];
            $dtel = $_POST['tel'];
            $dim = $_POST['imie'];
            $dnaz = $_POST['nazwisko'];
            $dnot = $_POST['notatka'];
            $dpes = $_POST['pesel'];
                      
            $dsql = "INSERT INTO new_user (username, email, password, authKey, accessToken, role, mieszka, tel, imie, nazwisko, notatka, pesel) VALUES ( '$duzyt', '$dem', '$dhasl', '$dakey', '$datok', '$drang', '$dmie', '$dtel', '$dim', '$dnaz', '$dnot', '$dpes')";
            //$dresult = mysqli_query($con, $dsql);  
            $dresult = $connect->query($dsql);
            //$ile = $dresult->execute();
            }
else
{}

if (isset($_SESSION['role']) && $_SESSION['role'] === '30' )                 
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
                    <input class="form-control" type="text" name="pesel" maxlength="11"/><br />
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
                    <input id="r1" class="form-check-input" type="radio" name="role" value="30" required>
                    <label class="form-check-label" for="r1">
                        Administrator
                    </label>
                    </div>
                    <div class="form-check">
                    <input id="r2" class="form-check-input" type="radio" name="role" value="20" required>
                    <label class="form-check-label" for="r2">
                        Lekarz
                    </label>
                    </div>
                    <div class="form-check">
                    <input id="r3" class="form-check-input" type="radio" name="role" value="15" required>
                    <label class="form-check-label" for="r3">
                        Operator
                    </label>
                    </div>
                    <div class="form-check">
                    <input id="r4" class="form-check-input" type="radio" name="role" value="10" checked required>
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
        elseif (isset($_SESSION['role']) && ($_SESSION['role'] === '20' || $_SESSION['role'] === '15'))
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
                    <input id="r4" class="form-check-input" type="radio" name="role" value="10" checked required>
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
            else
            {
                echo "Nie masz uprawnień dostępu do tych danych";
            }

    require_once 'stopka.php';
    