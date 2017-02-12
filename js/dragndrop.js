$( function() {

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
        console.log(element.className);

        $(element).draggable({
          containment: 'parent'
        });
        $(element).resizable();

    } //drop object

  }); // droppable function

}); //document function
