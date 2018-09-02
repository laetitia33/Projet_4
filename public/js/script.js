
 // ecriture page d'accueil
$('h1').each(function(){
  $(this).html($(this).text().replace(/([^\x00-\x80]|\w)/g, "<span class='letter'>$&</span>"));
});

anime.timeline()
  .add({
    targets: 'h1 .letter',
    opacity: [0,1],
    easing: "easeInOutQuad",
    duration: 2250,
    delay: function(el, i) {
      return 150 * (i+1)
    }

  });  

//ouverture/fermeture des mentions légales
$( "#legal" ).click(function() {
  $( "#legalnotice" ).fadeIn( "slow", function() {
    // Animation complete
  });
});


$( "#closelegal" ).click(function() {
  $( "#legalnotice" ).fadeOut( "slow", function() {
    // Animation complete.
  });
});



//faire apparaitre et disparaitre le menu en responsive
  $(function() {
    $('#show_menu').click(function() {
      $('#mainmobil').first().show('slow', function showNextOne() {
        $(this).next('#mainmobil').show('slow', showNextOne);
      });    
    });
    $('#closemenu').click(function() {
      $('#mainmobil').first().hide('slow', function hideNextOne() {
        $(this).next('#mainmobil').hide('slow', hideNextOne);

      });
          
    });
  });

//remonter du bas vers le haut de la page
$(document).ready(function() {
     $('a[href=#top]').click(function(){
          $('html, body').animate({scrollTop:0}, 'slow');
          return false;
     });
});


//ancre vers l'acceuil
$(document).ready(function() {
     $('a[href=#navigation]').click(function(){
          $('html, body').animate({scrollTop:$("#navigation").offset().top}, 'slow');
          return false;
     });
});

//ancre du bouton chapitre vers la liste des chapitres dans la page
$(document).ready(function() {
 
     $('a[href=#episodes]').click(function(){
          $('html, body').animate({scrollTop:$("#episodes").offset().top}, 'slow');
          return false;
     });
});


//duree d'affichage des messages


  var alertElt = document.getElementById("message");
  
  setTimeout(function () {
            alertElt.style.display = 'none';
        }, 5000);






function sendAlert(num)
{
  var alertElt = document.getElementById("msg");
 
  var para = document.createElement('P');
  var msg;
  switch(num)
  {
    case 1 :
      msg = 'Message envoyé avec succès';
      break;
    case 2 :
      msg = 'Le billet a bien été supprimé';
      break;
    case 3 :
      msg = 'Votre commentaire a bien été ajouté';
      break;
    case 4 :
      msg = 'Le billet a bien été modifié';
    default :
      msg = 'Opération inconnue';
  }
  para.innerHTML = msg;
  
  alertElt.appendChild(para);

  setTimeout(function () {
            alertElt.style.display = 'none';
        }, 2000);
}

