
( function( window ) {

'use strict';

function classReg( className ) {
 return new RegExp("(^|\\s+)" + className + "(\\s+|$)");
}

var hasClass, addClass, removeClass;

if ( 'classList' in document.documentElement ) {
 hasClass = function( elem, c ) {
   return elem.classList.contains( c );
 };
 addClass = function( elem, c ) {
   elem.classList.add( c );
 };
 removeClass = function( elem, c ) {
   elem.classList.remove( c );
 };
}
else {
 hasClass = function( elem, c ) {
   return classReg( c ).test( elem.className );
 };
 addClass = function( elem, c ) {
   if ( !hasClass( elem, c ) ) {
     elem.className = elem.className + ' ' + c;
   }
 };
 removeClass = function( elem, c ) {
   elem.className = elem.className.replace( classReg( c ), ' ' );
 };
}

function toggleClass( elem, c ) {
 var fn = hasClass( elem, c ) ? removeClass : addClass;
 fn( elem, c );
}

var classie = {
 // full names
 hasClass: hasClass,
 addClass: addClass,
 removeClass: removeClass,
 toggleClass: toggleClass,
 // short names
 has: hasClass,
 add: addClass,
 remove: removeClass,
 toggle: toggleClass
};

// transport
if ( typeof define === 'function' && define.amd ) {
 // AMD
 define( classie );
} else {
 // browser global
 window.classie = classie;
}

})( window );


var ModalEffects = (function() {
 function init() {
   var overlay = document.querySelector( '.overlay-module' );
   [].slice.call( document.querySelectorAll( '.overlay-trigger' ) ).forEach( function( el, i ) {
     var modal = document.querySelector( '#' + el.getAttribute( 'data-modal' ) ),
       close = modal.querySelector( '.close-modal' );

     function removeModal( hasPerspective ) {
       classie.remove( modal, 'md-show' );
     }

     function removeModalHandler() {
       removeModal( classie.has( el, 'md-setperspective' ) );
     }

     el.addEventListener( 'click', function( ev ) {
       classie.add( modal, 'md-show' );
       overlay.removeEventListener( 'click', removeModalHandler );
       overlay.addEventListener( 'click', removeModalHandler );

     });

     close.addEventListener( 'click', function( ev ) {
       ev.stopPropagation();
       removeModalHandler();
     });

   } );

 }

 init();

})();
