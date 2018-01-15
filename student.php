<? 
  include "connect.php";
  $table = "student_list";
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
            <li><a href="#">Dashboard</a></li>
            <li><a href="attendence.php">Attendence</a></li>
            <li ><a href="centre.php">Centre List</a></li>
            <li><a href="group.php">Group List</a></li>
            <li class="active"><a href="student.php">Student List</a></li>
            <li><a href="account.php">Account</a></li>
            <li><a href="#">Report</a></li>
          </ul>

        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h3 class="page-header">Student List&nbsp&nbsp&nbsp
            <button type="button" class = "btn btn-link" data-toggle="modal" data-target="#addStudent">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button>
          </h3>
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Profile</th>
                  <th>Chinese name</th>
                  <th>English name</th>
                  <th>Gender</th>
                  <th>Class</th>
                  <th>Class No.</th>
                  <th>School</th>
                  <th>Grp ID</th>
                  <th>Edit</th>
                </tr>
              </thead>
              <tbody>
              <?
                  while ($infoArr = mysqli_fetch_assoc($mysql)) {
                    //$cid = $infoArr['sid'];
                    //$sql = "SELECT * FROM cllsc.centre_list WHERE cid = '$cid';";
                    //$getName = mysqli_query($conn, $sql);
                    //$schoolName = mysqli_fetch_assoc($getName);
                    echo '<tr value="'.$infoArr['sid'].'">
                  <td>'.$infoArr['sid'].'</td>
                  <td>'.$infoArr['cname'].'</td>
                  <td>'.$infoArr['ename'].'</td>
                  <td>'.$infoArr['gender'].'</td>
                  <td>'.$infoArr['class'].'</td>
                  <td>'.$infoArr['class_num'].'</td>
                  <td>'.$infoArr['school'].'</td>
                  <td>'.$infoArr['gid'].'</td>
                  <td>
                  <button type="button" class = "btn btn-link" data-toggle="modal" data-target="#editStudent"><span class="glyphicon glyphicon-pencil" aria-hidden="true" ></span>
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
<div class="modal fade" id="addStudent" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="formModalLabel">Add Student <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
    <input type="text" class="form-control" id="ename" aria-describedby="emailHelp" placeholder="Enter the student's name">
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
    <label for="class">班別</label>
    <input type="text" class="form-control" id="class" aria-describedby="emailHelp" placeholder="Enter the class">
  </div>
  <div class="form-group">
    <label for="classNo">班號</label>
    <input type="text" class="form-control" id="classNo" aria-describedby="emailHelp" placeholder="Enter the class number">
  </div>
  <div class="form-group">
    <label for="school">學校</label>
    <input type="text" class="form-control" id="school" aria-describedby="emailHelp" placeholder="Enter the school name">
  </div>

  <div class="form-group">
    <label for="centre">中心</label>
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
    <label for="group">組別</label>
    <select class="form-control" id="group">
      <option>Group</option>
      <?
        $groupSql = mysqli_query($conn, "SELECT * FROM cllsc.group_list;");
        while ($groupArr = mysqli_fetch_assoc($groupSql)) {

                    echo '<option value="'.$groupArr['gid'].'"> '.$groupArr['cid'].' - '.$groupArr['tid'].' ['.$groupArr['time'].']</option>';

        }

      ?>
      
    </select>
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




<div class="modal fade" id="editStudent" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="formModalLabel">Edit Student<button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
    <input type="text" class="form-control" id="enameU" aria-describedby="emailHelp" placeholder="Enter the student's name">
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
    <label for="class">班別</label>
    <input type="text" class="form-control" id="classU" aria-describedby="emailHelp" placeholder="Enter the class">
  </div>
  <div class="form-group">
    <label for="classNo">班號</label>
    <input type="text" class="form-control" id="classNoU" aria-describedby="emailHelp" placeholder="Enter the class number">
  </div>
  <div class="form-group">
    <label for="school">學校</label>
    <input type="text" class="form-control" id="schoolU" aria-describedby="emailHelp" placeholder="Enter the school name">
  </div>

  <div class="form-group">
    <label for="centre">中心</label>
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
    <label for="group">組別</label>
    <select class="form-control" id="groupU">
      <option>Group</option>
      <?
        $groupSql = mysqli_query($conn, "SELECT * FROM cllsc.group_list;");
        while ($groupArr = mysqli_fetch_assoc($groupSql)) {

                    echo '<option value="'.$groupArr['gid'].'"> '.$groupArr['cid'].' - '.$groupArr['tid'].' ['.$groupArr['time'].']</option>';

        }

      ?>
      
    </select>
  </div>
  
</form>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" id="delete" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
          <button type="submit" id="update" class="btn btn-primary">Submit</button>
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
    $("#centre").change(function(){

        console.log($("#centre").val());
    });

    $("#submit").click(function(e){
        e.preventDefault();
        console.log("submit");
        $.ajax({
          type: "POST",
          url: "student_add_action.php",
          data: {
            cname: $("#cname").val(),
            ename: $("#ename").val(),
            gender: $("#gender").val(),
            class: $("#class").val(),
            classNo: $("#classNo").val(),
            school: $("#school").val(),
            group: $("#group").val()

          },
          dataType: "json",
          success: function(data){
            console.log(data);
            $("#addStudent").modal('toggle');
            location.reload();
          }
        })
      });

    var modal = $("#editStudent").attr('aria-hidden');
    var id;
    if (modal){
        $('.table > tbody > tr').click(function(){
            id = $(this).attr('value');
        });
    }
    $("#editStudent").on('show.bs.modal', function(e){
        console.log(id);
        $.ajax({
            type: "POST",
            url: "student_get_action.php",
            data: {
                sid: id
            },
            dataType: "json",
            success: function(data){
                console.log(data);
                $(e.currentTarget).find('input[id="cnameU"]').val(data.cname);
                $(e.currentTarget).find('input[id="enameU"]').val(data.ename);
                $(e.currentTarget).find('select[id="genderU"]').val(data.gender);
                $(e.currentTarget).find('input[id="classU"]').val(data.class);
                $(e.currentTarget).find('input[id="classNoU"]').val(data.classNo);
                $(e.currentTarget).find('input[id="schoolU"]').val(data.school);
                $(e.currentTarget).find('select[id="centreU"]').val(data.centre);
                $(e.currentTarget).find('select[id="groupU"]').val(data.group);
            }
        })

        $("#update").click(function(e){
            $.ajax({
                type: "POST",
                url: "student_update_action.php",
                data: {
                    id: id,
                    cname: $("#cnameU").val(),
                    ename: $("#enameU").val(),
                    gender: $("#genderU").val(),
                    class: $("#classU").val(),
                    classNo: $("#classNoU").val(),
                    school: $("#schoolU").val(),
                    group: $("#groupU").val()
                },
                dataType: "json",
                success: function(data){
//                    $("#editStudent").modal('toggle');
                    location.reload();
                }
            })
        })

        $("#delete").click(function(e){
            $.ajax({
                type: "POST",
                url: "student_delete_action.php",
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
