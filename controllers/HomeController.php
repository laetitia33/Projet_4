<?php

namespace Laetitia_Bernardi\projet4\Controller;

require_once ('models/PostManager.php');
require_once ('models/CommentManager.php');
require_once ('models/ContactManager.php');

use \models\ContactManager;
use \models\PostManager;
use \models\CommentManager;

class HomeController
{
    private $_posts;
    private $_comment;

    public function __construct()
    {
        $this->_posts = new \Laetitia_Bernardi\projet4\Model\PostManager();
        $this->_comment = new \Laetitia_Bernardi\projet4\Model\CommentManager();

    }

    // Home
    public function home()
    {
        $posts = $this->_posts->getPosts();
        $comment = $this->_comment->getLastComment();

        require ('views/articleList.php');
    }

//Prepare la fonction pour envoyer un mail de contact.

   public function prepareEmail(){
        if(isset($_POST) && !empty($_SESSION['name']) && !empty($_SESSION['email']) && !empty($_SESSION['objet'])&& !empty($_SESSION['mail'])){
            $this->sendEmail();
            header('Location: index.php');
        }
    
    }

}