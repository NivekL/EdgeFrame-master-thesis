$( function() {

  $("#saveBtn").on('click', function(event) {
    var allDroppedElems = document.getElementsByClassName('dropped');
    var toBeJSON = [];

    for (var i = 0; i < allDroppedElems.length; i++) {

        toBeJSON.push([allDroppedElems[i].id, allDroppedElems[i].innerText]);

        console.log("Element: " + allDroppedElems[i].id + " innehåller: " + allDroppedElems[i].innerText);

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

  $.post("handleJsonData.php", function(data, status){
        alert("Data: " + data + "\nStatus: " + status);
    });


}); //document function
