<?php session_start();

    $_SESSION['access'] = false;
    if (isset($_POST) && !empty($_POST)) {
        if (!empty($_POST['nom']) && !empty($_POST['captcha_challenge'])) {
            $_POST['captcha_challenge'] = strtoupper($_POST['captcha_challenge']);
            if ($_POST['captcha_challenge'] == $_SESSION['captcha_string']) {
                header('Location: contenu_reserv.php');
                $_SESSION['access'] = true;
                $_SESSION['nom'] = $_POST['nom'] ;exit;
            } else {
                $_SESSION['msg'] = 'SAISIE INCORRECTE';
                header('Location: index.php');exit;
            }
        } else {
            $_SESSION['msg'] = 'SAISIE INCORRECTE';
            header('Location: index.php');exit;
        }
    }
