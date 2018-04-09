<? require "login/loginheader.php";
  include "connect.php";
  $table = "group_list";
  $cid = $_GET['id'];
  if ($cid != null){
    $mysql = mysqli_query($conn, "SELECT * FROM cllsc.$table WHERE cid = '$cid';");
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
    <link rel="icon" href="http://moodle.hku.hk/theme/image.php/hkumoodle/theme/1506590557/favicon">

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
            <li><a href="attendence.php">Attendence</a></li>
            <li><a href="centre.php">Centre List</a></li>
            <li><a href="school.php">School List</a></li>
            <li><a href="group.php">Group List</a></li>
            <li><a href="student">Student List</a></li>
            <li><a href="account.php">Account</a></li>
            <li><a href="filemanager.php">Teaching Log</a></li>
            <li><a href="#">Report</a></li>
            <li><a href="login/logout.php"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="attendence.php">Attendence</a></li>
            <li ><a href="centre.php">Centre List</a></li>
            <li><a href="school.php">School List</a></li>
            <li class="active"><a href="group.php">Group List</a></li>
            <li><a href="student.php">Student List</a></li>
            <li><a href="account.php">Account</a></li>
            <li><a href="filemanager.php">Teaching Log</a></li>
            <li><a href="#">Report</a></li>
          </ul>

        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h3 class="page-header">Group List&nbsp&nbsp&nbsp
            <button type="button" class = "btn btn-link" data-toggle="modal" data-target="#addGroup">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button>
          </h3>
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Centre ID</th>
                  <th>Centre/School</th>
                  <th>Enrolled</th>
                  <th>Venue</th>
                  <th>Tutor</th>
                  <th>Time</th>
                  <th>Edit</th>
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
                    $tsql = "SELECT * FROM cllsc.account WHERE '$tid' LIKE CONCAT('%', username , '%');";
                    $tName = mysqli_query($conn, $tsql);
                    echo '<tr>
                  <td class="g" value="'.$infoArr['gid'].'">'.$infoArr['cid'].'</td>
                  <td class="g" value="'.$infoArr['gid'].'">'.$schoolName['cname'].'</td>
                  <td class="g" value="'.$infoArr['gid'].'">'.$infoArr['enroll'].'</td>
                  <td class="g" value="'.$infoArr['gid'].'">'.$infoArr['venue'].'</td>
                  <td class="g" value="'.$infoArr['gid'].'">';
                      while ($tutorName = mysqli_fetch_assoc($tName)){
                          echo $tutorName['cname'].'老師 ';
                      }
                      echo '</td>
                  <td class="g" value="'.$infoArr['gid'].'">'.$infoArr['time'].'</td>
                  <td>
                  <button type="button" class = "btn btn-link" data-toggle="modal" data-target="#editGroup" data-id="'.$infoArr['gid'].'"><span class="glyphicon glyphicon-pencil" aria-hidden="true" ></span>
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
<div class="modal fade" id="addGroup" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="formModalLabel">Add Group <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button></h4>
        
      </div>
      <div class="modal-body">
       <form>
  <div class="form-group">
    <label for="centre">學校/中心</label>
    <select class="form-control" id="centre">
      <option>Centre/School</option>
      <?
        $centreSql = mysqli_query($conn, "SELECT * FROM cllsc.centre_list;");
        while ($centreArr = mysqli_fetch_assoc($centreSql)) {

                    echo '<option value="'.$centreArr['cid'].'">'.$centreArr['cname'].'</option>';

        }

      ?>
      
    </select>
  </div>
  <div class="form-group">
    <label for="venue">地點</label>
    <input type="text" class="form-control" id="venue" aria-describedby="emailHelp" placeholder="輸入上課班房">
  </div>
  <div class="form-group">
    <label for="time">時間</label>
    <input type="text" class="form-control" id="time" aria-describedby="emailHelp" placeholder="輸入上課時間">
  </div>
  <div class="form-group">
    <label for="tutor">導師</label>
    <select class="form-control" id="tutor">
      <option>Teacher</option>
      <?
        $centreSql = mysqli_query($conn, "SELECT * FROM cllsc.account WHERE access != '1';");
        while ($teacherArr = mysqli_fetch_assoc($centreSql)) {
        			if ($teacherArr['cname'] != null){
                    	echo '<option value="'.$teacherArr['username'].'">'.$teacherArr['cname'].'老師</option>';
                	}else{
                		echo '<option value="'.$teacherArr['username'].'">'.$teacherArr['ename'].'</option>';
                	}
        }

      ?>
      
    </select>
  </div>
  <div class="form-group">
    <label for="capacity">Enrolled</label>
    <input class="form-control" type="number" value="0" id="enroll">
  </div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id="submit" type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="editGroup" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="formModalLabel">Edit Group <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button></h4>
        
      </div>
      <div class="modal-body">
      <form>
  <div class="form-group">
    <label for="centre">學校/中心</label>
    <select class="form-control" id="centreU">
      <option>Centre/School</option>
      <?
        $centreSql = mysqli_query($conn, "SELECT * FROM cllsc.centre_list;");
        while ($centreArr = mysqli_fetch_assoc($centreSql)) {

                    echo '<option value="'.$centreArr['cid'].'">'.$centreArr['cname'].'</option>';

        }

      ?>
      
    </select>
  </div>
  <div class="form-group">
    <label for="venue">地點</label>
    <input type="text" class="form-control" id="venueU" aria-describedby="emailHelp" placeholder="輸入上課班房">
  </div>
  <div class="form-group">
    <label for="time">時間</label>
    <input type="text" class="form-control" id="timeU" aria-describedby="emailHelp" placeholder="輸入上課時間">
  </div>
  <div class="form-group">
    <label for="tutor">導師</label>
    <select class="form-control" id="tutorU">
      <option>Teacher</option>
      <?
        $centreSql = mysqli_query($conn, "SELECT * FROM cllsc.account WHERE access != '1';");
        while ($teacherArr = mysqli_fetch_assoc($centreSql)) {
        			if ($teacherArr['cname'] != null){
                    	echo '<option value="'.$teacherArr['username'].'">'.$teacherArr['cname'].'老師</option>';
                	}else{
                		echo '<option value="'.$teacherArr['username'].'">'.$teacherArr['ename'].'</option>';
                	}
        }

      ?>
      
    </select>
  </div>
  <div class="form-group">
    <label for="capacity">Enrolled</label>
    <input class="form-control" type="number" id="enrollU">
  </div>
  
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
          url: "group_add_action.php",
          data: {
            venue: $("#venue").val(),
            time: $("#time").val(),
            tutor: $("#tutor").val(),
            enroll: $("#enroll").val(),
            centre: $("#centre").val()

          },
          dataType: "json",
          success: function(data){
            console.log(data);
            $("#addGroup").modal('toggle');
            location.reload();
          }
        })
      });

      $('.table > tbody > tr > .g').click(function(){
    		//row was clicked
    		var rowID = $(this).attr('value');
    		//console.log("row " + rowID + " was clicked");
    		window.location = "attendence.php?type=group&id=" + rowID;
    	});
      $("#editGroup").on('show.bs.modal', function(e){
        var groupID = $(e.relatedTarget).data('id');
        console.log(groupID);
        $.ajax({
          type: "POST",
          url: "group_get_action.php",
          data: {
            gid: groupID

          },
          dataType: "json",
          success: function(data){
            console.log(data);
            $(e.currentTarget).find('select[id="centreU"]').val(data.centre);
            $(e.currentTarget).find('input[id="venueU"]').val(data.venue);
            $(e.currentTarget).find('input[id="timeU"]').val(data.time);
            $(e.currentTarget).find('select[id="tutorU"]').val(data.tutor);
            $(e.currentTarget).find('input[id="enrollU"]').val(data.enroll);
            
          }
        })
        $("#update").click(function(e){
          //console.log($("#cnameU").val());
        $.ajax({
          type: "POST",
          url: "group_update_action.php",
          data: {
            gid: groupID,
            venue: $("#venueU").val(),
            time: $("#timeU").val(),
            tutor: $("#tutorU").val(),
            enroll: $("#enrollU").val(),
            centre: $("#centreU").val()

          },
          dataType: "json",
          success: function(data){
//            console.log(data);
//            $("#editGroup").modal('toggle');
            location.reload();
          }
        })
      })
      });
    </script>


</body></html>
