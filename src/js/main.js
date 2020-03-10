( function() {
    //update Grunt package: does not support let
    var morePortContentBtns = document.querySelectorAll( '.port-more-btn' );

    if ( !morePortContentBtns ) {
        return;
    }

    console.log(morePortContentBtns);

    morePortContentBtns.forEach( function( morePortContentBtn ) {
        morePortContentBtn.addEventListener( 'click', expandPortContent );
    });

    function expandPortContent ( event ) {
        console.log(event);
    }
} )();
