<?php $title = 'commentaires'; ?>

<?php ob_start(); ?>

   
    <h2>Commentaires</h2>
<?php $header = ob_get_clean(); ?>

<?php ob_start(); ?>


<div  id="com"></div>


<?php


while ($comment = $comments->fetch())
{
    ?>
    <div class = "commentaires">
        <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
        <p><?= nl2br(htmlspecialchars($comment['comment'])) ?><br/>
            <em><a href="index.php?action=adminUpdateComment&amp;post_id=<?= $comment['post_id'];?>&amp;id=<?= $comment['id'];?>">Modifier <i class="fas fa-comment-dots"></i></a></em>
            <em><a href="index.php?action=deleteComment&amp;post_id=<?= $comment['post_id'];?>&amp;id=<?= $comment['id'];?>">Supprimer <i class="fas fa-comment-slash"></i></a></em>
        </p>
        </div>
    <?php
}
$comments->closeCursor(); ?>
 
<?php $content = ob_get_clean(); ?>

<?php require('views/home.php'); ?>