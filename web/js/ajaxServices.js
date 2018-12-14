function printAds() {

    var ajax = new XMLHttpRequest();
    var type = 'objet';
    var s = '';

    ajax.onreadystatechange = function() {
	
	if (this.readyState == 4 && this.status == 200) {
	    
	    var resQuery = JSON.parse(this.responseText);
	    var html = "";

	    if(resQuery === null) {
		html = "<p class='h4 mx-auto text-center'>Désolé, aucune annonce n'a été trouvée</p>";
	    }

	    else {

		for(var tuple of resQuery) {
		    html +=
	    		"<div class='col-12 col-lg-4 mb-5'>" +
			"<a class='card mx-auto' style='max-width: 24rem;' href='#'>" +
  			"<div class='card-img-top'>" +
			"<div class='card-img-top-child' style='background-image: url();'>" +
			"</div>" +
			"</div>" +
  			"<div class='card-body'>" +
			"<h5 class='card-title'></h5>" +
    			"<p class='card-text'>" +
			"<div class='row'>" +
			"<p class='mx-auto mt-1 mb-0 card-prix'>€</p>" +
			"</div>" +
			"</p>" +
			"</div>" +
			"</a>" +
			"</div>";
		} // end for
		
	    }// end else
	    
	    $('#container-ads').html(html);
	    
	}
    };

    ajax.open('GET','../applications/printAds.php?type=' + type + '&s=' + s);
    ajax.send();
    
}
