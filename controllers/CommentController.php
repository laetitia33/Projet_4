<?php

namespace Laetitia_Bernardi\projet4\Controller;

require_once ('models/PostManager.php');
require_once ('models/CommentManager.php');

class CommentController
{
    private $comment;
    private $post;

    public function __construct()
    {
        $this->comment = new \Laetitia_Bernardi\projet4\Model\CommentManager();
        $this->post = new \Laetitia_Bernardi\projet4\Model\PostManager();
    }

// Liste des commentaires
    public function adminListComments()
    {
        $postsTotal = $this->post->countPosts();
        $commentsReportTotal = $this->comment->countCommentsReport();
        $commentsTotal  =$this ->comment ->countComments();
        $comments = $this->comment->getAllComments();
        require ('views/ListCommentsView.php');
    }

// Ajouter un commentaire
    public function addComment($post_id, $author, $comment)
    {
        $postComment = $this->comment->createComment($post_id, $author, $comment);
        if($postComment === false)
        {
            throw new Exception('Impossible d\'ajouter le commentaire');
        }
        else{
            header('Location: index.php?action=post&post_id=' . $post_id);
        }
    }


// Signaler un commentaire
    public function reportingComment()

    {	
        $post = $this->post->getPost($_GET['post_id']);
        $reportComment = $this->comment->reportComment($_GET['id']);
      
        header('Location: index.php?action=post&post_id=' . $_GET['post_id'] ."&commentReport=true");
    
    }


// Approuver un commentaire (retirer le signalement)
    public function approvedComment()
    {
        $post = $this->post->getPost($_GET['post_id']);
        $reportComment = $this->comment->approvedComment($_GET['id']);
 
        header('Location: index.php?action=adminCommentsReport');
    }

// Liste des commentaires signalés
    public function adminCommentsReport()
    {
    	$commentsReportTotal = $this->comment->countCommentsReport();
        $postsTotal = $this->post->countPosts();
        $commentsTotal  =$this ->comment ->countComments();
        $reportComments = $this->comment->getReportComments();
        require ('views/reportCommentsView.php');
    }

 

// Supprimer un commentaire
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
}