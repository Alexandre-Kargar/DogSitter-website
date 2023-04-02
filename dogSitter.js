
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


//Programme pour lire le ficheir json avec la liste des villes et aficher les suggestions selon lest lettres tapées
/*
const listEl = document.getElementById("ListeVilles");

fetch('./villes.json')
    .then(res => res.json());
    .then(villes => {
      villes.forEach(post => {
          listEl.insertAdjacentHTML('beforeend', <option>${post.ville}</option>);
        
      });
    });*/

    function loadJsonFile(){
    var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
       // Typical action to be performed when the document is ready:
       var rep = JSON.parse(xhttp.responseText);
        //console.log(rep.villes);
        var villes = rep.villes;
        var output = '';

       for (var i = 0; i < villes.length; i++){

        output += '<option>' + villes[i].ville+'</option>';

        /*
          output = villes[i].ville;
          //console.log(output);
          
          var myList = document.getElementById("ListeVilles");
          var option =  document.createElement("option");
          option.text = output;
          myList.add(option);*/

       }
       document.getElementById("ListeVilles").innerHTML = output;
    }
};
xhttp.open("GET", "villes.json", true);
xhttp.send();
}


