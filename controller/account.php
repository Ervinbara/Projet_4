<?php

// Chargement des classes
require_once('model/UserManager.php');

//Fonction et view inscription
function create_account($username,$password){
    $userManager = new UserManager();
    $create = $userManager->account($username,$password);
}

function logView(){
    require_once('admin/user/inscription.php');
}
//Fin inscription

//Fonction et view connexion

function connexion($username,$password){
    $userManager = new UserManager();
    $connexion = $userManager->login($username,$password);

}

function connectView(){
    require_once('admin/user/login.php');
}

//Fin connexion