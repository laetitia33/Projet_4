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

    public function __construct()
    {
        $this->_post = new \Laetitia_Bernardi\projet4\Model\PostManager();
        $this->_comment = new \Laetitia_Bernardi\projet4\Model\CommentManager();
    }

// Afficher un chapitre + ses commentaires
    public function post($post_id)
    {
        $post = $this->_post->getPost($post_id);
        $comments = $this->_comment->getComments($post_id);
        require('views/articleDetail.php');
    }

// Liste des chapitres
    public function listPosts()
    {
        $posts = $this->_post->getPosts();
        require('views/articleList.php');
      
    }


// Ajouter un chapitre
    public function createPost($author, $title, $content)
    {
        $createPost = $this->_post->createPost($author, $title, $content);
        header('Location: index.php?action=articleList');
    }

// Page d'édition d'un chapitre
    public function adminUpdatePost()
    {
        $post = $this->_post->getPost($_GET['post_id']);
        require ('views/updatePostView.php');
    }

// Editer un chapitre
    public function updatePost($post_id, $author, $title, $content)
    {
        $updatePost = $this->_post->updatepost($post_id, $author, $title, $content);

        if ($updatepost === false) {
            throw new Exception('Impossible de mettre à jour le chapitre');
        } else {
            header('Location: index.php?action=articleList');
        }
    }

// Supprimer un chapitre
    public function deletePost($post_id)
    {
        $deletePost = $this->_post->deletePost($post_id);
        $deleteComments = $this->_comment->deleteAllComments($post_id);

        if ($deleteChapter === false) {
            throw new Exception('Impossible de supprimer le chapitre');
        } elseif ($deleteComments === false) {
            throw new Exception('Impossible de supprimer les commentaire du chapitre');
        } else {
            header('Location:index.php?action=articleList');
        }
    }
}

