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
    private $posts;
    private $comment;

       
    public function __construct()
    {
        $this->posts = new \Laetitia_Bernardi\projet4\Model\PostManager();
        $this->comment = new \Laetitia_Bernardi\projet4\Model\CommentManager();

    }

    // page de la liste des chapitre avec les fonctions
    public function home()

    {
     
     
        $posts = $this->posts->getPosts();
        $comment = $this->comment->getLastComment();
        $postsTotal = $this->posts->countPosts();
        require ('views/articleList.php');
    }



}