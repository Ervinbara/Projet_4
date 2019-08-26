<?php
class AdminManager
{
        public function deletePost($id_post){
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM post WHERE id = ?');
        $req->execute(array($id_post));

        return $req;
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