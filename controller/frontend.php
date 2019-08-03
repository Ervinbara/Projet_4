<!--Création de fonction utilisant les fonction du model, et choix de page de lancement de la fonction-->
<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function update($title,$content,$id_postUpdate)
{
   $postManager = new PostManager();
   $update = $postManager->edit($title,$content,$id_postUpdate);
}

function deletePost($id_post){
   $postManager = new PostManager();
   $deletePost = $postManager->deletePost($id_post);
}

function addChapter($t,$c)
{
      $postManager = new PostManager(); // Création d'un objet
      $add = $postManager->add($t,$c); // Appel d'une fonction de cet objet
      
      //require('admin/index.php');
      
}


function deleteComs($delete)
{
   $commentManager = new CommentManager();
   $commentManager->delete_comment($delete);
   
       
   require('admin/signaler.php');
}

function listPosts()
{
    $postManager = new PostManager(); // Création d'un objet
    $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet

    require('view/frontend/listPostsView.php');

}

function post()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/frontend/postView.php');
    
}


function addComment($postId, $author, $comment)
{
    $commentManager = new CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

//function listpostsReport()
//{
//    $commentManager = new CommentManager(); // Création d'un objet
//    $comments = $commentManager->commentReport(); // Appel d'une fonction de cet objet
//
//    require('admin/signaler.php');
//
//}
