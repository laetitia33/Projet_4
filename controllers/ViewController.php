<?php


namespace Laetitia_Bernardi\projet4\Controller;


class ViewController
{
       

    // Page de connexion  
    public function login()
    {
        require('views/loginView.php');
    }

    // Page nouveau chapitre
    public function adminNewPost()
    {
        require ('views/newPostView.php');
    }
}