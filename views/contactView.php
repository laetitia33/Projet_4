<?php $title = 'Contact Jean Forteroche';?>


<!DOCTYPE html>
<html>

    <?php include_once 'views/include/head.php';?>
    <body>
        <img id="pageArticle" src=" public/image/photo3.jpg" alt="photo Alaska"/>
  
       
        <?php if($envoiMail = true) { ?>
                <div id="message">Message envoyé avec succès</div>
            <?php
            }?>
        <p><a class="news" href="index.php#episodes"><i class="fas fa-arrow-left"> Retour à l'accueil</i></a></p>
            <form class="form" method="post" action="index.php?action=addMail" ?>
                <h2>Contactez l'auteur</h2>

                <div class="name">
                    <label for="name"></label><br />
                    <input type="text" name="name" placeholder="Entrez votre nom" class="inputbasic" value="" />
                </div>

                <div class="email">
                    <label for="email"></label><br />
                    <input type="email" name="email" placeholder="Entrez votre e-mail" class="inputbasic"  value="" />
                </div>
                <div class="object">

                    <label for="object"></label><br />
                    <input type="text" name="object" placeholder="sujet" class="inputbasic" value="" />
                </div>

                <div class="inputbasic" >
                    <label for="message"></label><br />
                        <textarea type="text" name="message" placeholder="Entrez votre message"></textarea>
                </div>

                <div id ="g-recaptcha" >
                    <div class="g-recaptcha" data-sitekey="6Lfm7G4UAAAAAP0c1tu9ayQR6USFum9JdhWRPS-8"></div>
                </div>

             <input type="submit" value ="Envoyez votre message"  OnClick="return confirm('Souhaitez-vous envoyer ce message ?');"/>
            
            </form>
            
        <?php include_once 'views/include/footer.php' ?>                   
        <script src = "public/js/script.js"></script>
        <script src ="public/js/placeholder.js"></script>
        <script src ="public/js/placeholder.min.js"></script>
    </body>
</html>


