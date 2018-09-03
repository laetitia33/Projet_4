<?php


namespace Laetitia_Bernardi\projet4\Controller;




class ContactController{

    private $message;
    private $objet;
    private $expediteur;
    private $email;
    private $destinataire = '33260laetitia.bernardi@gmail.com';



    //page du formulaire
    public function mailView(){
       require ('views/contactView.php');
    }

    //vérifier le $_Post du formulaire de contact.
 
    public function message(){
        extract($_POST);
        $this->message = htmlspecialchars($message);
        $this->objet = htmlspecialchars($object);
        $this->expediteur = htmlspecialchars($name);
        $this->email = htmlspecialchars($email);
    }

  
    // Permet d'envoyer un email si les champs ne sont pas vides.
   
    public  function email($function){
        $this->message();
        if(!empty($this->message)&& !empty($this->objet)&& !empty($this->expediteur)&& !empty($this->email) && (filter_var($this->email, FILTER_VALIDATE_EMAIL) == false)){
            $this->$function();
        }
        else{
            $this->sendEmail();
        }
    }


    //Envoie un mail apres le formulaire de contact.

    public function sendEmail(){
        $this->message();
        $destinataire = $this->destinataire;
        $expediteur = $this->expediteur;
        $objet = $this->objet;
        $email = $this->email;
        $headers = 'MIME-Version: 1.0' . "\n";
        $headers .= 'Content-type: text/html; charset=ISO-8859-1' . "\n";
        $headers .= 'Reply-To: ' . $email . "\n";
        $headers .= 'From: "Expediteur"<' . $expediteur . '>' . "\n";
        $headers .= 'Delivered-to: ' . $destinataire . "\n";
        $message = '<div style="width: 100%; text-align: center; font-weight: bold">' . $this->message . '</div>';
        mail($destinataire, $objet, $message, $headers);       
        $this->messag();        
        require('views/contactView.php');
               

    }


    public function messag()
    {
        // echo "<h1 style ='position:absolute;margin-top:20%;font-size:3em;right:1%;'>message envoyé avec succès</h1>";
       
      echo "<p id ='message'>message envoyé avec succès</p>";
    }

}
