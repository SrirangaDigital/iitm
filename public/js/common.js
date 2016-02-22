$(document).ready(function() {

    var isWider = $( '.wider' );
    isWider.next( '.container' ).addClass( 'push-down' );

    if(isWider.length) {
        $( window ).scroll(function() {

            var tp = $( 'body' ).scrollTop();

            if(tp > 50) {

                $( '.navbar' ).removeClass( 'wider') ;
            }
            else if(tp < 50) {
        
                $( '.navbar' ).addClass( 'wider') ;
            }
        }); 
    }

	// Hide all abstracts after pafe load    
    $( '.journal-article-list-abstract' ).hide();
    $( ".trigger-abstract" ).click(function() {
   		
   		var id = $(this).attr('id').replace('display_', 'abstract_')
    	$( '#' + id ).slideDown('slow');
    });

    $( '#togglePast' ).change(function() {

    	if($(this).is(":checked")) {

			$( '#type' ).val('.*');
    	}
    	else {

			$( '#type' ).val('^$|^honorary$');
    	}
    });
});
