<?php session_start()?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <title>S'inscrire - RG</title>
</head>
<body>
     <?php include_once('navbar.php')?>
 <br>
<div class="container-fluid col-xl-10 col-xxl-10 px-4 py-5 " style="background: #dbb2fa" >
    <div class="row align-items-center g-lg-5 py-5">
      <div class="col-lg-7 text-center text-lg-start">
        <h1 class="display-4 fw-bold lh-1 mb-3">Inscrivez vous !</h1>
        <p class="col-lg-10 fs-4">Partager et enregistrer vos recettes. Sauvegarder votre historique et vos recettes. Envie d'explorer d'autre horizons culinaire, partager vos inspirations gastronomique et votre experiences culinaire avec le monde ! </p>
      </div>
      <div class="col-md-10 mx-auto col-lg-5">
        <form action="" method="post" class="p-4 p-md-5 border rounded-3 bg-light">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="Jean baptiste" name="nameUsers">
            <label for="floatingInput">Nom et Prenoms</label>
          </div>
          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="mailUsers">
            <label for="floatingInput">Email </label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="mdpUsers">
            <label for="floatingPassword">Mot de passe</label>
          </div>
          <button class="w-100 btn btn-lg btn-primary" type="submit" name="inscrire"> S'inscrire</button>
          <hr class="my-4">
          <small class="text-muted">En cliquant sur le bouton s'inscrire, vous acceptez nos condtions d'utilisation.</small>
        </form>
      </div>
    </div>
  </div>

    <?php 
    try {
        include('db-config.php');
        $PDO = new PDO($DB_DNS, $DB_USER, $DB_PASS);
        
        if (isset($_POST['inscrire'])) {
            $nameUsers = $_POST['nameUsers'];
            $mailUsers = $_POST['mailUsers'];
            $mdpUsers = $_POST['mdpUsers'];

            if (!empty($nameUsers) && !empty($mailUsers) && !empty($mdpUsers)) {
                
                $sql = 'INSERT INTO users(`nameUsers`, `mailUsers`, `mdpUsers`) VALUES(:nameUsers, :mailUsers, :mdpUsers)';
                $requete = $PDO->prepare($sql);

                $requete->bindValue(":nameUsers", $nameUsers);
                $requete->bindValue(":mailUsers", $mailUsers);
                $requete->bindValue(":mdpUsers", $mdpUsers);

                $requete->execute();

                header('location:home.php');
    
            }
        }
    } catch (PDOException $th) {
        echo"erreur".$th->getMessage();
    }
    ?>
    <?php include_once('footer.php')?>
    <script src="bootstrap.js"></script>
</body>
</html>