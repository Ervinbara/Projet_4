<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="public/css/php.css">
         <link rel="stylesheet" href="public/css/custom_element.css">
        <meta charset="utf-8" />
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="stylesheet" href="public/css/admin_header.css">
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
      <?php include('public/header/header_admin.php');?>
     <div class="container">
        <form action="index.php?action=add_post" method="POST">
            <input type="text" name="article_titre" placeholder="Titre" /><br />
            <textarea id="post" name="article_contenu" placeholder="Contenu de l'article"></textarea><br />
            <input class="btn_post_chap" type="submit" value="Poster" />
        </form>
     </div>
        
        
       <li style="list-style: none"><a href="index.php?action=admin_access">Retourner à l'accueil admin ?</a></li>
       

        
    </body>
</html>