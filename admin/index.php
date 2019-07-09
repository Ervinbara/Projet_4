<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../public/php.css">
        <meta charset="utf-8" />
        <title>ADMINISTRATION DU SITE</title>
    <body>
       <?php require_once 'database.php';?>
       <h1>Bienvenue <?php $_SESSION['admin']?></h1>
        <h2>Que voulez vous faire ?</h2>
        
        <div class="container">
           <?php
        if(!$_SESSION['admin']){
            header('location:login.php'); //Comprend pas pourquoi ça fonctionne pas
        }
           ?> 
        </div>
  
    </body>
</html>
