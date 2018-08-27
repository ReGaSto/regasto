<?php
require_once 'naglowek.php';
require_once 'menu.php';
?>

<h1>Zmienianie danych użytkowników</h1>

<?php
//M.K dodano indeks UNIQUE email, pesel i usernamew tabeli new_user i zmieniono rangi 30,20,15,10 domyślna 10
//$con = mysqli_connect('localhost', 'root', '', 'regasto');  - stary sposób łączenia się do bazy danych

if (isset($_SESSION['role'], $_POST['zmien'], $_POST['zlogin']) && ($_SESSION['role'] === '30' || $_SESSION['role'] === '20' || $_SESSION['role'] === '15')) {
    $zuzyt = $_POST['zlogin'];
    echo 'Zmieniono użytkownika <b>' . $zuzyt . '</b>!';
} else {
    
}

//Zabezpieczenie przed nadpisaniem danych w bazie przez puste pole i zagwarantowanie poprawnego wykonania zapytania SQL
//email
if (isset($_POST['zemail']) && $_POST['zemail'] <> '') {
    $zem = $_POST['zemail'];
    $zem2 = "email='$zem',";
} else {
    $zem2 = '';
    //echo 'Brak e-maila do wprowadzenia.';
}
//hasło
if (isset($_POST['zhaslo']) && $_POST['zhaslo'] <> '') {
    $zhasl = password_hash($_POST['zhaslo'], PASSWORD_DEFAULT);
    $zhasl2 = "password='$zhasl',";
} else {
    $zhasl2 = '';
    //echo 'Brak hasła do wprowadzenia.';
}
//ranga
if (isset($_POST['zrole']) && $_POST['zrole'] <> '') {
    $zrole = $_POST['zrole'];
    $zrole2 = "role='$zrole',";
} else {
    $zrole2 = '';
    //echo 'Brak rangi do wprowadzenia.';
}
//adres zamieszkania
if (isset($_POST['zmieszka']) && $_POST['zmieszka'] <> '') {
    $zmie = $_POST['zmieszka'];
    $zmie2 = "mieszka='$zmie',";
} else {
    $zmie2 = '';
    //echo 'Brak adresu do wprowadzenia.';
}
//telefon
if (isset($_POST['ztel']) && $_POST['ztel'] <> '') {
    $ztel = $_POST['ztel'];
    $ztel2 = "tel='$ztel',";
} else {
    $ztel2 = '';
    //echo 'Brak telefonu do wprowadzenia.';
}
//imie
if (isset($_POST['zimie']) && $_POST['zimie'] <> '') {
    $zim = $_POST['zimie'];
    $zim2 = "imie='$zim',";
} else {
    $zim2 = '';
    //echo 'Brak imienia do wprowadzenia.';
}
//nazwisko
if (isset($_POST['znazwisko']) && $_POST['znazwisko'] <> '') {
    $znaz = $_POST['znazwisko'];
    $znaz2 = "nazwisko='$znaz',";
} else {
    $znaz2 = '';
    //echo 'Brak nazwiska do wprowadzenia.';
}
//notatka
if (isset($_POST['znotatka']) && $_POST['znotatka'] <> '') {
    $znot = $_POST['znotatka'];
    $znot2 = "notatka='$znot',";
} else {
    $znot2 = '';
    //echo 'Brak notatki do wprowadzenia.';
}
//pesel
if (isset($_POST['zpesel']) && $_POST['zpesel'] <> '') {
    $zpes = $_POST['zpesel'];
    $zpes2 = "pesel='$zpes',";
} else {
    $zpes2 = '';
    //echo 'Brak peselu do wprowadzenia.';
}


//Wykonuję zmiany w bazie danych
/* Super sposób na zmianę tylko wprowadzonymi do formularza danymi można to rozbudować ale poprzestałem na tym.
 * pojedyncze zmienne zamieniłem na tablicę i ciąg string później ucinam przecinek na końcu bo inaczej zapytanie SQL wyrzuca ERROR.
 * M.Kurant
 */
if (isset($_SESSION['zalogowany'], $_POST['zmien'], $zem2, $zhasl2, $zrole2, $zmie2, $ztel2, $zim2, $znaz2, $znot2, $zpes2) && (($zem2 || $zhasl2 || $zrole2 || $zmie2 || $ztel2 || $zim2 || $znaz2 || $znot2 || $zpes2) <> '') && ($_SESSION['role'] === '30' || $_SESSION['role'] === '20' || $_SESSION['role'] === '15')) {
    $wartosci = array($zem2, $zhasl2, $zrole2, $zmie2, $ztel2, $zim2, $znaz2, $znot2, $zpes2);
    $przecinek = implode(" ", $wartosci);
    $bezprzecinka = rtrim($przecinek, ',');

    $zsql = "UPDATE new_user SET $bezprzecinka WHERE username = '$zuzyt'";

    $zresult = $connect->query($zsql);

    echo 'Zmieniono użytkownika <b>' . $zuzyt . '</b>!';
    echo "<p>$zsql</p>";
} else {
    //echo '<b>Po co wysyłasz formularz skoro nie wprowadziłeś danych do zmiany?!</b>';
}

