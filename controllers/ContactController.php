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

    //vérifier le $_Post du formulaire de contact et à la reception avec tinymce
 
    public function message(){
        extract($_POST);

        $this->message = htmlspecialchars_decode(nl2br(html_entity_decode($message)));
        $this->objet = htmlspecialchars_decode(nl2br(html_entity_decode($object)));
        $this->expediteur = htmlspecialchars_decode(nl2br(html_entity_decode($name)));
        $this->email = htmlspecialchars_decode(nl2br(html_entity_decode($email)));
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

//message confirmation email envoyé
    public function messag()
    {
     
      echo "<p id ='message'>message envoyé avec succès</p>";
    }

}
