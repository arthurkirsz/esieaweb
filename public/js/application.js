$(document).ready(function() {

    $(".profile").mouseover(function(event) {
    	$(".account-menu").fadeIn();
    }).mouseout(function(event) {
    	setTimeout( function () {
    		$(".account-menu").fadeOut();
    	}, 3000);
    });;

});
