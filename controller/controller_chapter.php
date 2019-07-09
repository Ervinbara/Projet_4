<?php
require_once('model/WriteManager.php');

function sendContent($article_titre, $article_contenu)
{
    $writeManager = new WriteManager(); // Création d'un objet
    $write = $writeManager->createContent($article_titre, $article_contenu); // Appel d'une fonction de cet objet
    require('view/frontend/adminView.php');
 
}