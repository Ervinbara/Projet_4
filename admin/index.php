<?php ob_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../public/css/php.css">
        <meta charset="utf-8" />
        <title>ADMINISTRATION DU SITE</title>
    </head>
    
    <body>
        <!--Permet de se connecté seulement si on à rentré les bon id -->
        <?php if(!isset($_SESSION['admin']) AND empty($_SESSION['admin'])) : 
            $host = $_SERVER['HTTP_HOST'];
            header('location: http://'.$host.'/admin/login.php');
            //header('location: http://jean-forteroche.ervinbara-projet.com/admin/login.php');
         endif;
         
         
         include('../public/header/header_admin.php');?>
        
        <div class="container">
            <h2>Que voulez vous faire ?</h2>
        </div>
        
        <div class="container">
            <ul>
             <li><a href="signaler.php">Gérer les commentaires</a></li>
             <li><a href="creation_chap.php">Ajouter un nouveau chapitre</a></li>
            </ul>
        </div>

    </body>
</html>
<?php ob_end_flush(); ?>