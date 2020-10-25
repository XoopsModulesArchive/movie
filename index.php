<?php

include '../../mainfile.php';
include '../../header.php';
?>
<html>
<head>
    <title>Xoops Movie!</title>
</head>
<body>
<table border="0" width="100%">
    <tbody>
    <tr>
        <td colspan="4" align="center">
            <h1><b>XOOPS_MOVIE<br></b></h1>
            <img src="./images/tv.jpg" width="118" height="81" border="0">
        </td>
    </tr>
    <tr>
        <td width="299"></td>
        <td colspan="3"><font size=-1>Ｗindows Media Player等にてwmv形式がサポートされているかご確認下さい、サポートされていない場合は下記サイトより最新のバージョンをダウンロード！</font></td>
    </tr>
    <tr>
        <td height="33" width="299"></td>
        <td height="33" width="342" align="center">GET Windows Media Player9</td>
        <td align="center" width="128" height="33"><a href="http://windowsmedia.com/" target="_blank"><IMG src="./images/WMP9series_Free.gif" width="120" height="32" border="0"></a></td>
    </tr>
    </tbody>
</table>
<?php
OpenTable();
$host = XOOPS_DB_HOST;
$user = XOOPS_DB_USER;
$pass = XOOPS_DB_PASS;
$name = XOOPS_DB_NAME;
$pref = XOOPS_DB_PREFIX;
function makeRow($movie_id, $movie_title, $play_time, $movie, $directory)
{
    global $clrclass;

    echo "<tr class=\"$clrclass\">
<td>$movie_id.</td>
<td>$movie_title</td>
<td>$play_time</td>
<td>$movie</td>
<td align=\"center\"><a href onClick=\"window.open('movie.php?movie=$movie&directory=$directory','Telli', 'toolbar=no,top=50,left=50,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,copyhistory=no,width=500,height=480')\"><img src=\"images/mpplay.gif\" alt=\"Click To View!\" width=\"23\" height=\"21\" border=\"0\"></a></td>
</tr>";
}

$connect = @mysql_connect($host, $user, $pass);
if (!$connect) {
    die($GLOBALS['xoopsDB']->error());
}
$select = mysqli_select_db($GLOBALS['xoopsDB']->conn, $name, $connect);
if (!$select) {
    die($GLOBALS['xoopsDB']->error($connect));
}
$query2 = 'SELECT * FROM ' . $pref . '_xoops_movie';
$sql = @$GLOBALS['xoopsDB']->queryF($query2);
if (!$sql) {
    die($GLOBALS['xoopsDB']->error($connect));
}
echo '<table width="100%" border="0" cellpadding="0" cellspacing="1">';
echo '<tr bgcolor="#3155bd">
<td align="center"><font color="#ffffff">ID</font></td>
<td align="center"><font color="#ffffff">タイトル</font></td>
<td align="center"><font color="#ffffff">再生時間/サイズ</font></td>
<td align="center"><font color="#ffffff">説明</font></td>
<td align="center"><font color="#ffffff">再生</font></td>
</tr>';
while (false !== ($row = @$GLOBALS['xoopsDB']->fetchBoth($sql))) {
    $movie_id = $row[0];

    $movie_title = $row[1];

    $play_time = $row[2];

    $movie = $row[3];

    $directory = $row[4];

    if ('even' == $clrclass) {
        $clrclass = 'odd';
    } else {
        $clrclass = 'even';
    }

    makeRow($movie_id, $movie_title, $play_time, $movie, $directory);
}
echo '</table>';
CloseTable();
echo '<br>';
OpenTable();
echo '<center>Xoops_Movie(sql)v1.1 by<a href="http://www.rc-net.jp/xoops/"><b>RC-NET WEB SERVICES</b></a></center>';
CloseTable();
require XOOPS_ROOT_PATH . '/footer.php';
?>
</body>
</html>
