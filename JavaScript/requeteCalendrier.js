
/***
 * ajoute un nouveau creneau, et retourne son id 
 * !!!!! FONCTION ASYNCHRONE !!!!!!
 * @param {date} date date format yyyy-mm-dd
 * @param {heure} heuredebut heure format hh:mm:ss
 * @param {heure} heurefin heure format hh:mm:ss
 * @param {number} id_secteur id du secteur ou est assigné le serveur
 * @param {number} id_serveur id du serveur
 * @return {data} {id, raison, valide} || null si erreur
 */
async function ajouterCreneau(date, heuredebut, heurefin, id_secteur, id_serveur) {
    let data = null;
    await axios.post('../PHP/sauvegardeCreneau.php', {
          id_serveur: id_serveur,
          date: date,
          heuredebut: heuredebut,
          heurefin: heurefin,
          id_secteur: id_secteur
        })
        .then(async function (response) {
          data = response.data;
        })
        .catch(function (error) {
          console.log(error);
        });
    
    return data;
}