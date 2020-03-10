( function() {
    //update Grunt package: does not support let
    var portExpandBtns = document.querySelectorAll( '.port-more-btn' );

    if ( !portExpandBtns ) {
        return;
    }

    console.log(portExpandBtns);

    for ( var i = 0; i < portExpandBtns.length; ++i ) {
        portExpandBtns[i].addEventListener( 'click', expandPortContent );
    }

    function expandPortContent ( e ) {
        e.preventDefault();
        console.log(event);
    }
} )();
