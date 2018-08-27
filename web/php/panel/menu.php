<div class="container">
        <div class="card">    
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand btn btn-outline-success bg-white text-success" href="../../web/index.php">ReGaSto</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
      <a class="nav-link" href="powitanie.php">Start<span class="sr-only">Start</span></a>
            </li>
            
          <?php
      if(isset($_SESSION['zalogowany']))
      {
          echo '<a class="nav-item nav-link border-right border-left" href="przegladanie.php">Przeglądanie<br>Bazy<br>użytkowników</a>
                <a class="nav-item nav-link border-right" href="dodawanie.php">Dodawanie<br>Użytkowników</a>
                <a class="nav-item nav-link border-right" href="odejmowanie.php">Operacje<br>Zaawansowane</a>
                <a class="nav-item nav-link border-right" href="zmienianie.php">Edycja<br>danych<br>użytkowników</a>
                <a class="nav-item nav-link border-right" href="plan.php">Plan<br>Dnia</a>
                <a class="nav-item nav-link border-right" href="recepta.php">Recepta</a>
                <a class="nav-item nav-link border-right" href="PDO_Terminy.php">Wolne<br>Terminy</a>
                <a class="nav-item nav-link border-right" href="PDO_Wolne.php">Dni<br>Wolne</a>
                <a class="nav-item nav-link" href="wylogowano.php">Wyloguj</a>';
      }
      else {
          echo '<a class="nav-item nav-link" href="logpanel.php">Zaloguj</a>';         
      }
        ?> </ul>   
    </div>
  </div>
        
</nav> 
            </div> 