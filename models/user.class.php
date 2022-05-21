<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Class de gestion d'un article
 *
 * @author 
 */
class user {
    
    /*Compl�ter ici la liste des propri�t�s de l'objet*/ 
    public $userId;
    public $pseudo;
    public $password;
    public $hashPass;
    




public function setUserFromPost(){
      /*
     * Ecrire ici le code de r�cup�ration des infos du formulaire
     * R�cup�rer les valeurs du formulaire
     * Affecter les valeurs � chaque propri�t�
     */
    
  /*premiere etape les données*/
    
    $this->pseudo = $_POST['pseudo'];
    $this->password = $_POST['passe'];
    
     //encryptage du mot de passe
    $this->hashPass = password_hash($this->password, PASSWORD_DEFAULT);
    $this->testUserConnexion();
    

}


public function setUserFromDb($userId){
    /*
     * Ecrire ici le code de r�cup�ration des infos depuis la base de donn�es
     * R�cup�rer les valeurs issues de la base de donn�es
     * Affecter les valeurs � chaque propri�t�
     */
    
     global $Db;

     $sql = "SELECT * FROM membres WHERE idMembres = $userId";
    echo $sql;
    $resulSet = $Db->query($sql);
    $user = $resulSet->fetch(PDO::FETCH_OBJ);
    var_dump($user);
    
    $this->userId = $user->idMembres;
    $this->pseudo = $user->pseudo;
    $this->password = $user->pass;
    $this->hashPass = $user->pass;
    
    
    
}


public function addUserToDb(){
   
    /*
     * Ecrire le code qui va enregistrer les valeurs des propri�t�s dans la base de donn�es
     * Cr�er une requete SQL et l'executer dans cette methode
     * Attention ! Il faut r�cup�rer dans cette m�thode la connexion � la base de donn�es.
     * Voir dans le cours pour savoir comment faire.
     */
    
     global $Db;


    $sql = "INSERT INTO membres (pseudo, passe) VALUES ('$this->pseudo', '$this->hashPass')";
    echo $sql;
    $result = $Db->query($sql);
    return($result);
    
}


public function getAllUserDb(){
    
    /*
     * Ecrire le code qui va r�cup�rer tous les article de la base de donn�es
     * Cr�er une requete SQL et l'executer dans cette methode
     * Attention ! Il faut r�cup�rer dans cette m�thode la connexion � la base de donn�es.
     * Voir dans le cours pour savoir comment faire.
     */
    
    global $Db;

    $sql = 'SELECT * FROM membres';
    $resultSet = $Db->query($sql);
    $mesUtilisateurs = $resultSet->fetchAll(PDO::FETCH_CLASS);
    return ($mesUtilisateurs);
    
}

      
public function testUserConnexion(){
    /*
     *  
     * 
     * Ecrire le code qui va tester si la base de données à un enregistrement qui correspond à l'email
     * 
     */
    
    global $Db;
    
        $sql = "SELECT * FROM membres WHERE pseudo = '$this->pseudo'";
        //echo $sql;
        $resultSet = $Db->query($sql);
        $count = $resultSet->rowCount();
        $user = $resultSet->fetch(PDO::FETCH_OBJ);
        
        
        //echo $count;
         if($count ==1){
             $resultPass = $this->testPassword($user);
             if($resultPass == true){
                 return true;
             }
             else{
                 return false;
             }
         }
        else{
            return false;
        }
    
}

public static function lastActionUser() {
    
    global $Db;

    $idMembre = $_SESSION['id'];
    $sql = "UPDATE membres SET lastAction = NOW()
            WHERE idMembres = $idMembre";
    //echo $sql;
    $result = $Db->query($sql);
    
}

public static function getUserConnect(){
    
    global $Db;
    
    $sql = "SELECT * FROM membres WHERE lastAction >= NOW() - INTERVAL 1 MINUTE";
   
    $resultSet = $Db->query($sql);
    $membreConnect = $resultSet->fetchAll(PDO::FETCH_CLASS);
   
    return $membreConnect;
    
}
public static function closeSession(){
    
    $_SESSION = array();

    // Destruction de la session
    session_destroy();

    // Destruction du tableau de session
    unset($_SESSION);
    var_dump($_SESSION);
    
}




/* 
 * Ecrire ici vos fonction priv�es qui vont compl�ter vos fonctions publiques
 */
    

  private function sessionActivation($user){
    /*
     *  
     * 
     * Ecrire le code qui va activer la session
     * 
     */
    
    $_SESSION['pseudo'] = $user->pseudo;
    $_SESSION['id'] = $user->idMembres;
    
}


private function testPassword($user){
    /*
     *  
     * 
     * Ecrire le code qui va tester le mot de passe saisi dans le formulaire de connexion
     * 
     */
    //echo $this->password;
    //echo $user->passe;
    if (password_verify($this->password, $user->passe))
    {
        
        $this->sessionActivation($user);
        return true;
    }
    else {
        echo 'erreur';
        return false;
    }
}


}
