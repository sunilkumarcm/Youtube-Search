$(document).ready(function() {
    $('#youtube_search_result').DataTable({
    	"processing": true
    });

});

$(document).ready(function() {
    $( "#q" ).keyup(function() {
    	value = $(this).val();
	  	var minlength = 3;
	   	if (value.length >= minlength ) {
	        const makeCallback = script => response => {
			  	document.head.removeChild(script)
			  	var a = response[1];
			  	var li = '';
			  	$.each(a, function( index, value ) {
				  li += '<li><a onclick="getValue(this);">'+value[0]+'</a></li>';
				});
				if(li != ''){
					$('#results').html(li);
					$('#results').css('display','block');
				}

			}

			let s = document.createElement('script')
			s.charset = 'utf-8'
			s.src = 'https://suggestqueries.google.com/complete/search?client=youtube&ds=yt&q='+value+'&callback=suggestCallback'
			window.suggestCallback = makeCallback(s)
			document.head.appendChild(s)
	    }
	});
});

function getValue(a){
	$('#results').css('display','none');
	$('#q').val(a.innerHTML);
}

