
function verificaLogare() {

  fetch('verificare_logare.php')
    .then(response => response.json())
    .then(data => {
      if (data.logged_in) {
        // Utilizatorul este logat, ma va redirectiona catre pagina de delogare
        window.location.href = 'delogare.html';
      } else {
        // Utilizatorul nu este logat, ma va redirectiona catre pagina de logare
        window.location.href = 'login.php';
      }
    })
    .catch(error => {
      console.error('A aparut o eroare:', error);
    });
}


function oops(){  // in caz ca nu sunt pe un server local,ma va redirectiona catre o pagina de eroare
    var currentURL = window.location.href;
    
    
    if (currentURL !== 'http://localhost/SiteBratuCosmin/index.html' ) {
      window.location.href = 'oops.html';
    } 
    
      }
    



     
   
var navLinks= document.getElementById("navLinks");
function arataMeniul()
        {navLinks.style.right = "0" ;
    
        }
function ascundeMeniul()
        {navLinks.style.right = "-200px"; 
    
        }
        
   
    

  

window.addEventListener('scroll', reveal);

function reveal() {
  var reveals = document.querySelectorAll('.reveal');

  for (var i = 0; i < reveals.length; i++) { 
    var windowheight = window.innerHeight;
    var revealtop = reveals[i].getBoundingClientRect().top; 
    var revealpoint = 150;

    if (revealtop < windowheight - revealpoint) {
      reveals[i].classList.add('active');
    } else {
      reveals[i].classList.remove('active');
    }
  }
}
 

//functia salveazaDate() salveaza datele introduse in formularul din pagina "vreausamaantrenez.html" intr-un fisier de tip .txt
function salveazaDate() { 
    // Obtine datele din formular
    const nume = document.getElementById('nume').value;
    const prenume = document.getElementById('prenume').value;
    const email = document.getElementById('email').value;
    const greutate = document.getElementById('greutate').value;
    const inaltime = document.getElementById('inaltime').value;
    const scop = document.getElementById('scop').value;

    // Formatul datelor
    const data = `Nume: ${nume}\nPrenume: ${prenume}\nEmail: ${email}\nGreutate: ${greutate} kg\nÎnălțime: ${inaltime} cm\nScop: ${scop}`;

    // Creaza un obiect de tip "Blob" cu datele formatate
    const blob = new Blob([data], { type: 'text/plain' });

    // Creaza un element de ancora pt a descarca fisierul
    const anchor = document.createElement('a');
    anchor.download = 'informatii_utilizator.txt';
    anchor.href = URL.createObjectURL(blob);
    anchor.click();
}
   
 


