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

function createCalendar(parentID,lignes,columns){
    // create calendar
    const parent=document.querySelector(`#${parentID}`);
    let calendar = createCalendarElement(parent,"calendar","calendar");
    
    for(let ligne = 0 ; ligne < lignes ; ligne++ ){
        let intermidiateDiv = createCalendarElement(calendar,`day_${ligne+1}`,"day");
        for(let column = 0 ; column < columns ; column++ ){
            createCalendarElement(intermidiateDiv,`day_${ligne+1}_time_${column}`,"task");
        }
    }
}
createCalendar("main",7,10);
