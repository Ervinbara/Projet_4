<?php

// Chargement des classes
require_once('model/AdminManager.php');



function update($title,$content,$id_postUpdate)
{
   $adminManager = new AdminManager();
   $update = $adminManager->edit($title,$content,$id_postUpdate);
}


function viewcommentReport(){
    
   $adminManager = new AdminManager();
    $comments = $adminManager->get_comment_report();
    require('admin/signaler.php');
}


function deletePost($id_post){
   $adminManager = new AdminManager();
   $deletePost = $adminManager->deletePost($id_post);
}

function addChapter($title,$content)
{
      $adminManager = new AdminManager(); // Création d'un objet
      $add = $adminManager->add($title,$content); // Appel d'une fonction de cet objet
      
}


function deleteComs($delete)
{
   $adminManager = new AdminManager();
   $adminManager->delete_comment($delete);
   
}