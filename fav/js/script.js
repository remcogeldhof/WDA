
$(document).ready(function() {
       document.getElementById('button').onclick = function() {
           $(this).hide(); // verbergen we het formulier
           $('body').append($('<p><span class="glyphicon glyphicon-star"></span></p>'));
       };
});