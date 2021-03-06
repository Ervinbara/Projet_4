<?php
class AdminManager extends PostManager
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
        return $req;
    }
    
        public function add($title,$content)
    {
        $db = $this->dbConnect();
        $ins = $db->prepare('INSERT INTO post (title, content, creation_date) VALUES (?, ?, NOW())');
        $ins->execute(array($title, $content));
        return $ins;
        
    }
    
        //Fonction liée aux signalement//
    
    //Supp les coms signaler//
    
    public function delete_comment($supprime)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM comments WHERE id = ?');
        $req->execute(array($supprime));

        return $req;
    }
    
    
    //Afficher coms signaler
    public function get_comment_report()
    {
         $db = $this->dbConnect();
         $req = $db->prepare('SELECT author,id,comment,DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin\') AS comment_date_fr FROM comments WHERE signaler = 1');
         $req->execute();
         return $req;
    }

           
}