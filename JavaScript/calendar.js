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
function createCalendar(parentID,lignes){
    // create calendar
    const parent=document.querySelector(`#${parentID}`);
    let calendarBody = createCalendarElement(parent,"calendarBody","calendarBody");
    
    for(let ligne = 0 ; ligne < lignes ; ligne++ ){
        let intermidiateDiv = createCalendarElement(calendarBody,`droptarget_${ligne+1}`,"droptarget");
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
function getTime(divID,parentID){

    const element = document.querySelector(`#${divID}`);
    const parent = document.querySelector(`#${parentID}`);

    let elementSizeInPixils = element.clientHeight;
    let parentSizeInPixils = parent.clientHeight;
    let oneMinInPixils = parentSizeInPixils / ( 24 * 60);
    let timeOfElmentInMinuts = elementSizeInPixils / oneMinInPixils ;

    return timeOfElmentInMinuts;
}
function calcTime(divID,parentID,insertID){
    // In
    const timeOfElmentInMinuts = getTime(divID,parentID);
    const intermidiate = ( timeOfElmentInMinuts / 60 );
    const element = document.querySelector(`#${insertID}`);
    // out
    const hours = Math.floor( timeOfElmentInMinuts / 60 );
    const min = Math.floor( timeOfElmentInMinuts % 60 );
    //
    return [ hours , min ]
}
function printTime(hours,min,parent){
    const div = document.createElement("div");
    div.classList.add("currentTime");
    console.log(min,hours);
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
function removeTime(parent){
    parent.removeChild(parent.firstElementChild);
}

//
const line_nb = 10;
const column_nb = 7;
createCalendar1("calendar1",column_nb,line_nb);
addDate("date");
createCalendar("calendar",column_nb);

function day(dayNbr){

    const target = document.getElementById(`droptarget_${dayNbr}`);
    let taskNumber = 0;

    function createTask(event){
        //
        const child =  document.createElement("p");
        child.id=`day_${dayNbr}_${taskNumber}`;
        child.classList.add('draggable');
        target.appendChild(child);
        child.style.top = `${event.offsetY - ( child.offsetHeight / 2 )}px`;
        //
        //
        content=`
            <div  class="content">
                <div class="Title" id="Time_${child.id}"></div>
                <div class="resizer" id ="r_${child.id}"></div>
            </div>
            `;
        child.insertAdjacentHTML("beforeend", content);
        let time = document.querySelector(`#Time_${child.id}`);
        //
        // fuinctions to resize
        var startY, startHeight;

        function doDrag(e) {
            removeTime(time);
            let a = calcTime(child.id,target.id,time.id); 
            printTime(a[0],a[1],time);

            let pxNbr = (startHeight + e.clientY - startY);
            let px = pxNbr +  'px';

            child.style.height = px;
        }
        function stopDrag(e) {
            document.documentElement.removeEventListener('mousemove', doDrag, false);
            document.documentElement.removeEventListener('mouseup', stopDrag, false);
        }
        //
        const resize = document.querySelector(`#r_${child.id}`);
        resize.addEventListener('mousedown',e=>{
            startY = e.clientY;
            startHeight = parseInt(document.defaultView.getComputedStyle(child).height, 10);
            document.documentElement.addEventListener('mousemove', doDrag, false);
            document.documentElement.addEventListener('mouseup', stopDrag, false);
        });
        //
        let a = calcTime(child.id,target.id,time.id); 
        printTime(a[0],a[1],time);
        //
        taskNumber++;
    }

    function removeClick(){
        target.removeEventListener("click",createTask);
    }
    //
    target.addEventListener('mouseover', function(event) {
        if(event.target.classList.contains('draggable')){
            console.log('mouseovered on child element');
            event.target.addEventListener('click', removeClick);
        }else{
            target.addEventListener("click",createTask);
        }
    });
}

function week(){
    const weekDays = 7; 
    for(var i = 1 ; i <= weekDays ; i++){
        day(i)
    }
}
week();



