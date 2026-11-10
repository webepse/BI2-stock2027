<?php
    session_start();
    // gardien de sécurité (as tu la session['login'] pour continuer?)
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


    // vérifier si le formulaire a été envoyé
    if(isset($_POST['name'])){
        // formulaire envoyé

        // traiter les données 
        // vérifier si les données sont ok pour nous, on va init une variable erreur qui sera à 0
        $error = 0;

        if(empty($_POST['name'])){
            $error = 1;
        }

        if(empty($_POST['description'])){
            $error = 2;
        }

        // comparaison ==
        // assignation = 
        if($error == 0){
            // formulaire ok
            // modification des données dans la BDD pour la catégorie avec l'id $id
               
            // préparation de la req SQL
            $update = $bdd->prepare("UPDATE categories SET name=:nom, description=:descri WHERE id=:myid");
            // execution de la req
            $update->execute([
                ":nom" => $_POST['name'],
                ":descri" => $_POST['description'],
                ":myid" => $id
            ]);

            // redirection vers la gestion de la catégorie avec une indication qu'il y a une modification (message flash)
            header("Location: categories.php?updateSuccess=".$id);
            exit();

        }else{
            // erreur dans le formulaire
            // un GET adresse + ? + nomvariable = valeur
            // pour faire 2 GET => & 
            // ex: updateCategory.php?id=6&error=2
            header("Location: updateCategory.php?id=".$id."&error=".$error);
            exit();
        }

        
    }else{
        // pas de formulaire envoyé
        // redirection vers le formulaire
        header("LOCATION:updateCategory.php?id=".$id);
        exit();
    }
