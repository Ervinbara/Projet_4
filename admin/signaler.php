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
if(isset($_SESSION['admin']) AND !empty($_SESSION['admin'])){
if(isset($_GET['supprime']) AND !empty($_GET['supprime'])) {
      $supprime = (int) $_GET['supprime'];
      $req = $bdd->prepare('DELETE FROM comments WHERE id = ?');
      $req->execute(array($supprime));
   }
}
$comments = $bdd->query('SELECT author,id,comment,DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE signaler = 1');

?>

<!DOCTYPE html>
<html>
        
    <body>
         <h1>Gestion des commentaires</h1>
            <h2>Ci-dessous ce trouve les commentaire qui ont été signaler</h2>
            <ul>
            <?php while($c = $comments->fetch()) { ?>
            <li><?= $c['comment_date_fr'] ?> : <?= $c['author'] ?> : <?= $c['comment'] ?> <a href="signaler.php?supprime=<?= $c['id'] ?>">Supprimer</a></li>
            <?php } ?>
            </ul>
                
                
                 
        <?php
        $comments->closeCursor();
        ?>
    </body>
</html>