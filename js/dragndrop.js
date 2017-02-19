$( function() {

  $("#saveBtn").on('click', function(event) {
    var allDroppedElems = document.getElementsByClassName('dropped');
    var toBeJSON = [];

    for (var i = 0; i < allDroppedElems.length; i++) {

        toBeJSON.push([allDroppedElems[i].id, allDroppedElems[i].innerText, allDroppedElems[i].offsetLeft, allDroppedElems[i].offsetTop]);

        console.log("Element: " + allDroppedElems[i].id + " innehåller: " + allDroppedElems[i].innerText + "x-position " + allDroppedElems[i].offsetLeft + " y-position " + allDroppedElems[i].offsetTop);

    }

    var jsonData = JSON.stringify(toBeJSON);


    sendData(jsonData);

  });

  $( "#divBlock, #text" ).draggable({
    helper: 'clone'
  }); // draggable function

  var i = 0;

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
        $(element).attr('id', 'dropped' + i);
        $(element).addClass("dropped");
        i++;

        $(this).append(element);

        console.log(element);

        $(element).draggable({
          containment: 'parent'
        });
        $(element).resizable();

    } //drop object

  }); // droppable function

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

}); //document function
