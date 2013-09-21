// JavaScript Document

/* Menu Functions */
$( document ).ready( function( ) {
    $( "#nav li" ).click( function( ) {
        $( ".active" ).removeClass( "active" );
        $( this ).addClass( "active" );
    } );
    $( "#logo" ).click( function( ) {
        $( ".active" ).removeClass( "active" );
    } );
    $( "#t_bio" ).live( "click", function( ) {
        $( ".bactive" ).removeClass( "bactive" );
        $( this ).addClass( "bactive" );
    } );
    $( "#t_att" ).live( "click", function() {
        $( ".bactive" ).removeClass( "bactive" );
        $( this ).addClass( "bactive" );
    } );
} );
/* Content */
jQuery.fn.center = function( ) {
    this.css( "position", "absolute" );
    this.css( "top", Math.max( 0, ( ( $( window ).height( ) - $( this ).outerHeight( ) ) / 2 ) +
            $( window ).scrollTop( ) ) + "px" );
    this.css( "left", Math.max( 0, ( ( $( window ).width( ) - $( this ).outerWidth( ) ) / 2 ) +
            $( window ).scrollLeft( ) ) + "px" );
    return this;
};
$( document ).ready( function( ) {
    $( "#content" ).center( true );
    $( window ).resize( function( ) {
        $( "#content" ).center( true );
    } );
} );
$( window ).load( function( ) {
    $( "#content" ).center( true );
    $( window ).resize( function( ) {
        $( "#content" ).center( true );
    } );
} );
/* Gallery */
$( document ).ready( function( e ) {
    var oldSrc;
    $( ".grey2color" ).live( {
        mouseenter:
                function( ) {
                    oldSrc = $( this ).attr( "src" ).substring( 0, $( this ).attr( "src" ).length - 4 );
                    $( this ).attr( "src", oldSrc + "-color.jpg" );
                },
        mouseleave:
                function( ) {
                    $( this ).attr( "src", oldSrc + ".jpg" );
                }
    }
    );
} );

/* Progress Bar */
$( document ).ready( function( e ) {
    var progress = $( '#progress' ),
            slideshow = $( '.cycle-slideshow' );
    slideshow.on( 'cycle-initialized cycle-before', function( e, opts ) {
        progress.stop( true ).css( 'width', 0 );
    } );
    slideshow.on( 'cycle-initialized cycle-after', function( e, opts ) {
        if ( !slideshow.is( '.cycle-paused' ) )
            progress.animate( { width: '100%' }, opts.timeout, 'linear' );
    } );
    slideshow.on( 'cycle-paused', function( e, opts ) {
        progress.stop( );
    } );
    slideshow.on( 'cycle-resumed', function( e, opts, timeoutRemaining ) {
        progress.animate( { width: '100%' }, timeoutRemaining, 'linear' );
    } );
} );
/* Mail*/
$( document ).ready( function( ) {
    $( '#mail' ).click( function( ) {
        $.blockUI( { message: $( '#mail_form' ) } );
        $( '.blockOverlay' ).click( $.unblockUI );
    } );
} );
/* Contatti */
$( document ).ready( function( ) {
    $( '#contatti' ).click( function( ) {
        $.blockUI( { message: $( '#contacts' ),
            css: {
                top: ( $( window ).height( ) - 400 ) / 2 + 'px',
                left: ( $( window ).width( ) - 400 ) / 2 + 'px',
                width: '400 px',
                height: '400 px'
            }
        } );
        $( '.blockOverlay' ).click( $.unblockUI );
        $( '#chiudi' ).click( $.unblockUI );
    } );
} );