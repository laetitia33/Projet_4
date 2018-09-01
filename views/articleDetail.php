<?php $title = 'Chapitre ' . htmlspecialchars($post['id']) . ''; ?>

<!-------------------------------------head et header------------------------------>
<!DOCTYPE html>
<html>
	<?php include_once 'views/include/head.php';?>
	<body>
		<img id="pageArticle" src="public/image/photo13.jpg" alt="photo Alaska"/>
		
		<?php
		
		if($commentReport===true) { ?>
			
			 <div id="message">Vous avez bien signalé ce commentaire</div>
		<?php
            }?>




<!------------------lien retour page précédente selon si visiteur ou admin----------------------->		
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

<!---affichage de l'auteur , de modification ou suppression de l'article  admin---->				
			<?php
			if(isset($_SESSION['pseudo'])) { ?>
				<i class="far fa-calendar-alt"></i> Le <?= $post['date_creation_fr'] ?>
				</p>
				<a href="index.php?action=adminUpdatePost&amp;post_id=<?= $post['id']; ?>#modif"><em><i class="fas fa-pen-square"> Modifier le chapitre </i></em></a><br><br>
               	<a href="index.php?action=deletePost&amp;post_id=<?= $post['id']; ?>" OnClick="return confirm('Voulez-vous vraiment supprimer le chapitre ?');"><em><i class="fas fa-trash-alt"> Supprimer le chapitre</i></em></a><br><br>
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

<!-----------------------------écrire commentaires admin ou visiteur--------------------------------------->

		<span id ="com"><h3><i class="far fa-comments"></i>Commentaires</h3></span>
		  <form action="index.php?action=addComment&amp;post_id=<?= $_GET['post_id'];?>#commentaires" method="POST">
			
		<div>
            <label for="author" ></label>
        <?php
     	if(isset($_SESSION['pseudo'])) { ?>
            <input type="text" name="author" class="inputbasic" id="author" value="<?php echo htmlspecialchars($_SESSION['pseudo'])?>"/>
		<?php
        	}
       		else { ?>
       		<input type="text" name="author" class="inputbasic" id="author" placeholder="Indiquez votre nom" />
       	 <?php
            }
            ?>
                
        </div>

			<div >
				<label for="comment"></label><br />
				<textarea  name="comment" id="comment" class="inputbasic"; placeholder="Entrez votre commentaire"></textarea>
			</div>
			
			<div>
				<input type="submit" value="Envoyez votre commentaire" />
			</div>
		 </form>
	
<!---------------------------------boucle affichage commentaire admin ou visiteur-------------------------------------->

		<?php
		while ($comment = $comments->fetch())
		{ ;?>
			
			<div class = "commentaires">
				<p><strong><i class="fas fa-user"></i>   <?= htmlspecialchars($comment['author']) ?></strong> le <?= htmlspecialchars($comment['comment_date_fr']) ?>
				</p>

				<div class="user" id="commentaires">
					<span id="confirmsignal"><p><?= nl2br(htmlspecialchars(substr($comment['comment'],0,400))) ?></p></span>				
		    	</div>
			<?php
			if(isset($_SESSION['pseudo'])) { ?>
				<div class="reponse">
					<input type="submit" value="Repondre" />		     	
		     		<em><a href="index.php?action=deleteComment&amp;post_id=<?= $comment['id'];?>&amp;id=<?= $comment['id'];?>#deleteCom" OnClick="return confirm('Voulez-vous vraiment supprimer le commentaire et revenir à la liste des commentaires ?');"><i class="fas fa-minus-circle"> Supprimer </i></a></em>
		     	</div>
			<?php
        	}
       		else { ?>
	       		
	       			<div class="reponse">
						<input type="submit" value="Repondre" />			     
		       			<em><a id="validcom" href="index.php?action=report&amp;post_id=<?= $post['id']; ?>&amp;id=<?= $comment['id']; ?>" OnClick="return confirm('Voulez-vous vraiment signaler ce commentaire ?');"><i class="fas fa-bell">  Signalez un abus</i></a></em>			
       				</div>
		    <?php
            }
            ?>
			</div>
		<?php
		}
		$comments->closeCursor();

		?>
 
		      <?php if($commentReport== 1) { ?>
		       	<i class="fas fa-ban"> Commentaire signalé</i>

					<?php
        			}
       				?>			
						
<!------------------lien retour page précédente selon si visiteur ou admin--------------------------->	

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
		<script src ="public/js/pagination.js"></script>
		<script src ="public/js/placeholder.js"></script>
		<script src ="public/js/placeholder.min.js"></script>
	</body>
</html>