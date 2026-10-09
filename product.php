<?php
    require "config/connexion.php";
    // $_GET variable super globale ($_POST, $_SESSION, $_COOKIE, $_SERVER, ...)
    // vérifier la présence de l'id dans l'URL et si la valeur est bien numérique
    if(isset($_GET['id']) && is_numeric($_GET['id'])){
        $id = $_GET['id'];
    }else{
        // redirection car soit l'id n'existe pas ou il n'est pas numérique
        header("Location: 404.php");
        exit();
    }

    // vérifier si l'id est dans la base de données
    $req = $bdd->prepare("SELECT * FROM products WHERE id=?");
    $req->execute([$id]);
    $data = $req->fetch(PDO::FETCH_ASSOC);
    // tester si $data est vide
    if(!$data){
        header("Location: 404.php");
        exit();
    }


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock - <?php echo $data['name'] ?></title>
</head>
<body>
    <h1><?= $data['name'] ?></h1>
    <h4><?= $data['date'] ?></h4>
    <img src="images/<?= $data['cover'] ?>" alt="image de <?= $data['name'] ?>">
    <div>
        <?= $data['description'] ?>
    </div>
</body>
</html>

