<?php


namespace Laetitia_Bernardi\projet4\Controller;

require_once ('models/PostManager.php');
require_once ('models/CommentManager.php');


use \models\PostManager;
use \models\CommentManager;


class AdministrationController
{
    private $_post;
    private $_comment;
 

    public function __construct()
    {
        $this->_post = new \Laetitia_Bernardi\projet4\Model\PostManager();
        $this->_comment = new \Laetitia_Bernardi\projet4\Model\CommentManager();
      
    }

    public function administration()
    {
        $post = $this->_post->getLastPost();
        $comment = $this->_comment->getLastComment();
        $postsTotal = $this->_post->countPosts();
        $commentsTotal = $this->_comment->countComments();
        $commentsReportTotal = $this->_comment->countCommentsReport();
    
        require('views/adminView.php');
    }


       // Page nouveau chapitre
    public function adminNewPost()
    {
        require ('views/newPostView.php');

    }
}