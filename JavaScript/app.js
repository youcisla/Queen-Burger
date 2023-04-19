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
