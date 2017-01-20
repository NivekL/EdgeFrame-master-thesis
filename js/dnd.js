///////////////// Function for when the savebutton is pressed to save objects as JSONdata ////////////////////////////////////////////////////////
window.addEventListener("load", function() {

document.getElementById("saveBtn").addEventListener("click", saveHandler);

});

function saveHandler(event) {


    var allDroppedElems = document.getElementsByClassName("dropped");

    if (saveHandler == false) {
      console.log("something went wrong");
    } else {
      var saved = document.getElementById("saveBtn").value;
      document.getElementById("saveBtn").innerHTML = saved;
    }


    console.log(allDroppedElems);

var toBeJSON = [];

    for (var i = 0; i < allDroppedElems.length; i++) {

        toBeJSON.push([allDroppedElems[i].id, allDroppedElems[i].parentNode.id, allDroppedElems[i].value]);

        console.log("Element: " + allDroppedElems[i].id + " Dropzone: " + allDroppedElems[i].parentNode.id + " innehåller: " + allDroppedElems[i].value);

    }

    var jsonData = JSON.stringify(toBeJSON);

    sendData(jsonData);

}

//////////////////////////////////////// Drag n Drop functionality ////////////////////////////////////////////////////

var container = document.getElementById("left-div");
var nodeObject = document.getElementById("box");

container.addEventListener("dragover", allowDrop);
container.addEventListener("dragleave", resetStyle);
nodeObject.addEventListener("dragstart", drag);
container.addEventListener("drop", drop);

function allowDrop(ev) {
  ev.preventDefault();

  ev.target.style.border = "3px dashed gray";

  console.log(ev);
}

function resetStyle(ev) {
  ev.preventDefault();

  ev.target.style.border = "";

}

var droppableElement;
var idIndex = 0;

function drag(ev) {
  //ev.dataTransfer.setData("text", ev.target.id);
  droppableElement = ev.target.cloneNode();

  console.log(droppableElement);
}


function drop(ev) {
  ev.preventDefault();
  var data = ev.dataTransfer.getData("text");

  ev.target.style.border = "";

  droppableElement.id = "dropped" + idIndex;
  droppableElement.classList.add("dropped");
  idIndex++;

  ev.target.appendChild(droppableElement);
  console.log(ev.target.id);
}

//////////// AJAX request function to connect the JSONdata with DB-handler ///////////////////////////////////////////////////////////////

function sendData(JSONdata) {
    if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
    } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log("Done!");
            }
        };
        xmlhttp.open("GET","handleJsonData.php?q="+JSONdata,true);
        xmlhttp.send();
    }
