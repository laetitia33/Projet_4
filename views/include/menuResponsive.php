
<?php $title= "Administration" ;

if(isset($_SESSION['id']))

	{
   ?>
<div id="show_menu"><i class="fas fa-list-ul fa-4x"></i></div>

<div id="mainmobil">
	<a href="#ferme" title="fermer" id="closemenu"><i class="fas fa-times"></i></a>
	<ul id="mobil_navigation">
		 <li><a class="adminbtn "href="index.php?action=administration#adminView"></i>Tableau de bord</a></li>
		<li><a class="creation" href="index.php?action=listPosts#episodes">Tous les chapitres</a></li>
		<li><a class="creation" href="index.php?action=adminNewPost">Créer un chapitre</a></li>
		<li><a  href="index.php?action=adminListComments#com">Tous les Commentaires</a></li>
		<li><a href="index.php?action=logout">Déconnexion</a></li>

	</ul>
</div>

<?php


}
else
{
    ?>
 
<div id="show_menu"><i class="fas fa-list-ul fa-4x"></i></div>
<div id="mainmobil">
	<a href="#ferme" title="fermer" id="closemenu"><i class="fas fa-times"></i></a>
    <ul id="mobil_navigation">       
		<li><a class="contact" href="index.php?action=email"><i class="far fa-envelope"></i>  Contactez-moi</a></li>
        <li><a  href="#episodes">Chapitres</a></li>    	
        </li>
    </ul>
</div>
    
<?php
}
