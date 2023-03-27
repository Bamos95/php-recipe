<?php

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

if (isset($_POST['deconnecter'])) {
  session_destroy();
  header('location:home.php');
  exit;
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="bootstrap.css">
  <link rel="stylesheet" href="style.css">
  <title>Recette de Gusto</title>
</head>

<body>
  <nav class="navbar navbar-expand navbar-dark bg-primary" aria-label="Second navbar example">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Gusto</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample02">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="home.php">Home</a>
          </li>
          <?php
          if (!empty($_SESSION['user']['iduser'])) {
          ?>
            <li class="nav-item">
              <form method="post">
                <button type="submit" class="btn btn-primary btn-md px-4 gap-3" name="deconnecter">Se deconnecter</button>
              </form>
            </li>
          <?php
          }
          ?>

        </ul>
      </div>
    </div>
  </nav>
  <?php //include_once('navbar.php') 
  ?>
  <div class="px-4 py-5 my-5 text-center container" style="background-color: #1111;">
    <img class="d-block mx-auto mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
    <h1 class="display-5 fw-bold" style="color: #8a05f0;"> Le Gusto ! </h1>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4">Envie d'explorer d'autre horizons culinaire, partager vos inspirations gastronomique et votre experiences culinaire avec le monde ! </p>
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
        <form action="" method="post">
          <button type="submit" class="btn btn-primary btn-lg px-4 gap-3" name="explorer">Explorer les Recettes</button>
        </form>
      </div>
    </div>
  </div>
  <?php

  if (isset($_POST['explorer'])) {
    if (empty($_SESSION['user']['iduser'])) {
      header('location:connexion.php');
    } else {
  ?>
      <div class="px-4 py-5 my-5 text-center container" style="background-color: #8a05f0;">
        <h1 class="display-5 fw-bold" style="color: #FFFFFF;"> Salut, Gusto <?php if (!empty($_SESSION['user']['iduser'])) {
                                                                              echo  $_SESSION['user']['nameuser'];
                                                                            } ?> !</h1>
        <div class="col-lg-6 mx-auto">
          <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <a href="myrecipe.php" class="w-100 btn btn-lg " style="color: #7801d2; background: #dbb2fa;"> Vos recettes </a>
          </div>
        </div>
      </div>
      <?php

      try {
        include('db-config.php');
        $PDO = new PDO($DB_DNS, $DB_USER, $DB_PASS);


        $iduser = $_SESSION['user']['iduser'];
        $sql = "SELECT * FROM recipe ORDER BY datePubRecipe Desc";
        $res = $PDO->query($sql);

        $recipes = $res;

        foreach ($recipes as $recipe) {
      ?>
          <div class="px-4 py-5 my-5 text-center container" style="background-color: #1111;">
            <h4 class="display-9" style="color: #8a05f0;"> <?php echo $recipe['titleRecipe']; ?> </h4>
            <div class="col-lg-8 mx-auto">
              <p class="lead mb-4"> <?php echo $recipe['descRecipe']; ?></p>
              <hr style="color: #8a05f0;">
              <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <small class="text-muted" style="color: #8a05f0;"> Auteur : <?php echo $recipe['authorRecipe']; ?> - <?php echo $recipe['datePubRecipe']; ?></small>
              </div>
            </div>
          </div>
  <?php
        }
      } catch (PDOException $th) {
        echo "erreur" . $th->getMessage();
      }
    }
  }



  ?>
  <?php include_once('footer.php') ?>
  <script src="bootstrap.js"></script>
</body>

</html>