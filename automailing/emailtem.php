<?
include "connect.php";
mb_internal_encoding('UTF-8');
?>
<link href="../src/bootstrap.css" rel="stylesheet">
<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
<html>
<head>
	<title>[SSP] 學生缺席中文輔導班事宜</title>
</head>
<body>
	<table>
		<tr>
			<td>
				<div id=":af" class="Am Al editable LW-avf" hidefocus="true" aria-label="Message Body" g_editable="true" role="textbox" contenteditable="true" tabindex="1" style="direction: ltr; overflow: visible; min-height: 340px;" spellcheck="false" data-gramm_id="6b9ec25e-0886-bdac-48c2-315bf82bbf8c" data-gramm="true" data-gramm_editor="true"><p class="MsoNormal"><span lang="ZH-TW" style="font-family: 新細明體;">敬啟者：</span><span lang="EN-US" style="font-family: 新細明體;"><span></span></span></p>

					<p class="MsoNormal" align="center" style="text-align: center;"><b><u><span lang="ZH-TW" style="font-family: 新細明體;">學生缺席中文輔導班事宜</span></u></b><b><u><span lang="EN-US" style="font-family: 新細明體;"><span></span></span></u></b></p>

					<p class="MsoNormal"><span lang="EN-US" style="font-family: 新細明體;">&nbsp;</span></p>

					<p class="MsoNormal" style="text-indent: 24pt;"><span lang="ZH-TW" style="font-family: 新細明體;">貴校學生報讀了「非華語學生學習中文支援中心」的中文輔導班，惟以下同學缺課。煩請老師補回請假信以作紀錄，並督促</span><span lang="EN-US" style="font-family: 新細明體;">&nbsp; </span><span lang="ZH-TW" style="font-family: 新細明體;">貴校學生準時出席。如有任何疑問，請致電或電郵本人查詢，謝謝！</span><span lang="EN-US" style="font-family: 新細明體;"><span></span></span></p>

					<p class="MsoNormal" style="text-indent: 24pt;"><span lang="EN-US" style="font-family: 新細明體;">&nbsp;</span></p>
                    <div class="container">
                        <div row>
                        <div class="col-sm-7">
                    <table class="table table-bordered">
						<tbody>
                        <tr>
                            <td>
                                <p class="MsoNormal" align="center" style="text-align: center;"><span lang="ZH-TW" style="font-family: 新細明體;">班別（班號）</span></p>
							</td>
                            <td>
								<p class="MsoNormal" align="center" style="text-align: center;"><span lang="ZH-TW" style="font-family: 新細明體;">缺席同學</span></p>
							</td>
                            <td>
								<p class="MsoNormal" align="center" style="text-align: center;"><span lang="ZH-TW" style="font-family: 新細明體; color: black;">缺席日期</span></p>
							</td>
                            <td>
								<p class="MsoNormal" align="center" style="text-align: center;"><span lang="ZH-TW" style="font-family: 新細明體; color: black;">上課地點</span></p>
							</td>
						</tr>
                        <?php
                            $date = $_GET['date'];
                            $venue = $_GET['venue'];
                            foreach($_GET as $k=>$sid):
                                if (strpos($k, 'ABS') !== false):
                                    $Sql = mysqli_query($conn, "SELECT * FROM cllsc.student_list WHERE sid = '$sid';");
                                    $StudentInfo = mysqli_fetch_assoc($Sql);
                        ?>
                        <tr>
                            <td>
								<p class="MsoNormal" align="center" style="text-align: center;"><span lang="EN-US" style="font-family: 新細明體;"><?= $StudentInfo['class'].' （'.$StudentInfo['class_num'].'）'?></span></p>
							</td>
                            <td>
                                <p class="MsoNormal" align="center" style="text-align: center;"><span lang="EN-US" style="font-family: 新細明體;"><?= $StudentInfo['cname'].' '.$StudentInfo['ename']?> </span></p>
							</td>
                            <td>
                                <p class="MsoNormal" align="center" style="text-align: center;"><span lang="ZH-CN" style="font-family: 新細明體; color: black;"><?= $date ?></span></p>
							</td>
                            <td>
                                <p class="MsoNormal" align="center" style="text-align: center;"><span lang="ZH-CN" style="font-family: 新細明體; color: black;"><?= $venue ?></span></p>
							</td>
						</tr>
                                <?php endif; ?>
                        <?php endforeach; ?>
					    </tbody>
                    </table>
                        </div>
                        </div>
                    </div>
					<p class="MsoNormal"><span lang="EN-US" style="font-family: 新細明體;">&nbsp;</span></p>

					<p class="MsoNormal"><br></p>

					<p class="gmail-MsoClosing" align="right" style="margin-left: 216pt; text-align: right;"><span lang="ZH-TW" style="font-family: 新細明體;">學校聯絡主任</span><span lang="EN-US"><span></span></span></p>

					<p class="gmail-MsoClosing" align="right" style="margin-left: 216pt; text-align: right;"><span lang="ZH-TW" style="font-family: 新細明體;">黎偉杰謹啟</span><span lang="EN-US"><span></span></span></p>

					<p class="gmail-MsoClosing" style="margin: 0cm 24pt 0.0001pt 0cm;"><span lang="EN-US">&nbsp;</span></p>

					<p class="gmail-MsoClosing" style="margin: 0cm 24pt 0.0001pt 0cm;"><span lang="ZH-TW" style="font-family: 新細明體;">地址：香港大學教育學院明華綜合大樓</span><span lang="EN-US">6</span><span lang="ZH-TW">樓</span><span lang="EN-US">608</span><span lang="ZH-TW">室中文教育研究中心</span><span lang="EN-US"><span></span></span></p>

					<p class="gmail-MsoClosing" style="margin: 0cm 24pt 0.0001pt 0cm;"><span lang="ZH-TW" style="font-family: 新細明體;">電話：</span><span lang="EN-US">(852) 3917 2716<span></span></span></p>

					<p class="gmail-MsoClosing" style="margin: 0cm 24pt 0.0001pt 0cm;"><span lang="ZH-TW" style="font-family: 新細明體;">傳真：</span><span lang="EN-US">(852) 2517 4403<span></span></span></p>

					<p class="gmail-MsoClosing" style="margin: 0cm 24pt 0.0001pt 0cm;"><span lang="ZH-TW" style="font-family: 新細明體;">電郵：</span><span lang="EN-US"><a href="mailto:fsnhdl@hku.hk">fsnhdl@hku.hk</a><span></span></span></p>

					<p class="MsoNormal"><span lang="EN-US">&nbsp;</span></p></div>
				</td>
			</tr>
		</table>
	</body>
	</html>