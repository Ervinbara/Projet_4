<!DOCTYPE html>
<html>
     <head>
        <meta charset="utf-8" />
        <title>Blog jean forteroche</title>
        <link rel="stylesheet" href="../public/css/allpost.css">
        <link rel="stylesheet" href="../public/css/footer.css">
        <link rel="stylesheet" href="../public/css/nheader.css">

        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <?php include('../public/header/all_post_header.php');?>
    </head>    
    <body> 
    <section role="main">
        <div class="container">
            <div class="titre">
                <hr/>
                <h2 class="articles_title">Chapitres disponible</h2>
            </div> 
            <?php
            require_once('../model/PostManager.php');
             $postManager = new PostManager(); // Création d'un objet
    $allposts = $postManager->allpostsView();
            while ($data = $allposts->fetch())
             {
            ?>
            <div class="articles">  
                <div class="articles_item" style="background: url('../public/images/chap.jpg'); background-size: cover;">
                    <h3>
                        <?= htmlspecialchars($data['title']) ?>        
                        <p>
                            <br />
                            <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Découvrir</a></em>
                            <br>
                        </p>
                    </h3>
                </div>
            </div>
            <?php
            }
            $allposts->closeCursor();
            ?>
        </div>
    </section>
    
    <?php include('../public/footer.php');?>


    <script src="../public/app.js"></script>
    
    </body>
</html>