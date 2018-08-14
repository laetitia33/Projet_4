<?php

if(isset($_SESSION['id']))
{
    ?>


<nav>
	
	<ul id="navigation">

		 <li><a class="portfolio" href=""></i> Tableau de bord</a></li>
		<li><a class="portfolio" href="#">Chapitres</a></li>
		<li><a class="portfolio" href=""><i class="fas fa-pencil-alt">Créer un chapitre</a><li>
		<li> <a class="portfolio" href="#">Commentaires</a></li>
		<li><a class="portfolio" href="">Tous les Commentaires</a></li>
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
		<li><a class="home" href=""><i class="fas fa-home"></i> Accueil</a></li>
		<li><a class="portfolio" href="">Chapitres</a></li>
		<li><a class="contact" href=""><i class="far fa-envelope"></i>  Contactez-moi</a></li>
	</ul>
</nav>




<?php
}
