<!DOCTYPE html>
<html>
     <head>
        <meta charset="utf-8" />
        <title>Blog jean forteroche</title>
        <link rel="stylesheet" href="public/nheader.css">
        <link rel="stylesheet" href="public/articles.css">
       <!-- <link rel="stylesheet" href="public/articles.css">-->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <?php include('public/nheader.php');?>
    </head>    
    <body>
    <div class="container who">
        <strong>Qui suis-je ?</strong>
            <div class="">
             <figure class="img_service">
                    
               </figure> 
            </div>
    </div>
        
    <section role="main">
        <div class="container"><!--overflow:auto-->
            <div class="titre">
                <h2 class="articles_title">Derniers Chapitres</h2>
            </div> 
            <?php
            while ($data = $posts->fetch())
             {
            ?>
            <div class="articles">  
                <div class="articles_item" style="background: url('public/chap.jpg'); background-size: cover;">
                    <h3>
                        <?= htmlspecialchars($data['title']) ?>
                        <em><!--le--> <?php /*$data['creation_date_fr']*/ ?></em>          
                        <p>
                            <br />
                            <?php /*nl2br(htmlspecialchars($data['title']))*/ ?>
                            <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Découvrir</a></em>
                            <br>
                        </p>
                    </h3>
                </div>
            </div>
            <?php
            }
            $posts->closeCursor();
            ?>
        </div>
    </section>
    
    <section>
        <p class="classname"> coco</p>
    </section>
    
    <script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>
    <script src="/public/app.js"></script>
    </body>
</html>