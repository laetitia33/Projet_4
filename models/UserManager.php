<?php

namespace Laetitia_Bernardi\projet4\Model;

require_once('models/Manager.php');

use \DateTime;
use \PDO;


class UserManager extends Manager
{
    private $_id,$_id_group, $_pseudo, $_pass;


    public function __construct()
    {

    }

    public function getId()
    {
        return $this->_id;
    }



    public function getPseudo()
    {
        return $this->_pseudo;
    }

  
    public function getPass()
    {
        return $this->_pass;
    }


    public function setId($id)
    {
        $id = (int) $id;
        if($id> 0){
            $this->_id = $id;
        }

    }

  
    public function setPseudo($pseudo)
    {
        if(is_string($pseudo)) {
            $this->_pseudo = $pseudo;
        }
    }


    public function setPass($pass)
    {
        if(is_string($pass)) {
            $this->_pass = $pass;
        }
    }

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//fin des getters et setters
     

//recuperation des données de l'utilisateur
   public function getUser($pseudo,$pass)
    {
     
   
        $db = $this->dbConnect();
        $req = $db->prepare("SELECT * FROM users WHERE pseudo= ? AND pass= PASSWORD(?)");
        $req->execute(array($pseudo, $pass));
         $user = $req->fetch(); 
       
    
        return $user;
        
    }
}