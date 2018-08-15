<?php $title = 'Connection';?>


<!DOCTYPE html>
<html>
    <?php include_once 'views/include/head.php';?>
    <body>
        <img id="pageArticle" src="public/image/photo6.jpg" alt="photo Alaska"/>
        <form action="index.php?action=log" method="POST">
            
           
            <div>
                <label for="author">Pseudo :</label><br />
                <input type="text" placeholder="pseudo" class="inputbasic" id="user" name="author"/>
            </div>
            
            <div>
                <label for="password"/>Mot de passe :</label><br />
                <input type="password" class="inputbasic" id="password" name="password" ; placeholder="mot de passe"/>
               
            </div>
            
            <div>
                <input type="submit" value="Connexion" />
            </div>
        </form>
        <p><a class="news" href="index.php"><i class="fas fa-arrow-left">
        Retour à l'accueil</i></a></p>
        <?php include_once 'views/include/footer.php' ?>                   
        <script src = "public/js/script.js"></script>
    </body>
</html>
