/***
 * ajoute un nouveau secteur, et retourne son id
 * FONCTION ASYNCHRONE
 * @param {string} nom nom du secteur
 * @return {number} id
 */
async function ajouterSecteur(nom) {
    let result = null;
    await axios.post('../PHP/sauvegardeCreneau.php', {
          nom: nom,
        })
        .then(async function (response) {
          result = response.data;
        })
        .catch(function (error) {
          console.log(error);
        });
    
    return result;
}