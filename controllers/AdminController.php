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

/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////COMMENTAIRES///////////////////////////////////////////



//page d'accueil de l'administrateur
    public function administration()
    {
        $post = $this->post->getLastPost();
        $comment = $this->comment->getLastComment();
        $postsTotal = $this->post->countPosts();
        $commentsTotal = $this->comment->countComments();
        $commentsReportTotal = $this->comment->countCommentsReport();
    
        require('views/adminView.php');
    }

//page pour éditer un article
    public function adminNewPost(){
       
        $commentsReportTotal = $this->comment->countCommentsReport();
        $postsTotal = $this->post->countPosts();
        $commentsTotal  =$this ->comment ->countComments();
        require('views/newPostView.php');
    }
   
// Liste des commentaires (page de liste des commentaires admin)
    public function adminListComments()

    {
        
        $postsTotal = $this->post->countPosts();//compte tous les chapitres
        $commentsReportTotal = $this->comment->countCommentsReport();//compte tous les commentaires signales
        $commentsTotal  =$this ->comment ->countComments();//compte tous les commentaires
        $comments = $this->comment->getAllComments();//recupere tous les commentaires
        require ('views/ListCommentsView.php');
    }



// Approuver un commentaire en  retirerant le signalement (page du detail de chaque chapitre)
    public function approvedComment()
    {
        $post = $this->post->getPost($_GET['post_id']);
        $reportComment = $this->comment->approvedComment($_GET['id']);
 
        header('Location: index.php?action=adminCommentsReport');
    }


//approuver tous les commentaires signalés (page des commentaires signalés admin)

  public function approvedComments()
    {
        
        $reportComments = $this->comment->approvedComments();
 
        header('Location: index.php?action=adminCommentsReport');
    }


// Liste des commentaires signalés (page des commentaires signalés admin)
    public function adminCommentsReport()
    {
        $commentsReportTotal = $this->comment->countCommentsReport();
        $postsTotal = $this->post->countPosts();
        $commentsTotal  =$this ->comment ->countComments();
        $reportComments = $this->comment->getReportComments();
        require ('views/reportCommentsView.php');
    }

 
 //supprime tous les commentaires(page de detail de la liste des commentaires)
    public function deleteComments()
    {
        $deleteComments = $this->comment->deleteAllComments();
        if($deleteComments === false)
       {

            throw new Exception('Impossible de supprimer les commentaires' );
        }
        else{
            header('Location: index.php?action=adminListComments' );
        }
   
    }

    // Supprimer un commentaire (page de detail de la liste des commentaires)
    public function deleteComment($id_comment)
    {
        $deleteComment = $this->comment->deleteComment($id_comment);

        if($deleteComment === false)
        {
            throw new Exception('Impossible de supprimer le commentaire' );
        }
        else
        {
            header('Location: index.php?action=adminListComments' );
        }
    }



//////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////CHAPITRES//////////////////////////////////////////////



// Ajouter un chapitre (page de creation d'un chapitre)
    public function postAdd($author, $title, $content)
    {
        $createPost = $this->post->createPost($author, $title, $content);
        header('Location: index.php?action=listPosts');
    }


// Page de modification d'un chapitre
    public function adminUpdatePost()
    {
        $commentsReportTotal = $this->comment->countCommentsReport();
        $postsTotal = $this->post->countPosts();
        $commentsTotal  =$this ->comment ->countComments();
        $post = $this->post->getPost($_GET['post_id']);
        require ('views/updatePostView.php');
    }




// Modification d'un chapitre (page de modification d'un chapitre)
      public function updatePost($post_id, $author, $title, $content)
    {
        $updatePost = $this->post->updatePost($post_id, $author, $title, $content);

        if ($updatePost === false) {
            throw new Exception('Impossible de mettre à jour le chapitre');
        } else {
            header('Location: index.php?action=listPosts');
        }
    }




// Supprimer un chapitre (page de la liste des chapitres admin , page du detail du chapitre )
    public function deletePost($post_id)
    {
        $deletePost = $this->post->deletePost($post_id);
        $deleteComments = $this->comment->deleteAllComments($post_id);

        if ($deletePost === false) {
            throw new Exception('Impossible de supprimer le chapitre');
        } elseif ($deleteComments === false) {
            throw new Exception('Impossible de supprimer les commentaire du chapitre');
        } else {
            header('Location:index.php?action=listPosts');
        
        }
    }
}