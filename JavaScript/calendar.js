// finished functions
function createElement(parent,id,classs){
    const div = document.createElement("div");
    div.id = id;
    div.classList.add(classs);
    parent.appendChild(div);
    return div
}
function createCalendarView(parentID,lignes,columns){
    // create calendar

    const parent=document.querySelector(`#${parentID}`);
    let calendarBody = createElement(parent,"calendarBody1","calendarBody");
    
    for(let ligne = 0 ; ligne < lignes ; ligne++ ){
        let intermidiateDiv = createElement(calendarBody,`day_${ligne+1}`,"day");
        for(let column = 0 ; column < columns ; column++ ){
            createElement(intermidiateDiv,`day_${ligne+1}_time_${column}`,"task");
        }
    }
}
function createCalendar(parentID,lignes){
    // create calendar
    const date = getAllDaysOfCurrentWeek();
    const parent=document.querySelector("#"+parentID);
    let calendarBody = createElement(parent,"calendarBody","calendarBody");
    
    for(let ligne = 0 ; ligne < lignes ; ligne++ ){
        let intermidiateDiv = createElement(calendarBody,`droptarget_${date[ligne]}`,"droptarget");
    }
    
    loadCreneaux(date);
}
function addDate(idDiv) {
    const days = ["lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi", "dimanche"];
    const dates = getAllDaysOfCurrentWeek();
    const div = document.getElementById(idDiv);
    for(var i = 0; i < 7; i++) {
        div.children[i].children[0].innerHTML = days[i];
        div.children[i].children[1].innerHTML = dates[i];
    }
}
function oneMinInPixils(element) {
    let parent = element.parentNode;
    let parentSizeInPixils = parent.clientHeight;
    let oneMin = parentSizeInPixils / (24 * 60);
    return oneMin;
}
function getDuration(element,parent){

    let elementSizeInPixils = element.clientHeight;
    let oneMin = oneMinInPixils(parent);
    let timeOfElmentInMinuts = elementSizeInPixils / oneMin ;

    return timeOfElmentInMinuts;
}
function getElementCoordinates(element) {
  
    const parentRect = element.parentNode.getBoundingClientRect();
    const elementRect = element.getBoundingClientRect();
  
    const top = elementRect.top - parentRect.top;
    const bottom = elementRect.bottom - parentRect.top;
  
    return {
      top: top,
      bottom: bottom
    };
}
function getTime(topInPixels,BotInPixels,element){
    const oneMin = oneMinInPixils(element);
    const timeStart = topInPixels / oneMin; 
    const timeEnd = BotInPixels / oneMin;
    return {
        timeStart:timeStart,
        timeEnd:timeEnd
    }
}
function calcTime(timeOfElmentInMinuts){
    const hours = Math.floor( timeOfElmentInMinuts / 60 );
    const min = Math.floor( timeOfElmentInMinuts % 60 );
    return { hours:hours , min:min }
}
function printTime(hours,min,parent){
    const div = document.createElement("div");
    div.classList.add("currentTime");
    if( ( hours < 10 ) && ( min < 10 )  ){
        div.innerHTML =`0${hours}:0${min}`;
    }else if ( ( hours < 10 )  && ( min > 10 ) ){
        div.innerHTML =`0${hours}:${min}`;
    }else if ( ( hours > 10 )  && ( min < 10 ) ){
        div.innerHTML =`${hours}:0${min}`;
    }else{
        div.innerHTML = hours+":"+min;
    }
    parent.appendChild(div);
}
function getTaskTimes(element){
    const corrdsTopBot = getElementCoordinates(element);
    const getTmeSE = getTime(corrdsTopBot.top,corrdsTopBot.bottom,element);
    const hourAndMinOfStartTime =  calcTime(getTmeSE.timeStart);
    const hourAndMinOfEndTime = calcTime(getTmeSE.timeEnd);
    const hourStart = hourAndMinOfStartTime.hours;
    const minStart = hourAndMinOfStartTime.min;
    const hoursEnd = hourAndMinOfEndTime.hours;
    const minEnd = hourAndMinOfEndTime.min;
    const timeStart = {hourStart:hourStart,minStart:minStart}
    const timeEnd = {hoursEnd:hoursEnd,minEnd:minEnd}
    return {
        timeStart:timeStart,
        timeEnd:timeEnd
    }
}
function printTimeSE(element, elementChild) {
    // calculations
    let data = getTaskTimes(element);
    // things
    let timeDiv = document.getElementById(`${element.id}_time`);
    if (timeDiv) {
      timeDiv.parentNode.removeChild(timeDiv);
    }
    timeDiv = createElement(elementChild, `${element.id}_time`, "Time");
    printTime(data.timeStart.hourStart, data.timeStart.minStart, timeDiv);
    printTime(data.timeEnd.hoursEnd, data.timeEnd.minEnd, timeDiv);
} 
function createTask(parent, taskID) {
    //
    const task = createElement(parent, taskID, "draggable");
    // content
    const taskChild = createElement(task, `${taskID}_Child`, "draggable_Child");
    // info
    createContent(taskChild);
    // drag feature
    enableDrag(taskChild, task, parent);

    // position element on click
    const parentRect = parent.getBoundingClientRect();
    const offsetY = event.clientY - parentRect.top;
    task.style.top = `${offsetY}px`;
    // time stuff    printTimeSE(task, taskChild);
    task.addEventListener("mousemove", (e) => {
        printTimeSE(task, taskChild);
    });
    task.addEventListener("mouseup", async (e) => {
        const time = stringTimeFormat(task);
        console.log(time);
        const id = task.id.substring(0, task.id.length - 5);
        //modifierHorraireCreneau(id, time.hourStart, time.hourEnd);
        console.log(await modifierHorraireCreneau(id, time.hourStart, time.hourEnd))
    });
    return task;
}  
async function loadCreneaux(dates){
    let creneaux = await obtenirCreneauxDates(1, dates);
    for(let date of dates){
        console.log(date)
        for(let creneau of creneaux[date]){
        }
    }
}
function enableDrag(elementchild,element,parent) {
    let isDragging = false;
    let initialPosition;

    elementchild.addEventListener("mousedown", (event) => {
        event.stopPropagation();
        isDragging = true;
        initialPosition = element.offsetTop - event.clientY;
    });

    document.addEventListener("mousemove", (event) => {
    event.stopPropagation();
    
    if (isDragging) {
        //
        const newPosition = event.clientY + initialPosition;
        const parentBottom = parent.offsetTop + parent.offsetHeight;
        const maxPosition = parentBottom - element.offsetHeight;
        const newPositionInBounds = Math.min(maxPosition, Math.max(newPosition, 0));

        const computedStyles = getComputedStyle(element);

        //const borderTopSize = parseInt(computedStyles.getPropertyValue('border-top-width'), 10);
        //const borderBottomSize = parseInt(computedStyles.getPropertyValue('border-bottom-width'), 10)
        //const border = borderTopSize + borderBottomSize;       
        //
        const maxHeight = adjustMaxHeight(parent,element);
        //
        element.style.maxHeight = `${maxHeight}px`;
        element.style.top = `${newPositionInBounds}px`;
        }
    });

    document.addEventListener("mouseup", event => {
        /* event.stopPropagation(); */
        isDragging = false;
    });
}
function createContent(task){
    let x_bar = createElement(task,"x_bar","x_bar");
    let element2 = createElement(task,"x","deleter");
    element2.addEventListener("click",e=>{
        e.stopPropagation();
        deleteElement(task.parentNode);
    });
}
function deleteElement(element){
    const id = element.id.substring(0,element.id.length-5);
    supprimerCreneau(id);
    element.remove();
}
function adjustMaxHeight(parent, element,border =null) {
    const parentRect = parent.getBoundingClientRect();
    const elementRect = element.getBoundingClientRect();
  
    const parentTop = parentRect.top;
    const childTop = elementRect.top;
    const parentHeight = parentRect.height;
  
    const maxChildHeight = parentHeight - (childTop - parentTop) - border;
    return maxChildHeight;
}
// editing below
// lunching functions
function createTable(line_nb,column_nb){
    createCalendarView("calendar1",column_nb,line_nb);
    addDate("date");
    createCalendar("calendar",column_nb);
}
function day(date){

    const target = document.getElementById(`droptarget_${date}`);
    let taskNumber = 1;

    target.addEventListener('click',
        async function(event) {
            if (event.target === target) {
                // holy statment
                event.stopPropagation();
                // create element
                const task = createTask(target,"Temp");

                //
                const time = stringTimeFormat(task);
                //
                let data = await ajouterCreneau(date,time.hourStart,time.hourEnd,1,1);
                if (data.id == -1){
                    task.remove();
                }else{
                    task.id =data.id + "_task";
                }
                taskNumber++;


                //
                const maxHeight = adjustMaxHeight(target,task);
                task.style.maxHeight = `${maxHeight}px`;
            
            }
    });
}
function week(){
    const weekDays = 7; 
    let x = getAllDaysOfCurrentWeek();
    for(var i = 0 ; i < weekDays ; i++){
        day(x[i]);
    }
}
function main(){
    const line_nb = 12;
    const column_nb = 7;
    createTable(line_nb,column_nb)
    week();    
}
function stringTimeFormat(task){
    const tempTime = getTaskTimes(task);
    const timeStart = tempTime.timeStart;
    const timeEnd = tempTime.timeEnd;
    const hourStart = timeStart.hourStart + ":" + timeStart.minStart + ":00";
    const hourEnd = timeEnd.hoursEnd + ":" + timeEnd.minEnd + ":00";
    return {
        hourStart:hourStart,
        hourEnd:hourEnd
    }
}
main();
