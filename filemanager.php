<?php
/********************************
Simple PHP File Manager
Copyright John Campbell (jcampbell1)

Liscense: MIT
 ********************************/

//Disable error report for undefined superglobals
error_reporting( error_reporting() & ~E_NOTICE );

//Security options
$allow_delete = true; // Set to false to disable delete button and delete POST request.
$allow_create_folder = false; // Set to false to disable folder creation
$allow_upload = false; // Set to true to allow upload files
$allow_direct_link = false; // Set to false to only allow downloads and not direct link

$disallowed_extensions = ['php'];  // must be an array. Extensions disallowed to be uploaded

$hidden_extensions = ['php']; // must be an array of lowercase file extensions. Extensions hidden in directory index

// must be in UTF-8 or `basename` doesn't work
setlocale(LC_ALL,'en_US.UTF-8');

$tmp_dir = dirname($_SERVER['SCRIPT_FILENAME']);
if(DIRECTORY_SEPARATOR==='\\') $tmp_dir = str_replace('/',DIRECTORY_SEPARATOR,$tmp_dir);
$tmp = get_absolute_path($tmp_dir . '/' .$_REQUEST['file']);

if($tmp === false)
    err(404,'File or Directory Not Found');
if(substr($tmp, 0,strlen($tmp_dir)) !== $tmp_dir)
    err(403,"Forbidden");
if(strpos($_REQUEST['file'], DIRECTORY_SEPARATOR) === 0)
    err(403,"Forbidden");


if(!$_COOKIE['_sfm_xsrf'])
    setcookie('_sfm_xsrf',bin2hex(openssl_random_pseudo_bytes(16)));
