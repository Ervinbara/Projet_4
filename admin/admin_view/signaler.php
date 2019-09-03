<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="public/css/custom_element.css">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="stylesheet" href="public/css/admin_header.css">
    </head>
        
    <body>
        <?php
        include('public/header/header_admin.php');?>
        <div class="container">
         <h1>Gestion des commentaires</h1>
            <h2>Ci-dessous ce trouve les commentaire qui ont été signaler</h2>
                <ul>
                <?php while($c = $comments->fetch())
                { ?>
                    <li><?= $c['comment_date_fr'] ?> : <strong><?= $c['author'] ?></strong> : <?= $c['comment'] ?> <a class="bouton_delete_coms" href="index.php?action=supprime&amp;comment_id=<?= $c['id'] ?>">Supprimer</a></li>
                    <hr class="hr" />
                <?php 
                }
                ?>
                </ul>
           
                
                 
        <?php
        $comments->closeCursor();
        
        
        ?>
        </div>
        <div class="container">
        <li style="list-style: none"><a href="index.php?action=admin_access">Retourner à l'accueil admin ?</a></li>
        </div>
    </body>
</html>