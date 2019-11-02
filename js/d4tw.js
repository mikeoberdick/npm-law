jQuery(function($){

//Automatically generate filler content height to ensure footer is on bottom of the page
$(document).ready(function() {
	$('#js-heightControl').css('height', $(window).height() - $('html').height() +'px');
});

//Dropdown on hover
$('ul.navbar-nav li.dropdown').hover(function() {
	$(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
}, function() {
	$(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
});

//Name Sorter to run on Attorney and Paralegal page
var terms = $(".professional .name").sort();
var letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
				
for ( var i = 0; i < letters.length; i++ ) {
	var nextChar = letters.charAt(i);

	// Need to find first of each letter
	var foundOne = -999;
    for (var j = 0; j < terms.length; j++) {
        var termj = terms[j].innerText;
        var n = termj.split(" ");
    	var lastName = n[n.length - 1];
        var termJJ = lastName.toUpperCase();
        if (termJJ.charAt(0) == nextChar) {
            foundOne = j;
            break;
        }
    }

    // Create links and anchors based on whether something was found
    if (foundOne == -999) {

    // Create a new letterLink (with class "entriesAbsent")
    newLetterLink = "<span class=\"letterLinkSpan\"><a class=\"letterLink entriesAbsent\">" + nextChar + "</a></span>";

	} else {

    // Create a new letterLink (with class "entriesPresent")
    newLetterLink = "<span class=\"letterLinkSpan\"><a class=\"letterLink entriesPresent\" href=\"#" + nextChar + "\">" + nextChar + "</a></span>";

    // Create an anchor for the letterLink BEFORE the first glossary term starting with that letter
    $("<a class=\"letterAnchor\" name=\"" + nextChar + "\">").insertBefore(terms[foundOne]);
    $("a[name=" + nextChar + "]").html(nextChar);
    $('.letterAnchor').each(function() {
    $(this).parent().parent().before(this);
})
	}

    // Either way, add the letterLink to the list of letterLinks
    $("#quickLinks").append(newLetterLink);
}

//end of file
});