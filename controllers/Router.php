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
        private $_postCtrl, $_commentCtrl, $_administrationCtrl, $_contactCtrl, $_userCtrl, $_homeCtrl;



        public function __construct()
        {
            \Laetitia_Bernardi\projet4\Controller\Autoload::register();
            $this->_postCtrl = new \Laetitia_Bernardi\projet4\Controller\PostController();
            $this->_commentCtrl = new \Laetitia_Bernardi\projet4\Controller\CommentController();
            $this->_administrationCtrl = new \Laetitia_Bernardi\projet4\Controller\AdministrationController();
            $this->_userCtrl = new \Laetitia_Bernardi\projet4\Controller\UserController();
            $this->_contactCtrl = new \Laetitia_Bernardi\projet4\Controller\ContactController();
        }


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
                       
                       $this->_administrationCtrl->administration();
                    }
                  
//redirection concernant les chapitres
                    // ADMIN - Creation d'un chapitre
                    elseif ($_GET['action'] == 'createPost')
                    {
                        if ($_POST['author'] != NULL && $_POST['title'] != NULL && $_POST['content'] != NULL)
                        {
                           
                           $this->_administrationCtrl->postAdd($_POST['author'], $_POST['title'], $_POST['content']);
                           
                        }
                        else
                        {
                            throw new Exception('Tous les champs ne sont pas remplis..');
                        }
                    }
                     // ADMIN - Page pour créer un chapitre
                    elseif ($_GET['action'] == 'adminNewPost')
                    {
                     
                       $this->_administrationCtrl->adminNewPost();
                    }
                    // ADMIN - Liste des chapitres
                    elseif ($_GET['action'] == 'listPosts')
                    {
                       
                        $this->_postCtrl->listPosts();
                    }
                    //ADMIN - chapitre avec ses commentaires
                    elseif ($_GET['action'] == 'post') 
                    {
                        if (isset($_GET['post_id']) && $_GET['post_id'] > 0) 
                        {
                           
                              if(isset($_GET['commentReport']))
                                {
                                   $commentReport = true;
                                }else{
                                    $commentReport = false;
                                }
                            $this->_postCtrl->post($_GET['post_id'],$commentReport);
                              
                        } else 
                        {
                            throw new Exception('Erreur. Pas de chapitre séléctionné !');
                        }
                    }
             
                    // ADMIN - page de MAJ d'un chapitre
                    elseif ($_GET['action'] == 'adminUpdatePost')
                    {
                       
                        $this->_administrationCtrl->adminUpdatePost();
                    }
                    // ADMIN - Mise à jour d'un chapitre
                    elseif ($_GET['action'] == 'updatePost')
                    {
                        if (isset($_GET['post_id']) && $_GET['post_id'] > 0)
                        {
                            if ($_POST['author'] != NULL && $_POST['title'] != NULL && $_POST['content'] != NULL)
                            {
                                
                                $this->_administrationCtrl->updatePost($_GET['post_id'], $_POST['author'], $_POST['title'], $_POST['content']);
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
                           
                            $this->_administrationCtrl->deletePost($_GET['post_id']);
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
                        
                        $this->_administrationCtrl->adminListComments();
                    }
                    // ADMIN - Ajoute un commentaire dans le chapitre selectionné
                    elseif ($_GET['action'] == 'addComment')
                    {
                        if (isset($_GET['post_id']) && $_GET['post_id'] > 0)
                        {
                            if (!empty($_POST['author']) && !empty($_POST['comment']))
                            {
                                
                                $this->_commentCtrl->addComment($_GET['post_id'], $_POST['author'], $_POST['comment']);
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
                        
                       $this->_administrationCtrl->adminCommentsReport();
                    }
                    // ADMIN - Supprimer un commentaire
                    elseif ($_GET['action'] == 'deleteComment')
                    {
                        if (isset($_GET['id']) && $_GET['id'] > 0)
                        {
                           
                           $this->_administrationCtrl->deleteComment($_GET['id']);
                        }
                        else
                        {
                            throw new Exception('Aucun identifiant de commentaire envoyé !');
                        }
                    }
                    // ADMIN - Supprimer un commentaire dans la  page detail 
                    elseif ($_GET['action'] == 'deleteOneComment')
                    {
                        if (isset($_GET['id']) && $_GET['id'] > 0)
                        {
                        
                            $this->_administrationCtrl->deleteOneComment($_GET['id']);
                        }
                        else
                        {
                            throw new Exception('Aucun identifiant de commentaire envoyé !');
                        }
                    }
                    
                    // ADMIN - Supprimer un commentaire dans la  comment report
                    elseif ($_GET['action'] == 'deleteOneCommentInReport')
                    {
                        if (isset($_GET['id']) && $_GET['id'] > 0)
                        {
                          
                            $this->_administrationCtrl->deleteOneCommentInReport($_GET['id']);
                        }
                        else
                        {
                            throw new Exception('Aucun identifiant de commentaire envoyé !');
                        }
                    }
                    // ADMIN - Supprimer tous les commentaires
                       elseif ($_GET['action'] == 'deleteComments')
                    {
                       
                        {
                          
                           $this->_administrationCtrl->deleteComments();
                        }
                    
                    }
                    // ADMIN - Approuver un commentaire 
                    elseif ($_GET['action'] == 'approvedComment')
                    {
                       
                        $this->_administrationCtrl->approvedComment();
                    }
                    // ADMIN - Approuver tous les commentaires
                    elseif ($_GET['action'] == 'approvedComments')
                    {
                        
                        $this->_administrationCtrl->approvedComments();
                    }
                   
                    // ADMIN - Ajoute un commentaire dans le chapitre selectionné
                    elseif ($_GET['action'] == 'addCommentAdmin')
                    {
                        if (isset($_GET['post_id']) && $_GET['post_id'] > 0)
                        {
                            if (!empty($_POST['comment']))
                            {
                                
                               $this->_commentCtrl->addCommentAdmin($_GET['post_id'], $_POST['comment']);
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
                    // ADMIN - Page de connexion
                    elseif ($_GET['action'] == 'login')
                    {
                        
                        $this->_userCtrl->login();
                       
                    }
                    //connexion
                    elseif ($_GET['action'] == 'log')
                    {
                    
                        if (!empty($_POST['pseudo']) && !empty($_POST['pass']))
                        {
                
                             
                              $this->_userCtrl->logUser($_POST['pseudo'],$_POST['pass']);
                        }
                        else
                        {
                            throw new Exception('Tous les champs doivent être remplis !');
                        }
                    }
                    // ADMIN - Deconnexion
                    elseif ($_GET['action'] == 'logout')
                    {
                  
                        $this->_userCtrl->logoutUser();
                    }
                     
                }
                // ADMIN - Retourne a l'administration.
                else
                {
                    $this->_administrationCtrl->administration();
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
                 
                        $this->_postCtrl->listPosts();
                    }
                    // Affiche le chapitre avec ses commentaires
                    elseif ($_GET['action'] == 'post') 
                    {
                        if (isset($_GET['post_id']) && $_GET['post_id'] > 0)

                        {
                         
                            
                                if(isset($_GET['commentReport']))
                                {
                                   $commentReport = true;
                                }else{
                                    $commentReport = false;
                                }

                            $this->_postCtrl->post($_GET['post_id'],$commentReport);
                              
                        } else 
                        {
                            throw new Exception('Erreur. Pas de chapitre séléctionné !');
                        }
                    }
              
                    // Page de connexion
                    elseif ($_GET['action'] == 'login')
                    {
                        
                        $this->_userCtrl->login();
                       
                    }
                     //connexion
                    elseif ($_GET['action'] == 'log')
                    {
                   
                        if (!empty($_POST['pseudo']) && !empty($_POST['pass']))
                        {
                          
                            $this->_userCtrl->logUser($_POST['pseudo'],$_POST['pass']);
                        }
                        else
                        {
                            throw new Exception('Tous les champs doivent être remplis !');
                        }
                    }
                    // Deconnexion
                    elseif ($_GET['action'] == 'logout')
                    {
                     
                        $this->_userCtrl->logoutUser();
                    }
                    // page mail
                    elseif ($_GET['action'] == 'email') 
                    {
                      
                        $this->_contactCtrl->mailView();
                    }
                    

                    //envoi un mail
                    elseif ($_GET['action'] == 'addMail') 
                    {
                                
                       if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['object']) && !empty($_POST['message'])) 
                        {
                          
                            $this->_contactCtrl->sendEmail();
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
                      
                                $this->_commentCtrl->addComment($_GET['post_id'], $_POST['author'], $_POST['comment']);
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
                            
                                $this->_commentCtrl->reportingComment();             
                         
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
                   
                   $this->_postCtrl->listPosts();
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