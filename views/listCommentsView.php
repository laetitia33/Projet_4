<?php $title = 'commentaires'; ?>

<?php ob_start(); ?>

   
    <h2>Commentaires</h2>

<?php $header = ob_get_clean(); ?>

<?php ob_start(); ?>

<div>

<?php

while ($comment = $comments->fetch())
{
    ?>
    <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?><br/>
        <em><a href="index.php?action=adminUpdateComment&amp;post_id=<?= $comment['post_id'];?>&amp;id=<?= $comment['id'];?>">Éditer <i class="fas fa-comment-dots"></i></a></em>
        <em><a href="index.php?action=deleteComment&amp;post_id=<?= $comment['post_id'];?>&amp;id=<?= $comment['id'];?>">Supprimer <i class="fas fa-comment-slash"></i></a></em>
        <em><a href="index.php?action=report&amp;post_id=<?= $comment['post_id'];?>&amp;id=<?= $comment['id'];?>">Signaler <i class="fas fa-bell"></i></a></em>
    </p>
    <?php
}
$comments->closeCursor(); ?>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('views/home.php'); ?>