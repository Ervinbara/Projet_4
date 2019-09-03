<?php
$_SESSION = array();
session_destroy();
    echo '<script language="JavaScript" type="text/javascript">
    window.location.replace("index.php?action=connexion_View&alert=logout");
    </script>';
    exit();
?>