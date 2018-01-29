<?
require "login/loginheader.php";
include "connect.php";
$table = "account";
$tid = $_GET['tid'];
if ($tid != null){
    $mysql = mysqli_query($conn, "SELECT * FROM cllsc.$table WHERE username = '$tid';");
}else{
    $mysql = mysqli_query($conn, "SELECT * FROM cllsc.$table;");
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
            </button>
            <a class="navbar-brand" href="#">SSP Information System</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Attendence</a></li>
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
                <li><a href="#">Attendence</a></li>
                <li><a href="group2.php?tid=<? echo $tid; ?>">Group List</a></li>
            </ul>
        </div>
    </div>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h3 class="page-header">Change Password</h3>
        <p>Use the form below to change your password. Your password cannot be the same as your username.</p>
        <div id="messages" class="hide" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <div id="messages_content"></div>
        </div>
        <form method="post" id="passwordForm">
            <input type="password" class="input-lg form-control" name="password1" id="password1" placeholder="New Password" autocomplete="off">
            <div class="row">
                <div class="col-sm-6">
                    <span id="8char" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> 8 Characters Long<br>
                    <span id="case" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> One Letter
                </div>
                <div class="col-sm-6">
                    <span id="num" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> One Number
                </div>
            </div>
            <input type="password" class="input-lg form-control" name="password2" id="password2" placeholder="Repeat Password" autocomplete="off">
            <div class="row">
                <div class="col-sm-12">
                    <span id="pwmatch" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> Passwords Match
                </div>
            </div>
            <input type="submit" id="submit" class="col-xs-3 btn btn-primary btn-load btn-lg" data-loading-text="Changing Password..." value="Change Password">
        </form>
    </div>
</div>

<script src="src/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="src/bootstrap.js"></script>
<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
<script src="src/holder.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="src/ie10-viewport-bug-workaround.js"></script>
<script type="text/javascript">
    var pwdchk = false;
    $("input[type=password]").keyup(function(){
        var ucase = new RegExp("[A-Z]+");
        var lcase = new RegExp("[a-z]+");
        var num = new RegExp("[0-9]+");

        if($("#password1").val().length >= 8){
            $("#8char").removeClass("glyphicon-remove");
            $("#8char").addClass("glyphicon-ok");
            $("#8char").css("color","#00A41E");
            pwdchk = true;
        }else{
            $("#8char").removeClass("glyphicon-ok");
            $("#8char").addClass("glyphicon-remove");
            $("#8char").css("color","#FF0004");
            pwdchk = false;
        }

        if(ucase.test($("#password1").val()) || lcase.test($("#password1").val())){
            $("#case").removeClass("glyphicon-remove");
            $("#case").addClass("glyphicon-ok");
            $("#case").css("color","#00A41E");
            pwdchk = true;
        }else{
            $("#case").removeClass("glyphicon-ok");
            $("#case").addClass("glyphicon-remove");
            $("#case").css("color","#FF0004");
            pwdchk = false;
        }

        if(num.test($("#password1").val())){
            $("#num").removeClass("glyphicon-remove");
            $("#num").addClass("glyphicon-ok");
            $("#num").css("color","#00A41E");
            pwdchk = true;
        }else{
            $("#num").removeClass("glyphicon-ok");
            $("#num").addClass("glyphicon-remove");
            $("#num").css("color","#FF0004");
            pwdchk = false;
        }

        if($("#password1").val() == $("#password2").val()){
            $("#pwmatch").removeClass("glyphicon-remove");
            $("#pwmatch").addClass("glyphicon-ok");
            $("#pwmatch").css("color","#00A41E");
            pwdchk = true;
        }else{
            $("#pwmatch").removeClass("glyphicon-ok");
            $("#pwmatch").addClass("glyphicon-remove");
            $("#pwmatch").css("color","#FF0004");
            pwdchk = false;
        }
    });

    var id = "<?php
        $ac = mysqli_fetch_assoc($mysql);
        echo $ac['id'];
    ?>";
    $("#submit").click(function(e){
        e.preventDefault();
        if(pwdchk) {
            $.ajax({
                type: "POST",
                url: "account_change_pwd.php",
                data: {
                    id: id,
                    pwd: $("#password1").val(),
                },
                dataType: "json",
                success: function (data) {
                    $('#messages').removeClass('hide').addClass('alert alert-success alert-dismissible').slideDown().show();
                    $('#messages_content').html('<strong>Success!</strong> Your Password has been changed.');
                    $('#modal').modal('show');
                }
            })
        }
    });
</script>
</body></html>