/**
 * ajoute un nouveau secteur, et retourne son id
 * FONCTION ASYNCHRONE
 * @param {string} nom nom du secteur
 * @return {number} id
 */
async function ajouterSecteur(nom) {
    let result = -1;
    await axios.post('../PHP/requeteSecteur/ajoutSecteur.php', {
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

/**
 * ajoute une nouvelle table, et retourne son id
 * FONCTION ASYNCHRONE
 * @param {number} nb_place nombre de place de la table
 * @param {number} id_secteur id du secteur
 * @return {number} id
 */
async function ajouterTable(id_secteur, nb_places) {
  let result = -1;
  await axios.post('../PHP/requeteSecteur/ajoutTable.php', {
    nb_places: nb_places,
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
 * change le nombre de place d'une table
 * @param {string} id_table id de la table
 * @param {string} nb_places nombre de place
 * @return {number} id
 */
function changerNbPlacesTable(id_table, nb_places) {
  axios.post('../PHP/requeteSecteur/changeNbPlacesTable.php', {
    id_table: id_table,
    nb_places: nb_places
  });
}

/**
 * renvoit la liste de tout les secteurs
 * FONCTION ASYNCHRONE
 * @return {array} secteurs
 */
async function obtenirSecteurs() {
  let result = null;
  await axios.post('../PHP/requeteSecteur/recupererSecteurs.php', {
  })
  .then(function (response) {
    result = response.data;
  })
  .catch(function (error) {
    console.log(error);
  });
  
  return result;
}

/**
 * renvoit la liste des tables dun secteur
 * FONCTION ASYNCHRONE
 * @param {string} id_secteur nom du secteur
 * @return {array} tables
 */
async function obtenirTablesSecteur(id_secteur) {
  let result = null;
  await axios.post('../PHP/requeteSecteur/recupererTablesSecteur.php', {
    id_secteur: id_secteur,
  })
  .then(function (response) {
    result = response.data;
  })
  .catch(function (error) {
    console.log(error);
  });
  
  return result;
}

/**
 * suprime un secteur et ses tables
 * @param {number} id_secteur id du secteur
 */
function suprimerSecteur(id_secteur) {
  axios.post('../PHP/requeteSecteur/suprimerSecteur.php', {
    id_secteur: id_secteur,
  })
}

/**
 * suprime une table
 * @param {number} id_table id de la table
 */
function suprimerTable(id_table) {
  axios.post('../PHP/requeteSecteur/suprimerTable.php', {
    id_table: id_table
  });
}

