<?php
session_start();
$_SESSION = array();
session_destroy();
header("Location: ../index.php?action=connexion_View");
?>