<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../public/css/php.css">
        <meta charset="utf-8" />
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>ADMINISTRATION DU SITE</title>
       
        <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
        <script type="text/javascript" src="../public/tinymce/tinymce.min.js"></script>
        <script type="text/javascript">
          tinyMCE.init({
            selector: 'textarea',
          });
        </script>
    </head>
    
    <body>
        <?php
       if(isset($_SESSION['admin']) AND !empty($_SESSION['admin'])){
        ?>
      <?php include('../public/header/header_admin.php');?>
     <div class="container">
        <form action="../index.php?action=add_post"" method="POST">
            <input type="text" name="article_titre" placeholder="Titre" /><br />
            <textarea id="post" name="article_contenu" placeholder="Contenu de l'article"></textarea><br />
            <input class="post_button" type="submit" value="Poster" />
        </form>
     </div>
        
        <?php if(isset($message)) { echo $message; } ?>
       <li style="list-style: none"><a href="../admin/index.php">Retourner à l'accueil admin ?</a></li>
       
       <?php
       }
       else{
        header('location:../index.php');
       }
        ?>
        
    </body>
</html>