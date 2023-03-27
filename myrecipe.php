<?php session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <title>Mes recettes</title>
</head>

<body>
    <?php include_once('navbar.php') ?>
    <div class="px-4 py-5 my-5 text-center container" style="background-color: #8a05f0;">
        <h1 class="display-5 fw-bold" style="color: white;"> Mes recettes ! </h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4" style="color:#dbb2fa;">Partager vos inspirations gastronomique et votre experiences culinaire avec le monde ! </p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <form action="#" method="post">
                    <button type="submit" class="btn  btn-lg px-4 gap-3" name="ajouter" style="background-color: white; color:#8a05f0;">Ajouter une recette</button>
                </form>
            </div>
        </div>
    </div>
    <?php
    if (isset($_POST['ajouter'])) {
    ?>
        <div class="container-fluid col-xl-10 col-xxl-10 px-4 py-5 " style="background: #dbb2fa">
            <div class="row align-items-center g-lg-5 py-5">
                <div class="col-lg-7 text-center text-lg-start">
                    <h1 class="display-4 fw-bold lh-1 mb-3" style="color: #8a05f0;">Ajoutez une recette !</h1>
                    <p class="col-lg-10 fs-4">Partager et enregistrer vos recettes. Sauvegarder votre historique et vos recettes</p>
                </div>
                <div class="col-md-10 mx-auto col-lg-5">
                    <form action="" method="post" class="p-4 p-md-5 border rounded-3 bg-light">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Jabon à la tomate" name="titleRecipe" required>
                            <label for="floatingInput">Titre </label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea name="descRecipe" cols="30" id="floatingInput" rows="10" required class="form-control" required></textarea>
                            <label for="floatingInput">Recette </label>
                        </div>

                        <button class="w-100 btn btn-lg btn-primary" type="submit" name="sauvegarder"> Sauvegarder </button>
                    </form>
                </div>
            </div>
        </div>

        <?php


    }

    try {
        include('db-config.php');
        $PDO = new PDO($DB_DNS, $DB_USER, $DB_PASS);

        if (isset($_POST['sauvegarder'])) {
            $titlerecipe = $_POST['titleRecipe'];
            $descrecipe = $_POST['descRecipe'];
            $authorrecipe = $_SESSION['user']['nameuser'];
            $iduser = $_SESSION['user']['iduser'];

            if (!empty($titlerecipe) && !empty($descrecipe) && !empty($authorrecipe) && !empty($iduser)) {

                $sql = 'INSERT INTO recipe(`titleRecipe`, `authorRecipe`, `descRecipe`, `idUsers`) VALUES(:titlerecipe, :authorrecipe, :descrecipe,  :iduser)';
                $requete = $PDO->prepare($sql);

                $requete->bindValue(":titlerecipe", $titlerecipe);
                $requete->bindValue(":authorrecipe", $authorrecipe);
                $requete->bindValue(":descrecipe", $descrecipe);
                $requete->bindValue(":iduser", $iduser);

                $requete->execute();
            }
        }
        $iduser = $_SESSION['user']['iduser'];
        $sql = "SELECT * FROM recipe WHERE idUsers = '$iduser' ORDER BY datePubRecipe Desc";
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
                        <small class="text-muted" style="color: #8a05f0;"> Auteur : <?php echo $recipe['authorRecipe']; ?> (vous) - <?php echo $recipe['datePubRecipe']; ?></small>
                    </div>
                </div>
            </div>
    <?php
        }
    } catch (PDOException $th) {
        echo "erreur" . $th->getMessage();
    }
    ?>
    <?php include_once('footer.php') ?>
    <script src="bootstrap.js"></script>
</body>

</html>