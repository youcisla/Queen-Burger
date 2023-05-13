const inputDebut = document.getElementById("debutDate");
const inputFin = document.getElementById("finDate");

const buttonValidation = document.getElementById("validation");


function testDebutAvantFin(debut, fin) {
    return (new Date(debut)) <= (new Date(fin))
}


inputDebut.addEventListener("input", () => {
    inputFin.min = inputDebut.value;
    
    //la date de fin est valide
    if(!testDebutAvantFin(inputDebut.value, inputFin.value)) {
        inputFin.value = inputDebut.value;   
    }

});


buttonValidation.addEventListener("click", () => {
    console.log("cest bon");
    //ajouter requette pour ajout a la base de donnée + envoie mail
})

