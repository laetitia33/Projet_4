<?php $title = 'Connection';?>


<!DOCTYPE html>
<html lang="fr">
    <?php include_once 'views/include/head.php';?>
    <body>
        <img id="pageArticle" src="public/image/photo4.jpg" alt="photo Alaska"/>
        <form action="index.php?action=log" method="POST">
          
           
            <div>
                <label for="user">Pseudo :</label><br />
                <input type="text" placeholder="pseudo" class="inputbasic" id="user" name="pseudo">
            </div>
        
            <div>
                <label for="pass">Mot de passe :</label><br /> 
                <input type="password" class="inputbasic" id="pass" name="pass"  placeholder="mot de passe">
               
            </div>
            
            <div>
                <input type="submit" value="Connexion" />
            </div>

      
        </form>



          <p><a class="news" href="index.php"><i class="fas fa-arrow-left">Retour à l'accueil</i></a></p>
        <?php include_once 'views/include/footer.php' ?>                   
        <script src = "public/js/script.js"></script>
        <script src ="public/js/tinymce/fr.js"></script>
        <script src ="public/js/pagination.js"></script>
        <script src ="public/js/placeholder.js"></script>
        <script src ="public/js/placeholder.min.js"></script>
    </body>
</html>
