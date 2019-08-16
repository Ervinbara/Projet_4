<?php session_start(); ?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../public/css/admin_header.css">
        <link rel="stylesheet" href="../public/css/custom_element.css">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        
    </head>
        
    <body>
        <?php
        if(isset($_SESSION['admin']) AND !empty($_SESSION['admin'])){
            
        //Appel de la fonction d'affichage des coms signaler
        
        require_once('../model/CommentManager.php');
        $CommentManager = new CommentManager();
        $comments = $CommentManager->get_comment_report();
        
        include('../public/header/header_admin.php');?>
        <div class="container">
         <h1>Gestion des commentaires</h1>
            <h2>Ci-dessous ce trouve les commentaire qui ont été signaler</h2>
                <ul>
                <?php while($c = $comments->fetch())
                { ?>
                    <li><?= $c['comment_date_fr'] ?> : <strong><?= $c['author'] ?></strong> : <?= $c['comment'] ?> <a class="bouton_delete_coms" href="../index.php?action=supprime&amp;comment_id=<?= $c['id'] ?>">Supprimer</a></li>
                    <hr class="hr" />
                <?php 
                }
                ?>
                </ul>
           
                
                 
        <?php
        $comments->closeCursor();
        }
  
        else
        {
            header('location:../index.php');
        }
        ?>
        </div>
        
    </body>
</html>