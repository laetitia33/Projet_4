<?php

namespace Laetitia_Bernardi\projet4\Model;

require_once('models/Manager.php');

use \DateTime;
use \PDO;


class UserManager extends Manager
{
    private $_id_user, $_pseudo, $_pass;


    public function __construct()
    {

    }

    public function getIdUser()
    {
        return $this->_id_user;
    }



    public function getPseudo()
    {
        return $this->_pseudo;
    }

    /**
     * @return string           $_pass
     */
    public function getPass()
    {
        return $this->_pass;
    }


    public function setIdUser($id_user)
    {
        $id_user = (int) $id_user;
        if($id_user > 0){
            $this->_id_user = $id_user;
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



    public function getUser($pseudo)
    {
        $this->setPseudo($pseudo);

        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM users WHERE pseudo = ?');
        $req->execute($this->getPseudo());
        $user = $req->fetch();

        return $user;
    }
    

    
}