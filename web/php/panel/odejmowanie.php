<?php   
        require_once 'naglowek.php';
        require_once 'menu.php';
?>

        <h1>Operacje zaawansowane</h1>
        </br>
<?php
$con = mysqli_connect('localhost', 'root', '', 'regasto');

if (isset($_SESSION['zalogowany'], $_POST['usun']) && ($_SESSION['role'] === '30'))                 
{
            $uem = $_POST['email'];
            $unaz = $_POST['nazwisko'];
            $dsql = "DELETE FROM new_user WHERE email='$uem' AND nazwisko='$unaz'";
            $dresult = mysqli_query($con, $dsql);  
            echo "Usunięto użytkownika";
}
else
{}

if (isset($_SESSION['zalogowany'], $_POST['wsql'], $_POST['wykonaj']) && ($_SESSION['role'] === '30'))
{
            $wsql = $_POST['wsql'];
            $wresult = mysqli_query($con, $wsql);  
            echo "Zapytanie <b>$wsql</b> wykonano!";
}
else
{}

if (isset($_SESSION['zalogowany']) && ($_SESSION['role'] === '30'))
{
?>    
        <div class="form-group border">
                    <div class="container">
        <h5><label for="etab">Zobacz strukturę wybranej tabeli z bazy danych:</label></h5> 
            <form name="etab" action="odejmowanie.php" method="POST"> 
                    <div class="row">
                    <div class="col">
                    <label for="etab">Wybierz nazwę tabeli</label>
                    <select class="form-control form-control-sm" name='etab' required><option value=' '> </option>
            <?php $tsql="show tables";
                    $tresult=mysqli_query($con,$tsql);
                    while ($trow=mysqli_fetch_array($tresult))
                    {
                    echo"<option value=$trow[0]>$trow[0]</option>";
                    } 
            ?>
                    </select>
                    </div>
                        <div class="col"></br>
                    <input class="btn btn-success" type="submit" name="explain" value="Pokaż strukturę" />
                    </div>
                    </div></br>
                    </div>
        </div>
            </form>
          <?php     
if (isset($_SESSION['role'], $_POST['etab']) && $_SESSION['role'] === '30' )                 
{
    $etab = $_POST['etab'];
    $esql = "DESCRIBE $etab";
            $eresult = mysqli_query($con, $esql);
            $eile = mysqli_num_rows($eresult);
            
            $i = mysqli_fetch_array($eresult);
            
            for($eile = 0; $eile < $i; $eile++) {
                echo '<table class="table table-hover table-sm table-bordered"><caption>Struktura tabeli <b>'.$etab.'</b>.</caption><thead class="thead-light">';
                echo "<th>$i[0]</th>"; 
                while($i = mysqli_fetch_array($eresult)){
                       
            echo "<th>{$i['Field']}</th>";
            }   
            echo "</thead></table>";
            }
}  
}

if (isset($_SESSION['role']) && $_SESSION['role'] === '30' )                 
{
    ?>      
            </br>
                 <div class="form-group border">
                    <div class="container">       
            <h5><label for="odejmowanie">Podaj adres e-mail oraz nazwisko użytkownika do usunięcia z bazy użytkowników:</label></h5> 
            <form name="odejmowanie" action="odejmowanie.php" method="POST"> 
                    <div class="row">
                    <div class="col">
                    <label for="email">E-mail</label>    
                    <input class="form-control form-control-sm" type="email" name="email" required/><br />
                    </div>
                    <div class="col">
                    <label for="nazwisko">Nazwisko</label>
                    <input class="form-control form-control-sm" type="text" name="nazwisko" required/><br />
                    </div>
                    <div class="col"></br>
                    <input class="btn btn-success btn" type="submit" name="usun" value="Usuń" />
                    </div>
                    </div>
                    </div>
                </div>   
            </form>
                        </br>
                 <div class="form-group border">
                    <div class="container">       
            <h5><label for="operacjja">Wpisz zapytanie MySQL do wykonania na bazie danych "regasto":</label></h5> 
            <form name="operacja" action="odejmowanie.php" method="POST"> 
                    <div class="row">
                    <div class="col">
                    <label for="email">Zapytanie SQL</label>    
                    <input class="form-control form-control-sm" type="text" name="wsql" required/><br />
                    </div>
                    <div class="col"></br>
                    <input class="btn btn-success btn" type="submit" name="wykonaj" value="Wykonaj" />
                    </div>
                    </div>
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
    