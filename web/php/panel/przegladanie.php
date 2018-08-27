<?php
require_once 'naglowek.php';
require_once 'menu.php';
/*
 * Super skrypt do przeglądania tabeli z użytkownikami, zróżnicowano zakres danych dostępnych dla rangi operatora (15), lekkarza (20) i administratora (30).
 * M.Kurant
 */
?>

<h1>Przeglądanie bazy danych</h1>
<div class="table-responsive">
    <?php
    $psql = "SELECT * FROM new_user";

    $presult = $connect->query($psql);
    $presult->execute();

    $psql2 = "SELECT COUNT('id') AS ile FROM new_user";
    $presult2 = $connect->query($psql2);
    $ile = $presult2->execute();


    if (isset($_SESSION['role']) && $ile >= 1 && $_SESSION['role'] === '30') {
        echo '</br><table class="table table-hover table-sm table-bordered"><caption>Lista użytkowników</br>Ranga: 30 - administrator, 20 - lekarz, 15 - operator, 10 - pacjent.</caption><thead class="thead-light"><tr>';
        // Nagłówki wprowadzam ręcznie w innym pliku (odejmowanie.php skorzystałem z innego sposobu M.Kurant
        echo<<<END
<th>ID</th>
<th>Imię</th>
<th>Nazwisko</th>
<th>PESEL</th>
<th>Adres</th>
<th>Tel.</th>
<th>E-mail</th>
<th>Login</th>
<th>Hasło</th>
<th>Notatka</th>
<th>Ranga</th>
</thead></tr><tr>
END;

        /*  Uzupełniam danymi uzyskanymi z pętli każdy wiersz tabeli
         * Hasło zakodowałem w md5 choć w bazie danych jest zaszyfrowane przez PHP DEFAULT co oznacza blowfisha,
         *  ale może być inne w zalezności od wersji PHP serwera, na to trzeba uważać.
         * M.Kurant
         */
        while ($row1 = $presult->fetch(PDO::FETCH_ASSOC)) {
            $k1 = $row1['id'];
            $k2 = $row1['imie'];
            $k3 = $row1['nazwisko'];
            $k4 = $row1['pesel'];
            $k5 = $row1['mieszka'];
            $k6 = $row1['tel'];
            $k7 = $row1['email'];
            $k8 = $row1['username'];
            $k9 = md5($row1['password']);
            $k10 = $row1['notatka'];
            $k11 = $row1['role'];

            echo<<<END
        <td>$k1</td>
        <td>$k2</td>
        <td>$k3</td>
        <td>$k4</td>
        <td>$k5</td>
        <td>$k6</td>
        <td>$k7</td>
        <td>$k8</td>
        <td>$k9</td>
        <td>$k10</td>
        <td>$k11</td>
        
</tr><tr>
END;
        }
        echo '</tr></table></div>';
    } elseif (isset($_SESSION['role']) && $ile >= 1 && $_SESSION['role'] === '20') {
        echo '</br><table class="table table-hover table-sm table-bordered"><caption>Lista użytkowników</caption><thead class="thead-light"><tr>';
        echo<<<END
<th>ID</th>
<th>Imię</th>
<th>Nazwisko</th>
<th>PESEL</th>
<th>Tel.</th>
<th>E-mail</th>
<th>Notatka</th>
</thead></tr><tr>
END;


        while ($row1 = $presult->fetch(PDO::FETCH_ASSOC)) {

            $k1 = $row1['id'];
            $k2 = $row1['imie'];
            $k3 = $row1['nazwisko'];
            $k4 = $row1['pesel'];
            $k6 = $row1['tel'];
            $k7 = $row1['email'];
            $k10 = $row1['notatka'];

            echo<<<END
        <td>$k1</td>
        <td>$k2</td>
        <td>$k3</td>
        <td>$k4</td>
        <td>$k6</td>
        <td>$k7</td>
        <td>$k10</td>
        
</tr><tr>
END;
        }
        echo '</tr></table></div>';
    } elseif (isset($_SESSION['role']) && $ile >= 1 && $_SESSION['role'] === '15') {
        echo '</br><table class="table table-hover table-sm table-bordered"><caption>Lista użytkowników</caption><thead class="thead-light"><tr>';
        echo<<<END
<th>ID</th>
<th>Imię</th>
<th>Nazwisko</th>
<th>Tel.</th>
<th>E-mail</th>
</thead></tr><tr>
END;


        while ($row1 = $presult->fetch(PDO::FETCH_ASSOC)) {

            $k1 = $row1['id'];
            $k2 = $row1['imie'];
            $k3 = $row1['nazwisko'];
            $k6 = $row1['tel'];
            $k7 = $row1['email'];

            echo<<<END
        <td>$k1</td>
        <td>$k2</td>
        <td>$k3</td>
        <td>$k6</td>
        <td>$k7</td>
        
</tr><tr>
END;
        }
        echo '</tr></table></div>';
    } else {
        echo "Nie masz uprawnień dostępu do tych danych";
    }

    require_once 'stopka.php';
    