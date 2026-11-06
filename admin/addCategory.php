<?php
    session_start();
    // gardien de sécurité (as tu la session['login'] pour continuer?)
    if(!isset($_SESSION['login'])){
        // RAPPEL : ../ c'est pour sortir du dossier
        header("Location: ../403.php");
        exit();
    }

    require "../config/connexion.php";

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <title>Stock - Administration : Ajouter une catégorie</title>
</head>
<body>
    <?php
        include("partials/header.php");
    ?>
    <div class="container">
        <h1>Ajouter une catégorie</h1>
        <a href="categories.php" class="btn btn-secondary">Retour</a>
        <form action="treatmentAddCategory.php" method="POST">
            <div class="my-3">
                <label for="name">Nom: </label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="my-3">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>
            <div class="my-3">
                <input type="submit" value="Envoyer" class="btn btn-primary">
            </div>
        </form>
    </div>
</body>
</html>