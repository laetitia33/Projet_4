<?php $title = 'Chapitre ' . htmlspecialchars($post['id']) . ''; ?>


<!DOCTYPE html>
<html>
	<?php include_once 'views/include/head.php';?>
	<body>
		<img id="pageArticle" src="public/image/photo13.jpg" alt="photo Alaska"/>
		
		<p class ='comSignal'></p>

<!---lien retour page précédente selon si visiteur ou admin---->		
		<?php
			 if(isset($_SESSION['pseudo'])) { ?>
			<p><a class="news" href="index.php#episodes"><i class="fas fa-arrow-left">
			Retour à votre tableau de bord</i></a></p>
		 <?php
            }
           	else { ?>

			<p><a class="news" href="index.php#episodes"><i class="fas fa-arrow-left">
			Retour à la liste des Chapitres</i></a></p>
			  <?php
            }
            ?>
		<h2><?= htmlspecialchars($post['title']) ?></h2>
		<p>

<!---affichage de l'auteur selon si visiteur ou admin---->				
			<?php
			if(isset($_SESSION['pseudo'])) { ?>
				 <i class="far fa-calendar-alt"></i> Le <?= $post['date_creation_fr'] ?>
				</p>
 			<?php
        	}
       		else { ?>
				<p>Article écrit par <a href="index.php#bio"><?= $post['author'] ?></a><br>
				<p><i class="far fa-calendar-alt"></i> Le <?= $post['date_creation_fr'] ?></p>
	
				  <?php
            }
            ?>
			<div class="news" >			
				<?= nl2br(htmlspecialchars($post['content'])) ?>
			</div>	
		</p>

<!-----commentaires admin--->
<?php

if(isset($_SESSION['pseudo'])) { ?>
		<span id ="com"><h3><i class="far fa-comments"></i>Commentaires</h3></span>
		  <form action="index.php?action=addComment&amp;post_id=<?= $_GET['post_id'];?>#commentaires" method="POST">
			
			<div>
				<label for="comment"></label><br />
				<textarea class="inputbasic" id="comment" name="comment" ; placeholder="Entrez votre commentaire"></textarea>
			</div>
			
			<div>
				<input type="submit" value="Envoyez votre commentaire,Jean" />
			</div>
		 </form>
	
<!----boucle affichage commentaire --->
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


<?php
}
//commentaires visiteurs
else
{
    ?>

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
}
?>;
	
<!----boucle affichage commentaire --->	
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

<!---lien retour page précédente selon si visiteur ou admin---->	
		<?php
			 if(isset($_SESSION['pseudo'])) { ?>
			<p><a class="news" href="index.php#episodes"><i class="fas fa-arrow-left">
			Retour à votre tableau de bord</i></a></p>
		 <?php
            }
           	else { ?>

			<p><a class="news" href="index.php#episodes"><i class="fas fa-arrow-left">
			Retour à la liste des Chapitres</i></a></p>
			  <?php
            }
            ?>
		<?php include_once 'views/include/footer.php' ?>			       
		<script src = "public/js/script.js"></script>
	</body>
</html>