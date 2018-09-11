

<?php $title = 'Jean Forteroche - Billet simple pour l\'Alaska'; ?>



				<!-----------phrase d'accueil--------->

<?php ob_start(); ?>
<?php
		if(isset($_SESSION['pseudo'])) { ?>
			<p class = "publishDate">Bonjour Jean, <?php
			setlocale(LC_TIME, "fr_FR");
			echo "Nous sommes le ".strftime("%d %B %Y");?> , Vos lecteurs attendent la suite           		
			<p>
			<?php
		}
		else
		{ ?>

			<p class = "publishDate">Bonjour ,<?php
			setlocale(LC_TIME, "fr_FR");
			echo "Nous sommes le ".strftime("%d %B %Y");?> , bientot le prochain chapitre en ligne...patientez ;)          		
			<p>
			  <?php
         }
         ?>
<!--------------------------------------------biographie---------------------------------------------->

<div id="bio">	
	<img id="photobio" src="public/image/photobio.jpg" alt="photo jean Forteroche">
	<p>
		Jean Forteroche est un écrivain voyageur français, qui ne cesse de parcourir le monde tout en le racontant. Il est l'auteur de nombreux récits de voyage, mais aussi de recueils de nouvelles et d'essais.
		Jean Forteroche est géographe de formation. Après ses premiers voyages, il décide de partir en 1993 durant un an autour du monde, à bicyclette, avec son ami de lycée Alexandre Poussin. Les deux jeunes hommes viennent de finir leurs études et n'ont qu'un budget restreint, mais parcourent plusieurs continents et 25 000 kilomètres. Ils en tirent un livre paru en 1996, "On a roulé sur la terre", qui reçoit le prix de l'Institut national géographique. Ils repartent ensemble en 1997 pour traverser l'Himalaya à pied, durant cinq mois. Suivra la publication de "La Marche dans le ciel : 5 000 kilomètres à pied à travers l'Himalaya". En 1999, accompagné cette fois de la photographe Priscilla Telmon, Jean Forteroche parcourt à cheval les steppes d'Asie centrale et coécrit deux ouvrages avec cette dernière. De 2003 à 2004, il entreprend de suivre le périple d'évadés du goulag retracé dans le livre "À marche forcée" (1955) de Slawomir Rawicz. Il parcourt la Sibérie jusqu'à atteindre l'Inde et relate ce voyage dans "L'Axe du loup" (2004).
		En 2010, il décide de vivre en ermite durant six mois en Sibérie, au bord du lac Baïkal. Il publie un essai tiré des notes de son journal, "Dans les forêts de Sibérie", qui reçoit le prix Médicis en 2011. En plus de ses voyages et des récits qu'il en tire, Jean Forteroche est également l'auteur de nombreuses nouvelles : le recueil "Une vie à coucher dehors", publié chez Gallimard en 2009, a reçu le prix Goncourt. Son dernier recueil, "S'abandonner à vivre", est sorti en 2014 chez Gallimard.
	</p>
</div>


<?php $header = ob_get_clean(); ?>


<?php ob_start(); ?>


<!-------------------------------------------affichage de tous les articles------------------------------>
			<a id="episodes"></a><!--ancre du bouton de navigation chapitre à episodes en javascript-->
			<p class ='comSignal'></p>
			<div class="body_card">

				<h2>Liste des Chapitres</h2>


		<?php


				while ($data = $posts->fetch()){
				?>
				
				<div id="ep1">
					<span  class="punaise" ><img src="public/image/punaise.gif" alt="punaise"></span>
					<h2><?= htmlspecialchars($data['title']) ?></h2>
					<p><span class="publishing">Article écrit par <?= htmlspecialchars($data['author']) ?><br><i class="far fa-calendar-alt"> le <?= htmlspecialchars($data['date_creation_fr']) ?></i></span></p>
							<p><?= htmlspecialchars_decode(nl2br(substr(html_entity_decode($data['content']), 0, 500).'...'));?></p>


						<a  class="input_read" href="index.php?action=post&amp;post_id=<?= $data['id']; ?>#news">En lire plus</a>
						<div id="commentaires">

							<?php if ($data['nbCommentaires'] > 0) { ?>
							<p class ="nbcom"><?= htmlspecialchars($data['nbCommentaires'])?> commentaire(s) <i class="far fa-comment"></i></p>
							 <?php
				            }
				           	else { ?>
				           	<p class ="nbcom">Aucun commentaire</p>
				           	<?php
				            }
				            ?>
						<a href="index.php?action=post&amp;post_id=<?= $data['id']; ?>#com"><em><i class="fas fa-pencil-alt"> Ajouter un Commentaire</i></em></a><br>

					
													 	
					<?php if(isset($_SESSION['pseudo'])) { ?>
				
			
						 <a href="index.php?action=adminUpdatePost&amp;post_id=<?= $data['id']; ?>#modif"><em><i class="fas fa-pen-square"> Modifier le chapitre</i></em></a><br>
               			 <a href="index.php?action=deletePost&amp;post_id=<?= $data['id']; ?>#episodes" OnClick="return confirm('Voulez-vous vraiment supprimer le Chapitre?');"><em><i class="fas fa-trash-alt"> Supprimer le chapitre</i></em></a>
					
					<?php
		            }
		            ?>
					</div>
				</div>
				<?php
				}
				?>

			</div>

			<?php
	
			$posts->closeCursor();
			;?>
<!--------------------------pagination-----------------------------------------> 

<!----------------------------------------------------------------------------->	
<?php $content = ob_get_clean(); ?>
<!---------------------------------renvoi vers la template appelée home------------------------------>
<?php require('views/home.php'); ?>
