<div class="container"  style="padding-bottom: 10px">
    <div class="card">    
        <nav class="navbar navbar-expand-lg navbar-secondary bg-secondary">
            <a class="navbar-brand btn btn-outline-success bg-white text-success" href="../../web/index.php">ReGaSto</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-item nav-link btn btn-secondary" href="powitanie.php">Start<span class="sr-only">Start</span></a>
                        </li>

                        <?php
                        /* Menu z linkami do odpowiednich stron panelu, wykorzystano Bootstrapa, zapewniono responsywność i estetyczny wygląd.
                         * Po zalogowaniu pokazuje się opcja wyloguj.
                         * M.Kurant
                         */


                        if (isset($_SESSION['zalogowany'])) {
                            echo '<a class="nav-item nav-link btn btn-secondary" alt="Przeglądanie bazy użytkowników" href="przegladanie.php">Użytkownicy</a>
                <a class="nav-item nav-link btn btn-secondary" alt="Dodawanie użytkowników" href="dodawanie.php">Dodaj nowego</a>
                <a class="nav-item nav-link btn btn-secondary" alt="Operacje zaawansowane" href="odejmowanie.php">Zaawansowane</a>
                <a class="nav-item nav-link btn btn-secondary" alt="Zmiana danych użytkowników" href="zmienianie.php">Edycja</a>
                <a class="nav-item nav-link btn btn-secondary" alt="Plan dnia zalogowanego lekarza" href="plan.php">Plan</a>
                <a class="nav-item nav-link btn btn-secondary" alt="Generator recept PDF" href="recepta.php">Recepta</a>
                <a class="nav-item nav-link btn btn-secondary" href="terminy.php">Terminy</a>
                <a class="nav-item nav-link btn btn-secondary" href="mail.php">Poczta</a>
                <a class="nav-item nav-link btn btn-secondary" href="wylogowano.php">Wyloguj</a>';
                        } else {
                            echo '<a class="nav-item nav-link btn btn btn-dark" href="logpanel.php">Zaloguj</a>';
                        }
                        ?> </ul>   
                </div>
            </div>

        </nav> 
    </div>