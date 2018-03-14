<?
include "connect.php";
$table = "school_list";
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
                <li><a href="student.php">Student List</a></li>
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
                <li><a href="centre.php">Centre List</a></li>
                <li class="active"><a href="school.php">School List</a></li>
                <li><a href="group.php">Group List</a></li>
                <li><a href="student.php">Student List</a></li>
                <li><a href="account.php">Account</a></li>
                <li><a href="filemanager.php">Teaching Log</a></li>
                <li><a href="#">Report</a></li>
            </ul>

        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h3 class="page-header">School List&nbsp&nbsp&nbsp
                <button type="button" class = "btn btn-link" data-toggle="modal" data-target="#addSchool">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </button>
            </h3>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Chinese Name</th>
                        <th>English Name</th>
                        <th>Contact Teacher</th>
                        <th>Email Address</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?
                    while ($schoolArr = mysqli_fetch_assoc($mysql)) {
                        echo '
                      <td>'.$schoolArr['Sid'].'</td>
                      <td>'.$schoolArr['cname'].'</td>
                      <td>'.$schoolArr['ename'].'</td>
                      <td>'.$schoolArr['teacher_name'].'</td>
                      <td>'.$schoolArr['email_addr'].'</td>
                    
                  <td><button type="button" class = "btn btn-link" data-toggle="modal" data-target="#editSchool" data-id="'.$schoolArr['Sid'].'"><span class="glyphicon glyphicon-pencil" aria-hidden="true" ></span>
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
<div class="modal fade" id="addSchool" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="formModalLabel">Add Centre/School <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button></h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="cname">學校名稱 (中文)</label>
                        <input type="text" class="form-control" id="cname" aria-describedby="emailHelp" placeholder="輸入學校名稱">
                    </div>
                    <div class="form-group">
                        <label for="ename">學校名稱 (英文)</label>
                        <input type="text" class="form-control" id="ename" aria-describedby="emailHelp" placeholder="Enter School Name">
                    </div>
                    <div class="form-group">
                        <label for="teacher_name">聯絡人老師</label>
                        <input type="text" class="form-control" id="teacher_name" aria-describedby="emailHelp" placeholder="輸入聯絡人老師名稱">
                    </div>
                    <div class="form-group">
                        <label for="email_addr">聯絡電郵地址</label>
                        <input type="text" class="form-control" id="email_addr" aria-describedby="emailHelp" placeholder="輸入聯絡電郵地址">
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


<div class="modal fade" id="editSchool" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="formModalLabel">Edit School
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="cname">學校名稱 (中文)</label>
                        <input type="text" class="form-control" id="cnameU" aria-describedby="emailHelp" placeholder="輸入學校名稱" value="<? echo $cid; ?>">
                    </div>
                    <div class="form-group">
                        <label for="ename">學校名稱 (英文)</label>
                        <input type="text" class="form-control" id="enameU" aria-describedby="emailHelp" placeholder="Enter School Name">
                    </div>
                    <div class="form-group">
                        <label for="teacher_name">聯絡人老師</label>
                        <input type="text" class="form-control" id="teacher_nameU" aria-describedby="emailHelp" placeholder="輸入聯絡人老師名稱">
                    </div>
                    <div class="form-group">
                        <label for="email_addr">聯絡電郵地址</label>
                        <input type="text" class="form-control" id="email_addrU" aria-describedby="emailHelp" placeholder="輸入聯絡電郵地址">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="delete" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                <button type="button" id="update" class="btn btn-primary">Submit</button>
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
        $.ajax({
            type: "POST",
            url: "school_add_action.php",
            data: {
                cname: $("#cname").val(),
                ename: $("#ename").val(),
                teacher_name: $("#teacher_name").val(),
                email_addr: $("#email_addr").val(),

            },
            dataType: "json",
            success: function(data){
                console.log(data);
                $("#addSchool").modal('toggle');
                location.reload();
            }
        })
    });

    $("#editSchool").on('show.bs.modal', function(e){
        var schoolID = $(e.relatedTarget).data('id');
        console.log(schoolID);
        $.ajax({
            type: "POST",
            url: "school_get_action.php",
            data: {
                Sid: schoolID

            },
            dataType: "json",
            success: function(data){
                console.log(data);
                $(e.currentTarget).find('input[id="cnameU"]').val(data.cname);
                $(e.currentTarget).find('input[id="enameU"]').val(data.ename);
                $(e.currentTarget).find('input[id="teacher_nameU"]').val(data.teacher_name);
                $(e.currentTarget).find('input[id="email_addrU"]').val(data.email_addr);
            }
        });
        $("#update").click(function(e){
            $.ajax({
                type: "POST",
                url: "school_update_action.php",
                data: {
                    Sid: schoolID,
                    cname: $("#cnameU").val(),
                    ename: $("#enameU").val(),
                    teacher_name: $("#teacher_nameU").val(),
                    email_addr: $("#email_addrU").val(),
                },
                dataType: "json",
                success: function(data){
                    //            console.log(data);
                    //            $("#editCentre").modal('toggle');
                    location.reload();
                }
            })
        })

        $("#delete").click(function(e){
            $.ajax({
                type: "POST",
                url: "school_delete_action.php",
                data: {
                    Sid: schoolID,
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
