/////////////////////////////////////////////////////////////////////////////////////////////

function headerBuildHome(){
    // variable difinitions
    const element = document.querySelector("#header");

    // functions and EventListeners
    element.addEventListener('click',e =>{
        element.classList.toggle("header_click");
    });
    }

headerBuildHome()


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
/////////////////////////////////////////////////////////////////////////////////////////////
var nombreTables = 0;

function ajouterTable() {
  nombreTables++;
  var tableHtml = '<div class="table">Table ' + nombreTables + '</div>';
  document.getElementById("tables-container").insertAdjacentHTML('beforeend', tableHtml);
  document.getElementById("total-tables").textContent = nombreTables;
}

function supprimerTable() {
  if (nombreTables > 0) {
    var lastTable = document.querySelector(".table:last-of-type");
    lastTable.parentNode.removeChild(lastTable);
    nombreTables--;
    document.getElementById("total-tables").textContent = nombreTables;
  }
}
