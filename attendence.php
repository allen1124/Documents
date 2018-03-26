<?
  //include "connect.php";
  require "login/loginheader.php";
  $type = $_GET['type'];
  $gid = $_GET['id'];
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
    header("Refresh:0; url=group.php");
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
    <link rel="icon" href="http://moodle.hku.hk/theme/image.php/hkumoodle/theme/1506590557/favicon">

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
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">SSP Information System</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Attendence</a></li>
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
            <li class="active"><a href="#">Attendence</a></li>
            <li ><a href="centre.php">Centre List</a></li>
            <li><a href="school.php">School List</a></li>
            <li ><a href="group.php">Group List</a></li>
            <li><a href="student.php">Student List</a></li>
            <li><a href="account.php">Account</a></li>
            <li><a href="filemanager.php">Teaching Log</a></li>
            <li><a href="#">Report</a></li>
          </ul>

        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h3 class="page-header">Group Attendence&nbsp&nbsp&nbsp
            <button type="button" class = "btn btn-link" data-toggle="modal" data-target="#addStudent">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button>
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
                    $total = 0;
                    while ($lessArr = mysqli_fetch_assoc($lessSql)){
                        echo '<th colspan="2"> <div id="date'.$lessArr['lid'].'" value="'.$lessArr['ldate'].'">'.$lessArr['ldate'].'</div></th>';
                      $total++;
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
              <tr id="total_result" name="<? echo $total; ?>">
                  <td>Total: </td>
                  <td> </td>
                  <td> </td>
                  <td> </td>
                  <?
                  $lessSql = mysqli_query($conn, "SELECT * FROM cllsc.lesson_list WHERE gid = $gid;");
                  $cnt = 0;
                  while ($lessArr = mysqli_fetch_assoc($lessSql)){
                        echo '<td colspan=2 align="center" id="total_'.$cnt.'" value="'.$lessArr['lid'].'"></td>';
                        $cnt++;
                  }
                  ?>
              </tr>
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
                                <email>
                                    <button class="btn btn-primary" type="button" id="email_'.$cnt.'" value="'.$lessArr['lid'].'" class="btn">Email</button>
                                </email>
                            </td>';
                      $cnt++;
                  }
                  ?>
              </tr>
              </tbody>
            </table>
            <div id="messages" class="hide" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <div id="messages_content"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->
<div class="modal fade" id="addStudent" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="border: none">


        <h4 class="modal-title" id="formModalLabel">


        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>
        </button>
        <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item active">
          <a class="nav-link" data-toggle="tab" href="#student" role="tab" id="stab">Add Student to this Group</a> </li>
          <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#date" role="tab" id="dtab">Add Date of Lessons</a> </li>
        </ul></h4>

      </div>
      <div class="tab-content">
      <div class="tab-pane active" id="student">
      <div class="modal-body">
       <form name="form1">
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
      <select class="form-control" id="schoolU">
          <option>School</option>
          <?
          $schoolSql = mysqli_query($conn, "SELECT * FROM cllsc.school_list;");
          while ($schoolArr = mysqli_fetch_assoc($schoolSql)) {
              echo '<option value="'.$schoolArr['Sid'].'">'.$schoolArr['cname'].'</option>';
          }
          ?>
      </select>
  </div>
  <!--</br>
  <h4>語言背景</h4>
  <hr>
  <div class="form-group">
    <label for="pob">出生國家/地區</label>
    <input type="text" class="form-control" id="pob" aria-describedby="emailHelp" placeholder="Enter the place of birth">
  </div>
  <div class="form-group">
    <label for="yearinHK">在香港的生活年期</label>
    <input type="number" class="form-control" id="yearinHK" aria-describedby="emailHelp" placeholder="Number of living year in Hong Kong">
  </div>
  <div class="form-group">
    <label for="yearinHK">在其他地方的生活年期</label>
    <input type="number" class="form-control" id="yearinHK" aria-describedby="emailHelp" placeholder="Number of living year in other places">
  </div>
-->

</form>
      </div>
      </div>
      <div class="tab-pane" id="date">
      <div class="modal-body">
      <label>上課日期</label>
      <form name="form2">
      <div class="dateList" id="dateList">
        <div class="form-group" id="inputDate1">
       <div class="input-group" >
       <span class="input-group-btn">
          <button type="button" class="btn btn-success" onclick="addDate()">
              <span class="glyphicon glyphicon-plus" ></span>
            </button>
        </span>
        <input type="text" class="form-control" data-provide="datepicker" id="date1">
        <span class="input-group-btn">
          <button type="button" class="btn btn-danger" onclick="removeDate()">
              <span class="glyphicon glyphicon-trash" id="danger"></span>
            </button>
        </span>
        </div>
        </div>
        </div>
      </form>
      </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="submit" class="btn btn-primary" onclick="submitForm('S')">Submit</button>
      </div>
    </div>
  </div>
</div>




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
    // alert($(":checkbox:checked").length);
    var total_lesson = document.getElementById("att_table").rows[0].cells.length-4;
    //console.log(total_lesson);
    for (var i= 0; i<total_lesson; i++){
        var asdf = document.getElementById('total_'+i);
        var lid = asdf.getAttribute("value");
        //console.log(lid);
        document.getElementById('total_'+i).innerHTML = $('input[name='+lid+']:checked').size();
    }
    
   
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
          var cid = "<?php echo $cid ?>";
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
              centre: cid,
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


      //console.log(get);
    var bool;
    var optionbox;
    $("input[type='radio']").click(function () {
        var sid =$(this).val();
        optionbox = $(this);
        var lid = optionbox.attr('name');
//      console.log(sid);
        $.ajax({
            type : 'POST',
            url : 'att_update.php',
            data: {
                sid   : sid,
                lid   : lid,
            },
            dataType: "json",
            success:function (data) {
                bool = data.bool
//              console.log(data.bool);
            },
            complete:function(data) {
                if (bool==1){optionbox.prop('checked',true);
//                  console.log("true");
                }else{
                    optionbox.prop('checked',false);
//                  console.log("false");
                }
            }
        });
    });

    $('.table > tbody > tr > td > email > .btn').click(function(e){
        var lid = $(this).val();
        var p = ".table > thead > tr > th > #date" + lid;
        var date = $(p).attr('value');
        $.ajax({
            type: 'POST',
            url: '../automailing/gmail.php',
            data: {
                gid: getID,
                lid: lid,
                date: date,
            },
            dataType: "json",
            success: function (data) {
                console.log(data);
                if(data['error'].length == 0 && data['success'].length != 0){
                    $('#messages').removeClass('hide alert-danger').addClass('alert alert-success alert-dismissible').slideDown().show();
                    var content = '<strong>Success!</strong> Emails successfully sent<br>Email Sent to:<br>';
                    for(var i = 0; i < data['receiver_addr'].length; i++){
                        content = content.concat(data['receiver_addr'][i]+' - '+data['receiver_name'][i]+'<br>');
                    }
                }else{
                    $('#messages').removeClass('hide').addClass('alert alert-danger alert-dismissible').slideDown().show();
                    var content = '<strong>Error!</strong> There is error during Email sending<br>Email Not Sent to:<br>';
                    for(var i = 0; i < data['receiver_addr'].length; i++){
                        content = content.concat(data['receiver_addr'][i]+' - '+data['receiver_name'][i]+'<br>');
                    }
                }
                $('#messages_content').html(content);
                $('#modal').modal('show');
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
