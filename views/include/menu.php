<?php

if(isset($_SESSION['pseudo']))
{
    ?>

<nav>
	
	<ul id="navigation">

		<li><a class="btn" href="index.php?action=administration#adminView">Tableau de bord</a></li>
		<li><a class="btn" href="index.php?action=listPosts#episodes">Tous les chapitres</a></li>
		<li><a class="btn" href="index.php?action=adminNewPost#create">Créer un chapitre</a><li>
		<li><a class="btn" href="index.php?action=adminListComments#com">Tous les Commentaires</a></li>
		<li><a class ="btn" href="index.php?action=logout">Déconnexion</a></li>
	</ul>
</nav>

<?php
}

else
{
    ?>


<nav>
	
	<ul id="navigation">
		<li><a class="btn" href="#episodes">Chapitres</a></li>
		<li><a class="btn" href="index.php?action=email"><i class="far fa-envelope"></i>  Contactez-moi</a></li>
	</ul>
</nav>




<?php
}
