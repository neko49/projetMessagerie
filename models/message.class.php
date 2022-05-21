<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Class de gestion des messages
 *
 * @author 
 */
class message {
    
    /*Compl�ter ici la liste des propri�t�s de l'objet*/ 
    public $idMembres;
    public $messages;
    public $date;
    




public function setMessageFromPost(){
  
        $this->messages = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_FULL_SPECIAL_CHARS,FILTER_SANITIZE_MAGIC_QUOTES);
        $this->idMembres = $_SESSION['id'];
        $this->date = date('Y-m-d h:i:s');
        var_dump($this);
       
 
}


public function addMessageToDb(){
    global $Db;


    $sql = "INSERT INTO messages (idMembres, messages, date) VALUES ('$this->idMembres', '$this->messages', '$this->date')";
    //echo $sql;
    $result = $Db->query($sql);
    //return($result);
}


public function getAllMessagesDb(){
    
    global $Db;

    $sql = 'SELECT messages.*, membres.pseudo FROM messages inner join membres on messages.idMembres=membres.idMembres ORDER BY idMessage';
    $resultSet = $Db->query($sql);
    $rows = $resultSet->fetchAll(PDO::FETCH_CLASS);
    return ($rows);
 
}
}
