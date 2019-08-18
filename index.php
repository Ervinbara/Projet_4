<!--ROUTEUR, appel des controlleurs en fonction de ce que l'on veut-->

<link rel="stylesheet" href="public/css/js.css">
<script
src="https://code.jquery.com/jquery-3.3.1.js"
integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
crossorigin="anonymous"></script>
<script type="text/javascript" src="public/session.js"></script>

<?php
  ob_start();  
require('controller/frontend.php');
require_once('model/message_session.php');
$session = new Session_message();
header("Status: 301 Moved Permanently", false, 301);
try { // On essaie de faire des choses

    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        }
        
        //Affichage de message flash après une action suppression,ajout et modification d'un post
        
        elseif ($_GET['action'] == 'add_chap') {
            if(isset($_GET['alert']) && $_GET['alert'] == 'addchap'){
                    $session->setFlash('Chapitre ajouté !','primary');
                    $session->flash();
                    listPosts();
            }
            if(isset($_GET['alert']) && $_GET['alert'] == 'updatechap'){
                    $session->setFlash('Chapitre modifié !','primary');
                    $session->flash();
                    listPosts();
            }
            if(isset($_GET['alert']) && $_GET['alert'] == 'delete_post'){
                    $session->setFlash('Chapitre supprimé !','primary');
                    $session->flash();
                    listPosts();
            }
        }
        
        
        elseif ($_GET['action'] == 'post') {
            if(isset($_GET['alert']) && $_GET['alert'] == 'signaler'){
                    $session->setFlash('Commentaire signalé !','success'); //Affichage de message flash après le signalement
                    $session->flash();
                }
            if(isset($_GET['alert']) && $_GET['alert'] == 'commentaire'){
                    $session->setFlash('Commentaire posté !','success'); //Affichage de message flash après avoir posté un coms
                    $session->flash();
            }
             if(isset($_GET['alert']) && $_GET['alert'] == 'missing_field'){
                    $session->setFlash('Veuillez remplir tout les champs','danger'); //Affichage de message flash après avoir posté un coms
                    $session->flash();
            }
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
                    
                    echo '<script language="JavaScript" type="text/javascript">
                    window.location.replace("index.php?action=post&id="+"' . $_GET['id'] .' &alert=commentaire");
                    </script>';
                    exit();	
                    //header('Location: index.php?action=post&id=' . $_GET['id'] . '&alert=commentaire');
                }
                else {
                    // Autre exception
                    echo '<script language="JavaScript" type="text/javascript">
                    window.location.replace("index.php?action=post&id="+"' . $_GET['id'] .' &alert=missing_field");
                    </script>';
                    exit();	
                    //header('Location: index.php?action=post&id=' . $_GET['id'] . '&alert=missing_field');
                }
            }
            else {
                // Autre exception
                throw new Exception('Aucun identifiant de billet envoyé');
            }
            
            
        }
        
        //Méthode de suppression de commentaire signalé
        
        elseif ($_GET['action'] == 'supprime') {
             if ($_GET['action'] == 'deletecomsReport') {
                    $session->setFlash('Commentaire supprimé !','success');
                    $session->flash();  
        }
            
             if(isset($_GET['comment_id']) AND !empty($_GET['comment_id'])) {
                deleteComs($_GET['comment_id']);
                
                echo '<script language="JavaScript" type="text/javascript">
                    window.location.replace("admin/signaler.php?action=deletecomsReport");
                    </script>';
                exit();
                //header('location: admin/signaler.php?action=deletecomsReport');
                 
            }
        }
       
        
        //Méthode de suppression de chapitre
        
        elseif ($_GET['action'] == 'supprimePost') {

                deletePost($_GET['id_delete']);
                
                echo '<script language="JavaScript" type="text/javascript">
                    window.location.replace("index.php?action=add_chap&alert=delete_post");
                    </script>';
                exit();
                //header('location: index.php?action=add_chap&alert=delete_post');

        }
        
        
        elseif ($_GET['action'] == 'add_post') {
           if(isset($_POST['article_titre'], $_POST['article_contenu'])) {
           if(!empty($_POST['article_titre']) AND !empty($_POST['article_contenu'])) {
              
              $article_titre = $_POST['article_titre'];
              $article_contenu = $_POST['article_contenu'];
                addChapter($article_titre,$article_contenu);
                
                echo '<script language="JavaScript" type="text/javascript">
                    window.location.replace("index.php?action=add_chap&alert=addchap");
                    </script>';
                exit();
                //header('location: index.php?action=add_chap&alert=addchap');
             
           }
         }   
        }
        

        elseif ($_GET['action'] == 'update_post') {
           if(isset($_POST['title'], $_POST['content'])) {
           if(!empty($_POST['title']) AND !empty($_POST['content'])) {
                $titre = $_POST['title'];
                $contenu = $_POST['content'];
                $id_postUpdate = $_GET['postUpdate_id'];
                update($titre,$contenu,$id_postUpdate);
                
                echo '<script language="JavaScript" type="text/javascript">
                    window.location.replace("index.php?action=add_chap&alert=updatechap");
                    </script>';
                exit();
                //header('location: index.php?action=add_chap&alert=updatechap');
            
                }
            }
        }
        
        elseif ($_GET['action'] == 'signale_comment') {
                $id_postUpdate = $_GET['report_id'];
                reportComment($id_postUpdate);
                $id = $_GET['id_post'];
                
                echo '<script language="JavaScript" type="text/javascript">
                    window.location.replace("index.php?action=post&id="+"' . $id .' &alert=signaler");
                    </script>';
                exit();
                
                //header('Location: index.php?action=post&id=' . $id . '&alert=signaler');
                
            }
        
        elseif($_GET['action'] == 'allpostsView') {
            allpostsView();
        }
                
     } 
        
              
    else {
        listPosts();
    }
   
}

catch(Exception $e) {
    $errorMessage = $e->getMessage();
    require('view/frontend/errorView.php');
}

 ob_end_flush();