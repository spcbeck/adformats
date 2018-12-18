import $ from 'jquery'

$('#loginform').prepend('<h2 class="h5">Login Portal</h2><p class="h3">Browse Pixability\'s available video ad inventory and view specifications and requirements.</p>');

document.querySelector(".card-flip").classList.toggle("flip");

$(document).ready(function() {
  $('.flip').each(function() {
    console.log("okay");
    var frontHeight = $(this).find('.front').height();
    var backHeight = $(this).find('.back').height();

    if(frontHeight >= backHeight)
      $(this).height(frontHeight);
    else 
      $(this).height(backHeight);
  })
    console.log("yeah");
})