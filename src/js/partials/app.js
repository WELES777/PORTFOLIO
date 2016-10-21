$(window).on('load', function() {
  // Preloader
  $('#status').fadeOut();
  $('#preloader').delay(150).fadeOut('slow');
  $('body').delay(350).css({ 'overflow': 'visible' });


});

$(document).ready(function() {
  // Fallback request (AJAX) get-in-touch

  $('#somebut').bind('click', formSubmit);

  function formSubmit(event) {
    event.preventDefault();
    // $(".btn").parent("form").submit();

    $.ajax({
        type: 'POST',
        url: 'php/mailer.php',
        data: $('.ajax-contact').serialize()
      })
      .done(function(response) {
        $('.tempo').removeClass('ui-state-active');
        $('.tempo').addClass('ui-state-focus');
        $('.tempo').fadeIn(400, function() {
          $('.form-messages').css("visibility", "visible");
          $('.tempo p').text(response);
          $('.tempo').fadeOut(7000, function() {
            $('.form-messages').css("visibility", "hidden");
            $('.fade').addClass('.hiddes');
          });
        });
        // Clear the form.
        $('#con-name').val('');
        $('#con-email').val('');
        $('#con-message').val('');

      })
      .fail(function(data) {

        $('.tempo').removeClass('ui-state-focus');
        $('.tempo').addClass('ui-state-active');
        $('.tempo').fadeIn(400, function() {
          $('.form-messages').css("visibility", "visible");
          if (data.responseText !== '') {
            $('.tempo p').text(data.responseText);
          } else {
            $('.tempo p').text('Oops! An error occured and your message could not be sent.');
          }
          $('.tempo').fadeOut(7000, function() {
            $('.form-messages').css("visibility", "hidden");

          });
        });

      });


  };
  // Fallback form about
  $('#somebuts').bind('click', formSubmits);

  function formSubmits(event) {
    event.preventDefault();
    // $(".btn").parent("form").submit();

    $.ajax({
        type: 'POST',
        url: 'php/mailer.php',
        data: $('.ajax-contacts').serialize()
      })
      .done(function(response) {
        $('.tempos').removeClass('ui-state-active');
        $('.tempos').addClass('ui-state-focus');
        $('.tempos').fadeIn(400, function() {
          $('.form-messagess').css("visibility", "visible");
          $('.tempos p').text(response);
          $('.tempos').fadeOut(7000, function() {
            $('.form-messagess').css("visibility", "hidden");

          });
        });
        // Clear the form.
        $('#fin-name').val('');
        $('#fin-email').val('');
        $('#fin-message').val('');
      })
      .fail(function(data) {
        $('.tempos').removeClass('ui-state-focus');
        $('.tempos').addClass('ui-state-active');
        $('.tempos').fadeIn(400, function() {
          $('.form-messagess').css("visibility", "visible");
          if (data.responseText !== '') {
            $('.tempos p').text(data.responseText);
          } else {
            $('.tempos p').text('Oops! An error occured and your message could not be sent.');
          }
          $('.tempos').fadeOut(7000, function() {
            $('.form-messagess').css("visibility", "hidden");

          });
        });

      });


  };



  // Opinion form
  $('#somebutx').bind('click', formSubmitx);

  function formSubmitx(event) {
    event.preventDefault();

    $('#load_op').show();
    $('.send-button').hide();
    $.ajax({
        type: 'POST',
        url: 'php/opinions.php',
        data: $('.ajax-contactx').serialize()
      })
      .done(function(response) {
        $('#load_op').hide();
        $('.send-button').css('background-color', '#FFFFFF').show();
        $('#modal_form')
          .animate({ opacity: 0, top: '45%' }, 200,
            function() {
              $('#overlay, modal_form').css('display', 'none');
              $('#overlay').fadeOut(400);
            }
          );

      })
      .fail(function(data) {
        $('#load_op').hide();
        $('.send-button').css('background-color', '#E21C22').show();


      });


  };

  // Exit-intent pop-up
  function stayOnPage(event) {
    // event.preventDefault();
    $('#overlay').fadeIn(400,
      function() {
        $('#modal_form')
          .css('display', 'block')
          .animate({ opacity: 1, top: '30%' }, 200);
      });
  };
  setTimeout(stayOnPage, 120000);
  //   var inFormOrLink;
  // $('a').on('click', function() { inFormOrLink = true; });
  // $('form').on('submit', function() { inFormOrLink = true; });

  // $(window).on("beforeunload", function() {
  //     return inFormOrLink ? "Do you really want to close?" : null;
  // }) ???
  $('#modal_close, #overlay').click(function() {
    $('#modal_form')
      .animate({ opacity: 0, top: '45%' }, 200,
        function() {
          $(this).css('display', 'none');
          $('#overlay').fadeOut(400);
        }
      );
  });
  // Language bar
  $("ul[role='option'] > li > a[data-option='pl_PL']").trigger();
  $("ul[role='option'] > li > a[data-option='en_US']").trigger();




});
