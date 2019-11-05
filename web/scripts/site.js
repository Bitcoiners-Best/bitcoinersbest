$( document ).ready(function() {

  $("#resitem-res_type_id").change(function(){
      $(this).find("option:selected").each(function(){
          var optionValue = $(this).attr("value");
          if(optionValue){
              $(".resource-type").not("." + optionValue).hide();
              $("." + optionValue).show();
          } else{
              $(".resource-type").hide();
          }
      });
  }).change();

});


// Class Helper Functions

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
 has: hasClass,
 add: addClass,
 remove: removeClass,
 toggle: toggleClass
};

// transport
if ( typeof define === 'function' && define.amd ) {
 define( classie );
} else {
 window.classie = classie;
}
})( window );

// Modal Effects

var ModalEffects = (function() {
 function init() {
   var overlay = document.querySelector( '.overlay-module' );
   [].slice.call( document.querySelectorAll( '.overlay-trigger' ) ).forEach( function( el, i ) {
     var modal = document.querySelector( '#' + el.getAttribute( 'data-modal' ) ),
       close = modal.querySelector( '.close-modal' );

     function removeModal( hasPerspective ) {
       classie.remove( modal, 'modal-show' );
     }

     function removeModalHandler() {
       removeModal( classie.has( el, 'md-setperspective' ) );
     }

     el.addEventListener( 'click', function( ev ) {
       classie.add( modal, 'modal-show' );
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
