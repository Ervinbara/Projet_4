<?php
class UserManager extends PostManager
{
    public function login($username){
         $db = $this->dbConnect();
            $req = $db->prepare('SELECT id, password FROM users WHERE username = :username');
            $req->execute(array(
            'username' => $username));
            $resultat = $req->fetch();
            
            return $resultat;
    }
    
    public function account($username,$password){
        $db = $this->dbConnect();
        $ins = $db->prepare('INSERT INTO users(username, password) VALUES(?,?)');
        $req = $ins->execute(array($username, $password)); 
        return $req;    
    }
    
    
    public function username_exist($username){
        $db = $this->dbConnect();
        $req = $db->prepare("SELECT COUNT(*) FROM users WHERE username = ?");
        $req->execute(array($username));
        $user_exist = $req->fetchColumn();
        return $user_exist;
        
        
    }
    

}