if($_POST) {
    if($_COOKIE['_sfm_xsrf'] !== $_POST['xsrf'] || !$_POST['xsrf'])
        err(403,"XSRF Failure");
}
include "connect.php";
$file = $_REQUEST['file'] ?: './upload';
if($_GET['do'] == 'list') {
    if (is_dir($file)) {
        $directory = $file;
        $result = [];
        $files = array_diff(scandir($directory), ['.','..']);
        foreach($files as $entry) if($entry !== basename(__FILE__) && !in_array(strtolower(pathinfo($entry, PATHINFO_EXTENSION)), $hidden_extensions)) {
            $i = $directory . '/' . $entry;
            $stat = stat($i);
            $fname = basename($i);
            $mysql = mysqli_query($conn, "SELECT * FROM cllsc.file WHERE fname = '$fname';");
            $infoArr = mysqli_fetch_assoc($mysql);
            $tid = $infoArr['tid'];
            $lid = $infoArr['lid'];
            $gid = $infoArr['gid'];
            $tsql = "SELECT * FROM cllsc.account WHERE username = '$tid';";
            $tName = mysqli_query($conn, $tsql);
            $tutorName = mysqli_fetch_assoc($tName);
            $lsql = "SELECT * FROM cllsc.lesson_list WHERE lid = '$lid';";
            $lInfo = mysqli_query($conn, $lsql);
            $lessonDate = mysqli_fetch_assoc($lInfo);
            $gsql = "SELECT * FROM cllsc.group_list WHERE gid = '$gid';";
            $gInfo = mysqli_query($conn, $gsql);
            $lessonTime = mysqli_fetch_assoc($gInfo);
            if($lid == 99999) {
                $result[] = [
                    'mtime' => $stat['mtime'],
                    'size' => $stat['size'],
                    'name' => basename($i),
                    'tid' => $tutorName['cname'] . '老師',
                    'lid' => "",
                    'path' => preg_replace('@^\./@', '', $i),
                    'is_dir' => is_dir($i),
                    'is_deleteable' => $allow_delete && ((!is_dir($i) && is_writable($directory)) ||
                            (is_dir($i) && is_writable($directory) && is_recursively_deleteable($i))),
                    'is_readable' => is_readable($i),
                    'is_writable' => is_writable($i),
                    'is_executable' => is_executable($i),
                ];
            }else{
                $result[] = [
                    'mtime' => $stat['mtime'],
                    'size' => $stat['size'],
                    'name' => basename($i),
                    'tid' => $tutorName['cname'] . '老師',
                    'lid' => $lessonDate['ldate'] . ' - ' . $lessonTime['time'],
                    'path' => preg_replace('@^\./@', '', $i),
                    'is_dir' => is_dir($i),
                    'is_deleteable' => $allow_delete && ((!is_dir($i) && is_writable($directory)) ||
                            (is_dir($i) && is_writable($directory) && is_recursively_deleteable($i))),
                    'is_readable' => is_readable($i),
                    'is_writable' => is_writable($i),
                    'is_executable' => is_executable($i),
                ];
            }
        }
    } else {
        err(412,"Not a Directory");
    }
    echo json_encode(['success' => true, 'is_writable' => is_writable($file), 'results' =>$result]);
    exit;
} elseif ($_POST['do'] == 'delete') {
    if($allow_delete) {
        rmrf($file);
    }
    exit;
} elseif ($_POST['do'] == 'mkdir' && $allow_create_folder== true) {
    // don't allow actions outside root. we also filter out slashes to catch args like './../outside'
    $dir = $_POST['name'];
    $dir = str_replace('/', '', $dir);
    if(substr($dir, 0, 2) === '..')
        exit;
    chdir($file);
    @mkdir($_POST['name']);
    exit;
} elseif ($_POST['do'] == 'upload' && $allow_upload == true) {
    var_dump($_POST);
    var_dump($_FILES);
    var_dump($_FILES['file_data']['tmp_name']);
    foreach($disallowed_extensions as $ext)
        if(preg_match(sprintf('/\.%s$/',preg_quote($ext)), $_FILES['file_data']['name']))
            err(403,"Files of this type are not allowed.");

    var_dump(move_uploaded_file($_FILES['file_data']['tmp_name'], $file.'/'.$_FILES['file_data']['name']));
    exit;
} elseif ($_GET['do'] == 'download') {
    $filename = basename($file);
    header('Content-Type: ' . mime_content_type($file));
    header('Content-Length: '. filesize($file));
    header(sprintf('Content-Disposition: attachment; filename=%s',
        strpos('MSIE',$_SERVER['HTTP_REFERER']) ? rawurlencode($filename) : "\"$filename\"" ));
    ob_flush();
    readfile($file);
    exit;
}
function rmrf($dir) {
    if(is_dir($dir)) {
        $files = array_diff(scandir($dir), ['.','..']);
        foreach ($files as $file)
            rmrf("$dir/$file");
        rmdir($dir);
    } else {
        global $conn;
        include "connect.php";
        $fname = substr($dir, 7, strlen($dir));
        print_r(substr($dir, 7, strlen($dir)));
        $delsql = "DELETE FROM cllsc.file WHERE fname = '$fname'";
        echo mysqli_query($conn, $delsql);
        unlink($dir);
    }
}
function is_recursively_deleteable($d) {
    $stack = [$d];
    while($dir = array_pop($stack)) {
        if(!is_readable($dir) || !is_writable($dir))
            return false;
        $files = array_diff(scandir($dir), ['.','..']);
        foreach($files as $file) if(is_dir($file)) {
            $stack[] = "$dir/$file";
        }
    }
    return true;
}

// from: http://php.net/manual/en/function.realpath.php#84012
function get_absolute_path($path) {
    $path = str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $path);
    $parts = explode(DIRECTORY_SEPARATOR, $path);
    $absolutes = [];
    foreach ($parts as $part) {
        if ('.' == $part) continue;
        if ('..' == $part) {
            array_pop($absolutes);
        } else {
            $absolutes[] = $part;
        }
    }
    return implode(DIRECTORY_SEPARATOR, $absolutes);
}

function err($code,$msg) {
    http_response_code($code);
    echo json_encode(['error' => ['code'=>intval($code), 'msg' => $msg]]);
    exit;
}

