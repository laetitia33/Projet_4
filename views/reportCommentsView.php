<?php $title = 'Commentaires signalés'; ?>

<?php ob_start(); ?>


    <h2>Commentaires signalés</h2>

<?php $header = ob_get_clean(); ?>

<?php ob_start(); ?>

    <div>

        <?php

        while ($comment = $reportComments->fetch())
        {
            ?>
            <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
            <p><?= nl2br(htmlspecialchars($comment['comment'])) ?><br/>
                <em><a href="index.php?action=adminUpdateComment&amp;post_id=<?= $comment['post_id'];?>&amp;id=<?= $comment['id'];?>">Éditer <i class="fas fa-comment-dots"></i></a></em>
                <!--<em><a href="../V3/index.php?action=moderateComment&amp;post_id=<?= $comment['post_id'];?>&amp;id=<?= $comment['id'];?>">Modérer <i class="fas fa-comment-slash"></i></a></em>-->
                <em><a href="index.php?action=approvedComment&amp;post_id=<?= $comment['post_id'];?>&amp;id=<?= $comment['id'];?>">Approuver <i class="fas fa-bell-slash"></i></a></em>
                <em><a href="index.php?action=deleteComment&amp;post_id=<?= $comment['post_id'];?>&amp;id=<?= $comment['id'];?>">Supprimer <i class="fas fa-minus-circle"></i></a></em>
            </p>
            <?php
        }
        $reportComments->closeCursor(); ?>
    </div>

<?php $content = ob_get_clean(); ?>

<?php require('views/home.php'); ?>