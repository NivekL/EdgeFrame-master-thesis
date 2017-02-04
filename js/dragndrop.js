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
        var idIndex = 0;
        var element = $(ui.draggable).clone();
        $(element).attr('id', 'dropped' + idIndex);
        $(element).addClass("dropped");
        idIndex++;
        $(this).append(element);
        $(element).draggable();
    } //drop object

  }); // droppable function
}); //document function
