<?php

// Chargement des classes
require_once('model/AdminManager.php');

//Fonctions administrateur

function deletePost($id_post){
   $adminManager = new AdminManager();
   $deletePost = $adminManager->deletePost($id_post);
   if($deletePost){
      echo '<script language="JavaScript" type="text/javascript">
      window.location.replace("index.php?action=admin_action&alert=delete_post");
      </script>';
      exit();
   }
}

function addChapter($title,$content)
{
      $adminManager = new AdminManager(); // Création d'un objet
      $add = $adminManager->add($title,$content); // Appel d'une fonction de cet objet
      if($add){
         echo '<script language="JavaScript" type="text/javascript">
         window.location.replace("index.php?action=admin_action&alert=addchap");
         </script>';
         exit();
      }
}

function update($title,$content,$id_postUpdate)
{
   $adminManager = new AdminManager();
   $update = $adminManager->edit($title,$content,$id_postUpdate);
   if($update){
      echo '<script language="JavaScript" type="text/javascript">
      window.location.replace("index.php?action=admin_action&alert=updatechap");
      </script>';
      exit();
   }
}


function deleteComs($delete)
{
   $adminManager = new AdminManager();
   $adminManager->delete_comment($delete);
   
   if($adminManager){
      echo '<script language="JavaScript" type="text/javascript">
      window.location.replace("index.php?action=coms_report_view&alert=delete_coms_report");
      </script>';
      exit();
   }
   
}