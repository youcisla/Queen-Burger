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