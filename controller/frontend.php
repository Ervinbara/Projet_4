<!--Création de fonction utilisant les fonction du model, et choix de page de lancement de la fonction-->
<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');


function listPosts()
{
    $postManager = new PostManager(); // Création d'un objet
    $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet

    require('admin/listPostsView.php');

}


function post()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('admin/postView.php');
    
}


function addComment($postId, $author, $comment)
{
    $commentManager = new CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

}

function reportComment($id_report){
   $postManager = new PostManager();
   $report = $postManager->reportComs($id_report);
}
