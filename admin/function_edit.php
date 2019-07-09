<?php

function getchap($db, $nb=null, $id=null){
    if($nb AND !$id){
        $req = $db->query('SELECT * FROM post LIMIT'.$nb);
        $chap = $req->fetchAll();
    }
    elseif($id){
        $req = $db->query('SELECT * FROM post WHERE id='.$id);
        $chap = $req->fetchObject();
    }
    else{
        $req = $db->query('SELECT * FROM post');
        $chap = $req->fetchAll();
    }
    return $chap;
    
}