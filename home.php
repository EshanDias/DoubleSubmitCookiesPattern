<?php
  session_start();
  if(!isset($_COOKIE['sessionId'])) {
    // if session is not available redirect to the login page.
    header("Location: login.php");
  }
?>
<html>
  <head>
    <title>Double Submit Cookie Pattern</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
      function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for(var i = 0; i <ca.length; i++) {
          var c = ca[i];
          while (c.charAt(0) == ' ') {
              c = c.substring(1);
          }
          if (c.indexOf(name) == 0) {
              return c.substring(name.length, c.length);
          }
        }
        return "";
      }

      $(document).ready(function() {
          document.myForm.token.value = getCookie("CSRFToken");
      });
    </script>
  </head>

  <body>
    <h3>HOME</h3>
    <form name="myForm" method="POST" action="result.php">
      <input type="text" name="content" placeholder="Enter your name here"><br/><br/>
      <input type="hidden" name="token" value=""/><br/>
      <input type="submit" value="UPDATE"/>
    </form>

    

  </body>
</html>
