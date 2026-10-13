<?php
    session_start();

    // vérifier si je suis déjà connecté
    if(isset($_SESSION['login'])){
        header("Location: dashboard.php");
        exit();
    }


    // vérifier si un formulaire a été envoyé
    if(isset($_POST['email']) && isset($_POST['password'])){
        // init une variable pour l'erreur
        $erreurEmail = "";
        $erreurPassword = "";
        // vérifier les données
        if(empty($_POST['email'])){
            $erreurEmail = "L'adresse E-mail doit être correctement indiquée";
        }

        if(empty($_POST['password'])){
            $erreurPassword = "Le mot de passe doit être correctement indiqué";
        }

        // s'assurer que le formulaire est remplis => vérifier si $erreurEmail et $erreurPassword sont empty ("")
        if(empty($erreurEmail) && empty($erreurPassword)){
           // connexion à la bdd
           // ../ => sortir d'un dossier (ex sortir de 2 dossiers ../../)
           require "../config/connexion.php";
            $req = $bdd->prepare("SELECT * FROM users WHERE email=?");
            $req->execute([$_POST['email']]);

            // vérifier s'il y a une correspondance
            $data = $req->fetch(PDO::FETCH_ASSOC);
            if(!$data){
                $erreurEmail="Aucune adresse e-mail ne correspond";
            }else{
                // j'ai une correspondance, et je voudrais comparer le mot de passe
                // password_verify(password, hash) => hash c'est mot de passe crypté dans la bdd
                if(password_verify($_POST['password'],$data['password'])){
                    // création des sessions et redirection
                    $_SESSION['login'] = $data['login'];
                    header("Location: dashboard.php");
                    exit();
                }else{
                    // le mot de passe n'est pas bon
                    $erreurPassword="Le mot de passe ne correspond pas à votre adresse email";
                }

            }
        }

    }

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <title>Stock - Administration : Connexion</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 mt-5">
                <h2>Stock - Connexion admin</h2>
                <form action="index.php" method="POST">
                    <?php
                        if(!empty($erreurEmail)){
                            echo "<div class='alert alert-danger my-2'>".$erreurEmail."</div>";
                        }
                        if(!empty($erreurPassword)){
                            echo "<div class='alert alert-danger my-2'>".$erreurPassword."</div>";
                        }
                    ?>
                    <div class="form-group my-3">
                        <label for="email">Login: </label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group my-3">
                        <label for="password">Mot de passe: </label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <div class="form-group my-3">
                        <input type="submit" value="Connexion" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>