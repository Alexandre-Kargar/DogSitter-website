
function errorMessage() {
    alert("Le site DogSitter n'est pas encore active. Merci de votre compréhension!");
  }



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



function closePopup(){
  let popup = this.document.getElementById("popup");

  popup.classList.remove("open-popup");
}