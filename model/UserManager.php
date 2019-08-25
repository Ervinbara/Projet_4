<?php
class UserManager
{
    public function login($username,$password){
         $db = $this->dbConnect();
         $req = $db->prepare('SELECT * FROM users WHERE username = :username  AND password = :password');
         
            $req->execute([
         
               'username' => $username,
               'password' => $password,
         
               ]);
            
            return $req;
    }
    
    public function account($username,$password){
        $db = $this->dbConnect();
        
        $req = $db->prepare('INSERT INTO users(username, password) VALUES(:username, :password');
        $req->execute([
        'username' => $username,
        'password' => $password,
        ]);
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