<?php
    session_start();
    // gardien de sécurité (as tu la session['login'] pour continuer?)
    if(!isset($_SESSION['login'])){
        // RAPPEL : ../ c'est pour sortir du dossier
        header("Location: ../403.php");
        exit();
    }

    require "../config/connexion.php";

    // vérifier si dans l'url on a un GET['delete']
    if(isset($_GET['delete']) && is_numeric($_GET['delete'])){
        // $_GET['delete'] à comme valeur l'id de ce que l'utilisateur/administrateur veut supprimer

        $verif = $bdd->prepare("SELECT * FROM categories WHERE id=?");
        $verif->execute([$_GET['delete']]);
        $verifData = $verif->fetch();

        if(!$verifData){
            header("Location: ../404.php");
            exit();
        }

        // la donnée à supprimer existe bien
        // supprimer la donnée
        $delete = $bdd->prepare("DELETE FROM categories WHERE id=?");
        $delete->execute([$_GET['delete']]);

        // redirection avec message flash
        header("Location: categories.php?deleteSuccess=".$_GET['delete']);
        exit();
    }

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
        <?php
            if(isset($_GET['addSuccess'])){
                echo "<div class='alert alert-success my-3'>Vous avez bien ajouté une catégorie</div>";
            }

            if(isset($_GET['updateSuccess'])){
                 echo "<div class='alert alert-warning my-3'>Vous avez bien modifié la catégorie id: ".$_GET['updateSuccess']."</div>";
            }

            if(isset($_GET['deleteSuccess'])){
                 echo "<div class='alert alert-danger my-3'>Vous avez bien supprimé la catégorie id: ".$_GET['deleteSuccess']."</div>";
            }
        ?>
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
                                // donner l'information de qui => utiliser un GET => GET['id']
                                echo "<a href='updateCategory.php?id=".$data['id']."' class='btn btn-warning'>Modifier</a>";
                                echo "<a href='categories.php?delete=".$data['id']."' class='btn btn-danger mx-2'>Supprimer</a>";
                            echo "</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>

    </div>
</body>
</html>
