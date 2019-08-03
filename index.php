<!--ROUTEUR, appel des controlleurs en fonction de ce que l'on veut-->
<?php session_start(); ?>
<?php
require('controller/frontend.php');


try { // On essaie de faire des choses
    
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        }
        
        
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            }
            else {
                // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                }
                else {
                    // Autre exception
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                // Autre exception
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        
        elseif ($_GET['action'] == 'supprime') {
             //print('test');
             //header('location:admin/signaler.php');
             //Problème à partir de là//
             if(isset($_GET['comment_id']) AND !empty($_GET['comment_id'])) {
                //$supprime = (int) $_GET['supprime'];
                //$_SESSION['flash']['success'] = 'Commentaire Supprimer !';
                deleteComs($_GET['comment_id']);
                header('location:admin/signaler.php');
                 
            }
        }
        elseif ($_GET['action'] == 'supprimePost') {
             //print('test');
             //header('location:admin/signaler.php');
             //Problème à partir de là//
             //if(isset($_GET['comment_id']) AND !empty($_GET['comment_id'])) {
                //$supprime = (int) $_GET['supprime'];
                //$_SESSION['flash']['success'] = 'Commentaire Supprimer !';
                deletePost($_GET['id_delete']);
                header('location:index.php');
                 
            //}
        }
        
        
        
            //if(isset($_SESSION['flash']['success'])){
            //   echo "<div class='bg-success'>".$_SESSION['flash']['success'].'</div>';
            //   } 
        
            
        
        
        
        //elseif (isset($_GET['action']=='commentReport')) {
        // print('coco');
        //    
        //        commentReport();
        //    
        //}
        
        elseif ($_GET['action'] == 'add_post') {
           if(isset($_POST['article_titre'], $_POST['article_contenu'])) {
           if(!empty($_POST['article_titre']) AND !empty($_POST['article_contenu'])) {
              
              $article_titre = $_POST['article_titre'];
              $article_contenu = $_POST['article_contenu'];
                addChapter($article_titre,$article_contenu);
                header('location:admin/index.php');
             
           }
         }   
        }
        
        //elseif ($_GET['action'] == 'listpostsReport') {
        //    listpostsReport();
        
        //}
        elseif ($_GET['action'] == 'update_post') {
           //if(isset($_POST['title'], $_POST['content'])) {
           //if(!empty($_POST['title']) AND !empty($_POST['content'])) {
                $titre = $_POST['title'];
                $contenu = $_POST['content'];
                $id_postUpdate = $_GET['postUpdate_id'];
                update($titre,$contenu,$id_postUpdate);
                header('location:index.php');
            
            }
       // }
        
    }          
    else {
        listPosts();
    }
}

catch(Exception $e) {
    $errorMessage = $e->getMessage();
    require('view/frontend/errorView.php');
}

