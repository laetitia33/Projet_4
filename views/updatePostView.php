<?php $title = 'Modification du chapitre ' . htmlspecialchars($post['id']) . ' '; ?>

<?php ob_start(); ?>
<div id ="modif"></div>

<h2>Modifier le chapitre: <?= htmlspecialchars($post['title']); ?></h2>

<?php $header = ob_get_clean(); ?>

<?php ob_start(); ?>

    <p>
        <p><i class="far fa-calendar-alt"></i> Le <?= $post['date_creation_fr'] ?></p>
        <div class="news" >         
            <?= nl2br(htmlspecialchars($post['content'])) ?>
        </div>
    </p>

    <form action="index.php?action=updatePost&amp;post_id=<?= $_GET['post_id'];?>#episodes" method="POST">

            
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
                <input type="text" name="title" class="inputbasic" id="title" value="<?php echo htmlspecialchars($post['title']) ;?>"/>
        </div>
  
        <div class="inputbasic" style="margin:auto;">
                <label for="content"></label>
                <tinymce name="content" id="content"><?php echo htmlspecialchars($post['content']) ;?></tinymce>
            
        </div>
        <div>
            <input type="submit" value="envoyez votre Chapitre" OnClick="return confirm('Voulez-vous vraiment modifier le chapitre ?');"></input>
        </div>
    </form>

<?php $content = ob_get_clean(); ?>

<?php require('views/home.php'); ?>

