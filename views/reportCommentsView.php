<?php $title = 'Commentaires signalés'; ?>

<?php ob_start(); ?>

    <div id ="reportcom"></div>
    <h2>Commentaire(s) signalé(s)</h2>

<?php $header = ob_get_clean(); ?>

<?php ob_start(); ?>




<?php

      if(htmlspecialchars($commentsReportTotal['total_comments_report'])> 0){ ;?>
         <em><a href="index.php?action=deleteAllCommentReport" OnClick="return confirm('Voulez-vous vraiment supprimer tous commentaires signalés ?');" ><i class="fas fa-minus-circle"> Supprimer tous les commentaires signalés</i></a></em><br><br>
                       
       
                        
   <?php
    }else { ?>

        <p> Aucun commentaire signalé .<p>

     <?php
    }
    ?>

<?php

      if(htmlspecialchars($commentsReportTotal['total_comments_report']) > 0) { ;?>
         <em><a href="index.php?action=approvedComments" OnClick="return confirm('Souhaitez-vous approuver tous les commentaires signalés ?');" ><i class="fas fa-bell-slash"> Approuver tous les commentaires</i></a></em>
       <?php } ?>




        <?php

        while ($comment = $reportComments->fetch())
        {
            ?>

        <div class="commentaires">
            <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= htmlspecialchars($comment['comment_date_fr']) ?></p>
            <p><?= htmlspecialchars_decode(nl2br(substr(html_entity_decode($comment['comment']), 0, 300).'...'));?><br/>           
              <div class="reponse">
                <em><a href="index.php?action=approvedComment&amp;post_id=<?= $comment['post_id'];?>&amp;id=<?= $comment['id'];?>#reportcom"OnClick="return confirm('Souhaitez-vous approuver ce commentaire ?');">Approuver <i class="fas fa-bell-slash"></i></a></em>
                <em><a href="index.php?action=deleteOneCommentInReport&amp;post_id=<?= $comment['post_id'];?>&amp;id=<?= $comment['id'];?>#deleteCom" OnClick="return confirm('Voulez-vous vraiment supprimer le commentaire ?');">Supprimer <i class="fas fa-minus-circle"></i></a></em>
            </div>
            </p>
        </div>
            <?php
        }
        $reportComments->closeCursor(); ?>


<?php $content = ob_get_clean(); ?>

<?php require('views/home.php'); ?>