<? 
 require "login/loginheader.php";
  include "connect.php";
  $table = "account";
  $mysql = mysqli_query($conn, "SELECT * FROM cllsc.$table;");
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
            <li><a href="index.html">Dashboard</a></li>
            <li><a href="attendence.php">Attendence</a></li>
            <li><a href="centre.php">Centre List</a></li>
            <li><a href="group.php">Group List</a></li>
            <li><a href="student.php">Student List</a></li>
            <li><a href="account.php">Account</a></li>
            <li><a href="#">Report</a></li>
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
            <li><a href="#">Dashboard<span class="sr-only">(current)</span></a></li>
            <li><a href="attendence.php">Attendence</a></li>
            <li><a href="centre.php">Centre List</a></li>
            <li><a href="group.php">Group List</a></li>
            <li><a href="student.php">Student List</a></li>
            <li class="active"><a href="account.php">Account</a></li>
            <li><a href="#">Report</a></li>
          </ul>

        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h3 class="page-header">Account&nbsp&nbsp&nbsp
            <button type="button" class = "btn btn-link" data-toggle="modal" data-target="#addAccount">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button>
          </h3>
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>cname</th>
                  <th>ename</th>
                  <th>username</th>
                  <th>access</th>
                  <th>edit</th>
                </tr>
              </thead>
              <tbody>
              <?
                  while ($centreArr = mysqli_fetch_assoc($mysql)) {
                    echo '<tr value="'.$centreArr['id'].'">
                  <td>'.$centreArr['id'].'</td>
                  <td>'.$centreArr['cname'].'</td>
                  <td>'.$centreArr['ename'].'</td>
                  <td>'.$centreArr['username'].'</td>
                  <td>'.$centreArr['access'].'</td>
                  <td>
                  <button type="button" class = "btn btn-link" data-toggle="modal" data-target="#editAccount"><span class="glyphicon glyphicon-pencil" aria-hidden="true" ></span>
                  </button></td>
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
<div class="modal fade" id="addAccount" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="formModalLabel">Add Account <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button></h4>
        
      </div>
      <div class="modal-body">
       <form>
  <div class="form-group">
    <label for="cname">姓名 (中文)</label>
    <input type="text" class="form-control" id="cname" aria-describedby="emailHelp" placeholder="輸入中文姓名">
  </div>
  <div class="form-group">
    <label for="ename">姓名 (英文)</label>
    <input type="text" class="form-control" id="ename" aria-describedby="emailHelp" placeholder="Enter Your Name">
  </div>
  
  <div class="form-group">
    <label for="gender">Gender</label>
    <select class="form-control" id="gender">
      <option>-- Gender --</option>
      <option value="M">M</option>
      <option value="F">F</option>
    </select>
  </div>
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Enter Username">
  </div>
  <div class="form-group">
    <label for="pwd">Password</label>
    <input type="password" class="form-control" id="pwd" aria-describedby="emailHelp" >
  </div>
  
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="editAccount" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="formaModalLabel">Edit Account <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button></h4>
        
      </div>
      <div class="modal-body">
      <form>
   <div class="form-group">
    <label for="cname">姓名 (中文)</label>
    <input type="text" class="form-control" id="cnameU" aria-describedby="emailHelp" placeholder="輸入中文姓名">
  </div>
  <div class="form-group">
    <label for="ename">姓名 (英文)</label>
    <input type="text" class="form-control" id="enameU" aria-describedby="emailHelp" placeholder="Enter Your Name">
  </div>
  
  <div class="form-group">
    <label for="gender">Gender</label>
    <select class="form-control" id="genderU">
      <option>-- Gender --</option>
      <option value="M">M</option>
      <option value="F">F</option>
    </select>
  </div>
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" id="usernameU" aria-describedby="emailHelp" placeholder="Enter Username">
  </div>
  <div class="form-group">
    <label for="pwdU">Password</label>
    <input type="password" class="form-control" id="pwdU" aria-describedby="emailHelp" >
  </div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="delete" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
        <button type="button" id="update" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

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
      
      $("#submit").click(function(e){
        e.preventDefault();
        console.log("submit");
        $.ajax({
          type: "POST",
          url: "account_add_action.php",
          data: {
            ename: $("#ename").val(),
            cname: $("#cname").val(),
            gender: $("#gender").val(),
            username: $("#username").val(),
            pwd: $("#pwd").val(),

          },
          dataType: "json",
          success: function(data){
            console.log(data);
            $("#addAccount").modal('toggle');
            location.reload();
          }
        })
      });

      var modal = $("#editAccount").attr('aria-hidden');
      var id;
      if (modal){
        
          $('.table > tbody > tr').click(function(){
            //row was clicked
            id = $(this).attr('value');
            //console.log("Centre " + rowID + " was clicked");
            //window.location = "group.php?id=" + rowID; 
          });
      }
      $("#editAccount").on('show.bs.modal', function(e){
        //var centreID = $(e.relatedTarget).data('id');
        console.log(id);
        $.ajax({
          type: "POST",
          url: "account_get_action.php",
          data: {
            cid: id

          },
          dataType: "json",
          success: function(data){
            console.log(data);
            $(e.currentTarget).find('input[id="cnameU"]').val(data.cname);
            $(e.currentTarget).find('input[id="enameU"]').val(data.ename);
            $(e.currentTarget).find('input[id="usernameU"]').val(data.username);
            $(e.currentTarget).find('select[id="genderU"]').val(data.gender);
            $(e.currentTarget).find('input[id="noOfGroupU"]').val(data.noOfGroup);
            
          }
        })
        $("#update").click(function(e){
          //console.log($("#cnameU").val());
        $.ajax({
          type: "POST",
          url: "account_update_action.php",
          data: {
            id: id,
            ename: $("#enameU").val(),
            cname: $("#cnameU").val(),
            gender: $("#genderU").val(),
            username: $("#usernameU").val(),
            pwd: $("#pwdU").val(),

              },
              dataType: "json",
              success: function(data){
//              console.log(data);
//              $("#editAccount").modal('toggle');
                location.reload();
              }
            })
          })

          $("#delete").click(function(e){
              $.ajax({
                  type: "POST",
                  url: "account_delete_action.php",
                  data: {
                      id: id,
                  },
                  dataType: "json",
                  success: function(data){
                      location.reload();
                  }
              })
          })
      });
    </script>


</body></html>
