<?php


namespace Laetitia_Bernardi\projet4\Controller;

require_once ('models/PostManager.php');
require_once ('models/CommentManager.php');


use \models\PostManager;
use \models\CommentManager;


class AdministrationController
{
    private $post;
    private $comment;
   

    public function __construct()
    {
        $this->post = new \Laetitia_Bernardi\projet4\Model\PostManager();
        $this->comment = new \Laetitia_Bernardi\projet4\Model\CommentManager();
       
    }

    public function administration()
    {
        $post = $this->post->getLastPost();
        $comment = $this->comment->getLastComment();
        $postsTotal = $this->post->countPosts();
        $commentsTotal = $this->comment->countComments();
        $commentsReportTotal = $this->comment->countCommentsReport();
    
        require('views/adminView.php');
    }

    public function adminNewPost(){
       
        $commentsReportTotal = $this->comment->countCommentsReport();
        $postsTotal = $this->post->countPosts();
        $commentsTotal  =$this ->comment ->countComments();
        require('views/newPostView.php');
    }
   
}