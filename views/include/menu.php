<?php

if(isset($_SESSION['id']))
{
    ?>


<nav>
	
	<ul id="navigation">

		 <li><a class="portfolio" href="index.php?action=administration"></i> Tableau de bord</a></li>
		<li><a class="portfolio" href="#episodes">Chapitres</a></li>
		<li><a class="portfolio" href="index.php?action=adminNewPost"><i class="fas fa-pencil-alt">Créer un chapitre</a><li>
		<li> <a class="portfolio" href="#">Commentaires</a></li>
		<li><a class="portfolio" href="index.php?action=adminListComments">Tous les Commentaires</a></li>
		<li><a "index.php?action=logout">Déconnexion</a></li>
	</ul>
</nav>

<?php
}

else
{
    ?>


<nav>
	
	<ul id="navigation">
		<li><a class="home" href="index.php?home"><i class="fas fa-home"></i> Accueil</a></li>
		<li><a class="portfolio" href="#episodes">Chapitres</a></li>
		<li><a class="contact" href="index.php?action=email"><i class="far fa-envelope"></i>  Contactez-moi</a></li>
	</ul>
</nav>




<?php
}