if (isset($_SESSION['role']) && $_SESSION['role'] === '30') {
    ?>
    <form action="zmienianie.php" method="POST"> 
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="zimie">Imię</label>
                    <input class="form-control" type="text" name="zimie"/><br />    
                    <label for="zemail">E-mail</label>
                    <input class="form-control" type="email" name="zemail" maxlength="80"><br />
                    <label for="zpesel">PESEL</label>
                    <input class="form-control" type="text" name="zpesel" maxlength="11"/><br />
                </div>
                <div class="col">
                    <label for="znazwisko">Nazwisko</label>
                    <input class="form-control" type="text" name="znazwisko"/><br />
                    <label for="zhaslo">Hasło</label>
                    <input class="form-control" type="password" name="zhaslo" maxlength="60"/><br />
                    <label for="ztel">Telefon</label>
                    <input class="form-control" type="tel" name="ztel" /><br />
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="zmieszka">Adres</label>
                    <textarea class="form-control" name="zmieszka"/></textarea><br />
                </div>
                <div class="col">
                    <label for="znotatka">Notatka</label>
                    <textarea class="form-control" name="znotatka" placeholder="Tutaj znajdują się uwagi na temat przebiegu leczenia pacjenta..."/></textarea><br />
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label>Ranga:</label>
                    <div class="form-check">
                        <input id="zr1" class="form-check-input" type="radio" name="zrole" value="30">
                        <label class="form-check-label" for="r1">
                            Administrator
                        </label>
                    </div>
                    <div class="form-check">
                        <input id="zr2" class="form-check-input" type="radio" name="zrole" value="20">
                        <label class="form-check-label" for="r2">
                            Lekarz
                        </label>
                    </div>
                    <div class="form-check">
                        <input id="zr3" class="form-check-input" type="radio" name="zrole" value="15">
                        <label class="form-check-label" for="r3">
                            Operator
                        </label>
                    </div>
                    <div class="form-check">
                        <input id="zr4" class="form-check-input" type="radio" name="zrole" value="10">
                        <label class="form-check-label" for="r4">
                            Pacjent
                        </label>
                    </div>
                </div>
                <div class="col">
                    <label for="zlogin">Podaj <b>login</b> zmienianego użytkownika:</label>
                    <input class="form-control" type="text" name="zlogin" maxlength="80" required autofocus/><br />
                </div>
            </div>

            <div class="col">
                </br>
                <input class="btn btn-success btn-lg btn-block" type="submit" name="zmien" value="Zmień" />
            </div>

    </form>
    <?php
} elseif (isset($_SESSION['role']) && ($_SESSION['role'] === '20' || $_SESSION['role'] === '15')) {
    ?>
    <form action="zmienianie.php" method="POST"> 
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="zimie">Imię</label>
                    <input class="form-control" type="text" name="zimie"/><br />    
                    <label for="zemail">E-mail</label>
                    <input class="form-control" type="email" name="zemail" maxlength="80"><br />
                    <label for="zpesel">PESEL</label>
                    <input class="form-control" type="text" name="zpesel" maxlength="11"/><br />
                </div>
                <div class="col">
                    <label for="znazwisko">Nazwisko</label>
                    <input class="form-control" type="text" name="znazwisko"/><br />
                    <label for="zhaslo">Hasło</label>
                    <input class="form-control" type="password" name="zhaslo" maxlength="60"/><br />
                    <label for="ztel">Telefon</label>
                    <input class="form-control" type="tel" name="ztel" /><br />
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="zmieszka">Adres</label>
                    <textarea class="form-control" name="zmieszka"/></textarea><br />
                </div>
                <div class="col">
                    <label for="znotatka">Notatka</label>
                    <textarea class="form-control" name="znotatka" placeholder="Tutaj znajdują się uwagi na temat przebiegu leczenia pacjenta..."/></textarea><br />
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label>Ranga:</label>
                    <div class="form-check">
                        <input id="zr4" class="form-check-input" type="radio" name="zrole" value="10">
                        <label class="form-check-label" for="r4">
                            Pacjent
                        </label>
                    </div>
                </div>
                <div class="col">
                    <label for="zlogin">Podaj <b>login</b> zmienianego użytkownika:</label>
                    <input class="form-control" type="text" name="zlogin" maxlength="80" required autofocus/><br />
                </div>
            </div>

            <div class="col">
                </br>
                <input class="btn btn-success btn-lg btn-block" type="submit" name="zmien" value="Zmień" />
            </div>

    </form>
    </div>
    </div>
    <?php
} else {
    echo "Nie masz uprawnień dostępu do tych danych";
}

echo "</div>";
require_once 'stopka.php';
