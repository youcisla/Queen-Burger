/////////////////////////////////////////////////////////////////////////////////////////////

function headerBuildHome(){
    // variable definitions
    const element = document.querySelector("#header");
    const header = document.querySelector('header');
    
    // save the original inner HTML content of the header
    const originalContent = header.innerHTML;
    header.innerHTML = ''; // hide the content
      
    // functions and EventListeners
    element.addEventListener('click', e => {
      if (element.classList.contains("header_click")) {
        // header is currently open, so close it
        element.classList.add("header_return");
        element.classList.remove("header_click");
        header.classList.remove('header_bg');
          header.innerHTML = ''; // hide the content after the transition ends
      } else {
        // header is currently closed, so open it
        element.classList.add("header_click");
        header.classList.add('header_bg');
        header.innerHTML = originalContent; // show the content
      }
    });
  }
  
  headerBuildHome();
  
  
function openPopup() {
    window.open('/Queen-Burger/HTML/creationAbsence.php', 'popupWindow', 'width=400,height=300');
}

function goToReservation() {
    window.location.href = "/Queen-Burger/HTML/base.php";
}

function goToServers() {
  window.location.href = "/Queen-Burger/HTML/gerant.php";
}

function goToSignUp() {
    window.location.href = "/Queen-Burger/HTML/inscription.php";
}

function goToSignIn() {
    window.location.href = "/Queen-Burger/HTML/connexion.php";
}

function goToHome() {
    window.location.href = "/Queen-Burger/HTML/base.php";
}

function goToCalendar() {
    window.location.href = "/Queen-Burger/HTML/calendar.php";
}

function goToMenu() {
  window.location.href = "/Queen-Burger/HTML/base.php";
}

function goToLogOut() {
  window.location.href = "/Queen-Burger/HTML/logout.php";
}
/////////////////////////////////////////////////////////////////////////////////////////////
//test for header
function test(){
    var body = document.body,html = document.documentElement;
    console.log( body.scrollHeight)
    console.log(body.offsetHeight)
    console.log(body.clientHeight)
    
    console.log(html.scrollHeight)
    console.log(html.offsetHeight)
    console.log(html.clientHeight)
}
test();