const liste_tables = document.getElementById("liste_tables");
const liste_secteurs = document.getElementById("liste_secteurs");

const add_secteur = document.getElementById("add_secteur");
const del_secteur = document.getElementById("del_secteur");
const nom_secteur = document.getElementById("nom_secteur");

const reload_secteurs = document.getElementById("reload_secteurs");

const add_table = document.getElementById("add_table");

let selected_secteur = -1;
let selected_element = null;


// cree un element
function creerElement(type, classs = null, texte = null) {
    const element = document.createElement(type);

    if(classs != null) {
        for(let c of classs) {
            element.classList.add(c);
        }
    }

    if(texte != null) {
        element.innerHTML = texte;
    }

    return element;
}

//suprime tout les enfants dun element
function removeAllChild(element) {
    while(element.firstChild != null) {
        element.firstChild.remove();
    }
}



// --------- event bouton -----------

// cree un secteur et le selectionne quand cliqué
add_secteur.addEventListener("click", async () => {
    let nom = nom_secteur.value;
    if(nom != "") {
        let id = await ajouterSecteur(nom);

        if(id != -1) {
            let elementSecteur = creerElementSecteur(id,nom);

            liste_secteurs.appendChild(elementSecteur);

            selectSecteur(id, elementSecteur);
    
        }
        
        nom_secteur.value = "";
    }
});

// suprime le secteur selectionné quand cliqué
del_secteur.addEventListener("click", async () => {
    if(selected_secteur != -1) {
        removeAllChild(liste_tables);
        suprimerSecteur(selected_secteur);
        selected_element.remove();

        selected_secteur = -1;
        selected_element = null;
    }
});

// recharge la liste des secteurs
reload_secteurs.addEventListener("click", () => {
    removeAllChild(liste_tables);
    removeAllChild(liste_secteurs);
    displayAllSecteur();
    selected_secteur = -1;
    selected_element = null;
});

// cree une nouvelle table
add_table.addEventListener("click", async () => {
    if(selected_secteur != -1) {
        const nb_places = 1;

        let id = await ajouterTable(selected_secteur, nb_places);
        let elementTable = creerElementTable(id, nb_places);
        liste_tables.appendChild(elementTable);
        
    }
});




//--------- fonction ---------------

// cree tout les elements secteur et les affiches
async function displayAllSecteur() {
    let secteurs = await obtenirSecteurs();

    for(let secteur of secteurs) {
        let elementSecteur = creerElementSecteur(secteur["id"],secteur["nom"]);
        liste_secteurs.appendChild(elementSecteur);
    }
}

// cree un element secteur et lui ajoute les events
function creerElementSecteur(id_secteur, nom_secteur) {
    const divSecteur = creerElement("div", ["secteur"]);
    const nomSecteur = creerElement("p", null, nom_secteur);
    divSecteur.appendChild(nomSecteur);

    divSecteur.addEventListener("click", () => {
        selectSecteur(id_secteur, divSecteur);
    });

    return divSecteur;
}

function selectSecteur(id_secteur, element_secteur) {
    if(selected_element != null) {
        selected_element.classList.remove("secteur_select");
    }
    
    element_secteur.classList.add("secteur_select");

    selected_element = element_secteur;
    selected_secteur = id_secteur;

    afficherTables(selected_secteur);
}


async function afficherTables(id_secteur) {
    removeAllChild(liste_tables);
    let tables = await obtenirTablesSecteur(id_secteur);

    for(let table of tables) {
        let elementTable = creerElementTable(table["id"], table["nb_place"]);
        liste_tables.appendChild(elementTable);
    }

}

function creerElementTable(id_table, nb_places) {
    const divTable = creerElement("div", ["table"]);
    const add = creerElement("button", null, "+");
    const remove = creerElement("button", null, "-");

    divTable.nb_places = nb_places;

    const places = creerElement("p", null, nb_places);


    divTable.appendChild(add);
    divTable.appendChild(places);
    divTable.appendChild(remove);


    add.addEventListener("click", () => {
        divTable.nb_places ++;
        changerNbPlacesTable(id_table, divTable.nb_places);
        places.innerHTML = divTable.nb_places;
    });

    remove.addEventListener("click", () => {
        divTable.nb_places --;

        if(divTable.nb_places <= 0) {
            suprimerTable(id_table);
            divTable.remove();
        } else {
            changerNbPlacesTable(id_table, divTable.nb_places);
            places.innerHTML = divTable.nb_places;
        }
    });

    return divTable;
}




// chargement de la page
displayAllSecteur();