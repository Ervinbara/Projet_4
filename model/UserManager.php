<?php
class UserManager
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