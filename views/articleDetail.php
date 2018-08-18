<?php $title = 'Chapitre ' . htmlspecialchars($post['id']) . ''; ?>


<!DOCTYPE html>
<html>
	<?php include_once 'views/include/head.php';?>
	<body>
		<img id="pageArticle" src="public/image/photo13.jpg" alt="photo Alaska"/>
		
		<p class ='comSignal'></p>
			
		</div>
		<p><a class="news" href="index.php#episodes"id="news"><i class="fas fa-arrow-left">Retour à la liste des Chapitres</i></a></p>	
		<h2>
		<?= htmlspecialchars($post['title']) ?>		
		</h2>
		<p>
			<p>Article écrit par <a href="index.php#bio"><?= $post['author'] ?></a><br><br> <i class="far fa-calendar-alt"></i> Le <?= $post['date_creation_fr'] ?>
			</p>
			<div class="news" >
			
				<?= nl2br(htmlspecialchars($post['content'])) ?>
			</div>	
		</p>
			
		<span id ="com"><h3><i class="far fa-comments"></i>
		Commentaires</h3></span>
		  <form action="index.php?action=addComment&amp;post_id=<?= $_GET['post_id'];?>#commentaires" method="POST">
			<div>
				<label for="author"></label><br />
				<input type="text" placeholder="Entrez votre nom" class="inputbasic" id="user" name="author"/>
			</div>
			
			<div>
				<label for="comment"></label><br />
				<textarea class="inputbasic" id="comment" name="comment" ; placeholder="Entrez votre commentaire"></textarea>
			</div>
			
			<div>
				<input type="submit" value="Envoyez votre commentaire" />
			</div>
		</form>
	

		<?php
		while ($comment = $comments->fetch())
		{ ;?>
		
			<div class = "commentaires">
				<p><strong><i class="fas fa-user"></i>   <?= htmlspecialchars($comment['author']) ?></strong> le <?= htmlspecialchars($comment['comment_date_fr']) ?>
				</p>
				<div class="user" id="commentaires">
					<span id="confirmsignal"><p><?= nl2br(htmlspecialchars($comment['comment'])) ?>
						
					</p></span>
				
		     	</div>
		     		<em><a id="validcom" href="index.php?action=report&amp;post_id=<?= $post['id']; ?>&amp;id=<?= $comment['id']; ?>"><i class="fas fa-bell"> Signaler</i>
						</a>
					</em>
			</div>
		<?php
		}
		$comments->closeCursor();
		?>

			
		
		<p><a class="news" href="index.php#episodes"><i class="fas fa-arrow-left">
		Retour à la liste des Chapitres</i></a></p>
		
		<?php include_once 'views/include/footer.php' ?>			       
		<script src = "public/js/script.js"></script>
	</body>
</html>