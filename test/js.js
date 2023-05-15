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
    let isDragging = false;
    let initialPosition;

    elementchild.addEventListener("mousedown", (event) => {
        isDragging = true;
        initialPosition = element.offsetTop - event.clientY;
    });

    document.addEventListener("mousemove", (event) => {
        if (isDragging) {
        const newPosition = event.clientY + initialPosition;
        const parentBottom = parent.offsetTop + parent.offsetHeight;
        const maxPosition = parentBottom - element.offsetHeight;
        const newPositionInBounds = Math.min(maxPosition, Math.max(newPosition, 0));
        element.style.top = `${newPositionInBounds}px`;
        }
    });

    document.addEventListener("mouseup", () => {
        isDragging = false;
    });
}

function createContent(task){
    const x = document.createElement('div');
    x.id=444;
    x.classList.add('one');
    task.appendChild(x);
}





const s = document.getElementById("div");
createTask(s,"wow");
createTask(s,"wow2");