<?php

namespace Laetitia_Bernardi\projet4\Controller;

require_once ('models/PostManager.php');
require_once ('models/CommentManager.php');


use \models\PostManager;
use \models\CommentManager;

class PostController

{
    private $post;
    private $comment;

    public function __construct()
    {
        $this->post = new \Laetitia_Bernardi\projet4\Model\PostManager();
        $this->comment = new \Laetitia_Bernardi\projet4\Model\CommentManager();
    }





// Page Afficher un chapitre + ses commentaires
    public function post($post_id,$commentReport)
    {
     
        
        $commentsTotal=  $this->comment->countComments();
        $commentReport=$commentReport;
        $commentsReportTotal = $this->comment->countCommentsReport();
        $post = $this->post->getPost($post_id);
        $comments = $this->comment->getComments($post_id);
        require('views/articleDetail.php');
    }

// Liste des chapitres(2eme partie de la page d'accueil)
    public function listPosts()
    {
        $posts = $this->post->getPosts();
        $postsTotal = $this->post->countPosts();     
        $commentsTotal  =$this ->comment ->countComments();
        $commentsReportTotal = $this->comment->countCommentsReport();
        require('views/articleList.php');

    }



}

