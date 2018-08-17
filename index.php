<?php session_start() ?>

<?php

require('controllers/PostController.php');
require('controllers/CommentController.php');
require('controllers/AdminController.php');
require('controllers/HomeController.php');
require('controllers/ViewController.php');
require('controllers/UserController.php');
use \controllers\UserController;
use \controllers\PostController;
use \controllers\CommentController;
use \controllers\AdminController;
use \controllers\HomeController;
use \controllers\ViewController;


try{
    if(isset($_SESSION['id']))
    {
        if (isset($_GET['action']) && !empty($_GET['action']))
        {
            // ADMIN - administration
            if ($_GET['action'] == 'administration')
            {
                $administrationCtrl = new \Laetitia_Bernardi\projet4\Controller\AdministrationController();
                $administrationCtrl->administration();

            }
            // ADMIN - Liste des commentaires
            elseif ($_GET['action'] == 'adminListComments')
            {
                $commentCtrl = new \Laetitia_Bernardi\projet4\Controller\CommentController();
                $commentCtrl->adminListComments();
            }
            // ADMIN - Liste des commentaires signalés
            elseif ($_GET['action'] == 'adminCommentsReport')
            {
                $commentCtrl = new \Laetitia_Bernardi\projet4\Controller\CommentController();
                $commentCtrl->adminCommentsReport();
            }
            // ADMIN - Creation d'un chapitre
            elseif ($_GET['action'] == 'createPost')
            {
                if ($_POST['author'] != NULL && $_POST['title'] != NULL && $_POST['content'] != NULL)
                {
                    $postCtrl = new \Laetitia_Bernardi\projet4\Controller\PostController();
                    $postCtrl->createPost($_POST['author'], $_POST['title'], $_POST['content']);
                }
                else
                {
                    throw new Exception('Tous les champs ne sont pas remplis..');
                }
            }
            // ADMIN - page de MAJ d'un chapitre
            elseif ($_GET['action'] == 'adminUpdateChapter')
            {
                $postCtrl = new \Laetitia_Bernardi\projet4\Controller\PostController();
                $postCtrl->adminUpdatePost();
            }
            // ADMIN - Mise à jour d'un chapitre
            elseif ($_GET['action'] == 'updatePost')
            {
                if (isset($_GET['post_id']) && $_GET['post_id'] > 0)
                {
                    if ($_POST['author'] != NULL && $_POST['title'] != NULL && $_POST['content'] != NULL)
                    {
                        $postCtrl = new \Laetitia_Bernardi\projet4\Controller\PostController();
                        $postCtrl->updatePost($_GET['post_id'], $_POST['author'], $_POST['title'], $_POST['content']);
                    }
                    else
                    {
                        throw new Exception('Tous les champs ne sont pas remplis..');
                    }
                }
                else
                {
                    throw new Exception('Aucun identifiant de chapitre envoyé !');
                }
            }
            // ADMIN - suppression d'un chapitre
            elseif ($_GET['action'] == 'deletePost')
            {
                if (isset($_GET['post_id']) && $_GET['post_id'] > 0)
                {
                    $postCtrl = new \Laetitia_Bernardi\projet4\Controller\PostController();
                    $postCtrl->deletePost($_GET['post_id']);
                }
                else
                {
                    throw new Exception('Aucun identifiant de chapitre envoyé !');
                }
            }
            // ADMIN - page de MAJ des commentaires
            elseif ($_GET['action'] == 'adminUpdateComment')
            {
                $commentCtrl = new \Laetitia_Bernardi\projet4\Controller\CommentController();
                $commentCtrl->adminUpdateComment();
            }
            // ADMIN - Mise à jour d'un commentaire
            elseif ($_GET['action'] == 'updateComment')
            {
                if (isset($_GET['post_id']) && $_GET['post_id'] > 0)
                {
                    if (isset($_GET['id']) && $_GET['id'] > 0)
                    {
                        if ($_POST['author'] != NULL && $_POST['comment'] != NULL)
                        {
                            $commentCtrl = new \Laetitia_Bernardi\projet4\Controller\CommentController();
                            $commentCtrl->updateComment($_GET['id'], $_GET['post_id'], $_POST['author'], $_POST['comment']);
                        }
                        else
                        {
                            throw new Exception('Tous les champs ne sont pas remplis..');
                        }
                    }
                    else
                    {
                        throw new Exception('Aucun identifiant de commentaire envoyé !');
                    }

                }
                else
                {
                    throw new Exception('Aucun identifiant de chapitre envoyé !');
                }
            }
            // ADMIN - Supprimer un commentaire
            elseif ($_GET['action'] == 'deleteComment')
            {
                if (isset($_GET['id']) && $_GET['id'] > 0)
                {
                    $commentCtrl = new \Laetitia_Bernardi\projet4\Controller\CommentController();
                    $commentCtrl->deleteComment($_GET['id']);
                }
                else
                {
                    throw new Exception('Aucun identifiant de commentaire envoyé !');
                }
            }
            // ADMIN - Approuver un commentaire (retirer le signalement)
            elseif ($_GET['action'] == 'approvedComment')
            {
                $commentCtrl = new \Laetitia_Bernardi\projet4\Controller\CommentController();
                $commentCtrl->approvedComment();
            }
          
            // Accueil Visiteur
            elseif ($_GET['action'] == 'home')
            {
                $indexCtrl = new \Laetitia_Bernardi\projet4\Controller\HomeController();
                $indexCtrl->home();
            }
    

            // ADMIN - Page pour créer un chapitre
            elseif ($_GET['action'] == 'adminNewPost')
            {
                $viewCtrl = new \Laetitia_Bernardi\projet4\Controller\ViewController();
                $viewCtrl->adminNewPost();
            }
          
            // Liste des chapitres
            elseif ($_GET['action'] == 'listPosts')
            {
                $postCtrl = new \Laetitia_Bernardi\projet4\Controller\PostController();
                $postCtrl->listPosts();
            }

            // Affiche le chapitre avec ses commentaires
            elseif ($_GET['action'] == 'post')
            {
                if (isset($_GET['post_id']) && $_GET['post_id'] > 0)
                {
                    $postCtrl = new \Laetitia_Bernardi\projet4\Controller\PostController();
                    $postCtrl->post($_GET['post_id']);
                }
                else
                {
                    throw new Exception('Aucun identifiant de chapitre envoyé !');
                }
            }
            // Ajoute un commentaire dans le chapitre selectionné
            elseif ($_GET['action'] == 'addComment')
            {
                if (isset($_GET['post_id']) && $_GET['post_id'] > 0)
                {
                    if (!empty($_POST['author']) && !empty($_POST['comment']))
                    {
                        $commentCtrl = new \Laetitia_Bernardi\projet4\Controller\CommentController();
                        $commentCtrl->addComment($_GET['post_id'], $_POST['author'], $_POST['comment']);
                    }
                    else
                    {
                        throw new Exception('Tous les champs doivent être remplis !');
                    }
                }
                else
                {
                    throw new Exception('Aucun identifiant de chapitre envoyé !');
                }
            }
            // Signaler un commentaire
            elseif ($_GET['action'] == 'report')
            {
                if (isset($_GET['post_id']) && $_GET['post_id'] > 0)
                {
                    if (isset($_GET['id']) && $_GET['id'] > 0)
                    {
                        
                        $commentCtrl = new \Laetitia_Bernardi\projet4\Controller\CommentController();
                        $commentCtrl->reportingComment();
                        echo "<p class='comSignal'>Commentaire signalé </p>";

    
                    }   
                    else
                    {
                        throw new Exception('Aucun identifiant de commentaire envoyé pour pouvoir le signaler!');
                    }
                }
                else
                {
                    throw new Exception('Aucun identifiant de chapitre envoyé pour revenir sur la page précédente!');
                }
            }
    
         
        }
        // Retourne a l'administration.
        else
        {
            $administrationCtrl = new \Laetitia_Bernardi\projet4\Controller\AdministrationController();
            $administrationCtrl->administration();
        }
    }

//visiteur
    else
    {
        if (isset($_GET['action']) && !empty($_GET['action']))
        {
            // Accueil Visiteur
            if ($_GET['action'] == 'home')
            {
                $indexCtrl = new \Laetitia_Bernardi\projet4\Controller\HomeController();
                $indexCtrl->home();
            }
           
            // Liste des chapitres
            elseif ($_GET['action'] == 'listPosts') 
            {
                $postCtrl = new \Laetitia_Bernardi\projet4\Controller\PostController();
                $postCtrl->listPosts();
            }
            // Affiche le chapitre avec ses commentaires
            elseif ($_GET['action'] == 'post') 
            {
                if (isset($_GET['post_id']) && $_GET['post_id'] > 0) 
                {
                    $postCtrl = new \Laetitia_Bernardi\projet4\Controller\PostController();
                    $postCtrl->post($_GET['post_id']);
                } else 
                {
                    throw new Exception('Erreur. Pas de chapitre séléctionné !');
                }
            }

          
            //envoi mail
            elseif($_GET['action'] == 'email')
            {
                $contactctrl = new ContactFormulaire();
                $contactctrl ->envoi_mail();
            
                    if(isset($_POST['nom'])){
                        print_r($contact->loadForm($_POST));
                    }
                   
            }
            
            // Page de connexion
            elseif ($_GET['action'] == 'login')
            {
                $viewCtrl = new \Laetitia_Bernardi\projet4\Controller\ViewController();
                $viewCtrl->login();
               
            }
// Connexion
            elseif ($_GET['action'] == 'log')
            {
                if (!empty($_POST['pseudo'])&& !empty($_POST['pass']))
                {


                    require ('views/AdminView.php');
                }
                else
                {
                    throw new Exception('probleme identification!');
                }
            }


            // Deconnexion
            elseif ($_GET['action'] == 'logout')
            {
                $userCtrl = new \Laetitia_Bernardi\projet4\Controller\UserController();
                $userCtrl->logoutUser();
            }

            // Ajoute un commentaire dans le chapitre selectionné
            elseif ($_GET['action'] == 'addComment') 
            {
                if (isset($_GET['post_id']) && $_GET['post_id'] > 0) 
                {
                    if (!empty($_POST['author']) && !empty($_POST['comment'])) 
                    {
                        $commentCtrl = new \Laetitia_Bernardi\projet4\Controller\CommentController();
                        $commentCtrl->addComment($_GET['post_id'], $_POST['author'], $_POST['comment']);
                    } 
                    else
                    {
                        throw new Exception('Tous les champs doivent être remplis !');
                    }
                } 
                else 
                {
                    throw new Exception('Aucun identifiant de chapitre envoyé !');
                }
            }
            // Signaler un commentaire
            elseif ($_GET['action'] == 'report') 
            {
                if (isset($_GET['post_id']) && $_GET['post_id'] > 0) 
                {
                    if (isset($_GET['id']) && $_GET['id'] > 0) 
                    {

                        $commentCtrl = new \Laetitia_Bernardi\projet4\Controller\CommentController();
                        $commentCtrl->reportingComment();
                        echo "<p class='comSignal'>Commentaire signalé </p>";
                 
                    }
                    else
                    {
                        throw new Exception('Aucun identifiant de commentaire envoyé pour pouvoir le signaler!');
                    }
                } else {
                    throw new Exception('Aucun identifiant de chapitre envoyé pour revenir sur la page précédente!');
                }
            }
           
        }

        // Retourne à l'index.
        else
        {
            $indexCtrl = new \Laetitia_Bernardi\projet4\Controller\HomeController();
            $indexCtrl->home();
        }
    }

}

catch (Exception $e)
{
    $errorMessage = $e->getMessage();
    require('views/errorView.php');
}
