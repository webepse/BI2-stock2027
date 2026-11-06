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
    <title>Stock - Administration : Gestion des catégories</title>
</head>
<body>
    <?php
        include("partials/header.php");
    ?>
    <div class="container">
        <h1>Gestion des catégories</h1>
        <a href="addCategory.php" class="btn btn-primary">Ajouter une catégorie</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $req = $bdd->query("SELECT * FROM categories");
                    $datas = $req->fetchAll(PDO::FETCH_ASSOC);
                    foreach($datas as $data){
                        echo "<tr>";
                            echo "<td>".$data['id']."</td>";
                            echo "<td>".$data['name']."</td>";
                            echo "<td>";
                                echo "<a href='' class='btn btn-warning'>Modifier</a>";
                                echo "<a href='' class='btn btn-danger mx-2'>Supprimer</a>";
                            echo "</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>

    </div>
</body>
</html>