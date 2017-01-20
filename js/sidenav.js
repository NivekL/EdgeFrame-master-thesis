$(function opentab(){
  $("#openbtn").on("click", function(){
      $("#sidepanel").css("width", "250px");
      $("#move").css("margin-left", "250px");
    });
});

$(function closetab(){
  $("#closebutton").on("click", function(){
      $("#sidepanel").css("width", "0px");
      $("#move").css("margin-left", "0px");
    });
});
