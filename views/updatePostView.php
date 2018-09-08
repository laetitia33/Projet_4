<?php $title = 'Modification du chapitre ' . htmlspecialchars($post['id']) . ' '; ?>

<?php ob_start(); ?>
<div id ="modif"></div>

<h2>Modifier le chapitre: <?= htmlspecialchars($post['title']); ?></h2>

<?php $header = ob_get_clean(); ?>

<?php ob_start(); ?>

    <p>
        <p><i class="far fa-calendar-alt"></i> Le <?= htmlspecialchars($post['date_creation_fr']) ?></p>
        <div class="news" >         
            <p><?= htmlspecialchars_decode(nl2br(html_entity_decode($post['content'])));?></p>
        </div>
    </p>

    <form action="index.php?action=updatePost&amp;post_id=<?= $_GET['post_id'];?>#episodes" method="POST">

            
        <div>
            <label for="author" ></label>
     
            <input type="text" name="author" class="inputbasic" id="author"value="<?php
                if (isset(htmlspecialchars($_SESSION['pseudo'])))
                {
                    echo htmlspecialchars($_SESSION['pseudo']);
                }
                ?>"
                />
        </div>
          
        <div >
                <input type="text" name="title" class="inputbasic" id="title" value="<?php echo htmlspecialchars($post['title']) ;?>"/>
        </div>
  
        <div class="inputbasic">
                <label for="content"></label>
                <textarea name="content" id="content"><p><?= htmlspecialchars_decode(nl2br(html_entity_decode($post['content'])));?></p></textarea>
            
        </div>
        <div>
            <input type="submit" value="envoyez votre Chapitre" OnClick="return confirm('Voulez-vous vraiment modifier le chapitre ?');"></input>
        </div>
    </form>

<?php $content = ob_get_clean(); ?>

<?php require('views/home.php'); ?>

