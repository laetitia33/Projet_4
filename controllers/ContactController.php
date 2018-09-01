<?php


namespace Laetitia_Bernardi\projet4\Controller;



class ContactController{

    public $nom;
    public $mail;
    public $tel;
    public $sujet;
    public $message;

   
    public $webmaster = '33260laetitia.bernardi@gmail.com';
    


    //page du formulaire
    public function mailView(){
       require ('views/contactView.php');
    }



    public function verif_null($var)
    { 
        if($var!="" and !empty($var)){
          return trim($var);
        }
        return null;
    }

    public function verif_mail($var) 
    {
        $code_syntaxe='#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,5}$#';   
        if(preg_match($code_syntaxe,$var)){ 
          return $var;
        }
        return null;   
    }

    public function verif_tel($var) 
    {
        $code_syntaxe='#^[0-9]{9,18}$#'; 
        if(preg_match($code_syntaxe,$var)){ 
          return $var;
        }
        return null;
    }
    
    function envoi_mail(){ //fonction qui envoie le mail
       
       $contenu_message = "Nom : ".$this->nom."\nMail : ".$this->mail."\nSujet : ".$this->sujet."\nTelephone : ".$this->tel."\nMessage : ".$this->message;
	     $entete = "From: ".$this->nom." <".$this->mail."> \nContent-Type: text/html; charset=iso-8859-1";	 
       mail($this->webmaster,$this->sujet,$contenu_message,$entete);
	
	  }
    
    public function loadForm($data){
        extract($data);
        $this->nom      = trim(htmlentities($nom, ENT_QUOTES));
        $this->mail     = $this->verif_mail($mail);
        $this->tel      = $this->verif_tel($tel);
        $this->sujet    = trim(htmlentities($sujet, ENT_QUOTES));
        $this->message  = trim(htmlentities($message, ENT_QUOTES));
        $test = $this->testForm();
        if(!empty($test)){
           $this->envoi_mail();
        };
    } 
    
    public function testForm(){
       if($this->verif_null($this->nom) and $this->verif_null($this->mail) and $this->verif_null($this->tel) and $this->verif_null($this->sujet) and $this->verif_null($this->message)){
          if($this->verif_mail($this->mail) and $this->verif_tel($this->tel)){
              return 1;
          }
          return null; 
       }
       return null; 
    }

}

?>
