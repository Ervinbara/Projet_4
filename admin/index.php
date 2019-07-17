<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../public/php.css">
        <meta charset="utf-8" />
        <title>ADMINISTRATION DU SITE</title>
    <body>
        <?php include('../public/header_admin.php');?>
       <?php require_once 'database.php';?>
       <h1>Bienvenue <?php $_SESSION['admin']?></h1>
        <h2>Que voulez vous faire ?</h2>
        
        <div class="container">
           <?php
        if(!$_SESSION['admin']){
            header('location:login.php'); //Comprend pas pourquoi ça fonctionne pas
        }
           ?>
           <ul>
                <li><a href="signaler.php">Gérer les commentaires</a></li>
                <li><a href="adminView.php">Ajouter un nouveau chapitre</a></li>
           </ul>
        </div>
  
    </body>
</html>
