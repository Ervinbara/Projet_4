<?php
// Récupération des données
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=Blog;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$comments = $bdd->query('SELECT author,comment,DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE signaler = 1');
?>

<!DOCTYPE html>
<html>
        
    <body>
         
        <?php                    
            while ($comment = $comments->fetch())
            {
                
            ?>
                <p><strong><?= htmlspecialchars($comment['author']) ?>
                <p><?= nl2br(htmlspecialchars($comment['comment'])) ?> le <?= $comment['comment_date_fr'] ?></p>
                <form action="" method="post"> 
                 <div>
                    <input type="submit" id="report" name="report" value="Supprimer ce commentaire" />
                </div>
                </form>
        <?php
        }
        $comments->closeCursor();
        ?>
    </body>
</html>