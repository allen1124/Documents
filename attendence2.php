<? 
  //include "connect.php";
  require "login/loginheader.php";
  $type = $_GET['type'];
  $gid = $_GET['id'];
  $tid = $_SESSION['username'];
  if ($gid != null){
    include "connect.php";
    $table = "student_list";
    $mysql = mysqli_query($conn, "SELECT * FROM cllsc.$table WHERE gid = $gid;");
    $infoTable = "group_list";
    $infoMysql = mysqli_query($conn, "SELECT * FROM cllsc.$infoTable WHERE gid = $gid;");
    $infoArr = mysqli_fetch_assoc($infoMysql);
    $lessSql = mysqli_query($conn, "SELECT * FROM cllsc.lesson_list WHERE gid = $gid;");
    //$lessArr = mysqli_fetch_assoc($lessSql);
  }else{
    header("Refresh:0; url=group2.php?tid=$tid");
  }
  

  //echo $mysql;
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css" rel="stylesheet">
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
          </button>
          <a class="navbar-brand" href="#">SSP Information System</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li ><a href="teaching_note2.php?id=<? echo $gid; ?>">Teaching Note</a></li>
            <li class="active"><a href="#">Attendence</a></li>
            <li><a href="group2.php?tid=<? echo $tid; ?>">Group List</a></li>
            <li><a href="change_password.php?tid=<? echo $tid; ?>">Change Password</a></li>
            <li><a href="login/logout.php"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
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
            <li ><a href="teaching_note2.php?id=<? echo $gid; ?>">Teaching Note</a></li>
            <li class="active"><a href="#">Attendence</a></li>
            <li ><a href="group2.php?tid=<? echo $tid; ?>">Group List</a></li>
          </ul>

        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h3 class="page-header">Group Attendence
              <button type="button" class="btn btn-info pull-right" onclick="location.href='teaching_note2.php?id=<? echo $gid;?>'">Upload Teaching Note</button>
          </h3>
          <?  
              $cid = $infoArr['cid'];
              $sql = "SELECT * FROM cllsc.centre_list WHERE cid = '$cid';";
              $getName = mysqli_query($conn, $sql);
              $schoolInfo = mysqli_fetch_assoc($getName);
              $tid = $infoArr['tid'];
              $tsql = "SELECT * FROM cllsc.account WHERE username = '$tid';";
              $tName = mysqli_query($conn, $tsql);
              $tutorName = mysqli_fetch_assoc($tName);
              echo '<div style ="font-size: 18px;">
              中心: &nbsp&nbsp&nbsp&nbsp'.$schoolInfo['cname'].'</br>
              課室：&nbsp&nbsp&nbsp'.$infoArr['venue'].'</br>
              時間：&nbsp&nbsp&nbsp'.$infoArr['time'].'</br>
              導師：&nbsp&nbsp&nbsp'.$tutorName['cname'].'老師</br>
              </div></br>';

          ?>
          <div class="table-responsive">
            <table id="att_table" class="table table-hover">
              <thead>
                <tr>
                  <th>Class</th>
                  <th>No.</th>
                  <th>Eng. Name</th>
                  <th>Chin. Name</th>
                  <?
                    while ($lessArr = mysqli_fetch_assoc($lessSql)){
                      echo '<th colspan="2">'.$lessArr['ldate'].'</th>';
                    }
                    
                  ?>
                  
                </tr>
              </thead>
              <tbody>
              <?
                  if ($gid != null){
                    //echo count($dateCol);
                    while ($studArr = mysqli_fetch_assoc($mysql)) {
                      echo '<tr value="'.$studArr['sid'].'">
                      <td>'.$studArr['class'].'</td>
                      <td>'.$studArr['class_num'].'</td>
                      <td>'.$studArr['ename'].'</td>
                      <td>'.$studArr['cname'].'</td>';
                      $attSql= mysqli_query($conn, "SELECT * FROM cllsc.att_list WHERE sid = ".$studArr['sid'].";");
                      while ($attArr = mysqli_fetch_assoc($attSql)){
                          echo '
                      <td align="center">
                          <form class="uk-form">
                            <input class="ck_'.$attArr['lid'].'" type="radio" name="'.$attArr['lid'].'" value="'.$attArr['sid'].'" disabled="true"';
                              if ($attArr['att'] == 1) {
                                  echo 'checked ';
                              };
                            echo '></form>';
                            echo '<td class="ps_'.$attArr['lid'].'"/><input type="text" class="form-control" value="'.$attArr['ps'].'" name="'.$attArr['lid'].'" id="'.$attArr['sid'].'" readonly/></td>';
                      }
                      echo '</td>';
                      echo '</tr>';
                    }
                  }
              ?>
              <tr>
                  <td> </td>
                  <td> </td>
                  <td> </td>
                  <td> </td>
                  <?
                  $lessSql = mysqli_query($conn, "SELECT * FROM cllsc.lesson_list WHERE gid = $gid;");
                  $cnt = 0;
                  while ($lessArr = mysqli_fetch_assoc($lessSql)){
                      echo '<td colspan=2 align="center">
                            <button type="button" id="save_'.$cnt.'" value="'.$lessArr['lid'].'" class="btn">Edit</button>
                            </td>';
                      $cnt++;
                  }
                  ?>
              </tr>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="src/bootstrap.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="src/holder.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="src/ie10-viewport-bug-workaround.js"></script>
    <script type="text/javascript">
      var getID = new URL(window.location.href).searchParams.get("id");
      $('#dtab').click(function(){
        //console.log("date");
        //document.getElementById('submitS').setAttribute('id', 'submitD');
        document.getElementById('submit').setAttribute('onclick', 'submitForm("D")');
      })
      $('#stab').click(function(){
        //console.log("student");
        //document.getElementById('submitD').setAttribute('id', 'submitS');
        document.getElementById('submit').setAttribute('onclick', 'submitForm("S")');
      })
      $('#date1 input').datepicker({
        autoclose: true
      });
      var countDate = 1;
      function addDate(){
        countDate++;
        console.log(countDate);
        
        $("#dateList").append('<div class="form-group" id="inputDate'+ countDate + '"><br><div class="input-group"><span class="input-group-btn"><button type="button" class="btn btn-success" onclick="addDate()"><span class="glyphicon glyphicon-plus" ></span></button></span><input type="text" class="form-control" data-provide="datepicker" id="date'+ countDate + '"><span class="input-group-btn"><button type="button" class="btn btn-danger" onclick="removeDate()" ]><span class="glyphicon glyphicon-trash" id="danger"></span></button></span></div></div>');


      }

      function removeDate(){
        if (countDate > 1){
          countDate--;
          console.log(countDate);
          var currentID  = $("#danger").closest('.form-group').attr('id'); 
          $("#"+currentID).remove();
        }else{
          console.log("cant delete the last one!!!");
        }
      }
      function submitForm(x){
        console.log(x);
        if (x == "S"){
          console.log("This is Student")
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
              group: getID
            },
            dataType: "json",
            success: function(data){
              console.log(data);
              $("#addStudent").modal('toggle');
              location.reload();
            }
          });
        }else {
          if (x == "D"){
            var dateArr=[];
            for (var i = countDate ; i >= 1; i--) {
              dateArr.push($("#date"+i).val());
              
            }
            console.log(dateArr);
            $.ajax({
              type: "POST",
              url: "lesson_date_add_action.php",
              data: {
                dates: dateArr,
                gid: getID

              },
              dataType: "json",
              success: function(data){
                console.log(data);
                $("#addStudent").modal('toggle');
                location.reload();
              }
            })
            
          }else{
            console.log("Wrong Input")
          }
        }
      }
      /*$("#submitD").click(function(e){
        e.preventDefault();
        conosole.log("submitD");
        for (var i = countDate ; i >= 1; i--) {
          console.log($("#inputDate"+i).val())
        }
        $.ajax({
          type: "POST",
          url: "date_lesson_add_action.php",
          data: {
            cname: $("#cname").val(),
            ename: $("#ename").val(),
            gender: $("#gender").val(),
            class: $("#class").val(),
            classNo: $("#classNo").val(),
            school: $("#school").val(),
            group: getID

          },
          dataType: "json",
          success: function(data){
            console.log(data);
            $("#addStudent").modal('toggle');
            //location.reload();
          }
        })
      });*/

      
      //console.log(get);
        var bool;
        var optionbox;
        $("input[type='radio']").click(function () {
            var sid =$(this).val();
            optionbox = $(this);
            var lid = optionbox.attr('name');
            console.log(sid);
            $.ajax({
                type: 'POST',
                url: 'att_update.php',
                data: {
                    sid: sid,
                    lid: lid,
                },
                dataType: "json",
                success: function (data) {
                    bool = data.bool
                    //console.log(data.bool);
                },
                complete: function (data) {
                    if (bool == 1) {
                        optionbox.prop('checked', true);
                        //console.log("true");
                    } else {
                        optionbox.prop('checked', false);
                        //console.log("false");
                    }
                }
            })
        });

        $('.table > tbody > tr > td > .btn').click(function(e){
            var id = $(this).attr('id');
            var lid = $(this).val();
            if($(this).text() == 'Save') {
                var ps = ".table > tbody > tr > .ps_" + lid + " > input[type='text']";
                var ps_json = [];
                $(ps).each(function () {
                    $(this).prop("readonly", true);
                    ps_json.push({
                        sid: $(this).attr('id'),
                        ps: $(this).val(),
                    });
                });
                var ck = ".table > tbody > tr > td > form > .ck_" + lid + "";
                $(ck).each(function () {
                    $(this).prop("disabled", true);
                });
                $.ajax({
                    type: 'POST',
                    url: 'att_ps_update.php',
                    data: {
                        lid: lid,
                        ps: ps_json,
                    },
                    dataType: "json",
                    success: function (data) {
                        //console.log(data);
                    }
                })
            }else{
                var ps = ".table > tbody > tr > .ps_" + lid + " > input[type='text']";
                $(ps).each(function () {
                    $(this).prop("readonly", false);
                });
                var ck = ".table > tbody > tr > td > form > .ck_" + lid + "";
                $(ck).each(function () {
                    $(this).prop("disabled", false);
                });
            }
            $(this).text(function(_, value) {
                return value == 'Save' ? 'Edit' : 'Save';
            });
        });
    </script>
</body></html>
