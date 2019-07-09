<?php
class WriteManager
{
    public function createContent($article_titre, $article_contenu)
    {
        $db = $this->dbConnect();
        $ins = $db->prepare('INSERT INTO post (title, content, creation_date) VALUES (?, ?, NOW())');
        $affectedContent = $ins->execute(array($article_titre, $article_contenu));

        return $affectedContent;
    }
    
    
      private function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
        return $db;
    }

}