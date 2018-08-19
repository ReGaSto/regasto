<?php   
        require_once 'naglowek.php';
        require_once 'menu.php';
?>

        <h1>Dodawanie użytkowników</h1>
        
<?php
$con = mysqli_connect('localhost', 'root', '', 'regasto');
$sql = "SELECT * FROM new_user";
            $result = mysqli_query($con, $sql);

$ile = mysqli_num_rows($result); 

if (isset($_SESSION['zalogowany'], $_POST['dodaj']) && $_SESSION['ranga'] === '1')                 
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
            //$drow = mysqli_fetch_row($dresult);
            //echo $drow[0];
            
}
else
{
    echo "nic do dodania";
}

if (isset($_SESSION['ranga']) && $ile>=1 && $_SESSION['ranga'] === '1')                 
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
                    <input type="hidden" id="accessToken" name="accessToken" value="<?php echo md5(random_bytes(5)); ?>"> 
                    <input type="hidden" id="authKey" name="authKey" value="<?php echo password_hash(random_bytes(10),  PASSWORD_DEFAULT); ?>">
                    <div class="col">
                    </br>
                    <input class="btn btn-success btn-lg btn-block" type="submit" name="dodaj" value="Dodaj" />
                    </div>
                    
            </form>
        <?php
        }
        elseif (isset($_SESSION['ranga']) && $ile>=1 && $_SESSION['ranga'] === '2')
        {
echo '</br><table class="table table-hover table-sm table-bordered"><caption>Lista użytkowników</caption><thead class="thead-light"><tr>';    
echo<<<END
<th>ID</th>
<th>Imię</th>
<th>Nazwisko</th>
<th>PESEL</th>
<th>Tel.</th>
<th>E-mail</th>
<th>Login</th>
</thead></tr><tr>
END;

for ($i = 1; $i <= $ile; $i++) 
	{
		$row1 = mysqli_fetch_assoc($result);
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
         
        }
        elseif (isset($_SESSION['ranga']) && $ile>=1 && $_SESSION['ranga'] === '3')
        {
echo '</br><table class="table table-hover table-sm table-bordered"><caption>Lista użytkowników</caption><thead class="thead-light"><tr>';    
echo<<<END
<th>ID</th>
<th>Imię</th>
<th>Nazwisko</th>
<th>Tel.</th>
<th>E-mail</th>
<th>Login</th>
</thead></tr><tr>
END;

for ($i = 1; $i <= $ile; $i++) 
	{
		$row1 = mysqli_fetch_assoc($result);
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
         
        }
            else
            {
                echo "Nie masz uprawnień dostępu do tych danych";
            }

    require_once 'stopka.php';
    