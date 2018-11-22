$().ready(function() {

  var selectedType;

    $("#continuer1").on("click", function(){

      // Get the selected type
      if(document.getElementById('type-objet').checked) {
        selectedType = 'objet';
      }
      else {
        selectedType = 'service';
      }

      $("#form-type").css({
	  left: '-100px',
	  transform: 'translate(-100%, -50%)'
      });

      $('#form-' + selectedType).css({
	  left: '50%',
	  transform: 'translate(-50%, -50%)'
  });

    });

    $(".retour").on('click', function(){

	$("#form-type").css({
	    left: '50%',
	    transform: 'translate(-50%, -50%)'
	});

	$('#form-' + selectedType).css({
	    transform: 'translate(110vw, -50%)'
	});

    });

});
