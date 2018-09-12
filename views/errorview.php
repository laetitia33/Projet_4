<?php $title = 'erreur!'; ?>
<!DOCTYPE html>
<html lang="fr">
	<?php include_once'views/include/head.php'?>
	<body>		
		<img src="public/image/photo3.jpg" alt="photo Alaska"id="pageArticle" />
		<p style="font-size:35px;text-align:center ;margin-top:5%;margin-bottom:5%;"><i class="fas fa-exclamation-triangle fa-x4" style="color:red;"></i>
		<?= htmlspecialchars($errorMessage) ?></p>
		
		<p style="margin-left:25px; font-size:1.5em;"><a href=javascript:history.go(-1)><i class="fas fa-arrow-left"> Retour</i></a></p>				
		<?php include_once 'views/include/footer.php' ?>			       
		<script src = "public/js/script.js"></script>
		<script src ="public/js/tinymce/fr.js"></script>
		<script src ="public/js/placeholder.js"></script>
		<script src ="public/js/placeholder.min.js"></script>
		
	</body>
</html>