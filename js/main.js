$(document).ready(function(){
  $('.carousel').carousel({
    pause: false
  })

// de onclick event om van de hoofdpagina naar de BBQ pagina te gaan. deze button staat in de 2de row waar de introductie van het verhuren staat.
  $("#hoofdpagina").on("click", ".BBQBtn", function(){
		window.location.href = 'BBQ.php';
	});

// de onclick event om de reserverings lijst te kunnen zien.
  $("#reserveringsBtn").on("click", ".reserveringLijstBtn", function(){
    document.getElementById("reserveringsLijst").style.display = "block";
    document.getElementById("vragenLijst").style.display = "none";
  });


// de onclick event om de vragen lijst te kunnen zien.
  $("#reserveringsBtn").on("click", ".vragenLijstBtn", function(){
    document.getElementById("reserveringsLijst").style.display = "none";
    document.getElementById("vragenLijst").style.display = "block";
  });
});


// hier worden de meerdere fotosliders op de BBQ pagina aangedreven.

var slideIndex = [1,1,1,1,1,1,1,1,1];
/* Class the members of each slideshow group with different CSS classes */
var slideId = ["mySlides1", "mySlides2", "mySlides3", "mySlides4", "mySlides5", "mySlides6", "mySlides7", "mySlides8", "mySlides9"]
showSlides(1, 0);
showSlides(1, 1);
showSlides(1, 2);
showSlides(1, 3);
showSlides(1, 4);
showSlides(1, 5);
showSlides(1, 6);
showSlides(1, 7);
showSlides(1, 8);

function plusSlides(n, no) {
  showSlides(slideIndex[no] += n, no);
}

function showSlides(n, no) {
  var i;
  var x = document.getElementsByClassName(slideId[no]);
  if (n > x.length) {slideIndex[no] = 1}
  if (n < 1) {slideIndex[no] = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  x[slideIndex[no]-1].style.display = "block";
}
