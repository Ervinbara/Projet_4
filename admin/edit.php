<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../public/css/php.css">
        <meta charset="utf-8" />
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" rel="stylesheet">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ADMINISTRATION DU SITE</title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
        <script type="text/javascript" src="../public/tinymce/tinymce.min.js"></script>
        <script type="text/javascript">
          tinyMCE.init({
            selector: 'textarea',
            forced_root_block : false,
            force_br_newlines : true,
            force_p_newlines : false
             
          });
        </script>
    </head>    
    <body>
    <?php include('../public/header/header_admin.php');?>
        <?php
        
        require_once '../model/PostManager.php';
        require_once 'database.php';
       //if(!isset($_SESSION['admin']) OR empty($_SESSION['admin'])){
       //    header('location:../index.php');
       // }
        
            //if (isset($_POST) AND !empty($_POST)){
            //    if (!empty($_POST['title']) AND !empty($_POST['content'])){
            //        
            //        $title = htmlspecialchars($_POST['title']);
            //        $content = htmlspecialchars($_POST['content']);
            //        $req = $db->prepare('UPDATE post SET  title = :title , content = :content WHERE id = '.$_GET['id']);
            //        $req->execute([
            //            'title' => $_POST['title'],
            //            'content' => $_POST['content'],
            //        ]);
            //        $_SESSION['flash']['success'] = 'Votre chapitre à bien été modifié !';
            //        $_SESSION['flash']['error'] = 'Veuillez remplir tout les champs !';
            
           
        ?>
        
        
        <?php
         $postManager = new PostManager();
         $post = $postManager->getPost($_GET['id']);
        ?>
        <?php
        if(isset($_SESSION['flash']['success'])){
            echo "<div class='bg-success'>".$_SESSION['flash']['success'].'</div>';
        }
        elseif (isset($_SESSION['flash']['error'])){
            echo "<div class='text-danger'>".$_SESSION['flash']['error'].'</div>';
        }
        ?>
        
        
        <div class="container form_modif">    
            <h3>Modifier le chapitre "<?= $post['title'] ?>"</h3>
                <form action="../index.php?action=update_post&amp;postUpdate_id=<?= $post['id'] ?>" method="POST">
                    <input type="text" name="title" value="<?= $post['title'] ?>" /><br />
                    <textarea id="post" name="content" ><?= $post['content'] ?></textarea><br />
                    <input type="submit" value="Modifier" />
                </form>
        </div>
        
        
        <ul>
                <li style="list-style: none"><a href="../admin/index.php">Retourner à l'accueil admin ?</a></li>
           </ul>
    </body>
</html>