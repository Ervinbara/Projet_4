<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Blog jean forteroche</title>
        <link rel="stylesheet" href="public/php.css">
    </head>
        
    <body>
        <?php include('public/header.php');?>
        <h1>Blog jean forteroche</h1>
        <p>Derniers chapitres du blog :</p>
 
        
        <?php
        while ($data = $posts->fetch())
        {
        ?>
            <div class="news">
                <h3>
                    <?= htmlspecialchars($data['title']) ?>
                    <em>le <?= $data['creation_date_fr'] ?></em>
                </h3>
                
                <p>
                    <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Lire la suite</a></em>
                    <?= nl2br(htmlspecialchars($data['title'])) ?>
                    <br />
                    <em><a Commentaires</a></em>
                    <hr />
                </p>
            </div>
        <?php
        }
        $posts->closeCursor();
        ?>
    </body>
</html>