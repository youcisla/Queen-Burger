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
    const parent=document.querySelector(`#${parentID}`);
    let calendarBody = createElement(parent,"calendarBody","calendarBody");
    
    for(let ligne = 0 ; ligne < lignes ; ligne++ ){
        let intermidiateDiv = createElement(calendarBody,`droptarget_${ligne+1}`,"droptarget");
    }
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


function oneMinInPixils(parent){
    let parentSizeInPixils = parent.clientHeight;
    let oneMin = parentSizeInPixils / ( 24 * 60);
    return oneMin;
}
function getDuration(element,parent){

    let elementSizeInPixils = element.clientHeight;
    let oneMin = oneMinInPixils(parent);
    let timeOfElmentInMinuts = elementSizeInPixils / oneMin ;

    return timeOfElmentInMinuts;
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






function createTable(line_nb,column_nb){
    createCalendarView("calendar1",column_nb,line_nb);
    addDate("date");
    createCalendar("calendar",column_nb);
}
function createTask(parent,taskID){
    //
    const task =  document.createElement("div");
    task.id=`${taskID}`;
    task.classList.add('draggable');
    parent.appendChild(task);
    //
    // content
    const taskChild =  document.createElement("div");
    taskChild.classList.add('draggable_Child');
    task.appendChild(taskChild);
    // info
    //createContent(taskChild);
    enableDrag(taskChild,task,parent);
}
function enableDrag(elementchild,element,parent) {
    console.log("in");
    let isDragging = false;
    let initialPosition;

    elementchild.addEventListener("mousedown", (event) => {
/*         event.stopPropagation();
 */        isDragging = true;
        initialPosition = element.offsetTop - event.clientY;
    });

    document.addEventListener("mousemove", (event) => {
/*         event.stopPropagation();
 */    console.log("move")
   if (isDragging) {
        const newPosition = event.clientY + initialPosition;
        const parentBottom = parent.offsetTop + parent.offsetHeight;
        const maxPosition = parentBottom - element.offsetHeight;
        const newPositionInBounds = Math.min(maxPosition, Math.max(newPosition, 0));
        element.style.top = `${newPositionInBounds}px`;
        }
    });

    document.addEventListener("mouseup", event => {
        /* event.stopPropagation(); */
        isDragging = false;
    });
}
function createContent(task){
    const x = document.createElement('div');
    x.id=444;
    x.classList.add('one');
    task.appendChild(x);
}
function removeClick(){
    target.removeEventListener("click",createTask(target,`x_${dayNbr}_${taskNumber}`));
}

// editing below

function createClickForm(){
    return true;
}
function createManualTaskAdderForum(){
    return timeStart,timeEnd,day;
}
function AddTaskManually(){

    let taskNbr=0;
    let data =createManualTaskAdderForum();
    let timeStart = data[0];
    let timeEnd = data[1];
    let day = data[2];

    const addTask = document.getElementById("addTask");
    addTask.addEventListener("click",e=>{
        e.stopPropagation();
        createTask(`droptarget_${day}`,``);
        taskNbr++;
    })



}


/* function day(dayNbr){

    const target = document.getElementById(`droptarget_${dayNbr}`);
    let taskNumber = 0;
    var elementHovered = false;

    target.addEventListener('click', function(event) {
        event.stopPropagation();
        if((event.target.classList.contains('draggable'))){
            elementHovered = true;
        }else{
            elementHovered = false;
            target.addEventListener("click",e=>{
                e.stopPropagation();
                createTask(target,`x_${dayNbr}_${taskNumber}`)
            });
            taskNumber++;
        }  
    });
}  */
/* function week(){
    const weekDays = 7; 
    for(var i = 1 ; i <= weekDays ; i++){
        day(i)
    }
} */


//
const line_nb = 10;
const column_nb = 7;
createTable(line_nb,column_nb)
//week();
//

const target = document.getElementById(`droptarget_${1}`);

createTask(target,"moth");
const moth = document.getElementById("moth");
let x = getElementCoordinates(moth)
console.log(x.top,x.bottom);