<?php $title = 'commentaires'; ?>

<?php ob_start(); ?>
<div id="deleteCom"></div>
   
    <h2>Commentaires</h2>
<?php $header = ob_get_clean(); ?>
<p class="msgConfirm"></p>
<?php ob_start(); ?>


<div  id="com"></div>


<!--indique s'il y a des commentaires -->
    
<?php
      if($commentsTotal['total_comments']==0){
                        echo "<p> Aucun commentaire .<p>";
       
        ?>                
   <?php
    }else { ?>

        <em><a href="index.php?action=deleteComments#deleteCom" OnClick="return confirm('Voulez-vous vraiment supprimer tous commentaires ?');" ><i class="fas fa-minus-circle"> Supprimer tous les commentaires</i></a></em>

     <?php
    }
    ?>

<?php

while ($comment = $comments->fetch())
{
    ?>
    <div class = "commentaires">
        <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
        <p><?= nl2br(htmlspecialchars($comment['comment'])) ?><br/>
        	<div class="reponse">
            <em><a href="index.php?action=deleteComment&amp;post_id=<?= $comment['post_id'];?>&amp;id=<?= $comment['id'];?>#deleteCom" OnClick="return confirm('Voulez-vous vraiment supprimer le commentaire ?');" >Supprimer <i class="fas fa-minus-circle"></i></a></em>
        	</div>
        </p>
        </div>
    <?php
}
$comments->closeCursor(); ?>
 
<?php $content = ob_get_clean(); ?>

<?php require('views/home.php'); ?>