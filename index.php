<?php session_start();?>

<?php ini_set('error_reporting', E_ALL);?>
<link rel="stylesheet" href="public/css/js.css">
<script
src="https://code.jquery.com/jquery-3.3.1.js"
integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
crossorigin="anonymous"></script>
<script type="text/javascript" src="public/session.js"></script>
        <!--CDN Bootstrap-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <!--Fin lien Bootstrap-->

<?php  
require('controller/frontend.php');
require('controller/backend.php');
require('controller/account.php');
require_once('model/message_session.php');
$session_message = new Session_message();

try {
    //View
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        }
        
        elseif ($_GET['action'] == 'admin_action') {
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
        
        elseif ($_GET['action'] == 'Viewlog') {
                    if(isset($_GET['alert']) && $_GET['alert'] == 'missing_field'){
                        $session_message->setFlash('Champs manquant !','warning');
                        $session_message->flash();
                        logView();
                    }
                        if(isset($_GET['alert']) && $_GET['alert'] == 'password_wrong'){
                        $session_message->setFlash('Les mots de passe ne correspondent pas','warning');
                        $session_message->flash();
                        logView();
                    }
                        if(isset($_GET['alert']) && $_GET['alert'] == 'password_short'){
                        $session_message->setFlash('Mot de passe trop court','warning');
                        $session_message->flash();
                        logView();
                    }
                        if(isset($_GET['alert']) && $_GET['alert'] == 'username_unvalaible'){
                        $session_message->setFlash('Identifiant non conforme','warning');
                        $session_message->flash();
                         logView();
                    }
                
                else{
                    logView();
                }
                      
                }
                
        elseif ($_GET['action'] == 'connexion_View') {
                    if(isset($_GET['alert']) && $_GET['alert'] == 'valid_account'){
                        $session_message->setFlash('Compte crée avec succés !','primary');
                        $session_message->flash();
                        connectView();
                    }
                    if(isset($_GET['alert']) && $_GET['alert'] == 'missing_field'){
                        $session_message->setFlash('Champs manquant !','warning');
                        $session_message->flash();
                        connectView();
                    }

                
                else{
                    connectView();
                    }
                      
                }
                
         elseif ($_GET['action'] == 'coms_report_view') {
                    if(isset($_GET['alert']) && $_GET['alert'] == 'delete_coms_report'){
                        $session_message->setFlash('Commentaire supprimé !','success');
                        $session_message->flash();
                        viewcommentReport();
                    }
                
                else{
                    viewcommentReport();
                    }
                      
                }
                
        elseif ($_GET['action'] == 'modifyPost') {
                    editView();                      
                }
                
        elseif ($_GET['action'] == 'addPost') {
                    addchapterView();                      
                }
                
        elseif ($_GET['action'] == 'allPost') {
                    allPostView();                      
                }
        
                
        elseif ($_GET['action'] == 'addComment') {
            
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment(htmlspecialchars($_GET['id']), htmlspecialchars($_POST['author']), htmlspecialchars($_POST['comment']));
                    
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
                    window.location.replace("index.php?action=coms_report_view&alert=delete_coms_report");
                    </script>';
                exit();
                
                 
            }
        }
       
        
        elseif ($_GET['action'] == 'supprimePost') {
            if(isset($_SESSION['admin']) AND !empty($_SESSION['admin'])){
                deletePost($_GET['id_delete']);
                
                echo '<script language="JavaScript" type="text/javascript">
                    window.location.replace("index.php?action=admin_action&alert=delete_post");
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
                    window.location.replace("index.php?action=admin_action&alert=addchap");
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
                    window.location.replace("index.php?action=admin_action&alert=updatechap");
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
            
        

                
                elseif ($_GET['action'] == 'connexion_admin') {
                    if(isset($_POST['username']) AND isset($_POST['password'])){
                     if(!empty($_POST['username']) AND !empty($_POST['password'])) {
                    
                    $username = htmlspecialchars($_POST['username']);
                    $password = htmlspecialchars($_POST['password']);
                    //$isPasswordCorrect = password_verify($password);
                    connexion($username,$password);
                    
                    
                    //$user = $req->fetch();
                    $_SESSION['admin'] = $_POST['username'];
                    header('location: admin/admin_view/admin_index.php');
 
                     }
                    
                    }

                      
                }
                
     
     
        
        elseif ($_GET['action'] == 'inscription') {
        
            if(isset($_POST['username']) AND isset($_POST['password']) AND isset($_POST['password_confirm'])){
                if(!empty($_POST['username']) AND !empty($_POST['password']) AND !empty($_POST['password_confirm'])){
                $username = trim(htmlspecialchars($_POST['username']));
                $password = trim(htmlspecialchars($_POST['password']));
                $pass_confirm = trim(htmlspecialchars($_POST['password_confirm']));
            
                    if(strlen($username) >=3 AND strlen($username) <= 255){
                        if(strlen($password) >=8 AND strlen($password) <= 255){
                         if($password == $pass_confirm){
                            // Hachage du mot de passe
                            $pass_hache = password_hash($password, PASSWORD_DEFAULT);
                            create_account($username,$pass_hache);
                            echo '<script language="JavaScript" type="text/javascript">
                            window.location.replace("index.php?action=connexion_View&alert=valid_account");
                            </script>';
                            exit();
                            // Insertion
            
                        die('ok');
                        }
                        else{
                            echo '<script language="JavaScript" type="text/javascript">
                            window.location.replace("index.php?action=Viewlog&alert=password_wrong");
                            </script>';
                            exit();
                        }
                    }
                    else{
                            echo '<script language="JavaScript" type="text/javascript">
                            window.location.replace("index.php?action=Viewlog&alert=password_short");
                            </script>';
                            exit();
                    }
            
                } 
                else{
                            echo '<script language="JavaScript" type="text/javascript">
                            window.location.replace("index.php?action=Viewlog&alert=username_unvalaible");
                            </script>';
                            exit();
                }

             }
             else{
                echo '<script language="JavaScript" type="text/javascript">
                window.location.replace("index.php?action=Viewlog&alert=missing_field");
                </script>';
                exit();
             }
            }
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
