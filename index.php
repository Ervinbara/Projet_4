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
        //elseif ($_GET['action'] == 'sendContent') {
        //    if(isset($_POST['article_titre'], $_POST['article_contenu'])) {
        //        if(!empty($_POST['article_titre']) AND !empty($_POST['article_contenu'])) {
        //            sendContent( $_POST['article_titre'], $_POST['article_contenu']);
        //            $article_titre = htmlspecialchars($_POST['article_titre']);
        //            $article_contenu = htmlspecialchars($_POST['article_contenu']);
        //            $message = 'Votre article a bien été posté';
        //         } else {
        //            $message = 'Veuillez remplir tous les champs';
        //         }
        //      }
        //      else {
        //        // Autre exception
        //        throw new Exception('Veuillez recommencer');
        //    }
        //    }
    }  
            
    else {
        listPosts();
    }
}

catch(Exception $e) {
    $errorMessage = $e->getMessage();
    require('view/frontend/errorView.php');
}



