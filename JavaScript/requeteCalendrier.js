
/***
 * ajoute un nouveau creneau, et retourne son id
 * @param {date} date date format yyyy-mm-dd
 * @param {heure} heuredebut heure format hh:mm:ss
 * @param {heure} heurefin heure format hh:mm:ss
 * @param {number} id_secteur id du secteur ou est assigné le serveur
 * @param {number} id_serveur id du serveur
 * @return {number} id du creneau cree
 */
function ajouterCreneau(date, heuredebut, heurefin, id_secteur, id_serveur) {
    axios.post('../PHP/sauvegardeCreneau.php', {
        id_serveur: id_serveur,
        date: date,
        heuredebut: heuredebut,
        heurefin: heurefin,
        id_secteur: id_secteur
      })
      .then(function (response) {
        data = response.data;
        console.log(data);
        console.log(data["raison"]);
        return data["id"];
      })
      .catch(function (error) {

        console.log(error);
        return -1;
      });
}