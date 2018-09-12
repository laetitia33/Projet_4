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

// Ajouter un commentaire(page du detail de chaque chapitre)
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
// Signaler un commentaire(page du detail de chaque chapitre)
    public function reportingComment()
    {   
       
        $post = $this->_post->getPost($_GET['post_id']);//recupere un chapitre selectionné
        $reportComment = $this->_comment->reportComment($_GET['id']);//signale un commentaire grace à son id
        header('Location: index.php?action=post&post_id=' . $_GET['post_id'] ."&commentReport");
        
        
     
    }
}