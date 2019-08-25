<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="public/css/login.css">
        <meta charset="utf-8" />
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ADMINISTRATION DU SITE</title>   
        <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    </head>
    
    <body>
        
        <div class="container login">    
        <form action="../index.php?action=inscription" method="POST">
            <input type="text" name="username" placeholder="Identifiant"/><br />
            <input type="password" name="password" placeholder="Mot de passe"/><br />
            <input type="password" name="password_confirm" placeholder="Valider le mot de passe"/><br />
            <button class="btn_valid_id">Valider</button>  <br/><br/>
            <a class="btn_return_home" href="index.php?action=connexion_View">Retour</a>
        </form>   
        </div>
            
    </body>
</html>