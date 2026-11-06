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
        
    }else{
        // pas de formulaire envoyé
        // redirection vers le formulaire
        header("LOCATION:addCategory.php");
        exit();
    }
