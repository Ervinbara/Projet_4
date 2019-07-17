
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Blog jean forteroche</title>
        <link rel="stylesheet" href="public/php.css">
    </head>
        
    <body>
        
        <?php include('public/header.php');
        if(!isset($_GET['id']))//Si il manque 'id' on redirige l'utilisateur vers la page d'accueil
            {   
            header('Location: index.php');
            }?>
            
        <h1>Mon super blog !</h1>
            <p><a href="index.php">Retour à la liste des billets</a></p>
    
            <div class="news">
                <h3>
                    <?= htmlspecialchars($post['title']) ?>
                    <em>le <?= $post['creation_date_fr'] ?></em>
                </h3>
                
                <p>
                    <?= nl2br(htmlspecialchars($post['content'])) ?>
                </p>
            </div>
            
            <!-- Si on est connecter en tant qu'admin On accède aux fonctionnalité -->
            <?php if(isset($_SESSION['admin']) AND !empty($_SESSION['admin'])) : ?>
             
             <a href="admin/delete_chap.php?id=<?= $post['id'] ?>">Supprimer</a>
             <a href="admin/edit.php?id=<?= $post['id'] ?>">Modifier</a>
             <a href="admin/?id=<?= $post['id'] ?>">Espace Administration</a>
                
            <?php endif ?>
                    
            <h2>Commentaires</h2>
    
            <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post"> 
                <div>
                    <label for="author">Auteur</label><br />
                    <input type="text" id="author" name="author" />
                </div>
                <div>
                    <label for="comment">Commentaire</label><br />
                    <textarea id="comment" name="comment"></textarea>
                </div>
                <div>
                    <input type="submit" />
                </div>
            </form>
    
    
            <?php                    
            while ($comment = $comments->fetch())
            {
            ?>
                <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
                <p><?= nl2br(htmlspecialchars($comment['comment'])) ?> et <?= nl2br(htmlspecialchars($comment['id'])) ?></p>
                
                <form action="" method="post"> 
                 <div>
                    <input type="submit" id="report" name="report" value="Signaler ce commentaire" />
                </div>
                </form>
                
                <?php
                 if(isset($_POST['report'])) {
                        $db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
                        $req = $db->prepare('UPDATE comments SET signaler=:signaler WHERE id = '.$comment['id']);
                        $req->execute([
                        'signaler' => 1,
                    ]);      
                    }
                    ?>
                <br/>
            <?php
            }
            ?>
    </body>
</html>