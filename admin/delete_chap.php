<?php ob_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../public/php.css">
        <meta charset="utf-8" />
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ADMINISTRATION DU SITE</title>
    <body>
        <?php
        require_once 'database.php';
        if(isset($_SESSION['admin']) AND !empty($_SESSION['admin'])){
            if(isset($_GET['id']))
            {
                
                    $req = $db->query('SELECT * FROM post WHERE id = '.$_GET['id']);
                    $chap = $req->fetch();
                    if($chap) {
                        $req = $db->query('DELETE FROM post WHERE id = '.$_GET['id']);
                        header('location:../index.php');
                    }
                
                //    else{
                //        header('location:index.php');
                //    }
                //}
                // else{
                //        header('location:index.php');
                //    }
            
            }
                 }
        else{
             header('location:../index.php');
        }
        ?>
<?php ob_end_flush(); ?>