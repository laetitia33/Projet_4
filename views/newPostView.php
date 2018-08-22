<?php $title = 'Créer un nouveau Chapitre '; ?>

<?php ob_start(); ?>


<h2>Ecriture d'un nouveau chapitre</h2>

<?php $header = ob_get_clean(); ?>

<?php ob_start(); ?>

<form action="index.php?action=createPost" method="POST">
        <div>
            <label for="author" >Auteur</label>
     
                <input type="text" name="author" class="inputbasic" id="author"value="<?php
                if (isset($_SESSION['pseudo']))
                {
                    echo htmlspecialchars($_SESSION['pseudo']);
                }
                ?>"
                />
        </div>

        <div>
            <label for="title">Titre</label>
           
                <input type="text" name="title" class="inputbasic" id="title" placeholder="Indiquez ici votre titre"/>

        </div>
        
        <div>
            <label for="content" >Chapitre</label>
        
                <textarea name="content" id="content" class="inputbasic" placeholder="Indiquez ici votre chapitre"></textarea>
        </div>
      
            <button type="submit" name="envoyer">Envoyer</button>
  
</form>

<?php $content = ob_get_clean(); ?>

<?php require('views/home.php'); ?>

