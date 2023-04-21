function createCalendarDivs(parent,id,classs){
    div=`
        <div id=${id} class=${classs}>
            <div class="title"></div>
            <div class="calendarDivBody"></div>
        </div>
        `;
    position="beforeend";
    parent.insertAdjacentHTML(position, div);
}

function createCalendarElement(parent,id,classs){
    const table = document.createElement("div");
    table.id = id;
    table.classList.add(classs);
    parent.appendChild(table);
    return table
}

function createCalendar1(parentID,lignes,columns){
    // create calendar
    const parent=document.querySelector(`#${parentID}`);
    let calendarBody = createCalendarElement(parent,"calendarBody1","calendarBody");
    
    for(let ligne = 0 ; ligne < lignes ; ligne++ ){
        let intermidiateDiv = createCalendarElement(calendarBody,`day_${ligne+1}`,"day");
        for(let column = 0 ; column < columns ; column++ ){
            createCalendarElement(intermidiateDiv,`day_${ligne+1}_time_${column}`,"task");
        }
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
const line_nb = 10;
const column_nb = 7;
createCalendar1("calendar1",column_nb,line_nb);
addDate("date");


function createCalendar(parentID,lignes){
    // create calendar
    const parent=document.querySelector(`#${parentID}`);
    let calendarBody = createCalendarElement(parent,"calendarBody","calendarBody");
    
    for(let ligne = 0 ; ligne < lignes ; ligne++ ){
        let intermidiateDiv = createCalendarElement(calendarBody,`droptarget_${ligne+1}`,"droptarget");
    }
}
createCalendar("calendar",column_nb);

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * How to use:
 * In : element ID
 * return :
 * Used in :day()
*/
function createTab(taskID){
    // variables
    var p = document.querySelector(`#${taskID}`); // task
    var startY, startHeight;
    // functions to resize
    function initDrag(e) {
        startY = e.clientY;
        startHeight = parseInt(document.defaultView.getComputedStyle(p).height, 10);
        document.documentElement.addEventListener('mousemove', doDrag, false);
        document.documentElement.addEventListener('mouseup', stopDrag, false);
    }
    function doDrag(e) {
        p.style.height = (startHeight + e.clientY - startY) + 'px';
   
    }
    function stopDrag(e) {
        document.documentElement.removeEventListener('mousemove', doDrag, false);
        document.documentElement.removeEventListener('mouseup', stopDrag, false);
    }
    /**
     * TODO create content
    */
    function createInstance(divID,classs){
        const parent = document.querySelector(`#${divID}`);
        div=`
            <div  class=${classs}>
                <div class="Title" id="xx_${divID}"></div>
                <div class="resizer" id ="r_${divID}"></div>
            </div>
            `;
        position="beforeend";
        parent.insertAdjacentHTML(position, div);
    }
    
    // initialize resizability
    createInstance(`${taskID}`,"e");

    const resize = document.querySelector(`#r_${taskID}`);
    resize.addEventListener('mousedown', initDrag, false);
    
    
    
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * How to use:
 * In : the day number
 * return : element becomes resizable on Vertical Axis
 * Condition to work : the element needs to have spesific CSS properties:
 * - display: flex;
 * - flex-direction: column;
 * - justify-content: flex-end;
*/
function day(dayNbr){

    const target = document.getElementById(`droptarget_${dayNbr}`);
    let taskNumber = 0;

    function createTask(event){
        const child =  document.createElement("p");
        child.id=`day_${dayNbr}_${taskNumber}`;
        child.classList.add('draggable');
        target.appendChild(child);
        child.style.top = `${event.offsetY}px`;
        createTab(`day_${dayNbr}_${taskNumber}`);
        /* printTime(`day_${dayNbr}_${taskNumber}`,`droptarget_${dayNbr}`,`xx_day_${dayNbr}_${taskNumber}`); */
        taskNumber++;
    }

    function creatTaskContainor(){
        target.removeEventListener("click",createTask);

    }
    target.addEventListener('mouseover', function(event) {
        if(event.target.classList.contains('draggable')){
            console.log('mouseovered on child element');
            event.target.addEventListener('click', creatTaskContainor);
        }else{
            target.addEventListener("click",createTask);
        }
    });
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



// this is not working
function week(){
    const weekDays = 7; 
    for(var i = 1 ; i <= weekDays ; i++){
        day(i)
    }
}
week();

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * 
*/
function getTime(divID,parentID){
    //
    const element = document.querySelector(`#${divID}`);
    const parent = document.querySelector(`#${parentID}`);
    //
    let elementSizeInPixils = element.clientHeight;
    let parentSizeInPixils = parent.clientHeight;
    let oneMinInPixils = parentSizeInPixils / ( 24 * 60);
    let timeOfElmentInMinuts = elementSizeInPixils / oneMinInPixils ;
    //
    return timeOfElmentInMinuts;
}

function printTime(divID,parentID,insertID){
    // In
    const timeOfElmentInMinuts = getTime(divID,parentID);
    const intermidiate = ( timeOfElmentInMinuts / 60 );
    const element = document.querySelector(`#${insertID}`);
    // out
    const hours = Math.floor( timeOfElmentInMinuts / 60 );
    const min = Math.floor( intermidiate - hours ); 
    //
   /*  div=`
        <div class="currentTime">${hours}:${min}</div>
        `; */
    const div = document.createElement("div");
    div.classList.add("currentTime");
    div.innerHTML = hours+":"+min;
    element.appendChild(div);
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
