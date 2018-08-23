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
			<p><a class="news" href="index.php#adminView"><i class="fas fa-arrow-left">
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

		<span id ="com"><h3><i class="far fa-comments"></i>Commentaires</h3></span>
		  <form action="index.php?action=addComment&amp;post_id=<?= $_GET['post_id'];?>#commentaires" method="POST">
			
		<div>
            <label for="author" ></label>
     
            <input type="text" name="author" class="inputbasic" id="author"value="<?php
                if (isset($_SESSION['pseudo']))
                {
                    echo htmlspecialchars($_SESSION['pseudo']);
                }
                ?>"
                />
        </div>

			<div class="inputbasic" style="margin:auto;">
				<label for="comment"></label><br />
				<textarea  name="comment" id="comment" ; placeholder="Entrez votre commentaire"></textarea>
			</div>
			
			<div>
				<input type="submit" value="Envoyez votre commentaire" />
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
		     	<?php
					if(isset($_SESSION['pseudo'])) { ?>
						<em><a id="validcom" href="index.php?action=report&amp;post_id=<?= $post['id']; ?>&amp;id=<?= $comment['id']; ?>"><i class="fas fa-bell"> Signaler</i>
						</a>
						</em>
					  <em><a href="index.php?action=adminUpdateComment&amp;post_id=<?= $comment['post_id'];?>&amp;id=<?= $comment['id'];?>">Modifier <i class="fas fa-comment-dots"></i></a></em>
            			<em><a href="index.php?action=deleteComment&amp;post_id=<?= $comment['post_id'];?>&amp;id=<?= $comment['id'];?>">Supprimer <i class="fas fa-comment-slash"></i></a></em>
			<?php
            }
            ?>
			</div>
		<?php
		}
		$comments->closeCursor();
		?>

<!---lien retour page précédente selon si visiteur ou admin---->	
		<?php
			 if(isset($_SESSION['pseudo'])) { ?>
				<p><a class="news" href="index.php#adminView"><i class="fas fa-arrow-left">
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
		<script src ="public/js/tinymce/fr.js"></script>
	</body>
</html>