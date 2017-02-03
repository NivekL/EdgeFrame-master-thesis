$(function opentab(){
  $("#openbtn").on("click", function(){
      $("#sidepanel").css("width", "250px");
      $("body").css("margin-left", "250px");
    });
});

$(function closetab(){
  $("#closebutton").on("click", function(){
      $("#sidepanel").css("width", "0px");
      $("body").css("margin-left", "0px");
    });
});
