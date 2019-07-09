<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../public/php.css">
        <meta charset="utf-8" />
        <title>ADMINISTRATION DU SITE</title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
        <script type="text/javascript" src="../public/tinymce/tinymce.min.js"></script>
        <script type="text/javascript">
          tinyMCE.init({
            selector: 'textarea',
          });
        </script>
    </head>    
    <body>

        <?php
        
        require_once '../model/PostManager.php';
        require_once 'database.php';
       //if(!isset($_SESSION['admin']) OR empty($_SESSION['admin'])){
       //    header('location:../index.php');
       // }
        
            if (isset($_POST) AND !empty($_POST)){
                if (!empty($_POST['title']) AND !empty($_POST['content'])){
                    
                    $title = htmlspecialchars($_POST['title']);
                    $content = htmlspecialchars($_POST['content']);
                    $req = $db->prepare('UPDATE post SET title = $title, content = $content WHERE id = '.$_GET['id']);
                    $req->execute(array($_POST['title'], $_POST['content']));
                }
            }
            $postManager = new PostManager();
            $post = $postManager->getPost($_GET['id']);
        ?>
        
        <div class="form_modif">    
            <h3>Modifier le chapitre "<?= $post['title'] ?>"</h3>
                <form method="POST">
                    <input type="text" name="title" value="<?= $post['title'] ?>" /><br />
                    <textarea id="post" name="content" ><?= $post['content'] ?></textarea><br />
                    <input type="submit" value="Modifier" />
                </form>
        </div>
        
    </body>
</html>