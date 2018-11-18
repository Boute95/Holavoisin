$().ready(function() {

  $("#continuer1").on("click", function(){

      $("#form-type").css({
	  left: '-100px',
	  transform: 'translate(-100%, -50%)'
      });

      $('#form-objet').css({
	  left: '50%',
	  transform: 'translate(-50%, -50%)'
      })
  });

});
