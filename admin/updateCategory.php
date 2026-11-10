<?php
    session_start();
    // gardien de sécurité (as tu la session['login'] pour continuer?)
    // ! négation
    if(!isset($_SESSION['login'])){
        // RAPPEL : ../ c'est pour sortir du dossier
        header("Location: ../403.php");
        exit();
    }

    // la page à besoin d'un id (de qui modifer) pour fonctionner
    // test si l'id est là // is_numeric (vérifier si c'est un nombre)
    if(isset($_GET['id']) && is_numeric($_GET['id'])){
        // pour faciliter l'écriture 
        $id = $_GET['id'];
    }else{
        // soit pas présent soit id non numérique
        header("Location: ../404.php");
        exit();
    }

    // récup les informations avec l'aide de l'id dans la bdd
    // connexion à la bdd
    require "../config/connexion.php";

    // req à la bdd
    $req = $bdd->prepare("SELECT * FROM categories WHERE id=?");
    $req->execute([$id]);
    // quand on veut récup qu'une info fetch(PDO::FETCH_ASSOC)
    $data = $req->fetch(PDO::FETCH_ASSOC);

    // tester si $data est vide
    // ! négation 
    // est-ce que $data est null
    if(!$data){
        header("Location: ../404.php");
        exit();
    }

    // si j'arrive ici $data est rempli avec les infos

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <title>Stock - Administration : Modifier la catégorie <?= $data['name']; ?></title>
</head>
<body>
    <?php
        include("partials/header.php");
    ?>
    <div class="container">
        <h1>Modifier la catégorie <?= $data['name']; ?></h1>
        <a href="categories.php" class="btn btn-secondary">Retour</a>
        <form action="treatmentUpdateCategory.php?id=<?= $data['id']; ?>" method="POST">
            <?php
                if(isset($_GET['error'])){
                    echo "<div class='alert alert-danger my-3'>Une erreur est survenue (code erreur: ".$_GET['error'].")</div>";
                }
            ?>
            <div class="my-3">
                <label for="name">Nom: </label>
                <input type="text" name="name" id="name" class="form-control" value="<?= $data['name']; ?>">
            </div>
            <div class="my-3">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control"><?= $data['description']; ?></textarea>
            </div>
            <div class="my-3">
                <input type="submit" value="Modifier" class="btn btn-warning">
            </div>
        </form>
    </div>
</body>
</html>