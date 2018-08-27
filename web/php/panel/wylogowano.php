<?php   
if (isset($_SESSION['zalogowany']))
{
    unset($_SESSION['zalogowany']);
    echo 'zalogowany';
}
elseif (isset($_SESSION['login']))
{
    unset($_SESSION['login']);
    echo 'login';
}
elseif (isset($_SESSION['haslo']))
{
    unset($_SESSION['haslo']);
    echo 'haslo';
}
elseif (isset($_SESSION['role']))
{
    unset($_SESSION['role']);
    echo 'role';
}
//Można też opróżnic tablicę SESSION i POST np. w ten sposób: $_SESSION = array(); co wykorzystałem w pliku powitanie.
//session_destroy();
        require_once 'naglowek.php';
        session_unset(); // sprawdzałem różne sposoby i zostawiłem ten  M.Kurant
        require_once 'menu.php';
?>
    <div class="container">  
        <h1>Wylogowano</h1>
    </div> 
<?php
    require_once 'stopka.php';   
?>    