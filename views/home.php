
<!DOCTYPE html>
<html lang="fr">
	<?php include_once 'views/include/head.php';?>
	<body>
		<div id="blocpage">
			
			<?php include_once 'views/include/header.php';?>
			<?php include_once 'views/include/menu.php'; ?>
			<?php include_once 'views/include/menuResponsive.php'; ?>
			<?=$header?>
						
			<?= $content ?>
			<span id="btntop">
				<a href="#top"><i class="fas fa-arrow-alt-circle-up fa-4x"></i></a>
			</span>
			<?php include_once 'views/include/footer.php' ?>			
		
		</div>	
	<script src = "public/js/script.js"></script>
	<script src ="public/js/pagination.js"></script>
	<script src ="public/js/placeholder.js"></script>
	<script src ="public/js/placeholder.min.js"></script>
	</body>
</html>