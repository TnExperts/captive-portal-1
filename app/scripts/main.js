"use strict";

function setFeedbackText(html_text) {
  $(".feedback").html(html_text);
}

function formInValidActions(){
  setFeedbackText("You missed something <br/>or entered wrong value ...");
  showFeedback().css({"background": "#E84946"}).before();
  $(".feedback").addClass("error").delay(3000).fadeOut('slow');
}


$(function() {

  console.log('Welcome to 91springboard Captive Portal Login Console');

  $( ".input" ).focusin(function() {
    $( this ).find( "span" ).animate({"opacity":"0"}, 200);
  });

  $( ".input" ).focusout(function() {
    $( this ).find( "span" ).animate({"opacity":"1"}, 300);
  });

  $('#userForm').validator('validate').on('submit', function (event) {
    if (event.isDefaultPrevented()) {
      // handle the invalid form
      formInValidActions();
    }
  });
  

}());
