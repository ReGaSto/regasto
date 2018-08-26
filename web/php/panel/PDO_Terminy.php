<?php
        require_once 'naglowek.php';
        require_once 'menu.php';

require_once '../../../config/param_db.php';

// Skrypt wylicza daty z godzinami co 30 minut = 1800 sekund + usuwa z tablicy godziny nierobocze

// DEKLARACJA Zmiennych
if (isset($_SESSION['zalogowany'], $_POST['dodaj']) && ($_SESSION['role'] === '30' || $_SESSION['role'] === '20' || $_SESSION['role'] === '15'))
{
    $date;
    $time;
    $data_poczatkowa = $_POST['data_poczatkowa']; // tutaj można ustawić zmienną (z datepickera)
    $data_koncowa = $_POST['data_koncowa'];  // tutaj można ustawić zmienną (z datepickera)
    /* Dane bazy danych*/

 require_once 'PDO_bd.php';



// SETUP
    $odstep_czasowy = 1800; // W sekundach
    $godziny_wylaczone = array('21', '22', '23', '00', '01', '02', '03', '04', '05', '06', '07');
    $dni_tygodnia_wylaczone = array('0', '6'); // 0 - niedziela, 6 - sobota

    $czas_poczatkowy = strtotime($data_poczatkowa);
    $czas_koncowy = strtotime($data_koncowa);

//LOGIKA
    for ($i = 0, $t = $czas_poczatkowy; $t < $czas_koncowy; $t += $odstep_czasowy, $i++) {

        if (!in_array(date('w', $t), $dni_tygodnia_wylaczone) && !in_array(date('H', $t), $godziny_wylaczone)) {
            //$tablica_dat[$i] = date('Y-m-d H:i:s', $t);
            $datetime =  date('Y-m-d H:i:s', $t);
            $date_arr = explode(" ", $datetime);
            $date= $date_arr[0];
            $time= $date_arr[1];
            $query = "INSERT INTO wizyty (id_pacjenta, data, godzina) VALUES ('0', :date, :time);";
            $statement = $connect->prepare($query);

             try {
                 $statement->execute(
                array(
                    ':date' => $date,
                    ':time' => $time,
                )

        );} catch (Exception $e) {

    echo '<br><br><b>BŁĄD! Prawdopodobnie zdublowane wpisy sprawdź dokładnie wykasuj lub podaj prawidłowe ramy czasowe:</b><br><br>Komunikat błędu: ',  $e->getMessage(), "\n";
     
}
    }
    }
            }
else
{}
    if (isset($_SESSION['role']) && $_SESSION['role'] === '30' )
{
    ?>
<H1>Generator WOLNYCH Terminów do bazy</H1>
<p>Tutaj Można dodawać wolne terminy do systemu. W celu usunięcia świąt Administrator powinien dokonać rezerwacji danych terminów</p>
    <form action="PDO_Terminy.php" method="POST">
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="data_poczatkowa">Data początkowa w formacie RRRR-MM-DD GG:MM:00</label>
                    <input class="form-control" type="text" name="data_poczatkowa" maxlength="19" required/><br />
                    <label for="data_koncowa">Data końcowa w formacie RRRR-MM-DD GG:MM:00</label>
                    <input class="form-control" type="text" name="data_koncowa" maxlength="19" required/><br />
                </div>
            </div>
            <input type="hidden" id="accessToken" name="accessToken" value="<?php echo password_hash(random_bytes(10), PASSWORD_DEFAULT); ?>">
            <input type="hidden" id="authKey" name="authKey" value="<?php echo md5(random_bytes(5)); ?>">
            <div class="col">
                </br>
                <input class="btn btn-success btn-lg btn-block" type="submit" name="dodaj" value="Dodaj" />
            </div>
        </div>
    </form>
        <?php
        }
        elseif (isset($_SESSION['role']) && ($_SESSION['role'] === '20' || $_SESSION['role'] === '15'))
        {
    ?>
    <form action="PDO_Terminy.php" method="POST">
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="data_poczatkowa">Data początkowa w formacie RRRR-MM-DD GG:MM:00</label>
                    <input class="form-control" type="text" name="data_poczatkowa" maxlength="19" required/><br />
                    <label for="data_koncowa">Data końcowa w formacie RRRR-MM-DD GG:MM:00</label>
                    <input class="form-control" type="text" name="data_koncowa" maxlength="19" required/><br />
                </div>
            </div>
            <input type="hidden" id="accessToken" name="accessToken" value="<?php echo password_hash(random_bytes(10), PASSWORD_DEFAULT); ?>">
            <input type="hidden" id="authKey" name="authKey" value="<?php echo md5(random_bytes(5)); ?>">
            <div class="col">
                </br>
                <input class="btn btn-success btn-lg btn-block" type="submit" name="dodaj" value="Dodaj" />
            </div>
        </div>
    </form>
        <?php
        }
            else
            {
                echo "Nie masz uprawnień dostępu do tych danych";
            }

require_once 'stopka.php';

    ?>

