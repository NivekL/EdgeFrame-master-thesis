$( function() {

  $("#saveBtn").on('click', function(event) {
    var allDroppedElems = document.getElementsByClassName('dropped');
    var toBeJSON = [];

    for (var i = 0; i < allDroppedElems.length; i++) {

        toBeJSON.push([allDroppedElems[i].id, allDroppedElems[i].innerText, allDroppedElems[i].offsetLeft, allDroppedElems[i].offsetTop, allDroppedElems[i].offsetHeight, allDroppedElems[i].offsetWidth]);

        console.log("Element: " + allDroppedElems[i].id + " innehåller: " + allDroppedElems[i].innerText + "x-position: " + allDroppedElems[i].offsetLeft + " y-position: " + allDroppedElems[i].offsetTop + " längd: " + allDroppedElems[i].offsetHeight + " bredd: " + allDroppedElems[i].offsetWidth);

    }

    var jsonData = JSON.stringify(toBeJSON);


    sendData(jsonData);
  });





  $( "#divBlock, #text" ).draggable({
    helper: 'clone'
  }); // draggable function


// i ska vara lika med siffran från lastID!

//  var i = 0;

    $( "#mid-div" ).droppable({
      accept: "#divBlock, #text",
      over: function(event, ui){
        $(this)
        .css("border", "2px dashed #5991aa")
        .css("background-color", "#b8dfff");
      }, // over object
      out: function(event, ui){
        $(this)
        .css("border", "1px solid #cdc8c8")
        .css("background-color", "#f6f6f6");
      }, // out object
      drop: function(event, ui) {
        $(this)
        .css("border", "1px solid #cdc8c8")
        .css("background-color", "#f6f6f6");

        var element = $(ui.helper).clone();
        $(element).attr('id', guid());
        $(element).addClass("dropped");

        $(this).append(element);

        console.log(element);

        $(element).draggable();
        $(element).resizable();

    } //drop object

  }); // droppable function

$("#trash").droppable({
  over: function(event, ui){
    $(ui.draggable)
    .css("background-color", "#c9122c")
    .css("opacity", "0.8")
    .css("transition", "all 0.5");
  },
  out: function(event, ui){
    $(ui.draggable)
    .css("border", "1px solid #000")
    .css("opacity", "1")
    .css("background-color", "#37abff");
  },
  drop: function(event, ui) {
      ui.draggable.remove();
          var request = $.ajax({
            url: "handleJsonData.php",
            type: "DELETE",
            data: id=ui.draggable[0].id
          });
            request.fail(function(err){
              console.log("Item was not deleted" + err);
            });

            request.done(function(msg){
              console.log("Item successfully deleted" + msg);
            });
        }
});


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
                console.log(this.responseText);
                  document.getElementById("saveCall").innerHTML = "Saved!";
                  setTimeout(function(){ $('#saveCall').fadeOut(1000); }, 2000);
              } else {
                console.log(this.responseText);
              }
          };
          xmlhttp.open("GET","handleJsonData.php?q="+JSONdata,true);
          xmlhttp.send();
      }

}); //document function

$(".dropped").draggable();
$(".dropped").resizable();

function guid() {
  function s4() {
    return Math.floor((1 + Math.random()) * 0x10000)
      .toString(16)
      .substring(1);
  }
  return s4() + s4() + '-' + s4() + '-' + s4() + '-' +
    s4() + '-' + s4() + s4() + s4();
}
