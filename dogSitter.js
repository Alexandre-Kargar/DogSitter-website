
//Fonction pour afficher un message d'alert sur l'écran en cas de clique sur recherche
function errorMessage() {
    alert("Le site DogSitter n'est pas encore active. Merci de votre compréhension!");
  }



//Programme et fonction qui affiche le popup sur la page d'accueil
const toggleButton = document.getElementsByClassName('toggle-button')[0]
const navbarLinks = document.getElementsByClassName('navbar-links')[0]

toggleButton.addEventListener('click', () => {
  navbarLinks.classList.toggle('active')
})

window.addEventListener("load", function(){
  let popup = this.document.getElementById("popup");
  setTimeout( 
    function openPopup(){
    popup.classList.add("open-popup");
    ;
  }, 5000
  )
});



//Fonction qui ferme le popup sur la page d'accueil
function closePopup(){
  let popup = this.document.getElementById("popup");

  popup.classList.remove("open-popup");
}


//Programme pour lire le ficheir xml avec la liste des villes et aficher les suggestions selon lest lettres tapées
/*var VilleResultat = [];
$(document).on('keyup', '#villeSearch', function(){
  var keyvalue = $("#villeSearch").val();

  var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200){
      VilleResultat = [];
      afficheVilles(this, keyvalue);
    }
  };
  xhttp.open("GET", "villes.xml", true);
  xhttp.send();      
});

function afficheVilles (xml, key) {
  var x, i, xmlDoc, key;
  xmlDoc = xml.responseXML;
  x = xmlDoc.getElementsByTagName("ville");
  var compteur = 0;
  for (i = 0; i < x.length; i++){
      var value = x[i].childNodes[0].nodeValue.trim();
      var pattern = value.substring(0 , key.length);
        if (key.toUpperCase() == pattern.toUpperCase() && compteur < 10){
          VilleResultat.push(value);
          compteur++;
        }
  }
  $("#villeSearch").autocomplete({
    source: VilleResultat
  });
}

$( function(){
  $("#villeSearch").autocomplete({
    source: VilleResultat
});
});*/

var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
       // Typical action to be performed when the document is ready:
       //document.getElementById("demo").innerHTML = xhttp.responseText;
       console.log(xhttp.responseText);
    }
};
xhttp.open("GET", "villes.json", true);
xhttp.send();