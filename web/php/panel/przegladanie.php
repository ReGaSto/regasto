<?php   
        require_once 'naglowek.php';
        require_once 'menu.php';
        //require_once '../../../config/param_db.php';
        //require_once 'PDO_bd.php';
?>

        <h1>Przeglądanie bazy danych</h1>
        <div class="table-responsive">
<?php
//$con = mysqli_connect('localhost', 'root', '', 'regasto');
$psql = "SELECT * FROM new_user";
//$presult = mysqli_query($con, $psql);
//$ile = mysqli_num_rows($result); 
            $presult = $connect->query($psql);
            $presult->execute();
            //$presult->store_result();
            $psql2 = "SELECT COUNT('id') AS ile FROM new_user";
            $presult2 = $connect->query($psql2);
            $ile = $presult2->execute();
            //print_r($ile);
            //$row = $presult->fetch();

        if (isset($_SESSION['role']) && $ile>=1 && $_SESSION['role'] === '30')                 
{
echo '</br><table class="table table-hover table-sm table-bordered"><caption>Lista użytkowników</br>Ranga: 30 - administrator, 20 - lekarz, 15 - operator, 10 - pacjent.</caption><thead class="thead-light"><tr>';
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

//for ($i = 1; $i <= $ile; $i++ ) 
while($row1 = $presult->fetch( PDO::FETCH_ASSOC ))
	{       //$row1 = $presult->fetch( PDO::FETCH_ASSOC );
                //$row1 = mysqli_fetch_assoc($presult);
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
         
        }
        elseif (isset($_SESSION['role']) && $ile>=1 && $_SESSION['role'] === '20')
        {
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

//for ($i = 1; $i <= $ile; $i++)
while($row1 = $presult->fetch( PDO::FETCH_ASSOC ))
	{
		//$row1 = mysqli_fetch_assoc($presult);
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
        elseif (isset($_SESSION['role']) && $ile>=1 && $_SESSION['role'] === '15')
        {
echo '</br><table class="table table-hover table-sm table-bordered"><caption>Lista użytkowników</caption><thead class="thead-light"><tr>';    
echo<<<END
<th>ID</th>
<th>Imię</th>
<th>Nazwisko</th>
<th>Tel.</th>
<th>E-mail</th>
</thead></tr><tr>
END;

//for ($i = 1; $i <= $ile; $i++) 
while($row1 = $presult->fetch( PDO::FETCH_ASSOC ))
	{
		//$row1 = mysqli_fetch_assoc($presult);
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
