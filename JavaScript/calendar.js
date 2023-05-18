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
    const parent=document.querySelector("#"+parentID);
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
function getTime(topInPixels,BotInPixels,parent){
    const oneMin = oneMinInPixils(parent);
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
function getTaskTimes(element,parent){
    const corrdsTopBot = getElementCoordinates(element);
    const getTmeSE = getTime(corrdsTopBot.top,corrdsTopBot.bottom,parent);
    const hourAndMinOfStartTime =  calcTime(getTmeSE.timeStart);
    const hourAndMinOfEndTime = calcTime(getTmeSE.timeEnd);
    const hourStart = hourAndMinOfStartTime.hours;
    const minStart = hourAndMinOfStartTime.min;
    const hoursEnd = hourAndMinOfEndTime.hours;
    const minEnd = hourAndMinOfEndTime.min;
    return {
        hourStart:hourStart,
        minStart:minStart ,
        hoursEnd:hoursEnd ,      
        minEnd:minEnd 
    }
}
function printTimeSE(element,parent,elementchild){
    // calculations
    let data = getTaskTimes(element,parent);
    // things
    const timeDiv = createElement(elementchild,`${element.id}_time`,"Time");
    printTime(data.hourStart,data.minStart,timeDiv);
    printTime(data.hoursEnd,data.minEnd,timeDiv);
}
function removeElement(elementID){
    const element = document.getElementById(elementID);
    element.parentNode.removeChild(element);
}
function createTask(parent,taskID){
    //
    const task = createElement(parent,taskID,'draggable');
    // content
    const taskChild = createElement(task,`${taskID}_Child`,'draggable_Child');
    // info
    createContent(taskChild);
    // drag feature
    enableDrag(taskChild,task,parent);
    // time stuff
    printTimeSE(task,parent,taskChild);

    task.addEventListener('mousemove',e=>{
        removeElement(`${task.id}_time`)
        printTimeSE(task,parent,taskChild);

        const parentRect = parent.getBoundingClientRect();


    });
    return task;

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
    element.remove();
}
function adjustMaxHeight(parent, element) {
    const parentRect = parent.getBoundingClientRect();
    const elementRect = element.getBoundingClientRect();
  
    const parentTop = parentRect.top;
    const childTop = elementRect.top;
    const parentHeight = parentRect.height;
  
    const maxChildHeight = parentHeight - (childTop - parentTop);
    return maxChildHeight;
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
// lunching functions
function createTable(line_nb,column_nb){
    createCalendarView("calendar1",column_nb,line_nb);
    addDate("date");
    createCalendar("calendar",column_nb);
}
function day(dayNbr){

    const target = document.getElementById(`droptarget_${dayNbr}`);
    let taskNumber = 1;

    target.addEventListener('click', function(event) {
        if (event.target === target) {
            // holy statment
            event.stopPropagation();
            // create element
            const task = createTask(target,`{day:${dayNbr};taskNbr:${taskNumber}}_draggable`);
            taskNumber++;
            // position element on click
            const parentRect = target.getBoundingClientRect();
            const offsetY = event.clientY - parentRect.top;
            task.style.top = `${offsetY}px`;
            //
            const maxHeight = adjustMaxHeight(target,task);
            task.style.maxHeight = `${maxHeight}px`;
        }
    });
}
function week(){
    const weekDays = 7; 
    for(var i = 1 ; i <= weekDays ; i++){
        day(i)
    }
}
function main(){
    const line_nb = 12;
    const column_nb = 7;
    createTable(line_nb,column_nb)
    week();    
}
main();