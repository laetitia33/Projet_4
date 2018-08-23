<?php $title = 'Modification du chapitre ' . htmlspecialchars($post['id']) . ' '; ?>

<?php ob_start(); ?>


<h2>Modifier le chapitre: <?= htmlspecialchars($post['title']); ?></h2>

<?php $header = ob_get_clean(); ?>

<?php ob_start(); ?>

    <p>
        <p><i class="far fa-calendar-alt"></i> Le <?= $post['date_creation_fr'] ?></p>
        <div class="news" >         
            <?= nl2br(htmlspecialchars($post['content'])) ?>
        </div>
    </p>

    <form action="index.php?action=updatePost&amp;post_id=<?= $_GET['post_id']; ?>" method="POST">
            
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
          
        <div >
                <input type="text" name="title" class="inputbasic" id="title" placeholder="Indiquez ici votre titre"/>
        </div>
  
        <div class="inputbasic" style="margin:auto;">
                <label for="content"></label>
                <textarea name="content" id="content">Indiquez ,ici ,votre chapitre</textarea>
            
        </div>
        <div>
            <input type="submit" value="envoyez votre Chapitre"></input>
        </div>
    </form>

<?php $content = ob_get_clean(); ?>

<?php require('views/home.php'); ?>

