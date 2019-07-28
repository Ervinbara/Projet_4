<!--Création de fonction utilisant les fonction du model, et choix de page de lancement de la fonction-->
<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
//require_once('model/WriteManager.php');
//
//function sendContent($article_titre, $article_contenu)
//{
//    $writeManager = new WriteManager(); // Création d'un objet
//    $write = $writeManager->createContent($article_titre, $article_contenu); // Appel d'une fonction de cet objet
//    require('view/frontend/adminView.php');
// 
//}
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

function deleteComs($id)
{
   $commentManager = new CommentManager();
   $delete = $commentManager->deleteComs($coms['id']);
   $coms = $commentManager->commentReport();
   
   require('admin/signaler.php');
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

//function reportComment($postId, $author, $comment)
//{
//    $commentManager = new CommentManager();
//
//    $affectedLines = $commentManager->reportComment($postId, $author, $comment);
//
//    if ($affectedLines === false) {
//        throw new Exception('Impossible d\'ajouter le commentaire !');
//    }
//    else {
//        echo"Le commentaire à bien été signaler";
//    }
//}