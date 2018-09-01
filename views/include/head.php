	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="public/css/style.css">
		<meta name="description" content="En un simple clique . Venez découvrir les aventures du dernier roman de Jean Forteroche. Billet simple pour l'Alaska!">
		<meta name="viewport" content="width=device-width initial-scale=1">
		<link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
		<meta property="og:url" content="https://forteroche.000webhostapp.com/"/>
		<meta property="og:title" content="Jean Forteroche, acteur et écrivain."/>
		<meta property="og:type" content="website">
		<meta property="og:image" content="public/images/logo.png">
		<meta name="Language" CONTENT="fr" />
		<link rel="icon" href="public/image/plane.ico" type="image/x-icon">
		<link href="https://fonts.googleapis.com/css?family=Tangerine" rel="stylesheet">
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>

		<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=h6ble8677pog4pffjmzlwtaf0l6xs0i472c1aw6acasvxtuy"></script>
  		<script >
  			tinymce.init({ 
  				selector:'tinymce',
  				invalid_elements :'ul,ol,li,strong,bold,b,em,br,span,div,p,img,a,table,td,th,tr,header,font,body,h,h1,h2,h3,h4,h5',
    			invalid_styles: 'color font-size text-decoration font-weight',
    			entities : '160,nbsp,&nbsp,162,cent,8364,euro,163,pound',
    			language_url: 'public/js/tinymce/fr.js',
    			language: 'fr_FR',
    			plugins: 'placeholder, advlist autolink link image lists charmap print preview,advlist autolink lists link image charmap print preview anchor textcolor,searchreplace visualblocks code fullscreen,insertdatetime media table contextmenu paste code help wordcount',
    			forced_root_block : '',
    			cleanup: false,
    			force_br_newlines : true,
    			force_p_newlines : false,
    			branding: false,browser_spellcheck: true, 
    			entity_encoding: 'raw',
    			menubar: false,
    			style_formats: [ { title: 'Bold text', inline: 'strong' }],
    			toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat',
    			
			}); 

  		</script>
		<title><?= isset($title) ? $title : 'Un billet pour l\'Alaska ';?></title>
	</head>
	