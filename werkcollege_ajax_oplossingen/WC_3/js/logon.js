$(document).ready(function(){
  $('#loginForm').submit(function(e){
    e.preventDefault();
    if($('#name').val() !== ''){
      document.cookie = "name=" + $('#name').val();
      document.location.href = 'chat.html';
    }
  });
});