<?php

namespace Laetitia_Bernardi\projet4\Model;

require_once('models/Manager.php');

use \DateTime;
use \PDO;


class UserManager extends Manager
{
    private $id, $pseudo, $pass;


    public function __construct()
    {

    }

    public function getId()
    {
        return $this->id;
    }



    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * @return string           $_pass
     */
    public function getPass()
    {
        return $this->pass;
    }


    public function setId($id)
    {
        $id = (int) $id;
        if($id> 0){
            $this->id = $id;
        }

    }

  
    public function setPseudo($pseudo)
    {
        if(is_string($pseudo)) {
            $this->pseudo = $pseudo;
        }
    }


    public function setPass($pass)
    {
        if(is_string($pass)) {
            $this->pass = $pass;
        }
    }



    public function getUser($pseudo)
    {
        $this->setPseudo($pseudo);

        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM users WHERE pseudo = ? , pass= ?');
        $req->execute($this->getPseudo());
        $user = $req->fetch();

        return $user;
    }
    

    
}