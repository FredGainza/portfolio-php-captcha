<?php session_start();
require 'captcha_function.php';

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Jekyll v3.8.5">
  <title>Cours PHP</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/album/">

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
  <style>
    body{
      background-color: hsla(105, 34%, 94%, 0.58);
    }
    .black {
      color: black;
    }

    .w-90{width: 90%;}

    .encart {
      margin-top: 10px;
      border: 3px solid red;
      padding: 5px;
      font-weight: bold;
    }

    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }
    .jumbotron{
      background-color: #8ec9d252;
      padding: 2rem 1rem;
    }

    @media (max-width: 767px) {
      h2{font-size: 160%;}
      h1{font-size: 1.8rem !important;}
      .jumbotron{
        font-size: 1.8rem;
        padding: 1rem .5rem;
      }
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
    .text-bordeaux{
      color:hsl(350, 30%, 34%);
      font-weight: 700;
    }
  </style>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/normalize.css" />

</head>

<body>

  <main role="main">
    <section class="jumbotron text-center">
      <div class="container">
        <h1 class="jumbotron-heading text-bordeaux">HACKATON - CAPTCHAMI</h1>
      </div>
    </section>
    <div class="container">
      <div class="row mb-2">
        <h2 class="text-dark mx-auto w-90 text-center mb-3">Accès aux pages réservées</h2>
      </div>
      <div class="row d-block">
        <div class="col-md-6 mx-auto my-3">
        <?php
        if (isset($_SESSION['msg'])) {
          $msg = $_SESSION['msg'];
          echo '<p class="text-danger encart text-center">' . $msg . '</p>';
        }
        unset($_SESSION['msg']);
        ?>

        </div>
      </div>

 
        <form action="traitement.php" method="POST">
          <div class="form-group mb-5 col-md-6 mx-auto">
            <label for="name" class="text-info font-weight-bold">Nom</label>
            <input type="txt" class="form-control" id="nom" name="nom" placeholder="Veuillez saisir votre nom">
          </div>
          <?php captcha(); ?>
          <div class="col-md-6 mx-auto">
          <button type="submit" name="captcha" class="btn btn-info btn-block">Accéder</button>
          </div>
        </form>

      </div>
    </div>


  </main>

  <footer class="text-muted">
    <div class="container">
    </div>
  </footer>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script>
    //Refresh Captcha
    function refreshCaptcha() {
      var img = document.images['captcha_image'];
      img.src = img.src.substring(
        0, img.src.lastIndexOf("?")
      ) + "?rand=" + Math.random() * 1000;
    }
  </script>
</body>

</html>