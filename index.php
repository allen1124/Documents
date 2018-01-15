<?php require "login/loginheader.php";

if ($_SESSION['access'] == 1){
  header("Refresh:2; url=centre.php");
}else if ($_SESSION['access'] == 2){
    $TID = $_SESSION['username'];
    header("Refresh:2; url=group2.php?tid=$TID");
}else if ($_SESSION['access'] == 3){
    echo "<div class='alert alert-success'><strong>Development in progress</strong>.</div>";
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="css/main.css" rel="stylesheet" media="screen">
  </head>
  <body>
    <div class="container">
      <div class="form-signin">
        <div class="alert alert-success">You have been <strong>successfully logged in. Loading to the system</strong>.</div>
        
        <a href="login/logout.php" class="btn btn-default btn-lg btn-block">Logout</a>
      </div>
    </div> <!-- /container -->
  </body>
</html>
