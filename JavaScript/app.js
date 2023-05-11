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

// Load the JSON data

// create an AJAX request
var xhr = new XMLHttpRequest();
xhr.open('GET', '/Queen-Burger/json/test.json');

// set the response type to JSON
xhr.responseType = 'json';

// handle the response
xhr.onload = function() {
  if (xhr.status === 200) {
    // get the JSON data from the response
    var data = xhr.response;

    // loop through the objects in the data array and add the burger types to the #json-data-body div
    var jsonDataBody = document.querySelector('#json-data-body');
    for (var i = 0; i < data.length; i++) {
      var burgerType = data[i];
      var burgerDiv = document.createElement('div');
      burgerDiv.classList.add('json-data-item');
      var burgerName = document.createElement('h3');
      burgerName.textContent = burgerType.name;
      var burgerImage = document.createElement('img');
      burgerImage.src = burgerType.image;
      burgerImage.alt = burgerType.name + " image";
      burgerDiv.appendChild(burgerName);
      burgerDiv.appendChild(burgerImage);
      jsonDataBody.appendChild(burgerDiv);
    }
  } else {
    console.log('Error: ' + xhr.status);
  }
};

// send the request
xhr.send();