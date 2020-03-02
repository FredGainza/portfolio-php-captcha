<?php
    // Déconnexion

    session_start();

    // var_dump($_SESSION);

    foreach ($_SESSION as $key => $value) {
        header('Location: index.php');
        unset($_SESSION[$key]);
    }