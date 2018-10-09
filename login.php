<?php
  if(isset($_POST['username'], $_POST['password'])) {
    if ($_POST['username'] == "Admin" && $_POST['password'] == "1234") {
      session_start();
      setcookie("sessionId", session_id());
      $_SESSION['token'] = base64_encode(openssl_random_pseudo_bytes(28));
      setcookie("CSRFToken", $_SESSION['token']);
      header('Location: home.php');
    } else {
      echo("Incorreect username or password <br/>");
    }
  }
?>

<html>
  <head>
    <title>Double Submit Cookie Pattern</title>
  </head>

  <body>
    <h3>Login</h3>
    <form method="POST" action="">
      <input type="text" name="username" placeholder="Username (Admin)"><br/><br/>
      <input type="password" name="password" placeholder="Passsword (1234)"><br/>
      <button type="submit">Login</button>
    </form>
  </body>
</html>