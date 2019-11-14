$( document ).ready(function() {
  // var api_url = 'http://bitcoinersbest.local:9111/v1/items'
  // var key = 'admin-bandit-authkey'
  // var output = '';
  //
  // $.ajax({
  //   url: api_url + "?access-token=" + key,
  //   contentType: "application/json",
  //     dataType: 'json',
  //     success: function(result){
  //       $.each(result, function(i, item) {
  //           output += '<div class="article-module d-flex bg-white br-4 mb-30">';
  //
  //           output += '<div class="flex-grow-1 align-self-center">';
  //           output += '<img src="'+item.image+'" class="card-img" alt="'+item.title+'">';
  //           output += '<h6 class="text-uppercase c-gray-1 medium mt-20 mb-10">'+item.title+'</h6>';
  //           output += '<h5 class="medium mb-10">'+item.title+'</h5>';
  //           output += '<h5 class="regular c-gray-1">'+item.description+'</h5>';
  //           output += '</div>';
  //
  //           output += '<div class="align-self-top pl-20">';
  //           output += '<div class="votes text-center">';
  //           output += '<h6 class="medium mb-5">'+item.vote_count+'</h6>';
  //           output += '<button class="btn bg-brand br-circle icon-wrap">';
  //           output += '<span class="icon a a-link plus rounded"></span>';
  //           output += '</button>';
  //           output += '</div>';
  //           output += '</div>';
  //
  //           output += '</div>';
  //       });
  //       jQuery('#module-container').html(output);
  //     }
  // })

    $('.vote').on('click', function(event){
        console.log("success");
        if ($(".vote-increment").css('opacity') == 0) $(".vote-increment").css('opacity', 1);
        else $(".vote-increment").css('opacity', 0);
    });

  // $("#resitem-res_type_id").change(function(){
  //     $(this).find("option:selected").each(function(){
  //         var optionValue = $(this).attr("value");
  //         if(optionValue){
  //             $(".resource-type").not("." + optionValue).hide();
  //             $("." + optionValue).show();
  //         } else{
  //             $(".resource-type").hide();
  //         }
  //     });
  // }).change();

});





