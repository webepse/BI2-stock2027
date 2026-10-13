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
    $req = $bdd->prepare("SELECT categories.name AS cname, products.name AS pname, DATE_FORMAT(products.date,'%d/%m/%Y') AS mydate, products.description AS pdescri, products.introduction AS pintro, products.cover AS pcover, categories.id AS cid  FROM products INNER JOIN categories ON products.category = categories.id WHERE products.id=?");
    // INNER JOIN -> joindre une autre table à la requête
    // SELECT * FROM table1 INNER JOIN table2
    // besoin de la base de la liaison ON table1.id = table2.liaison_id
    // SELECT * FROM products INNER JOIN categories ON products.category = categories.id
    // ajouter les conditions 
    // SELECT * FROM products INNER JOIN categories ON products.category = categories.id WHERE products.id=?
    // ajouter la selection avec alias
    // la selection
    /* categories.name AS cname, products.name AS pname, DATE_FORMAT(products.date,'%d/%m/%Y') AS mydate, products.description AS pdescri, products.introduction AS pintro, products.cover AS pcover, categories.id AS cid 
    */
    /*
        SELECT categories.name AS cname, products.name AS pname, DATE_FORMAT(products.date,'%d/%m/%Y') AS mydate, products.description AS pdescri, products.introduction AS pintro, products.cover AS pcover, categories.id AS cid  FROM products INNER JOIN categories ON products.category = categories.id WHERE products.id=?
    */
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
    <title>Stock - <?php echo $data['pname'] ?></title>
</head>
<body>
    <h3><?= $data['cname'] ?></h3>
    <h1><?= $data['pname'] ?></h1>
    <h4>Date: <?= $data['mydate'] ?></h4>
    <img src="images/<?= $data['pcover'] ?>" alt="image de <?= $data['pname'] ?>">
    <h4>Introduction</h4>
    <div><?= $data['pintro'] ?></div>
    <h4>Description</h4>
    <div>
        <?= $data['pdescri'] ?>
    </div>
</body>
</html>

