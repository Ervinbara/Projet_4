<?php
class PostManager
{
    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM post ORDER BY creation_date DESC LIMIT 0, 5');

        return $req;
    }

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM post WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }
    
    public function edit($title,$content)
    {
        $db = $this->dbConnect();
        
        $title = htmlspecialchars($_POST['title']);
        $content = htmlspecialchars($_POST['content']);
        
        $req = $db->prepare('UPDATE post SET  title = :title , content = :content WHERE id = '.$_GET['id']);
        $req->execute([
        'title' => $_POST['title'],
        'content' => $_POST['content'],
        ]);
    }
    
       $bdd = new PDO("mysql:host=127.0.0.1;dbname=blog;charset=utf8", "root", "");
   if(isset($_POST['article_titre'], $_POST['article_contenu'])) {
   if(!empty($_POST['article_titre']) AND !empty($_POST['article_contenu'])) {
      
      $article_titre = htmlspecialchars($_POST['article_titre']);
      $article_contenu = htmlspecialchars($_POST['article_contenu']);
      $ins = $bdd->prepare('INSERT INTO post (title, content, creation_date) VALUES (?, ?, NOW())');
      $ins->execute(array($article_titre, $article_contenu));
      $message = 'Votre Chapitre a bien été posté';
   } else {
      $message = 'Veuillez remplir tous les champs';
   }
}


    private function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
        return $db;
    }
}