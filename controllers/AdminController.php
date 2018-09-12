<?php

namespace Laetitia_Bernardi\projet4\Controller;

require_once ('models/PostManager.php');
require_once ('models/CommentManager.php');


use \models\PostManager;
use \models\CommentManager;


class AdministrationController
{
    private $_post;
    private $_comment;
   

    public function __construct()
    {
        $this->_post = new \Laetitia_Bernardi\projet4\Model\PostManager();
        $this->_comment = new \Laetitia_Bernardi\projet4\Model\CommentManager();
       
    }

/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////COMMENTAIRES///////////////////////////////////////////



//page d'accueil de l'administrateur
    public function administration()
    {
        $post = $this->_post->getLastPost();// affichage dernier chapitre
        $comment = $this->_comment->getLastComment();//affichage dernier commentaire
        $postsTotal = $this->_post->countPosts();//connaitre le nombre total de chapitres
        $commentsTotal = $this->_comment->countComments();//connaitre le nombre total de commentaires
        $commentsReportTotal = $this->_comment->countCommentsReport();//connaitre le nombre total de commentaires signalés
    
        require('views/adminView.php');
    }

//page pour éditer un article
    public function adminNewPost(){
       
        $commentsReportTotal = $this->_comment->countCommentsReport();//connaitre le nombre total de commentaires signalés
        $postsTotal = $this->_post->countPosts();//connaitre le nombre total de chapitres
        $commentsTotal  =$this ->_comment ->countComments();//connaitre le nombre total de commentaires
        require('views/newPostView.php');
    }
   
// Liste des commentaires (page de liste des commentaires admin)
    public function adminListComments()

    {
       
        $postsTotal = $this->_post->countPosts();//connaitre le nombre total de chapitres
        $commentsReportTotal = $this->_comment->countCommentsReport();//connaitre le nombre total de commentaires signalés
        $commentsTotal  =$this ->_comment ->countComments();//connaitre le nombre total de commentaires
        $comments = $this->_comment->getAllComments();//recupere tous les commentaires
       require('views/listCommentsView.php');
    
    }



// Approuver un commentaire en  retirerant le signalement (page du detail de chaque chapitre)
    public function approvedComment()
    {
        $post = $this->_post->getPost($_GET['post_id']);//récuperer le chapitre selectionné
        $reportComment = $this->_comment->approvedComment($_GET['id']);//approuver un commentaire en fonction de son id
        header('Location: index.php?action=adminCommentsReport');
    }


//approuver tous les commentaires signalés (page des commentaires signalés admin)

  public function approvedComments()
    {
        
        $reportComments = $this->_comment->approvedComments();
        echo "<h1 style='color:#9A97A5;text-align:center;padding:35px;'>Tous les commentaires approuvés avec succès</h1>";        
        header('Refresh: 1; url=index.php?action=adminCommentsReport#reportcom' );
        
        
    }


// Liste des commentaires signalés (page des commentaires signalés admin)
    public function adminCommentsReport()
    {

        $commentsReportTotal = $this->_comment->countCommentsReport();//connaitre le nombre total de commentaires signalés
        $postsTotal = $this->_post->countPosts();//connaitre le nombre total de chapitres
        $commentsTotal  =$this ->_comment ->countComments();//connaitre le nombre total de commentaires
        $reportComments = $this->_comment->getReportComments();//récuperer les commentaires signalés
        require ('views/reportCommentsView.php');
    }

 
 //supprime tous les commentaires(page de detail de la liste des commentaires)
    public function deleteComments()
    {
        $deleteComments = $this->_comment->deleteAllComments();
          echo "<h1 style='color:#9A97A5;text-align:center;padding:35px;'>Tous les commentaires supprimés avec succès</h1>";     
        header('Refresh: 1; url=index.php?action=adminListComments#deleteCom' );
        
   
    }



// Supprimer un commentaire dans la liste des commentaires
    public function deleteComment($id_comment)
    {
        $deleteComment = $this->_comment->deleteComment($id_comment);

        if($deleteComment === false)
        {
            throw new Exception('Impossible de supprimer le commentaire' );
        }
        else
        {
          
            header('Location:index.php?action=adminListComments#deleteCom' );
            
        }
    }

// Supprimer un commentaire dans la page article details
    public function deleteOneComment($id_comment)
    {
        $deleteComment = $this->_comment->deleteComment($id_comment);

        if($deleteComment === false)
        {
            throw new Exception('Impossible de supprimer le commentaire' );
        }
        else
        {
         
             header('Location: index.php?action=post&post_id=' . $_GET['post_id']);
            
        }
    }

//supprimer le commentaire signalé dans la page commentaire report
      public function deleteOneCommentInReport($id_comment)
    {
        $deleteComment = $this->_comment->deleteComment($id_comment);

        if($deleteComment === false)
        {
            throw new Exception('Impossible de supprimer le commentaire' );
        }
        else
        {
         
            header('Location:index.php?action=adminCommentsReport#reportcom');

            
        }
    }


//////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////CHAPITRES//////////////////////////////////////////////



// Ajouter un chapitre (page de creation d'un chapitre)
    public function postAdd($author, $title, $content)
    {
        $createPost = $this->_post->createPost($author, $title, $content);
         echo "<h1 style='color:#9A97A5;text-align:center;padding:35px;'>Chapitre ajouté avec succès</h1>";
        header('Refresh: 1; url= index.php?action=listPosts#episodes');
    }


// Page de modification d'un chapitre
    public function adminUpdatePost()
    {
        $commentsReportTotal = $this->_comment->countCommentsReport();//nombre de commentaires signalés
        $postsTotal = $this->_post->countPosts();//nombre de chapitres
        $commentsTotal  =$this ->_comment ->countComments();//nombre de commentaires
        $post = $this->_post->getPost($_GET['post_id']);//récupere un chapitre selectionné
        require ('views/updatePostView.php');
    }




// Modification d'un chapitre (page de modification d'un chapitre)
      public function updatePost($post_id, $author, $title, $content)
    {
        $updatePost = $this->_post->updatePost($post_id, $author, $title, $content);

        if ($updatePost === false) {
            throw new Exception('Impossible de mettre à jour le chapitre');
        } else {
            header('Location: index.php?action=listPosts');
        }
    }




// Supprimer un chapitre (page de la liste des chapitres admin , page du detail du chapitre )
    public function deletePost($post_id)
    {
        $deletePost = $this->_post->deletePost($post_id);//supprimé un chapitre selectionné
        $deleteComments = $this->_comment->deleteAllComments($post_id);//supprimé tous les chapitres 

        if ($deletePost === false) {
            throw new Exception('Impossible de supprimer le chapitre');
        } elseif ($deleteComments === false) {
            throw new Exception('Impossible de supprimer les commentaire du chapitre');
        } else {
            header('Location:index.php?action=listPosts');
        
        }
    }
}