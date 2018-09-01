<?php $title = 'Contact Jean Forteroche';?>


<!DOCTYPE html>
<html>

	<?php include_once 'views/include/head.php';?>
	<body>
		<img id="pageArticle" src=" public/image/photo3.jpg" alt="photo Alaska"/>
		<p><a class="news" href="index.php#episodes"><i class="fas fa-arrow-left">
		Retour à l'accueil</i></a></p>
		<p class="succesMail" ></p>
		<form class="form" action="index.php?action=addMail" method="POST">

			<div>
				<label for="author"></label><br />
				<input type="text" placeholder="Entrez votre nom" class="inputbasic" name="nom" >
			</div>
			<div>
				<label for="mail"></label><br />
				<input type="text" placeholder="Entrez votre mail" class="inputbasic"  name="mail">
			</div>
			<div >
				<label for="tel"></label><br />
				<input  name="tel" id="tel" class="inputbasic"; placeholder="Entrez votre telephone">
			</div>
	
			<div >
				<label for="comment"></label><br />
				<textarea  name="comment" id="comment" class="inputbasic"; placeholder="Entrez votre message"></textarea>
			</div>
			
			<div>
				<input type="submit" value ="Envoyez votre message" />
			</div>
		</form>

		<?php include_once 'views/include/footer.php' ?>			       
		<script src = "public/js/script.js"></script>
		<script src ="public/js/tinymce/fr.js"></script>
		<script src ="public/js/pagination.js"></script>
		<script src ="public/js/placeholder.js"></script>
		<script src ="public/js/placeholder.min.js"></script>
	</body>
</html>

