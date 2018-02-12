<?
    require "login/loginheader.php";
    $gid = $_GET['id'];
    $tid = $_SESSION['username'];
    if ($gid != null){
        include "connect.php";
        $infoTable = "group_list";
        $infoMysql = mysqli_query($conn, "SELECT * FROM cllsc.$infoTable WHERE gid = $gid;");
        $infoArr = mysqli_fetch_assoc($infoMysql);
        $lessSql = mysqli_query($conn, "SELECT * FROM cllsc.lesson_list WHERE gid = $gid;");
    }else{
    header("Refresh:0; url=group2.php?tid=$tid");
    }
?>
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
            </button>
            <a class="navbar-brand" href="#">SSP Information System</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="teaching_note2.php?id=<? echo $gid; ?>">Teaching Note</a></li>
                <li><a href="attendence2.php?type=group&id=<? echo $gid; ?>">Attendence</a></li>
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
                <li class="active"><a href="#">Teaching Note</a></li>
                <li><a href="attendence2.php?type=group&id=<? echo $gid; ?>">Attendence</a></li>
                <li><a href="group2.php?tid=<? echo $tid; ?>">Group List</a></li>
            </ul>
        </div>
    </div>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div id="messages" class="hide" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <div id="messages_content"></div>
        </div>
        <h3 class="page-header">Teaching Note Upload</h3>
        <form id="upload" method="post" enctype="multipart/form-data">
            <label>Select Lessons:</label>
            <select class="form-control" name="lid" id="lid">
                <?
                while ($lessArr = mysqli_fetch_assoc($lessSql)){
                    if($lessArr['upload'] == 1)
                        echo "<option value=" . $lessArr['lid'] . ">" . $lessArr['ldate'] . " - Uploaded </option>";
                    else
                        echo "<option value=" . $lessArr['lid'] . ">" . $lessArr['ldate'] . "</option>";
                }
                ?>
            </select>
            <label>Upload Teaching Note:</label>
            <div class="input-group">
                <label class="input-group-btn">
                    <span class="btn btn-primary">
                        Browse&hellip; <input id="teaching_note" name="teaching_note" type="file" style="display: none;" multiple>
                    </span>
                </label>
                <input type="text" class="form-control" readonly>
            </div>
        </form>
        <div class="modal-footer">
            <button type="submit" id="submit" class="btn btn-primary">Submit</button>
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
    $(function() {
        // We can attach the `fileselect` event to all file inputs on the page
        $(document).on('change', ':file', function() {
            var input = $(this),
            numFiles = input.get(0).files ? input.get(0).files.length : 1,
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
            input.trigger('fileselect', [numFiles, label]);
        });
        // We can watch for our custom `fileselect` event like this
        $(document).ready( function() {
            $(':file').on('fileselect', function(event, numFiles, label) {
                var input = $(this).parents('.input-group').find(':text'),
                log = numFiles > 1 ? numFiles + ' files selected' : label;
                if( input.length ) {
                    input.val(log);
                }
            });
        });
    });

    $("#submit").click(function(e){
        if( $('#teaching_note').prop('files').length == 0 ){
            $('#messages').removeClass('hide').addClass('alert alert-danger alert-dismissible').slideDown().show();
            $('#messages_content').html('<strong>Error!</strong> No File Selected');
            $('#modal').modal('show');
        }else{
            var form_data = new FormData();
            for (var i = 0; i < $('#teaching_note').prop('files').length; i++) {
                form_data.append("file[]", $('#teaching_note').prop('files')[i]);
            }
            form_data.append('lid', $("#lid").val());
            $.ajax({
                url: 'upload_teachingnote.php',
                type: 'post',
                dataType: "json",
                contentType: false,
                processData: false,
                data: form_data,
                success: function(data){
                    if(data['error'].length == 0){
                        $('#messages').removeClass('hide alert-danger').addClass('alert alert-success alert-dismissible').slideDown().show();
                        var content = '<strong>Success!</strong> File successfully uploaded<br>File Uploaded:<br>';
                        for(var i = 0; i < data['result'].length; i++){
                            content = content.concat(data['result'][i]+'<br>');
                        }
                    }else{
                        $('#messages').removeClass('hide').addClass('alert alert-danger alert-dismissible').slideDown().show();
                        var content = '<strong>Error!</strong> There is error during file uploading<br>File not Uploaded:<br>';
                        for(var i = 0; i < data['error'].length; i++){
                            content = content.concat(data['error'][i]+'<br>');
                        }
                    }
                    $('#messages_content').html(content);
                    $('#modal').modal('show');
                    console.log(data);
                }
            });
        }
    });

</script>
</body></html>