<?php $title = 'Commentaires signalés'; ?>

<?php ob_start(); ?>

    <div id ="reportcom"></div>
    <h2>Commentaire(s) signalé(s)</h2>

<?php $header = ob_get_clean(); ?>

<?php ob_start(); ?>

        <?php

        while ($comment = $reportComments->fetch())
        {
            ?>

        <div class="commentaires">
            <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
            <p><?= nl2br(htmlspecialchars($comment['comment'])) ?><br/>           
              
                <em><a href="index.php?action=approvedComment&amp;post_id=<?= $comment['post_id'];?>&amp;id=<?= $comment['id'];?>">Approuver <i class="fas fa-bell-slash"></i></a></em>
                <em><a href="index.php?action=deleteComment&amp;post_id=<?= $comment['post_id'];?>&amp;id=<?= $comment['id'];?>">Supprimer <i class="fas fa-minus-circle"></i></a></em>
            </p>
        </div>
            <?php
        }
        $reportComments->closeCursor(); ?>


<?php $content = ob_get_clean(); ?>

<?php require('views/home.php'); ?>