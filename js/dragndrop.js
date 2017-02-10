$( function() {



  $( "#textblock" ).draggable({
    helper: 'clone'
  }); // draggable function

  var i = 0;

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

        var element = $(ui.helper).clone();
        $(element).attr('id', 'dropped' + i);
        $(element).addClass("dropped");
        i++;

        $(this).append(element);

        $(element).draggable();
        $(element).resizable();

    } //drop object

  }); // droppable function

}); //document function
