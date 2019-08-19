<?php session_start();
ob_start();?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../public/css/php.css">
         <link rel="stylesheet" href="../public/css/custom_element.css">
        <meta charset="utf-8" />
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

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
        if(isset($_SESSION['admin']) AND !empty($_SESSION['admin'])){
        require_once '../model/PostManager.php';
        
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
                    <input class="btn_post_chap" type="submit" value="Modifier" />
                </form>
        </div>
        
        
        <ul>
             <li style="list-style: none"><a href="../admin/admin_index.php">Retourner à l'accueil admin ?</a></li>
        </ul>
        
        <?php
        }
        
        
        else{
             header('location:../index.php');
        }
        ?>
        
    </body>
</html>
<?php ob_end_flush(); ?>