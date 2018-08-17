<?php $title = 'Administration'; ?>

<?php ob_start(); ?>

<h2>Bienvenue sur le dashbord <br/> <?= $_SESSION['pseudo']; ?></h2>

<?php $header = ob_get_clean(); ?>

<?php

while ($data = $post->fetch())
{
    ?>
    <div class="administration">
        <h2>Liste des derniers Chapitres</h2>
        <p><span class="publishing">Article écrit par <?= $data['author'] ?><br><i class="far fa-calendar-alt"> le <?= $data['day'] ?> à <?= $data['hour'] ?></i></span></p>
                    
        <p><?= nl2br(substr(htmlspecialchars($data['content']), 0, 500).'...'); ?></p>
        <a  class="input_read" href="index.php?action=post&amp;id=<?= $data['id'] ?>">En lire plus</a>
    </div>
    <?php
} // fin de la boucle des chapitres
$post->closeCursor();
?>
    <div class="administration">
        <h4>Derniers commentaires des visiteurs: </h4>

    <?php

    while ($data = $comment->fetch())
    {
        ?>
        <p>
            <strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= htmlspecialchars($comment['comment_date']) ?>
        </p>
        <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
            
    <?php
    }
$comment->closeCursor(); ?>

<div class="administration">
    <a class="nav-link" href="index.php?action=listPosts">
        <p>Vous avez actuellement <?= $postsTotal['total_posts']?> chapitres dans votre Blog.</p>
    </a>
</div>
<div class="administration">
    <a class="nav-link" href="index.php?action=adminListComments">
        <p>Vous avez actuellement <?= $commentsTotal['total_comments']?> commentaires dans votre Blog.</p>
    </a>
</div>
<div class="administration">
    <a class="nav-link" href="index.php?action=adminCommentsReport">
        <p>Vous avez actuellement <?= $commentsReportTotal['total_comments_report']?> commentaires signalés sur votre Blog.</p>
    </a>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('views/home.php'); ?>