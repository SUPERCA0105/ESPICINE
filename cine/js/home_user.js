$(document).ready(function(){
  $.ajax({
      url: 'home_usuario.php', // reemplaza esto con la ruta a tu archivo PHP
      type: 'GET',
      success: function(data) {
          var userData = JSON.parse(data);
          $('.name').first().text(userData.username);
          $('.name').last().text(userData.realname);
          $('.email').text(userData.email);
      },
      error: function(error) {
          console.log(error);
      }
  });
});