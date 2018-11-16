$().ready(function() {

  $("#continuer1").on("click", function(){

    console.log("CLICK");
      $("#form-type").animate({
        left: '0',
      }, 600);
  });

});
