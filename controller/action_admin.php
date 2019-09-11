<?php

// Chargement des classes
require_once('model/AdminManager.php');

//Fonctions administrateur

function deletePost($id_post){
   $adminManager = new AdminManager();
   $deletePost = $adminManager->deletePost($id_post);
   if($_SESSION){
     if($_SESSION['username'] == 'admin' AND !empty($_SESSION['username'])){
         if($deletePost){
            header('location: index.php?action=admin_action&alert=delete_post');
         }
      }
      else{
           header('location: index.php?action=listPosts');
      }
   }
   else{
       header('location: index.php?action=listPosts');
  }
}

function addChapter($title,$content)
{
      $adminManager = new AdminManager(); // Création d'un objet
      $add = $adminManager->add($title,$content); // Appel d'une fonction de cet objet
            if($add){
               header('location: index.php?action=admin_action&alert=addchap');
            }
         
}

function update($title,$content,$id_postUpdate)
{
   $adminManager = new AdminManager();
   $update = $adminManager->edit($title,$content,$id_postUpdate);

         if($update){
            header('location: index.php?action=admin_action&alert=updatechap');
         }
           
}


function deleteComs($delete)
{
   $adminManager = new AdminManager();
   $adminManager->delete_comment($delete);
   
   if(isset($_GET['comment_id']) AND !empty($_GET['comment_id'])) {
   if($adminManager){
      header('location: index.php?action=coms_report_view&alert=delete_coms_report');
   }
   }
}