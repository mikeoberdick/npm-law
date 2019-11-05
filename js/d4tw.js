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
var terms = $(".name");
console.log(terms);
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
        $(this).closest('.professional').before(this);
    })
}

    // Either way, add the letterLink to the list of letterLinks
    $("#quickLinks").append(newLetterLink);
}

/////////////////  BLOG POSTS AJAX FILTER  \\\\\\\\\\\\\\\\\

function get_posts($params) {

  $content   = $('#postContainer');

  $.ajax({
    url: psc.ajax_url,
    data: {
      action: 'do_filter_posts',
      nonce: psc.nonce,
      params: $params
    },
    type: 'post',
    dataType: 'json',
    success: function(data) {
        $content.html(data.content);
      }
  });
}

//Bind category links to get_posts function
$('body').on('click', '.year-choice', function(event) {
    alert('clicked');
  //kill the default click behavior
  if(event.preventDefault) { event.preventDefault(); }
    //Set the click element to a variable
    $this = $(this);

        //Find the previously active year and remove the .active class
        $this.closest('ul').find('.active-year').removeClass('active-year');
        //Add the .active class to the selected year
        $this.addClass('active-year');
        //Get the year for the query
        $year = $this.data('year');

      //Set the parameters for the new query
      $params = {
        'year' : $year,
      };

      // Run query
        get_posts($params);
    });

function get_more_posts($params) {
  $content   = $('#postContainer');
  var i = 1;
  $.ajax({
    url: psc.ajax_url,
    data: {
      action: 'do_filter_posts',
      nonce: psc.nonce,
      params: $params
    },
    type: 'post',
    dataType: 'json',
    success: function(data) {
        $content.html(data.content);
        $('html, body').animate({scrollTop: $("#main").offset().top}, 'slow');
      }
  });
}

//Bind category links to get_posts function
$('body').on('click', '.psc-pagination a', function(e) {
  //kill the default click behavior
  if(e.preventDefault) { e.preventDefault(); }
    //Set the click element to a variable
    $this = $(this);

      //Default pagination
        $page = parseInt($this.attr('href').replace(/\D/g,''));
        $this = $('.nav-filter .active a');

      //Set the parameters for the new query
      $params = {
        'page' : $page,
        'tax'  : $this.data('filter'),
        'term' : $this.data('term'),
        'qty'  : $this.closest('#container-async').data('paged'),
      };

      // Run query
        get_more_posts($params);
    });


//end of file
});