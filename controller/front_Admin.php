<?php

// Chargement des classes
require_once('model/AdminManager.php');
require_once ('model/PostManager.php');

//View de l'administration

function viewcommentReport(){    
    $adminManager = new AdminManager();
    $comments = $adminManager->get_comment_report();
    if($_SESSION){
        if($_SESSION['username'] == 'admin' AND !empty($_SESSION['username'])){
            require('admin/admin_view/signaler.php');
        }
        else{
                 header('location: index.php?action=listPosts');
            }
    }
            
    else{
             header('location: index.php?action=listPosts');
        }
}

function editView(){
    $postManager = new PostManager();
    $post = $postManager->getPost($_GET['id']);
    if($_SESSION){
        if($_SESSION['username'] == 'admin' AND !empty($_SESSION['username'])){
            require_once('admin/admin_view/edit.php');
         }
        else{
                 header('location: index.php?action=listPosts');
            }
     }
            
    else{
             header('location: index.php?action=listPosts');
        }
}

function addchapterView(){
    if($_SESSION){
        if($_SESSION['username'] == 'admin' AND !empty($_SESSION['username'])){
            require_once('admin/admin_view/creation_chap.php');
        }
        else{
                 header('location: index.php?action=listPosts');
            }
     }
         else{
             header('location: index.php?action=listPosts');
        }
}

function admin_index_view(){
    if($_SESSION){
        if($_SESSION['username'] == 'admin' AND !empty($_SESSION['username'])){
            require_once('admin/admin_view/admin_index.php');
        }
        elseif(isset($_SESSION['username']) AND !empty($_SESSION['username'])){
                 header('location: index.php?action=admin_action&alert=connexion_user');
            }
     
    }
         else{
             header('location: index.php?action=connexion_View');
        }
    
}

