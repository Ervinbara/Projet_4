<?php session_start();
ob_start();?>
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
    </head>
    
    <body>
       <div class="container login">
        <h3>CONNEXION</h3>
       
            <?php
            if(isset($_POST['username']) AND isset($_POST['password'])){
                if(!empty($_POST['username']) AND !empty($_POST['password'])) {
                    
                    require_once('../model/PostManager.php');
                    $connexion = new PostManager();
                    $req = $connexion->login($_POST['username'],$_POST['password']);
                    
                    //Attribution des utilisateur à notre variable user
                    $user = $req->fetch();
                    
                    
                    //Vérifie si c'est le bon compte sinon on affiche un message d'erreur
                    if($user) {
                        $_SESSION['admin'] = $_POST['username'];
                        //$host = $_SERVER['HTTP_HOST'];
                         header('location: admin_index.php');
                         //header('location: http://'.$host.'/admin/index.php');
                        //header('location: http://jean-forteroche.ervinbara-projet.com/admin/index.php');
                    }
                    
                    else{
                        $error = 'Identifiant ou Mot de passe incorrect';
                    }
                    
            }
            else{
                $error = 'Veuillez remplir tous les champs';
            }
            if(isset($error)){
                echo $error;
            }
            
            
        }
        ?>
        
        <form action="login.php" method="POST">
            <input type="text" name="username" placeholder="Identifiant"/><br />
            <input type="password" name="password" placeholder="Mot de passe"/><br />
            <button class="btn_valid_id">Valider</button>  <br/><br/>
            <a class="btn_return_home" href="../index.php">Retour</a>
        </form>
        </div>
          
    </body>
</html>
<?php ob_end_flush(); ?>