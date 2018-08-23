<?php $title = 'Editer le commentaire ' . htmlspecialchars($comment['id']) . ''; ?>

<?php ob_start(); ?>

   <div id="#editcom"></div>
    <h2>Éditer le commentaire de: </h2>
    <p><?= htmlspecialchars($comment['author']); ?><em> du <?= htmlspecialchars($comment['comment_date_fr']); ?></em><br/>
        <?= htmlspecialchars($comment['comment']); ?> </p>

<?php $header = ob_get_clean(); ?>

<?php ob_start(); ?>

<div class="newss">
    <h3>
        <?= htmlspecialchars($post['title']); ?>
        <em>le <?= $post['date_creation_fr']; ?></em>
    </h3>

    <p>
        <?= nl2br(htmlspecialchars($post['content'])); ?> <br/>
    </p>
</div>

<form action="index.php?action=updateComment&amp;post_id=<?= $_GET['post_id']; ?>&amp;id=<?= $_GET['id']; ?>" method="POST">
    <div class="col-lg-12">
        <div class="form-group row">
            <label for="author" class="col-lg-3">Auteur</label>
            <div class="col-lg-9">
                <input type="text" name="author" id="author" class="form-control" value="<?= htmlspecialchars($comment['author']); ?>"/>
            </div>
        </div>
        <div class="form-group row">
            <label for="content" class="col-lg-3">Commentaire</label>
            <div class="col-lg-9">
                <textarea name="comment" id="comment" class="form-control" placeholder="<?= htmlspecialchars($comment['comment']); ?>"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-12">
                <button type="submit" name="envoyer" class="btn btn-primary">Mettre à jour votre commentaire</button>
            </div>
        </div>
    </div>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('views/home.php'); ?>