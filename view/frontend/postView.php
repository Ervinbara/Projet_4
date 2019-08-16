<?php ob_start(); ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Blog jean forteroche</title>
    
        <!--CDN Bootstrap-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <!--Fin lien Bootstrap-->
        
        <link rel="stylesheet" href="public/css/nheader.css">
        <link rel="stylesheet" href="public/css/articles.css">
        <link rel="stylesheet" href="public/css/footer.css">
        <link rel="stylesheet" href="public/css/js.css">
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php include('public/header/nheader.php');?>
    </head>

    <body>
        
        
   <?php
        if(!isset($post['id']))
        //Si il manque 'id' on redirige l'utilisateur vers la page d'accueil
            {   
            header('Location: index.php');
            }?>
        <div class='container '>   
        <h1><?=$post['title'] ?></h1>
            <p><a href="index.php">Retour à la liste des billets</a></p>
    
            <div class="news">
                <h3>   
                    <em>Publié le <?= $post['creation_date_fr'] ?></em>
                </h3>
                
                <div class="contenu">
                    <?= $post['content']?>
                </div>
            </div>
        
        
            
            <!-- Si on est connecter en tant qu'admin On accède aux fonctionnalité -->
            <?php if(isset($_SESSION['admin']) AND !empty($_SESSION['admin'])) : ?>
             
             <a class="link_admin" href="index.php?action=supprimePost&amp;id_delete=<?= $post['id'] ?>">Supprimer</a>
             <a class="link_admin" href="admin/edit.php?id=<?= $post['id'] ?>">Modifier</a>
             <a class="link_admin" href="admin/?id=<?= $post['id'] ?>">Espace Administration</a>
                
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
                    <input class="btn_post_comment" type="submit" />
                </div>
            </form>
          </div>
    
            <?php                    
            while ($comment = $comments->fetch())
            {
            ?>
            <div class="container">
                <p><strong><?= $comment['author'] ?></strong> le <?= $comment['comment_date_fr'] ?></p>
                <p><?= $comment['comment'] ?></p> 
             
                <form action="index.php?action=signale_comment&amp;report_id=<?= $comment['id']?>&amp;id_post=<?=$comment['post_id']?>" method="post"> 
                 <div>
                    <input class="btn_report" type="submit" id="report" name="report" value="Signaler ce commentaire" />
                </div>
                 <hr/>
                </form>
            </div>
            

                <br/>
            <?php
            }
            ?>
            <script type="text/javascript" src="public/session.js"></script>
        <?php include('public/footer.php');?>
        
        
    </body>
</html>
<?php ob_end_flush(); ?>