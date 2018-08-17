<?php $title = 'Mise à jour du chapitre ' . htmlspecialchars($chapter['id']) . ' '; ?>

<?php ob_start(); ?>


<h2>Éditer le chapitre: <?= htmlspecialchars($chapter['title']); ?></h2>

<?php $header = ob_get_clean(); ?>

<?php ob_start(); ?>

<div class="newss">
    <h3>
        <?= htmlspecialchars($post['title']); ?>
        <em>le <?= $post['creation_date_fr']; ?></em>
    </h3>

    <p>
        <?= nl2br(htmlspecialchars($post['content'])); ?> <br/>
    </p>
</div>

<form action="index.php?action=updatePost&amp;post_id=<?= $_GET['post_id']; ?>" method="POST">
    <div class="col-lg-12">
        <div class="form-group row">
            <label for="author" class="col-lg-3">Auteur</label>
            <div class="col-lg-9">
                <input type="text" name="author" id="author" class="form-control" value="<?php
                if (isset($_SESSION['pseudo']))
                {
                    echo htmlspecialchars($_SESSION['pseudo']);
                }
                ?>"
                />
            </div>
        </div>
        <div class="form-group row">
            <label for="title" class="col-lg-3">Titre</label>
            <div class="col-lg-9">
                <input type="text" name="title" class="form-control" id="title" placeholder="Indiquez ici votre titre"/>
            </div>
        </div>
        <div class="form-group row">
            <label for="content" class="col-lg-3">Chapitre</label>
            <div class="col-lg-9">
                <textarea name="content" id="content" class="form-control" placeholder="Indiquez ici votre chapitre"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-9">
                <button type="submit" name="envoyer" class="btn btn-primary">Envoyer</button>
            </div>
        </div>
    </div>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('views/home.php'); ?>

