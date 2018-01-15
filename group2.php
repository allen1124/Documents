<? 
  include "connect.php";
  $table = "group_list";
  $tid = $_GET['tid'];
  if ($tid != null){
    $mysql = mysqli_query($conn, "SELECT * FROM cllsc.$table WHERE tid = '$tid';");
  }else{
    $mysql = mysqli_query($conn, "SELECT * FROM cllsc.$table;");
  }
?>
<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://getbootstrap.com/favicon.ico">

    <title>SSP Information System</title>

    <!-- Bootstrap core CSS -->
    <link href="src/bootstrap.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="src/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="src/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="src/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">SSP Information System</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="attendence2.php">Attendence</a></li>
            <li><a href="group2.php?tid=<? echo $tid; ?>">Group List</a></li>
            <li><a href="../login/logout.php"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input class="form-control" placeholder="Search..." type="text">
          </form>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="attendence2.php">Attendence</a></li>
            <li class="active"><a href="group2.php?tid=<? echo $tid; ?>">Group List</a></li>
          </ul>

        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h3 class="page-header">Group List</h3>
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Centre/School</th>
                  <th>Enrolled</th>
                  <th>Venue</th>
                  <th>Tutor</th>
                  <th>Time</th>
                </tr>
              </thead>
              <tbody>
              <?
                  while ($infoArr = mysqli_fetch_assoc($mysql)) {
                    $cid = $infoArr['cid'];
                    $sql = "SELECT * FROM cllsc.centre_list WHERE cid = '$cid';";
                    $getName = mysqli_query($conn, $sql);
                    $schoolName = mysqli_fetch_assoc($getName);
                    $tid = $infoArr['tid'];
                    $tsql = "SELECT * FROM cllsc.account WHERE username = '$tid';";
                    $tName = mysqli_query($conn, $tsql);
                    $tutorName = mysqli_fetch_assoc($tName);
                    echo '<tr value="'.$infoArr['gid'].'">
                  <td>'.$infoArr['gid'].'</td>
                  <td>'.$schoolName['cname'].'</td>
                  <td>'.$infoArr['enroll'].'</td>
                  <td>'.$infoArr['venue'].'</td>
                  <td>'.$tutorName['cname'].'老師</td>
                  <td>'.$infoArr['time'].'</td>
                </tr>';

                  }
              ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="src/jquery.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="src/bootstrap.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="src/holder.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="src/ie10-viewport-bug-workaround.js"></script>
    <script type="text/javascript">
    	$('.table > tbody > tr').click(function(){
    		//row was clicked
    		var rowID = $(this).attr('value');
    		//console.log("row " + rowID + " was clicked");
    		window.location = "attendence2.php?type=group&id=" + rowID;
    	});
    </script>


</body></html>
