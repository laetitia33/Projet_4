
<?php $title = 'Bienvenue Jean'; ?>

<?php ob_start(); ?>
    <div id="adminView"></div>

<?php $header = ob_get_clean(); ?>

<?php
    while ($data = $post->fetch())
    {
        ?>
        <h2>Dernier Chapitre:</h2>
        <div class= "adminPost">
                    <h2><?= (htmlspecialchars($data['title'])) ?></h2>
                    <p><span class="publishing"><i class="far fa-calendar-alt"> le <?= $data['date_creation_fr'] ?></i></span></p>
                        
            
                <div class="news" >
                    <?= nl2br(htmlspecialchars(substr($data['content'], 0, 350))); ?>...
                </div>
                
                <a  class="input_read" href="index.php?action=post&amp;post_id=<?= $data['id']; ?>">En lire plus</a>           
        </div>
 
        <?php
    } // fin de la boucle des chapitres

    $post->closeCursor();
    ?>
        <?php
        while ($data = $comment->fetch())
        {
                ?>

        <h2>Dernier Commentaire:</h2>
        <div class = "commentaires">
            <p><strong><?= htmlspecialchars($data['author']); ?></strong> le <?= $data['comment_date_fr']; ?></p>

            <div class="news" >
                <p><?= nl2br(htmlspecialchars(substr($data['comment'],0,350))); ?></p>
            </div>
        </div>

        <?php
        }
    $comment->closeCursor(); ?>

        <h2>Informations</h2>
        <div class="commentaires">
            <div class="admin">
                <a  href="index.php?action=listPosts#episodes">
                    <p>Vous avez actuellement <?= $postsTotal['total_posts']?> chapitres dans votre Blog.</p>
                </a>
            </div>
            <div class="admin">
                <a class="nav-link" href="index.php?action=adminListComments#com">
                    <p>Vous avez actuellement <?= $commentsTotal['total_comments']?> commentaires dans votre Blog.</p>
                </a>
            </div>
            <div class="admin">
                <a href="index.php?action=adminCommentsReport#reportcom">
                    <?php
                     if($commentsReportTotal['total_comments_report']== 0){
                        echo "<p> Vous n'avez aucun commentaire de signalé.<p>";
                    
                    }
                    else { ?>
                    <p>Vous avez actuellement <?= $commentsReportTotal['total_comments_report']?> commentaire(s) signalé(s) sur votre Blog.</p>
                          <?php
                    }
                    ?>
                </a>
            </div>
        </div>

<?php $content = ob_get_clean(); ?>

<?php require('views/home.php'); ?>