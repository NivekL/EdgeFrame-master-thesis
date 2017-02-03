$( function() {
  $( "#textblock" ).draggable({
    helper: 'clone'
  }); // draggable function

    $( "#mid-div" ).droppable({
      accept: "#textblock",
      over: function(event, ui){
        $(this)
        .css("border", "3px dashed black")
        .css("background-color", "rgba(43, 89, 158, 0.77)");
      }, // over object
      out: function(event, ui){
        $(this)
        .css("border", "1px solid black")
        .css("background-color", "#f6f6f6");
      }, // out object
      drop: function(event, ui) {
        $(this)
        .css("border", "1px solid black")
        .css("background-color", "#f6f6f6");

        var element = $(ui.draggable).clone();
        $(ui.draggable).draggable("enable");
        $(this).append(element);
        $(element).draggable({helper: 'clone', accept: element});
    } //drop object

  }); // droppable function
}); //document function
