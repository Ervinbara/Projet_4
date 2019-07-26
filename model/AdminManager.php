<?php
class AdminManager
{
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
    
    
      private function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $db;
    }

}