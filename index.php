<?php session_start();?>

<?php ini_set('error_reporting', E_ALL);?>
<link rel="stylesheet" href="public/css/js.css">
<script
src="https://code.jquery.com/jquery-3.3.1.js"
integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
crossorigin="anonymous"></script>
<script type="text/javascript" src="public/session.js"></script>

<?php  
require('controller/frontend.php');
require_once('model/message_session.php');
$session_message = new Session_message();

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        }
        
        elseif ($_GET['action'] == 'add_chap') {
            if(isset($_GET['alert']) && $_GET['alert'] == 'addchap'){
                    $session_message->setFlash('Chapitre ajouté !','primary');
                    $session_message->flash();
                    listPosts();
            }
            if(isset($_GET['alert']) && $_GET['alert'] == 'updatechap'){
                    $session_message->setFlash('Chapitre modifié !','primary');
                    $session_message->flash();
                    listPosts();
            }
            if(isset($_GET['alert']) && $_GET['alert'] == 'delete_post'){
                    $session_message->setFlash('Chapitre supprimé !','primary');
                    $session_message->flash();
                    listPosts();
            }
        }
        
        
        elseif ($_GET['action'] == 'post') {
            if(isset($_GET['alert']) && $_GET['alert'] == 'signaler'){
                    $session_message->setFlash('Commentaire signalé !','success'); 
                    $session_message->flash();
                }
            if(isset($_GET['alert']) && $_GET['alert'] == 'commentaire'){
                    $session_message->setFlash('Commentaire posté !','success'); 
                    $session_message->flash();
            }
             if(isset($_GET['alert']) && $_GET['alert'] == 'missing_field'){
                    $session_message->setFlash('Veuillez remplir tout les champs','danger'); 
                    $session_message->flash();
            }
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
                
                
            }
            else {
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
                }
                else {
                    echo '<script language="JavaScript" type="text/javascript">
                    window.location.replace("index.php?action=post&id="+"' . $_GET['id'] .' &alert=missing_field");
                    </script>';
                    exit();	
                }
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
            
            
        }
        
        elseif ($_GET['action'] == 'supprime') {
            
             if(isset($_GET['comment_id']) AND !empty($_GET['comment_id'])) {
                deleteComs($_GET['comment_id']);
                
                echo '<script language="JavaScript" type="text/javascript">
                    window.location.replace("admin/signaler.php");
                    </script>';
                exit();
                
                 
            }
        }
       
        
        elseif ($_GET['action'] == 'supprimePost') {
            if(isset($_SESSION['admin']) AND !empty($_SESSION['admin'])){
                deletePost($_GET['id_delete']);
                
                echo '<script language="JavaScript" type="text/javascript">
                    window.location.replace("index.php?action=add_chap&alert=delete_post");
                    </script>';
                exit();
 
            }
                else
                    {
                        echo '<script language="JavaScript" type="text/javascript">
                        window.location.replace("../admin/login.php");
                        </script>';
                        exit();
 
                    }

         
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
                
                      
            }
                
     } 
        
              
    else {
        listPosts();
    }
   
}

catch(Exception $e) {
    $errorMessage = $e->getMessage();
    require('admin/errorView.php');
}
