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


// Page d'édition d'un commentaire
    public function adminUpdateComment()
    {
        $post = $this->post->getPost($_GET['post_id']);
        $comment = $this->comment->getCommentById($_GET['id']);
        require ('views/updateCommentView.php');
    }

// Editer un commentaire
    public function updateComment($id_comment, $post_id, $author, $comment)
    {
        $updateComment = $this->comment->updateComment($id_comment, $post_id, $author, $comment);

        if($updateComment === false)
        {
            throw new Exception('Impossible de mettre à jour le commentaire' );
        }
        else
        {
            header('Location: index.php?action=post&post_id=' . $post_id);
        }
    }


// Signaler un commentaire
    public function reportingComment()
    {
        $post = $this->post->getPost($_GET['post_id']);
        $reportComment = $this->comment->reportComment($_GET['id']);


        header('Location: index.php?action=post&post_id=' . $_GET['post_id']);
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
        $reportComments = $this->comment->getReportComments();
        require ('views/reportCommentsView.php');
    }


// supprimer tous les commentaires d'un chapitre(post_id)
    public function deleteAllComment($post_id)
    {
        $deleteAllComment = $this->post->deleteAllComment($post_id);
        if($deleteAllComment === false)
        {
            throw new Exception('Impossible de supprimer le commentaire' );
        }
        else
        {
            header('Location: index.php?action=adminListComments' );
        }
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