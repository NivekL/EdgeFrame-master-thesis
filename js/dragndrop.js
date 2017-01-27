$( function() {
  $( "#textblock" ).draggable({
    appendTo: "body",
    containment: "document",
    zIndex:100
  });

    $( "#mid-div" ).droppable({
      accept: "#textblock"
    });
} );
