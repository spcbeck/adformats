import $ from 'jquery'
import {
    jarallax
} from 'jarallax';

if ($(window).width() < 768) {
  jarallax(document.querySelectorAll('.jarallax'), {
    imgPosition: '0 15px',
    imgSize: 'contain',
    speed: .7
  });
}


jarallax(document.querySelectorAll('.jarallax'), {
    imgPosition: '48vw -15px',
    imgSize: 'scale-down'
  });

$('#loginform').prepend('<h2 class="h5">Login Portal</h2><p class="h3">Browse Pixability\'s available video ad inventory and view specifications and requirements.</p>');

$(document).ready(function() {
  $('#filter').submit(function(event){
    event.preventDefault();
    var filter = $('#filter');
    $.ajax({
      url:filter.attr('action'),
      data:filter.serialize(), // form data
      type:filter.attr('method'), // POST
      beforeSend:function(xhr){
      },
      success:function(data){
        $('#response').html(data); // insert data
        $('.adformat-cards').each(function() {
          if(!$.trim($(this).html())) {
            $(this).prev().hide();
          }
        });
        document.querySelector(".card-flip").classList.toggle("flip");
        $('.card-flip').click(function() {
          $(this).toggleClass('hover');
        });
      }
    });
    return false;
  });

  $('#filter').submit();

  $('.card-flip').click(function() {
    $(this).toggleClass('hover');
  });

  $("a[href^=#]").click(function(e) {
    e.preventDefault();
    var dest = $(this).attr('href');
   $('html,body').animate({ scrollTop: $(dest).offset().top }, 'slow'); });

  document.querySelector( "#mobiletoggle" ).addEventListener( "click", function() {
      this.classList.toggle( "active" );
    });

    $("li.menu-item-has-children a").on('click touch', function () {
        if(!$(this).hasClass("active")) {
            $("li.menu-item-has-children .active").removeClass("active");
            $(this).addClass("active");
            $(this).next().addClass("active");
        } else {
            $(this).removeClass("active");
            $(this).next().removeClass("active");
        }
    })


    $('#mobiletoggle, #mobileclose').click(function(){
      $("#nav.mobile").toggleClass("on");
        return false;
    });

    $('#filter input[type=checkbox]').change(function() {
        if(this.checked) {
          $(this).prop("checked", true);
          $('#filter').submit();
        } else {
          $(this).prop("checked", false);
          $('#filter').submit();
        }
    });

})
