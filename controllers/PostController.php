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
    private $posts;


    public function __construct()
    {
        $this->post = new \Laetitia_Bernardi\projet4\Model\PostManager();
        $this->posts = new \Laetitia_Bernardi\projet4\Model\PostManager();
        $this->comment = new \Laetitia_Bernardi\projet4\Model\CommentManager();
    }


// Page Afficher un chapitre + ses commentaires
    public function post($post_id,$commentReport)
    {     

        $commentsTotal=  $this->comment->countComments(); //connaitre le nombre total de com 
        $commentReport=$commentReport;//affichage message confirmation signalé
        $commentsReportTotal = $this->comment->countCommentsReport();//connaitre nombre total de coms signalés
        $post = $this->post->getPost($post_id);// recuperer le chapitre selectionné
        $comments = $this->comment->getComments($post_id);//tous les commentaires du chapitre selectionné
        require('views/articleDetail.php');
    }



// Liste des chapitres( page d'accueil)
    public function listPosts()

    {
     
        $posts = $this->posts->getAllPosts();//recupère tous les chapitres
        $sixpost = $this->posts->getPosts();// affichage des 6 chapitres/pages avec le nombre de com sur chacun
        $postsTotal = $this->posts->countPosts();  //connaitre le nombre de total chapitre    
        $commentsTotal  =$this ->comment ->countComments();//connaitre le nombre de com 
        $commentsReportTotal = $this->comment->countCommentsReport();//connaitre nombre total de coms signalés
        require('views/articleList.php');
     

    }


}

