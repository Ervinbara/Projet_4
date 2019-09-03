<?php 
    ob_start();?>
<!DOCTYPE html>
<html>
    <head>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="public/css/php.css">
        <link rel="stylesheet" href="public/css/custom_element.css">
        <meta charset="utf-8" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="stylesheet" href="public/css/admin_header.css">
        <title>ADMINISTRATION DU SITE</title>
    </head>
    
    <body>

         
        <?php        
         include('public/header/header_admin.php');
         ?>
        
        
        <div class="container">
            <ul class="container_admin_content">
             <li class="admin_content"><a class="btn_admin_choice" href="index.php?action=coms_report_view">Gérer les commentaires</a></li><br/>
             <li class="admin_content"><a class="btn_admin_choice" href="index.php?action=addPost">Ajouter un nouveau chapitre</a></li><br/>
             <li class="admin_content"><a class="btn_logout" href="index.php?action=logout">Deconnexion</a></li>
            </ul>
        </div>

    </body>
</html>
<?php ob_end_flush(); ?>