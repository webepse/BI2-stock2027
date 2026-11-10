<?php
    session_start();
    // gardien de sécurité (as tu la session['login'] pour continuer?)
    if(!isset($_SESSION['login'])){
        // RAPPEL : ../ c'est pour sortir du dossier
        header("Location: ../403.php");
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
            // insérer les données dans la BDD
                // connexion à la bdd
            require "../config/connexion.php";
            // préparation de la req SQL
            $insert = $bdd->prepare("INSERT INTO categories(name,description) VALUES(:nom,:descri)");
            // execution de la req
            $insert->execute([
                ":nom" => $_POST['name'],
                ":descri" => $_POST['description']
            ]);

            // redirection vers la gestion de la catégorie avec une indication qu'il y a eu insertion (message flash)
            header("Location: categories.php?addSuccess=1");
            exit();

        }else{
            // erreur dans le formulaire
            header("Location: addCategory.php?error=".$error);
            exit();
        }

        
    }else{
        // pas de formulaire envoyé
        // redirection vers le formulaire
        header("LOCATION:addCategory.php");
        exit();
    }
