<?php
include "config.php";
//isset($_GET["message"]);
if (isset($_SESSION["access"])) {
  $_SESSION["access"] = 0;
};
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/login.css">
    <title>Document</title>
</head>
<body>
      <nav style="display: flex; justify-content: flex-end;" class="container navbar navbar-light bg-light">
        <a class="btn btn-outline-primary" href="index.php">Home</a>
    </nav>

  <div class="wrapper">
    <form class="form-signin" action="handler.php" method="post">
      <h2 class="form-signin-heading">Please login</h2>
   		

      <?php if (isset($_GET["message"])) : ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $_GET["message"]; ?>
        </div>
		  <?php endif; ?>


      <input type="text" class="form-control" name="username" placeholder="Email Address" required="" autofocus="" />
      <input type="password" class="form-control" name="password" placeholder="Password" required=""/>
        <input type="hidden" id="custId" name="command" value="login">
      <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
    </form>
  </div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>