"use strict";

function setFeedbackText(html_text) {
  $(".feedback").html(html_text);
}

function setFeedbackText(html_text) {
  $(".feedback").html(html_text);
}

function hideFeedback(){
  return $(".feedback").hide().animate({"opacity":"0"}, 400);
}

function showFeedback() {
  return $(".feedback").show().animate({"opacity":"1"}, 400);
}

function hideLoader() {
  return $(".loader").hide().animate({"display":"none"}, 400);
}

function showLoader() {
  return $(".loader").show().animate({"display":"block"}, 400);
}

function showFormSuccess(successText){
  setFeedbackText(successText);
  showFeedback().removeClass("error").css({"background": "#2ecc71"});
  $(".feedback").addClass("success").delay(5000).fadeOut('slow');
}

function showFormError(errorText){
  setFeedbackText(errorText);
  showFeedback().css({"background": "#E84946"}).before();
  $(".feedback").addClass("error").delay(5000).fadeOut('slow');
}

function resetPasswordForm() {
  $('#changePasswordForm').clearForm().find('div.with-errors').html('');
}

$(function() {

  console.log('Welcome to 91springboard Captive Portal Login Console');

  $.fn.clearForm = function() {
    return this.each(function() {
      var type = this.type, tag = this.tagName.toLowerCase();
      if (tag == 'form')
        return $(':input',this).clearForm();
      if (type == 'text' || type == 'password' || tag == 'textarea')
        this.value = '';
      else if (type == 'checkbox' || type == 'radio')
        this.checked = false;
      else if (tag == 'select')
        this.selectedIndex = -1;
    });
  };

  if (errorMessage){
    console.log("Found error while login : " + errorMessage);
    showFormError(errorMessage);
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
      showFormError("Oops, You missed something.");
    }
  });

  var formActionUrl;
  if (isUserLoggedIn) {
    formActionUrl = 'http://' + hostname + '/logout';
  }
  else{
    formActionUrl = 'http://' + hostname + '/login';
  }

  if (hostname) {
    $("#userForm").attr("action", formActionUrl);
  }

  $('#change-password-modal').on('hide.bs.modal', function (e) {
    resetPasswordForm();
  });

  $('#changePasswordForm').validator('validate').on('submit', function (e) {

    if (e.isDefaultPrevented()) {
      // handle the invalid form...
    } else {
      e.preventDefault();

      var formData = $('#changePasswordForm').serialize();

      $('#change-password-modal').modal('hide');

      // show loader
      showLoader();

      $.post("http://radius.91springboard.com/admin/daloradius-users/change-auth-password.php", formData).done(function (res) {
        hideLoader();
        showFormSuccess('You login password changed successfully.');
      }).fail(function (error) {
        hideLoader();
        showFormError(error.responseText);
      });

    }
  });



}());
