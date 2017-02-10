$( function() {



  $( "#textblock" ).draggable({
    helper: 'clone'
  }); // draggable function

    $( "#mid-div" ).droppable({
      accept: "#textblock",
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
        var idIndex = 0;
        var element = $(ui.draggable).clone();
        $(element).attr('id', 'dropped' + idIndex);
        $(element).addClass("dropped");

        $(this).append(element);
        idIndex++;
        $(element).draggable();
        $(element).resizable();

    } //drop object

  }); // droppable function

}); //document function
