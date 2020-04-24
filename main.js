$(document).ready(function() {
	/* change tab btn color  when click on it */
	$(".title").text("World");
	$(".btn-pref .btn").click(function () {
    $(".btn-pref .btn").removeClass("btn-primary").addClass("btn-default");
    // $(".tab").addClass("active"); // instead of this do the below 
    $(this).removeClass("btn-default").addClass("btn-primary");
    
   
});
	/* change tab text when clcik on it*/

	$("#world").click(function(){
		$(".title").text("World");
		// $("#wordlinput").hide();
	});
	$("#india").click(function(){
		$(".title").text("India");
	});


	window.alert = function(){};
        var defaultCSS = document.getElementById('bootstrap-css');
        function changeCSS(css){
            if(css) $('head > link').filter(':first').replaceWith('<link rel="stylesheet" href="'+ css +'" type="text/css" />'); 
            else $('head > link').filter(':first').replaceWith(defaultCSS); 
        }
        $( document ).ready(function() {
          var iframe_height = parseInt($('html').height()); 
          window.parent.postMessage( iframe_height, 'https://bootsnipp.com');
        });


        /* Nested Table For India Covid Data*/

		$('.accordion-toggle').click(function(){
			$('.hiddenRow').hide();
			$(this).next('tr').find('.hiddenRow').show();
		});     




});

/* for Particles */
window.onload = function() {
  Particles.init({
    selector: '.background'
  });
};

/* search filter for world*/

function worldFilter() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("wordlinput");
        filter = input.value.toUpperCase();
        table = document.getElementById("wordlTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
          td = tr[i].getElementsByTagName("td")[0];
          if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
              tr[i].style.display = "";
            } else {
              tr[i].style.display = "none";
            }
          }       
        }
      }


/* search filter for india*/
function indiaFilter() {

        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("indiainput");
        filter = input.value.toUpperCase();
        table = document.getElementById("indiaTable");
        tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
          td = tr[i].getElementsByTagName("td")[0];
          if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
              tr[i].style.display = "";
            } else {
              tr[i].style.display = "none";
            }
          }       
        }
      }


  