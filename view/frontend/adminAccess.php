<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Blog jean forteroche</title>
        <link rel="stylesheet" href="public/php.css">
        
    </head>
        
    <body>
        
        <!--<textarea class="tinymce"></textarea>-->
        <p>Veuillez fournir le mot de passe :</p>
            <form action="view/frontend/adminView.php" method="post">
                <p>
                <input type="password" name="mot_de_passe" />
                <input type="submit" value="Valider" />
                </p>
            </form>
        <p>Cette page est réservée aux administrateurs du site.</p>
        
    </body>
    
</html>