jQuery(document).ready(function($){
	var animationDelay = 2500,
		barAnimationDelay = 3800,
		barWaiting = barAnimationDelay - 3000,
		lettersDelay = 50,
		typeLettersDelay = 150,
		selectionDuration = 500,
		typeAnimationDelay = selectionDuration + 800,
		revealDuration = 600,
		revealAnimationDelay = 1500;
	initHeadline();

	function initHeadline() {
		singleLetters($('.cycle.letters').find('b'));
		animateHeadline($('.cycle'));
	}

	function singleLetters($words) {
		$words.each(function(){
			var word = $(this),
				letters = word.text().split(''),
				selected = word.hasClass('is-visible');
			for (i in letters) {
				if(word.parents('.rotate-2').length > 0) letters[i] = '<em>' + letters[i] + '</em>';
				letters[i] = (selected) ? '<i class="in">' + letters[i] + '</i>': '<i>' + letters[i] + '</i>';
			}
		    var newLetters = letters.join('');
		    word.html(newLetters).css('opacity', 1);
		});
	}

	function animateHeadline($headlines) {
		var duration = animationDelay;
		$headlines.each(function(){
			var headline = $(this);

			if(headline.hasClass('loading-bar')) {
				duration = barAnimationDelay;
				setTimeout(function(){ headline.find('.cycle-wrapper').addClass('is-loading') }, barWaiting);
			} else if (headline.hasClass('clip')){
				var spanWrapper = headline.find('.cycle-wrapper'),
					newWidth = spanWrapper.width() + 10
				spanWrapper.css('width', newWidth);
			} else if (!headline.hasClass('type') ) {
				var words = headline.find('.cycle-wrapper b'),
					width = 0;
				words.each(function(){
					var wordWidth = $(this).width();
				    if (wordWidth > width) width = wordWidth;
				});
				headline.find('.cycle-wrapper').css('width', width);
			};
			setTimeout(function(){ hideWord( headline.find('.is-visible').eq(0) ) }, duration);
		});
	}

	function hideWord($word) {
		var nextWord = takeNext($word);

		if($word.parents('.cycle').hasClass('type')) {
			var parentSpan = $word.parent('.cycle-wrapper');
			parentSpan.addClass('selected').removeClass('waiting');
			setTimeout(function(){
				parentSpan.removeClass('selected');
				$word.removeClass('is-visible').addClass('is-hidden').children('i').removeClass('in').addClass('out');
			}, selectionDuration);
			setTimeout(function(){ showWord(nextWord, typeLettersDelay) }, typeAnimationDelay);

		} else if($word.parents('.cycle').hasClass('letters')) {
			var bool = ($word.children('i').length >= nextWord.children('i').length) ? true : false;
			hideLetter($word.find('i').eq(0), $word, bool, lettersDelay);
			showLetter(nextWord.find('i').eq(0), nextWord, bool, lettersDelay);

		}  else if($word.parents('.cycle').hasClass('clip')) {
			$word.parents('.cycle-wrapper').animate({ width : '2px' }, revealDuration, function(){
				switchWord($word, nextWord);
				showWord(nextWord);
			});

		} else if ($word.parents('.cycle').hasClass('loading-bar')){
			$word.parents('.cycle-wrapper').removeClass('is-loading');
			switchWord($word, nextWord);
			setTimeout(function(){ hideWord(nextWord) }, barAnimationDelay);
			setTimeout(function(){ $word.parents('.cycle-wrapper').addClass('is-loading') }, barWaiting);

		} else {
			switchWord($word, nextWord);
			setTimeout(function(){ hideWord(nextWord) }, animationDelay);
		}
	}

	function showWord($word, $duration) {
		if($word.parents('.cycle').hasClass('type')) {
			showLetter($word.find('i').eq(0), $word, false, $duration);
			$word.addClass('is-visible').removeClass('is-hidden');

		}  else if($word.parents('.cycle').hasClass('clip')) {
			$word.parents('.cycle-wrapper').animate({ 'width' : $word.width() + 10 }, revealDuration, function(){
				setTimeout(function(){ hideWord($word) }, revealAnimationDelay);
			});
		}
	}

	function hideLetter($letter, $word, $bool, $duration) {
		$letter.removeClass('in').addClass('out');

		if(!$letter.is(':last-child')) {
		 	setTimeout(function(){ hideLetter($letter.next(), $word, $bool, $duration); }, $duration);
		} else if($bool) {
		 	setTimeout(function(){ hideWord(takeNext($word)) }, animationDelay);
		}

		if($letter.is(':last-child') && $('html').hasClass('no-csstransitions')) {
			var nextWord = takeNext($word);
			switchWord($word, nextWord);
		}
	}

	function showLetter($letter, $word, $bool, $duration) {
		$letter.addClass('in').removeClass('out');

		if(!$letter.is(':last-child')) {
			setTimeout(function(){ showLetter($letter.next(), $word, $bool, $duration); }, $duration);
		} else {
			if($word.parents('.cycle').hasClass('type')) { setTimeout(function(){ $word.parents('.cycle-wrapper').addClass('waiting'); }, 200);}
			if(!$bool) { setTimeout(function(){ hideWord($word) }, animationDelay) }
		}
	}

	function takeNext($word) {
		return (!$word.is(':last-child')) ? $word.next() : $word.parent().children().eq(0);
	}

	function takePrev($word) {
		return (!$word.is(':first-child')) ? $word.prev() : $word.parent().children().last();
	}

	function switchWord($oldWord, $newWord) {
		$oldWord.removeClass('is-visible').addClass('is-hidden');
		$newWord.removeClass('is-hidden').addClass('is-visible');
	}
});


var animateButton = function(e) {

  e.preventDefault;
  e.target.classList.remove('animate');
  e.target.classList.add('animate');
  setTimeout(function(){
    e.target.classList.remove('animate');
  },700);
};

var bubblyButtons = document.getElementsByClassName("pop-button");

for (var i = 0; i < bubblyButtons.length; i++) {
  bubblyButtons[i].addEventListener('click', animateButton, false);
}




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
