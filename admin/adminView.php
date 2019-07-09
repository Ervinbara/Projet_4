<?php
require 'creation_contenu.php'
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../public/php.css">
        <meta charset="utf-8" />
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
     <?php include('../public/header.php');?>
        <form method="POST">
            <input type="text" name="article_titre" placeholder="Titre" /><br />
            <textarea id="post" name="article_contenu" placeholder="Contenu de l'article"></textarea><br />
            <input type="submit" value="Poster" />
        </form>
        
        <?php if(isset($message)) { echo $message; } ?>
     
    </body>
</html>