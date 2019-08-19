<!DOCTYPE html>
<html>
     <head>
        <meta charset="utf-8" />
        <title>Blog jean forteroche</title>
        <link rel="stylesheet" href="public/css/articles.css">
        <link rel="stylesheet" href="public/css/footer.css">
        <link rel="stylesheet" href="public/css/nheader.css">
        
        <!--CDN Bootstrap-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <!--Fin lien Bootstrap-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

       <!--meta-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--Fin meta -->
        
        <?php include('public/header/nheader.php');?>
    </head>    
    <body>
   <div class="container flotte">
    <img class="img_jf" src="public/images/old.jpg" alt="Moi" />
       <p style="padding: 20px">
        Toutes les nouveautés, rien que des nouveautés.Un texte est une série orale ou écrite de mots perçus comme constituant un ensemble cohérent, porteur de sens et utilisant les structures propres à une langue. Un texte n'a pas de longueur déterminée sauf dans le cas de poèmes à forme fixe comme le sonnet ou le haïku
        Toutes les nouveautés, rien que des nouveautés.Un texte est une série orale ou écrite de mots perçus comme constituant un ensemble cohérent, porteur de sens et utilisant les structures propres à une langue. Un texte n'a pas de longueur déterminée sauf dans le cas de poèmes à forme fixe comme le sonnet ou le haïku
        <a href="public/body_bio.php">Lire la suite ?</a>
       </p>
   </div>  
    <section role="main">
        <div class="container"><!--overflow:auto-->
            <div class="titre">
                <hr/>
                <h2 class="articles_title">Dernières parutions</h2>
            </div> 
            <?php
            while ($data = $posts->fetch())
             {
            ?>
            <div class="articles">  
                <div class="articles_item" style="background: url('public/images/chap.jpg'); background-size: cover;">
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
            
            $posts->closeCursor();
            ?>
            <p>Voir l'ensemble des chapitre <em style="font-size: large"><a href="admin/allpostView.php">ici</a></em></p>
            
        </div>
    </section>
    
    <?php include('public/footer.php');?>

    </body>
</html>