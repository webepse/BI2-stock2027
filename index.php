<?php
    require "config/connexion.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Requête</h1>
    <?php
        $req = $bdd->query("SELECT * FROM products");
        $datas = $req->fetchAll(PDO::FETCH_ASSOC);
        //var_dump($datas);
        foreach($datas as $data){
            //var_dump($data);
            echo "<div class='title'>".$data['name']."</div>";
        }
    ?>
</body>
</html>