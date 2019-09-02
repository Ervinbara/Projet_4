<?php

// Chargement des classes
require_once('model/UserManager.php');

//Fonction et view inscription
function username_exist($username){
    $userManager = new UserManager();
    $username_exist = $userManager->username_exist($username);
      if($username_exist == 1) {
      header('location: index.php?action=Viewlog&alert=username_exist');
      }
}

function create_account($username,$password){
    $userManager = new UserManager();
    $create = $userManager->account($username,$password);
    if($create){
      echo '<script language="JavaScript" type="text/javascript">
      window.location.replace("index.php?action=connexion_View&alert=valid_account");
      </script>';
      exit();
      
    }
}

function logView(){
    require_once('admin/user/inscription.php');
}
//Fin inscription

//Fonction et view connexion

function connexion($username,$password){
    $userManager = new UserManager();
    $connexion = $userManager->login($username);
    $pass = password_verify($password,$connexion['password']);
    
      if ($pass) {
          $_SESSION['id'] = $connexion['id'];
          $_SESSION['username'] = $username;
            echo '<script language="JavaScript" type="text/javascript">
            window.location.replace("index.php?action=admin_access");
            </script>';
            exit();
      }
      else
      {
            echo '<script language="JavaScript" type="text/javascript">
            window.location.replace("index.php?action=connexion_View&alert=wrong_pass_or_id");
            </script>';
            exit();
      }
   
}

function connectView(){
    require_once('admin/user/login.php');
}

function logout(){
   require_once('admin/user/logout.php');
}

//Fin connexion