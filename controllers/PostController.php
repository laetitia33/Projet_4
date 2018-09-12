<?php
namespace Laetitia_Bernardi\projet4\Controller;
require_once ('models/PostManager.php');
require_once ('models/CommentManager.php');

use \models\PostManager;
use \models\CommentManager;

class PostController 
{
    private $_post;
    private $_comment;    
    private $_posts;

    public function __construct()
    {
        $this->_post = new \Laetitia_Bernardi\projet4\Model\PostManager();
        $this->_posts = new \Laetitia_Bernardi\projet4\Model\PostManager();
        $this->_comment = new \Laetitia_Bernardi\projet4\Model\CommentManager();
    }
// Page Afficher un chapitre + ses commentaires
    public function post($post_id,$commentReport)
    {   
     
        $commentsTotal=  $this->_comment->countComments(); //connaitre le nombre total de com 
        $commentReport=$commentReport;//affichage message confirmation signalé
        $commentsReportTotal = $this->_comment->countCommentsReport();//connaitre nombre total de coms signalés
        $post = $this->_post->getPost($post_id);// recuperer le chapitre selectionné
        $comments = $this->_comment->getComments($post_id);//tous les commentaires du chapitre selectionné  
     
        require('views/articleDetail.php');
    }


// Liste des chapitres( page d'accueil)
    public function listPosts()
    {
      
        $posts = $this->_posts->getAllPosts();//recupère tous les chapitres
        $postsTotal = $this->_posts->countPosts();  //connaitre le nombre de total chapitre    
        $commentsTotal  =$this ->_comment ->countComments();//connaitre le nombre de com 
        $commentsReportTotal = $this->_comment->countCommentsReport();//connaitre nombre total de coms signalés
        require('views/articleList.php');
     
    }



}
