<?php $title = 'Créer un nouveau Chapitre '; ?>

<?php ob_start(); ?>
<div id ="create"></div>

<h2>Ecriture d'un nouveau chapitre</h2>

<?php $header = ob_get_clean(); ?>

<?php ob_start(); ?>

<form action="index.php?action=createPost" method="POST">
        <div>
            <label for="author" ></label>
     
            <input type="text" name="author" class="inputbasic" id="author"value="<?php
                if (isset($_SESSION['pseudo']))
                {
                    echo htmlspecialchars($_SESSION['pseudo']);
                }
                ?>"
                />
        </div>

        <div>
            <label for="title"></label>          
            <input type="text" name="title" class="inputbasic" id="title" placeholder="Indiquez ici votre titre"/>

        </div>
        
        <div >
            
        <div class="inputbasic" style="margin:auto;">
                <label for="content"></label>
                <textarea name="content" id="content">Indiquez ,ici ,votre chapitre</textarea>
            </div>
        </div>


        <div>
            <input type="submit" value="envoyez votre Chapitre"></input>
        </div>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('views/home.php'); ?>

