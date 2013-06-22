var scmodel;

$(function () {
  var contactContainer = $('#webindex-container-contact');
  var aboutContainer = $('#webindex-container-about');

  var contactButton = $('#webindex-link-contact');
  var aboutButton = $('#webindex-link-about');

  var aboutClose = $('#webindex-icon-close');
  var contactClose = $('#webindex-icon-contact-close');

  var containers = $('.webindex-container');
  var loading = $('#loading');

  

  /* Setup the environment */
  var clear = function () {
    contactContainer.hide();
    aboutContainer.hide();
  };

  contactButton.on('click', function () {
    clear();
    contactContainer.show();
  });

  aboutButton.on('click', function () {
    clear();
    aboutContainer.show();
  });

  aboutClose.on('click', function () {
    aboutContainer.hide();
  });

  contactClose.on('click', function () {
    contactContainer.hide();
  });

  containers.on('mousewheel', function (event) {
    event.stopPropagation();
  });

  $(document).on('keyup', function (event) {
    if(event.keyCode == 27) {
      clear();
    }
  });

});