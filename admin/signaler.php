<?php

require_once 'database.php';
$comments = $db->query('SELECT author,id,comment,DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE signaler = 1');


?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../public/nheader.css">
    </head>
        
    <body>
        <?php /*$_SESSION['flash']['success'] = 'Commentaire Supprimer !'*/;?>
        <?php include('../public/nheader.php');?>
        <div class="container">
         <h1>Gestion des commentaires</h1>
            <h2>Ci-dessous ce trouve les commentaire qui ont été signaler</h2>
            <ul>
            <?php while($c = $comments->fetch()) { ?>
            <li><?= $c['comment_date_fr'] ?> : <?= $c['author'] ?> : <?= $c['comment'] ?> <a href="../index.php?action=supprime&amp;comment_id=<?= $c['id'] ?>">Supprimer</a></li>
            <?php } ?>
            </ul>
            <?php
        //       if(isset($_SESSION['flash']['success'])){
        //       echo "<div class='bg-success'>".$_SESSION['flash']['success'].'</div>';
        //       } ?>
                
                 
        <?php
        $comments->closeCursor();
        ?>
        </div>
    </body>
</html>