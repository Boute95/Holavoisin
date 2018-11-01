function enleverMsgInscrit() {
    $('#bg-accueil-assombri').css({display: 'none'});
    $('#message-user-inscrit').css({display: 'none'});
}


$(document).ready(function(){


    let url = window.location.pathname + window.location.search;
    let expr = /accueil.php\?inscrit/;
    let isInscrit = false;
    if(url.search(expr) != -1) {
	isInscrit = true;
    }

    if(isInscrit) {
	$('#bg-accueil-assombri').css({display: 'block'});
	$('#message-user-inscrit').css({display: 'block'});
    }
 
    
});
