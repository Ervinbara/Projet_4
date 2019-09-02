<?php

// Chargement des classes
require_once('model/AdminManager.php');
require_once ('model/PostManager.php');

//View de l'administration

function viewcommentReport(){    
    $adminManager = new AdminManager();
    $comments = $adminManager->get_comment_report();
    require('admin/admin_view/signaler.php');
}

function editView(){
    $postManager = new PostManager();
    $post = $postManager->getPost($_GET['id']);
    require_once('admin/admin_view/edit.php');
}

function addchapterView(){
    require_once('admin/admin_view/creation_chap.php');
}

function admin_index_view(){
    require_once('admin/admin_view/admin_index.php');
}

