
<?php

require('controllers/PostController.php');
require('controllers/CommentController.php');
require('controllers/AdminController.php');
require('controllers/UserController.php');
require('controllers/ContactController.php');
require('controllers/Autoload.php');
use \controllers\ContactController;
use \controllers\UserController;
use \controllers\PostController;
use \controllers\CommentController;
use \controllers\AdminController;
use \controllers\Autoload;

class Routeur
{


        private $postCtrl, $commentCtrl, $administrationCtrl, $contactCtrl, $userCtrl, $homeCtrl;

        /**
         * Routeur constructor.
         * Méthode magique car automatiquement appelé dès l'instanciation de Routeur
         * Permet d'instancier automatiquement les controller
         */
        public function __construct()
        {
            \Laetitia_Bernardi\projet4\Controller\Autoload::register();
            $this->postCtrl = new \Laetitia_Bernardi\projet4\Controller\PostController();
            $this->commentCtrl = new \Laetitia_Bernardi\projet4\Controller\CommentController();
            $this->administrationCtrl = new \Laetitia_Bernardi\projet4\Controller\AdministrationController();
            $this->userCtrl = new \Laetitia_Bernardi\projet4\Controller\UserController();
            $this->contactCtrl = new \Laetitia_Bernardi\projet4\Controller\ContactController();
        }

        /**
         * Methode qui permet, si les conditions sont réunis, d'afficher l'url demandée.
         */
        
