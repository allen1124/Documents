<? 
  include "connect.php";
  $table = "centre_list";
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
            <li><a href="index.html">Dashboard</a></li>
            <li><a href="attendence.php">Attendence</a></li>
            <li><a href="centre.php">Centre List</a></li>
            <li><a href="group.php">Group List</a></li>
            <li><a href="student.php">Student List</a></li>
            <li><a href="account.php">Account</a></li>
            <li><a href="filemanager.php">Teaching Note</a></li>
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
            <li><a href="#">Dashboard<span class="sr-only">(current)</span></a></li>
            <li><a href="attendence.php">Attendence</a></li>
            <li class="active"><a href="centre.php">Centre List</a></li>
            <li><a href="group.php">Group List</a></li>
            <li><a href="student.php">Student List</a></li>
            <li><a href="account.php">Account</a></li>
            <li><a href="filemanager.php">Teaching Note</a></li>
            <li><a href="#">Report</a></li>
          </ul>

        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h3 class="page-header">Centre/ School List&nbsp&nbsp&nbsp
            <button type="button" class = "btn btn-link" data-toggle="modal" data-target="#addCentre">
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
                  <th>District</th>
                  <th>No Of Group</th>
                  <th>Edit</th>
                </tr>
              </thead>
              <tbody>
              <?
                  while ($centreArr = mysqli_fetch_assoc($mysql)) {
                    echo ' 
                      <td class="fire" value="'.$centreArr['cid'].'">'.$centreArr['cid'].'</td>
                      <td class="fire" value="'.$centreArr['cid'].'">'.$centreArr['cname'].'</td>
                      <td class="fire" value="'.$centreArr['cid'].'">'.$centreArr['ename'].'</td>
                      <td class="fire" value="'.$centreArr['cid'].'">'.$centreArr['district'].'</td>
                      <td class="fire" value="'.$centreArr['cid'].'">'.$centreArr['group'].'</td>
                    
                  <td><button type="button" class = "btn btn-link" data-toggle="modal" data-target="#editCentre" data-id="'.$centreArr['cid'].'"><span class="glyphicon glyphicon-pencil" aria-hidden="true" ></span>
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
<div class="modal fade" id="addCentre" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
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
    <label for="cid">中心編號</label>
    <input type="text" class="form-control" id="cid" aria-describedby="emailHelp" placeholder="Enter P/SXX">
  </div>
  <div class="form-group">
    <label for="cname">中心名稱 (中文)</label>
    <input type="text" class="form-control" id="cname" aria-describedby="emailHelp" placeholder="輸入中心/學校名稱">
  </div>
  <div class="form-group">
    <label for="ename">中心名稱 (英文)</label>
    <input type="text" class="form-control" id="ename" aria-describedby="emailHelp" placeholder="Enter Centre/School Name">
  </div>
  <div class="form-group">
    <label for="district">地區</label>
    <select class="form-control" id="district">
      <option>District</option>
      <option value="CW">CW</option>
      <option value="I">I</option>
      <option value="HKE">HKE</option>
      <option value="KC">KC</option>
      <option value="KT">KT</option>
      <option value="SK">SK</option>
      <option value="ST">ST</option>
      <option value="SOU">SOU</option>
      <option value="SSP">SSP</option>
      <option value="TM">TM</option>
      <option value="TP">TP</option>
      <option value="WC">WC</option>
      <option value="WTS">WTS</option>
      <option value="YL">YL</option>
      <option value="YTM">YTM</option>
      <option value="KTTW">KTTW</option>
    </select>
  </div>
  <div class="form-group">
    <label for="noOfClass">No. of Class</label>
    <input class="form-control" type="number" value="1" id="noOfClass">
  </div>
  <div class="form-group">
    <label for="noOfGroup">No. of Group</label>
    <input class="form-control" type="number" value="1" id="noOfGroup">
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


<div class="modal fade" id="editCentre" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="formModalLabel">Edit Centre/School
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </h4>
      </div>
      <div class="modal-body">
      <form>
  <div class="form-group">
    <label for="cname">中心名稱 (中文)</label>
    <input type="text" class="form-control" id="cnameU" aria-describedby="emailHelp" placeholder="輸入中心/學校名稱" value="<? echo $cid; ?>">
  </div>
  <div class="form-group">
    <label for="ename">中心名稱 (英文)</label>
    <input type="text" class="form-control" id="enameU" aria-describedby="emailHelp" placeholder="Enter Centre/School Name">
  </div>
  <div class="form-group">
    <label for="district">地區</label>
    <select class="form-control" id="districtU">
      <option>District</option>
      <option value="CW">CW</option>
      <option value="I">I</option>
      <option value="HKE">HKE</option>
      <option value="KC">KC</option>
      <option value="KT">KT</option>
      <option value="SK">SK</option>
      <option value="ST">ST</option>
      <option value="SOU">SOU</option>
      <option value="SSP">SSP</option>
      <option value="TM">TM</option>
      <option value="TP">TP</option>
      <option value="WC">WC</option>
      <option value="WTS">WTS</option>
      <option value="YL">YL</option>
      <option value="YTM">YTM</option>
      <option value="KTTW">KTTW</option>
    </select>
  </div>
  <div class="form-group">
    <label for="noOfClass">No. of Class</label>
    <input class="form-control" type="number" value="1" id="noOfClassU">
  </div>
  <div class="form-group">
    <label for="noOfGroup">No. of Group</label>
    <input class="form-control" type="number" value="1" id="noOfGroupU">
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
        $.ajax({
          type: "POST",
          url: "centre_add_action.php",
          data: {
            cid: $("#cid").val(),
            cname: $("#cname").val(),
            ename: $("#ename").val(),
            district: $("#district").val(),
            noOfClass: $("#noOfClass").val(),
            noOfGroup: $("#noOfGroup").val(),

          },
          dataType: "json",
          success: function(data){
            console.log(data);
            $("#addCentre").modal('toggle');
            location.reload();
          }
        })
      });
      
      var modal = $("#editCentre").attr('aria-hidden');
      if (modal){
           $('.table > tbody > tr > .fire').click(function () {
                  //row was clicked
                  var rowID = $(this).attr('value');
                  console.log("Centre " + rowID + " was clicked");
                  window.location = "group.php?id=" + rowID;
           })
      }

      $("#editCentre").on('show.bs.modal', function(e){
        var centreID = $(e.relatedTarget).data('id');
        console.log(centreID);
        $.ajax({
          type: "POST",
          url: "centre_get_action.php",
          data: {
            cid: centreID

          },
          dataType: "json",
          success: function(data){
            console.log(data);
            $(e.currentTarget).find('input[id="cnameU"]').val(data.cname);
            $(e.currentTarget).find('input[id="enameU"]').val(data.ename);
            $(e.currentTarget).find('select[id="districtU"]').val(data.district);
            $(e.currentTarget).find('input[id="noOfClassU"]').val(data.noOfClass);
            $(e.currentTarget).find('input[id="noOfGroupU"]').val(data.noOfGroup);
            
          }
        })
        $("#update").click(function(e){
          //console.log($("#cnameU").val());
            $.ajax({
              type: "POST",
              url: "centre_update_action.php",
              data: {
                cid: centreID,
                cname: $("#cnameU").val(),
                ename: $("#enameU").val(),
                district: $("#districtU").val(),
                noOfClass: $("#noOfClassU").val(),
                noOfGroup: $("#noOfGroupU").val(),
              },
              dataType: "json",
              success: function(data){
    //            console.log(data);
    //            $("#editCentre").modal('toggle');
                location.reload();
              }
        })
      })
      });
    </script>


</body></html>
