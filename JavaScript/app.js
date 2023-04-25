/////////////////////////////////////////////////////////////////////////////////////////////

function test(){
    var observer = new IntersectionObserver(
        function(entries) {
            const element = document.querySelector(".floating_header");

            if(entries[0].isIntersecting === true){
                console.log('Element has just become visible in screen');
                element.classList.remove("floating_header_after_width");
                element.classList.remove("floating_header_after");
                element.removeEventListener('click',e =>{
                    element.classList.toggle("floating_header_after_width");
                });
            }else{
                element.classList.add("floating_header_after_width");
                element.classList.add("floating_header_after");
                // functions and EventListeners
                element.addEventListener('click',e =>{
                    element.classList.toggle("floating_header_after_width");
                });
            }
        },
        { threshold: [0] } // value 0 ~ 1
    );
    
    observer.observe(document.querySelector("#header"));
}
test();
/////////////////////////////////////////////////////////////////////////////////////////////
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
/////////////////////////////////////////////////////////////////////////////////////////////
var nombreTables = 0;

function ajouterTable() {
  nombreTables++;
  var tableHtml = '<div class="table">Table ' + nombreTables + '</div>';
  document.getElementById("tables-container").insertAdjacentHTML('beforeend', tableHtml);
  document.getElementById("total-tables").textContent = nombreTables;
  function supprimerTable() {
    if (nombreTables > 0) {
      var lastTable = document.querySelector(".table:last-of-type");
      lastTable.parentNode.removeChild(lastTable);
      nombreTables--;
      document.getElementById("total-tables").textContent = nombreTables;
    }
}
}