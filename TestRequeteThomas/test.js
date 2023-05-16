const debut = document.getElementById("debut");
const fin = document.getElementById("fin");
const serveur = document.getElementById("serveur");
const date = document.getElementById("date");
const secteur = document.getElementById("secteur");
const buttonadd = document.getElementById("buttonadd");


buttonadd.addEventListener("click", async () => {
    //console.log(await ajouterCreneau(date.value, debut.value + ":00", fin.value + ":00", secteur.value, serveur.value));
    console.log(await obtenirAbsencesDates(1, ["2023-05-17", "2023-05-18"]));
    console.log(await obtenirCreneauxDates(1, ["2023-05-17", "2023-05-18", "2023-06-02"]));
    supprimerCreneau(secteur.value);
});

