<?php

namespace Laetitia_Bernardi\projet4\Controller;

use \models\ContactManager;

class ContactController

{
    private $_email;
 

    public function __construct()
    {
        $this->_email = new \Laetitia_Bernardi\projet4\Model\ContactManager();

    }


// ADMIN envoyer un mail
    public function addMail($name, $email,$content)
    {
        $postMail = $this->_email->createMail($name, $email, $content);
        if($postMail === false)
        {
            throw new Exception('Impossible d\'envoyer le message');
        }
        else{
            echo '<p class="succesMail" >Email envoyé avec succès</p>';

        }
    }



// Afficher  email
    public function email($mail_id)
    {
        $email = $this->_email->getMail($mail_id);
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
        $email = $this->_email->getMail($_GET['mail_id']);
        require ('views/updateMailView.php');
    }

// Editer un mail
    public function updateMail($mail_id, $name, $email, $content)
    {
        $updateMail = $this->_email->updatemail($mail_id, $name, $email, $content);

        if ($updatemail === false) {
            throw new Exception('Impossible de mettre à jour l email');
        } else {
            header('Location: index.php?action=mailList');
        }
    }

// Supprimer un mail
    public function deleteMail($mail_id)
    {
        $deleteMail = $this->_email->deleteMail($mail_id);

        if ($deleteMail === false) {
            throw new Exception('Impossible de supprimer l \'email');

        } else {
            header('Location:index.php?action=mailList');
        }
    }
}

