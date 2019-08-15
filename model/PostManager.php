<?php
class PostManager
{
    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin\') AS creation_date_fr FROM post ORDER BY creation_date DESC LIMIT 0, 4');

        return $req;
    }
    
    public function allpostsView()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin\') AS creation_date_fr FROM post ORDER BY creation_date');

        return $req;
    }
    
    
    public function deletePost($id_post){
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM post WHERE id = ?');
        $req->execute(array($id_post));

        return $req;
    }

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin\') AS creation_date_fr FROM post WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }
    
   
    
    public function edit($title,$content,$id_postUpdate)
   {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE post SET  title = :title , content = :content WHERE id = :id');
        $req->execute([
            'title' => $title,
            'content' => $content,
            'id' => $id_postUpdate,
            ]);
    }
    
     public function reportComs($id_report)
   {
         $db = $this->dbConnect();
         $req = $db->prepare('UPDATE comments SET signaler=:signaler WHERE id =:id');
         $req->execute([
         'signaler' => 1,
         'id' => $id_report,
     ]);
    }
    
    

        
    public function add($title,$content)
    {
        $db = $this->dbConnect();
        $ins = $db->prepare('INSERT INTO post (title, content, creation_date) VALUES (?, ?, NOW())');
        $ins->execute(array($title, $content));
    
        
    }

    private function dbConnect()
    {
         //$host_name = 'db5000149202.hosting-data.io';
         //$database = 'dbs144387';
         //$user_name = 'dbu315246';
         //$password = 'jean_Forteroche_17';
         //$db = new PDO('mysql:host=db5000149202.hosting-data.io;dbname=dbs144387;charset=utf8', 'dbu315246', 'jean_Forteroche_17');
         //
         //return $db;
           $db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
               return $db;
    }  
           
}
