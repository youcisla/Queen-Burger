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
    
  

function goToReservation() {
    window.location.href = "/Queen-Burger/HTML/base.php";
}

function goToMenu() {
    window.location.href = "/Queen-Burger/HTML/base.php";
}

function goToHome() {
    window.location.href = "/Queen-Burger/HTML/base.php";
}

function goToAbout() {
    window.location.href = "/Queen-Burger/HTML/base.php";
}

function goToContact() {
    window.location.href = "/Queen-Burger/HTML/base.php";
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