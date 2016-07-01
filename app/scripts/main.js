"use strict";

function setFeedbackText(html_text) {
  $(".feedback").html(html_text);
}

function setFeedbackText(html_text) {
  $(".feedback").html(html_text);
}

function hideFeedback(){
  return $(".feedback").hide().animate({"opacity":"1"}, 400);
}

function showFeedback() {
  return $(".feedback").show().animate({"opacity":"1"}, 400);
}

function showLoader() {
  $(".submit i").removeAttr('class').addClass("fa fa-spin fa-spinner").css({"color":"#fff"});
}

function hideLoader() {
  $(".submit i").removeAttr('class').addClass("fa fa-long-arrow-right").css({"color":"#fff"});
}

function formSubmitSuccessActions(){
  $(".submit i").removeAttr('class').addClass("fa fa-check").css({"color":"#fff"});
  $(".submit").css({"background":"#2ecc71", "border-color":"#2ecc71"});
  setFeedbackText("login successful <br/>redirecting...");
  showFeedback().removeClass("error").css({"background": "#2ecc71"});;
  $("input").css({"border-color":"#2ecc71"});
}

function formSubmitErrorActions(errorText){
  setFeedbackText(errorText);
  showFeedback().css({"background": "#E84946"}).before();
  $(".feedback").addClass("error").delay(3000).fadeOut('slow');
}


function formInValidActions(){
  setFeedbackText("You missed something <br/>or entered wrong value ...");
  showFeedback().css({"background": "#E84946"}).before();
  $(".feedback").addClass("error").delay(3000).fadeOut('slow');
}


$(function() {

  console.log('Welcome to 91springboard Captive Portal Login Console');

  if (errorMessage){
    console.log(errorMessage);
    formSubmitErrorActions(errorMessage);
  }

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
