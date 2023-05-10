var nombreTables = 0;

function ajouterTable() {
  nombreTables++;
  var tableHtml = '<div class="table">Table ' + nombreTables + '</div>';
  document.getElementById("tables-container").insertAdjacentHTML('beforeend', tableHtml);
  document.getElementById("total-tables").textContent = nombreTables;
  updateTableBackground();
}

function supprimerTable() {
  if (nombreTables > 0) {
    var lastTable = document.querySelector(".table:last-of-type");
    lastTable.parentNode.removeChild(lastTable);
    nombreTables--;
    document.getElementById("total-tables").textContent = nombreTables;
    updateTableBackground();
  }
}

function updateTableBackground() {
  const tables = document.querySelectorAll('.table');
  tables.forEach(table => {
    if (table.textContent.trim() === "") {
      table.style.backgroundColor = 'black';
    } else {
      table.style.backgroundColor = 'gold';
    }
  });
}

const addTableBtn = document.querySelector('.add-table-btn');
const deleteTableBtn = document.querySelector('.delete-table-btn');
const tablesContainer = document.querySelector('#tables-container');

addTableBtn.addEventListener('click', () => {
  if (tablesContainer.childElementCount < 15) {
    const newTable = document.createElement('div');
    newTable.classList.add('table');
    tablesContainer.appendChild(newTable);
    updateTableBackground();
  }
});

deleteTableBtn.addEventListener('click', () => {
  if (tablesContainer.childElementCount > 0) {
    tablesContainer.removeChild(tablesContainer.lastElementChild);
    updateTableBackground();
  }
});
