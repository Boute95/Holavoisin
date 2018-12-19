function printAds() {

    var ajax = new XMLHttpRequest();
    var type = $("input[name='type']:checked").val();
    console.log(type);
    var ville = $('#ville').val();
    var search = $('#search').val();
    
    ajax.onreadystatechange = function() {
	
	if (this.readyState == 4 && this.status == 200) {
	    
	    var resQuery = JSON.parse(this.responseText);
	    var html = "";
	    var maxCharInDescription = 75;

	    if(resQuery === null || resQuery === false) {
		html = "<p class='h4 mx-auto text-center'>Désolé, aucune annonce n'a été trouvée</p>";
	    }

	    else {

		for(var tuple of resQuery) {

		    var id = tuple['id'];
		    var img = tuple['imagePath'];
		    var nom = tuple['nom'];
		    var description = tuple['description'];
		    var prix = tuple['prix'];
		    var localisation = tuple['localisation'];

		    // Limite le nombre de caracteres et garde seulement la premmiere ligne
		    description = description
			.substring(0, maxCharInDescription)
			.split(/(\n|<\/br>|<br>)/)[0];
		    
		    if(description.length < tuple['description'].length) {
			description += '[...]';
		    }

		    html +=
	    		"<div class='col-12 col-lg-4 mb-5'>" +
			"<a class='card mx-auto' style='max-width: 24rem;' href='" +
			"page-ad.php?id=" + id + "'>" +
  			"<div class='card-img-top'>" +
			"<div class='card-img-top-child' style='background-image: url(" +
			img + ");'>" +
			"</div>" +
			"</div>" +
  			"<div class='card-body'>" +
			"<h5 class='card-title'>" + nom + "</h5>" +
    			"<div class='card-text'>" +
			"<div class='row mb-2 font-italic pb-2 border-bottom border-secondary'>" +
			"<div class='col-6'>" + "20/12/2018" + "</div>" +
			"<div class='col-6'>" + localisation + "</div>" +
			"</div>" +
			"<div class='row'>" + description +
			"<div class='mx-auto mt-2 mb-0 card-prix'>" + prix + "€</div>" +
			"</div>" +
			"</div>" +
			"</div>" +
			"</a>" +
			"</div>";
		    
		} // end for
		
	    }// end else
	    
	    $('#container-ads').html(html);
	    
	}
    };

    ajax.open('GET','../applications/printAds.php?type=' + type + '&s=' + search + '&v=' + ville);
    ajax.send();
    
}
