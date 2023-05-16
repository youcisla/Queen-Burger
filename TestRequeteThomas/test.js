const debut = document.getElementById("debut");
const fin = document.getElementById("fin");
const serveur = document.getElementById("serveur");
const date = document.getElementById("date");
const secteur = document.getElementById("secteur");
const button = document.getElementById("button");


button.addEventListener("click", async () => {
    console.log(await ajouterCreneau(date.value, debut.value + ":00", fin.value + ":00", secteur.value, serveur.value));
});