function asBytes($ini_v) {
    $ini_v = trim($ini_v);
    $s = ['g'=> 1<<30, 'm' => 1<<20, 'k' => 1<<10];
    return intval($ini_v) * ($s[strtolower(substr($ini_v,-1))] ?: 1);
}
$MAX_UPLOAD_SIZE = min(asBytes(ini_get('post_max_size')), asBytes(ini_get('upload_max_filesize')));
?>
<!DOCTYPE html>
<html><head>
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
    <style>
        th {font-weight: normal; color: #1F75CC; background-color: #F0F9FF; padding:.5em 1em .5em .2em;
            text-align: left;cursor:pointer;user-select: none;}
        th .indicator {margin-left: 6px }
        thead {border-top: 1px solid #82CFFA; border-bottom: 1px solid #96C4EA;border-left: 1px solid #E7F2FB;
            border-right: 1px solid #E7F2FB; }
        #top {height:52px;}
        #mkdir {display:inline-block;float:right;padding-top:16px;}
        label { display:block; font-size:11px; color:#555;}
        #file_drop_target {width:500px; padding:12px 0; border: 4px dashed #ccc;font-size:12px;color:#ccc;
            text-align: center;float:right;margin-right:20px;}
        #file_drop_target.drag_over {border: 4px dashed #96C4EA; color: #96C4EA;}
        #upload_progress {padding: 4px 0;}
        #upload_progress .error {color:#a00;}
        #upload_progress > div { padding:3px 0;}
        .no_write #mkdir, .no_write #file_drop_target {display: none}
        .progress_track {display:inline-block;width:200px;height:10px;border:1px solid #333;margin: 0 4px 0 10px;}
        .progress {background-color: #82CFFA;height:10px; }

        #breadcrumb { padding-top:34px; font-size:15px; color:#aaa;display:inline-block;float:left;}
        #folder_actions {width: 50%;float:right;}
        a:hover {text-decoration: underline}
        .sort_hide{ display:none;}
        table {border-collapse: collapse;width:100%;}
        thead {max-width: 1024px}
        td { padding:.2em 1em .2em .2em; border-bottom:1px solid #def;height:30px; font-size:12px;white-space: nowrap;}
        td.first {font-size:14px;white-space: normal;}
        td.empty { color:#777; font-style: italic; text-align: center;padding:3em 0;}
        .is_dir .size {color:transparent;font-size:0;}
        .is_dir .size:before {content: "--"; font-size:14px;color:#333;}
        .is_dir .download{visibility: hidden}
        a.delete {display:inline-block;
            background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAoAAAAKCAYAAACNMs+9AAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAADtSURBVHjajFC7DkFREJy9iXg0t+EHRKJDJSqRuIVaJT7AF+jR+xuNRiJyS8WlRaHWeOU+kBy7eyKhs8lkJrOzZ3OWzMAD15gxYhB+yzAm0ndez+eYMYLngdkIf2vpSYbCfsNkOx07n8kgWa1UpptNII5VR/M56Nyt6Qq33bbhQsHy6aR0WSyEyEmiCG6vR2ffB65X4HCwYC2e9CTjJGGok4/7Hcjl+ImLBWv1uCRDu3peV5eGQ2C5/P1zq4X9dGpXP+LYhmYz4HbDMQgUosWTnmQoKKf0htVKBZvtFsx6S9bm48ktaV3EXwd/CzAAVjt+gHT5me0AAAAASUVORK5CYII=) no-repeat scroll 0 2px;
            color:#d00;	margin-left: 15px;font-size:11px;padding:0 0 0 13px;
        }
        .name {
            background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAABAklEQVRIie2UMW6DMBSG/4cYkJClIhauwMgx8CnSC9EjJKcwd2HGYmAwEoMREtClEJxYakmcoWq/yX623veebZmWZcFKWZbXyTHeOeeXfWDN69/uzPP8x1mVUmiaBlLKsxACAC6cc2OPd7zYK1EUYRgGZFkG3/fPAE5fIjcCAJimCXEcGxKnAiICERkSIcQmeVoQhiHatoWUEkopJEkCAB/r+t0lHyVN023c9z201qiq6s2ZYA9jDIwx1HW9xZ4+Ihta69cK9vwLvsX6ivYf4FGIyJj/rg5uqwccd2Ar7OUdOL/kPyKY5/mhZJ53/2asgiAIHhLYMARd16EoCozj6EzwCYrrX5dC9FQIAAAAAElFTkSuQmCC) no-repeat scroll 0px 12px;
            padding:15px 0 10px 40px;
        }
        .is_dir .name {
            background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAADdgAAA3YBfdWCzAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAI0SURBVFiF7Vctb1RRED1nZu5977VQVBEQBKZ1GCDBEwy+ISgCBsMPwOH4CUXgsKQOAxq5CaKChEBqShNK222327f79n0MgpRQ2qC2twKOGjE352TO3Jl76e44S8iZsgOww+Dhi/V3nePOsQRFv679/qsnV96ehgAeWvBged3vXi+OJewMW/Q+T8YCLr18fPnNqQq4fS0/MWlQdviwVqNpp9Mvs7l8Wn50aRH4zQIAqOruxANZAG4thKmQA8D7j5OFw/iIgLXvo6mR/B36K+LNp71vVd1cTMR8BFmwTesc88/uLQ5FKO4+k4aarbuPnq98mbdo2q70hmU0VREkEeCOtqrbMprmFqM1psoYAsg0U9EBtB0YozUWzWpVZQgBxMm3YPoCiLpxRrPaYrBKRSUL5qn2AgFU0koMVlkMOo6G2SIymQCAGE/AGHRsWbCRKc8VmaBN4wBIwkZkFmxkWZDSFCwyommZSABgCmZBSsuiHahA8kA2iZYzSapAsmgHlgfdVyGLTFg3iZqQhAqZB923GGUgQhYRVElmAUXIGGVgedQ9AJJnAkqyClCEkkfdM1Pt13VHdxDpnof0jgxB+mYqO5PaCSDRIAbgDgdpKjtmwm13irsnq4ATdKeYcNvUZAt0dg5NVwEQFKrJlpn45lwh/LpbWdela4K5QsXEN61tytWr81l5YSY/n4wdQH84qjd2J6vEz+W0BOAGgLlE/AMAPQCv6e4gmWYC/QF3d/7zf8P/An4AWL/T1+B2nyIAAAAASUVORK5CYII=) no-repeat scroll 0px 10px;
            padding:15px 0 10px 40px;
        }
    </style>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script>
        (function($){
            $.fn.tablesorter = function() {
                var $table = this;
                this.find('th').click(function() {
                    var idx = $(this).index();
                    var direction = $(this).hasClass('sort_asc');
                    $table.tablesortby(idx,direction);
                });
                return this;
            };
            $.fn.tablesortby = function(idx,direction) {
                var $rows = this.find('tbody tr');
                function elementToVal(a) {
                    var $a_elem = $(a).find('td:nth-child('+(idx+1)+')');
                    var a_val = $a_elem.attr('data-sort') || $a_elem.text();
                    return (a_val == parseInt(a_val) ? parseInt(a_val) : a_val);
                }
                $rows.sort(function(a,b){
                    var a_val = elementToVal(a), b_val = elementToVal(b);
                    return (a_val > b_val ? 1 : (a_val == b_val ? 0 : -1)) * (direction ? 1 : -1);
                })
                this.find('th').removeClass('sort_asc sort_desc');
                $(this).find('thead th:nth-child('+(idx+1)+')').addClass(direction ? 'sort_desc' : 'sort_asc');
                for(var i =0;i<$rows.length;i++)
                    this.append($rows[i]);
                this.settablesortmarkers();
                return this;
            }
            $.fn.retablesort = function() {
                var $e = this.find('thead th.sort_asc, thead th.sort_desc');
                if($e.length)
                    this.tablesortby($e.index(), $e.hasClass('sort_desc') );

                return this;
            }
            $.fn.settablesortmarkers = function() {
                this.find('thead th span.indicator').remove();
                this.find('thead th.sort_asc').append('<span class="indicator">&darr;<span>');
                this.find('thead th.sort_desc').append('<span class="indicator">&uarr;<span>');
                return this;
            }
        })(jQuery);
        $(function(){
            var XSRF = (document.cookie.match('(^|; )_sfm_xsrf=([^;]*)')||0)[2];
            var MAX_UPLOAD_SIZE = <?php echo $MAX_UPLOAD_SIZE ?>;
            var $tbody = $('#list');
            $(window).bind('hashchange',list).trigger('hashchange');
            $('#table').tablesorter();

            $('.delete').live('click',function(data) {
                $.post("",{'do':'delete',file:$(this).attr('data-file'),xsrf:XSRF},function(response){
                    list();
                },'json');
                return false;
            });

            $('#mkdir').submit(function(e) {
                var hashval = window.location.hash.substr(1),
                    $dir = $(this).find('[name=name]');
                e.preventDefault();
                $dir.val().length && $.post('?',{'do':'mkdir',name:$dir.val(),xsrf:XSRF,file:hashval},function(data){
                    list();
                },'json');
                $dir.val('');
                return false;
            });
            <?php if($allow_upload == true): ?>
            // file upload stuff
            $('#file_drop_target').bind('dragover',function(){
                $(this).addClass('drag_over');
                return false;
            }).bind('dragend',function(){
                $(this).removeClass('drag_over');
                return false;
            }).bind('drop',function(e){
                e.preventDefault();
                var files = e.originalEvent.dataTransfer.files;
                $.each(files,function(k,file) {
                    uploadFile(file);
                });
                $(this).removeClass('drag_over');
            });
            $('input[type=file]').change(function(e) {
                e.preventDefault();
                $.each(this.files,function(k,file) {
                    uploadFile(file);
                });
            });


            function uploadFile(file) {
                var folder = window.location.hash.substr(1);

                if(file.size > MAX_UPLOAD_SIZE) {
                    var $error_row = renderFileSizeErrorRow(file,folder);
                    $('#upload_progress').append($error_row);
                    window.setTimeout(function(){$error_row.fadeOut();},5000);
                    return false;
                }

                var $row = renderFileUploadRow(file,folder);
                $('#upload_progress').append($row);
                var fd = new FormData();
                fd.append('file_data',file);
                fd.append('file',folder);
                fd.append('xsrf',XSRF);
                fd.append('do','upload');
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '?');
                xhr.onload = function() {
                    $row.remove();
                    list();
                };
                xhr.upload.onprogress = function(e){
                    if(e.lengthComputable) {
                        $row.find('.progress').css('width',(e.loaded/e.total*100 | 0)+'%' );
                    }
                };
                xhr.send(fd);
            }
            function renderFileUploadRow(file,folder) {
                return $row = $('<div/>')
                    .append( $('<span class="fileuploadname" />').text( (folder ? folder+'/':'')+file.name))
                    .append( $('<div class="progress_track"><div class="progress"></div></div>')  )
                    .append( $('<span class="size" />').text(formatFileSize(file.size)) )
            };
            function renderFileSizeErrorRow(file,folder) {
                return $row = $('<div class="error" />')
                    .append( $('<span class="fileuploadname" />').text( 'Error: ' + (folder ? folder+'/':'')+file.name))
                    .append( $('<span/>').html(' file size - <b>' + formatFileSize(file.size) + '</b>'
                        +' exceeds max upload size of <b>' + formatFileSize(MAX_UPLOAD_SIZE) + '</b>')  );
            }
            <?php endif; ?>
            function list() {
                var hashval = window.location.hash.substr(1);
                $.get('?',{'do':'list','file':hashval},function(data) {
                    $tbody.empty();
                    $('#breadcrumb').empty().html(renderBreadcrumbs(hashval));
                    if(data.success) {
                        $.each(data.results,function(k,v){
                            $tbody.append(renderFileRow(v));
                        });
                        !data.results.length && $tbody.append('<tr><td class="empty" colspan=5>This folder is empty</td></tr>')
                        data.is_writable ? $('body').removeClass('no_write') : $('body').addClass('no_write');
                    } else {
                        console.warn(data.error.msg);
                    }
                    $('#table').retablesort();
                },'json');
            }
            function renderFileRow(data) {
                var $link = $('<a class="name" />')
                    .attr('href', data.is_dir ? '#' + data.path : './'+data.path)
                    .text(data.name);
                var allow_direct_link = <?php echo $allow_direct_link?'true':'false'; ?>;
                if (!data.is_dir && !allow_direct_link)  $link.css('pointer-events','none');
                var $dl_link = $('<a/>').attr('href','?do=download&file='+encodeURIComponent(data.path))
                    .addClass('download').text('download');
                var $delete_link = $('<a href="#" />').attr('data-file',data.path).addClass('delete').text('delete');
                var perms = [];
                if(data.is_readable) perms.push('read');
                if(data.is_writable) perms.push('write');
                if(data.is_executable) perms.push('exec');
                var $html = $('<tr />')
                    .addClass(data.is_dir ? 'is_dir' : '')
                    .append( $('<td class="first" />').append($link) )
                    .append( $('<td/>').text(data.tid) )
                    .append( $('<td/>').text(data.lid) )
                    .append( $('<td/>').attr('data-sort',data.is_dir ? -1 : data.size)
                        .html($('<span class="size" />').text(formatFileSize(data.size))) )
                    .append( $('<td/>').attr('data-sort',data.mtime).text(formatTimestamp(data.mtime)) )
                    .append( $('<td/>').append($dl_link).append( data.is_deleteable ? $delete_link : '') )
                return $html;
            }
            function renderBreadcrumbs(path) {
                var base = "",
                    $html = $('<div/>').append( $('<a href=#>Home</a></div>') );
                $.each(path.split('/'),function(k,v){
                    if(v) {
                        $html.append( $('<span/>').text(' ▸ ') )
                            .append( $('<a/>').attr('href','#'+base+v).text(v) );
                        base += v + '/';
                    }
                });
                return $html;
            }
            function formatTimestamp(unix_timestamp) {
                var m = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                var d = new Date(unix_timestamp*1000);
                return [m[d.getMonth()],' ',d.getDate(),', ',d.getFullYear()," ",
                    (d.getHours() % 12 || 12),":",(d.getMinutes() < 10 ? '0' : '')+d.getMinutes(),
                    " ",d.getHours() >= 12 ? 'PM' : 'AM'].join('');
            }
            function formatFileSize(bytes) {
                var s = ['bytes', 'KB','MB','GB','TB','PB','EB'];
                for(var pos = 0;bytes >= 1000; pos++,bytes /= 1024);
                var d = Math.round(bytes*10);
                return pos ? [parseInt(d/10),".",d%10," ",s[pos]].join('') : bytes + ' bytes';
            }
        })

    </script>
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
                    <li><a href="school.php">School List</a></li>
                    <li><a href="group.php">Group List</a></li>
                    <li><a href="student.php">Student List</a></li>
                    <li><a href="account.php">Account</a></li>
                    <li class="active"><a href="filemanager.php">Teaching Log</a></li>
                    <li><a href="#">Report</a></li>
                </ul>
            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h3 class="page-header">File Manager</h3>
                <table  class="table table-hover"id="table"><thead><tr>
                    <th>Name</th>
                    <th>Teacher</th>
                    <th>Lesson</th>
                    <th>Size</th>
                    <th>Modified</th>
                    <th>Actions</th>
                    </tr></thead>
                    <tbody id="list">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body></html>
