/**
 * How to use:
 * In : element ID
 * return : element becomes resizable on Vertical Axis
 * Condition to work : the element needs to have specific CSS properties:
 * - display: flex;
 * - flex-direction: column;
 * - justify-content: flex-end;
 */

function createTab(taskID) {
  // variables
  var p = document.querySelector(`#${taskID}`); // task
  var startY, startHeight;

  // functions to resize
  function initDrag(e) {
    startY = e.clientY;
    startHeight = parseInt(
      document.defaultView.getComputedStyle(p).height,
      10
    );
    document.documentElement.addEventListener(
      "mousemove",
      doDrag,
      false
    );
    document.documentElement.addEventListener(
      "mouseup",
      stopDrag,
      false
    );
  }

  function doDrag(e) {
    p.style.height = startHeight + e.clientY - startY + "px";
  }

  function stopDrag(e) {
    document.documentElement.removeEventListener(
      "mousemove",
      doDrag,
      false
    );
    document.documentElement.removeEventListener(
      "mouseup",
      stopDrag,
      false
    );
  }

  /**
   * TODO create content
   */
  function createInstance(divID, classs) {
    const parent = document.querySelector(`#${divID}`);
    div = `
      <div class=${classs}>
        <div class="Title"></div>
        <div class="resizer" id="r_${divID}"></div>
      </div>
    `;
    position = "beforeend";
    parent.insertAdjacentHTML(position, div);
  }

  // initialize resizability
  createInstance(`${taskID}`, "e");
  const resize = document.querySelector(`#r_${taskID}`);
  resize.addEventListener("mousedown", initDrag, false);
} 
