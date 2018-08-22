<header>
	<a id ="top" class="top"></a>
	<div class ="welcome">
		
		<div class="snow">
			<div class="snow__layer">
				<div class="snow__fall">
				</div>
			</div>
			<div class="snow__layer">
				<div class="snow__fall">
				</div>
			</div>
			<div class="snow__layer">
				<div class="snow__fall"></div>
				<div class="snow__fall"></div>
				<div class="snow__fall"></div>
			</div>
			<div class="snow__layer">
				<div class="snow__fall"></div>
			</div>
			<div id="alaska">
				<?php
				if(isset($_SESSION['pseudo'])) { ?>
					<h1 id="elementitle">Bienvenue Jean  </h1>
	 			<?php
            	}
           		else { ?>
					<h1 id="elementitle">Un billet simple pour l Alaska de Jean Forteroche</h1>

				<?php
	            }
	            ?>

				<a href="#navigation" id = "input1">Entrez</a>
					
				<?php include_once 'views/include/menuResponsive.php'?>
			</div>
		</div>		
	</div>
</header>