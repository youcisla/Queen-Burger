


async function loadCreneauxServ(dates,id_serveur){
    let creneaux = await obtenirCreneauxDates(id_serveur, dates);
    console.log(creneaux);
    for(let date of dates){
        let dateElement =document.querySelector("#droptarget_" + date);
        for(let creneau of creneaux[date]){
            createTaskServ(dateElement, `${creneau["id"]}_task` ,creneau["hdebut"], creneau["hfin"]);
        }
    }
}
function mainServ(){
    const line_nb = 12;
    const column_nb = 7;
    const id_serveur = getServeurId();
    console.log(id_serveur);
    if (id_serveur != - 1){
        createTableServ(line_nb,column_nb,id_serveur)
    }
}
function createTableServ(line_nb,column_nb,id_serveur){
    createCalendarView("calendar1",column_nb,line_nb);
    addDate("date");
    createCalendarServ("calendar",column_nb,id_serveur);
}
function createCalendarServ(parentID,lignes,id_serveur){
    // create calendar
    const date = getAllDaysOfCurrentWeek();
    const parent=document.querySelector("#"+parentID);
    let calendarBody = createElement(parent,"calendarBody","calendarBody");
    
    for(let ligne = 0 ; ligne < lignes ; ligne++ ){
        let intermidiateDiv = createElement(calendarBody,`droptarget_${date[ligne]}`,"droptarget");
    }
    
    displayAbsence(date,id_serveur);
    loadCreneauxServ(date,id_serveur);
}
function createTaskServ(parent, taskID , timeStart =null,timeEnd =null) {
    //
    const task = createElement(parent, taskID, "draggable");
    // content
    const taskChild = createElement(task, `${taskID}_Child`, "draggable_Child");
    // info
    // drag feature
    // position element on click
    if(timeEnd && timeEnd){
        const coords = getTaskPosition(timeStart,timeEnd,task);
        task.style.top = `${coords.top}px`;
        task.style.height = `${coords.bottom - coords.top }px`;
        printTimeSELoad(timeStart,timeEnd,task,taskChild);
    }
    return task;
}  
function userSelect(user){
    if (user = server){
        mainServ();
    }
    else{
        main();
    }
}
function getUser(){
    return user;
}

let user = getUser();
userSelect(user);