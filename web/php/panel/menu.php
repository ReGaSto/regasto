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
          echo '<a class="nav-item nav-link" href="przegladanie.php">Przeglądanie</a>
                <a class="nav-item nav-link" href="dodawanie.php">Dodawanie</a>
                <a class="nav-item nav-link" href="odejmowanie.php">Odejmowanie</a>
                <a class="nav-item nav-link" href="zmienianie.php">Zmienianie</a>
                <!--<a class="nav-item nav-link" href="#">Nadawanie</a>-->
                <a class="nav-item nav-link" href="recepta.php">Recepta</a>
                <a class="nav-item nav-link" href="PDO_Terminy.php">Wolne<br>Terminy</a>
                <a class="nav-item nav-link" href="PDO_Wolne.php">Dni<br>Wolne</a>
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