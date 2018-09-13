<?php
namespace Laetitia_Bernardi\projet4\Controller;

require_once('models/UserManager.php');

use\models\UserManager;
use \Exception;
class UserController
{
    private $_user;
    public function __construct()
    {
        $this->_user = new \Laetitia_Bernardi\projet4\Model\UserManager();
    }
//page formulaire
 public function login()
    {
        require('views/loginView.php');
    }

// Connexion
    public function logUser($pseudo,$pass)
    {
        $user = $this->_user->getUser($pseudo,$pass);
        
        if(!$user )
        {
            throw new Exception('Utilisateur ou mot de passe incorrect');
        }
      
        else
        {
            session_start();
            $_SESSION['id'] = $user['id'];
            $_SESSION['pseudo'] = $user['pseudo'];
            $_SESSION['pass'] = $user['pass'];
            $id = $user['id'];
            $pseudo = $user['pseudo'];
            $pass_hash = $user['pass'];
            setcookie('id', $id, time() + 3600, null, null, false, true);
            setcookie('pseudo', $pseudo, time() + 3600, null, null, false, true);
            setcookie('pass', $pass_hash, time() + 3600, null, null, false, true);
            header('Location: index.php?action=administration');
        }
  
    }
    
// Deconnexion
    public function logoutUser()
    {
        session_start();
        $_SESSION = array();
        session_destroy();
        setcookie('id', '');
        setcookie('pseudo', '');
        setcookie('pass', '');
    
        header('Location: index.php');
    }
}