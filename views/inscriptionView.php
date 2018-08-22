<?php $title = 'Connection';?>


<!DOCTYPE html>
<html>
    <?php include_once 'views/include/head.php';?>
    <body>
        <img id="pageArticle" src="public/image/photo3.jpg" alt="photo Alaska"/>
        <form action="index.php?action=register" method="POST">
            
           
            <div>
                <label for="author"></label><br />
                <input type="text" placeholder="pseudo" class="inputbasic" id="user" name="author"/>
            </div>
            
            <div>
                <label for="password"/></label><br />
                <input type="text" class="inputbasic" id="nom" name="nom" ; placeholder="nom"/>
               
            </div>
            

            <div>
                <label for="password"/></label><br />
                <input type="password" class="inputbasic" id="password" name="password" ; placeholder="mot de passe"/>
               
            </div>
            <div>
                <label for="password"/></label><br />
                <input type="password" class="inputbasic" id="password" name="password" ; placeholder="Confirmation mot de passe"/>
               
            </div>
            <div>
                <label for="email"/></label><br />
                <input type="email" class="inputbasic" id="email" name="email" ; placeholder="email"/>
               
            </div>
            
            <div>
                <input type="submit" value="Inscription" />
            </div>
        </form>
        <p><a class="news" href="index.php"><i class="fas fa-arrow-left">

        Retour à l'accueil</i></a></p>
        <?php include_once 'views/include/footer.php' ?>                   
        <script src = "public/js/script.js"></script>
    </body>
</html>
