<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');


function addComment($postId, $author, $comment)
{
    $commentManager = new CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);
      if($affectedLines){                             
         echo '<script language="JavaScript" type="text/javascript">
         window.location.replace("index.php?action=post&id="+"' . $_GET['id'] .' &alert=commentaire");
         </script>';
         exit();	
      }
      
}

function reportComment($id_report){
   $postManager = new PostManager();
   $report = $postManager->reportComs($id_report);
}