
/***
 * ajoute un nouveau creneau, et retourne son id 
 * !!!!! FONCTION ASYNCHRONE !!!!!!
 * @param {date} date date format yyyy-mm-dd
 * @param {hour} heuredebut heure format hh:mm:ss
 * @param {hour} heurefin heure format hh:mm:ss
 * @param {number} id_secteur id du secteur ou est assigné le serveur
 * @param {number} id_serveur id du serveur
 * @return {data} {id, raison, valide} || null si erreur
 */
async function ajouterCreneau(date, heuredebut, heurefin, id_secteur, id_serveur) {
  let result = null;
  await axios.post('../PHP/sauvegardeCreneau.php', {
        id_serveur: id_serveur,
        date: date,
        heuredebut: heuredebut,
        heurefin: heurefin,
        id_secteur: id_secteur
      })
      .then(async function (response) {
        result = response.data;
      })
      .catch(function (error) {
        console.log(error);
      });
  
  return result;
}

/**
 * suprime un creneau
 * @param {number} id_creneau id du creneau a supprimer
 */
function supprimerCreneau(id_creneau) {
  axios.post('../PHP/suppressionCreneau.php', {
    id_creneau : id_creneau
  });
}

/**
 * modifie le secteur d'un creneau
 * @param {number} id_creneau id du creneau
 * @param {number} id_secteur id du secteur
 */
function supprimerCreneau(id_creneau, id_secteur) {
  axios.post('../PHP/modifierSecteurCreneau.php', {
    id_creneau : id_creneau,
    id_secteur : id_secteur
  });
}

/**
 * modifier l'horraire d'un creneau
 * FONCTION ASYNCHRONE
 * @param {number} id_creneau id du creneau
 * @param {hour} debutheure heure de commencement du creneau
 * @param {hour} finheure heure de fin du creneau
 * 
 * @return {data} {raison, valide} || null si erreur
 */
async function modifierHorraireCreneau(id_creneau, debutheure, finheure) { 
  let result = null;
  await axios.post('../PHP/modifierHorraireCreneau.php', {
        id_creneau: id_creneau,
        heuredebut: heuredebut,
        heurefin: heurefin
      })
      .then(async function (response) {
        result = response.data;
      })
      .catch(function (error) {
        console.log(error);
      });

  return result;
}

/**
 * obtient tout les creneaux d'une liste de date
 * FONCTION ASYNCRHONE
 * @param {array dates} dates tableau de date format yyyy-mm-dd
 * @param {number} id_serveur id du serveur
 * 
 * @return {dictionnaire creneaus} {date1 : [creneau11, creneau21], date2 : [creneau12, creneau22]}
 */
async function obtenirCreneauxDates(id_serveur, dates) {
  let creneaux = null;
  await axios.post('../PHP/obtenirCreneaux.php', {
    id_serveur : id_serveur,
    dates : dates
  })
  .then(async function (response) {
    creneaux = response.data;
  })
  .catch(function (error) {
    console.log(error);
  });

return creneaux;
}

/**
 * renvoit un boolean par date en fonction de l'absence du serveur
 * FONCTION ASYNCRHONE
 * @param {number} id_serveur : id de l'employé
 * @param {array dates} dates : tableau de date format yyyy-mm-dd
 * 
 * @return {dictionnaire boolean} {date1 : bool1, date2 : bool2}
 */
async function obtenirAbsencesDates(id_serveur, dates) {
  let absences = null;
  await axios.post('../PHP/obtenirAbsences.php', {
    id_serveur : id_serveur,
    dates : dates
  })
  .then(async function (response) {
    absences = response.data;
  })
  .catch(function (error) {
    console.log(error);
  });

  return absences;
}