<?php

namespace Laetitia_Bernardi\projet4\Controller;
require_once ('models/ContactManager.php');

class ContactController

{
    private $_email;
 

    public function __construct()
    {
        $this->_email = new \Laetitia_Bernardi\projet4\Model\ContactManager();

    }

//page du formulaire
 public function mailView(){
       require ('views/contactView.php');
    }



// envoyer un mail
    public function addMail($name, $email,$content)
    {
        $postMail = $this->_email->createMail($name, $email, $content);
        if($postMail === false)
        {
            throw new Exception('Impossible d\'envoyer le message');
        }
        else{
            header('Location: index.php?action=email');
                echo '<p class="succesMail" >Email envoyé avec succès</p>';

        }
    }


// Afficher  email
    public function email($id)
    {
        $email = $this->_email->getMail($id);
        require('views/mailView.php');
    }

// Liste des des mails
    public function listMails()
    {
        $emails = $this->_email->getMails();
        require('views/mailList.php');
      
    }

// Page d'édition d'un mail
    public function adminUpdateMail()
    {
        $email = $this->_email->getMail($_GET['id']);
        require ('views/updateMailView.php');
    }

// Editer un mail
    public function updateMail($id, $name, $email, $content)
    {
        $updateMail = $this->_email->updatemail($id, $name, $email, $content);

        if ($updatemail === false) {
            throw new Exception('Impossible de mettre à jour l email');
        } else {
            header('Location: index.php?action=mailList');
        }
    }

// Supprimer un mail
    public function deleteMail($id)
    {
        $deleteMail = $this->_email->deleteMail($id);

        if ($deleteMail === false) {
            throw new Exception('Impossible de supprimer l \'email');

        } else {
            header('Location:index.php?action=mailList');
        }
    }
}

