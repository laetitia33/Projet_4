<?php

namespace Laetitia_Bernardi\projet4\Controller;

require_once ('models/PostManager.php');
require_once ('models/CommentManager.php');

class CommentController
{
    private $_comment;
    private $_post;

    public function __construct()
    {
        $this->_comment = new \Laetitia_Bernardi\projet4\Model\CommentManager();
        $this->_post = new \Laetitia_Bernardi\projet4\Model\PostManager();
    }

// Liste des commentaires
    public function adminListComments()
    {
        $comments = $this->_comment->getAllComments();
        require ('views/ListCommentsView.php');
    }


  

// Ajouter un commentaire
    public function addComment($post_id, $author, $comment)
    {
        $postComment = $this->_comment->createComment($post_id, $author, $comment);
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
        $post = $this->_post->getPost($_GET['post_id']);
        $comment = $this->_comment->getCommentById($_GET['id']);
        require ('views/updateCommentView.php');
    }

// Editer un commentaire
    public function updateComment($id_comment, $post_id, $author, $comment)
    {
        $updateComment = $this->_comment->updateComment($id_comment, $post_id, $author, $comment);

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
        $post = $this->_post->getPost($_GET['post_id']);
        $reportComment = $this->_comment->reportComment($_GET['id']);


        header('Location: index.php?action=post&post_id=' . $_GET['post_id']);
    }


// Approuver un commentaire (retirer le signalement)
    public function approvedComment()
    {
        $post = $this->_post->getPost($_GET['post_id']);
        $reportComment = $this->_comment->approvedComment($_GET['id']);
 
        header('Location: index.php?action=adminCommentsReport');
    }

// Liste des commentaires signalés
    public function adminCommentsReport()
    {
        $reportComments = $this->_comment->getReportComments();
        require ('views/reportCommentsView.php');
    }

// Supprimer un commentaire
    public function deleteComment($id_comment)
    {
        $deleteComment = $this->_comment->deleteComment($id_comment);

        if($deleteComment === false)
        {
            throw new Exception('Impossible de supprimer le commentaire' );
        }
        else
        {
            header('Location: index.php?action=administration' );
        }
    }
}