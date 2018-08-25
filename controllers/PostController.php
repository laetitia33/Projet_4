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

// Afficher un chapitre + ses commentaires
    public function post($post_id)
    {
        $post = $this->post->getPost($post_id);
        $comments = $this->comment->getComments($post_id);
        require('views/articleDetail.php');
    }

// Liste des chapitres
    public function listPosts()
    {
        $posts = $this->post->getPosts();
        $postsTotal = $this->post->countPosts();

        require('views/articleList.php');

    }


// Ajouter un chapitre
    public function postAdd($author, $title, $content)
    {
        $createPost = $this->post->createPost($author, $title, $content);
        header('Location: index.php?action=listPosts');
    }

// Page d'édition d'un chapitre
    public function adminUpdatePost()
    {
        $post = $this->post->getPost($_GET['post_id']);
        require ('views/updatePostView.php');
    }

// Editer un chapitre
    public function updatePost($post_id, $author, $title, $content)
    {
        $updatePost = $this->post->updatePost($post_id, $author, $title, $content);

        if ($updatePost === false) {

            throw new Exception('Impossible de mettre à jour le chapitre');

        } else {
            header('Location: index.php?action=listPosts');
        }
    }
// Supprimer un chapitre
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

