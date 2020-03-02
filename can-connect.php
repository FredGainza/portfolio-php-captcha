<?php

    // (!isset($_SESSION) || $_SESSION['access'] = false)
    if (!$_SESSION['access']){
        header('Location: index.php');
    }

?>