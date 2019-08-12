<?php
class CommentManager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author,post_id, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    public function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));
        return $affectedLines;
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


    private function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
        return $db;
    }
}