<?php
namespace Laetitia_Bernardi\projet4\Model;

use \DateTime;
use \PDO;

class ContactManager extends Manager
{

protected $id, $name, $email, $content, $date_creation;


   public function __construct()
    {
        $this->_comment_date = new DateTime('now');
        
    }

    public function getId()
    {
        return $this->_id;
    }


    public function getName()
    {
        return $this->_name;
    }

 
    public function getEmail()
    {
        return $this->_email;
    }

   
    public function getContent()
    {
        return $this->_content;
    }

   
    public function getDateCreation()
    {
        return $this->_date_creation;
    }



    public function setId($id)
    {
        $id = (int) $id;

        if ($id > 0) {
            $this->_id = $id;
        }
    }

 
 
    public function setName($name)
    {
        if(is_string($name)) {
            $this->_name = $name;
        }
    }

   
    public function setEmail($email)
    {
        if(is_string($email)) {
            $this->_email = $email;
        }
    }

  
    public function setContent($content)
    {
        $this->_content = $content;
    }

   
    public function setDateCreation(DateTime $date_creation)
    {
        $this->_date_creation = $date_creation;
    }


    // dernier commentaire
    public function getLastMail()
    {
        $db = $this->dbConnect();
        $email = $db->query('SELECT name, email,content , DATE_FORMAT(date_creation, \'%d/%m/%Y à %H:%i\') AS date_creation_fr FROM contact ORDER BY date_creation DESC LIMIT 0, 1');
        return $email;
    }

    //tous les mails
    public function getAllMails()
    {
        $db = $this->dbConnect();
        $emails = $db->query('SELECT id, name, email, content,  DATE_FORMAT(date_creation, \'%d/%m/%Y à %H:%i\') AS date_creation_fr FROM contact ORDER BY date_creation DESC');
        return $emails;
    }

    //nombre de mails
    public function countMails()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT COUNT(*) AS total_emails FROM contact');
        $req->execute();
        $emailsTotal = $req->fetch();
        return $emailsTotal;
    }

    //envoi d'un mail
    public function createMail($name, $email, $content)
    {
        $this->setName($name);
        $this->setEmail($email);
        $this->setContent($content);

        $db = $this->dbConnect();
        $emails = $db->prepare('INSERT INTO contact (name, email,content, date_creation) VALUES( ?, ?, ?, NOW())');
        $createMail = $emails->execute(array(
            $this->getName(),
            $this->getEmail(),
            $this->getContent(),
        ));

        return $createMail;
    }

    //chargement mail
    public function updateMail($id, $name, $email, $content)
    {
        $this->setId($id);
        $this->setIdName($name);
        $this->setEmail($email);
        $this->setContent($content);

        $db = $this->dbConnect();
        $mails = $db->prepare('UPDATE contact SET name= :name, email= :email, content= :content, date_creation= NOW() WHERE id= :id');
        $mails->bindParam('name', $this->getName(), PDO::PARAM_INT);
        $mails->bindParam('email',$this->getEmail(), PDO::PARAM_STR);
        $mails->bindParam('content',$this->getContent(), PDO::PARAM_STR);
        $mails->bindParam('id', $this->getId(), PDO::PARAM_INT);
        $updateMail = $mails->execute();

        return $updateMail;
    }


   //suppreimer mail
    public function deleteMail($id)
    {
        $this->setId($id);

        $db = $this->dbConnect();
        $mail = $db->prepare('DELETE FROM contact WHERE id= ?');
        $deleteMail = $comment->execute(array($this->getIdComment()));

        return $deleteMail;
    }


    
}
