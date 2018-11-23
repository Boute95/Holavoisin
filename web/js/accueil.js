function enleverMsg() {
    $('#bg-accueil-assombri').css({display: 'none'});
    $('#message-user-inscrit').css({display: 'none'});
    $('#message-proposition').css({display: 'none'});
}


$(document).ready(function(){


    let url = window.location.pathname + window.location.search;
    let exprInscrit = /accueil.php\?inscrit/;
    let exprProposition = /accueil.php\?proposition/;
    let isInscrit = false;
    let isProposition = false;
    if(url.search(exprInscrit) != -1) {
	isInscrit = true;
    }
    else if (url.search(exprProposition) != -1) {
      isProposition = true;
    }

    if(isInscrit) {
	$('#bg-accueil-assombri').css({display: 'block'});
	$('#message-user-inscrit').css({display: 'block'});
    }

    if(isProposition) {
	$('#bg-accueil-assombri').css({display: 'block'});
	$('#message-proposition').css({display: 'block'});
    }


});
