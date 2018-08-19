<div class="container">
        <div class="card">    
<nav class="navbar navbar-expand-lg navbar-primary bg-light">
  <a class="navbar-brand" href="../../web/index.php">ReGaSto</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="powitanie.php">Start<span class="sr-only">Start</span></a>
      <?php
      if(isset($_SESSION['zalogowany']))
      {
          echo '<a class="nav-item nav-link" href="przegladanie.php">Przeglądanie</a>
                <a class="nav-item nav-link" href="dodawanie.php">Dodawanie</a>
                <a class="nav-item nav-link" href="#">Odejmowanie</a>
                <a class="nav-item nav-link" href="#">Zmienianie</a>
                <a class="nav-item nav-link" href="#">Nadawanie</a>
                <a class="nav-item nav-link" href="#">Generator</a>
                <a class="nav-item nav-link" href="wylogowano.php">Wyloguj</a>';
      }
      else {
          echo '<a class="nav-item nav-link" href="logpanel.php">Zaloguj</a>';         
      }
        ?>    
    </div>
  </div>
        
</nav> 
            </div> 