        public function RouteRequest()
        {


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
                  

        ///redirection concernant les chapitres

                    // ADMIN - Creation d'un chapitre
                    elseif ($_GET['action'] == 'createPost')
                    {
                        if ($_POST['author'] != NULL && $_POST['title'] != NULL && $_POST['content'] != NULL)
                        {
                            $postCtrl = new \Laetitia_Bernardi\projet4\Controller\AdministrationController();
                            $postCtrl->postAdd($_POST['author'], $_POST['title'], $_POST['content']);
                           
                        }

                        else
                        {
                            throw new Exception('Tous les champs ne sont pas remplis..');
                        }
                    }

                     // ADMIN - Page pour créer un chapitre
                    elseif ($_GET['action'] == 'adminNewPost')
                    {
                        $viewCtrl = new \Laetitia_Bernardi\projet4\Controller\AdministrationController();
                        $viewCtrl->adminNewPost();
                    }

                    // Liste des chapitres
                    elseif ($_GET['action'] == 'listPosts')
                    {
                        $postCtrl = new \Laetitia_Bernardi\projet4\Controller\PostController();
                        $postCtrl->listPosts();
                    }

                    //chapitre avec ses commentaires
                    elseif ($_GET['action'] == 'post') 
                    {
                        if (isset($_GET['post_id']) && $_GET['post_id'] > 0) 
                        {
                            $postCtrl = new \Laetitia_Bernardi\projet4\Controller\PostController();
                              if(isset($_GET['commentReport']))
                                {
                                   $commentReport = true;
                                }else{
                                    $commentReport = false;
                                }

                            $postCtrl->post($_GET['post_id'],$commentReport);
                              
                        } else 
                        {
                            throw new Exception('Erreur. Pas de chapitre séléctionné !');
                        }
                    }
             
                    // ADMIN - page de MAJ d'un chapitre
                    elseif ($_GET['action'] == 'adminUpdatePost')
                    {
                        $postCtrl = new \Laetitia_Bernardi\projet4\Controller\AdministrationController();
                        $postCtrl->adminUpdatePost();
                    }

                    // ADMIN - Mise à jour d'un chapitre
                    elseif ($_GET['action'] == 'updatePost')
                    {
                        if (isset($_GET['post_id']) && $_GET['post_id'] > 0)
                        {
                            if ($_POST['author'] != NULL && $_POST['title'] != NULL && $_POST['content'] != NULL)
                            {
                                $postCtrl = new \Laetitia_Bernardi\projet4\Controller\AdministrationController();
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
                            $postCtrl = new \Laetitia_Bernardi\projet4\Controller\AdministrationController();
                            $postCtrl->deletePost($_GET['post_id']);
                        }
                        else
                        {
                            throw new Exception('Aucun identifiant de chapitre envoyé !');
                        }
                    }
          

        //redirection concernant les commentaires           
                    // ADMIN - Liste des commentaires
                    elseif ($_GET['action'] == 'adminListComments')
                    {
                        $commentCtrl = new \Laetitia_Bernardi\projet4\Controller\AdministrationController();
                        $commentCtrl->adminListComments();

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


                    // ADMIN - Liste des commentaires signalés
                    elseif ($_GET['action'] == 'adminCommentsReport')
                    {
                        $commentCtrl = new \Laetitia_Bernardi\projet4\Controller\AdministrationController();
                        $commentCtrl->adminCommentsReport();
                    }

                 // ADMIN - Supprimer un commentaire
                    elseif ($_GET['action'] == 'deleteComment')
                    {
                        if (isset($_GET['id']) && $_GET['id'] > 0)
                        {
                            $commentCtrl = new \Laetitia_Bernardi\projet4\Controller\AdministrationController();
                            $commentCtrl->deleteComment($_GET['id']);
                        }
                        else
                        {
                            throw new Exception('Aucun identifiant de commentaire envoyé !');
                        }
                    }

                    //ADMIN - Supprimer tous les commentaires
                       elseif ($_GET['action'] == 'deleteComments')
                    {
                       
                        {
                            $commentCtrl = new \Laetitia_Bernardi\projet4\Controller\AdministrationController();
                            $commentCtrl->deleteComments();
                        }
                    
                    }

                    // ADMIN - Approuver un commentaire 
                    elseif ($_GET['action'] == 'approvedComment')
                    {
                        $commentCtrl = new \Laetitia_Bernardi\projet4\Controller\AdministrationController();
                        $commentCtrl->approvedComment();
                    }

                    // ADMIN - Approuver tous les commentaires
                    elseif ($_GET['action'] == 'approvedComments')
                    {
                        $commentsCtrl = new \Laetitia_Bernardi\projet4\Controller\AdministrationController();
                        $commentsCtrl->approvedComments();
                    }

                   

                    // Ajoute un commentaire dans le chapitre selectionné
                    elseif ($_GET['action'] == 'addCommentAdmin')
                    {
                        if (isset($_GET['post_id']) && $_GET['post_id'] > 0)
                        {
                            if (!empty($_POST['comment']))
                            {
                                $commentadminCtrl = new \Laetitia_Bernardi\projet4\Controller\CommentController();
                                $commentadminCtrl->addCommentAdmin($_GET['post_id'], $_POST['comment']);
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
                    // Page de connexion
                    elseif ($_GET['action'] == 'login')
                    {
                        $userCtrl = new \Laetitia_Bernardi\projet4\Controller\userController();
                        $userCtrl->login();
                       
                    }

                    // Deconnexion
                    elseif ($_GET['action'] == 'logout')
                    {
                        $userCtrl = new \Laetitia_Bernardi\projet4\Controller\UserController();
                        $userCtrl->logoutUser();
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
                    
                    // Accueil visiteurs /Liste des chapitres
                   if ($_GET['action'] == 'listPosts') 
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
                              if(isset($_GET['commentReport']))
                                {
                                   $commentReport = true;
                                }else{
                                    $commentReport = false;
                                }

                            $postCtrl->post($_GET['post_id'],$commentReport);
                              
                        } else 
                        {
                            throw new Exception('Erreur. Pas de chapitre séléctionné !');
                        }
                    }


                     // Page d'inscription
                    elseif ($_GET['action'] == 'inscriLogin')
                    {
                        
                        $userCtrl = new \Laetitia_Bernardi\projet4\Controller\userController();
                        $userCtrl->inscriLogin();
                       
                    }
                     // Inscription
                    elseif ($_GET['action'] == 'register')
                    {
                        if (!empty($_POST['pseudo']) && !empty($_POST['pass']) && !empty($_POST['pass_confirm']) && !empty($_POST['email']))
                        {
                            // Sécurité
                            $pseudo = htmlspecialchars($_POST['pseudo']);
                            $email = htmlspecialchars($_POST['email']);
                            // Hachage du mot de passe
                            $password_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);
                            // On vérifie la Regex pour l'adresse email
                            if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email']))
                            {
                                // On vérifie que les 2 mots de passe sont identiques.
                                if ($_POST['pass'] == $_POST['pass_confirm'])
                                {
                                    $userCtrl = new UserController();
                                    $userCtrl->registerUser(2, $pseudo, $password_hache, $email);
                                }
                                else
                                {
                                    throw new Exception('Les 2 mots de passe ne sont pas identiques, recommencez !');
                                }
                            }
                            else
                            {
                                throw new Exception('L\'adresse email ' . $email . ' n\'est pas valide, recommencez !');
                            }
                        }
                        else
                        {
                            throw new Exception('Tous les champs doivent être remplis !');
                        }
                    }


                    // Page de connexion
                    elseif ($_GET['action'] == 'login')
                    {
                        $userCtrl = new \Laetitia_Bernardi\projet4\Controller\userController();
                        $userCtrl->login();
                       
                    }

                    //connexion
                    elseif ($_GET['action'] == 'log')
                    {
                    
                        if (!empty($_POST['pseudo']) && !empty($_POST['pass']))
                        {
                            $userCtrl = new \Laetitia_Bernardi\projet4\Controller\UserController();
                            $userCtrl->logUser($_POST['pseudo'], $_POST['pass']);
                        }
                        else
                        {
                            throw new Exception('Tous les champs doivent être remplis !');
                        }
                    }

                    // Deconnexion
                    elseif ($_GET['action'] == 'logout')
                    {
                        $userCtrl = new \Laetitia_Bernardi\projet4\Controller\UserController();
                        $userCtrl->logoutUser();
                    }


                    // page mail
                    elseif ($_GET['action'] == 'email') 
                    {
                        $contactCtrl = new \Laetitia_Bernardi\projet4\Controller\ContactController();
                        $contactCtrl->mailView();
                    }
                    
                  
                    //envoyer un mail
                    elseif ($_GET['action'] == 'addMail') 
                    {
                                
                       if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['object']) && !empty($_POST['message'])) 
                        {
                            $contactCtrl = new \Laetitia_Bernardi\projet4\Controller\ContactController();
                            $contactCtrl->sendEmail();

                      	}
                        else
                        {
                                throw new Exception('Tous les champs doivent être remplis !');
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

                // Retourne à l'index.Accueil
                else
                {
                    $postCtrl = new \Laetitia_Bernardi\projet4\Controller\PostController();
                    $postCtrl->listPosts();

                }
            }

        }

        catch (Exception $e)
        {
            $errorMessage = $e->getMessage();
            require('views/errorView.php');
        }


    }
   
}