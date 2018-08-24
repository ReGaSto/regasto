<?php   
        require_once 'naglowek.php';
        require_once 'menu.php';      
?>
        <h1>Plan dnia</h1>
        <div class="table-responsive">
<?php
            $lekarz = $_SESSION['login'];
            $pdleksql = "SELECT imie, nazwisko FROM new_user WHERE username='$lekarz'";
            $pdlek = $connect->query($pdleksql);
            $pdlek->execute();
            //pokazuje plan dnia tylko dla zalogowanego lekarza, tylko na dziś i tylko zarezerwowane godziny            
            $naimeno = $pdlek->fetch( PDO::FETCH_ASSOC );
	    $buba = implode(' ', $naimeno);
            echo $buba;
        
            $date = date("Y-n-j");
            $pdsql = "SELECT * FROM wizyty WHERE data='$date' AND id_pacjenta<>0 AND id_stomatologa='$buba'";
            
            $pdresult = $connect->query($pdsql);
            $pdresult->execute();
            $pdsql2 = "SELECT COUNT('id') AS ile FROM wizyty";
            $pdresult2 = $connect->query($pdsql2);
            $pdile = $pdresult2->execute();

        if (isset($_SESSION['role']) && $pdile>=1 && $_SESSION['role'] === '20')                 
{
            
echo '</br><table class="table table-hover table-sm table-bordered"><caption>Plan dnia lekarza <b>'.$lekarz.'</b>.</caption><thead class="thead-light"><tr>';
echo<<<END
<th>L.p.</th>
<th>Id pacjenta</th>
<th>Stomatolog</th>
<th>Data</th>
<th>Godzina</th>
</thead></tr><tr>
END;
$lp = 1;

while($row2 = $pdresult->fetch( PDO::FETCH_ASSOC ))
	{       
                        $nr = $lp++;
			$kpd1 = $row2['id_pacjenta'];
			$kpd2 = $row2['id_stomatologa'];
                        $kpd3 = $row2['data'];
                        $kpd4 = $row2['godzina'];
                                               
echo<<<END
        <td>$nr</td>                
        <td>$kpd1</td>
        <td>$kpd2</td>
        <td>$kpd3</td>
        <td>$kpd4</td>
        </tr><tr>
END;
        }
echo '</tr></table></div>';
         
        }
            else
            {
                echo "Ta strona przeznaczona jest tylko dla lekarzy.";
            }

    require_once 'stopka.php';
