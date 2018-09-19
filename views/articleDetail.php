<?php $title = 'Chapitre ' . htmlspecialchars($post['id']) . ''; ?>

<!--/////////////////////// head et header /////////////////////////////-->
<!DOCTYPE html>
<html lang="fr">
	<?php include_once 'views/include/head.php';?>
	<body>
		<img id="pageArticle" src="public/image/photo2.jpg" alt="photo Alaska"/>
		
		<?php
		
		if($commentReport===true) { ?>
			
			 <div id="message">Ce commentaire a bien été signalé et sera vérifié par l'administrateur</div>

		<?php
            }?>




<!--//////////////lien retour page précédente selon si visiteur ou admin//////////////////-->		
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
		<div>

<!---///////affichage de l'auteur , de modification ou suppression de l'article  admin////-->				
			<?php
			if(isset($_SESSION['pseudo'])) { ?>
				<i class="far fa-calendar-alt"></i> Le <?= htmlspecialchars($post['date_creation_fr'])?>
				</p>
				<a href="index.php?action=adminUpdatePost&amp;post_id=<?= $post['id']; ?>#modif"><em><i class="fas fa-pen-square"> Modifier le chapitre </i></em></a><br><br>
               	<a href="index.php?action=deletePost&amp;post_id=<?= $post['id']; ?>" OnClick="return confirm('Voulez-vous vraiment supprimer le chapitre ?');"><em><i class="fas fa-trash-alt"> Supprimer le chapitre</i></em></a><br><br>
 			<?php
        	}
       		else { ?>
				<p>Article écrit par <a href="index.php#bio"><?= $post['author'] ?></a><br></p>
				<p><i class="far fa-calendar-alt"></i> Le <?= $post['date_creation_fr'] ?></p>
	
				  <?php
            }
            ?>
			<div class="news" >	
			<p><?= htmlspecialchars_decode(nl2br(html_entity_decode($post['content'])));?></p>	
			</div>	
		</div>

<!--/////////////////////////-écrire commentaires admin ou visiteur//////////////////////////-->

		<h3 style ="text-align:center;"><span id ="com"><i class="far fa-comments"></i>Commentaires</span></h3>
		  <form action="index.php?action=addComment&amp;post_id=<?= $_GET['post_id'];?>#ancrecom" method="POST">
			
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

			<div class="inputbasic">
				<label for="comment"></label><br />
				<textarea name="comment" id="comment"  placeholder="Entrez votre commentaire"></textarea>
			</div>
			
			<div>
				<input type="submit" value="Envoyez votre commentaire" />
			</div>
		 </form>
	
<!--///////////////////////// boucle affichage commentaire admin ou visiteur ///////////-->

<?php while ($comment = $comments->fetch())
		{ ;?>
			<div id="ancrecom"></div>
			<div class = "commentaires">
				<p><strong><i class="fas fa-user"></i>   <?= htmlspecialchars($comment['author']) ?></strong> le <?= htmlspecialchars($comment['comment_date_fr']) ?>
				</p>

				<div class="coms"> 

					<span id="confirmsignal"><p><?= htmlspecialchars_decode(nl2br(substr(html_entity_decode($comment['comment']), 0, 300)));?></p></span>				
		    	</div>
			<?php
			if(isset($_SESSION['pseudo'])) { ?>
				<div class="reponse">     	
		     		<em><a href="index.php?action=deleteOneComment&amp;post_id=<?= $post['id'];?>&amp;id=<?= $comment['id']; ?>#ancrecom" OnClick="return confirm('Voulez-vous vraiment supprimer ce commentaire ?');"><i class="fas fa-minus-circle"> Supprimer </i></a></em>
		     	</div>
			<?php
        	}
       		else { ?>
						
	       				<div class="reponse">				
	       				<em><a id='validcom' href="index.php?action=report&amp;post_id=<?= $post['id']; ?>&amp;id=<?= $comment['id']; ?>" OnClick="return confirm('Souhaitez-vous signaler ce commentaire ?')";"><i class="fas fa-bell">  Signalez un abus</i></a></em> 
	       			
     		  
	       			</div>
	       				
		    <?php
            }
            ?>
			</div>
		
		<?php
		}
		$comments->closeCursor();?>
	
 
	
		
<!--/////////////////////lien retour page précédente selon si visiteur ou admin///////////////////-->	

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
		<script src ="public/js/placeholder.js"></script>
		<script src ="public/js/placeholder.min.js"></script>
	</body>
</html>