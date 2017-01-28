$( function() {
  $( "#textblock" ).draggable({
    containment: "document",
    helper: "clone",
    zIndex:100,
    cancel: '',
    revert: "invalid"
  });

    $( "#top-div, #mid-div, #bottom-div" ).droppable({
      accept: "#textblock",
      over: function(event, ui){
        $(this).css("border", "3px dashed black")
        .css("background-color", "rgba(10, 110, 56, 0.77)");
      },
      out: function(event, ui){
        $(this).css("border", "1px solid black")
        .css("background-color", "rgba(12, 87, 92, 0.77)");
      },
      drop: function(event, ui) {
        var idIndex = 0;
        $(this)
        .css("border", "1px solid black")
        .css("background-color", "rgba(12, 87, 92, 0.77)")

        var element = $(ui.draggable).clone();
        //element.id = "dropped" + idIndex;
        $(element).addClass("dropped");
        idIndex++;
        $(this).append(element);
        $(element).draggable({helper: 'clone'});
        console.log(event);
    } //drop object
  }); // droppable function
}); //document function
