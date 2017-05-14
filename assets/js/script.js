(function() {
  'use strict';

  // MENU BUTTON
  $('.toggle-btn').on('click', () => {	
  	$('nav').toggleClass('onclick');
  });

  // CLOSE BUTTON
  $('.close-btn').on('click', () => {  
    $('nav').toggleClass('onclick');
  });


  // LOGGED IN ACCOUNT MENU
  $('.account .toggle-menu').on('click', () => {
  	$('.account .menu').toggle();
  });


	
})();
