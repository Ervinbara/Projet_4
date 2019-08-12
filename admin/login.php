<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../public/css/login.css">
        <meta charset="utf-8" />
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ADMINISTRATION DU SITE</title>
       
        <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <body>
       <?php require_once 'database.php';?>
       <div class="container login">
        <h3>CONNEXION</h3>
       
            <?php
            if(isset($_POST['username']) AND isset($_POST['password'])){
                if(!empty(htmlspecialchars($_POST['username'])) AND !empty(htmlspecialchars($_POST['password']))) {
                    $req = $db->prepare('SELECT * FROM users WHERE username = :username  AND password = :password');
                    
                    $req->execute([
                        
                         'username' => $_POST['username'],
                         'password' => $_POST['password']
                                   
                    ]);
                    
                    //Attribution des utilisateur à notre variable user
                    $user = $req->fetch();
                    
                    
                    //Vérifie si c'est le bon compte sinon on affiche un message d'erreur
                    if($user) {
                        $_SESSION['admin'] = $_POST['username'];
                        header('location:index.php');
                    }
                    
                    else{
                        $error = 'Identifiant ou Mot de passe incorrect';
                    }
                    
            }
            else{
                $error = 'Veuillez remplir tout les champs';
            }
            if(isset($error)){
                echo $error;
            }
            
            
        }
        ?>
        
        <form action="login.php" method="POST">
            <input type="text" name="username" placeholder="Identifiant"/><br />
            <input type="password" name="password" placeholder="Mot de passe"/><br />
            <button>Valider</button>   
        </form>
        </div>
          
    </body>
</html>