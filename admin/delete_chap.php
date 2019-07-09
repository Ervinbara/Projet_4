<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../public/php.css">
        <meta charset="utf-8" />
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
        ?>