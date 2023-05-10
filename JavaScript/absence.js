const inputDebut = document.getElementById("debutDate");
const inputFin = document.getElementById("finDate");

const buttonValidation = document.getElementById("validation");

function StrDate(day, month, year) {
    strDay = day.toString();
    if(strDay.length == 1) {
        strDay = "0" + strDay;
    }

    strMonth = month.toString();
    if(strMonth.length == 1) {
        strMonth = "0" + strMonth;
    }


    strYear = year.toString();

    return strYear + "-" + strMonth + "-" + strDay;
}

function getDateLendemain(date) {
    objdate = new Date(date);
    objdate.setDate(objdate.getDate() + 1);

    var day = objdate.getDate();
    var month = objdate.getMonth() + 1;
    var year = objdate.getFullYear();

    return StrDate(day, month, year);
}

function testDebutAvantFin(debut, fin) {
    return (new Date(debut)) < (new Date(fin))
}


inputDebut.addEventListener("input", () => {
    inputFin.min = getDateLendemain(inputDebut.value);
    
    //la date de fin est valide
    if(!testDebutAvantFin(inputDebut.value, inputFin.value)) {
        inputFin.value = getDateLendemain(inputDebut.value);   
    }

});


buttonValidation.addEventListener("click", () => {
    console.log("cest bon");
    //ajouter requette pour ajout a la base de donnée + envoie mail
})

