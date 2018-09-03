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



// Ajouter un commentaire(page du detail de chaque chapitre)
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



// Signaler un commentaire(page du detail de chaque chapitre)
    public function reportingComment()

    {	
        $post = $this->post->getPost($_GET['post_id']);
        $reportComment = $this->comment->reportComment($_GET['id']);
        header('Location: index.php?action=post&post_id=' . $_GET['post_id'] ."&commentReport");
    
    }

// Supprimer un commentaire (page de detail de la liste des commentaires)
    public function deleteOneComment($id_comment)
    {
        $deleteOneComment = $this->comment->deleteComment($id_comment);

        if($deleteOneComment === false)
        {
            throw new Exception('Impossible de supprimer le commentaire' );
        }
        else
        {
            header('Location: index.php?action=adminListComments' );
        }
    }






}