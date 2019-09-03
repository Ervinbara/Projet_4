<?php /*session_start();*/
ob_start();?>
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
        <h3>CONNEXION</h3>
            
            <?php
        //    
        //    if(isset($_POST['username']) AND isset($_POST['password'])){
        //        if(!empty($_POST['username']) AND !empty($_POST['password'])) {
        //            
        //            $username = htmlspecialchars($_POST['username']);
        //            $password = htmlspecialchars($_POST['password']);
        //            
        //            require_once('../model/UserManager.php');
        //            $connexion = new UserManager();
        //            $req = $connexion->login($username);
        //            $isPasswordCorrect = password_verify($password, $req['password']);
        //            
        //            $user = $req->fetch();
        //            
        //            
        //            //Vérifie si c'est le bon compte sinon on affiche un message d'erreur
        //            if($user) {
        //                $_SESSION['admin'] = $_POST['username'];
        //                 header('location: index.php?action=admin_access');
        //            }
        //            
        //            else{
        //               $error = 'Identifiant ou Mot de passe incorrect';
        //            }
        //            
        //    }
        //    else{
        //        $error = 'Veuillez remplir tous les champs';
        //    }
        //    if(isset($error)){
        //        echo $error;
        //    }
        //    
        //    
        //}
        ?>
        
        <form action="index.php?action=connexion_admin" method="POST">
            <input type="text" name="username" placeholder="Identifiant"/><br />
            <input type="password" name="password" placeholder="Mot de passe"/><br />
            <button class="btn_valid_id" >Valider</button>  <br/><br/>
            <a class="btn_return_home" href="index.php">Retour</a>
            <a class="btn_return_home" href="index.php?action=Viewlog">Inscription</a>
            
        </form>
        </div>
          
    </body>
</html>
<?php ob_end_flush(); ?>