<?php session_start();?>

<?php ini_set('error_reporting', E_ALL);?>
        <link rel="stylesheet" href="public/css/js.css">
        
        <!--Jquery -->
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
require('controller/front_User.php');
require('controller/front_Admin.php');
require('controller/account.php');
require('controller/action_admin.php');
require('controller/action_user.php');
require_once('model/message_session.php');
$session_message = new Session_message();

try {
    //View
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        }
        
        elseif ($_GET['action'] == 'admin_action'){
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
            if(isset($_GET['alert']) && $_GET['alert'] == 'connexion_user'){
                    $session_message->setFlash('Bienvenu '. $_SESSION['username']. ' !','success');
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
                    if(isset($_GET['alert']) && $_GET['alert'] == 'username_exist'){
                        $session_message->setFlash('Cette identifiant est déjà utilisé','warning');
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
                   if(isset($_GET['alert']) && $_GET['alert'] == 'logout'){
                        $session_message->setFlash('Deconnexion','success');
                        $session_message->flash();
                        connectView();
                    }
                   if(isset($_GET['alert']) && $_GET['alert'] == 'wrong_pass_or_id'){
                        $session_message->setFlash('Mauvais identifiant ou mot de passe','warning');
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
        elseif ($_GET['action'] == 'logout') {
                    logout();                      
                }
                
        elseif ($_GET['action'] == 'admin_access') {
            if($_SESSION){
           if($_SESSION['username'] == 'admin' AND !empty($_SESSION['username'])){ //username tout seul ça marche
            admin_index_view();
            }
            
            elseif(isset($_SESSION['username']) AND !empty($_SESSION['username'])){
            header('location:index.php?action=admin_action&alert=connexion_user');                   
            }
            }
            else{
                echo '<script language="JavaScript" type="text/javascript">
                window.location.replace("index.php?action=connexion_View");
                </script>';
                exit();
            }
        }
                
        elseif ($_GET['action'] == 'addComment') {
            
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment(htmlspecialchars($_GET['id']), htmlspecialchars($_POST['author']), htmlspecialchars($_POST['comment']));
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
                     
            }
        }
       
        
        elseif ($_GET['action'] == 'supprimePost') {
            if($_SESSION['username'] == 'admin' AND !empty($_SESSION['username'])){
                deletePost($_GET['id_delete']);
 
            } 
        }
        
        elseif ($_GET['action'] == 'add_post') {
           if(isset($_POST['article_titre'], $_POST['article_contenu'])) {
           if(!empty($_POST['article_titre']) AND !empty($_POST['article_contenu'])) {
              
              $article_titre = $_POST['article_titre'];
              $article_contenu = $_POST['article_contenu'];
                addChapter($article_titre,$article_contenu);
             
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
            connexion($username,$password);
                   
                }
            else {
                echo '<script language="JavaScript" type="text/javascript">
               window.location.replace("index.php?action=connexion_View&alert=missing_field");
               </script>';
               exit();
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
                        username_exist($username);
                                if(strlen($password) >=8 AND strlen($password) <= 255){
                                    if($password == $pass_confirm){
                                        // Hachage du mot de passe
                                        $pass_hache = password_hash($password, PASSWORD_DEFAULT);
                                        create_account($username,$pass_hache); 
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
}
