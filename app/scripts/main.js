"use strict";

console.log('Welcome to 91springboard Captive Portal Login');

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

$(function() {

  if(get_param("res") == "failed"){
    formSubmitErrorActions();
  }

  $("#userForm").attr("action", "http://"+ get_param("sip") + ":9997/login");


}());

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

function formSubmitErrorActions(){
  setFeedbackText("Something went wrong or you missed something<br/>Please try again...");
  showFeedback().css({"background": "#E84946"}).before();
  $(".feedback").addClass("error").delay(3000).fadeOut('slow');
}

function formInValidActions(){
  setFeedbackText("You missed something <br/>or entered wrong value ...");
  showFeedback().css({"background": "#E84946"}).before();
  $(".feedback").addClass("error").delay(3000).fadeOut('slow');
}

function get_param(name) {
  if (location.href.indexOf("?") >= 0)
  {
    var query=location.href.split("?")[1];
    var params=query.split("&");
    for (var i = 0; i < params.length; i ++) {
      var value_pair=params[i].split("=");
      if (value_pair[0] == name)
        return decodeURIComponent(value_pair[1]);
    }
  }
  return "";
}
