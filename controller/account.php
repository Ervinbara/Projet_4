<?php

// Chargement des classes
require_once('model/UserManager.php');
define ("PREFIXE","0SR8V7W9M6");
define ("SUFFIXE","06BS18ZA68");
//Fonction et view inscription
function username_exist($username){
    $userManager = new UserManager();
    $username_exist = $userManager->username_exist($username);
    $password = trim(htmlspecialchars($_POST['password']));
    $pass_confirm = trim(htmlspecialchars($_POST['password_confirm']));
    $pass_hache = PREFIXE.password_hash($password,  PASSWORD_BCRYPT).SUFFIXE;
      if($username_exist) {
      
      header('location: index.php?action=Viewlog&alert=username_exist');
      }
      
      
      elseif($username_exist == 0){
         if(strlen($password) >=8 AND strlen($password) <= 255){
            if($password == $pass_confirm){
         
                      create_account($username,$pass_hache);  
   
             }
         
            else{
            header('location: index.php?action=Viewlog&alert=password_wrong');
            }
         
         }
         else{
         header('location: index.php?action=Viewlog&alert=password_short');
         }
      }
      
}

function create_account($username,$password){
    $userManager = new UserManager();
    $create = $userManager->account($username,$password);
    if($create){
    header('location: index.php?action=connexion_View&alert=valid_account');   
    }
}

function logView(){
    require_once('allView/user/inscription.php');
}
//Fin inscription

//Fonction et view connexion

function connexion($username,$password){
    $userManager = new UserManager();
    $connexion = $userManager->login($username);
    $pass = PREFIXE.password_verify($password,$connexion['password']).SUFFIXE;
    
      if ($pass) {
          $_SESSION['id'] = $connexion['id'];
          $_SESSION['username'] = $username;
            header('location: index.php?action=admin_access');
      }
      else
      {
            header('location: index.php?action=connexion_View&alert=wrong_pass_or_id');
      }
   
}

function connectView(){
    require_once('allView/user/login.php');
}

function logout(){
   require_once('allView/user/logout.php');
}

//Fin connexion