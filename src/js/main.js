( function( $ ) {
    //update Grunt package: does not support let
    var portExpandBtns = document.querySelectorAll( '.port-more-btn' );

    if ( !portExpandBtns ) {
        return;
    }

    for ( var i = 0; i < portExpandBtns.length; ++i ) {
        portExpandBtns[i].addEventListener( 'click', expandPortContent );
    }


    //@todo: Accessibility for expand/collapse
    function expandPortContent ( e ) {
        e.preventDefault();
        var contentPostId = this.getAttribute( 'data-id' );

        if ( !contentPostId ) {
            return;
        }

        var content = document.getElementById( 'port-content-' + contentPostId );

        if ( !content.classList.contains( 'expand' ) ) {
            content.classList.add( 'expand' );
            $( content ).slideDown();
        } else {
            content.classList.remove( 'expand' );
            $( content ).slideUp();
        }
    }


} )( jQuery );
