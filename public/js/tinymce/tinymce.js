	
//pour chapitres à rediger

    	tinymce.init({ 
  				selector:'textarea',
  				//invalid_elements :'ul,ol,li,br,strong,bold,em,span,div,p,img,a,table,td,th,tr,header,font,body,h,h1,h2,h3,h4,h5',
    			//invalid_styles: 'color font-size text-decoration font-weight',
    			//entities : '160,nbsp,&nbsp,162,cent,8364,euro,163,pound',
    			language_url: 'public/js/tinymce/fr.js',
    			language: 'fr_FR',
    			plugins: 'placeholder, advlist autolink link image lists charmap print preview,advlist autolink lists link image charmap print preview anchor textcolor,searchreplace visualblocks code fullscreen,insertdatetime media  contextmenu paste code help wordcount ,emoticons',
    			forced_root_block : '',
    			//cleanup: false,
    			force_br_newlines : true,
    			force_p_newlines : false,
    			branding: false,
    			browser_spellcheck: true, 
    			//entity_encoding: 'raw',
  				image_advtab: true,
    			menubar: false,
    			height : 300,
    			toolbar: 'emoticons| insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat ',
    			
    			
			}); 



//pour commentaires
  				tinymce.init({ 
  				selector:'com',
  				//invalid_elements :'ul,ol,li,br,strong,bold,em,span,div,p,img,a,table,td,th,tr,header,font,body,h,h1,h2,h3,h4,h5',
    			//invalid_styles: 'color font-size text-decoration font-weight',
    			//entities : '160,nbsp,&nbsp,162,cent,8364,euro,163,pound',
    			language_url: 'public/js/tinymce/fr.js',
    			language: 'fr_FR',
    			plugins: 'placeholder, advlist autolink link image lists charmap print preview,advlist autolink lists link image charmap print preview anchor textcolor,searchreplace visualblocks code fullscreen,insertdatetime media  contextmenu paste code help wordcount ,emoticons',
    			forced_root_block : '',
    			//cleanup: false,
    			force_br_newlines : true,
    			force_p_newlines : false,
    			branding: false,
    			browser_spellcheck: true, 
    			//entity_encoding: 'raw',
  				image_advtab: true,
    			menubar: true,
    			height : 300,
    			toolbar: "emoticons"
    			
			}); 
